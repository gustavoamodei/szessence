<?php 


namespace App\Controllers;
use App\Models\Cliente_Model;
class Cliente_controller extends BaseController
{
	public function index()
	{
		
		$model= new Cliente_Model();
        $data =['query' =>  $model->get_cliente_root()];
        echo view('template/header');
		echo view('listar_cliente',$data);
		echo view('template/footer');
       
		
	}
	public function create()
	{
		echo view('template/header');
		echo view('cadastro_cliente');
		echo view('template/footer');
		
    }
    
	//--------------------------------------------------------------------
    public function store()
    {  
        helper(['form', 'url']);
        $model =  new Cliente_Model();

        $check= $this->validate([
            'nome' => 'min_length[3]|max_length[50]',
            'email' => 'valid_email',
            'endereco' => 'min_length[5]|max_length[100]',
            
        ]);
        if(! $check){
            $id=$this->request->getVar('id');
            $data['query']=$model->cliente_edit($id);
            $data= [
                'id'=>$data['query']['id'],
                'nome'=>$data['query']['nome'],
                'email'=>$data['query']['email'],
                'endereco'=>$data['query']['endereco'],
                'celular'=>$data['query']['celular'],
                
            ];
            echo view('template/header');
            echo view('cadastro_cliente',$data,['validation'=>$this->validator]);
            echo view('template/footer');
            
        }else{
          
            $model->save([
                'id' => $this->request->getVar('id'),
                'nome' => $this->request->getVar('nome'),
                'email'  => $this->request->getVar('email'),
                'endereco'  => $this->request->getVar('endereco'),
                'celular'  =>$this->request->getVar('celular') ,
                
                ]);
                $builder = $model->builder();
                $session = \Config\Services::session();
                if($builder->db->affectedRows() >0){
                    
                    $session->setFlashdata('msg', 'Cliente Cadastrado com Sucesso');
                    return redirect("listar_cliente");
                }else{
                    $session->setFlashdata('erro', 'Erro Verifique Conexão');
                    return redirect("listar_cliente");
                }
                
        }
      
    }


    public function edit($id = null){
        $model =  new Cliente_Model();
        $data['c']= $model->cliente_edit($id);   
        if(empty($data['c'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Não foi possível encontrar ");
        }
        $data= [
            'id'=>$data['c']['id'],
            'nome'=>$data['c']['nome'],
            'email'=>$data['c']['email'],
            'endereco'=>$data['c']['endereco'],
            'celular'=>$data['c']['celular'],
            
        ];
       
        echo view('template/header');
		echo view('cadastro_cliente',$data);
        echo view('template/footer'); 
    }

    public function delete(){
        $id= $this->request->getVar('id');
        $db = db_connect();
        $builder = $db->table('cliente');
        $builder->where('id', $id);
        $builder->delete();
        
        //return $this->response->redirect(site_url('/listar_oleo'));
       
    }

}
