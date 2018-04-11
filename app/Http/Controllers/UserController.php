<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Departamento;
use App\Ciudad;
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

    public function modificarPerfil(){
        $departamentos = Departamento::all();
        $ciudades = Ciudad::all();
    	$user = Auth::User();
        return View('Users.perfil')->with('user',$user)
        ->with('departamentos',$departamentos)
        ->with('ciudades', $ciudades);
    }

    public function postmodificarPerfil(Request $request){
        
    }

}
