<?php namespace App\Models;

use CodeIgniter\Model;

class User_Model extends Model
{
    protected $table = 'user';
    protected $primaryKey= 'id';
    protected $allowedFields = ['nome','email','senha'];
    protected $validationRules    = [];
    protected $validationMessages = [];
   


    public function get_users($nome = null){
        $db = db_connect();
        if($nome === null){
            return $this->findAll();
        }else{
            return $this->asArray()->where(['email' => $nome])->first();
        }
        
    }



    
}