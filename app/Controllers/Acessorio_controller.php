<?php 


namespace App\Controllers;
use App\Models\Acessorio_Model;
class Acessorio_controller extends BaseController
{
	public function index()
	{
		
		$model= new Acessorio_Model();
        $data =['query' =>  $model->get_acessorio_root()];
        echo view('template/header');
		echo view('listar_acessorio',$data);
		echo view('template/footer');
       
		
	}
	public function create()
	{
		echo view('template/header');
		echo view('cadastro_acessorio');
		echo view('template/footer');
		
    }
    
	//--------------------------------------------------------------------
    public function store()
    {  
        helper(['form', 'url']);
        $model =  new Acessorio_Model();

        $valor = str_replace( '.', '',$this->request->getVar('valor'));
        $v=str_replace( ',', '.',$valor);
        $model->save([
            'id' => $this->request->getVar('id'),
            'nome'=>$this->request->getVar('nome'),
            'valor' => $v,
            'descricao'  => $this->request->getVar('descricao'),
            
            ]);
            $builder = $model->builder();
            $session = \Config\Services::session();
            if($builder->db->affectedRows() >0){
                
                $session->setFlashdata('msg', 'Acessório Cadastrado com Sucesso');
                return redirect("listar_cliente");
            }else{
                $session->setFlashdata('erro', 'Erro Verifique Conexão');
                return redirect("listar_acessorio");
            }
    }


    public function edit($id = null){
        $model =  new Acessorio_Model();
        $data['acessorio']= $model->acessorio_edit($id);   
        if(empty($data['acessorio'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Não foi possível encontrar ");
        }
        $data= [
            'id'=>$data['acessorio']['id'],
            'nome'=>$data['acessorio']['nome'],
            'valor'=>$data['acessorio']['valor'],
            'descricao'=>$data['acessorio']['descricao'],
            
        ];
       
        echo view('template/header');
		echo view('cadastro_acessorio',$data);
        echo view('template/footer'); 
    }

    public function delete(){
        $id= $this->request->getVar('id');
        $db = db_connect();
        $builder = $db->table('acessorio');
        $builder->where('id', $id);
        $builder->delete();
        
        //return $this->response->redirect(site_url('/listar_oleo'));
       
    }

}
