<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    public function index(){
        return View('');
    }

    public function registro(){
        return View('Users.registro');
    }

    public function registroPropietario(){
        return View('Users.registroPropietario');
    }
}
