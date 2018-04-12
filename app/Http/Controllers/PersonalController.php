<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Departamento;
use App\Ciudad;
use App\Http\Requests;

class PersonalController extends Controller
{
    public function modificarPersonal(){
    	$departamentos = Departamento::all();
        $ciudades = Ciudad::all();
    	$user = Auth::User();
    	return View('Personal.personal')->with('user',$user)
    	->with('departamentos',$departamentos)
        ->with('ciudades', $ciudades);
    }

     public function postmodificarPersonal(Request $request){
    	dd($request->nombre);
    }
}
