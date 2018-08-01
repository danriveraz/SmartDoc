<?php
/*Realizado por Daniel Alejandro Rivera, ing*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Cuentas;
use App\Empresa;
use App\Http\Requests;

class CuentasController extends Controller
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

   	public function index()
    {
    	$user = Auth::User();
      $cuentas = Cuentas::Empresa($user->idEmpresa)->get();
      $empresa = Empresa::find($user->idEmpresa);
      $flag = "servicio";
    	return View('Cuentas.cuentas')
    	->with('cuentas',$cuentas)
    	->with('empresa',$empresa)
    	->with('user',$user)
      ->with('flag', $flag);
    }
}
