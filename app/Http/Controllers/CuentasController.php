<?php
/*Realizado por Daniel Alejandro Rivera, ing*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Cuentas;
use App\Empresa;
use App\Servicio;
use App\Http\Requests;
use Carbon\Carbon;

class CuentasController extends Controller
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

   	public function index()
    {
    	$user = Auth::User();
      $cuentas = Cuentas::Empresa($user->idEmpresa)->get();
      $empresa = Empresa::find($user->idEmpresa);
      $cartera = [];
      $date = Carbon::now();
      $year = $date->format('Y');
      for ($i=0; $i < 12; $i++) { 
        $cartera[$i] = 0;
        $servicios = Servicio::EmpresaYMes($empresa->id, $i+1, $year)->get();
        $suma = 0;
        $abonos = 0;
        foreach($servicios  as $servicio){
          $suma +=$servicio->costoTratamiento;
          foreach($servicio->abonos  as $abono){
            $abonos +=$abono->abono;
          }
          $suma -= $abonos;
          $abonos = 0;
        }
        $cartera[$i] = $suma;
        $suma = 0;
      }
      
      $yearAnterior = $date->format('Y') - 1;
      for ($i=0; $i < 12; $i++) { 
        $carteraAnterior[$i] = 0;
        $servicios = Servicio::EmpresaYMes($empresa->id, $i+1, $yearAnterior)->get();
        $suma = 0;
        $abonos = 0;
        foreach($servicios  as $servicio){
          $suma +=$servicio->costoTratamiento;
          foreach($servicio->abonos  as $abono){
            $abonos +=$abono->abono;
          }
          $suma -= $abonos;
          $abonos = 0;
        }
        $carteraAnterior[$i] = $suma;
        $suma = 0;
      }
      $flag = "servicio";
    	return View('Cuentas.cuentas')
    	->with('cuentas',$cuentas)
    	->with('empresa',$empresa)
    	->with('user',$user)
      ->with('flag', $flag)
      ->with('cartera', $cartera) 
      ->with('carteraAnterior', $carteraAnterior);
    }
}
