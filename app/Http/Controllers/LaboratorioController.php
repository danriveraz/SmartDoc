<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Procedimiento;
use App\Empresa;
use App\Http\Requests;
use Laracasts\Flash\Flash;

class LaboratorioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $userActual = Auth::user();
        if($userActual != null){
          if (!$userActual->esAdmin) {
              flash('No Tiene Los Permisos Necesarios')->error()->important();
              return redirect('/WelcomeTrabajador')->send();
          }
        }

    }

    public function createLaboratorio(){
        $user = Auth::User();
        $procedimientos = Procedimiento::admin($user->idEmpresa)->get();
        $empresa = Empresa::find($user->idEmpresa);
       	return View('Procedimiento.procedimientos')
       	->with('user',$user)
        ->with('empresa',$empresa)
       	->with('procedimientos',$procedimientos);
    }
}
