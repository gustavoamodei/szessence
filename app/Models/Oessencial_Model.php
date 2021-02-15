<?php namespace App\Models;

use CodeIgniter\Model;

class Oessencial_Model extends Model
{
    protected $table      = 'oleo_essencial';
    protected $primaryKey= 'id';
    protected $allowedFields = ['nome','ml','preco_gota','valor_compra','validade','total_gotas'];
    protected $validationRules    = [];
    protected $validationMessages = [];
   
    public function get_oleo_essencial(){
        $db      = \Config\Database::connect();
        $query = $db->table('oleo_essencial')->get();
        //$query = $builder->getWhere(['user_id' => $id_user]);   
        return $result =$query->getResultArray(); 
    }
    
    public function oleo_essencial_edit($id_o_essencial){
  
        $db      = \Config\Database::connect();
        $builder = $db->table('oleo_essencial');
        $query = $builder->getWhere(['id' => $id_o_essencial]);   
        return $row=$query->getRowArray();
        
        }
}