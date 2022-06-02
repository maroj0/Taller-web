<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
    public function usuarios($name){
        return "<h1>Hola mundo</h1>" . $name;
    }
}
