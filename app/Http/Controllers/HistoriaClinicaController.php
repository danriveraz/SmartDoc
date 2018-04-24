<?php
/*Realizado por Daniel Alejandro Rivera, ing*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Departamento;
use App\Ciudad;
use App\HistoriaClinica;
use App\Http\Requests;

class HistoriaClinicaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $userActual = Auth::user();
        if($userActual != null){
          if($userActual->esPropietario){
            return redirect('/Registro');
          }else if (!$userActual->esAdmin) {
              flash('No Tiene Los Permisos Necesarios')->error()->important();
              return redirect('/WelcomeTrabajador')->send();
          }
        }

    }

    public function historiaClinica(){
        $user = Auth::User();
        $historiasClinicas = HistoriaClinica::admin($user->id)->get();

       	return View('HistoriaClinica.historiaClinica')
       	->with('user', $user)
        ->with('historiasClinicas', $historiasClinicas);
    }

    public function createHistoriaClinica(){
        $user = Auth::User();
        $departamentos = Departamento::all();
        $ciudades = Ciudad::all();
        return View('HistoriaClinica.crearHistoriaClinica')
        ->with('departamentos',$departamentos)
        ->with('ciudades', $ciudades)
        ->with('user',$user);
    }
}
