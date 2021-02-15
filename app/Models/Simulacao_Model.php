<?php namespace App\Models;

use CodeIgniter\Model;


class Simulacao_Model extends Model
{
    protected $table      = 'simulacao';
    protected $primaryKey= 'id';
    protected $allowedFields = ['id_cliente','id_acessorio','id_frasco','ml_o_essencial','mloe_por_cento',
    'id_oleo_base','ml_oleo_base','id_oleo_base2','ml_oleo_base2',
    'id_oleo_essencial1','id_oleo_essencial2','id_oleo_essencial3','id_oleo_essencial4','id_oleo_essencial5',
    'id_oleo_essencial6','preco_parcial','lucro','margem_lucro','total','data','ge1','ge2','ge3','ge4','ge5','ge6',
    'oleo_essencial1','oleo_essencial2','oleo_essencial3','oleo_essencial4','oleo_essencial5','oleo_essencial6'
    ,'nome_simulacao','ml_o_essencial','mloe_por_cento','nome_oleo_base','nome_oleo_base2'
    ];
    protected $validationRules    = [];
    protected $validationMessages = [];
   
    public function get_Orcamentos(){
        $db      = \Config\Database::connect();
        $query   = $db->query('
        SELECT 
        s.id as simulacao_id,c.nome as cliente_n,f.nome as frasco_nome,f.valor as frasco_valor,
        a.nome as acessorio_nome,a.valor as acessorio_valor,s.oleo_essencial1,s.oleo_essencial2,s.oleo_essencial3,s.oleo_essencial4,
        s.oleo_essencial5,s.oleo_essencial6,
        s.ge1 as ge11,s.ge2 as ge22,s.ge2 as ge33,s.ge3 as ge44,s.ge5 as ge55,s.ge6 as ge66,
        s.preco_parcial as pp,s.lucro as l,s.margem_lucro as ml,s.total as t, s.data as dt,
        ob.nome as nome_oleo_base,s.ml_oleo_base as ml_ob,ob.nome as nome_oleo_base2,s.ml_oleo_base2 as ml_ob2 
        from simulacao as s 
        inner join cliente as c on s.id_cliente = c.id 
        inner join frasco as f on s.id_frasco = f.id 
        inner join acessorio as a on s.id_acessorio = a.id
        inner join oleo_base as ob on s.id_oleo_base = ob.id'
      
        );
        return $results = $query->getResultArray();
    }
    public function get_cliente(){
        $db=\Config\Database::connect();
        $query = $db->table('cliente')->get();
        //$query = $builder->getWhere(['user_id' => $id_user]);   
        return $result =$query->getResultArray(); 
    }

    public function get_acessorio(){
        $db      = \Config\Database::connect();
        $query = $db->table('acessorio')->get();
        //$query = $builder->getWhere(['user_id' => $id_user]);   
        return $result =$query->getResultArray(); 
    }

    public function get_frasco(){
        $db      = \Config\Database::connect();
        $query = $db->table('frasco')->get();
        //$query = $builder->getWhere(['user_id' => $id_user]);   
        return $result =$query->getResultArray(); 
    }
    public function get_orcamento_by_id($id){
       
        $db      = \Config\Database::connect();
        $builder = $db->table('simulacao as s');
        $builder->select( '*');
        $builder->join('oleo_base as ob', 'ob.id = s.id_oleo_base');
        $query = $builder->getWhere(['s.id' => $id]);   
        return $row=$query->getRowArray();
    }
    public function get_orcamento_edit_by_id($id){
       
        $db      = \Config\Database::connect();
        $builder = $db->table('simulacao as s');
        $builder->select( ' s.id as simulacao_id,s.id_cliente as id_cliente,c.nome as cliente_n,
        s.id_frasco as id_frasco, f.nome as frasco_nome,f.valor as frasco_valor,
        s.id_acessorio as id_acessorio,a.nome as acessorio_nome,a.valor as acessorio_valor,
        s.oleo_essencial1,s.oleo_essencial2,s.oleo_essencial3,s.oleo_essencial4,s.oleo_essencial5,s.oleo_essencial6,
        s.id_oleo_essencial1,s.id_oleo_essencial2,s.id_oleo_essencial3,s.id_oleo_essencial4,s.id_oleo_essencial5
        ,s.id_oleo_essencial6,
        s.ge1 as ge11,s.ge2 as ge22,s.ge3 as ge33,s.ge3 as ge44,s.ge5 as ge55,s.ge6 as ge66,
        s.preco_parcial as pp,s.lucro as l,s.margem_lucro as ml,s.total as t, s.data as dt,
        s.id_oleo_base as id_oleo_base,ob.nome as nome_oleo_base,s.ml_oleo_base as ml_ob,s.ml_oleo_base2 as ml_ob2,
        ob.preco_ml as preco_ml,ob.ml_antes as ml_antes,ob.ml, 
        s.id_oleo_base2 as id_oleo_base2,s.nome_simulacao,s.ml_o_essencial,s.mloe_por_cento
        ');
        
        $builder->join('oleo_base as ob', 'ob.id = s.id_oleo_base');
        $builder->join('frasco as f', 'f.id = s.id_frasco');
        $builder->join('acessorio as a', 'a.id = s.id_acessorio');
        $builder->join('cliente as c', 'c.id = s.id_cliente');
        $query = $builder->getWhere(['s.id' => $id]);   
        return $row=$query->getRowArray();
    }

    public function get_cliente_by_id($id){
       
        $db      = \Config\Database::connect();
        $builder = $db->table('cliente');
        $query = $builder->getWhere(['id' => $id]);   
        return $row=$query->getRowArray();
    }
    public function get_acessorio_by_id($id){
       
        $db      = \Config\Database::connect();
        $builder = $db->table('acessorio');
        $query = $builder->getWhere(['id' => $id]);   
        return $row=$query->getRowArray();
    }
    public function get_frasco_by_id($id){
       
        $db      = \Config\Database::connect();
        $builder = $db->table('frasco');
        $query = $builder->getWhere(['id' => $id]);   
        return $row=$query->getRowArray();
    }

    public function get_oleo_base(){
        $db      = \Config\Database::connect();
        $query = $db->table('oleo_base')->get();
        //$query = $builder->getWhere(['user_id' => $id_user]);   
        return $result =$query->getResultArray(); 
    }
    public function get_oleo_base_by_id($id){
       
        $db      = \Config\Database::connect();
        $builder = $db->table('oleo_base');
        $query = $builder->getWhere(['id' => $id]);   
        return $row=$query->getRowArray();
    }

    public function get_oleo_essencial(){
        $db      = \Config\Database::connect();
        $query = $db->table('oleo_essencial')->get();
        //$query = $builder->getWhere(['user_id' => $id_user]);   
        return $result =$query->getResultArray(); 
    }


    public function get_oe_by_id($id){
        $db      = \Config\Database::connect();
        $builder = $db->table('oleo_essencial');
        $query = $builder->getWhere(['id' => $id]);   
        return $row=$query->getRowArray();
    }
    
    public function get_table1(){
        $db      = \Config\Database::connect();
        $builder = $db->table('table1')->get();
        return $row=$builder->getResultArray();
    }
    public function get_table2(){
        $db      = \Config\Database::connect();
        $builder = $db->table('table2')->get(); 
        return $row=$builder->getResultArray();
    }

        
        
    }
   
    

