<?php 


namespace App\Controllers;
use App\Models\Obase_Model;
class Obase_controller extends BaseController
{
	public function index()
	{
		
		$model= new Obase_Model();
        $data =['query' =>  $model->get_oleo_base()];
        echo view('template/header');
		echo view('listar_oleo_base',$data);
		echo view('template/footer');
       
		
	}
	public function create()
	{
		echo view('template/header');
		echo view('cadastro_oleo_base');
		echo view('template/footer');
		
    }
    
	//--------------------------------------------------------------------
    public function store()
    {  
        helper(['form', 'url']);
        $model =  new Obase_Model();

        $check= $this->validate([
            'ml' => 'integer',
            
        ]);
        if(! $check){
            $id=$this->request->getVar('id');
            $data['query']=$model->oleo_base_edit($id);
            $data= [
                'id'=>$data['query']['id'],
                'nome'=>$data['query']['nome'],
                'ml'=>$data['query']['ml'],
                'preco_ml'=>$data['query']['preco_ml'],
                'valor_compra'=>$data['query']['valor_compra'],
                'validade'=>$data['query']['validade'],
                
            ];
            echo view('template/header');
            echo view('cadastro_oleo_base',$data,['validation'=>$this->validator]);
            echo view('template/footer');
            
        }else{
           
            $valor_compra = str_replace( '.', '',$this->request->getVar('valor_compra'));
            $vc = str_replace( ',', '.',$valor_compra); 
            $ml= $this->request->getVar('ml');
            $aux= ($vc / $ml);
            $preco_ml= number_format($aux, 2, '.', '');

            $model->save([
                'id' => $this->request->getVar('id'),
                'nome' => $this->request->getVar('nome'),
                'ml'  => $this->request->getVar('ml'),
                'preco_ml'  => $preco_ml,
                'valor_compra'  => $vc ,
                'validade'  => $this->request->getVar('validade'),
                ]);
                $builder = $model->builder();
                $session = \Config\Services::session();
                if($builder->db->affectedRows() >0){
                    
                    $session->setFlashdata('msg', 'Óleo base Cadastrado com Sucesso');
                    return redirect("listar_oleo_base");
                }else{
                    $session->setFlashdata('erro', 'Erro Verifique Conexão');
                    return redirect("listar_oleo_base");
                }
        }
      
    }


    public function edit($id = null){
        $model =  new Obase_Model();
        $data['ob']= $model->oleo_base_edit($id);   
        if(empty($data['ob'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Não foi possível encontrar ");
        }
        $data= [
            'id'=>$data['ob']['id'],
            'nome'=>$data['ob']['nome'],
            'ml'=>$data['ob']['ml'],
            'preco_ml'=>$data['ob']['preco_ml'],
            'valor_compra'=>$data['ob']['valor_compra'],
            'validade'=>$data['ob']['validade'],
            
        ];
       
        echo view('template/header');
		echo view('cadastro_oleo_base',$data);
        echo view('template/footer'); 
    }

    public function delete(){
        $id= $this->request->getVar('id');
        $db = db_connect();
        $builder = $db->table('oleo_base');
        $builder->where('id', $id);
        $builder->delete();
        
        //return $this->response->redirect(site_url('/listar_oleo'));
       
    }

}
