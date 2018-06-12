<?php
/*Realizado por Daniel Alejandro Rivera, ing*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Agenda;
use App\Empresa;
use App\Laboratorio;
use App\HistoriaClinica;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class WelcomeAdminController extends Controller
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
        $empresa = Empresa::find($user->idEmpresa);
        $agendas = Agenda::Admin($user->idEmpresa)->get();
        $personales = User::Empresa($user->idEmpresa)->get();
        $laboratorio = Laboratorio::Empresa($user->idEmpresa)->get();

        $citas2array = array();
        $fechaActual = Carbon::now()->subHour(5);

        for ($i=0; $i <sizeof($laboratorio) ; $i++) { 
            $fechaEntrega = Carbon::parse($laboratorio[$i]->fechaEntrega);
            $diferencia = $fechaActual->diffInDays($fechaEntrega, false);
            if($diferencia >= 0){
                $historia = HistoriaClinica::find($laboratorio[$i]->idHistoriaClinica);
                array_push($citas2array, array($historia->documento, $diferencia));
            }
        }

        return View('WelcomeAdmin.welcome')
        ->with('agendas',$agendas)
        ->with('personales',$personales)
        ->with('empresa',$empresa)
        ->with('citas2array',$citas2array)
        ->with('user',$user);
    }
}
