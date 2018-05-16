<?php
/*Realizado por Daniel Alejandro Rivera, ing*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\HistoriaClinica;
use App\Procedimiento;
use App\Servicio;
use App\Empresa;
use App\Cuentas;
use Carbon\Carbon;
use App\Http\Requests;
use Laracasts\Flash\Flash;

class ServicioController extends Controller
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
        $procedimientos = Procedimiento::admin($user->idEmpresa)->get();
        $servicios = Servicio::Empresa($user->idEmpresa)->get();
        $empresa = Empresa::find($user->idEmpresa);
       	return View('Servicio.servicio')
       	->with('user',$user)
        ->with('empresa',$empresa)
        ->with('procedimientos',$procedimientos)
        ->with('servicios',$servicios)
       	->with('historiasClinicas',$historiasClinicas);
    }

    public function postdeleteServicio($id){

        $user = Auth::User();
        $servicio2delete = Servicio::find($id);
        $fecha = Carbon::parse($servicio2delete->fecha);
        $procedimiento = Procedimiento::find($servicio2delete->idProcedimiento);
        $cuentas = Cuentas::Empresa($user->idEmpresa)->first();
        $fechaActual = Carbon::now('COT');
        if($fechaActual->year == $fecha->year){
          if($fecha->month == 1){
            $cuentas->enero = $cuentas->enero - $procedimiento->venta;
          }else if($fecha->month == 2){
            $cuentas->febrero = $cuentas->febrero - $procedimiento->venta;
          }else if($fecha->month == 3){
            $cuentas->marzo = $cuentas->marzo - $procedimiento->venta;
          }else if($fecha->month == 4){
            $cuentas->abril = $cuentas->abril - $procedimiento->venta;
          }else if($fecha->month == 5){
            $cuentas->mayo = $cuentas->mayo - $procedimiento->venta;
          }else if($fecha->month == 6){
            $cuentas->junio = $cuentas->junio - $procedimiento->venta;
          }else if($fecha->month == 7){
            $cuentas->julio = $cuentas->julio - $procedimiento->venta;
          }else if($fecha->month == 8){
            $cuentas->agosto = $cuentas->agosto - $procedimiento->venta;
          }else if($fecha->month == 9){
            $cuentas->septiembre = $cuentas->septiembre - $procedimiento->venta;
          }else if($fecha->month == 10){
            $cuentas->octubre = $cuentas->octubre - $procedimiento->venta;
          }else if($fecha->month == 11){
            $cuentas->noviembre = $cuentas->noviembre - $procedimiento->venta;
          }else if($fecha->month == 12){
            $cuentas->diciembre = $cuentas->diciembre - $procedimiento->venta;
          }
          $cuentas->actual = $cuentas->actual - $procedimiento->venta;
          $cuentas->save();
        }

        //$servicio2delete->delete();
        
        flash('Eliminación exitoso')->success()->important();
        return redirect('/Servicio');
    }
}
