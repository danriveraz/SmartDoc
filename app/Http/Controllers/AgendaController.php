<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Personal;
use App\Http\Requests;
use Laracasts\Flash\Flash;

class AgendaController extends Controller
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

    public function modificarAgenda(){
        $user = Auth::User();
        $personales = Personal::admin($user->id)->get();
        $personalesIzq = array();
        $personalesDer = array();
        foreach ($personales as $key => $personal) {
            if ($key % 2 == 0) {
                array_push($personalesIzq, $personal);
            }else{
                array_push($personalesDer, $personal);
            }
        }
    	return View('Agenda.agenda')
    	->with('user',$user)
    	->with('personalesIzq', $personalesIzq)
    	->with('personalesDer', $personalesDer);
    }
}
