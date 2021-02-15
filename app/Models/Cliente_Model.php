<?php namespace App\Models;

use CodeIgniter\Model;

class Cliente_Model extends Model
{
    protected $table      = 'cliente';
    protected $primaryKey= 'id';
    protected $allowedFields = ['nome','telefone','endereco','email','celular'];
    protected $validationRules    = [];
    protected $validationMessages = [];
   
    public function get_cliente(){
        $db      = \Config\Database::connect();
        $query = $db->table('cliente')->get();
        //$query = $builder->getWhere(['user_id' => $id_user]);   
        return $result =$query->getResultArray(); 
    }

    public function get_cliente_root(){
        $db      = \Config\Database::connect();
        $builder = $db->table('cliente');
        $query = $builder->getWhere(['id <>' => 4]);   
        return $row=$query->getResultArray(); 
    }
    public function cliente_edit($id_cliente){
  
        $db      = \Config\Database::connect();
        $builder = $db->table('cliente');
        $query = $builder->getWhere(['id' => $id_cliente]);   
        return $row=$query->getRowArray();
        
        }
}