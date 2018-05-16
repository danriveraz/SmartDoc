<?php
/*Realizado por Daniel Alejandro Rivera, ing*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\HistoriaClinica;
use App\Laboratorio;
use App\Empresa;
use App\Http\Requests;
use Laracasts\Flash\Flash;

class LaboratorioController extends Controller
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

    public function createLaboratorio(){
        $user = Auth::User();
        $historiasClinicas = HistoriaClinica::admin($user->idEmpresa)->get();
        $laboratorios = Laboratorio::Empresa($user->idEmpresa)->get();
        $empresa = Empresa::find($user->idEmpresa);
       	return View('Laboratorio.laboratorio')
       	->with('user',$user)
        ->with('empresa',$empresa)
        ->with('laboratorios',$laboratorios)
       	->with('historiasClinicas',$historiasClinicas);
    }

    public function postcreateLaboratorio(Request $request){
        $user = Auth::User();
        $laboratorio = new Laboratorio();

        $laboratorio->nombreLaboratorio = $request->nombreLaboratorio;
        $laboratorio->idHistoriaClinica = $request->cedulaPaciente;
        $laboratorio->nombrePaciente = $request->nombrePaciente;
        $laboratorio->referencia = $request->referencia;
        $laboratorio->valor = $request->valor;
        $laboratorio->fechaEnvio = $request->fechaEnvio;
        $laboratorio->fechaEntrega = $request->fechaEntrega;
        $laboratorio->idEmpresa = $user->idEmpresa;
        $laboratorio->save();
        flash('Registro exitoso')->success()->important();
        return redirect('/Laboratorio');
    }

    public function postupdateLaboratorio(Request $request, $id){
        $nombreLaboratorio = "nombreLaboratorio".$id;
        $referencia = "referencia".$id;
        $valor = "valor".$id;
        $fechaEnvio = "fechaEnvio".$id;
        $fechaEntrega = "fechaEntrega".$id;

        $laboratorio2update = Laboratorio::find($id);
        $laboratorio2update->nombreLaboratorio = $request-> $nombreLaboratorio;
        $laboratorio2update->referencia = $request->$referencia;
        $laboratorio2update->valor = $request->$valor;
        $laboratorio2update->fechaEnvio = $request->$fechaEnvio;
        $laboratorio2update->fechaEntrega = $request->$fechaEntrega;

        $laboratorio2update->save();
        flash('Modificación exitosa')->success()->important();
        return redirect('/Laboratorio');
    }


    public function postdeleteLaboratorio($id){
        $laboratorio2delete = Laboratorio::find($id);
        $laboratorio2delete->delete();
        flash('Eliminación exitoso')->success()->important();
        return redirect('/Laboratorio');
    }
}
