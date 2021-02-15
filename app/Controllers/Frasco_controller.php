<?php 


namespace App\Controllers;
use App\Models\Frasco_Model;
class Frasco_controller extends BaseController
{
	public function index()
	{
		
		$model= new Frasco_Model();
        $data =['query' =>  $model->get_frasco()];
        echo view('template/header');
		echo view('listar_frasco',$data);
		echo view('template/footer');
       
		
	}
	public function create()
	{
		echo view('template/header');
		echo view('cadastro_frasco');
		echo view('template/footer');
		
    }
    
	//--------------------------------------------------------------------
    public function store()
    {  
        helper(['form', 'url']);
        $model =  new frasco_Model();

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
                   
                    $session->setFlashdata('msg', 'Frasco Cadastrado com Sucesso');
                    return redirect("listar_frasco");
                }else{
                    $session->setFlashdata('erro', 'Erro Verifique Conexão');
                    return redirect("listar_frasco");
                }
    }


    public function edit($id = null){
        $model =  new Frasco_Model();
        $data['frasco']= $model->frasco_edit($id);   
        if(empty($data['frasco'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Não foi possível encontrar ");
        }
        $data= [
            'id'=>$data['frasco']['id'],
            'nome'=>$data['frasco']['nome'],
            'valor'=>$data['frasco']['valor'],
            'descricao'=>$data['frasco']['descricao'],
            
        ];
       
        echo view('template/header');
		echo view('cadastro_frasco',$data);
        echo view('template/footer'); 
    }

    public function delete(){
        $id= $this->request->getVar('id');
        $db = db_connect();
        $builder = $db->table('frasco');
        $builder->where('id', $id);
        $builder->delete();
        
        //return $this->response->redirect(site_url('/listar_oleo'));
       
    }

}
