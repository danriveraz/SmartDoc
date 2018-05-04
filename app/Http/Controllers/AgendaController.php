<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Personal;
use App\Agenda;
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

    public function postcrearAgenda(Request $request){

        $userActual = Auth::user();
        $evento = new Agenda();

        $evento->titulo = $request->titulo;
        $evento->fechaInicio = $request->fechaInicio;
        $evento->hora = $request->hora;
        $evento->horaFin = $request->horaFin;
        $evento->idUsuario = $request->personal;
        $evento->idEmpresa = $userActual->idEmpresa;
        $evento->color = "orange";
        $evento->save();

        flash('Registro exitoso')->success()->important();
        return redirect('/WelcomeAdmin');
    }

    public function posteditAgenda(Request $request, $id){
        $titulo = "titulo".$id;
        $fechaInicio = "fechaInicio".$id;
        $hora = "hora".$id;
        $horaFin = "horaFin".$id;
        $personal = "personal".$id;
        $color = "color".$id;

        $agenda2update = Agenda::find($id);

        $agenda2update->titulo = $request->$titulo;
        $agenda2update->fechaInicio = $request->$fechaInicio;
        $agenda2update->hora = $request->$hora;
        $agenda2update->horaFin = $request->$horaFin;
        $agenda2update->idUsuario = $request->$personal;
        $agenda2update->color = $request->$color;
        $agenda2update->save();

        flash('Modificación exitosa')->success()->important();
        return redirect('/WelcomeAdmin');   
    }

    public function postdeleteAgenda(Request $request, $id){
        $agenda2destroy = Agenda::find($id);
        $agenda2destroy->delete();
        flash('Eliminación exitosa')->success()->important();
        return redirect('/WelcomeAdmin');
    }
}
