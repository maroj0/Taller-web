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

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $nombre = $this->request->getPost('nombre');


        $hash_validacion=hash('sha256', $email . rand());

        $model = model(UserModel::class);

        $model->save([
            'email' => $email,
            'password'  => $password,
            'nombre'  => $nombre,
            'hash_validacion' => $hash_validacion
        ]);

        //$id=$model->insertID;

        $data=array('error','success');

        if(isset($model->insertID)){
            $data['success']='Usuario creado correctamente';
            return view ('iniciar_sesion',$data);
        }else{
            $data['error']='Error al crear el usuario';
            return view ('registrar',$data);
        }
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
        return view('registrar');
    }

    public function login (){
        return view ('iniciar_sesion');
    }

    public function verificaremail(){
        /*$email = $_POST['email'];
        $model = model(UserModel::class);
        if($model.consultarEmail($email)){
            $data['return'] = 0;
			$data['mensaje'] = 'Email invalido';
			echo  json_encode($data);
			return;
        }else{
            $data['return'] = 1;
			$data['mensaje'] = 'Email valido';
			echo  json_encode($data);
			return;
        }*/
        $data['return'] = 0;
		$data['mensaje'] = 'Email invalido';
		echo json_encode($data);
    }
        return view('registro_usuario.php')
    }

}