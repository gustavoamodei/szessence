<?php 


namespace App\Controllers;
use App\Models\Simulacao_Model;
use App\Models\Frasco_Model;
use App\Models\Acessorio_Model;
use App\Models\Obase_Model;

class Simulacao_controller extends BaseController
{
	public function index()
	{
		
		$model= new Simulacao_Model();
        $data =['query' =>  $model->get_Orcamentos()];
        echo view('template/header');
		echo view('listar_orcamentos',$data);
		echo view('template/footer');
       
		
    }
    public function orcamento_by_id(){
        $model= new Simulacao_Model();
        $id=$this->request->getVar('id');
        echo json_encode( $model->get_orcamento_by_id($id));
    }
    public function orcamento_edit(){
        $model= new Simulacao_Model();
        $id=$this->request->getVar('id');
         $row=$model->get_orcamento_edit_by_id($id);
         return $row;
    }

    public function copiar_orcamento($id = null){
        $model= new Simulacao_Model();
        $data2 =['query' =>  $model->get_cliente(),'query2' =>  $model->get_acessorio(),
        'query3'=>$model->get_frasco(),'query4'=>$model->get_oleo_base(),
        'query5'=>$model->get_oleo_essencial(),
        'simulacao'=> $model->get_orcamento_edit_by_id($id),
    ];
          
   
        echo view('template/header');
		echo view('copia_de_orcamento',$data2);
        echo view('template/footer'); 
    }
    
	public function create()
	{
        $model= new Simulacao_Model();
        $data =['query' =>  $model->get_cliente(),'query2' =>  $model->get_acessorio(),
        'query3'=>$model->get_frasco(),'query4'=>$model->get_oleo_base(),'query5'=>$model->get_oleo_essencial()];
        
        echo view('template/header');
        echo view('simulacao',$data);
		echo view('template/footer');
		
    }
   

    public function calcular(){

                $cliente = $this->request->getVar('cliente');
                if($cliente === "" ){
                    $cliente = " - ";
                }
                $acessorio = $this->request->getVar('acessorio');
                if($acessorio === ""){
                    $acessorio = "4 - 0";
                }
                $frasco = $this->request->getVar('frasco');
                if($frasco === ""){
                    $frasco = "0 - 0";
                }
                $oleo_base = $this->request->getVar('oleo_base');
                if($oleo_base === ""){
                    $oleo_base = "0 - 0";
                }
              
                $oleo_essencial_1 = $this->request->getVar('oleo_essencial_1');
                if($oleo_essencial_1 === ""){
                    $oleo_essencial_1 = "0 - 0";
                    
                }
                $oleo_essencial_2 = $this->request->getVar('oleo_essencial_2');
            
                if(($oleo_essencial_2 === "") || ($oleo_essencial_2 === " -  - ")){
                    $oleo_essencial_2 = "0 - 0 - ";
                    
                }
                $oleo_essencial_3 = $this->request->getVar('oleo_essencial_3');
                if(($oleo_essencial_3 === "")||($oleo_essencial_3 === " -  - ")){
                    $oleo_essencial_3 = "0 - 0 - ";
                    
                }
                $oleo_essencial_4 = $this->request->getVar('oleo_essencial_4');
                if(($oleo_essencial_4 === "") || ($oleo_essencial_4 === " -  - ")){
                    $oleo_essencial_4 = "0 - 0 - ";
                   
                }
                $oleo_essencial_5 = $this->request->getVar('oleo_essencial_5');
                if(($oleo_essencial_5 === "")||($oleo_essencial_5 === " -  - ")){
                    $oleo_essencial_5 = "0 - 0 - ";
                    
                }
                $oleo_essencial_6 = $this->request->getVar('oleo_essencial_6');
                if(($oleo_essencial_6 === "") || ($oleo_essencial_6 === " -  - ")){
                    $oleo_essencial_6 = "0 - 0 - ";
               
                }
                $gota_essencial_1 = $this->request->getVar('gota_essencial_1') ;
                if(($gota_essencial_1 === "") || ($oleo_essencial_1 === "") || ($oleo_essencial_1 === " -  - ")){
                    $gota_essencial_1 = 0;
                }
                $gota_essencial_2 = $this->request->getVar('gota_essencial_2') ;
                if(($gota_essencial_2 === "") || ($oleo_essencial_2 === "") || ($oleo_essencial_2 === " -  - ")){
                    $gota_essencial_2 = 0;
                }
                $gota_essencial_3 = $this->request->getVar('gota_essencial_3');
                if($gota_essencial_3 === ""){
                    $gota_essencial_3 = 0;
                }
               
                $gota_essencial_4 = $this->request->getVar('gota_essencial_4');
                if($gota_essencial_4 === ""){
                    $gota_essencial_4 = 0;
                }
                $gota_essencial_5 = $this->request->getVar('gota_essencial_5');
                if($gota_essencial_5 === ""){
                    $gota_essencial_5 = 0;
                }
                $gota_essencial_6 = $this->request->getVar('gota_essencial_6');
                if($gota_essencial_6 === ""){
                    $gota_essencial_6 = 0;
                }
                $ml_oleo_base=$this->request->getVar('ml_oleo_base') ;
                if($ml_oleo_base === ""){
                    $ml_oleo_base = 0;
                }
                $ml_oleo_base2=$this->request->getVar('ml_oleo_base2') ;
                if($ml_oleo_base2 === ""){
                    $ml_oleo_base2 = 0;
                }

                $oleo_base2 = $this->request->getVar('oleo_base2');
                if(($oleo_base2 === " -  - ") || ($oleo_base2 === "" )){
                    $oleo_base2 = "0 - 0 - ";
                }

                if(($oleo_essencial_2 === "0 - 0 - ") || ($oleo_essencial_2 === " -  - ")){
                    $gota_essencial_2 = 0;
                }
                if(($oleo_essencial_3 === "0 - 0 - ") || ($oleo_essencial_3 === " -  - ")){
                    $gota_essencial_3 = 0;
                }
                if(($oleo_essencial_4 === "0 - 0 - ") || ($oleo_essencial_4 === " -  - ")){
                    $gota_essencial_4 = 0;
                }
                if(($oleo_essencial_5 === "0 - 0 - ") || ($oleo_essencial_5 === " -  - ")){
                    $gota_essencial_5 = 0;
                }
                if(($oleo_essencial_6 === "0 - 0 - ") || ($oleo_essencial_6 === " -  - ")){
                    $gota_essencial_6 = 0;
                }    
               

                $model= new Frasco_Model();
                $n_frasco= explode(" - ",  $frasco);
                //$n_frasco[0];
                $nome_frasco['n'] = $model->frasco_edit($n_frasco[0]);
                $model =  new Acessorio_Model();
                $nome_acessorio = explode(" - ",$acessorio);
                $n_acessorio['acessorio']= $model->acessorio_edit($nome_acessorio[0]); 

                $data=[
                    'id'=>$this->request->getVar('id'),
                    'nome_simulacao' => $this->request->getVar('nome_simulacao'),
                    'mloe_por_cento' => $this->request->getVar('mloe_por_cento'),
                    'ml_o_essencial' => $this->request->getVar('ml_o_essencial'),
                    'cliente' => $cliente,
                    'ml_o_essencial' => $this->request->getVar('ml_o_essencial'),
                    'acessorio' =>  $acessorio,
                    'frasco'  =>  $frasco,
                    'oleo_base'  => $oleo_base,
                    'ml_oleo_base'  => $ml_oleo_base,
                    'oleo_base2'  => $oleo_base2,
                    'ml_oleo_base2'  => $ml_oleo_base2,
                    'oleo_essencial_1'  => $oleo_essencial_1 ,
                    'gota_essencial_1'  => $gota_essencial_1,
                    'oleo_essencial_2'  => $oleo_essencial_2 ,
                    'gota_essencial_2'  => $gota_essencial_2,
                    'oleo_essencial_3'  => $oleo_essencial_3 ,
                    'gota_essencial_3'  => $gota_essencial_3,
                    'oleo_essencial_4'  => $oleo_essencial_4 ,
                    'gota_essencial_4'  => $gota_essencial_4,
                    'oleo_essencial_5'  =>$oleo_essencial_5 ,
                    'gota_essencial_5'  => $gota_essencial_5,
                    'oleo_essencial_6'  => $oleo_essencial_6 ,
                    'gota_essencial_6'  => $gota_essencial_6,
                    'porcentagem_lucro' =>$this->request->getVar('porcentagem_lucro'),
                    'nome_frasco'  => $nome_frasco['n']['nome'],
                    'nome_acessorio'=> $n_acessorio['acessorio']['nome'],
                    'validade'=> $this->request->getVar('validade'),
                    
                ];
                echo view('template/header');
                echo view('calculo',$data);
                echo view('template/footer');

          
    }
    
	//--------------------------------------------------------------------
    public function store()
    {  
        helper(['form', 'url']);
        $model =  new simulacao_Model();
        $db = db_connect();
       
            $model->save([
                'id'=>$this->request->getVar('id'),
                'nome_simulacao' => $this->request->getVar('nome_simulacao'),
                'mloe_por_cento' => $this->request->getVar('mloe_por_cento'),
                'ml_o_essencial' => $this->request->getVar('ml_o_essencial'),
                'id_cliente'=> $this->request->getVar('id_cliente'),
                'id_frasco'=>$this->request->getVar('id_frasco'),
                'id_acessorio'=>$this->request->getVar('id_acessorio'),
                'id_oleo_base'=>$this->request->getVar('id_oleo_base'),
                'ml_oleo_base'=>$this->request->getVar('ml_oleo_base'),
                'id_oleo_base2'=>$this->request->getVar('id_oleo_base2'),
                'ml_oleo_base2'=>$this->request->getVar('ml_oleo_base2'),
                'id_oleo_essencial1'=>$this->request->getVar('id_oleo_essencial1'),
                'id_oleo_essencial2'=>$this->request->getVar('id_oleo_essencial2'),
                'id_oleo_essencial3'=>$this->request->getVar('id_oleo_essencial3'),
                'id_oleo_essencial4'=>$this->request->getVar('id_oleo_essencial4'),
                'id_oleo_essencial5'=>$this->request->getVar('id_oleo_essencial5'),
                'id_oleo_essencial6'=>$this->request->getVar('id_oleo_essencial6'),
                'ge1'=>$this->request->getVar('ge1'),
                'ge2'=>$this->request->getVar('ge2'),
                'ge3'=>$this->request->getVar('ge3'),
                'ge4'=>$this->request->getVar('ge4'),
                'ge5'=>$this->request->getVar('ge5'),
                'ge6'=>$this->request->getVar('ge6'),
                'lucro'=>$this->request->getVar('lucro'),
                'preco_parcial'=>$this->request->getVar('preco_parcial'),
                'margem_lucro'=>$this->request->getVar('margem_lucro'),
                'total'=>$this->request->getVar('preco_total'),
                'data'=>$this->request->getVar('data'),
                'oleo_essencial1'=>$this->request->getVar('oleo_essencial1'),
                'oleo_essencial2'=>$this->request->getVar('oleo_essencial2'),
                'oleo_essencial3'=>$this->request->getVar('oleo_essencial3'),
                'oleo_essencial4'=>$this->request->getVar('oleo_essencial4'),
                'oleo_essencial5'=>$this->request->getVar('oleo_essencial5'),
                'oleo_essencial6'=>$this->request->getVar('oleo_essencial6'),
                'nome_oleo_base'=>$this->request->getVar('nome_oleo_base'),
                'nome_oleo_base2'=>$this->request->getVar('nome_oleo_base2'),
            
            ]);

            $builder = $model->builder();
            $session = \Config\Services::session();
            if($builder->db->affectedRows() >0){
                
                $session->setFlashdata('msg', 'Orçamento Cadastrado com Sucesso');
                return redirect("listar_orcamento");
            }
            return redirect("listar_orcamento");
        }
       
      
     
        
      
    


    public function edit($id = null){
        
        
        $model= new Simulacao_Model();
        $data2 =['query'=>$model->get_cliente(),
        'query2'=>$model->get_acessorio(),
        'query3'=>$model->get_frasco(),
        'query4'=>$model->get_oleo_base(),
        'query5'=>$model->get_oleo_essencial(),
        'simulacao'=> $model->get_orcamento_edit_by_id($id),
    ];
          
   
        echo view('template/header');
		echo view('simulacao',$data2);
        echo view('template/footer'); 
    }


    public function delete(){
        $id= $this->request->getVar('id');
        $db = db_connect();
        $builder = $db->table('simulacao');
        $builder->where('id', $id);
        $builder->delete();
        
        //return $this->response->redirect(site_url('/listar_oleo'));
       
    }

    public function t1()
	{
		
		$model= new Simulacao_Model();
        $data =['query' =>  $model->get_table1()];
        echo view('template/header');
		echo view('tabela1',$data);
		echo view('template/footer');
       
		
    }
    public function t2()
	{
		
		$model= new Simulacao_Model();
        $data =['query' =>  $model->get_table2()];
        echo view('template/header');
		echo view('tabela2',$data);
		echo view('template/footer');
       
		
    }

}
