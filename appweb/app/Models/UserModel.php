<?php

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'usuarios';
    protected $allowedFields = ['email', 'password', 'nombre', 'hash_validacion'];
    
    public function list(){
        return $this->findAll();
    }

    public function consultarEmail(email){
        $x=$this->where(['email'=>$email])->first();
        if(!empty($x) and $x==email){
            return true
        }else{
            return false
        }
    }

}