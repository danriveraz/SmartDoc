<?php
/*Realizado por Daniel Alejandro Rivera, ing*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Agenda;
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
        $empresa = Empresa::find($user->idEmpresa);
        $agendas = Agenda::Trabajador($user->id)->get();
        $flag = "agenda";
        
        return View('WelcomeTrabajador.welcome')
        ->with('empresa',$empresa)
        ->with('agendas',$agendas)
        ->with('user',$user)
        ->with('flag', $flag);
    }
}
