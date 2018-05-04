<?php
/*Realizado por Daniel Alejandro Rivera, ing*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Agenda;
use App\Empresa;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class WelcomeAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $userActual = Auth::user();
        if($userActual != null){
            if (!$userActual->esAdmin) {
                flash('No Tiene Los Permisos Necesarios')->error()->important();
                return redirect('/WelcomeTrabajador');
            }
        }

    }

    public function index()
    {
        $user = Auth::User();
        $empresa = Empresa::find($user->idEmpresa);
        $agendas = Agenda::Admin($user->idEmpresa)->get();
        $personales = User::Empresa($user->idEmpresa)->get();
        return View('WelcomeAdmin.welcome')
        ->with('agendas',$agendas)
        ->with('personales',$personales)
        ->with('empresa',$empresa)
        ->with('user',$user);
    }
}
