<?php 


namespace App\Controllers;
use App\Models\Oessencial_Model;
class Oessencial_controller extends BaseController
{
	public function index()
	{
		
		$model= new Oessencial_Model();
        $data =['query' =>  $model->get_oleo_essencial()];
        echo view('template/header');
		echo view('listar_oleo_essencial',$data);
		echo view('template/footer');
       
		
	}
	public function create()
	{
		echo view('template/header');
		echo view('cadastro_oleo_essencial');
		echo view('template/footer');
		
    }
    
	//--------------------------------------------------------------------
    public function store()
    {  
        helper(['form', 'url']);
        $model =  new Oessencial_Model();

        $check= $this->validate([
            'ml' => 'integer',
            
        ]);
        if(! $check){
            $id=$this->request->getVar('id');
            $data['query']=$model->oleo_essencial_edit($id);
            $data= [
                'id'=>$data['query']['id'],
                'nome'=>$data['query']['nome'],
                'ml'=>$data['query']['ml'],
                'preco_gota'=>$data['query']['preco_gota'],
                'valor_compra'=>$data['query']['valor_compra'],
                'validade'=>$data['query']['validade'],
                
            ];
            echo view('template/header');
            echo view('cadastro_oleo_essencial', $data,['validation'=>$this->validator]);
            echo view('template/footer');
            
        }else{
            $valor_compra = str_replace( '.', '',$this->request->getVar('valor_compra'));
            $vc = str_replace( ',', '.',$valor_compra); 
            $ml= $this->request->getVar('ml');
            $total_gotas= ($ml * 24);
            $aux= ((float)$vc / (float)$total_gotas);
            $preco_gota= number_format($aux, 2, '.', '');
            $model->save([
                'id' => $this->request->getVar('id'),
                'nome' => $this->request->getVar('nome'),
                'ml'  => $ml,
                'preco_gota'  =>$preco_gota,
                'total_gotas'  => $total_gotas,
                'valor_compra'  => $vc,
                'validade'  => $this->request->getVar('validade'),
                ]);
                $builder = $model->builder();
                $session = \Config\Services::session();
                if($builder->db->affectedRows() >0){
                    
                    $session->setFlashdata('msg', 'Óleo Essencial Cadastrado com Sucesso');
                    return redirect("listar_oleo");
                }else{
                    $session->setFlashdata('erro', 'Erro Verifique Conexão');
                    return redirect("listar_oleo");
                }
        }
      
    }


    public function edit($id = null){
        $model =  new Oessencial_Model();
        $data['oe']= $model->oleo_essencial_edit($id);   
        if(empty($data['oe'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Não foi possível encontrar ");
        }
        $data= [
            'id'=>$data['oe']['id'],
            'nome'=>$data['oe']['nome'],
            'ml'=>$data['oe']['ml'],
            'preco_gota'=>$data['oe']['preco_gota'],
            'valor_compra'=>$data['oe']['valor_compra'],
            'validade'=>$data['oe']['validade'],
            
        ];
       
        echo view('template/header');
		echo view('cadastro_oleo_essencial',$data);
        echo view('template/footer'); 
    }

    public function delete(){
        $id= $this->request->getVar('id');
        $db = db_connect();
        $builder = $db->table('oleo_essencial');
        $builder->where('id', $id);
        $builder->delete();
        
        //return $this->response->redirect(site_url('/listar_oleo'));
       
    }

}
