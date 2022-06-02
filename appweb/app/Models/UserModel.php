<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{
    protected $table = 'usuarios';
    protected $allowedFields = ['usuario','pass','nombre'];
    public function list(){
        return $this->findAll();
    }
   
}