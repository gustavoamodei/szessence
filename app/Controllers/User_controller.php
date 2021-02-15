<?php 


namespace App\Controllers;
use App\Models\User_Model;

class User_controller extends BaseController
{
    public function Index()
	{ 
        echo view('login');
	}
	public function login()
	{
        
        $model =  new User_Model();
        $email_input=$this->request->getVar('email');
        $senha_input=md5($this->request->getVar('senha'));
        $data=[
            'user'=>$model->get_users($email_input)
        ];
        $id= $data['user']['id'];
        $nome= $data['user']['nome'];
        $email= $data['user']['email'];
        $senha= $data['user']['senha'];
        
        if(($email_input === $email) && ($senha_input === $senha)){
            $session = session();
            $data =[
                'id_session'=>$id,
                'nome_session'=>$nome,
                'email' => $email,
            ];
            
            $session->set($data);
            
          
            echo view('template/header');
		    echo view('main');
            echo view('template/footer');
        }else{
            $session = session();
            $session->setFlashdata("erro","Erro login inválido!");
            echo view('login',$data);
        }
        

    }
    public function main()
	{ 
        echo view('template/header');
        echo view('main');
        echo view('template/footer');
	}

	
    
    public function deslogar(){
        $session = session();
        $session->destroy();
        
        echo $session->nome_session ;
		return redirect()->to(site_url('login'));
    }

}
