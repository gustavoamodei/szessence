<?php namespace App\Models;

use CodeIgniter\Model;

class Frasco_Model extends Model
{
    protected $table      = 'frasco';
    protected $primaryKey= 'id';
    protected $allowedFields = ['nome','valor','descricao'];
    protected $validationRules    = [];
    protected $validationMessages = [];
   
    public function get_frasco(){
        $db      = \Config\Database::connect();
        $query = $db->table('frasco')->get();
        //$query = $builder->getWhere(['user_id' => $id_user]);   
        return $result =$query->getResultArray(); 
    }

    public function frasco_edit($id_frasco){
  
        $db      = \Config\Database::connect();
        $builder = $db->table('frasco');
        $query = $builder->getWhere(['id' => $id_frasco]);   
        return $row=$query->getRowArray();
        
        }
}