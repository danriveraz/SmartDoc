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
        $flag = "servicio";
       	return View('Servicio.servicio')
       	->with('user',$user)
        ->with('empresa',$empresa)
        ->with('procedimientos',$procedimientos)
        ->with('servicios',$servicios)
       	->with('historiasClinicas',$historiasClinicas)
        ->with('flag', $flag);
    }

    public function postdeleteServicio($id){

        $user = Auth::User();
        $servicio2delete = Servicio::find($id);
        $fecha = Carbon::parse($servicio2delete->fecha);
        $procedimiento = Procedimiento::find($servicio2delete->idProcedimiento);
        $cuentas = Cuentas::Empresa($user->idEmpresa)->get();
        $fechaActual = Carbon::now()->subHour(5);

        for ($i=0; $i < sizeof($cuentas); $i++) {

          if($cuentas[$i]->titulo == "Ventas"){

                if($fecha->month == 1){
                      $cuentas[$i]->enero = $cuentas[$i]->enero - $procedimiento->venta;
                }else if($fecha->month == 2){
                      $cuentas[$i]->febrero = $cuentas[$i]->febrero - $procedimiento->venta;
                }else if($fecha->month == 3){
                      $cuentas[$i]->marzo = $cuentas[$i]->marzo - $procedimiento->venta;
                }else if($fecha->month == 4){
                      $cuentas[$i]->abril = $cuentas[$i]->abril - $procedimiento->venta;
                }else if($fecha->month == 5){
                      $cuentas[$i]->mayo = $cuentas[$i]->mayo - $procedimiento->venta;
                }else if($fecha->month == 6){
                      $cuentas[$i]->junio = $cuentas[$i]->junio - $procedimiento->venta;
                }else if($fecha->month == 7){
                      $cuentas[$i]->julio = $cuentas[$i]->julio - $procedimiento->venta;
                }else if($fecha->month == 8){
                      $cuentas[$i]->agosto = $cuentas[$i]->agosto - $procedimiento->venta;
                }else if($fecha->month == 9){
                      $cuentas[$i]->septiembre = $cuentas[$i]->septiembre - $procedimiento->venta;
                }else if($fecha->month == 10){
                      $cuentas[$i]->octubre = $cuentas[$i]->octubre - $procedimiento->venta;
                }else if($fecha->month == 11){
                      $cuentas[$i]->noviembre = $cuentas[$i]->noviembre - $procedimiento->venta;
                }else if($fecha->month == 12){
                      $cuentas[$i]->diciembre = $cuentas[$i]->diciembre - $procedimiento->venta;
                }

                $cuentas[$i]->actual = $cuentas[$i]->actual - $procedimiento->venta;
                $cuentas[$i]->save();

          }else if($cuentas[$i]->titulo == "Costos"){

                if($fecha->month == 1){
                      $cuentas[$i]->enero = $cuentas[$i]->enero - $procedimiento->costo;
                }else if($fecha->month == 2){
                      $cuentas[$i]->febrero = $cuentas[$i]->febrero - $procedimiento->costo;
                }else if($fecha->month == 3){
                      $cuentas[$i]->marzo = $cuentas[$i]->marzo - $procedimiento->costo;
                }else if($fecha->month == 4){
                      $cuentas[$i]->abril = $cuentas[$i]->abril - $procedimiento->costo;
                }else if($fecha->month == 5){
                      $cuentas[$i]->mayo = $cuentas[$i]->mayo - $procedimiento->costo;
                }else if($fecha->month == 6){
                      $cuentas[$i]->junio = $cuentas[$i]->junio - $procedimiento->costo;
                }else if($fecha->month == 7){
                      $cuentas[$i]->julio = $cuentas[$i]->julio - $procedimiento->costo;
                }else if($fecha->month == 8){
                      $cuentas[$i]->agosto = $cuentas[$i]->agosto - $procedimiento->costo;
                }else if($fecha->month == 9){
                      $cuentas[$i]->septiembre = $cuentas[$i]->septiembre - $procedimiento->costo;
                }else if($fecha->month == 10){
                      $cuentas[$i]->octubre = $cuentas[$i]->octubre - $procedimiento->costo;
                }else if($fecha->month == 11){
                      $cuentas[$i]->noviembre = $cuentas[$i]->noviembre - $procedimiento->costo;
                }else if($fecha->month == 12){
                      $cuentas[$i]->diciembre = $cuentas[$i]->diciembre - $procedimiento->costo;
                }

                $cuentas[$i]->actual = $cuentas[$i]->actual - $procedimiento->costo;
                $cuentas[$i]->save();

          }else if($cuentas[$i]->titulo == "Utilidad"){

                if($fecha->month == 1){
                      $cuentas[$i]->enero = $cuentas[$i]->enero - ($procedimiento->venta - $procedimiento->costo);
                }else if($fecha->month == 2){
                      $cuentas[$i]->febrero = $cuentas[$i]->febrero - ($procedimiento->venta - $procedimiento->costo);
                }else if($fecha->month == 3){
                      $cuentas[$i]->marzo = $cuentas[$i]->marzo - ($procedimiento->venta - $procedimiento->costo);
                }else if($fecha->month == 4){
                      $cuentas[$i]->abril = $cuentas[$i]->abril - ($procedimiento->venta - $procedimiento->costo);
                }else if($fecha->month == 5){
                      $cuentas[$i]->mayo = $cuentas[$i]->mayo - ($procedimiento->venta - $procedimiento->costo);
                }else if($fecha->month == 6){
                      $cuentas[$i]->junio = $cuentas[$i]->junio - ($procedimiento->venta - $procedimiento->costo);
                }else if($fecha->month == 7){
                      $cuentas[$i]->julio = $cuentas[$i]->julio - ($procedimiento->venta - $procedimiento->costo);
                }else if($fecha->month == 8){
                      $cuentas[$i]->agosto = $cuentas[$i]->agosto - ($procedimiento->venta - $procedimiento->costo);
                }else if($fecha->month == 9){
                      $cuentas[$i]->septiembre = $cuentas[$i]->septiembre - ($procedimiento->venta - $procedimiento->costo);
                }else if($fecha->month == 10){
                      $cuentas[$i]->octubre = $cuentas[$i]->octubre - ($procedimiento->venta - $procedimiento->costo);
                }else if($fecha->month == 11){
                      $cuentas[$i]->noviembre = $cuentas[$i]->noviembre - ($procedimiento->venta - $procedimiento->costo);
                }else if($fecha->month == 12){
                      $cuentas[$i]->diciembre = $cuentas[$i]->diciembre - ($procedimiento->venta - $procedimiento->costo);
                }

                $cuentas[$i]->actual = $cuentas[$i]->actual - ($procedimiento->venta - $procedimiento->costo);
                $cuentas[$i]->save();
          }
          
        }

        $servicio2delete->delete();
        
        flash('Eliminación exitoso')->success()->important();
        return redirect()->back();
    }

    public function nuevo(Request $request){
      $user = Auth::User();
      $servicio = new Servicio();
      $servicio->idEmpresa = $user->idEmpresa;
      $servicio->idHistoriaClinica = $request->id;
      $servicio->idProcedimiento = $request->servicioNuevo;
      $servicio->costoTratamiento = $request->costoTratamientoNuevo;
      $servicio->descripcion = $request->descripcionNueva;
      $servicio->fecha = Carbon::now()->subHour(5);
      $servicio->save();
      flash('Servicio guardado exitosamente')->success()->important();
      return redirect()->back();
    }
}
