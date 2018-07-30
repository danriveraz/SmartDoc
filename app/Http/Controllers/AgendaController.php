<?php
/*Realizado por Daniel Alejandro Rivera, ing*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Mail;
use App\User;
use App\Personal;
use App\Procedimiento;
use App\HistoriaClinica;
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

        $procedimientos = Procedimiento::Admin($userActual->idEmpresa)->get();
        $historias = HistoriaClinica::admin($userActual->idEmpresa)->get();

        for ($i=0; $i < sizeof($procedimientos); $i++) { 
            if($procedimientos[$i]->id == $request->procedimiento){
                $evento->titulo = $procedimientos[$i]->nombre;
            }
        }
        if($request->nuevoviejo == 1){
            $evento->cedulaPaciente = $request->cedulaPaciente;
        }else{
            for ($i=0; $i < sizeof($historias); $i++) { 
                if($historias[$i]->id == $request->cedulaPacienteViejo){
                    $evento->cedulaPaciente = $historias[$i]->nombreCompleto;
                }
            }   
        }

        $evento->fechaInicio = $request->fechaInicio;
        $evento->hora = $request->hora;
        $evento->nombrePaciente = $request->nombrePaciente;
        $evento->emailPaciente = $request->emailPaciente;
        $evento->cedulaPaciente = $request->cedulaPaciente;
        $evento->telefonoPaciente = $request->telefonoPaciente;
        $evento->idUsuario = $request->personal;
        $evento->idProcedimiento = $request->procedimiento;
        $evento->idEmpresa = $userActual->idEmpresa;
        $evento->color = "orange";
        $evento->save();

        $data = $evento;
        $personal = User::find($evento->idUsuario);

        if($data->emailPaciente != ""){
            Mail::send('Emails.confirmacion', ['data' => $data, 'personal' => $personal], function($mail) use($data, $personal){
                $mail->to($data->emailPaciente)->subject('Confirmación de tu cita');
            });
        }

        flash('Registro exitoso')->success()->important();
        return redirect('/WelcomeAdmin');
    }

    public function posteditAgenda(Request $request, $id){
        $userActual = Auth::user();
        $titulo = "titulo".$id;
        $fechaInicio = "fechaInicio".$id;
        $hora = "hora".$id;
        $nombrePaciente = "nombrePaciente".$id;
        $emailPaciente = "emailPaciente".$id;
        $cedulaPaciente = "cedulaPaciente".$id;
        $telefonoPaciente = "telefonoPaciente".$id;
        $personal = "personal".$id;
        $procedimiento = "procedimiento".$id;
        $color = "color".$id;

        $agenda2update = Agenda::find($id);
        $procedimientos = Procedimiento::Admin($userActual->idEmpresa)->get();

        for ($i=0; $i < sizeof($procedimientos); $i++) { 
            if($procedimientos[$i]->id == $request->$procedimiento){
                $agenda2update->titulo = $procedimientos[$i]->nombre;
            }
        }
        $agenda2update->fechaInicio = $request->$fechaInicio;
        $agenda2update->hora = $request->$hora;
        $agenda2update->nombrePaciente = $request->$nombrePaciente;
        $agenda2update->emailPaciente = $request->$emailPaciente;
        $agenda2update->cedulaPaciente = $request->$cedulaPaciente;
        $agenda2update->telefonoPaciente = $request->$telefonoPaciente;
        $agenda2update->idUsuario = $request->$personal;
        $agenda2update->idProcedimiento = $request->$procedimiento;
        $agenda2update->color = $request->$color;
        $agenda2update->save();

        $data = $agenda2update;
        $personal = User::find($agenda2update->idUsuario);

        if($data->emailPaciente != ""){
            if($agenda2update->color == "red"){
                Mail::send('Emails.cancelacion', ['data' => $data], function($mail) use($data){
                    $mail->to($data->emailPaciente)->subject('Confirmación de tu cita');
                });
            }else if($agenda2update->color != "green"){
                Mail::send('Emails.modificacion', ['data' => $data, 'personal' => $personal], function($mail) use($data, $personal){
                    $mail->to($data->emailPaciente)->subject('Confirmación de tu cita');
                });
            }
        }

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
