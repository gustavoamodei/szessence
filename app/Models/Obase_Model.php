<?php namespace App\Models;

use CodeIgniter\Model;

class Obase_Model extends Model
{
    protected $table      = 'oleo_base';
    protected $primaryKey= 'id';
    protected $allowedFields = ['nome','ml','preco_ml','valor_compra','validade'];
    protected $validationRules    = [];
    protected $validationMessages = [];
   
    public function get_oleo_base(){
        $db      = \Config\Database::connect();
        $query = $db->table('oleo_base')->get();
        //$query = $builder->getWhere(['user_id' => $id_user]);   
        return $result =$query->getResultArray(); 
    }

    public function oleo_base_edit($id_o_base){
  
        $db      = \Config\Database::connect();
        $builder = $db->table('oleo_base');
        $query = $builder->getWhere(['id' => $id_o_base]);   
        return $row=$query->getRowArray();
        
        }
}