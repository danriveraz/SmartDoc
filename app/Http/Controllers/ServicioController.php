<?php
/*Realizado por Daniel Alejandro Rivera, ing*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\HistoriaClinica;
use App\Procedimiento;
use App\Abono;
use App\Servicio;
use App\Empresa;
use App\Cuentas;
use Carbon\Carbon;
use App\Http\Requests, PDF;
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

        $servicio2delete->estado = "Anulada";
        $servicio2delete->save();
        
        flash('Eliminación exitoso')->success()->important();
        return redirect()->back();
    }

    public function nuevo(Request $request){
      $user = Auth::User();
      $empresa = Empresa::find($user->idEmpresa);
      $servicio = new Servicio();
      $servicio->idEmpresa = $user->idEmpresa;
      $servicio->idHistoriaClinica = $request->idHistoria;
      $historiaClinica = HistoriaClinica::find($servicio->idHistoriaClinica);
      $servicio->idProcedimiento = $request->servicioNuevo;
      $servicio->costoTratamiento = $request->costoTratamientoNuevo;
      $servicio->valorTratamiento = $request->valorTratamientoNuevo;
      $servicio->descripcion = $request->descripcionNueva;

      $valorTratamiento = $request->costoTratamientoNuevo;

      if(!$historiaClinica->exoneradoImpuestos){
        $servicio->costoTratamiento += $valorTratamiento*(($empresa->iva+0.0)/100);
        if($empresa->impuesto1 != ""){
          $servicio->costoTratamiento += $valorTratamiento*($empresa->valorImpuesto1/100);
        }
        if($empresa->impuesto2 != ""){
          $servicio->costoTratamiento += $valorTratamiento*($empresa->valorImpuesto2/100);
        }
      }

      $servicio->fecha = Carbon::now()->subHour(5);
      $servicio->estado = "Pendiente";
      $servicio->nFactura = $empresa->contadorFacturacion + 1;

      $empresa->contadorFacturacion +=1;
      $empresa->save();

      if($servicio->nFactura >= $empresa->nFinFactura and $empresa->tipoRegimen == "comun"){
        flash('No hay numerración dispenible para la factura')->error()->important();
        return redirect()->back();
      }else{
        $servicio->save();
        flash('Servicio guardado exitosamente')->success()->important();
        return redirect()->back();
      }
    }

    public function showpayment(Request $request){
      $flag = "servicio";
      $user = Auth::User();
      $empresa = Empresa::find($user->idEmpresa);
      $servicio = Servicio::find($request->id);
      $historiaClinica = HistoriaClinica::find($servicio->idHistoriaClinica);
      $cuota = sizeof($servicio->abonos) + 1;
      $saldo = $servicio->costoTratamiento;
      foreach ($servicio->abonos as $abono) {
        $saldo -= $abono->abono;
      }
      $contadorCuotas = 0;
      $saldoRestante = $servicio->costoTratamiento;
      return View('Servicio.abonos')
      ->with('empresa',$empresa)
      ->with('servicio',$servicio)
      ->with('cuota',$cuota)
      ->with('saldo',$saldo)
      ->with('saldoRestante',$saldoRestante)
      ->with('contadorCuotas',$contadorCuotas)
      ->with('historiaClinica',$historiaClinica)
      ->with('flag', $flag);
    }

    public function dopayment(Request $request){
      if($request->abono > 0){
        $abono = new Abono();
        $abono->abono = $request->abono;
        $abono->fecha = Carbon::now()->subHour(5);
        $abono->idServicio = $request->id;
        $abono->save();  

        $servicio = Servicio::find($request->id);
        $saldo = $servicio->costoTratamiento;
        foreach ($servicio->abonos as $abono) {
          $saldo -= $abono->abono;
        }
        if($saldo == 0){
          $servicio->estado = "Finalizada";
          $servicio->save();
        }
        flash('Abono realizado')->success()->important();
        return redirect('/Servicio')->send(); 
      }
      else{
          flash('Error al abonar: por favor ingrese cantidad a abonar')->error()->important();
          return redirect('/Servicio')->send();
      }
    }

    public function showInvoice(Request $request){
      $flag = "servicio";
      $user = Auth::User();
      $empresa = Empresa::find($user->idEmpresa);
      $servicio = Servicio::find($request->id);
      $historiaClinica = HistoriaClinica::find($servicio->idHistoriaClinica);
      $saldo = $servicio->costoTratamiento;
      return View('Factura.factura')
      ->with('empresa',$empresa)
      ->with('servicio',$servicio)
      ->with('saldo',$saldo)
      ->with('historiaClinica',$historiaClinica)
      ->with('flag', $flag);
    }    


    public function printPayment(Request $request){
      $user = Auth::User();
      $empresa = Empresa::find($user->idEmpresa);
      $servicio = Servicio::find($request->id);
      $historiaClinica = HistoriaClinica::find($servicio->idHistoriaClinica);
      $cuota = sizeof($servicio->abonos) + 1;
      $saldo = $servicio->costoTratamiento;
      foreach ($servicio->abonos as $abono) {
        $saldo -= $abono->abono;
      }
      $contadorCuotas = 0;
      $saldoRestante = $servicio->costoTratamiento;
      $pdf = PDF::loadView('Servicio.pdfPayment', ['servicio' => $servicio, 'empresa' => $empresa, 'historiaClinica' => $historiaClinica, 'cuota' => $cuota, 'saldo' => $saldo, 'contadorCuotas' => $contadorCuotas, 'saldoRestante' => $saldoRestante]);
      /*return View('Servicio.pdfPayment')
       ->with('empresa',$empresa)
      ->with('servicio',$servicio)
      ->with('cuota',$cuota)
      ->with('saldo',$saldo)
      ->with('saldoRestante',$saldoRestante)
      ->with('contadorCuotas',$contadorCuotas)
      ->with('historiaClinica',$historiaClinica);*/
      return $pdf->download('Payment.pdf');
    }    

}