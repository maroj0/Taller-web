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
        if ($this->request->getMethod() == 'post'){
            $nuevoUsuario = new UserModel();
            if($nuevoUsuario->consultarEmail($this->request->getPost('email'))){
                echo '<script language="javascript">alert("Correo Invalido");</script>';
            }else{
                if($this->request->getPost('genero_masculino')  ){
                    $genero=1;
                }elseif ($this->request->getPost('genero_femenino')) {
                    $genero=2;
                }else{
                    $genero=0;
                }
                $datosNuevoUsuario = [
                    'email' => $this->request->getPost('email'),
                    'contrasena' => md5($this->request->getPost('contrasenia')),
                    'nombre' => $this->request->getPost('nombre_user'),
                    'apellido' => $this->request->getPost('apellido_user'),
                    'genero' => $genero,
                    'numtel' => $this->request->getPost('num_tel'),
                    'fechanacimiento' => $this->request->getPost('fecha_nacimiento'),
                    'pagweb' => $this->request->getPost('pagina_web'),
                    'pais' => $this->request->getPost('pais'),
                    'provincia' => $this->request->getPost('provincia'),
                    'ciudad' => $this->request->getPost('ciudad'),
                    'calle' => $this->request->getPost('calle_user'),
                    'altura' => $this->request->getPost('altura_calle'),
                ];
                $nuevoUsuario->save($datosNuevoUsuario);
                if(isset($nuevoUsuario->insertID)){
                    echo '<script language="javascript">alert("Usuario creado correctamente");</script>';
                    return view ('iniciar_sesion');
                }else{
                }
            }
        }
    }

    public function register(){
        return view('registrar');
    }

    public function mostrar_login (){
        return view ('iniciar_sesion');
    }

    public function verificaremail(){
        $email = json_decode($_POST['email']);
        $model = new UserModel();
        $bandera = $model->consultarEmail($email);
        if($bandera){
            $data['bandera'] = 0;
			$data['mensaje'] = 'Email invalido';
			echo  json_encode($data);
        }else{
            $data['bandera'] = 1;
			$data['mensaje'] = 'Email valido';
			echo  json_encode($data);
        }
    }

    public function iniciar_sesion(){
        $usuario = new UserModel();
        $email = $this->request->getPost('email');
        $contrasena = $this->request->getPost('contrasenia');
        $data = $usuario->where('email', $email)->first();
        if($data){
            if($data['contrasena']==md5($contrasena)){
                return view('home_page');
            }else{
                echo '<script language="javascript">alert("Correo o Contraseña Invalido");</script>';
                return view ('iniciar_sesion');
            }
        }
    }

}