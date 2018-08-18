<?php
/*Realizado por Daniel Alejandro Rivera, ing*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Departamento;
use App\Ciudad;
use App\HistoriaClinica;
use App\Procedimiento;
use App\Laboratorio;
use App\Cuentas;
use App\Servicio;
use App\Empresa;
use App\Diente;
use App\PDiente;
use App\Observaciones;
use App\Odontograma;
use App\Factura;
use Carbon\Carbon;
use App\Http\Requests;

class HistoriaClinicaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function historiaClinica(){
        $user = Auth::User();
        $historiasClinicas = HistoriaClinica::admin($user->idEmpresa)->get();
        $empresa = Empresa::find($user->idEmpresa);
        $flag = "historia";
        if($user->esAdmin){
            return View('HistoriaClinica.historiaClinica')
            ->with('user', $user)
            ->with('empresa',$empresa)
            ->with('historiasClinicas', $historiasClinicas)
            ->with('flag', $flag);
        }else{
            return View('HistoriaClinica.historiaClinicaTrabajador')
            ->with('user', $user)
            ->with('empresa',$empresa)
            ->with('historiasClinicas', $historiasClinicas)
            ->with('flag', $flag);
        }
    }

    public function createHistoriaClinica(Request $request){
        $user = Auth::User();
        $departamentos = Departamento::all();
        $ciudades = Ciudad::all();

        $lookforahistory = HistoriaClinica::identity($request->documento)->get();

        if(sizeof($lookforahistory) != 0){
            flash('Historia clinica ya existente')->error()->important();
            return redirect('/HistoriaClinica');
        }else{
            $historia = new HistoriaClinica();

            if($user->esAdmin){
                $historia->sexo = $request->sexo;
                $historia->tipoDocumento = $request->tipoDocumento;
            }
            $historia->nombreCompleto = $request->nombreCompleto;
            $historia->documento = $request->documento;
            //Se crea el odontograma

            //Primeros 10
            //Inicio diente 1 y sus partes
            $diente1 = new Diente();
            $diente1->numero = 18;
            $diente1->save();
            //Fin diente 1 y sus partes

            //Inicio diente 2 y sus partes
            $diente2 = new Diente();
            $diente2->numero = 17;
            $diente2->save();
            //Fin diente 2 y sus partes

            //Inicio diente 3 y sus partes
            
            $diente3 = new Diente();
            $diente3->numero = 16;
            $diente3->save();
            //Fin diente 3 y sus partes

            //Inicio diente 4 y sus partes
            
            $diente4 = new Diente();
            $diente4->numero = 15;
            $diente4->save();
            //Fin diente 4 y sus partes

            //Inicio diente 5 y sus partes
            $diente5 = new Diente();
            $diente5->numero = 14;
            $diente5->save();
            //Fin diente 5 y sus partes

            //Inicio diente 6 y sus partes
            
            $diente6 = new Diente();
            $diente6->numero = 13;
            $diente6->save();
            //Fin diente 6 y sus partes

            //Inicio diente 7 y sus partes
            
            $diente7 = new Diente();
            $diente7->numero = 12;
            $diente7->save();
            //Fin diente 7 y sus partes

            //Inicio diente 8 y sus partes
            
            $diente8 = new Diente();
            $diente8->numero = 11;
            $diente8->save();
            //Fin diente 8 y sus partes

            //Inicio diente 9 y sus partes
            
            $diente9 = new Diente();
            $diente9->numero = 21;
            $diente9->save();
            //Fin diente 9 y sus partes

            //Inicio diente 10 y sus partes
            
            $diente10 = new Diente();
            $diente10->numero = 22;
            $diente10->save();
            //Fin diente 10 y sus partes
            //Fin primeros 10

            //Segundos 10
            //Inicio diente 11 y sus partes
            
            $diente11 = new Diente();
            $diente11->numero = 23;
            $diente11->save();
            //Fin diente 11 y sus partes

            //Inicio diente 12 y sus partes
            
            $diente12 = new Diente();
            $diente12->numero = 24;
            $diente12->save();
            //Fin diente 12 y sus partes

            //Inicio diente 13 y sus partes
            
            $diente13 = new Diente();
            $diente13->numero = 25;
            $diente13->save();
            //Fin diente 13 y sus partes

            //Inicio diente 14 y sus partes
            
            $diente14 = new Diente();
            $diente14->numero = 26;
            $diente14->save();
            //Fin diente 14 y sus partes

            //Inicio diente 15 y sus partes
            
            $diente15 = new Diente();
            $diente15->numero = 27;
            $diente15->save();
            //Fin diente 15 y sus partes

            //Inicio diente 16 y sus partes
            
            $diente16 = new Diente();
            $diente16->numero = 28;
            $diente16->save();
            //Fin diente 16 y sus partes

            //Inicio diente 17 y s
            
            $diente17 = new Diente();
            $diente17->numero = 55;
            $diente17->save();
            //Fin diente 17 y sus partes

            //Inicio diente 18 y sus partes
            
            $diente18 = new Diente();
            $diente18->numero = 54;
            $diente18->save();
            //Fin diente 18 y sus partes

            //Inicio diente 19 y sus partes
            
            $diente19 = new Diente();
            $diente19->numero = 53;
            $diente19->save();
            //Fin diente 19 y sus partes

            //Inicio diente 20 y sus partes
            
            $diente20 = new Diente();
            $diente20->numero = 52;
            $diente20->save();
            //Fin diente 20 y sus partes
            //Fin segundos 10

            //Terceros 10
            //Inicio diente 21 y sus partes
            
            $diente21 = new Diente();
            $diente21->numero = 51;
            $diente21->save();
            //Fin diente 21 y sus partes

            //Inicio diente 22 y sus partes
            
            $diente22 = new Diente();
            $diente22->numero = 61;
            $diente22->save();
            //Fin diente 22 y sus partes

            //Inicio diente 23 y sus partes
            
            $diente23 = new Diente();
            $diente23->numero = 62;
            $diente23->save();
            //Fin diente 23 y sus partes

            //Inicio diente 24 y sus partes
            
            $diente24 = new Diente();
            $diente24->numero = 63;
            $diente24->save();
            //Fin diente 24 y sus partes

            //Inicio diente 25 y sus partes
            
            $diente25 = new Diente();
            $diente25->numero = 64;
            $diente25->save();
            //Fin diente 25 y sus partes

            //Inicio diente 26 y sus partes
            
            $diente26 = new Diente();
            $diente26->numero = 65;
            $diente26->save();
            //Fin diente 26 y sus partes

            //Inicio diente 27 y sus partes
            
            $diente27 = new Diente();
            $diente27->numero = 85;
            $diente27->save();
            //Fin diente 27 y sus partes

            //Inicio diente 28 y sus partes
            
            $diente28 = new Diente();
            $diente28->numero = 84;
            $diente28->save();
            //Fin diente 28 y sus partes

            //Inicio diente 29 y sus partes
            
            $diente29 = new Diente();
            $diente29->numero = 83;
            $diente29->save();
            //Fin diente 29 y sus partes

            //Inicio diente 30 y sus partes
            
            $diente30 = new Diente();
            $diente30->numero = 82;
            $diente30->save();
            //Fin diente 30 y sus partes
            //Fin terceros 10

            //Cuartos 10
            //Inicio diente 31 y sus partes
            
            $diente31 = new Diente();
            $diente31->numero = 81;
            $diente31->save();
            //Fin diente 31 y sus partes

            //Inicio diente 32 y sus partes
            
            $diente32 = new Diente();
            $diente32->numero = 71;
            $diente32->save();
            //Fin diente 32 y sus partes

            //Inicio diente 33 y sus partes
            
            $diente33 = new Diente();
            $diente33->numero = 72;
            $diente33->save();
            //Fin diente 33 y sus partes

            //Inicio diente 34 y sus partes
            
            $diente34 = new Diente();
            $diente34->numero = 73;
            $diente34->save();
            //Fin diente 34 y sus partes

            //Inicio diente 35 y sus partes
            
            $diente35 = new Diente();
            $diente35->numero = 74;
            $diente35->save();
            //Fin diente 35 y sus partes

            //Inicio diente 36 y sus partes
            
            $diente36 = new Diente();
            $diente36->numero = 75;
            $diente36->save();
            //Fin diente 36 y sus partes

            //Inicio diente 37 y sus partes
            
            $diente37 = new Diente();
            $diente37->numero = 48;
            $diente37->save();
            //Fin diente 37 y sus partes

            //Inicio diente 38 y sus partes
            
            $diente38 = new Diente();
            $diente38->numero = 47;
            $diente38->save();
            //Fin diente 38 y sus partes

            //Inicio diente 39 y sus partes
            
            $diente39 = new Diente();
            $diente39->numero = 46;
            $diente39->save();
            //Fin diente 9 y sus partes

            //Inicio diente 40 y sus partes
            
            $diente40 = new Diente();
            $diente40->numero = 45;
            $diente40->save();
            //Fin diente 40 y sus partes
            //Fin cuartos 10

            //Quintos 10
            //Inicio diente 41 y sus 
            $diente41 = new Diente();
            $diente41->numero = 44;
            $diente41->save();
            //Fin diente 41 y sus partes

            //Inicio diente 42 y sus partes
            
            
            $diente42 = new Diente();
            $diente42->numero = 43;
            $diente42->save();
            //Fin diente 42 y sus partes

            //Inicio diente 43 y sus partes
            
            
            $diente43 = new Diente();
            $diente43->numero = 42;
            $diente43->save();
            //Fin diente 43 y sus partes

            //Inicio diente 44 y sus partes
            
            
            $diente44 = new Diente();
            $diente44->numero = 41;
            $diente44->save();
            //Fin diente 44 y sus partes

            //Inicio diente 45 y sus partes
            
            $diente45 = new Diente();
            $diente45->numero = 31;
            $diente45->save();
            //Fin diente 45 y sus partes

            //Inicio diente 46 y sus partes
            
            $diente46 = new Diente();
            $diente46->numero = 32;
            $diente46->save();
            //Fin diente 46 y sus partes

            //Inicio diente 47 y sus partes
           
            $diente47 = new Diente();
            $diente47->numero = 33;
            $diente47->save();
            //Fin diente 47 y sus partes

            //Inicio diente 48 y sus partes
            
            $diente48 = new Diente();
            $diente48->numero = 34;
            $diente48->save();
            //Fin diente 48 y sus partes

            //Inicio diente 49 y sus partes
            
            $diente49 = new Diente();
            $diente49->numero = 35;
            $diente49->save();
            //Fin diente 49 y sus partes

            //Inicio diente 50 y sus partes
            
            $diente50 = new Diente();
            $diente50->numero = 36;
            $diente50->save();
            //Fin diente 50 y sus partes
            //Fin quintos 10

            //Inicio ultimos 2
            //Inicio diente 51 y sus partes
            
            $diente51 = new Diente();
            $diente51->numero = 37;
            $diente51->save();
            //Fin diente 51 y sus partes

            //Inicio diente 52 y sus partes
            
            $diente52 = new Diente();
            $diente52->numero = 38;
            $diente52->save();
            //Fin diente 52 y sus partes
            //Fin ultimos 2

            //Se crea el odontograma y se le asignan los 52 dientes que manejará
            $odontograma = new Odontograma();
            //Primeros 10
            $odontograma->idDiente1 = $diente1->id;
            $odontograma->idDiente2 = $diente2->id;
            $odontograma->idDiente3 = $diente3->id;
            $odontograma->idDiente4 = $diente4->id;
            $odontograma->idDiente5 = $diente5->id;
            $odontograma->idDiente6 = $diente6->id;
            $odontograma->idDiente7 = $diente7->id;
            $odontograma->idDiente8 = $diente8->id;
            $odontograma->idDiente9 = $diente9->id;
            $odontograma->idDiente10 = $diente10->id;
            //Segundos 10
            $odontograma->idDiente11 = $diente11->id;
            $odontograma->idDiente12 = $diente12->id;
            $odontograma->idDiente13 = $diente13->id;
            $odontograma->idDiente14 = $diente14->id;
            $odontograma->idDiente15 = $diente15->id;
            $odontograma->idDiente16 = $diente16->id;
            $odontograma->idDiente17 = $diente17->id;
            $odontograma->idDiente18 = $diente18->id;
            $odontograma->idDiente19 = $diente19->id;
            $odontograma->idDiente20 = $diente20->id;
            //Terceros 10
            $odontograma->idDiente21 = $diente21->id;
            $odontograma->idDiente22 = $diente22->id;
            $odontograma->idDiente23 = $diente23->id;
            $odontograma->idDiente24 = $diente24->id;
            $odontograma->idDiente25 = $diente25->id;
            $odontograma->idDiente26 = $diente26->id;
            $odontograma->idDiente27 = $diente27->id;
            $odontograma->idDiente28 = $diente28->id;
            $odontograma->idDiente29 = $diente29->id;
            $odontograma->idDiente30 = $diente30->id;
            //Cuartos 10
            $odontograma->idDiente31 = $diente31->id;
            $odontograma->idDiente32 = $diente32->id;
            $odontograma->idDiente33 = $diente33->id;
            $odontograma->idDiente34 = $diente34->id;
            $odontograma->idDiente35 = $diente35->id;
            $odontograma->idDiente36 = $diente36->id;
            $odontograma->idDiente37 = $diente37->id;
            $odontograma->idDiente38 = $diente38->id;
            $odontograma->idDiente39 = $diente39->id;
            $odontograma->idDiente40 = $diente40->id;
            //Quintos 10
            $odontograma->idDiente41 = $diente41->id;
            $odontograma->idDiente42 = $diente42->id;
            $odontograma->idDiente43 = $diente43->id;
            $odontograma->idDiente44 = $diente44->id;
            $odontograma->idDiente45 = $diente45->id;
            $odontograma->idDiente46 = $diente46->id;
            $odontograma->idDiente47 = $diente47->id;
            $odontograma->idDiente48 = $diente48->id;
            $odontograma->idDiente49 = $diente49->id;
            $odontograma->idDiente50 = $diente50->id;
            //Ultimos 2
            $odontograma->idDiente51 = $diente51->id;
            $odontograma->idDiente52 = $diente52->id;

            $odontograma->save();

            //Se crea el odontograma inicial

            //Primeros 10
            //Inicio diente 1 y sus partes
            $diente1Inicial = new Diente();
            $diente1Inicial->numero = 18;
            $diente1Inicial->save();
            //Fin diente 1 y sus partes

            //Inicio diente 2 y sus partes
            $diente2Inicial = new Diente();
            $diente2Inicial->numero = 17;
            $diente2Inicial->save();
            //Fin diente 2 y sus partes

            //Inicio diente 3 y sus partes
            
            $diente3Inicial = new Diente();
            $diente3Inicial->numero = 16;
            $diente3Inicial->save();
            //Fin diente 3 y sus partes

            //Inicio diente 4 y sus partes
            
            $diente4Inicial = new Diente();
            $diente4Inicial->numero = 15;
            $diente4Inicial->save();
            //Fin diente 4 y sus partes

            //Inicio diente 5 y sus partes
            $diente5Inicial = new Diente();
            $diente5Inicial->numero = 14;
            $diente5Inicial->save();
            //Fin diente 5 y sus partes

            //Inicio diente 6 y sus partes
            
            $diente6Inicial = new Diente();
            $diente6Inicial->numero = 13;
            $diente6Inicial->save();
            //Fin diente 6 y sus partes

            //Inicio diente 7 y sus partes
            
            $diente7Inicial = new Diente();
            $diente7Inicial->numero = 12;
            $diente7Inicial->save();
            //Fin diente 7 y sus partes

            //Inicio diente 8 y sus partes
            
            $diente8Inicial = new Diente();
            $diente8Inicial->numero = 11;
            $diente8Inicial->save();
            //Fin diente 8 y sus partes

            //Inicio diente 9 y sus partes
            
            $diente9Inicial = new Diente();
            $diente9Inicial->numero = 21;
            $diente9Inicial->save();
            //Fin diente 9 y sus partes

            //Inicio diente 10 y sus partes
            
            $diente10Inicial = new Diente();
            $diente10Inicial->numero = 22;
            $diente10Inicial->save();
            //Fin diente 10 y sus partes
            //Fin primeros 10

            //Segundos 10
            //Inicio diente 11 y sus partes
            
            $diente11Inicial = new Diente();
            $diente11Inicial->numero = 23;
            $diente11Inicial->save();
            //Fin diente 11 y sus partes

            //Inicio diente 12 y sus partes
            
            $diente12Inicial = new Diente();
            $diente12Inicial->numero = 24;
            $diente12Inicial->save();
            //Fin diente 12 y sus partes

            //Inicio diente 13 y sus partes
            
            $diente13Inicial = new Diente();
            $diente13Inicial->numero = 25;
            $diente13Inicial->save();
            //Fin diente 13 y sus partes

            //Inicio diente 14 y sus partes
            
            $diente14Inicial = new Diente();
            $diente14Inicial->numero = 26;
            $diente14Inicial->save();
            //Fin diente 14 y sus partes

            //Inicio diente 15 y sus partes
            
            $diente15Inicial = new Diente();
            $diente15Inicial->numero = 27;
            $diente15Inicial->save();
            //Fin diente 15 y sus partes

            //Inicio diente 16 y sus partes
            
            $diente16Inicial = new Diente();
            $diente16Inicial->numero = 28;
            $diente16Inicial->save();
            //Fin diente 16 y sus partes

            //Inicio diente 17 y s
            
            $diente17Inicial = new Diente();
            $diente17Inicial->numero = 55;
            $diente17Inicial->save();
            //Fin diente 17 y sus partes

            //Inicio diente 18 y sus partes
            
            $diente18Inicial = new Diente();
            $diente18Inicial->numero = 54;
            $diente18Inicial->save();
            //Fin diente 18 y sus partes

            //Inicio diente 19 y sus partes
            
            $diente19Inicial = new Diente();
            $diente19Inicial->numero = 53;
            $diente19Inicial->save();
            //Fin diente 19 y sus partes

            //Inicio diente 20 y sus partes
            
            $diente20Inicial = new Diente();
            $diente20Inicial->numero = 52;
            $diente20Inicial->save();
            //Fin diente 20 y sus partes
            //Fin segundos 10

            //Terceros 10
            //Inicio diente 21 y sus partes
            
            $diente21Inicial = new Diente();
            $diente21Inicial->numero = 51;
            $diente21Inicial->save();
            //Fin diente 21 y sus partes

            //Inicio diente 22 y sus partes
            
            $diente22Inicial = new Diente();
            $diente22Inicial->numero = 61;
            $diente22Inicial->save();
            //Fin diente 22 y sus partes

            //Inicio diente 23 y sus partes
            
            $diente23Inicial = new Diente();
            $diente23Inicial->numero = 62;
            $diente23Inicial->save();
            //Fin diente 23 y sus partes

            //Inicio diente 24 y sus partes
            
            $diente24Inicial = new Diente();
            $diente24Inicial->numero = 63;
            $diente24Inicial->save();
            //Fin diente 24 y sus partes

            //Inicio diente 25 y sus partes
            
            $diente25Inicial = new Diente();
            $diente25Inicial->numero = 64;
            $diente25Inicial->save();
            //Fin diente 25 y sus partes

            //Inicio diente 26 y sus partes
            
            $diente26Inicial = new Diente();
            $diente26Inicial->numero = 65;
            $diente26Inicial->save();
            //Fin diente 26 y sus partes

            //Inicio diente 27 y sus partes
            
            $diente27Inicial = new Diente();
            $diente27Inicial->numero = 85;
            $diente27Inicial->save();
            //Fin diente 27 y sus partes

            //Inicio diente 28 y sus partes
            
            $diente28Inicial = new Diente();
            $diente28Inicial->numero = 84;
            $diente28Inicial->save();
            //Fin diente 28 y sus partes

            //Inicio diente 29 y sus partes
            
            $diente29Inicial = new Diente();
            $diente29Inicial->numero = 83;
            $diente29Inicial->save();
            //Fin diente 29 y sus partes

            //Inicio diente 30 y sus partes
            
            $diente30Inicial = new Diente();
            $diente30Inicial->numero = 82;
            $diente30Inicial->save();
            //Fin diente 30 y sus partes
            //Fin terceros 10

            //Cuartos 10
            //Inicio diente 31 y sus partes
            
            $diente31Inicial = new Diente();
            $diente31Inicial->numero = 81;
            $diente31Inicial->save();
            //Fin diente 31 y sus partes

            //Inicio diente 32 y sus partes
            
            $diente32Inicial = new Diente();
            $diente32Inicial->numero = 71;
            $diente32Inicial->save();
            //Fin diente 32 y sus partes

            //Inicio diente 33 y sus partes
            
            $diente33Inicial = new Diente();
            $diente33Inicial->numero = 72;
            $diente33Inicial->save();
            //Fin diente 33 y sus partes

            //Inicio diente 34 y sus partes
            
            $diente34Inicial = new Diente();
            $diente34Inicial->numero = 73;
            $diente34Inicial->save();
            //Fin diente 34 y sus partes

            //Inicio diente 35 y sus partes
            
            $diente35Inicial = new Diente();
            $diente35Inicial->numero = 74;
            $diente35Inicial->save();
            //Fin diente 35 y sus partes

            //Inicio diente 36 y sus partes
            
            $diente36Inicial = new Diente();
            $diente36Inicial->numero = 75;
            $diente36Inicial->save();
            //Fin diente 36 y sus partes

            //Inicio diente 37 y sus partes
            
            $diente37Inicial = new Diente();
            $diente37Inicial->numero = 48;
            $diente37Inicial->save();
            //Fin diente 37 y sus partes

            //Inicio diente 38 y sus partes
            
            $diente38Inicial = new Diente();
            $diente38Inicial->numero = 47;
            $diente38Inicial->save();
            //Fin diente 38 y sus partes

            //Inicio diente 39 y sus partes
            
            $diente39Inicial = new Diente();
            $diente39Inicial->numero = 46;
            $diente39Inicial->save();
            //Fin diente 9 y sus partes

            //Inicio diente 40 y sus partes
            
            $diente40Inicial = new Diente();
            $diente40Inicial->numero = 45;
            $diente40Inicial->save();
            //Fin diente 40 y sus partes
            //Fin cuartos 10

            //Quintos 10
            //Inicio diente 41 y sus 
            $diente41Inicial = new Diente();
            $diente41Inicial->numero = 44;
            $diente41Inicial->save();
            //Fin diente 41 y sus partes

            //Inicio diente 42 y sus partes
            
            
            $diente42Inicial = new Diente();
            $diente42Inicial->numero = 43;
            $diente42Inicial->save();
            //Fin diente 42 y sus partes

            //Inicio diente 43 y sus partes
            
            
            $diente43Inicial = new Diente();
            $diente43Inicial->numero = 42;
            $diente43Inicial->save();
            //Fin diente 43 y sus partes

            //Inicio diente 44 y sus partes
            
            
            $diente44Inicial = new Diente();
            $diente44Inicial->numero = 41;
            $diente44Inicial->save();
            //Fin diente 44 y sus partes

            //Inicio diente 45 y sus partes
            
            $diente45Inicial = new Diente();
            $diente45Inicial->numero = 31;
            $diente45Inicial->save();
            //Fin diente 45 y sus partes

            //Inicio diente 46 y sus partes
            
            $diente46Inicial = new Diente();
            $diente46Inicial->numero = 32;
            $diente46Inicial->save();
            //Fin diente 46 y sus partes

            //Inicio diente 47 y sus partes
           
            $diente47Inicial = new Diente();
            $diente47Inicial->numero = 33;
            $diente47Inicial->save();
            //Fin diente 47 y sus partes

            //Inicio diente 48 y sus partes
            
            $diente48Inicial = new Diente();
            $diente48Inicial->numero = 34;
            $diente48Inicial->save();
            //Fin diente 48 y sus partes

            //Inicio diente 49 y sus partes
            
            $diente49Inicial = new Diente();
            $diente49Inicial->numero = 35;
            $diente49Inicial->save();
            //Fin diente 49 y sus partes

            //Inicio diente 50 y sus partes
            
            $diente50Inicial = new Diente();
            $diente50Inicial->numero = 36;
            $diente50Inicial->save();
            //Fin diente 50 y sus partes
            //Fin quintos 10

            //Inicio ultimos 2
            //Inicio diente 51 y sus partes
            
            $diente51Inicial = new Diente();
            $diente51Inicial->numero = 37;
            $diente51Inicial->save();
            //Fin diente 51 y sus partes

            //Inicio diente 52 y sus partes
            
            $diente52Inicial = new Diente();
            $diente52Inicial->numero = 38;
            $diente52Inicial->save();
            //Fin diente 52 y sus partes
            //Fin ultimos 2

            //Se crea el odontograma y se le asignan los 52 dientes que manejará
            $odontogramaInicial = new Odontograma();
            //Primeros 10
            $odontogramaInicial->idDiente1 = $diente1Inicial->id;
            $odontogramaInicial->idDiente2 = $diente2Inicial->id;
            $odontogramaInicial->idDiente3 = $diente3Inicial->id;
            $odontogramaInicial->idDiente4 = $diente4Inicial->id;
            $odontogramaInicial->idDiente5 = $diente5Inicial->id;
            $odontogramaInicial->idDiente6 = $diente6Inicial->id;
            $odontogramaInicial->idDiente7 = $diente7Inicial->id;
            $odontogramaInicial->idDiente8 = $diente8Inicial->id;
            $odontogramaInicial->idDiente9 = $diente9Inicial->id;
            $odontogramaInicial->idDiente10 = $diente10Inicial->id;
            //Segundos 10
            $odontogramaInicial->idDiente11 = $diente11Inicial->id;
            $odontogramaInicial->idDiente12 = $diente12Inicial->id;
            $odontogramaInicial->idDiente13 = $diente13Inicial->id;
            $odontogramaInicial->idDiente14 = $diente14Inicial->id;
            $odontogramaInicial->idDiente15 = $diente15Inicial->id;
            $odontogramaInicial->idDiente16 = $diente16Inicial->id;
            $odontogramaInicial->idDiente17 = $diente17Inicial->id;
            $odontogramaInicial->idDiente18 = $diente18Inicial->id;
            $odontogramaInicial->idDiente19 = $diente19Inicial->id;
            $odontogramaInicial->idDiente20 = $diente20Inicial->id;
            //Terceros 10
            $odontogramaInicial->idDiente21 = $diente21Inicial->id;
            $odontogramaInicial->idDiente22 = $diente22Inicial->id;
            $odontogramaInicial->idDiente23 = $diente23Inicial->id;
            $odontogramaInicial->idDiente24 = $diente24Inicial->id;
            $odontogramaInicial->idDiente25 = $diente25Inicial->id;
            $odontogramaInicial->idDiente26 = $diente26Inicial->id;
            $odontogramaInicial->idDiente27 = $diente27Inicial->id;
            $odontogramaInicial->idDiente28 = $diente28Inicial->id;
            $odontogramaInicial->idDiente29 = $diente29Inicial->id;
            $odontogramaInicial->idDiente30 = $diente30Inicial->id;
            //Cuartos 10
            $odontogramaInicial->idDiente31 = $diente31Inicial->id;
            $odontogramaInicial->idDiente32 = $diente32Inicial->id;
            $odontogramaInicial->idDiente33 = $diente33Inicial->id;
            $odontogramaInicial->idDiente34 = $diente34Inicial->id;
            $odontogramaInicial->idDiente35 = $diente35Inicial->id;
            $odontogramaInicial->idDiente36 = $diente36Inicial->id;
            $odontogramaInicial->idDiente37 = $diente37Inicial->id;
            $odontogramaInicial->idDiente38 = $diente38Inicial->id;
            $odontogramaInicial->idDiente39 = $diente39Inicial->id;
            $odontogramaInicial->idDiente40 = $diente40Inicial->id;
            //Quintos 10
            $odontogramaInicial->idDiente41 = $diente41Inicial->id;
            $odontogramaInicial->idDiente42 = $diente42Inicial->id;
            $odontogramaInicial->idDiente43 = $diente43Inicial->id;
            $odontogramaInicial->idDiente44 = $diente44Inicial->id;
            $odontogramaInicial->idDiente45 = $diente45Inicial->id;
            $odontogramaInicial->idDiente46 = $diente46Inicial->id;
            $odontogramaInicial->idDiente47 = $diente47Inicial->id;
            $odontogramaInicial->idDiente48 = $diente48Inicial->id;
            $odontogramaInicial->idDiente49 = $diente49Inicial->id;
            $odontogramaInicial->idDiente50 = $diente50Inicial->id;
            //Ultimos 2
            $odontogramaInicial->idDiente51 = $diente51Inicial->id;
            $odontogramaInicial->idDiente52 = $diente52Inicial->id;

            $odontogramaInicial->save();

            $historia->idOdontogramaInicial = $odontogramaInicial->id;
            $historia->idOdontograma = $odontograma->id;

            $historia->idEmpresa = $user->idEmpresa;
            $historia->save();

            session_start();
            $_SESSION['id'] = $historia->id;
            return redirect()->route('historia.editHistoriaClinica');
        }
    }

    public function edit($id){
        session_start();
        $_SESSION['id'] = $id;
        return redirect()->route('historia.editHistoriaClinica');
    }

    public function editHistoriaClinica(){
        $user = Auth::User();
        session_start();
        $id = $_SESSION['id'];
        $departamentos = Departamento::all();
        $ciudades = Ciudad::all();
        $historia = HistoriaClinica::find($id);
        $procedimientos = Procedimiento::admin($user->idEmpresa)->get();

        if($historia->idOdontogramaInicial == 0){//Se agrega el odontograma inicial si no lo tiene
            //Se crea el odontograma

            //Primeros 10
            //Inicio diente 1 y sus partes
            $diente1 = new Diente();
            $diente1->numero = 18;
            $diente1->save();
            //Fin diente 1 y sus partes

            //Inicio diente 2 y sus partes
            $diente2 = new Diente();
            $diente2->numero = 17;
            $diente2->save();
            //Fin diente 2 y sus partes

            //Inicio diente 3 y sus partes
            
            $diente3 = new Diente();
            $diente3->numero = 16;
            $diente3->save();
            //Fin diente 3 y sus partes

            //Inicio diente 4 y sus partes
            
            $diente4 = new Diente();
            $diente4->numero = 15;
            $diente4->save();
            //Fin diente 4 y sus partes

            //Inicio diente 5 y sus partes
            $diente5 = new Diente();
            $diente5->numero = 14;
            $diente5->save();
            //Fin diente 5 y sus partes

            //Inicio diente 6 y sus partes
            
            $diente6 = new Diente();
            $diente6->numero = 13;
            $diente6->save();
            //Fin diente 6 y sus partes

            //Inicio diente 7 y sus partes
            
            $diente7 = new Diente();
            $diente7->numero = 12;
            $diente7->save();
            //Fin diente 7 y sus partes

            //Inicio diente 8 y sus partes
            
            $diente8 = new Diente();
            $diente8->numero = 11;
            $diente8->save();
            //Fin diente 8 y sus partes

            //Inicio diente 9 y sus partes
            
            $diente9 = new Diente();
            $diente9->numero = 21;
            $diente9->save();
            //Fin diente 9 y sus partes

            //Inicio diente 10 y sus partes
            
            $diente10 = new Diente();
            $diente10->numero = 22;
            $diente10->save();
            //Fin diente 10 y sus partes
            //Fin primeros 10

            //Segundos 10
            //Inicio diente 11 y sus partes
            
            $diente11 = new Diente();
            $diente11->numero = 23;
            $diente11->save();
            //Fin diente 11 y sus partes

            //Inicio diente 12 y sus partes
            
            $diente12 = new Diente();
            $diente12->numero = 24;
            $diente12->save();
            //Fin diente 12 y sus partes

            //Inicio diente 13 y sus partes
            
            $diente13 = new Diente();
            $diente13->numero = 25;
            $diente13->save();
            //Fin diente 13 y sus partes

            //Inicio diente 14 y sus partes
            
            $diente14 = new Diente();
            $diente14->numero = 26;
            $diente14->save();
            //Fin diente 14 y sus partes

            //Inicio diente 15 y sus partes
            
            $diente15 = new Diente();
            $diente15->numero = 27;
            $diente15->save();
            //Fin diente 15 y sus partes

            //Inicio diente 16 y sus partes
            
            $diente16 = new Diente();
            $diente16->numero = 28;
            $diente16->save();
            //Fin diente 16 y sus partes

            //Inicio diente 17 y s
            
            $diente17 = new Diente();
            $diente17->numero = 55;
            $diente17->save();
            //Fin diente 17 y sus partes

            //Inicio diente 18 y sus partes
            
            $diente18 = new Diente();
            $diente18->numero = 54;
            $diente18->save();
            //Fin diente 18 y sus partes

            //Inicio diente 19 y sus partes
            
            $diente19 = new Diente();
            $diente19->numero = 53;
            $diente19->save();
            //Fin diente 19 y sus partes

            //Inicio diente 20 y sus partes
            
            $diente20 = new Diente();
            $diente20->numero = 52;
            $diente20->save();
            //Fin diente 20 y sus partes
            //Fin segundos 10

            //Terceros 10
            //Inicio diente 21 y sus partes
            
            $diente21 = new Diente();
            $diente21->numero = 51;
            $diente21->save();
            //Fin diente 21 y sus partes

            //Inicio diente 22 y sus partes
            
            $diente22 = new Diente();
            $diente22->numero = 61;
            $diente22->save();
            //Fin diente 22 y sus partes

            //Inicio diente 23 y sus partes
            
            $diente23 = new Diente();
            $diente23->numero = 62;
            $diente23->save();
            //Fin diente 23 y sus partes

            //Inicio diente 24 y sus partes
            
            $diente24 = new Diente();
            $diente24->numero = 63;
            $diente24->save();
            //Fin diente 24 y sus partes

            //Inicio diente 25 y sus partes
            
            $diente25 = new Diente();
            $diente25->numero = 64;
            $diente25->save();
            //Fin diente 25 y sus partes

            //Inicio diente 26 y sus partes
            
            $diente26 = new Diente();
            $diente26->numero = 65;
            $diente26->save();
            //Fin diente 26 y sus partes

            //Inicio diente 27 y sus partes
            
            $diente27 = new Diente();
            $diente27->numero = 85;
            $diente27->save();
            //Fin diente 27 y sus partes

            //Inicio diente 28 y sus partes
            
            $diente28 = new Diente();
            $diente28->numero = 84;
            $diente28->save();
            //Fin diente 28 y sus partes

            //Inicio diente 29 y sus partes
            
            $diente29 = new Diente();
            $diente29->numero = 83;
            $diente29->save();
            //Fin diente 29 y sus partes

            //Inicio diente 30 y sus partes
            
            $diente30 = new Diente();
            $diente30->numero = 82;
            $diente30->save();
            //Fin diente 30 y sus partes
            //Fin terceros 10

            //Cuartos 10
            //Inicio diente 31 y sus partes
            
            $diente31 = new Diente();
            $diente31->numero = 81;
            $diente31->save();
            //Fin diente 31 y sus partes

            //Inicio diente 32 y sus partes
            
            $diente32 = new Diente();
            $diente32->numero = 71;
            $diente32->save();
            //Fin diente 32 y sus partes

            //Inicio diente 33 y sus partes
            
            $diente33 = new Diente();
            $diente33->numero = 72;
            $diente33->save();
            //Fin diente 33 y sus partes

            //Inicio diente 34 y sus partes
            
            $diente34 = new Diente();
            $diente34->numero = 73;
            $diente34->save();
            //Fin diente 34 y sus partes

            //Inicio diente 35 y sus partes
            
            $diente35 = new Diente();
            $diente35->numero = 74;
            $diente35->save();
            //Fin diente 35 y sus partes

            //Inicio diente 36 y sus partes
            
            $diente36 = new Diente();
            $diente36->numero = 75;
            $diente36->save();
            //Fin diente 36 y sus partes

            //Inicio diente 37 y sus partes
            
            $diente37 = new Diente();
            $diente37->numero = 48;
            $diente37->save();
            //Fin diente 37 y sus partes

            //Inicio diente 38 y sus partes
            
            $diente38 = new Diente();
            $diente38->numero = 47;
            $diente38->save();
            //Fin diente 38 y sus partes

            //Inicio diente 39 y sus partes
            
            $diente39 = new Diente();
            $diente39->numero = 46;
            $diente39->save();
            //Fin diente 9 y sus partes

            //Inicio diente 40 y sus partes
            
            $diente40 = new Diente();
            $diente40->numero = 45;
            $diente40->save();
            //Fin diente 40 y sus partes
            //Fin cuartos 10

            //Quintos 10
            //Inicio diente 41 y sus 
            $diente41 = new Diente();
            $diente41->numero = 44;
            $diente41->save();
            //Fin diente 41 y sus partes

            //Inicio diente 42 y sus partes
            
            
            $diente42 = new Diente();
            $diente42->numero = 43;
            $diente42->save();
            //Fin diente 42 y sus partes

            //Inicio diente 43 y sus partes
            
            
            $diente43 = new Diente();
            $diente43->numero = 42;
            $diente43->save();
            //Fin diente 43 y sus partes

            //Inicio diente 44 y sus partes
            
            
            $diente44 = new Diente();
            $diente44->numero = 41;
            $diente44->save();
            //Fin diente 44 y sus partes

            //Inicio diente 45 y sus partes
            
            $diente45 = new Diente();
            $diente45->numero = 31;
            $diente45->save();
            //Fin diente 45 y sus partes

            //Inicio diente 46 y sus partes
            
            $diente46 = new Diente();
            $diente46->numero = 32;
            $diente46->save();
            //Fin diente 46 y sus partes

            //Inicio diente 47 y sus partes
           
            $diente47 = new Diente();
            $diente47->numero = 33;
            $diente47->save();
            //Fin diente 47 y sus partes

            //Inicio diente 48 y sus partes
            
            $diente48 = new Diente();
            $diente48->numero = 34;
            $diente48->save();
            //Fin diente 48 y sus partes

            //Inicio diente 49 y sus partes
            
            $diente49 = new Diente();
            $diente49->numero = 35;
            $diente49->save();
            //Fin diente 49 y sus partes

            //Inicio diente 50 y sus partes
            
            $diente50 = new Diente();
            $diente50->numero = 36;
            $diente50->save();
            //Fin diente 50 y sus partes
            //Fin quintos 10

            //Inicio ultimos 2
            //Inicio diente 51 y sus partes
            
            $diente51 = new Diente();
            $diente51->numero = 37;
            $diente51->save();
            //Fin diente 51 y sus partes

            //Inicio diente 52 y sus partes
            
            $diente52 = new Diente();
            $diente52->numero = 38;
            $diente52->save();
            //Fin diente 52 y sus partes
            //Fin ultimos 2

            //Se crea el odontograma y se le asignan los 52 dientes que manejará
            $odontogramaInicial = new Odontograma();
            //Primeros 10
            $odontogramaInicial->idDiente1 = $diente1->id;
            $odontogramaInicial->idDiente2 = $diente2->id;
            $odontogramaInicial->idDiente3 = $diente3->id;
            $odontogramaInicial->idDiente4 = $diente4->id;
            $odontogramaInicial->idDiente5 = $diente5->id;
            $odontogramaInicial->idDiente6 = $diente6->id;
            $odontogramaInicial->idDiente7 = $diente7->id;
            $odontogramaInicial->idDiente8 = $diente8->id;
            $odontogramaInicial->idDiente9 = $diente9->id;
            $odontogramaInicial->idDiente10 = $diente10->id;
            //Segundos 10
            $odontogramaInicial->idDiente11 = $diente11->id;
            $odontogramaInicial->idDiente12 = $diente12->id;
            $odontogramaInicial->idDiente13 = $diente13->id;
            $odontogramaInicial->idDiente14 = $diente14->id;
            $odontogramaInicial->idDiente15 = $diente15->id;
            $odontogramaInicial->idDiente16 = $diente16->id;
            $odontogramaInicial->idDiente17 = $diente17->id;
            $odontogramaInicial->idDiente18 = $diente18->id;
            $odontogramaInicial->idDiente19 = $diente19->id;
            $odontogramaInicial->idDiente20 = $diente20->id;
            //Terceros 10
            $odontogramaInicial->idDiente21 = $diente21->id;
            $odontogramaInicial->idDiente22 = $diente22->id;
            $odontogramaInicial->idDiente23 = $diente23->id;
            $odontogramaInicial->idDiente24 = $diente24->id;
            $odontogramaInicial->idDiente25 = $diente25->id;
            $odontogramaInicial->idDiente26 = $diente26->id;
            $odontogramaInicial->idDiente27 = $diente27->id;
            $odontogramaInicial->idDiente28 = $diente28->id;
            $odontogramaInicial->idDiente29 = $diente29->id;
            $odontogramaInicial->idDiente30 = $diente30->id;
            //Cuartos 10
            $odontogramaInicial->idDiente31 = $diente31->id;
            $odontogramaInicial->idDiente32 = $diente32->id;
            $odontogramaInicial->idDiente33 = $diente33->id;
            $odontogramaInicial->idDiente34 = $diente34->id;
            $odontogramaInicial->idDiente35 = $diente35->id;
            $odontogramaInicial->idDiente36 = $diente36->id;
            $odontogramaInicial->idDiente37 = $diente37->id;
            $odontogramaInicial->idDiente38 = $diente38->id;
            $odontogramaInicial->idDiente39 = $diente39->id;
            $odontogramaInicial->idDiente40 = $diente40->id;
            //Quintos 10
            $odontogramaInicial->idDiente41 = $diente41->id;
            $odontogramaInicial->idDiente42 = $diente42->id;
            $odontogramaInicial->idDiente43 = $diente43->id;
            $odontogramaInicial->idDiente44 = $diente44->id;
            $odontogramaInicial->idDiente45 = $diente45->id;
            $odontogramaInicial->idDiente46 = $diente46->id;
            $odontogramaInicial->idDiente47 = $diente47->id;
            $odontogramaInicial->idDiente48 = $diente48->id;
            $odontogramaInicial->idDiente49 = $diente49->id;
            $odontogramaInicial->idDiente50 = $diente50->id;
            //Ultimos 2
            $odontogramaInicial->idDiente51 = $diente51->id;
            $odontogramaInicial->idDiente52 = $diente52->id;

            $odontogramaInicial->save();
            $historia->idOdontogramaInicial = $odontogramaInicial->id;
            $historia->save();
        }

        $odontogramaInicial = Odontograma::find($historia->idOdontogramaInicial);

        $diente1Inicial = Diente::find($odontogramaInicial->idDiente1);
        $diente2Inicial = Diente::find($odontogramaInicial->idDiente2);
        $diente3Inicial = Diente::find($odontogramaInicial->idDiente3);
        $diente4Inicial = Diente::find($odontogramaInicial->idDiente4);
        $diente5Inicial = Diente::find($odontogramaInicial->idDiente5);
        $diente6Inicial = Diente::find($odontogramaInicial->idDiente6);
        $diente7Inicial = Diente::find($odontogramaInicial->idDiente7);
        $diente8Inicial = Diente::find($odontogramaInicial->idDiente8);
        $diente9Inicial = Diente::find($odontogramaInicial->idDiente9);
        $diente10Inicial = Diente::find($odontogramaInicial->idDiente10);
        $diente11Inicial = Diente::find($odontogramaInicial->idDiente11);
        $diente12Inicial = Diente::find($odontogramaInicial->idDiente12);
        $diente13Inicial = Diente::find($odontogramaInicial->idDiente13);
        $diente14Inicial = Diente::find($odontogramaInicial->idDiente14);
        $diente15Inicial = Diente::find($odontogramaInicial->idDiente15);
        $diente16Inicial = Diente::find($odontogramaInicial->idDiente16);
        $diente17Inicial = Diente::find($odontogramaInicial->idDiente17);
        $diente18Inicial = Diente::find($odontogramaInicial->idDiente18);
        $diente19Inicial = Diente::find($odontogramaInicial->idDiente19);
        $diente20Inicial = Diente::find($odontogramaInicial->idDiente20);
        $diente21Inicial = Diente::find($odontogramaInicial->idDiente21);
        $diente22Inicial = Diente::find($odontogramaInicial->idDiente22);
        $diente23Inicial = Diente::find($odontogramaInicial->idDiente23);
        $diente24Inicial = Diente::find($odontogramaInicial->idDiente24);
        $diente25Inicial = Diente::find($odontogramaInicial->idDiente25);
        $diente26Inicial = Diente::find($odontogramaInicial->idDiente26);
        $diente27Inicial = Diente::find($odontogramaInicial->idDiente27);
        $diente28Inicial = Diente::find($odontogramaInicial->idDiente28);
        $diente29Inicial = Diente::find($odontogramaInicial->idDiente29);
        $diente30Inicial = Diente::find($odontogramaInicial->idDiente30);
        $diente31Inicial = Diente::find($odontogramaInicial->idDiente31);
        $diente32Inicial = Diente::find($odontogramaInicial->idDiente32);
        $diente33Inicial = Diente::find($odontogramaInicial->idDiente33);
        $diente34Inicial = Diente::find($odontogramaInicial->idDiente34);
        $diente35Inicial = Diente::find($odontogramaInicial->idDiente35);
        $diente36Inicial = Diente::find($odontogramaInicial->idDiente36);
        $diente37Inicial = Diente::find($odontogramaInicial->idDiente37);
        $diente38Inicial = Diente::find($odontogramaInicial->idDiente38);
        $diente39Inicial = Diente::find($odontogramaInicial->idDiente39);
        $diente40Inicial = Diente::find($odontogramaInicial->idDiente40);
        $diente41Inicial = Diente::find($odontogramaInicial->idDiente41);
        $diente42Inicial = Diente::find($odontogramaInicial->idDiente42);
        $diente43Inicial = Diente::find($odontogramaInicial->idDiente43);
        $diente44Inicial = Diente::find($odontogramaInicial->idDiente44);
        $diente45Inicial = Diente::find($odontogramaInicial->idDiente45);
        $diente46Inicial = Diente::find($odontogramaInicial->idDiente46);
        $diente47Inicial = Diente::find($odontogramaInicial->idDiente47);
        $diente48Inicial = Diente::find($odontogramaInicial->idDiente48);
        $diente49Inicial = Diente::find($odontogramaInicial->idDiente49);
        $diente50Inicial = Diente::find($odontogramaInicial->idDiente50);
        $diente51Inicial = Diente::find($odontogramaInicial->idDiente51);
        $diente52Inicial = Diente::find($odontogramaInicial->idDiente52);

        //return odontograma

        $odontograma = Odontograma::find($historia->idOdontograma);

        $diente1 = Diente::find($odontograma->idDiente1);
        $diente2 = Diente::find($odontograma->idDiente2);
        $diente3 = Diente::find($odontograma->idDiente3);
        $diente4 = Diente::find($odontograma->idDiente4);
        $diente5 = Diente::find($odontograma->idDiente5);
        $diente6 = Diente::find($odontograma->idDiente6);
        $diente7 = Diente::find($odontograma->idDiente7);
        $diente8 = Diente::find($odontograma->idDiente8);
        $diente9 = Diente::find($odontograma->idDiente9);
        $diente10 = Diente::find($odontograma->idDiente10);
        $diente11 = Diente::find($odontograma->idDiente11);
        $diente12 = Diente::find($odontograma->idDiente12);
        $diente13 = Diente::find($odontograma->idDiente13);
        $diente14 = Diente::find($odontograma->idDiente14);
        $diente15 = Diente::find($odontograma->idDiente15);
        $diente16 = Diente::find($odontograma->idDiente16);
        $diente17 = Diente::find($odontograma->idDiente17);
        $diente18 = Diente::find($odontograma->idDiente18);
        $diente19 = Diente::find($odontograma->idDiente19);
        $diente20 = Diente::find($odontograma->idDiente20);
        $diente21 = Diente::find($odontograma->idDiente21);
        $diente22 = Diente::find($odontograma->idDiente22);
        $diente23 = Diente::find($odontograma->idDiente23);
        $diente24 = Diente::find($odontograma->idDiente24);
        $diente25 = Diente::find($odontograma->idDiente25);
        $diente26 = Diente::find($odontograma->idDiente26);
        $diente27 = Diente::find($odontograma->idDiente27);
        $diente28 = Diente::find($odontograma->idDiente28);
        $diente29 = Diente::find($odontograma->idDiente29);
        $diente30 = Diente::find($odontograma->idDiente30);
        $diente31 = Diente::find($odontograma->idDiente31);
        $diente32 = Diente::find($odontograma->idDiente32);
        $diente33 = Diente::find($odontograma->idDiente33);
        $diente34 = Diente::find($odontograma->idDiente34);
        $diente35 = Diente::find($odontograma->idDiente35);
        $diente36 = Diente::find($odontograma->idDiente36);
        $diente37 = Diente::find($odontograma->idDiente37);
        $diente38 = Diente::find($odontograma->idDiente38);
        $diente39 = Diente::find($odontograma->idDiente39);
        $diente40 = Diente::find($odontograma->idDiente40);
        $diente41 = Diente::find($odontograma->idDiente41);
        $diente42 = Diente::find($odontograma->idDiente42);
        $diente43 = Diente::find($odontograma->idDiente43);
        $diente44 = Diente::find($odontograma->idDiente44);
        $diente45 = Diente::find($odontograma->idDiente45);
        $diente46 = Diente::find($odontograma->idDiente46);
        $diente47 = Diente::find($odontograma->idDiente47);
        $diente48 = Diente::find($odontograma->idDiente48);
        $diente49 = Diente::find($odontograma->idDiente49);
        $diente50 = Diente::find($odontograma->idDiente50);
        $diente51 = Diente::find($odontograma->idDiente51);
        $diente52 = Diente::find($odontograma->idDiente52);

        $odontograma2array = array();
        $odontogramaInicial2array = array();
        //Odontograma inicial
        array_push($odontogramaInicial2array, array('c18Inicial', $diente1Inicial->parteCentro));
        array_push($odontogramaInicial2array, array('t18Inicial', $diente1Inicial->parteSuperior));
        array_push($odontogramaInicial2array, array('b18Inicial', $diente1Inicial->parteInferior));
        array_push($odontogramaInicial2array, array('l18Inicial', $diente1Inicial->parteIzquierda));
        array_push($odontogramaInicial2array, array('r18Inicial', $diente1Inicial->parteDerecha));
        array_push($odontogramaInicial2array, array('completo18Inicial', $diente1Inicial->completo));
        //diente 2
        array_push($odontogramaInicial2array, array('c17Inicial', $diente2Inicial->parteCentro));
        array_push($odontogramaInicial2array, array('t17Inicial', $diente2Inicial->parteSuperior));
        array_push($odontogramaInicial2array, array('b17Inicial', $diente2Inicial->parteInferior));
        array_push($odontogramaInicial2array, array('l17Inicial', $diente2Inicial->parteIzquierda));
        array_push($odontogramaInicial2array, array('r17Inicial', $diente2Inicial->parteDerecha));
        array_push($odontogramaInicial2array, array('completo17Inicial', $diente2Inicial->completo));
        //diente 3
        array_push($odontogramaInicial2array, array('c16Inicial', $diente3Inicial->parteCentro));
        array_push($odontogramaInicial2array, array('t16Inicial', $diente3Inicial->parteSuperior));
        array_push($odontogramaInicial2array, array('b16Inicial', $diente3Inicial->parteInferior));
        array_push($odontogramaInicial2array, array('l16Inicial', $diente3Inicial->parteIzquierda));
        array_push($odontogramaInicial2array, array('r16Inicial', $diente3Inicial->parteDerecha));
        array_push($odontogramaInicial2array, array('completo16Inicial', $diente3Inicial->completo));
        //diente 4
        array_push($odontogramaInicial2array, array('c15Inicial', $diente4Inicial->parteCentro));
        array_push($odontogramaInicial2array, array('t15Inicial', $diente4Inicial->parteSuperior));
        array_push($odontogramaInicial2array, array('b15Inicial', $diente4Inicial->parteInferior));
        array_push($odontogramaInicial2array, array('l15Inicial', $diente4Inicial->parteIzquierda));
        array_push($odontogramaInicial2array, array('r15Inicial', $diente4Inicial->parteDerecha));
        array_push($odontogramaInicial2array, array('completo15Inicial', $diente4Inicial->completo));
        //diente 5
        array_push($odontogramaInicial2array, array('c14Inicial', $diente5Inicial->parteCentro));
        array_push($odontogramaInicial2array, array('t14Inicial', $diente5Inicial->parteSuperior));
        array_push($odontogramaInicial2array, array('b14Inicial', $diente5Inicial->parteInferior));
        array_push($odontogramaInicial2array, array('l14Inicial', $diente5Inicial->parteIzquierda));
        array_push($odontogramaInicial2array, array('r14Inicial', $diente5Inicial->parteDerecha));
        array_push($odontogramaInicial2array, array('completo14Inicial', $diente5Inicial->completo));
        //diente 6
        array_push($odontogramaInicial2array, array('c13Inicial', $diente6Inicial->parteCentro));
        array_push($odontogramaInicial2array, array('t13Inicial', $diente6Inicial->parteSuperior));
        array_push($odontogramaInicial2array, array('b13Inicial', $diente6Inicial->parteInferior));
        array_push($odontogramaInicial2array, array('l13Inicial', $diente6Inicial->parteIzquierda));
        array_push($odontogramaInicial2array, array('r13Inicial', $diente6Inicial->parteDerecha));
        array_push($odontogramaInicial2array, array('completo13Inicial', $diente6Inicial->completo));
        //diente 7
        array_push($odontogramaInicial2array, array('c12Inicial', $diente7Inicial->parteCentro));
        array_push($odontogramaInicial2array, array('t12Inicial', $diente7Inicial->parteSuperior));
        array_push($odontogramaInicial2array, array('b12Inicial', $diente7Inicial->parteInferior));
        array_push($odontogramaInicial2array, array('l12Inicial', $diente7Inicial->parteIzquierda));
        array_push($odontogramaInicial2array, array('r12Inicial', $diente7Inicial->parteDerecha));
        array_push($odontogramaInicial2array, array('completo12Inicial', $diente7Inicial->completo));
        //diente 8
        array_push($odontogramaInicial2array, array('c11Inicial', $diente8Inicial->parteCentro));
        array_push($odontogramaInicial2array, array('t11Inicial', $diente8Inicial->parteSuperior));
        array_push($odontogramaInicial2array, array('b11Inicial', $diente8Inicial->parteInferior));
        array_push($odontogramaInicial2array, array('l11Inicial', $diente8Inicial->parteIzquierda));
        array_push($odontogramaInicial2array, array('r11Inicial', $diente8Inicial->parteDerecha));
        array_push($odontogramaInicial2array, array('completo11Inicial', $diente8Inicial->completo));

        //Segundo bloque superior
        //diente 9
        array_push($odontogramaInicial2array, array('c21Inicial', $diente9Inicial->parteCentro));
        array_push($odontogramaInicial2array, array('t21Inicial', $diente9Inicial->parteSuperior));
        array_push($odontogramaInicial2array, array('b21Inicial', $diente9Inicial->parteInferior));
        array_push($odontogramaInicial2array, array('l21Inicial', $diente9Inicial->parteIzquierda));
        array_push($odontogramaInicial2array, array('r21Inicial', $diente9Inicial->parteDerecha));
        array_push($odontogramaInicial2array, array('completo21Inicial', $diente9Inicial->completo));
        //diente 10
        array_push($odontogramaInicial2array, array('c22Inicial', $diente10Inicial->parteCentro));
        array_push($odontogramaInicial2array, array('t22Inicial', $diente10Inicial->parteSuperior));
        array_push($odontogramaInicial2array, array('b22Inicial', $diente10Inicial->parteInferior));
        array_push($odontogramaInicial2array, array('l22Inicial', $diente10Inicial->parteIzquierda));
        array_push($odontogramaInicial2array, array('r22Inicial', $diente10Inicial->parteDerecha));
        array_push($odontogramaInicial2array, array('completo22Inicial', $diente10Inicial->completo));
        //diente 11
        array_push($odontogramaInicial2array, array('c23Inicial', $diente11Inicial->parteCentro));
        array_push($odontogramaInicial2array, array('t23Inicial', $diente11Inicial->parteSuperior));
        array_push($odontogramaInicial2array, array('b23Inicial', $diente11Inicial->parteInferior));
        array_push($odontogramaInicial2array, array('l23Inicial', $diente11Inicial->parteIzquierda));
        array_push($odontogramaInicial2array, array('r23Inicial', $diente11Inicial->parteDerecha));
        array_push($odontogramaInicial2array, array('completo23Inicial', $diente11Inicial->completo));
        //diente 12
        array_push($odontogramaInicial2array, array('c24Inicial', $diente12Inicial->parteCentro));
        array_push($odontogramaInicial2array, array('t24Inicial', $diente12Inicial->parteSuperior));
        array_push($odontogramaInicial2array, array('b24Inicial', $diente12Inicial->parteInferior));
        array_push($odontogramaInicial2array, array('l24Inicial', $diente12Inicial->parteIzquierda));
        array_push($odontogramaInicial2array, array('r24Inicial', $diente12Inicial->parteDerecha));
        array_push($odontogramaInicial2array, array('completo24Inicial', $diente12Inicial->completo));
        //diente 13
        array_push($odontogramaInicial2array, array('c25Inicial', $diente13Inicial->parteCentro));
        array_push($odontogramaInicial2array, array('t25Inicial', $diente13Inicial->parteSuperior));
        array_push($odontogramaInicial2array, array('b25Inicial', $diente13Inicial->parteInferior));
        array_push($odontogramaInicial2array, array('l25Inicial', $diente13Inicial->parteIzquierda));
        array_push($odontogramaInicial2array, array('r25Inicial', $diente13Inicial->parteDerecha));
        array_push($odontogramaInicial2array, array('completo25Inicial', $diente13Inicial->completo));
        //diente 14
        array_push($odontogramaInicial2array, array('c26Inicial', $diente14Inicial->parteCentro));
        array_push($odontogramaInicial2array, array('t26Inicial', $diente14Inicial->parteSuperior));
        array_push($odontogramaInicial2array, array('b26Inicial', $diente14Inicial->parteInferior));
        array_push($odontogramaInicial2array, array('l26Inicial', $diente14Inicial->parteIzquierda));
        array_push($odontogramaInicial2array, array('r26Inicial', $diente14Inicial->parteDerecha));
        array_push($odontogramaInicial2array, array('completo26Inicial', $diente14Inicial->completo));
        //diente 15
        array_push($odontogramaInicial2array, array('c27Inicial', $diente15Inicial->parteCentro));
        array_push($odontogramaInicial2array, array('t27Inicial', $diente15Inicial->parteSuperior));
        array_push($odontogramaInicial2array, array('b27Inicial', $diente15Inicial->parteInferior));
        array_push($odontogramaInicial2array, array('l27Inicial', $diente15Inicial->parteIzquierda));
        array_push($odontogramaInicial2array, array('r27Inicial', $diente15Inicial->parteDerecha));
        array_push($odontogramaInicial2array, array('completo27Inicial', $diente15Inicial->completo));
        //diente 16
        array_push($odontogramaInicial2array, array('c28Inicial', $diente16Inicial->parteCentro));
        array_push($odontogramaInicial2array, array('t28Inicial', $diente16Inicial->parteSuperior));
        array_push($odontogramaInicial2array, array('b28Inicial', $diente16Inicial->parteInferior));
        array_push($odontogramaInicial2array, array('l28Inicial', $diente16Inicial->parteIzquierda));
        array_push($odontogramaInicial2array, array('r28Inicial', $diente16Inicial->parteDerecha));
        array_push($odontogramaInicial2array, array('completo28Inicial', $diente16Inicial->completo));

        if($historia->edad <= 14){
            //bloque medio superior
              //diente 17
              array_push($odontogramaInicial2array, array('cleche55Inicial', $diente17Inicial->parteCentro));
              array_push($odontogramaInicial2array, array('tleche55Inicial', $diente17Inicial->parteSuperior));
              array_push($odontogramaInicial2array, array('bleche55Inicial', $diente17Inicial->parteInferior));
              array_push($odontogramaInicial2array, array('lleche55Inicial', $diente17Inicial->parteIzquierda));
              array_push($odontogramaInicial2array, array('rleche55Inicial', $diente17Inicial->parteDerecha));
              array_push($odontogramaInicial2array, array('completo55Inicial', $diente17Inicial->completo));

              //diente 18
              array_push($odontogramaInicial2array, array('cleche54Inicial', $diente18Inicial->parteCentro));
              array_push($odontogramaInicial2array, array('tleche54Inicial', $diente18Inicial->parteSuperior));
              array_push($odontogramaInicial2array, array('bleche54Inicial', $diente18Inicial->parteInferior));
              array_push($odontogramaInicial2array, array('lleche54Inicial', $diente18Inicial->parteIzquierda));
              array_push($odontogramaInicial2array, array('rleche54Inicial', $diente18Inicial->parteDerecha));
              array_push($odontogramaInicial2array, array('completo54Inicial', $diente18Inicial->completo));
              //diente 19
              array_push($odontogramaInicial2array, array('cleche53Inicial', $diente19Inicial->parteCentro));
              array_push($odontogramaInicial2array, array('tleche53Inicial', $diente19Inicial->parteSuperior));
              array_push($odontogramaInicial2array, array('bleche53Inicial', $diente19Inicial->parteInferior));
              array_push($odontogramaInicial2array, array('lleche53Inicial', $diente19Inicial->parteIzquierda));
              array_push($odontogramaInicial2array, array('rleche53Inicial', $diente19Inicial->parteDerecha));
              array_push($odontogramaInicial2array, array('completo53Inicial', $diente19Inicial->completo));
              //diente 20
              array_push($odontogramaInicial2array, array('cleche52Inicial', $diente20Inicial->parteCentro));
              array_push($odontogramaInicial2array, array('tleche52Inicial', $diente20Inicial->parteSuperior));
              array_push($odontogramaInicial2array, array('bleche52Inicial', $diente20Inicial->parteInferior));
              array_push($odontogramaInicial2array, array('lleche52Inicial', $diente20Inicial->parteIzquierda));
              array_push($odontogramaInicial2array, array('rleche52Inicial', $diente20Inicial->parteDerecha));
              array_push($odontogramaInicial2array, array('completo52Inicial', $diente20Inicial->completo));
              //diente 21
              array_push($odontogramaInicial2array, array('cleche51Inicial', $diente21Inicial->parteCentro));
              array_push($odontogramaInicial2array, array('tleche51Inicial', $diente21Inicial->parteSuperior));
              array_push($odontogramaInicial2array, array('bleche51Inicial', $diente21Inicial->parteInferior));
              array_push($odontogramaInicial2array, array('lleche51Inicial', $diente21Inicial->parteIzquierda));
              array_push($odontogramaInicial2array, array('rleche51Inicial', $diente21Inicial->parteDerecha));
              array_push($odontogramaInicial2array, array('completo51Inicial', $diente21Inicial->completo));
              //diente 22
              array_push($odontogramaInicial2array, array('cleche61Inicial', $diente22Inicial->parteCentro));
              array_push($odontogramaInicial2array, array('tleche61Inicial', $diente22Inicial->parteSuperior));
              array_push($odontogramaInicial2array, array('bleche61Inicial', $diente22Inicial->parteInferior));
              array_push($odontogramaInicial2array, array('lleche61Inicial', $diente22Inicial->parteIzquierda));
              array_push($odontogramaInicial2array, array('rleche61Inicial', $diente22Inicial->parteDerecha));
              array_push($odontogramaInicial2array, array('completo61Inicial', $diente22Inicial->completo));
              //diente 23
              array_push($odontogramaInicial2array, array('cleche62Inicial', $diente23Inicial->parteCentro));
              array_push($odontogramaInicial2array, array('tleche62Inicial', $diente23Inicial->parteSuperior));
              array_push($odontogramaInicial2array, array('bleche62Inicial', $diente23Inicial->parteInferior));
              array_push($odontogramaInicial2array, array('lleche62Inicial', $diente23Inicial->parteIzquierda));
              array_push($odontogramaInicial2array, array('rleche62Inicial', $diente23Inicial->parteDerecha));
              array_push($odontogramaInicial2array, array('completo62Inicial', $diente23Inicial->completo));
              //diente 24
              array_push($odontogramaInicial2array, array('cleche63Inicial', $diente24Inicial->parteCentro));
              array_push($odontogramaInicial2array, array('tleche63Inicial', $diente24Inicial->parteSuperior));
              array_push($odontogramaInicial2array, array('bleche63Inicial', $diente24Inicial->parteInferior));
              array_push($odontogramaInicial2array, array('lleche63Inicial', $diente24Inicial->parteIzquierda));
              array_push($odontogramaInicial2array, array('rleche63Inicial', $diente24Inicial->parteDerecha));
              array_push($odontogramaInicial2array, array('completo63Inicial', $diente24Inicial->completo));
              //diente 25
              array_push($odontogramaInicial2array, array('cleche64Inicial', $diente25Inicial->parteCentro));
              array_push($odontogramaInicial2array, array('tleche64Inicial', $diente25Inicial->parteSuperior));
              array_push($odontogramaInicial2array, array('bleche64Inicial', $diente25Inicial->parteInferior));
              array_push($odontogramaInicial2array, array('lleche64Inicial', $diente25Inicial->parteIzquierda));
              array_push($odontogramaInicial2array, array('rleche64Inicial', $diente25Inicial->parteDerecha));
              array_push($odontogramaInicial2array, array('completo64Inicial', $diente25Inicial->completo));
              //diente 26
              array_push($odontogramaInicial2array, array('cleche65Inicial', $diente26Inicial->parteCentro));
              array_push($odontogramaInicial2array, array('tleche65Inicial', $diente26Inicial->parteSuperior));
              array_push($odontogramaInicial2array, array('bleche65Inicial', $diente26Inicial->parteInferior));
              array_push($odontogramaInicial2array, array('lleche65Inicial', $diente26Inicial->parteIzquierda));
              array_push($odontogramaInicial2array, array('rleche65Inicial', $diente26Inicial->parteDerecha));
              array_push($odontogramaInicial2array, array('completo65Inicial', $diente26Inicial->completo));

              //bloque medio inferior
              //diente 27
              array_push($odontogramaInicial2array, array('cleche85Inicial', $diente27Inicial->parteCentro));
              array_push($odontogramaInicial2array, array('tleche85Inicial', $diente27Inicial->parteSuperior));
              array_push($odontogramaInicial2array, array('bleche85Inicial', $diente27Inicial->parteInferior));
              array_push($odontogramaInicial2array, array('lleche85Inicial', $diente27Inicial->parteIzquierda));
              array_push($odontogramaInicial2array, array('rleche85Inicial', $diente27Inicial->parteDerecha));
              array_push($odontogramaInicial2array, array('completo85Inicial', $diente27Inicial->completo));
              //diente 28
              array_push($odontogramaInicial2array, array('cleche84Inicial', $diente28Inicial->parteCentro));
              array_push($odontogramaInicial2array, array('tleche84Inicial', $diente28Inicial->parteSuperior));
              array_push($odontogramaInicial2array, array('bleche84Inicial', $diente28Inicial->parteInferior));
              array_push($odontogramaInicial2array, array('lleche84Inicial', $diente28Inicial->parteIzquierda));
              array_push($odontogramaInicial2array, array('rleche84Inicial', $diente28Inicial->parteDerecha));
              array_push($odontogramaInicial2array, array('completo84Inicial', $diente28Inicial->completo));
              //diente 29
              array_push($odontogramaInicial2array, array('cleche83Inicial', $diente29Inicial->parteCentro));
              array_push($odontogramaInicial2array, array('tleche83Inicial', $diente29Inicial->parteSuperior));
              array_push($odontogramaInicial2array, array('bleche83Inicial', $diente29Inicial->parteInferior));
              array_push($odontogramaInicial2array, array('lleche83Inicial', $diente29Inicial->parteIzquierda));
              array_push($odontogramaInicial2array, array('rleche83Inicial', $diente29Inicial->parteDerecha));
              array_push($odontogramaInicial2array, array('completo83Inicial', $diente29Inicial->completo));
              //diente 30
              array_push($odontogramaInicial2array, array('cleche82Inicial', $diente30Inicial->parteCentro));
              array_push($odontogramaInicial2array, array('tleche82Inicial', $diente30Inicial->parteSuperior));
              array_push($odontogramaInicial2array, array('bleche82Inicial', $diente30Inicial->parteInferior));
              array_push($odontogramaInicial2array, array('lleche82Inicial', $diente30Inicial->parteIzquierda));
              array_push($odontogramaInicial2array, array('rleche82Inicial', $diente30Inicial->parteDerecha));
              array_push($odontogramaInicial2array, array('completo82Inicial', $diente30Inicial->completo));
              //diente 31
              array_push($odontogramaInicial2array, array('cleche81Inicial', $diente31Inicial->parteCentro));
              array_push($odontogramaInicial2array, array('tleche81Inicial', $diente31Inicial->parteSuperior));
              array_push($odontogramaInicial2array, array('bleche81Inicial', $diente31Inicial->parteInferior));
              array_push($odontogramaInicial2array, array('lleche81Inicial', $diente31Inicial->parteIzquierda));
              array_push($odontogramaInicial2array, array('rleche81Inicial', $diente31Inicial->parteDerecha));
              array_push($odontogramaInicial2array, array('completo81Inicial', $diente31Inicial->completo));
              //diente 32
              array_push($odontogramaInicial2array, array('cleche71Inicial', $diente32Inicial->parteCentro));
              array_push($odontogramaInicial2array, array('tleche71Inicial', $diente32Inicial->parteSuperior));
              array_push($odontogramaInicial2array, array('bleche71Inicial', $diente32Inicial->parteInferior));
              array_push($odontogramaInicial2array, array('lleche71Inicial', $diente32Inicial->parteIzquierda));
              array_push($odontogramaInicial2array, array('rleche71Inicial', $diente32Inicial->parteDerecha));
              array_push($odontogramaInicial2array, array('completo71Inicial', $diente32Inicial->completo));
              //diente 33
              array_push($odontogramaInicial2array, array('cleche72Inicial', $diente33Inicial->parteCentro));
              array_push($odontogramaInicial2array, array('tleche72Inicial', $diente33Inicial->parteSuperior));
              array_push($odontogramaInicial2array, array('bleche72Inicial', $diente33Inicial->parteInferior));
              array_push($odontogramaInicial2array, array('lleche72Inicial', $diente33Inicial->parteIzquierda));
              array_push($odontogramaInicial2array, array('rleche72Inicial', $diente33Inicial->parteDerecha));
              array_push($odontogramaInicial2array, array('completo72Inicial', $diente33Inicial->completo));
              //diente 34
              array_push($odontogramaInicial2array, array('cleche73Inicial', $diente34Inicial->parteCentro));
              array_push($odontogramaInicial2array, array('tleche73Inicial', $diente34Inicial->parteSuperior));
              array_push($odontogramaInicial2array, array('bleche73Inicial', $diente34Inicial->parteInferior));
              array_push($odontogramaInicial2array, array('lleche73Inicial', $diente34Inicial->parteIzquierda));
              array_push($odontogramaInicial2array, array('rleche73Inicial', $diente34Inicial->parteDerecha));
              array_push($odontogramaInicial2array, array('completo73Inicial', $diente34Inicial->completo));
              //diente 35
              array_push($odontogramaInicial2array, array('cleche74Inicial', $diente35Inicial->parteCentro));
              array_push($odontogramaInicial2array, array('tleche74Inicial', $diente35Inicial->parteSuperior));
              array_push($odontogramaInicial2array, array('bleche74Inicial', $diente35Inicial->parteInferior));
              array_push($odontogramaInicial2array, array('lleche74Inicial', $diente35Inicial->parteIzquierda));
              array_push($odontogramaInicial2array, array('rleche74Inicial', $diente35Inicial->parteDerecha));
              array_push($odontogramaInicial2array, array('completo74Inicial', $diente35Inicial->completo));
              //diente 36
              array_push($odontogramaInicial2array, array('cleche75Inicial', $diente36Inicial->parteCentro));
              array_push($odontogramaInicial2array, array('tleche75Inicial', $diente36Inicial->parteSuperior));
              array_push($odontogramaInicial2array, array('bleche75Inicial', $diente36Inicial->parteInferior));
              array_push($odontogramaInicial2array, array('lleche75Inicial', $diente36Inicial->parteIzquierda));
              array_push($odontogramaInicial2array, array('rleche75Inicial', $diente36Inicial->parteDerecha));
              array_push($odontogramaInicial2array, array('completo75Inicial', $diente36Inicial->completo));
        }

        //Primer bloque inferior
        //diente 37
        array_push($odontogramaInicial2array, array('c48Inicial', $diente37Inicial->parteCentro));
        array_push($odontogramaInicial2array, array('t48Inicial', $diente37Inicial->parteSuperior));
        array_push($odontogramaInicial2array, array('b48Inicial', $diente37Inicial->parteInferior));
        array_push($odontogramaInicial2array, array('l48Inicial', $diente37Inicial->parteIzquierda));
        array_push($odontogramaInicial2array, array('r48Inicial', $diente37Inicial->parteDerecha));
        array_push($odontogramaInicial2array, array('completo48Inicial', $diente37Inicial->completo));
        //diente 38
        array_push($odontogramaInicial2array, array('c47Inicial', $diente38Inicial->parteCentro));
        array_push($odontogramaInicial2array, array('t47Inicial', $diente38Inicial->parteSuperior));
        array_push($odontogramaInicial2array, array('b47Inicial', $diente38Inicial->parteInferior));
        array_push($odontogramaInicial2array, array('l47Inicial', $diente38Inicial->parteIzquierda));
        array_push($odontogramaInicial2array, array('r47Inicial', $diente38Inicial->parteDerecha));
        array_push($odontogramaInicial2array, array('completo47Inicial', $diente38Inicial->completo));
        //diente 39
        array_push($odontogramaInicial2array, array('c46Inicial', $diente39Inicial->parteCentro));
        array_push($odontogramaInicial2array, array('t46Inicial', $diente39Inicial->parteSuperior));
        array_push($odontogramaInicial2array, array('b46Inicial', $diente39Inicial->parteInferior));
        array_push($odontogramaInicial2array, array('l46Inicial', $diente39Inicial->parteIzquierda));
        array_push($odontogramaInicial2array, array('r46Inicial', $diente39Inicial->parteDerecha));
        array_push($odontogramaInicial2array, array('completo46Inicial', $diente39Inicial->completo));
        //diente 40
        array_push($odontogramaInicial2array, array('c45Inicial', $diente40Inicial->parteCentro));
        array_push($odontogramaInicial2array, array('t45Inicial', $diente40Inicial->parteSuperior));
        array_push($odontogramaInicial2array, array('b45Inicial', $diente40Inicial->parteInferior));
        array_push($odontogramaInicial2array, array('l45Inicial', $diente40Inicial->parteIzquierda));
        array_push($odontogramaInicial2array, array('r45Inicial', $diente40Inicial->parteDerecha));
        array_push($odontogramaInicial2array, array('completo45Inicial', $diente40Inicial->completo));
        //diente 41
        array_push($odontogramaInicial2array, array('c44Inicial', $diente41Inicial->parteCentro));
        array_push($odontogramaInicial2array, array('t44Inicial', $diente41Inicial->parteSuperior));
        array_push($odontogramaInicial2array, array('b44Inicial', $diente41Inicial->parteInferior));
        array_push($odontogramaInicial2array, array('l44Inicial', $diente41Inicial->parteIzquierda));
        array_push($odontogramaInicial2array, array('r44Inicial', $diente41Inicial->parteDerecha));
        array_push($odontogramaInicial2array, array('completo44Inicial', $diente41Inicial->completo));
        //diente 42
        array_push($odontogramaInicial2array, array('c43Inicial', $diente42Inicial->parteCentro));
        array_push($odontogramaInicial2array, array('t43Inicial', $diente42Inicial->parteSuperior));
        array_push($odontogramaInicial2array, array('b43Inicial', $diente42Inicial->parteInferior));
        array_push($odontogramaInicial2array, array('l43Inicial', $diente42Inicial->parteIzquierda));
        array_push($odontogramaInicial2array, array('r43Inicial', $diente42Inicial->parteDerecha));
        array_push($odontogramaInicial2array, array('completo43Inicial', $diente42Inicial->completo));
        //diente 43
        array_push($odontogramaInicial2array, array('c42Inicial', $diente43Inicial->parteCentro));
        array_push($odontogramaInicial2array, array('t42Inicial', $diente43Inicial->parteSuperior));
        array_push($odontogramaInicial2array, array('b42Inicial', $diente43Inicial->parteInferior));
        array_push($odontogramaInicial2array, array('l42Inicial', $diente43Inicial->parteIzquierda));
        array_push($odontogramaInicial2array, array('r42Inicial', $diente43Inicial->parteDerecha));
        array_push($odontogramaInicial2array, array('completo42Inicial', $diente43Inicial->completo));
        //diente 44
        array_push($odontogramaInicial2array, array('c41Inicial', $diente44Inicial->parteCentro));
        array_push($odontogramaInicial2array, array('t41Inicial', $diente44Inicial->parteSuperior));
        array_push($odontogramaInicial2array, array('b41Inicial', $diente44Inicial->parteInferior));
        array_push($odontogramaInicial2array, array('l41Inicial', $diente44Inicial->parteIzquierda));
        array_push($odontogramaInicial2array, array('r41Inicial', $diente43Inicial->parteDerecha));
        array_push($odontogramaInicial2array, array('completo41Inicial', $diente43Inicial->completo));

        //Segundo bloque inferior
        //diente 45
        array_push($odontogramaInicial2array, array('c31Inicial', $diente45Inicial->parteCentro));
        array_push($odontogramaInicial2array, array('t31Inicial', $diente45Inicial->parteSuperior));
        array_push($odontogramaInicial2array, array('b31Inicial', $diente45Inicial->parteInferior));
        array_push($odontogramaInicial2array, array('l31Inicial', $diente45Inicial->parteIzquierda));
        array_push($odontogramaInicial2array, array('r31Inicial', $diente45Inicial->parteDerecha));
        array_push($odontogramaInicial2array, array('completo31Inicial', $diente45Inicial->completo));
        //diente 46
        array_push($odontogramaInicial2array, array('c32Inicial', $diente46Inicial->parteCentro));
        array_push($odontogramaInicial2array, array('t32Inicial', $diente46Inicial->parteSuperior));
        array_push($odontogramaInicial2array, array('b32Inicial', $diente46Inicial->parteInferior));
        array_push($odontogramaInicial2array, array('l32Inicial', $diente46Inicial->parteIzquierda));
        array_push($odontogramaInicial2array, array('r32Inicial', $diente46Inicial->parteDerecha));
        array_push($odontogramaInicial2array, array('completo32Inicial', $diente46Inicial->completo));
        //diente 47
        array_push($odontogramaInicial2array, array('c33Inicial', $diente47Inicial->parteCentro));
        array_push($odontogramaInicial2array, array('t33Inicial', $diente47Inicial->parteSuperior));
        array_push($odontogramaInicial2array, array('b33Inicial', $diente47Inicial->parteInferior));
        array_push($odontogramaInicial2array, array('l33Inicial', $diente47Inicial->parteIzquierda));
        array_push($odontogramaInicial2array, array('r33Inicial', $diente47Inicial->parteDerecha));
        array_push($odontogramaInicial2array, array('completo33Inicial', $diente47Inicial->completo));
        //diente 48
        array_push($odontogramaInicial2array, array('c34Inicial', $diente48Inicial->parteCentro));
        array_push($odontogramaInicial2array, array('t34Inicial', $diente48Inicial->parteSuperior));
        array_push($odontogramaInicial2array, array('b34Inicial', $diente48Inicial->parteInferior));
        array_push($odontogramaInicial2array, array('l34Inicial', $diente48Inicial->parteIzquierda));
        array_push($odontogramaInicial2array, array('r34Inicial', $diente48Inicial->parteDerecha));
        array_push($odontogramaInicial2array, array('completo34Inicial', $diente48Inicial->completo));
        //diente 49
        array_push($odontogramaInicial2array, array('c35Inicial', $diente49Inicial->parteCentro));
        array_push($odontogramaInicial2array, array('t35Inicial', $diente49Inicial->parteSuperior));
        array_push($odontogramaInicial2array, array('b35Inicial', $diente49Inicial->parteInferior));
        array_push($odontogramaInicial2array, array('l35Inicial', $diente49Inicial->parteIzquierda));
        array_push($odontogramaInicial2array, array('r35Inicial', $diente49Inicial->parteDerecha));
        array_push($odontogramaInicial2array, array('completo35Inicial', $diente49Inicial->completo));
        //diente 50
        array_push($odontogramaInicial2array, array('c36Inicial', $diente50Inicial->parteCentro));
        array_push($odontogramaInicial2array, array('t36Inicial', $diente50Inicial->parteSuperior));
        array_push($odontogramaInicial2array, array('b36Inicial', $diente50Inicial->parteInferior));
        array_push($odontogramaInicial2array, array('l36Inicial', $diente50Inicial->parteIzquierda));
        array_push($odontogramaInicial2array, array('r36Inicial', $diente50Inicial->parteDerecha));
        array_push($odontogramaInicial2array, array('completo36Inicial', $diente50Inicial->completo));
        //diente 51
        array_push($odontogramaInicial2array, array('c37Inicial', $diente51Inicial->parteCentro));
        array_push($odontogramaInicial2array, array('t37Inicial', $diente51Inicial->parteSuperior));
        array_push($odontogramaInicial2array, array('b37Inicial', $diente51Inicial->parteInferior));
        array_push($odontogramaInicial2array, array('l37Inicial', $diente51Inicial->parteIzquierda));
        array_push($odontogramaInicial2array, array('r37Inicial', $diente51Inicial->parteDerecha));
        array_push($odontogramaInicial2array, array('completo37Inicial', $diente51Inicial->completo));
        //diente 52
        array_push($odontogramaInicial2array, array('c38Inicial', $diente52Inicial->parteCentro));
        array_push($odontogramaInicial2array, array('t38Inicial', $diente52Inicial->parteSuperior));
        array_push($odontogramaInicial2array, array('b38Inicial', $diente52Inicial->parteInferior));
        array_push($odontogramaInicial2array, array('l38Inicial', $diente52Inicial->parteIzquierda));
        array_push($odontogramaInicial2array, array('r38Inicial', $diente52Inicial->parteDerecha));
        array_push($odontogramaInicial2array, array('completo38Inicial', $diente52Inicial->completo));

        //Odontograma modificable
        //Primer bloque superior
        //diente 1
        array_push($odontograma2array, array('c18', $diente1->parteCentro));
        array_push($odontograma2array, array('n18', $diente1->parteSuperior));
        array_push($odontograma2array, array('b18', $diente1->parteInferior));
        array_push($odontograma2array, array('l18', $diente1->parteIzquierda));
        array_push($odontograma2array, array('r18', $diente1->parteDerecha));
        array_push($odontograma2array, array('completo18', $diente1->completo));
        //diente 2
        array_push($odontograma2array, array('c17', $diente2->parteCentro));
        array_push($odontograma2array, array('n17', $diente2->parteSuperior));
        array_push($odontograma2array, array('b17', $diente2->parteInferior));
        array_push($odontograma2array, array('l17', $diente2->parteIzquierda));
        array_push($odontograma2array, array('r17', $diente2->parteDerecha));
        array_push($odontograma2array, array('completo17', $diente2->completo));
        //diente 3
        array_push($odontograma2array, array('c16', $diente3->parteCentro));
        array_push($odontograma2array, array('n16', $diente3->parteSuperior));
        array_push($odontograma2array, array('b16', $diente3->parteInferior));
        array_push($odontograma2array, array('l16', $diente3->parteIzquierda));
        array_push($odontograma2array, array('r16', $diente3->parteDerecha));
        array_push($odontograma2array, array('completo16', $diente3->completo));
        //diente 4
        array_push($odontograma2array, array('c15', $diente4->parteCentro));
        array_push($odontograma2array, array('n15', $diente4->parteSuperior));
        array_push($odontograma2array, array('b15', $diente4->parteInferior));
        array_push($odontograma2array, array('l15', $diente4->parteIzquierda));
        array_push($odontograma2array, array('r15', $diente4->parteDerecha));
        array_push($odontograma2array, array('completo15', $diente4->completo));
        //diente 5
        array_push($odontograma2array, array('c14', $diente5->parteCentro));
        array_push($odontograma2array, array('n14', $diente5->parteSuperior));
        array_push($odontograma2array, array('b14', $diente5->parteInferior));
        array_push($odontograma2array, array('l14', $diente5->parteIzquierda));
        array_push($odontograma2array, array('r14', $diente5->parteDerecha));
        array_push($odontograma2array, array('completo14', $diente5->completo));
        //diente 6
        array_push($odontograma2array, array('c13', $diente6->parteCentro));
        array_push($odontograma2array, array('n13', $diente6->parteSuperior));
        array_push($odontograma2array, array('b13', $diente6->parteInferior));
        array_push($odontograma2array, array('l13', $diente6->parteIzquierda));
        array_push($odontograma2array, array('r13', $diente6->parteDerecha));
        array_push($odontograma2array, array('completo13', $diente6->completo));
        //diente 7
        array_push($odontograma2array, array('c12', $diente7->parteCentro));
        array_push($odontograma2array, array('n12', $diente7->parteSuperior));
        array_push($odontograma2array, array('b12', $diente7->parteInferior));
        array_push($odontograma2array, array('l12', $diente7->parteIzquierda));
        array_push($odontograma2array, array('r12', $diente7->parteDerecha));
        array_push($odontograma2array, array('completo12', $diente7->completo));
        //diente 8
        array_push($odontograma2array, array('c11', $diente8->parteCentro));
        array_push($odontograma2array, array('n11', $diente8->parteSuperior));
        array_push($odontograma2array, array('b11', $diente8->parteInferior));
        array_push($odontograma2array, array('l11', $diente8->parteIzquierda));
        array_push($odontograma2array, array('r11', $diente8->parteDerecha));
        array_push($odontograma2array, array('completo11', $diente8->completo));

        //Segundo bloque superior
        //diente 9
        array_push($odontograma2array, array('c21', $diente9->parteCentro));
        array_push($odontograma2array, array('t21', $diente9->parteSuperior));
        array_push($odontograma2array, array('b21', $diente9->parteInferior));
        array_push($odontograma2array, array('l21', $diente9->parteIzquierda));
        array_push($odontograma2array, array('r21', $diente9->parteDerecha));
        array_push($odontograma2array, array('completo21', $diente9->completo));
        //diente 10
        array_push($odontograma2array, array('c22', $diente10->parteCentro));
        array_push($odontograma2array, array('t22', $diente10->parteSuperior));
        array_push($odontograma2array, array('b22', $diente10->parteInferior));
        array_push($odontograma2array, array('l22', $diente10->parteIzquierda));
        array_push($odontograma2array, array('r22', $diente10->parteDerecha));
        array_push($odontograma2array, array('completo22', $diente10->completo));
        //diente 11
        array_push($odontograma2array, array('c23', $diente11->parteCentro));
        array_push($odontograma2array, array('t23', $diente11->parteSuperior));
        array_push($odontograma2array, array('b23', $diente11->parteInferior));
        array_push($odontograma2array, array('l23', $diente11->parteIzquierda));
        array_push($odontograma2array, array('r23', $diente11->parteDerecha));
        array_push($odontograma2array, array('completo23', $diente11->completo));
        //diente 12
        array_push($odontograma2array, array('c24', $diente12->parteCentro));
        array_push($odontograma2array, array('t24', $diente12->parteSuperior));
        array_push($odontograma2array, array('b24', $diente12->parteInferior));
        array_push($odontograma2array, array('l24', $diente12->parteIzquierda));
        array_push($odontograma2array, array('r24', $diente12->parteDerecha));
        array_push($odontograma2array, array('completo24', $diente12->completo));
        //diente 13
        array_push($odontograma2array, array('c25', $diente13->parteCentro));
        array_push($odontograma2array, array('t25', $diente13->parteSuperior));
        array_push($odontograma2array, array('b25', $diente13->parteInferior));
        array_push($odontograma2array, array('l25', $diente13->parteIzquierda));
        array_push($odontograma2array, array('r25', $diente13->parteDerecha));
        array_push($odontograma2array, array('completo25', $diente13->completo));
        //diente 14
        array_push($odontograma2array, array('c26', $diente14->parteCentro));
        array_push($odontograma2array, array('t26', $diente14->parteSuperior));
        array_push($odontograma2array, array('b26', $diente14->parteInferior));
        array_push($odontograma2array, array('l26', $diente14->parteIzquierda));
        array_push($odontograma2array, array('r26', $diente14->parteDerecha));
        array_push($odontograma2array, array('completo26', $diente14->completo));
        //diente 15
        array_push($odontograma2array, array('c27', $diente15->parteCentro));
        array_push($odontograma2array, array('t27', $diente15->parteSuperior));
        array_push($odontograma2array, array('b27', $diente15->parteInferior));
        array_push($odontograma2array, array('l27', $diente15->parteIzquierda));
        array_push($odontograma2array, array('r27', $diente15->parteDerecha));
        array_push($odontograma2array, array('completo27', $diente15->completo));
        //diente 16
        array_push($odontograma2array, array('c28', $diente16->parteCentro));
        array_push($odontograma2array, array('t28', $diente16->parteSuperior));
        array_push($odontograma2array, array('b28', $diente16->parteInferior));
        array_push($odontograma2array, array('l28', $diente16->parteIzquierda));
        array_push($odontograma2array, array('r28', $diente16->parteDerecha));
        array_push($odontograma2array, array('completo28', $diente16->completo));

        //bloque medio superior
        if($historia->edad <= 14){
            //diente 17
              array_push($odontograma2array, array('cleche55', $diente17->parteCentro));
              array_push($odontograma2array, array('tleche55', $diente17->parteSuperior));
              array_push($odontograma2array, array('bleche55', $diente17->parteInferior));
              array_push($odontograma2array, array('lleche55', $diente17->parteIzquierda));
              array_push($odontograma2array, array('rleche55', $diente17->parteDerecha));
              array_push($odontograma2array, array('completo55', $diente17->completo));
              //diente 18
              array_push($odontograma2array, array('cleche54', $diente18->parteCentro));
              array_push($odontograma2array, array('tleche54', $diente18->parteSuperior));
              array_push($odontograma2array, array('bleche54', $diente18->parteInferior));
              array_push($odontograma2array, array('lleche54', $diente18->parteIzquierda));
              array_push($odontograma2array, array('rleche54', $diente18->parteDerecha));
              array_push($odontograma2array, array('completo54', $diente18->completo));
              //diente 19
              array_push($odontograma2array, array('cleche53', $diente19->parteCentro));
              array_push($odontograma2array, array('tleche53', $diente19->parteSuperior));
              array_push($odontograma2array, array('bleche53', $diente19->parteInferior));
              array_push($odontograma2array, array('lleche53', $diente19->parteIzquierda));
              array_push($odontograma2array, array('rleche53', $diente19->parteDerecha));
              array_push($odontograma2array, array('completo53', $diente19->completo));
              //diente 20
              array_push($odontograma2array, array('cleche52', $diente20->parteCentro));
              array_push($odontograma2array, array('tleche52', $diente20->parteSuperior));
              array_push($odontograma2array, array('bleche52', $diente20->parteInferior));
              array_push($odontograma2array, array('lleche52', $diente20->parteIzquierda));
              array_push($odontograma2array, array('rleche52', $diente20->parteDerecha));
              array_push($odontograma2array, array('completo52', $diente20->completo));
              //diente 21
              array_push($odontograma2array, array('cleche51', $diente21->parteCentro));
              array_push($odontograma2array, array('tleche51', $diente21->parteSuperior));
              array_push($odontograma2array, array('bleche51', $diente21->parteInferior));
              array_push($odontograma2array, array('lleche51', $diente21->parteIzquierda));
              array_push($odontograma2array, array('rleche51', $diente21->parteDerecha));
              array_push($odontograma2array, array('completo51', $diente21->completo));
              //diente 22
              array_push($odontograma2array, array('cleche61', $diente22->parteCentro));
              array_push($odontograma2array, array('tleche61', $diente22->parteSuperior));
              array_push($odontograma2array, array('bleche61', $diente22->parteInferior));
              array_push($odontograma2array, array('lleche61', $diente22->parteIzquierda));
              array_push($odontograma2array, array('rleche61', $diente22->parteDerecha));
              array_push($odontograma2array, array('completo61', $diente22->completo));
              //diente 23
              array_push($odontograma2array, array('cleche62', $diente23->parteCentro));
              array_push($odontograma2array, array('tleche62', $diente23->parteSuperior));
              array_push($odontograma2array, array('bleche62', $diente23->parteInferior));
              array_push($odontograma2array, array('lleche62', $diente23->parteIzquierda));
              array_push($odontograma2array, array('rleche62', $diente23->parteDerecha));
              array_push($odontograma2array, array('completo62', $diente23->completo));
              //diente 24
              array_push($odontograma2array, array('cleche63', $diente24->parteCentro));
              array_push($odontograma2array, array('tleche63', $diente24->parteSuperior));
              array_push($odontograma2array, array('bleche63', $diente24->parteInferior));
              array_push($odontograma2array, array('lleche63', $diente24->parteIzquierda));
              array_push($odontograma2array, array('rleche63', $diente24->parteDerecha));
              array_push($odontograma2array, array('completo63', $diente24->completo));
              //diente 25
              array_push($odontograma2array, array('cleche64', $diente25->parteCentro));
              array_push($odontograma2array, array('tleche64', $diente25->parteSuperior));
              array_push($odontograma2array, array('bleche64', $diente25->parteInferior));
              array_push($odontograma2array, array('lleche64', $diente25->parteIzquierda));
              array_push($odontograma2array, array('rleche64', $diente25->parteDerecha));
              array_push($odontograma2array, array('completo64', $diente25->completo));
              //diente 26
              array_push($odontograma2array, array('cleche65', $diente26->parteCentro));
              array_push($odontograma2array, array('tleche65', $diente26->parteSuperior));
              array_push($odontograma2array, array('bleche65', $diente26->parteInferior));
              array_push($odontograma2array, array('lleche65', $diente26->parteIzquierda));
              array_push($odontograma2array, array('rleche65', $diente26->parteDerecha));
              array_push($odontograma2array, array('completo65', $diente26->completo));

              //bloque medio inferior
              //diente 27
              array_push($odontograma2array, array('cleche85', $diente27->parteCentro));
              array_push($odontograma2array, array('tleche85', $diente27->parteSuperior));
              array_push($odontograma2array, array('bleche85', $diente27->parteInferior));
              array_push($odontograma2array, array('lleche85', $diente27->parteIzquierda));
              array_push($odontograma2array, array('rleche85', $diente27->parteDerecha));
              array_push($odontograma2array, array('completo85', $diente27->completo));
              //diente 28
              array_push($odontograma2array, array('cleche84', $diente28->parteCentro));
              array_push($odontograma2array, array('tleche84', $diente28->parteSuperior));
              array_push($odontograma2array, array('bleche84', $diente28->parteInferior));
              array_push($odontograma2array, array('lleche84', $diente28->parteIzquierda));
              array_push($odontograma2array, array('rleche84', $diente28->parteDerecha));
              array_push($odontograma2array, array('completo84', $diente28->completo));
              //diente 29
              array_push($odontograma2array, array('cleche83', $diente29->parteCentro));
              array_push($odontograma2array, array('tleche83', $diente29->parteSuperior));
              array_push($odontograma2array, array('bleche83', $diente29->parteInferior));
              array_push($odontograma2array, array('lleche83', $diente29->parteIzquierda));
              array_push($odontograma2array, array('rleche83', $diente29->parteDerecha));
              array_push($odontograma2array, array('completo83', $diente29->completo));
              //diente 30
              array_push($odontograma2array, array('cleche82', $diente30->parteCentro));
              array_push($odontograma2array, array('tleche82', $diente30->parteSuperior));
              array_push($odontograma2array, array('bleche82', $diente30->parteInferior));
              array_push($odontograma2array, array('lleche82', $diente30->parteIzquierda));
              array_push($odontograma2array, array('rleche82', $diente30->parteDerecha));
              array_push($odontograma2array, array('completo82', $diente30->completo));
              //diente 31
              array_push($odontograma2array, array('cleche81', $diente31->parteCentro));
              array_push($odontograma2array, array('tleche81', $diente31->parteSuperior));
              array_push($odontograma2array, array('bleche81', $diente31->parteInferior));
              array_push($odontograma2array, array('lleche81', $diente31->parteIzquierda));
              array_push($odontograma2array, array('rleche81', $diente31->parteDerecha));
              array_push($odontograma2array, array('completo81', $diente31->completo));
              //diente 32
              array_push($odontograma2array, array('cleche71', $diente32->parteCentro));
              array_push($odontograma2array, array('tleche71', $diente32->parteSuperior));
              array_push($odontograma2array, array('bleche71', $diente32->parteInferior));
              array_push($odontograma2array, array('lleche71', $diente32->parteIzquierda));
              array_push($odontograma2array, array('rleche71', $diente32->parteDerecha));
              array_push($odontograma2array, array('completo71', $diente32->completo));
              //diente 33
              array_push($odontograma2array, array('cleche72', $diente33->parteCentro));
              array_push($odontograma2array, array('tleche72', $diente33->parteSuperior));
              array_push($odontograma2array, array('bleche72', $diente33->parteInferior));
              array_push($odontograma2array, array('lleche72', $diente33->parteIzquierda));
              array_push($odontograma2array, array('rleche72', $diente33->parteDerecha));
              array_push($odontograma2array, array('completo72', $diente33->completo));
              //diente 34
              array_push($odontograma2array, array('cleche73', $diente34->parteCentro));
              array_push($odontograma2array, array('tleche73', $diente34->parteSuperior));
              array_push($odontograma2array, array('bleche73', $diente34->parteInferior));
              array_push($odontograma2array, array('lleche73', $diente34->parteIzquierda));
              array_push($odontograma2array, array('rleche73', $diente34->parteDerecha));
              array_push($odontograma2array, array('completo73', $diente34->completo));
              //diente 35
              array_push($odontograma2array, array('cleche74', $diente35->parteCentro));
              array_push($odontograma2array, array('tleche74', $diente35->parteSuperior));
              array_push($odontograma2array, array('bleche74', $diente35->parteInferior));
              array_push($odontograma2array, array('lleche74', $diente35->parteIzquierda));
              array_push($odontograma2array, array('rleche74', $diente35->parteDerecha));
              array_push($odontograma2array, array('completo74', $diente35->completo));
              //diente 36
              array_push($odontograma2array, array('cleche75', $diente36->parteCentro));
              array_push($odontograma2array, array('tleche75', $diente36->parteSuperior));
              array_push($odontograma2array, array('bleche75', $diente36->parteInferior));
              array_push($odontograma2array, array('lleche75', $diente36->parteIzquierda));
              array_push($odontograma2array, array('rleche75', $diente36->parteDerecha));
              array_push($odontograma2array, array('completo75', $diente36->completo));
        }

        //Primer bloque inferior
        //diente 37
        array_push($odontograma2array, array('c48', $diente37->parteCentro));
        array_push($odontograma2array, array('t48', $diente37->parteSuperior));
        array_push($odontograma2array, array('b48', $diente37->parteInferior));
        array_push($odontograma2array, array('l48', $diente37->parteIzquierda));
        array_push($odontograma2array, array('r48', $diente37->parteDerecha));
        array_push($odontograma2array, array('completo48', $diente37->completo));
        //diente 38
        array_push($odontograma2array, array('c47', $diente38->parteCentro));
        array_push($odontograma2array, array('t47', $diente38->parteSuperior));
        array_push($odontograma2array, array('b47', $diente38->parteInferior));
        array_push($odontograma2array, array('l47', $diente38->parteIzquierda));
        array_push($odontograma2array, array('r47', $diente38->parteDerecha));
        array_push($odontograma2array, array('completo47', $diente38->completo));
        //diente 39
        array_push($odontograma2array, array('c46', $diente39->parteCentro));
        array_push($odontograma2array, array('t46', $diente39->parteSuperior));
        array_push($odontograma2array, array('b46', $diente39->parteInferior));
        array_push($odontograma2array, array('l46', $diente39->parteIzquierda));
        array_push($odontograma2array, array('r46', $diente39->parteDerecha));
        array_push($odontograma2array, array('completo46', $diente39->completo));
        //diente 40
        array_push($odontograma2array, array('c45', $diente40->parteCentro));
        array_push($odontograma2array, array('t45', $diente40->parteSuperior));
        array_push($odontograma2array, array('b45', $diente40->parteInferior));
        array_push($odontograma2array, array('l45', $diente40->parteIzquierda));
        array_push($odontograma2array, array('r45', $diente40->parteDerecha));
        array_push($odontograma2array, array('completo45', $diente40->completo));
        //diente 41
        array_push($odontograma2array, array('c44', $diente41->parteCentro));
        array_push($odontograma2array, array('t44', $diente41->parteSuperior));
        array_push($odontograma2array, array('b44', $diente41->parteInferior));
        array_push($odontograma2array, array('l44', $diente41->parteIzquierda));
        array_push($odontograma2array, array('r44', $diente41->parteDerecha));
        array_push($odontograma2array, array('completo44', $diente41->completo));
        //diente 42
        array_push($odontograma2array, array('c43', $diente42->parteCentro));
        array_push($odontograma2array, array('t43', $diente42->parteSuperior));
        array_push($odontograma2array, array('b43', $diente42->parteInferior));
        array_push($odontograma2array, array('l43', $diente42->parteIzquierda));
        array_push($odontograma2array, array('r43', $diente42->parteDerecha));
        array_push($odontograma2array, array('completo43', $diente42->completo));
        //diente 43
        array_push($odontograma2array, array('c42', $diente43->parteCentro));
        array_push($odontograma2array, array('t42', $diente43->parteSuperior));
        array_push($odontograma2array, array('b42', $diente43->parteInferior));
        array_push($odontograma2array, array('l42', $diente43->parteIzquierda));
        array_push($odontograma2array, array('r42', $diente43->parteDerecha));
        array_push($odontograma2array, array('completo42', $diente43->completo));
        //diente 44
        array_push($odontograma2array, array('c41', $diente44->parteCentro));
        array_push($odontograma2array, array('t41', $diente44->parteSuperior));
        array_push($odontograma2array, array('b41', $diente44->parteInferior));
        array_push($odontograma2array, array('l41', $diente44->parteIzquierda));
        array_push($odontograma2array, array('r41', $diente44->parteDerecha));
        array_push($odontograma2array, array('completo41', $diente44->completo));

        //Segundo bloque inferior
        //diente 45
        array_push($odontograma2array, array('c31', $diente45->parteCentro));
        array_push($odontograma2array, array('t31', $diente45->parteSuperior));
        array_push($odontograma2array, array('b31', $diente45->parteInferior));
        array_push($odontograma2array, array('l31', $diente45->parteIzquierda));
        array_push($odontograma2array, array('r31', $diente45->parteDerecha));
        array_push($odontograma2array, array('completo31', $diente45->completo));
        //diente 46
        array_push($odontograma2array, array('c32', $diente46->parteCentro));
        array_push($odontograma2array, array('t32', $diente46->parteSuperior));
        array_push($odontograma2array, array('b32', $diente46->parteInferior));
        array_push($odontograma2array, array('l32', $diente46->parteIzquierda));
        array_push($odontograma2array, array('r32', $diente46->parteDerecha));
        array_push($odontograma2array, array('completo32', $diente46->completo));
        //diente 47
        array_push($odontograma2array, array('c33', $diente47->parteCentro));
        array_push($odontograma2array, array('t33', $diente47->parteSuperior));
        array_push($odontograma2array, array('b33', $diente47->parteInferior));
        array_push($odontograma2array, array('l33', $diente47->parteIzquierda));
        array_push($odontograma2array, array('r33', $diente47->parteDerecha));
        array_push($odontograma2array, array('completo33', $diente47->completo));
        //diente 48
        array_push($odontograma2array, array('c34', $diente48->parteCentro));
        array_push($odontograma2array, array('t34', $diente48->parteSuperior));
        array_push($odontograma2array, array('b34', $diente48->parteInferior));
        array_push($odontograma2array, array('l34', $diente48->parteIzquierda));
        array_push($odontograma2array, array('r34', $diente48->parteDerecha));
        array_push($odontograma2array, array('completo34', $diente48->completo));
        //diente 49
        array_push($odontograma2array, array('c35', $diente49->parteCentro));
        array_push($odontograma2array, array('t35', $diente49->parteSuperior));
        array_push($odontograma2array, array('b35', $diente49->parteInferior));
        array_push($odontograma2array, array('l35', $diente49->parteIzquierda));
        array_push($odontograma2array, array('r35', $diente49->parteDerecha));
        array_push($odontograma2array, array('completo35', $diente49->completo));
        //diente 50
        array_push($odontograma2array, array('c36', $diente50->parteCentro));
        array_push($odontograma2array, array('t36', $diente50->parteSuperior));
        array_push($odontograma2array, array('b36', $diente50->parteInferior));
        array_push($odontograma2array, array('l36', $diente50->parteIzquierda));
        array_push($odontograma2array, array('r36', $diente50->parteDerecha));
        array_push($odontograma2array, array('completo36', $diente50->completo));
        //diente 51
        array_push($odontograma2array, array('c37', $diente51->parteCentro));
        array_push($odontograma2array, array('t37', $diente51->parteSuperior));
        array_push($odontograma2array, array('b37', $diente51->parteInferior));
        array_push($odontograma2array, array('l37', $diente51->parteIzquierda));
        array_push($odontograma2array, array('r37', $diente51->parteDerecha));
        array_push($odontograma2array, array('completo37', $diente51->completo));
        //diente 52
        array_push($odontograma2array, array('c38', $diente52->parteCentro));
        array_push($odontograma2array, array('t38', $diente52->parteSuperior));
        array_push($odontograma2array, array('b38', $diente52->parteInferior));
        array_push($odontograma2array, array('l38', $diente52->parteIzquierda));
        array_push($odontograma2array, array('r38', $diente52->parteDerecha));
        array_push($odontograma2array, array('completo38', $diente52->completo));

        $empresa = Empresa::find($user->idEmpresa);
        $flag = "historia";
        if($user->esAdmin){
             return View('HistoriaClinica.crearHistoriaClinica')
            ->with('departamentos',$departamentos)
            ->with('ciudades', $ciudades)
            ->with('user',$user)
            ->with('empresa',$empresa)
            ->with('historia',$historia)
            ->with('procedimientos',$procedimientos)
            ->with('odontogramaInicial2array', $odontogramaInicial2array)
            ->with('odontograma2array', $odontograma2array)
            ->with('flag', $flag);
        }else{
             return View('HistoriaClinica.crearHistoriaClinicaTrabajador')
            ->with('departamentos',$departamentos)
            ->with('ciudades', $ciudades)
            ->with('user',$user)
            ->with('empresa',$empresa)
            ->with('historia',$historia)
            ->with('procedimientos',$procedimientos)
            ->with('odontogramaInicial2array', $odontogramaInicial2array)
            ->with('odontograma2array', $odontograma2array)
            ->with('flag', $flag);
        }
    }

    public function posteditHistoriaClinica(Request $request){
      $user = Auth::User();
      $departamentos = Departamento::all();
      $ciudades = Ciudad::all();

      $historia = HistoriaClinica::find($request->historiaID);
      //Información personal
      $historia->nombreCompleto = $request->nombreCompleto;
      $historia->tipoDocumento = $request->tipoDocumento;
      $historia->documento = $request->documento;
      $historia->sexo = $request->sexo;
      $historia->edad = $request->edad;
      $historia->email = $request->email;
      $historia->exoneradoImpuestos = $request->impuestos;
      $historia->fechaNacimiento = $request->fechaNacimiento;
      $historia->direccion = $request->direccion;
      $historia->telefono = $request->telefono;
      $historia->departamento = $request->idDepto;
      $historia->ciudad = $request->idCiudad;
      $historia->personaResponsable = $request->personaResponsable;
      $historia->telefonoResponsable = $request->telefonoResponsable;
      $historia->motivoConsulta = $request->motivoConsulta;
      $historia->evolucionEstado = $request->evolucionEstado;
      $historia->antecedentesFamiliares = $request->antecedentesFamiliares;

      //Antecedentes Odontológico y Médicos Generales
      $historia->alergias = $request->alergias;
      $historia->hepatitis = $request->hepatitis;
      $historia->transtornoGastricos = $request->transtornoGastricos;
      $historia->discrasiasSangineas = $request->discrasiasSangineas;
      $historia->diabetis = $request->diabetis;
      $historia->transtornoEmocional = $request->transtornoEmocional;
      $historia->cardiopatias = $request->cardiopatias;
      $historia->fiebreReumatica = $request->fiebreReumatica;
      $historia->sinusitis = $request->sinusitis;
      $historia->embarazo = $request->embarazo;
      $historia->hvisida = $request->hvisida;
      $historia->cirugias = $request->cirugias;
      $historia->altPresionArterial = $request->altPresionArterial;
      $historia->inmunosupresion = $request->inmunosupresion;
      $historia->exodoncias = $request->exodoncias;
      $historia->tomaMedicamentos = $request->tomaMedicamentos;
      $historia->patologiaRenales = $request->patologiaRenales;
      $historia->enfermedadesOrales = $request->enfermedadesOrales;
      $historia->tratMedActual = $request->tratMedActual;
      $historia->patologiaRespiratoria = $request->patologiaRespiratoria;
      $historia->protesis = $request->protesis;
      $historia->otrasPatologiasAntecedentes = $request->otrasPatologiasAntecedentes;
      $historia->observacionesAntecedentes = $request->observacionesAntecedentes;

      //Exámen Estomatológico / Articulación temporo mandibular (Hallazgo Clínicos)
      $historia->labioInferior = $request->labioInferior;
      $historia->orofaringe = $request->orofaringe;
      $historia->desviacion = $request->desviacion;
      $historia->labioSuperior = $request->labioSuperior;
      $historia->paladar = $request->paladar;
      $historia->cambioVolumen = $request->cambioVolumen;
      $historia->comisuras = $request->comisuras;
      $historia->glandulasSalivales = $request->glandulasSalivales;
      $historia->bloqueoMandibular = $request->bloqueoMandibular;
      $historia->mucuosaOral = $request->mucuosaOral;
      $historia->pisoDeBoca = $request->pisoDeBoca;
      $historia->limitacionMandibula = $request->limitacionMandibula;
      $historia->surcosYugales = $request->surcosYugales;
      $historia->dorsoLengua = $request->dorsoLengua;
      $historia->dolorArticular = $request->dolorArticular;
      $historia->frenillos = $request->frenillos;
      $historia->vientreLengua = $request->vientreLengua;
      $historia->ruidos = $request->ruidos;
      $historia->dolorMuscular = $request->dolorMuscular;

      $historia->cariados = $request->cariados;
      $historia->obturados = $request->obturados;
      $historia->exfoliados = $request->exfoliados;
      $historia->sanos = $request->sanos;
      $historia->observacionesEE = $request->observacionesEE;

      //Inicio modificar odontograma

      $odontograma = Odontograma::find($historia->idOdontograma);
      $odontogramaInicial = Odontograma::find($historia->idOdontogramaInicial);

      if($historia->primerOdontograma == 0){
            //Bloque superior
            //Diente # 18
            $diente1 = Diente::find($odontogramaInicial->idDiente1);
            $diente1->parteCentro = $request->c181;
            $diente1->parteSuperior = $request->t181;
            $diente1->parteInferior = $request->b181;
            $diente1->parteDerecha = $request->r181;
            $diente1->parteIzquierda = $request->l181;
            $diente1->completo = $request->completo181;
            $diente1->save();

            //Diente # 17
            $diente2 = Diente::find($odontogramaInicial->idDiente2);
            $diente2->parteCentro = $request->c171;
            $diente2->parteSuperior = $request->t171;
            $diente2->parteInferior = $request->b171;
            $diente2->parteDerecha = $request->r171;
            $diente2->parteIzquierda = $request->l171;
            $diente2->completo = $request->completo171;
            $diente2->save();

            //Diente # 16
            $diente3 = Diente::find($odontogramaInicial->idDiente3);
            $diente3->parteCentro = $request->c161;
            $diente3->parteSuperior = $request->t161;
            $diente3->parteInferior = $request->b161;
            $diente3->parteDerecha = $request->r161;
            $diente3->parteIzquierda = $request->l161;
            $diente3->completo = $request->completo161;
            $diente3->save();

            //Diente # 15
            $diente4 = Diente::find($odontogramaInicial->idDiente4);
            $diente4->parteCentro = $request->c151;
            $diente4->parteSuperior = $request->t151;
            $diente4->parteInferior = $request->b151;
            $diente4->parteDerecha = $request->r151;
            $diente4->parteIzquierda = $request->l151;
            $diente4->completo = $request->completo151;
            $diente4->save();

            //Diente # 14
            $diente5 = Diente::find($odontogramaInicial->idDiente5);
            $diente5->parteCentro = $request->c141;
            $diente5->parteSuperior = $request->t141;
            $diente5->parteInferior = $request->b141;
            $diente5->parteDerecha = $request->r141;
            $diente5->parteIzquierda = $request->l141;
            $diente5->completo = $request->completo141;
            $diente5->save();

            //Diente # 13
            $diente6 = Diente::find($odontogramaInicial->idDiente6);
            $diente6->parteCentro = $request->c131;
            $diente6->parteSuperior = $request->t131;
            $diente6->parteInferior = $request->b131;
            $diente6->parteDerecha = $request->r131;
            $diente6->parteIzquierda = $request->l131;
            $diente6->completo = $request->completo131;
            $diente6->save();

            //Diente # 12
            $diente7 = Diente::find($odontogramaInicial->idDiente7);
            $diente7->parteCentro = $request->c121;
            $diente7->parteSuperior = $request->t121;
            $diente7->parteInferior = $request->b121;
            $diente7->parteDerecha = $request->r121;
            $diente7->parteIzquierda = $request->l121;
            $diente7->completo = $request->completo121;
            $diente7->save();

            //Diente # 11
            $diente8 = Diente::find($odontogramaInicial->idDiente8);
            $diente8->parteCentro = $request->c111;
            $diente8->parteSuperior = $request->t111;
            $diente8->parteInferior = $request->b111;
            $diente8->parteDerecha = $request->r111;
            $diente8->parteIzquierda = $request->l111;
            $diente8->completo = $request->completo111;
            $diente8->save();

            //Diente # 21
            $diente9 = Diente::find($odontogramaInicial->idDiente9);
            $diente9->parteCentro = $request->c211;
            $diente9->parteSuperior = $request->t211;
            $diente9->parteInferior = $request->b211;
            $diente9->parteDerecha = $request->r211;
            $diente9->parteIzquierda = $request->l211;
            $diente9->completo = $request->completo211;
            $diente9->save();

            //Diente # 22
            $diente10 = Diente::find($odontogramaInicial->idDiente10);
            $diente10->parteCentro = $request->c221;
            $diente10->parteSuperior = $request->t221;
            $diente10->parteInferior = $request->b221;
            $diente10->parteDerecha = $request->r221;
            $diente10->parteIzquierda = $request->l221;
            $diente10->completo = $request->completo221;
            $diente10->save();

            //Diente # 23
            $diente11 = Diente::find($odontogramaInicial->idDiente11);
            $diente11->parteCentro = $request->c231;
            $diente11->parteSuperior = $request->t231;
            $diente11->parteInferior = $request->b231;
            $diente11->parteDerecha = $request->r231;
            $diente11->parteIzquierda = $request->l231;
            $diente11->completo = $request->completo231;
            $diente11->save();

            //Diente # 24
            $diente12 = Diente::find($odontogramaInicial->idDiente12);
            $diente12->parteCentro = $request->c241;
            $diente12->parteSuperior = $request->t241;
            $diente12->parteInferior = $request->b241;
            $diente12->parteDerecha = $request->r241;
            $diente12->parteIzquierda = $request->l241;
            $diente12->completo = $request->completo241;
            $diente12->save();

            //Diente # 25
            $diente13 = Diente::find($odontogramaInicial->idDiente13);
            $diente13->parteCentro = $request->c251;
            $diente13->parteSuperior = $request->t251;
            $diente13->parteInferior = $request->b251;
            $diente13->parteDerecha = $request->r251;
            $diente13->parteIzquierda = $request->l251;
            $diente13->completo = $request->completo251;
            $diente13->save();

            //Diente # 26
            $diente14 = Diente::find($odontogramaInicial->idDiente14);
            $diente14->parteCentro = $request->c261;
            $diente14->parteSuperior = $request->t261;
            $diente14->parteInferior = $request->b261;
            $diente14->parteDerecha = $request->r261;
            $diente14->parteIzquierda = $request->l261;
            $diente14->completo = $request->completo261;
            $diente14->save();

            //Diente # 27
            $diente15 = Diente::find($odontogramaInicial->idDiente15);
            $diente15->parteCentro = $request->c271;
            $diente15->parteSuperior = $request->t271;
            $diente15->parteInferior = $request->b271;
            $diente15->parteDerecha = $request->r271;
            $diente15->parteIzquierda = $request->l271;
            $diente15->completo = $request->completo271;
            $diente15->save();

            //Diente # 28
            $diente16 = Diente::find($odontogramaInicial->idDiente16);
            $diente16->parteCentro = $request->c281;
            $diente16->parteSuperior = $request->t281;
            $diente16->parteInferior = $request->b281;
            $diente16->parteDerecha = $request->r281;
            $diente16->parteIzquierda = $request->l281;
            $diente16->completo = $request->completo281;
            $diente16->save();

            //Bloque medio superior
            if($historia->edad <= 14){
                  //Diente # 55
                  $diente17 = Diente::find($odontogramaInicial->idDiente17);
                  $diente17->parteCentro = $request->cleche551;
                  $diente17->parteSuperior = $request->tleche551;
                  $diente17->parteInferior = $request->bleche551;
                  $diente17->parteDerecha = $request->rleche551;
                  $diente17->parteIzquierda = $request->lleche551;
                  $diente17->completo = $request->completo551;
                  $diente17->save();

                  //Diente # 54
                  $diente18 = Diente::find($odontogramaInicial->idDiente18);
                  $diente18->parteCentro = $request->cleche541;
                  $diente18->parteSuperior = $request->tleche541;
                  $diente18->parteInferior = $request->bleche541;
                  $diente18->parteDerecha = $request->rleche541;
                  $diente18->parteIzquierda = $request->lleche541;
                  $diente18->completo = $request->completo541;
                  $diente18->save();

                  //Diente # 53
                  $diente19 = Diente::find($odontogramaInicial->idDiente19);
                  $diente19->parteCentro = $request->cleche531;
                  $diente19->parteSuperior = $request->tleche531;
                  $diente19->parteInferior = $request->bleche531;
                  $diente19->parteDerecha = $request->rleche531;
                  $diente19->parteIzquierda = $request->lechel531;
                  $diente19->completo = $request->completo531;
                  $diente19->save();

                  //Diente # 52
                  $diente20 = Diente::find($odontogramaInicial->idDiente20);
                  $diente20->parteCentro = $request->cleche521;
                  $diente20->parteSuperior = $request->tleche521;
                  $diente20->parteInferior = $request->bleche521;
                  $diente20->parteDerecha = $request->rleche521;
                  $diente20->parteIzquierda = $request->lleche521;
                  $diente20->completo = $request->completo521;
                  $diente20->save();

                  //Diente # 51
                  $diente21 = Diente::find($odontogramaInicial->idDiente21);
                  $diente21->parteCentro = $request->cleche511;
                  $diente21->parteSuperior = $request->tleche511;
                  $diente21->parteInferior = $request->bleche511;
                  $diente21->parteDerecha = $request->rleche511;
                  $diente21->parteIzquierda = $request->lleche511;
                  $diente21->completo = $request->completo511;
                  $diente21->save();

                  //Diente # 61
                  $diente22 = Diente::find($odontogramaInicial->idDiente22);
                  $diente22->parteCentro = $request->cleche611;
                  $diente22->parteSuperior = $request->tleche611;
                  $diente22->parteInferior = $request->bleche611;
                  $diente22->parteDerecha = $request->rleche611;
                  $diente22->parteIzquierda = $request->lleche611;
                  $diente22->completo = $request->completo611;
                  $diente22->save();

                  //Diente # 62
                  $diente23 = Diente::find($odontogramaInicial->idDiente23);
                  $diente23->parteCentro = $request->cleche621;
                  $diente23->parteSuperior = $request->tleche621;
                  $diente23->parteInferior = $request->bleche621;
                  $diente23->parteDerecha = $request->rleche621;
                  $diente23->parteIzquierda = $request->lleche621;
                  $diente23->completo = $request->completo621;
                  $diente23->save();

                  //Diente # 63
                  $diente24 = Diente::find($odontogramaInicial->idDiente24);
                  $diente24->parteCentro = $request->cleche631;
                  $diente24->parteSuperior = $request->tleche631;
                  $diente24->parteInferior = $request->bleche631;
                  $diente24->parteDerecha = $request->rleche631;
                  $diente24->parteIzquierda = $request->lleche631;
                  $diente24->completo = $request->completo631;
                  $diente24->save();

                  //Diente # 64
                  $diente25 = Diente::find($odontogramaInicial->idDiente25);
                  $diente25->parteCentro = $request->cleche641;
                  $diente25->parteSuperior = $request->tleche641;
                  $diente25->parteInferior = $request->bleche641;
                  $diente25->parteDerecha = $request->rleche641;
                  $diente25->parteIzquierda = $request->lleche641;
                  $diente25->completo = $request->completo641;
                  $diente25->save();

                  //Diente # 65
                  $diente26 = Diente::find($odontogramaInicial->idDiente26);
                  $diente26->parteCentro = $request->cleche651;
                  $diente26->parteSuperior = $request->tleche651;
                  $diente26->parteInferior = $request->bleche651;
                  $diente26->parteDerecha = $request->rleche651;
                  $diente26->parteIzquierda = $request->lleche651;
                  $diente26->completo = $request->completo651;
                  $diente26->save();

                  //Bloque medio inferior
                  //Diente # 85
                  $diente27 = Diente::find($odontogramaInicial->idDiente27);
                  $diente27->parteCentro = $request->cleche851;
                  $diente27->parteSuperior = $request->tleche851;
                  $diente27->parteInferior = $request->bleche851;
                  $diente27->parteDerecha = $request->rleche851;
                  $diente27->parteIzquierda = $request->lleche851;
                  $diente27->completo = $request->completo851;
                  $diente27->save();

                  //Diente # 84
                  $diente28 = Diente::find($odontogramaInicial->idDiente28);
                  $diente28->parteCentro = $request->cleche841;
                  $diente28->parteSuperior = $request->tleche841;
                  $diente28->parteInferior = $request->bleche841;
                  $diente28->parteDerecha = $request->rleche841;
                  $diente28->parteIzquierda = $request->lleche841;
                  $diente28->completo = $request->completo841;
                  $diente28->save();

                  //Diente # 83
                  $diente29 = Diente::find($odontogramaInicial->idDiente29);
                  $diente29->parteCentro = $request->cleche831;
                  $diente29->parteSuperior = $request->tleche831;
                  $diente29->parteInferior = $request->bleche831;
                  $diente29->parteDerecha = $request->rleche831;
                  $diente29->parteIzquierda = $request->lleche831;
                  $diente29->completo = $request->completo831;
                  $diente29->save();

                  //Diente # 82
                  $diente30 = Diente::find($odontogramaInicial->idDiente30);
                  $diente30->parteCentro = $request->cleche821;
                  $diente30->parteSuperior = $request->tleche821;
                  $diente30->parteInferior = $request->bleche821;
                  $diente30->parteDerecha = $request->rleche821;
                  $diente30->parteIzquierda = $request->lleche821;
                  $diente30->completo = $request->completo821;
                  $diente30->save();

                  //Diente # 81
                  $diente31 = Diente::find($odontogramaInicial->idDiente31);
                  $diente31->parteCentro = $request->cleche811;
                  $diente31->parteSuperior = $request->tleche811;
                  $diente31->parteInferior = $request->bleche811;
                  $diente31->parteDerecha = $request->rleche811;
                  $diente31->parteIzquierda = $request->lleche811;
                  $diente31->completo = $request->completo811;
                  $diente31->save();

                  //Diente # 71
                  $diente32 = Diente::find($odontogramaInicial->idDiente32);
                  $diente32->parteCentro = $request->cleche711;
                  $diente32->parteSuperior = $request->tleche711;
                  $diente32->parteInferior = $request->bleche711;
                  $diente32->parteDerecha = $request->rleche711;
                  $diente32->parteIzquierda = $request->lleche711;
                  $diente32->completo = $request->completo711;
                  $diente32->save();

                  //Diente # 72
                  $diente33 = Diente::find($odontogramaInicial->idDiente33);
                  $diente33->parteCentro = $request->cleche721;
                  $diente33->parteSuperior = $request->tleche721;
                  $diente33->parteInferior = $request->bleche721;
                  $diente33->parteDerecha = $request->rleche721;
                  $diente33->parteIzquierda = $request->lleche721;
                  $diente33->completo = $request->completo721;
                  $diente33->save();

                  //Diente # 73
                  $diente34 = Diente::find($odontogramaInicial->idDiente34);
                  $diente34->parteCentro = $request->cleche731;
                  $diente34->parteSuperior = $request->tleche731;
                  $diente34->parteInferior = $request->bleche731;
                  $diente34->parteDerecha = $request->rleche731;
                  $diente34->parteIzquierda = $request->lleche731;
                  $diente34->completo = $request->completo731;
                  $diente34->save();

                  //Diente # 74
                  $diente35 = Diente::find($odontogramaInicial->idDiente35);
                  $diente35->parteCentro = $request->cleche741;
                  $diente35->parteSuperior = $request->tleche741;
                  $diente35->parteInferior = $request->bleche741;
                  $diente35->parteDerecha = $request->rleche741;
                  $diente35->parteIzquierda = $request->lleche741;
                  $diente35->completo = $request->completo741;
                  $diente35->save();

                  //Diente # 75
                  $diente36 = Diente::find($odontogramaInicial->idDiente36);
                  $diente36->parteCentro = $request->cleche751;
                  $diente36->parteSuperior = $request->tleche751;
                  $diente36->parteInferior = $request->bleche751;
                  $diente36->parteDerecha = $request->rleche751;
                  $diente36->parteIzquierda = $request->lleche751;
                  $diente36->completo = $request->completo751;
                  $diente36->save();
            }

            //Bloque inferior
            //Diente # 48
            $diente37 = Diente::find($odontogramaInicial->idDiente37);
            $diente37->parteCentro = $request->c481;
            $diente37->parteSuperior = $request->t481;
            $diente37->parteInferior = $request->b481;
            $diente37->parteDerecha = $request->r481;
            $diente37->parteIzquierda = $request->l481;
            $diente37->completo = $request->completo481;
            $diente37->save();

            //Diente # 47
            $diente38 = Diente::find($odontogramaInicial->idDiente38);
            $diente38->parteCentro = $request->c471;
            $diente38->parteSuperior = $request->t471;
            $diente38->parteInferior = $request->b471;
            $diente38->parteDerecha = $request->r471;
            $diente38->parteIzquierda = $request->l471;
            $diente38->completo = $request->completo471;
            $diente38->save();

            //Diente # 46
            $diente39 = Diente::find($odontogramaInicial->idDiente39);
            $diente39->parteCentro = $request->c461;
            $diente39->parteSuperior = $request->t461;
            $diente39->parteInferior = $request->b461;
            $diente39->parteDerecha = $request->r461;
            $diente39->parteIzquierda = $request->l461;
            $diente39->completo = $request->completo461;
            $diente39->save();

            //Diente # 45
            $diente40 = Diente::find($odontogramaInicial->idDiente40);
            $diente40->parteCentro = $request->c451;
            $diente40->parteSuperior = $request->t451;
            $diente40->parteInferior = $request->b451;
            $diente40->parteDerecha = $request->r451;
            $diente40->parteIzquierda = $request->l451;
            $diente40->completo = $request->completo451;
            $diente40->save();

            //Diente # 44
            $diente41 = Diente::find($odontogramaInicial->idDiente41);
            $diente41->parteCentro = $request->c441;
            $diente41->parteSuperior = $request->t441;
            $diente41->parteInferior = $request->b441;
            $diente41->parteDerecha = $request->r441;
            $diente41->parteIzquierda = $request->l441;
            $diente41->completo = $request->completo441;
            $diente41->save();

            //Diente # 43
            $diente42 = Diente::find($odontogramaInicial->idDiente42);
            $diente42->parteCentro = $request->c431;
            $diente42->parteSuperior = $request->t431;
            $diente42->parteInferior = $request->b431;
            $diente42->parteDerecha = $request->r431;
            $diente42->parteIzquierda = $request->l431;
            $diente42->completo = $request->completo431;
            $diente42->save();

            //Diente # 42
            $diente43 = Diente::find($odontogramaInicial->idDiente43);
            $diente43->parteCentro = $request->c421;
            $diente43->parteSuperior = $request->t421;
            $diente43->parteInferior = $request->b421;
            $diente43->parteDerecha = $request->r421;
            $diente43->parteIzquierda = $request->l421;
            $diente43->completo = $request->completo421;
            $diente43->save();

            //Diente # 41
            $diente44 = Diente::find($odontogramaInicial->idDiente44);
            $diente44->parteCentro = $request->c411;
            $diente44->parteSuperior = $request->t411;
            $diente44->parteInferior = $request->b411;
            $diente44->parteDerecha = $request->r411;
            $diente44->parteIzquierda = $request->l411;
            $diente44->completo = $request->completo411;
            $diente44->save();

            //Diente # 31
            $diente45 = Diente::find($odontogramaInicial->idDiente45);
            $diente45->parteCentro = $request->c311;
            $diente45->parteSuperior = $request->t311;
            $diente45->parteInferior = $request->b311;
            $diente45->parteDerecha = $request->r311;
            $diente45->parteIzquierda = $request->l311;
            $diente45->completo = $request->completo311;
            $diente45->save();

            //Diente # 32
            $diente46 = Diente::find($odontogramaInicial->idDiente46);
            $diente46->parteCentro = $request->c321;
            $diente46->parteSuperior = $request->t321;
            $diente46->parteInferior = $request->b321;
            $diente46->parteDerecha = $request->r321;
            $diente46->parteIzquierda = $request->l321;
            $diente46->completo = $request->completo321;
            $diente46->save();

            //Diente # 33
            $diente47 = Diente::find($odontogramaInicial->idDiente47);
            $diente47->parteCentro = $request->c331;
            $diente47->parteSuperior = $request->t331;
            $diente47->parteInferior = $request->b331;
            $diente47->parteDerecha = $request->r331;
            $diente47->parteIzquierda = $request->l331;
            $diente47->completo = $request->completo331;
            $diente47->save();

            //Diente # 34
            $diente48 = Diente::find($odontogramaInicial->idDiente48);
            $diente48->parteCentro = $request->c341;
            $diente48->parteSuperior = $request->t341;
            $diente48->parteInferior = $request->b341;
            $diente48->parteDerecha = $request->r341;
            $diente48->parteIzquierda = $request->l341;
            $diente48->completo = $request->completo341;
            $diente48->save();

            //Diente # 35
            $diente49 = Diente::find($odontogramaInicial->idDiente49);
            $diente49->parteCentro = $request->c351;
            $diente49->parteSuperior = $request->t351;
            $diente49->parteInferior = $request->b351;
            $diente49->parteDerecha = $request->r351;
            $diente49->parteIzquierda = $request->l351;
            $diente49->completo = $request->completo351;
            $diente49->save();

            //Diente # 36
            $diente50 = Diente::find($odontogramaInicial->idDiente50);
            $diente50->parteCentro = $request->c361;
            $diente50->parteSuperior = $request->t361;
            $diente50->parteInferior = $request->b361;
            $diente50->parteDerecha = $request->r361;
            $diente50->parteIzquierda = $request->l361;
            $diente50->completo = $request->completo361;
            $diente50->save();

            //Diente # 37
            $diente51 = Diente::find($odontogramaInicial->idDiente51);
            $diente51->parteCentro = $request->c371;
            $diente51->parteSuperior = $request->t371;
            $diente51->parteInferior = $request->b371;
            $diente51->parteDerecha = $request->r371;
            $diente51->parteIzquierda = $request->l371;
            $diente51->completo = $request->completo371;
            $diente51->save();

            //Diente # 38
            $diente52 = Diente::find($odontogramaInicial->idDiente52);
            $diente52->parteCentro = $request->c381;
            $diente52->parteSuperior = $request->t381;
            $diente52->parteInferior = $request->b381;
            $diente52->parteDerecha = $request->r381;
            $diente52->parteIzquierda = $request->l381;
            $diente52->completo = $request->completo381;
            $diente52->save();

            $historia->primerOdontograma = 1;

      }else{
            $diente1 = Diente::find($odontograma->idDiente1);
            $diente1->parteCentro = $request->c181;
            $diente1->parteSuperior = $request->t181;
            $diente1->parteInferior = $request->b181;
            $diente1->parteDerecha = $request->r181;
            $diente1->parteIzquierda = $request->l181;
            $diente1->completo = $request->completo181;
            $diente1->save();

            //Diente # 17
            $diente2 = Diente::find($odontograma->idDiente2);
            $diente2->parteCentro = $request->c171;
            $diente2->parteSuperior = $request->t171;
            $diente2->parteInferior = $request->b171;
            $diente2->parteDerecha = $request->r171;
            $diente2->parteIzquierda = $request->l171;
            $diente2->completo = $request->completo171;
            $diente2->save();

            //Diente # 16
            $diente3 = Diente::find($odontograma->idDiente3);
            $diente3->parteCentro = $request->c161;
            $diente3->parteSuperior = $request->t161;
            $diente3->parteInferior = $request->b161;
            $diente3->parteDerecha = $request->r161;
            $diente3->parteIzquierda = $request->l161;
            $diente3->completo = $request->completo161;
            $diente3->save();

            //Diente # 15
            $diente4 = Diente::find($odontograma->idDiente4);
            $diente4->parteCentro = $request->c151;
            $diente4->parteSuperior = $request->t151;
            $diente4->parteInferior = $request->b151;
            $diente4->parteDerecha = $request->r151;
            $diente4->parteIzquierda = $request->l151;
            $diente4->completo = $request->completo151;
            $diente4->save();

            //Diente # 14
            $diente5 = Diente::find($odontograma->idDiente5);
            $diente5->parteCentro = $request->c141;
            $diente5->parteSuperior = $request->t141;
            $diente5->parteInferior = $request->b141;
            $diente5->parteDerecha = $request->r141;
            $diente5->parteIzquierda = $request->l141;
            $diente5->completo = $request->completo141;
            $diente5->save();

            //Diente # 13
            $diente6 = Diente::find($odontograma->idDiente6);
            $diente6->parteCentro = $request->c131;
            $diente6->parteSuperior = $request->t131;
            $diente6->parteInferior = $request->b131;
            $diente6->parteDerecha = $request->r131;
            $diente6->parteIzquierda = $request->l131;
            $diente6->completo = $request->completo131;
            $diente6->save();

            //Diente # 12
            $diente7 = Diente::find($odontograma->idDiente7);
            $diente7->parteCentro = $request->c121;
            $diente7->parteSuperior = $request->t121;
            $diente7->parteInferior = $request->b121;
            $diente7->parteDerecha = $request->r121;
            $diente7->parteIzquierda = $request->l121;
            $diente7->completo = $request->completo121;
            $diente7->save();

            //Diente # 11
            $diente8 = Diente::find($odontograma->idDiente8);
            $diente8->parteCentro = $request->c111;
            $diente8->parteSuperior = $request->t111;
            $diente8->parteInferior = $request->b111;
            $diente8->parteDerecha = $request->r111;
            $diente8->parteIzquierda = $request->l111;
            $diente8->completo = $request->completo111;
            $diente8->save();

            //Diente # 21
            $diente9 = Diente::find($odontograma->idDiente9);
            $diente9->parteCentro = $request->c211;
            $diente9->parteSuperior = $request->t211;
            $diente9->parteInferior = $request->b211;
            $diente9->parteDerecha = $request->r211;
            $diente9->parteIzquierda = $request->l211;
            $diente9->completo = $request->completo211;
            $diente9->save();

            //Diente # 22
            $diente10 = Diente::find($odontograma->idDiente10);
            $diente10->parteCentro = $request->c221;
            $diente10->parteSuperior = $request->t221;
            $diente10->parteInferior = $request->b221;
            $diente10->parteDerecha = $request->r221;
            $diente10->parteIzquierda = $request->l221;
            $diente10->completo = $request->completo221;
            $diente10->save();

            //Diente # 23
            $diente11 = Diente::find($odontograma->idDiente11);
            $diente11->parteCentro = $request->c231;
            $diente11->parteSuperior = $request->t231;
            $diente11->parteInferior = $request->b231;
            $diente11->parteDerecha = $request->r231;
            $diente11->parteIzquierda = $request->l231;
            $diente11->completo = $request->completo231;
            $diente11->save();

            //Diente # 24
            $diente12 = Diente::find($odontograma->idDiente12);
            $diente12->parteCentro = $request->c241;
            $diente12->parteSuperior = $request->t241;
            $diente12->parteInferior = $request->b241;
            $diente12->parteDerecha = $request->r241;
            $diente12->parteIzquierda = $request->l241;
            $diente12->completo = $request->completo241;
            $diente12->save();

            //Diente # 25
            $diente13 = Diente::find($odontograma->idDiente13);
            $diente13->parteCentro = $request->c251;
            $diente13->parteSuperior = $request->t251;
            $diente13->parteInferior = $request->b251;
            $diente13->parteDerecha = $request->r251;
            $diente13->parteIzquierda = $request->l251;
            $diente13->completo = $request->completo251;
            $diente13->save();

            //Diente # 26
            $diente14 = Diente::find($odontograma->idDiente14);
            $diente14->parteCentro = $request->c261;
            $diente14->parteSuperior = $request->t261;
            $diente14->parteInferior = $request->b261;
            $diente14->parteDerecha = $request->r261;
            $diente14->parteIzquierda = $request->l261;
            $diente14->completo = $request->completo261;
            $diente14->save();

            //Diente # 27
            $diente15 = Diente::find($odontograma->idDiente15);
            $diente15->parteCentro = $request->c271;
            $diente15->parteSuperior = $request->t271;
            $diente15->parteInferior = $request->b271;
            $diente15->parteDerecha = $request->r271;
            $diente15->parteIzquierda = $request->l271;
            $diente15->completo = $request->completo271;
            $diente15->save();

            //Diente # 28
            $diente16 = Diente::find($odontograma->idDiente16);
            $diente16->parteCentro = $request->c281;
            $diente16->parteSuperior = $request->t281;
            $diente16->parteInferior = $request->b281;
            $diente16->parteDerecha = $request->r281;
            $diente16->parteIzquierda = $request->l281;
            $diente16->completo = $request->completo281;
            $diente16->save();

            //Bloque medio superior
            if($historia->edad <= 14){
                  //Diente # 55
                  $diente17 = Diente::find($odontograma->idDiente17);
                  $diente17->parteCentro = $request->cleche551;
                  $diente17->parteSuperior = $request->tleche551;
                  $diente17->parteInferior = $request->bleche551;
                  $diente17->parteDerecha = $request->rleche551;
                  $diente17->parteIzquierda = $request->lleche551;
                  $diente17->completo = $request->completo551;
                  $diente17->save();

                  //Diente # 54
                  $diente18 = Diente::find($odontograma->idDiente18);
                  $diente18->parteCentro = $request->cleche541;
                  $diente18->parteSuperior = $request->tleche541;
                  $diente18->parteInferior = $request->bleche541;
                  $diente18->parteDerecha = $request->rleche541;
                  $diente18->parteIzquierda = $request->lleche541;
                  $diente18->completo = $request->completo541;
                  $diente18->save();

                  //Diente # 53
                  $diente19 = Diente::find($odontograma->idDiente19);
                  $diente19->parteCentro = $request->cleche531;
                  $diente19->parteSuperior = $request->tleche531;
                  $diente19->parteInferior = $request->bleche531;
                  $diente19->parteDerecha = $request->rleche531;
                  $diente19->parteIzquierda = $request->lechel531;
                  $diente19->completo = $request->completo531;
                  $diente19->save();

                  //Diente # 52
                  $diente20 = Diente::find($odontograma->idDiente20);
                  $diente20->parteCentro = $request->cleche521;
                  $diente20->parteSuperior = $request->tleche521;
                  $diente20->parteInferior = $request->bleche521;
                  $diente20->parteDerecha = $request->rleche521;
                  $diente20->parteIzquierda = $request->lleche521;
                  $diente20->completo = $request->completo521;
                  $diente20->save();

                  //Diente # 51
                  $diente21 = Diente::find($odontograma->idDiente21);
                  $diente21->parteCentro = $request->cleche511;
                  $diente21->parteSuperior = $request->tleche511;
                  $diente21->parteInferior = $request->bleche511;
                  $diente21->parteDerecha = $request->rleche511;
                  $diente21->parteIzquierda = $request->lleche511;
                  $diente21->completo = $request->completo511;
                  $diente21->save();

                  //Diente # 61
                  $diente22 = Diente::find($odontograma->idDiente22);
                  $diente22->parteCentro = $request->cleche611;
                  $diente22->parteSuperior = $request->tleche611;
                  $diente22->parteInferior = $request->bleche611;
                  $diente22->parteDerecha = $request->rleche611;
                  $diente22->parteIzquierda = $request->lleche611;
                  $diente22->completo = $request->completo611;
                  $diente22->save();

                  //Diente # 62
                  $diente23 = Diente::find($odontograma->idDiente23);
                  $diente23->parteCentro = $request->cleche621;
                  $diente23->parteSuperior = $request->tleche621;
                  $diente23->parteInferior = $request->bleche621;
                  $diente23->parteDerecha = $request->rleche621;
                  $diente23->parteIzquierda = $request->lleche621;
                  $diente23->completo = $request->completo621;
                  $diente23->save();

                  //Diente # 63
                  $diente24 = Diente::find($odontograma->idDiente24);
                  $diente24->parteCentro = $request->cleche631;
                  $diente24->parteSuperior = $request->tleche631;
                  $diente24->parteInferior = $request->bleche631;
                  $diente24->parteDerecha = $request->rleche631;
                  $diente24->parteIzquierda = $request->lleche631;
                  $diente24->completo = $request->completo631;
                  $diente24->save();

                  //Diente # 64
                  $diente25 = Diente::find($odontograma->idDiente25);
                  $diente25->parteCentro = $request->cleche641;
                  $diente25->parteSuperior = $request->tleche641;
                  $diente25->parteInferior = $request->bleche641;
                  $diente25->parteDerecha = $request->rleche641;
                  $diente25->parteIzquierda = $request->lleche641;
                  $diente25->completo = $request->completo641;
                  $diente25->save();

                  //Diente # 65
                  $diente26 = Diente::find($odontograma->idDiente26);
                  $diente26->parteCentro = $request->cleche651;
                  $diente26->parteSuperior = $request->tleche651;
                  $diente26->parteInferior = $request->bleche651;
                  $diente26->parteDerecha = $request->rleche651;
                  $diente26->parteIzquierda = $request->lleche651;
                  $diente26->completo = $request->completo651;
                  $diente26->save();

                  //Bloque medio inferior
                  //Diente # 85
                  $diente27 = Diente::find($odontograma->idDiente27);
                  $diente27->parteCentro = $request->cleche851;
                  $diente27->parteSuperior = $request->tleche851;
                  $diente27->parteInferior = $request->bleche851;
                  $diente27->parteDerecha = $request->rleche851;
                  $diente27->parteIzquierda = $request->lleche851;
                  $diente27->completo = $request->completo851;
                  $diente27->save();

                  //Diente # 84
                  $diente28 = Diente::find($odontograma->idDiente28);
                  $diente28->parteCentro = $request->cleche841;
                  $diente28->parteSuperior = $request->tleche841;
                  $diente28->parteInferior = $request->bleche841;
                  $diente28->parteDerecha = $request->rleche841;
                  $diente28->parteIzquierda = $request->lleche841;
                  $diente28->completo = $request->completo841;
                  $diente28->save();

                  //Diente # 83
                  $diente29 = Diente::find($odontograma->idDiente29);
                  $diente29->parteCentro = $request->cleche831;
                  $diente29->parteSuperior = $request->tleche831;
                  $diente29->parteInferior = $request->bleche831;
                  $diente29->parteDerecha = $request->rleche831;
                  $diente29->parteIzquierda = $request->lleche831;
                  $diente29->completo = $request->completo831;
                  $diente29->save();

                  //Diente # 82
                  $diente30 = Diente::find($odontograma->idDiente30);
                  $diente30->parteCentro = $request->cleche821;
                  $diente30->parteSuperior = $request->tleche821;
                  $diente30->parteInferior = $request->bleche821;
                  $diente30->parteDerecha = $request->rleche821;
                  $diente30->parteIzquierda = $request->lleche821;
                  $diente30->completo = $request->completo821;
                  $diente30->save();

                  //Diente # 81
                  $diente31 = Diente::find($odontograma->idDiente31);
                  $diente31->parteCentro = $request->cleche811;
                  $diente31->parteSuperior = $request->tleche811;
                  $diente31->parteInferior = $request->bleche811;
                  $diente31->parteDerecha = $request->rleche811;
                  $diente31->parteIzquierda = $request->lleche811;
                  $diente31->completo = $request->completo811;
                  $diente31->save();

                  //Diente # 71
                  $diente32 = Diente::find($odontograma->idDiente32);
                  $diente32->parteCentro = $request->cleche711;
                  $diente32->parteSuperior = $request->tleche711;
                  $diente32->parteInferior = $request->bleche711;
                  $diente32->parteDerecha = $request->rleche711;
                  $diente32->parteIzquierda = $request->lleche711;
                  $diente32->completo = $request->completo711;
                  $diente32->save();

                  //Diente # 72
                  $diente33 = Diente::find($odontograma->idDiente33);
                  $diente33->parteCentro = $request->cleche721;
                  $diente33->parteSuperior = $request->tleche721;
                  $diente33->parteInferior = $request->bleche721;
                  $diente33->parteDerecha = $request->rleche721;
                  $diente33->parteIzquierda = $request->lleche721;
                  $diente33->completo = $request->completo721;
                  $diente33->save();

                  //Diente # 73
                  $diente34 = Diente::find($odontograma->idDiente34);
                  $diente34->parteCentro = $request->cleche731;
                  $diente34->parteSuperior = $request->tleche731;
                  $diente34->parteInferior = $request->bleche731;
                  $diente34->parteDerecha = $request->rleche731;
                  $diente34->parteIzquierda = $request->lleche731;
                  $diente34->completo = $request->completo731;
                  $diente34->save();

                  //Diente # 74
                  $diente35 = Diente::find($odontograma->idDiente35);
                  $diente35->parteCentro = $request->cleche741;
                  $diente35->parteSuperior = $request->tleche741;
                  $diente35->parteInferior = $request->bleche741;
                  $diente35->parteDerecha = $request->rleche741;
                  $diente35->parteIzquierda = $request->lleche741;
                  $diente35->completo = $request->completo741;
                  $diente35->save();

                  //Diente # 75
                  $diente36 = Diente::find($odontograma->idDiente36);
                  $diente36->parteCentro = $request->cleche751;
                  $diente36->parteSuperior = $request->tleche751;
                  $diente36->parteInferior = $request->bleche751;
                  $diente36->parteDerecha = $request->rleche751;
                  $diente36->parteIzquierda = $request->lleche751;
                  $diente36->completo = $request->completo751;
                  $diente36->save();
            }

            //Bloque inferior
            //Diente # 48
            $diente37 = Diente::find($odontograma->idDiente37);
            $diente37->parteCentro = $request->c481;
            $diente37->parteSuperior = $request->t481;
            $diente37->parteInferior = $request->b481;
            $diente37->parteDerecha = $request->r481;
            $diente37->parteIzquierda = $request->l481;
            $diente37->completo = $request->completo481;
            $diente37->save();

            //Diente # 47
            $diente38 = Diente::find($odontograma->idDiente38);
            $diente38->parteCentro = $request->c471;
            $diente38->parteSuperior = $request->t471;
            $diente38->parteInferior = $request->b471;
            $diente38->parteDerecha = $request->r471;
            $diente38->parteIzquierda = $request->l471;
            $diente38->completo = $request->completo471;
            $diente38->save();

            //Diente # 46
            $diente39 = Diente::find($odontograma->idDiente39);
            $diente39->parteCentro = $request->c461;
            $diente39->parteSuperior = $request->t461;
            $diente39->parteInferior = $request->b461;
            $diente39->parteDerecha = $request->r461;
            $diente39->parteIzquierda = $request->l461;
            $diente39->completo = $request->completo461;
            $diente39->save();

            //Diente # 45
            $diente40 = Diente::find($odontograma->idDiente40);
            $diente40->parteCentro = $request->c451;
            $diente40->parteSuperior = $request->t451;
            $diente40->parteInferior = $request->b451;
            $diente40->parteDerecha = $request->r451;
            $diente40->parteIzquierda = $request->l451;
            $diente40->completo = $request->completo451;
            $diente40->save();

            //Diente # 44
            $diente41 = Diente::find($odontograma->idDiente41);
            $diente41->parteCentro = $request->c441;
            $diente41->parteSuperior = $request->t441;
            $diente41->parteInferior = $request->b441;
            $diente41->parteDerecha = $request->r441;
            $diente41->parteIzquierda = $request->l441;
            $diente41->completo = $request->completo441;
            $diente41->save();

            //Diente # 43
            $diente42 = Diente::find($odontograma->idDiente42);
            $diente42->parteCentro = $request->c431;
            $diente42->parteSuperior = $request->t431;
            $diente42->parteInferior = $request->b431;
            $diente42->parteDerecha = $request->r431;
            $diente42->parteIzquierda = $request->l431;
            $diente42->completo = $request->completo431;
            $diente42->save();

            //Diente # 42
            $diente43 = Diente::find($odontograma->idDiente43);
            $diente43->parteCentro = $request->c421;
            $diente43->parteSuperior = $request->t421;
            $diente43->parteInferior = $request->b421;
            $diente43->parteDerecha = $request->r421;
            $diente43->parteIzquierda = $request->l421;
            $diente43->completo = $request->completo421;
            $diente43->save();

            //Diente # 41
            $diente44 = Diente::find($odontograma->idDiente44);
            $diente44->parteCentro = $request->c411;
            $diente44->parteSuperior = $request->t411;
            $diente44->parteInferior = $request->b411;
            $diente44->parteDerecha = $request->r411;
            $diente44->parteIzquierda = $request->l411;
            $diente44->completo = $request->completo411;
            $diente44->save();

            //Diente # 31
            $diente45 = Diente::find($odontograma->idDiente45);
            $diente45->parteCentro = $request->c311;
            $diente45->parteSuperior = $request->t311;
            $diente45->parteInferior = $request->b311;
            $diente45->parteDerecha = $request->r311;
            $diente45->parteIzquierda = $request->l311;
            $diente45->completo = $request->completo311;
            $diente45->save();

            //Diente # 32
            $diente46 = Diente::find($odontograma->idDiente46);
            $diente46->parteCentro = $request->c321;
            $diente46->parteSuperior = $request->t321;
            $diente46->parteInferior = $request->b321;
            $diente46->parteDerecha = $request->r321;
            $diente46->parteIzquierda = $request->l321;
            $diente46->completo = $request->completo321;
            $diente46->save();

            //Diente # 33
            $diente47 = Diente::find($odontograma->idDiente47);
            $diente47->parteCentro = $request->c331;
            $diente47->parteSuperior = $request->t331;
            $diente47->parteInferior = $request->b331;
            $diente47->parteDerecha = $request->r331;
            $diente47->parteIzquierda = $request->l331;
            $diente47->completo = $request->completo331;
            $diente47->save();

            //Diente # 34
            $diente48 = Diente::find($odontograma->idDiente48);
            $diente48->parteCentro = $request->c341;
            $diente48->parteSuperior = $request->t341;
            $diente48->parteInferior = $request->b341;
            $diente48->parteDerecha = $request->r341;
            $diente48->parteIzquierda = $request->l341;
            $diente48->completo = $request->completo341;
            $diente48->save();

            //Diente # 35
            $diente49 = Diente::find($odontograma->idDiente49);
            $diente49->parteCentro = $request->c351;
            $diente49->parteSuperior = $request->t351;
            $diente49->parteInferior = $request->b351;
            $diente49->parteDerecha = $request->r351;
            $diente49->parteIzquierda = $request->l351;
            $diente49->completo = $request->completo351;
            $diente49->save();

            //Diente # 36
            $diente50 = Diente::find($odontograma->idDiente50);
            $diente50->parteCentro = $request->c361;
            $diente50->parteSuperior = $request->t361;
            $diente50->parteInferior = $request->b361;
            $diente50->parteDerecha = $request->r361;
            $diente50->parteIzquierda = $request->l361;
            $diente50->completo = $request->completo361;
            $diente50->save();

            //Diente # 37
            $diente51 = Diente::find($odontograma->idDiente51);
            $diente51->parteCentro = $request->c371;
            $diente51->parteSuperior = $request->t371;
            $diente51->parteInferior = $request->b371;
            $diente51->parteDerecha = $request->r371;
            $diente51->parteIzquierda = $request->l371;
            $diente51->completo = $request->completo371;
            $diente51->save();

            //Diente # 38
            $diente52 = Diente::find($odontograma->idDiente52);
            $diente52->parteCentro = $request->c381;
            $diente52->parteSuperior = $request->t381;
            $diente52->parteInferior = $request->b381;
            $diente52->parteDerecha = $request->r381;
            $diente52->parteIzquierda = $request->l381;
            $diente52->completo = $request->completo381;
            $diente52->save();
      }


        $historia->save();

        //Servicio prestado
      if($request->procedimiento != null){
            $servicio = new Servicio();
            $servicio->fecha = Carbon::now()->subHour(5);
            $servicio->idEmpresa = $user->idEmpresa;
            $servicio->idHistoriaClinica = $historia->id;
            $servicio->idProcedimiento = $request->procedimiento;

            $servicio->save();

            $cuentas = Cuentas::Empresa($user->idEmpresa)->get(); 
            $procedimiento = Procedimiento::find($servicio->idProcedimiento);

            $fecha = $servicio->fecha;

            for ($i=0; $i < sizeof($cuentas); $i++) { 

                  if($cuentas[$i]->titulo == "Ventas"){

                        if($fecha->month == 1){
                              $cuentas[$i]->enero = $cuentas[$i]->enero + $procedimiento->venta;
                        }else if($fecha->month == 2){
                              $cuentas[$i]->febrero = $cuentas[$i]->febrero + $procedimiento->venta;
                        }else if($fecha->month == 3){
                              $cuentas[$i]->marzo = $cuentas[$i]->marzo + $procedimiento->venta;
                        }else if($fecha->month == 4){
                              $cuentas[$i]->abril = $cuentas[$i]->abril + $procedimiento->venta;
                        }else if($fecha->month == 5){
                              $cuentas[$i]->mayo = $cuentas[$i]->mayo + $procedimiento->venta;
                        }else if($fecha->month == 6){
                              $cuentas[$i]->junio = $cuentas[$i]->junio + $procedimiento->venta;
                        }else if($fecha->month == 7){
                              $cuentas[$i]->julio = $cuentas[$i]->julio + $procedimiento->venta;
                        }else if($fecha->month == 8){
                              $cuentas[$i]->agosto = $cuentas[$i]->agosto + $procedimiento->venta;
                        }else if($fecha->month == 9){
                              $cuentas[$i]->septiembre = $cuentas[$i]->septiembre + $procedimiento->venta;
                        }else if($fecha->month == 10){
                              $cuentas[$i]->octubre = $cuentas[$i]->octubre + $procedimiento->venta;
                        }else if($fecha->month == 11){
                              $cuentas[$i]->noviembre = $cuentas[$i]->noviembre + $procedimiento->venta;
                        }else if($fecha->month == 12){
                              $cuentas[$i]->diciembre = $cuentas[$i]->diciembre + $procedimiento->venta;
                        }

                        $cuentas[$i]->actual = $cuentas[$i]->actual + $procedimiento->venta;
                        $cuentas[$i]->save();

                  }else if($cuentas[$i]->titulo == "Costos"){

                        if($fecha->month == 1){
                              $cuentas[$i]->enero = $cuentas[$i]->enero + $procedimiento->costo;
                        }else if($fecha->month == 2){
                              $cuentas[$i]->febrero = $cuentas[$i]->febrero + $procedimiento->costo;
                        }else if($fecha->month == 3){
                              $cuentas[$i]->marzo = $cuentas[$i]->marzo + $procedimiento->costo;
                        }else if($fecha->month == 4){
                              $cuentas[$i]->abril = $cuentas[$i]->abril + $procedimiento->costo;
                        }else if($fecha->month == 5){
                              $cuentas[$i]->mayo = $cuentas[$i]->mayo + $procedimiento->costo;
                        }else if($fecha->month == 6){
                              $cuentas[$i]->junio = $cuentas[$i]->junio + $procedimiento->costo;
                        }else if($fecha->month == 7){
                              $cuentas[$i]->julio = $cuentas[$i]->julio + $procedimiento->costo;
                        }else if($fecha->month == 8){
                              $cuentas[$i]->agosto = $cuentas[$i]->agosto + $procedimiento->costo;
                        }else if($fecha->month == 9){
                              $cuentas[$i]->septiembre = $cuentas[$i]->septiembre + $procedimiento->costo;
                        }else if($fecha->month == 10){
                              $cuentas[$i]->octubre = $cuentas[$i]->octubre + $procedimiento->costo;
                        }else if($fecha->month == 11){
                              $cuentas[$i]->noviembre = $cuentas[$i]->noviembre + $procedimiento->costo;
                        }else if($fecha->month == 12){
                              $cuentas[$i]->diciembre = $cuentas[$i]->diciembre + $procedimiento->costo;
                        }

                        $cuentas[$i]->actual = $cuentas[$i]->actual + $procedimiento->costo;
                        $cuentas[$i]->save();

                  }else if($cuentas[$i]->titulo == "Utilidad"){

                        if($fecha->month == 1){
                              $cuentas[$i]->enero = $cuentas[$i]->enero + ($procedimiento->venta - $procedimiento->costo);
                        }else if($fecha->month == 2){
                              $cuentas[$i]->febrero = $cuentas[$i]->febrero + ($procedimiento->venta - $procedimiento->costo);
                        }else if($fecha->month == 3){
                              $cuentas[$i]->marzo = $cuentas[$i]->marzo + ($procedimiento->venta - $procedimiento->costo);
                        }else if($fecha->month == 4){
                              $cuentas[$i]->abril = $cuentas[$i]->abril + ($procedimiento->venta - $procedimiento->costo);
                        }else if($fecha->month == 5){
                              $cuentas[$i]->mayo = $cuentas[$i]->mayo + ($procedimiento->venta - $procedimiento->costo);
                        }else if($fecha->month == 6){
                              $cuentas[$i]->junio = $cuentas[$i]->junio + ($procedimiento->venta - $procedimiento->costo);
                        }else if($fecha->month == 7){
                              $cuentas[$i]->julio = $cuentas[$i]->julio + ($procedimiento->venta - $procedimiento->costo);
                        }else if($fecha->month == 8){
                              $cuentas[$i]->agosto = $cuentas[$i]->agosto + ($procedimiento->venta - $procedimiento->costo);
                        }else if($fecha->month == 9){
                              $cuentas[$i]->septiembre = $cuentas[$i]->septiembre + ($procedimiento->venta - $procedimiento->costo);
                        }else if($fecha->month == 10){
                              $cuentas[$i]->octubre = $cuentas[$i]->octubre + ($procedimiento->venta - $procedimiento->costo);
                        }else if($fecha->month == 11){
                              $cuentas[$i]->noviembre = $cuentas[$i]->noviembre + ($procedimiento->venta - $procedimiento->costo);
                        }else if($fecha->month == 12){
                              $cuentas[$i]->diciembre = $cuentas[$i]->diciembre + ($procedimiento->venta - $procedimiento->costo);
                        }

                        $cuentas[$i]->actual = $cuentas[$i]->actual + ($procedimiento->venta - $procedimiento->costo);
                        $cuentas[$i]->save();

                  }

            }
      }
        
      session_start();
      $_SESSION['id'] = $request->historiaID;

      if($request->activador == 1){
            flash('Modificación exitosa')->success()->important();
            return redirect()->route('Auth.usuario.showHistoriaClinica');
      }else if($request->activador == 2){
            flash('Modificación exitosa')->success()->important();
            return redirect()->route('historia.observacionHistoriaClinica');
      }else if($request->activador == 3){
            flash('Modificación exitosa')->success()->important();
            return redirect()->route('Auth.usuario.showcreateLaboratorio');
      }else if($request->activador == 4){
            $historia->primerOdontograma = 0;
            $historia->save();
            flash('Ahora puede editar el odontograma inicial')->success()->important();
            return redirect()->route('historia.editHistoriaClinica');
      }
}

    public function postdeleteHistoriaClinica(Request $request, $id){
        $historia2destroy = HistoriaClinica::find($id);

        $servicio2destroy = Servicio::HistoriaClinica($historia2destroy->id)->get();

        for ($i=0; $i < sizeof($servicio2destroy) ; $i++) { 
            $servicio2destroy[$i]->delete();
        }

        $laboratorio2destroy = Laboratorio::HistoriaClinica($historia2destroy->id)->get();

        for ($i=0; $i < sizeof($laboratorio2destroy) ; $i++) { 
            $laboratorio2destroy[$i]->delete();
        }

        $odontograma2destroy = Odontograma::find($historia2destroy->idOdontograma);
        $odontogramaInicial2destroy = Odontograma::find($historia2destroy->idOdontogramaInicial);

        $diente1Inicial = Diente::find($odontogramaInicial2destroy->idDiente1);
        $diente2Inicial = Diente::find($odontogramaInicial2destroy->idDiente2);
        $diente3Inicial = Diente::find($odontogramaInicial2destroy->idDiente3);
        $diente4Inicial = Diente::find($odontogramaInicial2destroy->idDiente4);
        $diente5Inicial = Diente::find($odontogramaInicial2destroy->idDiente5);
        $diente6Inicial = Diente::find($odontogramaInicial2destroy->idDiente6);
        $diente7Inicial = Diente::find($odontogramaInicial2destroy->idDiente7);
        $diente8Inicial = Diente::find($odontogramaInicial2destroy->idDiente8);
        $diente9Inicial = Diente::find($odontogramaInicial2destroy->idDiente9);
        $diente10Inicial = Diente::find($odontogramaInicial2destroy->idDiente10);
        $diente11Inicial = Diente::find($odontogramaInicial2destroy->idDiente11);
        $diente12Inicial = Diente::find($odontogramaInicial2destroy->idDiente12);
        $diente13Inicial = Diente::find($odontogramaInicial2destroy->idDiente13);
        $diente14Inicial = Diente::find($odontogramaInicial2destroy->idDiente14);
        $diente15Inicial = Diente::find($odontogramaInicial2destroy->idDiente15);
        $diente16Inicial = Diente::find($odontogramaInicial2destroy->idDiente16);
        $diente17Inicial = Diente::find($odontogramaInicial2destroy->idDiente17);
        $diente18Inicial = Diente::find($odontogramaInicial2destroy->idDiente18);
        $diente19Inicial = Diente::find($odontogramaInicial2destroy->idDiente19);
        $diente20Inicial = Diente::find($odontogramaInicial2destroy->idDiente20);
        $diente21Inicial = Diente::find($odontogramaInicial2destroy->idDiente21);
        $diente22Inicial = Diente::find($odontogramaInicial2destroy->idDiente22);
        $diente23Inicial = Diente::find($odontogramaInicial2destroy->idDiente23);
        $diente24Inicial = Diente::find($odontogramaInicial2destroy->idDiente24);
        $diente25Inicial = Diente::find($odontogramaInicial2destroy->idDiente25);
        $diente26Inicial = Diente::find($odontogramaInicial2destroy->idDiente26);
        $diente27Inicial = Diente::find($odontogramaInicial2destroy->idDiente27);
        $diente28Inicial = Diente::find($odontogramaInicial2destroy->idDiente28);
        $diente29Inicial = Diente::find($odontogramaInicial2destroy->idDiente29);
        $diente30Inicial = Diente::find($odontogramaInicial2destroy->idDiente30);
        $diente31Inicial = Diente::find($odontogramaInicial2destroy->idDiente31);
        $diente32Inicial = Diente::find($odontogramaInicial2destroy->idDiente32);
        $diente33Inicial = Diente::find($odontogramaInicial2destroy->idDiente33);
        $diente34Inicial = Diente::find($odontogramaInicial2destroy->idDiente34);
        $diente35Inicial = Diente::find($odontogramaInicial2destroy->idDiente35);
        $diente36Inicial = Diente::find($odontogramaInicial2destroy->idDiente36);
        $diente37Inicial = Diente::find($odontogramaInicial2destroy->idDiente37);
        $diente38Inicial = Diente::find($odontogramaInicial2destroy->idDiente38);
        $diente39Inicial = Diente::find($odontogramaInicial2destroy->idDiente39);
        $diente40Inicial = Diente::find($odontogramaInicial2destroy->idDiente40);
        $diente41Inicial = Diente::find($odontogramaInicial2destroy->idDiente41);
        $diente42Inicial = Diente::find($odontogramaInicial2destroy->idDiente42);
        $diente43Inicial = Diente::find($odontogramaInicial2destroy->idDiente43);
        $diente44Inicial = Diente::find($odontogramaInicial2destroy->idDiente44);
        $diente45Inicial = Diente::find($odontogramaInicial2destroy->idDiente45);
        $diente46Inicial = Diente::find($odontogramaInicial2destroy->idDiente46);
        $diente47Inicial = Diente::find($odontogramaInicial2destroy->idDiente47);
        $diente48Inicial = Diente::find($odontogramaInicial2destroy->idDiente48);
        $diente49Inicial = Diente::find($odontogramaInicial2destroy->idDiente49);
        $diente50Inicial = Diente::find($odontogramaInicial2destroy->idDiente50);
        $diente51Inicial = Diente::find($odontogramaInicial2destroy->idDiente51);
        $diente52Inicial = Diente::find($odontogramaInicial2destroy->idDiente52);

        $diente1 = Diente::find($odontograma2destroy->idDiente1);
        $diente2 = Diente::find($odontograma2destroy->idDiente2);
        $diente3 = Diente::find($odontograma2destroy->idDiente3);
        $diente4 = Diente::find($odontograma2destroy->idDiente4);
        $diente5 = Diente::find($odontograma2destroy->idDiente5);
        $diente6 = Diente::find($odontograma2destroy->idDiente6);
        $diente7 = Diente::find($odontograma2destroy->idDiente7);
        $diente8 = Diente::find($odontograma2destroy->idDiente8);
        $diente9 = Diente::find($odontograma2destroy->idDiente9);
        $diente10 = Diente::find($odontograma2destroy->idDiente10);
        $diente11 = Diente::find($odontograma2destroy->idDiente11);
        $diente12 = Diente::find($odontograma2destroy->idDiente12);
        $diente13 = Diente::find($odontograma2destroy->idDiente13);
        $diente14 = Diente::find($odontograma2destroy->idDiente14);
        $diente15 = Diente::find($odontograma2destroy->idDiente15);
        $diente16 = Diente::find($odontograma2destroy->idDiente16);
        $diente17 = Diente::find($odontograma2destroy->idDiente17);
        $diente18 = Diente::find($odontograma2destroy->idDiente18);
        $diente19 = Diente::find($odontograma2destroy->idDiente19);
        $diente20 = Diente::find($odontograma2destroy->idDiente20);
        $diente21 = Diente::find($odontograma2destroy->idDiente21);
        $diente22 = Diente::find($odontograma2destroy->idDiente22);
        $diente23 = Diente::find($odontograma2destroy->idDiente23);
        $diente24 = Diente::find($odontograma2destroy->idDiente24);
        $diente25 = Diente::find($odontograma2destroy->idDiente25);
        $diente26 = Diente::find($odontograma2destroy->idDiente26);
        $diente27 = Diente::find($odontograma2destroy->idDiente27);
        $diente28 = Diente::find($odontograma2destroy->idDiente28);
        $diente29 = Diente::find($odontograma2destroy->idDiente29);
        $diente30 = Diente::find($odontograma2destroy->idDiente30);
        $diente31 = Diente::find($odontograma2destroy->idDiente31);
        $diente32 = Diente::find($odontograma2destroy->idDiente32);
        $diente33 = Diente::find($odontograma2destroy->idDiente33);
        $diente34 = Diente::find($odontograma2destroy->idDiente34);
        $diente35 = Diente::find($odontograma2destroy->idDiente35);
        $diente36 = Diente::find($odontograma2destroy->idDiente36);
        $diente37 = Diente::find($odontograma2destroy->idDiente37);
        $diente38 = Diente::find($odontograma2destroy->idDiente38);
        $diente39 = Diente::find($odontograma2destroy->idDiente39);
        $diente40 = Diente::find($odontograma2destroy->idDiente40);
        $diente41 = Diente::find($odontograma2destroy->idDiente41);
        $diente42 = Diente::find($odontograma2destroy->idDiente42);
        $diente43 = Diente::find($odontograma2destroy->idDiente43);
        $diente44 = Diente::find($odontograma2destroy->idDiente44);
        $diente45 = Diente::find($odontograma2destroy->idDiente45);
        $diente46 = Diente::find($odontograma2destroy->idDiente46);
        $diente47 = Diente::find($odontograma2destroy->idDiente47);
        $diente48 = Diente::find($odontograma2destroy->idDiente48);
        $diente49 = Diente::find($odontograma2destroy->idDiente49);
        $diente50 = Diente::find($odontograma2destroy->idDiente50);
        $diente51 = Diente::find($odontograma2destroy->idDiente51);
        $diente52 = Diente::find($odontograma2destroy->idDiente52);

        $historia2destroy->delete();
        $odontograma2destroy->delete();
        $odontogramaInicial2destroy->delete();

        $diente1Inicial->delete();
        $diente2Inicial->delete();
        $diente3Inicial->delete();
        $diente4Inicial->delete();
        $diente5Inicial->delete();
        $diente6Inicial->delete();
        $diente7Inicial->delete();
        $diente8Inicial->delete();
        $diente9Inicial->delete();
        $diente10Inicial->delete();
        $diente11Inicial->delete();
        $diente12Inicial->delete();
        $diente13Inicial->delete();
        $diente14Inicial->delete();
        $diente15Inicial->delete();
        $diente16Inicial->delete();
        $diente17Inicial->delete();
        $diente18Inicial->delete();
        $diente19Inicial->delete();
        $diente20Inicial->delete();
        $diente21Inicial->delete();
        $diente22Inicial->delete();
        $diente23Inicial->delete();
        $diente24Inicial->delete();
        $diente25Inicial->delete();
        $diente26Inicial->delete();
        $diente27Inicial->delete();
        $diente28Inicial->delete();
        $diente29Inicial->delete();
        $diente30Inicial->delete();
        $diente31Inicial->delete();
        $diente32Inicial->delete();
        $diente33Inicial->delete();
        $diente34Inicial->delete();
        $diente35Inicial->delete();
        $diente36Inicial->delete();
        $diente37Inicial->delete();
        $diente38Inicial->delete();
        $diente39Inicial->delete();
        $diente40Inicial->delete();
        $diente41Inicial->delete();
        $diente42Inicial->delete();
        $diente43Inicial->delete();
        $diente44Inicial->delete();
        $diente45Inicial->delete();
        $diente46Inicial->delete();
        $diente47Inicial->delete();
        $diente48Inicial->delete();
        $diente49Inicial->delete();
        $diente50Inicial->delete();
        $diente51Inicial->delete();
        $diente52Inicial->delete();

        $diente1->delete();
        $diente2->delete();
        $diente3->delete();
        $diente4->delete();
        $diente5->delete();
        $diente6->delete();
        $diente7->delete();
        $diente8->delete();
        $diente9->delete();
        $diente10->delete();
        $diente11->delete();
        $diente12->delete();
        $diente13->delete();
        $diente14->delete();
        $diente15->delete();
        $diente16->delete();
        $diente17->delete();
        $diente18->delete();
        $diente19->delete();
        $diente20->delete();
        $diente21->delete();
        $diente22->delete();
        $diente23->delete();
        $diente24->delete();
        $diente25->delete();
        $diente26->delete();
        $diente27->delete();
        $diente28->delete();
        $diente29->delete();
        $diente30->delete();
        $diente31->delete();
        $diente32->delete();
        $diente33->delete();
        $diente34->delete();
        $diente35->delete();
        $diente36->delete();
        $diente37->delete();
        $diente38->delete();
        $diente39->delete();
        $diente40->delete();
        $diente41->delete();
        $diente42->delete();
        $diente43->delete();
        $diente44->delete();
        $diente45->delete();
        $diente46->delete();
        $diente47->delete();
        $diente48->delete();
        $diente49->delete();
        $diente50->delete();
        $diente51->delete();
        $diente52->delete();

        flash('Eliminación exitosa')->success()->important();
        return redirect('/HistoriaClinica');
    }

    public function observacion($id){
      session_start();
      $_SESSION['id'] = $id;
      return redirect()->route('historia.observacionHistoriaClinica');
    }

    public function observacionHistoriaClinica(){
      $user = Auth::User();
      session_start();
      $id = $_SESSION['id'];
      $empresa = Empresa::find($user->idEmpresa);
      $historia = HistoriaClinica::EmpresaAndId($empresa->id, $id)->first();
      $observaciones = Observaciones::SearchHistoria($historia->id)->get();
      $flag = "historia";
      if($user->esAdmin){
            return View('HistoriaClinica.observaciones')
            ->with('observaciones',$observaciones)
            ->with('empresa',$empresa)
            ->with('historia',$historia)
            ->with('flag',$flag);
      }else{
            return View('HistoriaClinica.observacionesTrabajador')
            ->with('observaciones',$observaciones)
            ->with('empresa',$empresa)
            ->with('historia',$historia)
            ->with('flag',$flag);
      }
    }

    public function postcreateObservacion(Request $request, $id){
      $historia = HistoriaClinica::find($id);
      $observaciones = new Observaciones();

      $observaciones->fecha = $request->fecha;
      $observaciones->diente = $request->diente;
      $observaciones->actividad = $request->actividad;
      $observaciones->descripcion = $request->descripcion;
      $observaciones->codigoCUPS = $request->codigoCUPS;
      $observaciones->valorCopago = $request->valorCopago;
      $observaciones->idHistoriaClinica = $historia->id;
      $observaciones->save();

      session_start();
      $_SESSION['id'] = $id;
      return redirect()->route('historia.observacionHistoriaClinica');
    }

    public function editObservacion(Request $request, $id){
      $fecha = "fecha".$id;
      $diente = "diente".$id;
      $actividad = "actividad".$id;
      $descripcion = "descripcion".$id;
      $codigoCUPS =  "codigoCUPS".$id;
      $valorCopago = "valorCopago".$id;

      $observacion = Observaciones::find($id);
      $observacion->fecha = $request->$fecha;
      $observacion->diente = $request->$diente;
      $observacion->actividad = $request->$actividad;
      $observacion->descripcion = $request->$descripcion;
      $observacion->codigoCUPS = $request->$codigoCUPS;
      $observacion->valorCopago = $request->$valorCopago;
      $observacion->save();

      $id = $observacion->idHistoriaClinica;
      $_SESSION['id'] = $id;
      return redirect()->route('historia.observacionHistoriaClinica');
    }

    public function postdeleteObservacion($id){
      $observacion2destroy = Observaciones::find($id);
      $id = $observacion2destroy->idHistoriaClinica;
      $_SESSION['id'] = $id;
      $observacion2destroy->delete();
      return redirect()->route('historia.observacionHistoriaClinica');
    }
}
