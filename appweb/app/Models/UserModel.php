<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{
    protected $table = 'usuario';
    protected $allowedFields = ['nombre','email','contrasena','apellido','genero','numtel','fechanacimiento','pagweb','pais','provincia','ciudad','calle','altura','id'];

    public function list(){
        return $this->findAll();
    }

    public function consultarEmail($email){
        $x=$this->db->table('usuario');
        $resultado= $x->where('email',$email)->get();
        if(count($resultado->getResultArray()) <1){
            return False;
        }else{
            return True;
        }
    }

    public function consultarIniciarSesion($email,$contrasena){
        $x=$this->db->table('usuario');
        $resultado= $x->where('email',$email)->first();
        if($resultado){
            if($resultado['contrasena']==$contrasena){
                return True;
            }else{
                return False;
            }
        }
    }
   
}