<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Procedimiento;
use App\Http\Requests;
use Laracasts\Flash\Flash;

class ProcedimientoController extends Controller
{
    public function modificarProcedimiento(){
        $user = Auth::User();
        $procedimientos = Procedimiento::admin($user->id)->get();
       	return View('Procedimiento.procedimientos')
       	->with('user',$user)
       	->with('procedimientos',$procedimientos);
    }

    public function postmodificarProcedimiento(Request $request){
    	$userActual = Auth::User();
    	$procedimiento = new Procedimiento();
    	$procedimiento->nombre = $request->nombre;
    	$procedimiento->costo = $request->costo;
    	$procedimiento->descripcion = $request->descripcion;
    	$procedimiento->duracion = $request->duracion;
    	$procedimiento->idAdmin = $userActual->id;
    	$procedimiento->save();
    	flash('Registro exitoso')->success()->important();
		return redirect('/Procedimiento');
    }
}
