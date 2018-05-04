<?php
/*Realizado por Daniel Alejandro Rivera, ing*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Procedimiento;
use App\Http\Requests;
use Laracasts\Flash\Flash;

class ProcedimientoController extends Controller
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

    public function modificarProcedimiento(){
        $user = Auth::User();
        $procedimientos = Procedimiento::admin($user->idEmpresa)->get();
       	return View('Procedimiento.procedimientos')
       	->with('user',$user)
       	->with('procedimientos',$procedimientos);
    }

    public function postmodificarProcedimiento(Request $request){
    	$userActual = Auth::User();

    	$procedimiento = new Procedimiento();
    	$procedimiento->nombre = $request->nombre;
    	$procedimiento->costo = $request->costo;
        $procedimiento->venta = $request->venta;
        $procedimiento->ganancia = $procedimiento->venta - $procedimiento->costo;
    	$procedimiento->descripcion = $request->descripcion;
    	$procedimiento->duracion = $request->duracion;
    	$procedimiento->idEmpresa = $userActual->idEmpresa;
    	$procedimiento->save();
    	flash('Registro exitoso')->success()->important();
		return redirect('/Procedimiento');
    }

    public function postupdateProcedimiento(Request $request, $id){
    	$nombre = "nombre".$id;
        $costo = "costo".$id;
        $venta = "venta".$id;
        $duracion = "duracion".$id;
        $descripcion =  "descripcion".$id;

        $procedimiento2update = Procedimiento::find($id);

        $procedimiento2update->nombre = $request->$nombre;
        $procedimiento2update->costo = $request->$costo;
        $procedimiento2update->venta = $request->$venta;
        $procedimiento2update->ganancia = $procedimiento2update->venta - $procedimiento2update->costo;
        $procedimiento2update->duracion = $request->$duracion;
        $procedimiento2update->descripcion = $request->$descripcion;
        $procedimiento2update->save();
        flash('Modificación exitoso')->success()->important();
		return redirect('/Procedimiento');
    }

    public function postdeleteProcedimiento(Request $request, $id){
        $procedimiento2destroy = Procedimiento::find($id);
        $procedimiento2destroy->delete();
        flash('Eliminación exitosa')->success()->important();
        return redirect('/Procedimiento');
    }
}
