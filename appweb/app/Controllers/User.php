<?php

namespace App\Controllers;
//use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function list(){
        
        $model = model(UserModel::class);
        $data['users'] = $model->list();
        return view('listado',$data);

    }

    public function insert(){

        $model = model(UserModel::class);

        $model->save([
            'usuario' => 'hotmail.com',
            'pass'  => '1234',
            'nombre'  => 'asfasfsf de prueba',
        ]);

        $id=$model->insertID;

        print_r('guardo todo bien id:'.$id);
    }

    public function register(){
        return view('registro_usuario.php')
    }

}