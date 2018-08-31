<?php
/*Realizado por Daniel Alejandro Rivera, ing*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Agenda;
use App\HistoriaClinica;
use App\Procedimiento;
use App\Servicio;
use App\Empresa;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class WelcomeTrabajadorController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {	
        $user = Auth::User();

        if($user->esEmpleado){
            $empresa = Empresa::find($user->idEmpresa);
            $agendas = Agenda::Trabajador($user->id)->get();
            $flag = "agenda";

            return View('WelcomeTrabajador.welcome')
            ->with('empresa',$empresa)
            ->with('agendas',$agendas)
            ->with('user',$user)
            ->with('flag', $flag);
        }else{
            $user = Auth::User();
            $historiasClinicas = HistoriaClinica::admin($user->idEmpresa)->get();
            $procedimientos = Procedimiento::admin($user->idEmpresa)->get();
            $servicios = Servicio::Empresa($user->idEmpresa)->get();
            $empresa = Empresa::find($user->idEmpresa);
            $flag = "servicio";
            return View('Servicio.servicio')
            ->with('user',$user)
            ->with('empresa',$empresa)
            ->with('procedimientos',$procedimientos)
            ->with('servicios',$servicios)
            ->with('historiasClinicas',$historiasClinicas)
            ->with('flag', $flag);
        }
    }
}
