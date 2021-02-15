<?php namespace App\Models;

use CodeIgniter\Model;

class Acessorio_Model extends Model
{
    protected $table      = 'acessorio';
    protected $primaryKey= 'id';
    protected $allowedFields = ['nome','valor','descricao'];
    protected $validationRules    = [];
    protected $validationMessages = [];
   
    public function get_acessorio(){
        $db      = \Config\Database::connect();
        $query = $db->table('acessorio')->get();
        //$query = $builder->getWhere(['user_id' => $id_user]);   
        return $result =$query->getResultArray(); 
    }

    public function acessorio_edit($id_acessorio){
  
        $db      = \Config\Database::connect();
        $builder = $db->table('acessorio');
        $query = $builder->getWhere(['id' => $id_acessorio]);   
        return $row=$query->getRowArray();
        
        }

        public function get_acessorio_root(){
            $db      = \Config\Database::connect();
            $builder = $db->table('acessorio');
            $query = $builder->getWhere(['id <>' => 4]);   
            return $row=$query->getResultArray(); 
        }
}