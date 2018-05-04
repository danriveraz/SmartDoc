<?php
/*Realizado por Daniel Alejandro Rivera, ing*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
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
        return View('WelcomeTrabajador.welcome')
        ->with('empresa',$empresa)
        ->with('user',$user);
    }
}
