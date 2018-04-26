<?php
/*Realizado por Daniel Alejandro Rivera, ing*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Departamento;
use App\Ciudad;
use App\HistoriaClinica;

use App\Diente;
use App\PDiente;
use App\Observaciones;
use App\Odontograma;

use App\Http\Requests;

class HistoriaClinicaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $userActual = Auth::user();
        if($userActual != null){
          if($userActual->esPropietario){
            return redirect('/Registro');
          }else if (!$userActual->esAdmin) {
              flash('No Tiene Los Permisos Necesarios')->error()->important();
              return redirect('/WelcomeTrabajador')->send();
          }
        }

    }

    public function historiaClinica(){
        $user = Auth::User();
        $historiasClinicas = HistoriaClinica::admin($user->id)->get();

       	return View('HistoriaClinica.historiaClinica')
       	->with('user', $user)
        ->with('historiasClinicas', $historiasClinicas);
    }

    public function createHistoriaClinica(Request $request){
        $user = Auth::User();
        $departamentos = Departamento::all();
        $ciudades = Ciudad::all();

        $historia = new HistoriaClinica();
        $historia->nombreCompleto = $request->nombreCompleto;
        $historia->sexo = $request->sexo;
        $historia->tipoDocumento = $request->tipoDocumento;
        $historia->documento = $request->documento;
        //Se crea el odontograma

        //Primeros 10
        //Inicio diente 1 y sus partes
        $pMid1 = new PDiente();
        $pMid1->save();
        $pSup1 = new PDiente();
        $pSup1->save();
        $pInf1 = new PDiente();
        $pInf1->save();
        $pDer1 = new PDiente();
        $pDer1->save();
        $pIzq1 = new PDiente();
        $pIzq1->save();
        
        $diente1 = new Diente();
        $diente1->numero = 18;
        $diente1->idParteCentro    = $pMid1->id;
        $diente1->idParteSuperior  = $pSup1->id;
        $diente1->idParteInferior  = $pInf1->id;
        $diente1->idParteDerecha   = $pDer1->id;
        $diente1->idParteIzquierda = $pIzq1->id;
        $diente1->save();
        //Fin diente 1 y sus partes

        //Inicio diente 2 y sus partes
        $pMid2 = new PDiente();
        $pMid2->save();
        $pSup2 = new PDiente();
        $pSup2->save();
        $pInf2 = new PDiente();
        $pInf2->save();
        $pDer2 = new PDiente();
        $pDer2->save();
        $pIzq2 = new PDiente();
        $pIzq2->save();
        
        $diente2 = new Diente();
        $diente2->numero = 17;
        $diente2->idParteCentro    = $pMid2->id;
        $diente2->idParteSuperior  = $pSup2->id;
        $diente2->idParteInferior  = $pInf2->id;
        $diente2->idParteDerecha   = $pDer2->id;
        $diente2->idParteIzquierda = $pIzq2->id;
        $diente2->save();
        //Fin diente 2 y sus partes

        //Inicio diente 3 y sus partes
        $pMid3 = new PDiente();
        $pMid3->save();
        $pSup3 = new PDiente();
        $pSup3->save();
        $pInf3 = new PDiente();
        $pInf3->save();
        $pDer3 = new PDiente();
        $pDer3->save();
        $pIzq3 = new PDiente();
        $pIzq3->save();
        
        $diente3 = new Diente();
        $diente3->numero = 16;
        $diente3->idParteCentro    = $pMid3->id;
        $diente3->idParteSuperior  = $pSup3->id;
        $diente3->idParteInferior  = $pInf3->id;
        $diente3->idParteDerecha   = $pDer3->id;
        $diente3->idParteIzquierda = $pIzq3->id;
        $diente3->save();
        //Fin diente 3 y sus partes

        //Inicio diente 4 y sus partes
        $pMid4 = new PDiente();
        $pMid4->save();
        $pSup4 = new PDiente();
        $pSup4->save();
        $pInf4 = new PDiente();
        $pInf4->save();
        $pDer4 = new PDiente();
        $pDer4->save();
        $pIzq4 = new PDiente();
        $pIzq4->save();
        
        $diente4 = new Diente();
        $diente4->numero = 15;
        $diente4->idParteCentro    = $pMid4->id;
        $diente4->idParteSuperior  = $pSup4->id;
        $diente4->idParteInferior  = $pInf4->id;
        $diente4->idParteDerecha   = $pDer4->id;
        $diente4->idParteIzquierda = $pIzq4->id;
        $diente4->save();
        //Fin diente 4 y sus partes

        //Inicio diente 5 y sus partes
        $pMid5 = new PDiente();
        $pMid5->save();
        $pSup5 = new PDiente();
        $pSup5->save();
        $pInf5 = new PDiente();
        $pInf5->save();
        $pDer5 = new PDiente();
        $pDer5->save();
        $pIzq5 = new PDiente();
        $pIzq5->save();
        
        $diente5 = new Diente();
        $diente5->numero = 14;
        $diente5->idParteCentro    = $pMid5->id;
        $diente5->idParteSuperior  = $pSup5->id;
        $diente5->idParteInferior  = $pInf5->id;
        $diente5->idParteDerecha   = $pDer5->id;
        $diente5->idParteIzquierda = $pIzq5->id;
        $diente5->save();
        //Fin diente 5 y sus partes

        //Inicio diente 6 y sus partes
        $pMid6 = new PDiente();
        $pMid6->save();
        $pSup6 = new PDiente();
        $pSup6->save();
        $pInf6 = new PDiente();
        $pInf6->save();
        $pDer6 = new PDiente();
        $pDer6->save();
        $pIzq6 = new PDiente();
        $pIzq6->save();
        
        $diente6 = new Diente();
        $diente6->numero = 13;
        $diente6->idParteCentro    = $pMid6->id;
        $diente6->idParteSuperior  = $pSup6->id;
        $diente6->idParteInferior  = $pInf6->id;
        $diente6->idParteDerecha   = $pDer6->id;
        $diente6->idParteIzquierda = $pIzq6->id;
        $diente6->save();
        //Fin diente 6 y sus partes

        //Inicio diente 7 y sus partes
        $pMid7 = new PDiente();
        $pMid7->save();
        $pSup7 = new PDiente();
        $pSup7->save();
        $pInf7 = new PDiente();
        $pInf7->save();
        $pDer7 = new PDiente();
        $pDer7->save();
        $pIzq7 = new PDiente();
        $pIzq7->save();
        
        $diente7 = new Diente();
        $diente7->numero = 12;
        $diente7->idParteCentro    = $pMid7->id;
        $diente7->idParteSuperior  = $pSup7->id;
        $diente7->idParteInferior  = $pInf7->id;
        $diente7->idParteDerecha   = $pDer7->id;
        $diente7->idParteIzquierda = $pIzq7->id;
        $diente7->save();
        //Fin diente 7 y sus partes

        //Inicio diente 8 y sus partes
        $pMid8 = new PDiente();
        $pMid8->save();
        $pSup8 = new PDiente();
        $pSup8->save();
        $pInf8 = new PDiente();
        $pInf8->save();
        $pDer8 = new PDiente();
        $pDer8->save();
        $pIzq8 = new PDiente();
        $pIzq8->save();
        
        $diente8 = new Diente();
        $diente8->numero = 11;
        $diente8->idParteCentro    = $pMid8->id;
        $diente8->idParteSuperior  = $pSup8->id;
        $diente8->idParteInferior  = $pInf8->id;
        $diente8->idParteDerecha   = $pDer8->id;
        $diente8->idParteIzquierda = $pIzq8->id;
        $diente8->save();
        //Fin diente 8 y sus partes

        //Inicio diente 9 y sus partes
        $pMid9 = new PDiente();
        $pMid9->save();
        $pSup9 = new PDiente();
        $pSup9->save();
        $pInf9 = new PDiente();
        $pInf9->save();
        $pDer9 = new PDiente();
        $pDer9->save();
        $pIzq9 = new PDiente();
        $pIzq9->save();
        
        $diente9 = new Diente();
        $diente9->numero = 21;
        $diente9->idParteCentro    = $pMid9->id;
        $diente9->idParteSuperior  = $pSup9->id;
        $diente9->idParteInferior  = $pInf9->id;
        $diente9->idParteDerecha   = $pDer9->id;
        $diente9->idParteIzquierda = $pIzq9->id;
        $diente9->save();
        //Fin diente 9 y sus partes

        //Inicio diente 10 y sus partes
        $pMid10 = new PDiente();
        $pMid10->save();
        $pSup10 = new PDiente();
        $pSup10->save();
        $pInf10 = new PDiente();
        $pInf10->save();
        $pDer10 = new PDiente();
        $pDer10->save();
        $pIzq10 = new PDiente();
        $pIzq10->save();
        
        $diente10 = new Diente();
        $diente10->numero = 22;
        $diente10->idParteCentro    = $pMid10->id;
        $diente10->idParteSuperior  = $pSup10->id;
        $diente10->idParteInferior  = $pInf10->id;
        $diente10->idParteDerecha   = $pDer10->id;
        $diente10->idParteIzquierda = $pIzq10->id;
        $diente10->save();
        //Fin diente 10 y sus partes
        //Fin primeros 10

        //Segundos 10
        //Inicio diente 11 y sus partes
        $pMid11 = new PDiente();
        $pMid11->save();
        $pSup11 = new PDiente();
        $pSup11->save();
        $pInf11 = new PDiente();
        $pInf11->save();
        $pDer11 = new PDiente();
        $pDer11->save();
        $pIzq11 = new PDiente();
        $pIzq11->save();
        
        $diente11 = new Diente();
        $diente11->numero = 23;
        $diente11->idParteCentro    = $pMid11->id;
        $diente11->idParteSuperior  = $pSup11->id;
        $diente11->idParteInferior  = $pInf11->id;
        $diente11->idParteDerecha   = $pDer11->id;
        $diente11->idParteIzquierda = $pIzq11->id;
        $diente11->save();
        //Fin diente 11 y sus partes

        //Inicio diente 12 y sus partes
        $pMid12 = new PDiente();
        $pMid12->save();
        $pSup12 = new PDiente();
        $pSup12->save();
        $pInf12 = new PDiente();
        $pInf12->save();
        $pDer12 = new PDiente();
        $pDer12->save();
        $pIzq12 = new PDiente();
        $pIzq12->save();
        
        $diente12 = new Diente();
        $diente12->numero = 24;
        $diente12->idParteCentro    = $pMid12->id;
        $diente12->idParteSuperior  = $pSup12->id;
        $diente12->idParteInferior  = $pInf12->id;
        $diente12->idParteDerecha   = $pDer12->id;
        $diente12->idParteIzquierda = $pIzq12->id;
        $diente12->save();
        //Fin diente 12 y sus partes

        //Inicio diente 13 y sus partes
        $pMid13 = new PDiente();
        $pMid13->save();
        $pSup13 = new PDiente();
        $pSup13->save();
        $pInf13 = new PDiente();
        $pInf13->save();
        $pDer13 = new PDiente();
        $pDer13->save();
        $pIzq13 = new PDiente();
        $pIzq13->save();
        
        $diente13 = new Diente();
        $diente13->numero = 25;
        $diente13->idParteCentro    = $pMid13->id;
        $diente13->idParteSuperior  = $pSup13->id;
        $diente13->idParteInferior  = $pInf13->id;
        $diente13->idParteDerecha   = $pDer13->id;
        $diente13->idParteIzquierda = $pIzq13->id;
        $diente13->save();
        //Fin diente 13 y sus partes

        //Inicio diente 14 y sus partes
        $pMid14 = new PDiente();
        $pMid14->save();
        $pSup14 = new PDiente();
        $pSup14->save();
        $pInf14 = new PDiente();
        $pInf14->save();
        $pDer14 = new PDiente();
        $pDer14->save();
        $pIzq14 = new PDiente();
        $pIzq14->save();
        
        $diente14 = new Diente();
        $diente14->numero = 26;
        $diente14->idParteCentro    = $pMid14->id;
        $diente14->idParteSuperior  = $pSup14->id;
        $diente14->idParteInferior  = $pInf14->id;
        $diente14->idParteDerecha   = $pDer14->id;
        $diente14->idParteIzquierda = $pIzq14->id;
        $diente14->save();
        //Fin diente 14 y sus partes

        //Inicio diente 15 y sus partes
        $pMid15 = new PDiente();
        $pMid15->save();
        $pSup15 = new PDiente();
        $pSup15->save();
        $pInf15 = new PDiente();
        $pInf15->save();
        $pDer15 = new PDiente();
        $pDer15->save();
        $pIzq15 = new PDiente();
        $pIzq15->save();
        
        $diente15 = new Diente();
        $diente15->numero = 27;
        $diente15->idParteCentro    = $pMid15->id;
        $diente15->idParteSuperior  = $pSup15->id;
        $diente15->idParteInferior  = $pInf15->id;
        $diente15->idParteDerecha   = $pDer15->id;
        $diente15->idParteIzquierda = $pIzq15->id;
        $diente15->save();
        //Fin diente 15 y sus partes

        //Inicio diente 16 y sus partes
        $pMid16 = new PDiente();
        $pMid16->save();
        $pSup16 = new PDiente();
        $pSup16->save();
        $pInf16 = new PDiente();
        $pInf16->save();
        $pDer16 = new PDiente();
        $pDer16->save();
        $pIzq16 = new PDiente();
        $pIzq16->save();
        
        $diente16 = new Diente();
        $diente16->numero = 28;
        $diente16->idParteCentro    = $pMid16->id;
        $diente16->idParteSuperior  = $pSup16->id;
        $diente16->idParteInferior  = $pInf16->id;
        $diente16->idParteDerecha   = $pDer16->id;
        $diente16->idParteIzquierda = $pIzq16->id;
        $diente16->save();
        //Fin diente 16 y sus partes

        //Inicio diente 17 y sus partes
        $pMid17 = new PDiente();
        $pMid17->save();
        $pSup17 = new PDiente();
        $pSup17->save();
        $pInf17 = new PDiente();
        $pInf17->save();
        $pDer17 = new PDiente();
        $pDer17->save();
        $pIzq17 = new PDiente();
        $pIzq17->save();
        
        $diente17 = new Diente();
        $diente17->numero = 55;
        $diente17->idParteCentro    = $pMid17->id;
        $diente17->idParteSuperior  = $pSup17->id;
        $diente17->idParteInferior  = $pInf17->id;
        $diente17->idParteDerecha   = $pDer17->id;
        $diente17->idParteIzquierda = $pIzq17->id;
        $diente17->save();
        //Fin diente 17 y sus partes

        //Inicio diente 18 y sus partes
        $pMid18 = new PDiente();
        $pMid18->save();
        $pSup18 = new PDiente();
        $pSup18->save();
        $pInf18 = new PDiente();
        $pInf18->save();
        $pDer18 = new PDiente();
        $pDer18->save();
        $pIzq18 = new PDiente();
        $pIzq18->save();
        
        $diente18 = new Diente();
        $diente18->numero = 54;
        $diente18->idParteCentro    = $pMid18->id;
        $diente18->idParteSuperior  = $pSup18->id;
        $diente18->idParteInferior  = $pInf18->id;
        $diente18->idParteDerecha   = $pDer18->id;
        $diente18->idParteIzquierda = $pIzq18->id;
        $diente18->save();
        //Fin diente 18 y sus partes

        //Inicio diente 19 y sus partes
        $pMid19 = new PDiente();
        $pMid19->save();
        $pSup19 = new PDiente();
        $pSup19->save();
        $pInf19 = new PDiente();
        $pInf19->save();
        $pDer19 = new PDiente();
        $pDer19->save();
        $pIzq19 = new PDiente();
        $pIzq19->save();
        
        $diente19 = new Diente();
        $diente19->numero = 53;
        $diente19->idParteCentro    = $pMid19->id;
        $diente19->idParteSuperior  = $pSup19->id;
        $diente19->idParteInferior  = $pInf19->id;
        $diente19->idParteDerecha   = $pDer19->id;
        $diente19->idParteIzquierda = $pIzq19->id;
        $diente19->save();
        //Fin diente 19 y sus partes

        //Inicio diente 20 y sus partes
        $pMid20 = new PDiente();
        $pMid20->save();
        $pSup20 = new PDiente();
        $pSup20->save();
        $pInf20 = new PDiente();
        $pInf20->save();
        $pDer20 = new PDiente();
        $pDer20->save();
        $pIzq20 = new PDiente();
        $pIzq20->save();
        
        $diente20 = new Diente();
        $diente20->numero = 52;
        $diente20->idParteCentro    = $pMid20->id;
        $diente20->idParteSuperior  = $pSup20->id;
        $diente20->idParteInferior  = $pInf20->id;
        $diente20->idParteDerecha   = $pDer20->id;
        $diente20->idParteIzquierda = $pIzq20->id;
        $diente20->save();
        //Fin diente 20 y sus partes
        //Fin segundos 10

        //Terceros 10
        //Inicio diente 21 y sus partes
        $pMid21 = new PDiente();
        $pMid21->save();
        $pSup21 = new PDiente();
        $pSup21->save();
        $pInf21 = new PDiente();
        $pInf21->save();
        $pDer21 = new PDiente();
        $pDer21->save();
        $pIzq21 = new PDiente();
        $pIzq21->save();
        
        $diente21 = new Diente();
        $diente21->numero = 51;
        $diente21->idParteCentro    = $pMid21->id;
        $diente21->idParteSuperior  = $pSup21->id;
        $diente21->idParteInferior  = $pInf21->id;
        $diente21->idParteDerecha   = $pDer21->id;
        $diente21->idParteIzquierda = $pIzq21->id;
        $diente21->save();
        //Fin diente 21 y sus partes

        //Inicio diente 22 y sus partes
        $pMid22 = new PDiente();
        $pMid22->save();
        $pSup22 = new PDiente();
        $pSup22->save();
        $pInf22 = new PDiente();
        $pInf22->save();
        $pDer22 = new PDiente();
        $pDer22->save();
        $pIzq22 = new PDiente();
        $pIzq22->save();
        
        $diente22 = new Diente();
        $diente22->numero = 61;
        $diente22->idParteCentro    = $pMid22->id;
        $diente22->idParteSuperior  = $pSup22->id;
        $diente22->idParteInferior  = $pInf22->id;
        $diente22->idParteDerecha   = $pDer22->id;
        $diente22->idParteIzquierda = $pIzq22->id;
        $diente22->save();
        //Fin diente 22 y sus partes

        //Inicio diente 23 y sus partes
        $pMid23 = new PDiente();
        $pMid23->save();
        $pSup23 = new PDiente();
        $pSup23->save();
        $pInf23 = new PDiente();
        $pInf23->save();
        $pDer23 = new PDiente();
        $pDer23->save();
        $pIzq23 = new PDiente();
        $pIzq23->save();
        
        $diente23 = new Diente();
        $diente23->numero = 62;
        $diente23->idParteCentro    = $pMid23->id;
        $diente23->idParteSuperior  = $pSup23->id;
        $diente23->idParteInferior  = $pInf23->id;
        $diente23->idParteDerecha   = $pDer23->id;
        $diente23->idParteIzquierda = $pIzq23->id;
        $diente23->save();
        //Fin diente 23 y sus partes

        //Inicio diente 24 y sus partes
        $pMid24 = new PDiente();
        $pMid24->save();
        $pSup24 = new PDiente();
        $pSup24->save();
        $pInf24 = new PDiente();
        $pInf24->save();
        $pDer24 = new PDiente();
        $pDer24->save();
        $pIzq24 = new PDiente();
        $pIzq24->save();
        
        $diente24 = new Diente();
        $diente24->numero = 63;
        $diente24->idParteCentro    = $pMid24->id;
        $diente24->idParteSuperior  = $pSup24->id;
        $diente24->idParteInferior  = $pInf24->id;
        $diente24->idParteDerecha   = $pDer24->id;
        $diente24->idParteIzquierda = $pIzq24->id;
        $diente24->save();
        //Fin diente 24 y sus partes

        //Inicio diente 25 y sus partes
        $pMid25 = new PDiente();
        $pMid25->save();
        $pSup25 = new PDiente();
        $pSup25->save();
        $pInf25 = new PDiente();
        $pInf25->save();
        $pDer25 = new PDiente();
        $pDer25->save();
        $pIzq25 = new PDiente();
        $pIzq25->save();
        
        $diente25 = new Diente();
        $diente25->numero = 64;
        $diente25->idParteCentro    = $pMid25->id;
        $diente25->idParteSuperior  = $pSup25->id;
        $diente25->idParteInferior  = $pInf25->id;
        $diente25->idParteDerecha   = $pDer25->id;
        $diente25->idParteIzquierda = $pIzq25->id;
        $diente25->save();
        //Fin diente 25 y sus partes

        //Inicio diente 26 y sus partes
        $pMid26 = new PDiente();
        $pMid26->save();
        $pSup26 = new PDiente();
        $pSup26->save();
        $pInf26 = new PDiente();
        $pInf26->save();
        $pDer26 = new PDiente();
        $pDer26->save();
        $pIzq26 = new PDiente();
        $pIzq26->save();
        
        $diente26 = new Diente();
        $diente26->numero = 65;
        $diente26->idParteCentro    = $pMid26->id;
        $diente26->idParteSuperior  = $pSup26->id;
        $diente26->idParteInferior  = $pInf26->id;
        $diente26->idParteDerecha   = $pDer26->id;
        $diente26->idParteIzquierda = $pIzq26->id;
        $diente26->save();
        //Fin diente 26 y sus partes

        //Inicio diente 27 y sus partes
        $pMid27 = new PDiente();
        $pMid27->save();
        $pSup27 = new PDiente();
        $pSup27->save();
        $pInf27 = new PDiente();
        $pInf27->save();
        $pDer27 = new PDiente();
        $pDer27->save();
        $pIzq27 = new PDiente();
        $pIzq27->save();
        
        $diente27 = new Diente();
        $diente27->numero = 85;
        $diente27->idParteCentro    = $pMid27->id;
        $diente27->idParteSuperior  = $pSup27->id;
        $diente27->idParteInferior  = $pInf27->id;
        $diente27->idParteDerecha   = $pDer27->id;
        $diente27->idParteIzquierda = $pIzq27->id;
        $diente27->save();
        //Fin diente 27 y sus partes

        //Inicio diente 28 y sus partes
        $pMid28 = new PDiente();
        $pMid28->save();
        $pSup28 = new PDiente();
        $pSup28->save();
        $pInf28 = new PDiente();
        $pInf28->save();
        $pDer28 = new PDiente();
        $pDer28->save();
        $pIzq28 = new PDiente();
        $pIzq28->save();
        
        $diente28 = new Diente();
        $diente28->numero = 84;
        $diente28->idParteCentro    = $pMid28->id;
        $diente28->idParteSuperior  = $pSup28->id;
        $diente28->idParteInferior  = $pInf28->id;
        $diente28->idParteDerecha   = $pDer28->id;
        $diente28->idParteIzquierda = $pIzq28->id;
        $diente28->save();
        //Fin diente 28 y sus partes

        //Inicio diente 29 y sus partes
        $pMid29 = new PDiente();
        $pMid29->save();
        $pSup29 = new PDiente();
        $pSup29->save();
        $pInf29 = new PDiente();
        $pInf29->save();
        $pDer29 = new PDiente();
        $pDer29->save();
        $pIzq29 = new PDiente();
        $pIzq29->save();
        
        $diente29 = new Diente();
        $diente29->numero = 83;
        $diente29->idParteCentro    = $pMid29->id;
        $diente29->idParteSuperior  = $pSup29->id;
        $diente29->idParteInferior  = $pInf29->id;
        $diente29->idParteDerecha   = $pDer29->id;
        $diente29->idParteIzquierda = $pIzq29->id;
        $diente29->save();
        //Fin diente 29 y sus partes

        //Inicio diente 30 y sus partes
        $pMid30 = new PDiente();
        $pMid30->save();
        $pSup30 = new PDiente();
        $pSup30->save();
        $pInf30 = new PDiente();
        $pInf30->save();
        $pDer30 = new PDiente();
        $pDer30->save();
        $pIzq30 = new PDiente();
        $pIzq30->save();
        
        $diente30 = new Diente();
        $diente30->numero = 82;
        $diente30->idParteCentro    = $pMid30->id;
        $diente30->idParteSuperior  = $pSup30->id;
        $diente30->idParteInferior  = $pInf30->id;
        $diente30->idParteDerecha   = $pDer30->id;
        $diente30->idParteIzquierda = $pIzq30->id;
        $diente30->save();
        //Fin diente 30 y sus partes
        //Fin terceros 10

        //Cuartos 10
        //Inicio diente 31 y sus partes
        $pMid31 = new PDiente();
        $pMid31->save();
        $pSup31 = new PDiente();
        $pSup31->save();
        $pInf31 = new PDiente();
        $pInf31->save();
        $pDer31 = new PDiente();
        $pDer31->save();
        $pIzq31 = new PDiente();
        $pIzq31->save();
        
        $diente31 = new Diente();
        $diente31->numero = 81;
        $diente31->idParteCentro    = $pMid31->id;
        $diente31->idParteSuperior  = $pSup31->id;
        $diente31->idParteInferior  = $pInf31->id;
        $diente31->idParteDerecha   = $pDer31->id;
        $diente31->idParteIzquierda = $pIzq31->id;
        $diente31->save();
        //Fin diente 31 y sus partes

        //Inicio diente 32 y sus partes
        $pMid32 = new PDiente();
        $pMid32->save();
        $pSup32 = new PDiente();
        $pSup32->save();
        $pInf32 = new PDiente();
        $pInf32->save();
        $pDer32 = new PDiente();
        $pDer32->save();
        $pIzq32 = new PDiente();
        $pIzq32->save();
        
        $diente32 = new Diente();
        $diente32->numero = 71;
        $diente32->idParteCentro    = $pMid32->id;
        $diente32->idParteSuperior  = $pSup32->id;
        $diente32->idParteInferior  = $pInf32->id;
        $diente32->idParteDerecha   = $pDer32->id;
        $diente32->idParteIzquierda = $pIzq32->id;
        $diente32->save();
        //Fin diente 32 y sus partes

        //Inicio diente 33 y sus partes
        $pMid33 = new PDiente();
        $pMid33->save();
        $pSup33 = new PDiente();
        $pSup33->save();
        $pInf33 = new PDiente();
        $pInf33->save();
        $pDer33 = new PDiente();
        $pDer33->save();
        $pIzq33 = new PDiente();
        $pIzq33->save();
        
        $diente33 = new Diente();
        $diente33->numero = 72;
        $diente33->idParteCentro    = $pMid33->id;
        $diente33->idParteSuperior  = $pSup33->id;
        $diente33->idParteInferior  = $pInf33->id;
        $diente33->idParteDerecha   = $pDer33->id;
        $diente33->idParteIzquierda = $pIzq33->id;
        $diente33->save();
        //Fin diente 33 y sus partes

        //Inicio diente 34 y sus partes
        $pMid34 = new PDiente();
        $pMid34->save();
        $pSup34 = new PDiente();
        $pSup34->save();
        $pInf34 = new PDiente();
        $pInf34->save();
        $pDer34 = new PDiente();
        $pDer34->save();
        $pIzq34 = new PDiente();
        $pIzq34->save();
        
        $diente34 = new Diente();
        $diente34->numero = 73;
        $diente34->idParteCentro    = $pMid34->id;
        $diente34->idParteSuperior  = $pSup34->id;
        $diente34->idParteInferior  = $pInf34->id;
        $diente34->idParteDerecha   = $pDer34->id;
        $diente34->idParteIzquierda = $pIzq34->id;
        $diente34->save();
        //Fin diente 34 y sus partes

        //Inicio diente 35 y sus partes
        $pMid35 = new PDiente();
        $pMid35->save();
        $pSup35 = new PDiente();
        $pSup35->save();
        $pInf35 = new PDiente();
        $pInf35->save();
        $pDer35 = new PDiente();
        $pDer35->save();
        $pIzq35 = new PDiente();
        $pIzq35->save();
        
        $diente35 = new Diente();
        $diente35->numero = 74;
        $diente35->idParteCentro    = $pMid35->id;
        $diente35->idParteSuperior  = $pSup35->id;
        $diente35->idParteInferior  = $pInf35->id;
        $diente35->idParteDerecha   = $pDer35->id;
        $diente35->idParteIzquierda = $pIzq35->id;
        $diente35->save();
        //Fin diente 35 y sus partes

        //Inicio diente 36 y sus partes
        $pMid36 = new PDiente();
        $pMid36->save();
        $pSup36 = new PDiente();
        $pSup36->save();
        $pInf36 = new PDiente();
        $pInf36->save();
        $pDer36 = new PDiente();
        $pDer36->save();
        $pIzq36 = new PDiente();
        $pIzq36->save();
        
        $diente36 = new Diente();
        $diente36->numero = 75;
        $diente36->idParteCentro    = $pMid36->id;
        $diente36->idParteSuperior  = $pSup36->id;
        $diente36->idParteInferior  = $pInf36->id;
        $diente36->idParteDerecha   = $pDer36->id;
        $diente36->idParteIzquierda = $pIzq36->id;
        $diente36->save();
        //Fin diente 36 y sus partes

        //Inicio diente 37 y sus partes
        $pMid37 = new PDiente();
        $pMid37->save();
        $pSup37 = new PDiente();
        $pSup37->save();
        $pInf37 = new PDiente();
        $pInf37->save();
        $pDer37 = new PDiente();
        $pDer37->save();
        $pIzq37 = new PDiente();
        $pIzq37->save();
        
        $diente37 = new Diente();
        $diente37->numero = 48;
        $diente37->idParteCentro    = $pMid37->id;
        $diente37->idParteSuperior  = $pSup37->id;
        $diente37->idParteInferior  = $pInf37->id;
        $diente37->idParteDerecha   = $pDer37->id;
        $diente37->idParteIzquierda = $pIzq37->id;
        $diente37->save();
        //Fin diente 37 y sus partes

        //Inicio diente 38 y sus partes
        $pMid38 = new PDiente();
        $pMid38->save();
        $pSup38 = new PDiente();
        $pSup38->save();
        $pInf38 = new PDiente();
        $pInf38->save();
        $pDer38 = new PDiente();
        $pDer38->save();
        $pIzq38 = new PDiente();
        $pIzq38->save();
        
        $diente38 = new Diente();
        $diente38->numero = 47;
        $diente38->idParteCentro    = $pMid38->id;
        $diente38->idParteSuperior  = $pSup38->id;
        $diente38->idParteInferior  = $pInf38->id;
        $diente38->idParteDerecha   = $pDer38->id;
        $diente38->idParteIzquierda = $pIzq38->id;
        $diente38->save();
        //Fin diente 38 y sus partes

        //Inicio diente 39 y sus partes
        $pMid39 = new PDiente();
        $pMid39->save();
        $pSup39 = new PDiente();
        $pSup39->save();
        $pInf39 = new PDiente();
        $pInf39->save();
        $pDer39 = new PDiente();
        $pDer39->save();
        $pIzq39 = new PDiente();
        $pIzq39->save();
        
        $diente39 = new Diente();
        $diente39->numero = 46;
        $diente39->idParteCentro    = $pMid39->id;
        $diente39->idParteSuperior  = $pSup39->id;
        $diente39->idParteInferior  = $pInf39->id;
        $diente39->idParteDerecha   = $pDer39->id;
        $diente39->idParteIzquierda = $pIzq39->id;
        $diente39->save();
        //Fin diente 9 y sus partes

        //Inicio diente 40 y sus partes
        $pMid40 = new PDiente();
        $pMid40->save();
        $pSup40 = new PDiente();
        $pSup40->save();
        $pInf40 = new PDiente();
        $pInf40->save();
        $pDer40 = new PDiente();
        $pDer40->save();
        $pIzq40 = new PDiente();
        $pIzq40->save();
        
        $diente40 = new Diente();
        $diente40->numero = 45;
        $diente40->idParteCentro    = $pMid40->id;
        $diente40->idParteSuperior  = $pSup40->id;
        $diente40->idParteInferior  = $pInf40->id;
        $diente40->idParteDerecha   = $pDer40->id;
        $diente40->idParteIzquierda = $pIzq40->id;
        $diente40->save();
        //Fin diente 40 y sus partes
        //Fin cuartos 10

        //Quintos 10
        //Inicio diente 41 y sus partes
        $pMid41 = new PDiente();
        $pMid41->save();
        $pSup41 = new PDiente();
        $pSup41->save();
        $pInf41 = new PDiente();
        $pInf41->save();
        $pDer41 = new PDiente();
        $pDer41->save();
        $pIzq41 = new PDiente();
        $pIzq41->save();
        
        $diente41 = new Diente();
        $diente41->numero = 44;
        $diente41->idParteCentro    = $pMid41->id;
        $diente41->idParteSuperior  = $pSup41->id;
        $diente41->idParteInferior  = $pInf41->id;
        $diente41->idParteDerecha   = $pDer41->id;
        $diente41->idParteIzquierda = $pIzq41->id;
        $diente41->save();
        //Fin diente 41 y sus partes

        //Inicio diente 42 y sus partes
        $pMid42 = new PDiente();
        $pMid42->save();
        $pSup42 = new PDiente();
        $pSup42->save();
        $pInf42 = new PDiente();
        $pInf42->save();
        $pDer42 = new PDiente();
        $pDer42->save();
        $pIzq42 = new PDiente();
        $pIzq42->save();
        
        $diente42 = new Diente();
        $diente42->numero = 43;
        $diente42->idParteCentro    = $pMid42->id;
        $diente42->idParteSuperior  = $pSup42->id;
        $diente42->idParteInferior  = $pInf42->id;
        $diente42->idParteDerecha   = $pDer42->id;
        $diente42->idParteIzquierda = $pIzq42->id;
        $diente42->save();
        //Fin diente 42 y sus partes

        //Inicio diente 43 y sus partes
        $pMid43 = new PDiente();
        $pMid43->save();
        $pSup43 = new PDiente();
        $pSup43->save();
        $pInf43 = new PDiente();
        $pInf43->save();
        $pDer43 = new PDiente();
        $pDer43->save();
        $pIzq43 = new PDiente();
        $pIzq43->save();
        
        $diente43 = new Diente();
        $diente43->numero = 42;
        $diente43->idParteCentro    = $pMid43->id;
        $diente43->idParteSuperior  = $pSup43->id;
        $diente43->idParteInferior  = $pInf43->id;
        $diente43->idParteDerecha   = $pDer43->id;
        $diente43->idParteIzquierda = $pIzq43->id;
        $diente43->save();
        //Fin diente 43 y sus partes

        //Inicio diente 44 y sus partes
        $pMid44 = new PDiente();
        $pMid44->save();
        $pSup44 = new PDiente();
        $pSup44->save();
        $pInf44 = new PDiente();
        $pInf44->save();
        $pDer44 = new PDiente();
        $pDer44->save();
        $pIzq44 = new PDiente();
        $pIzq44->save();
        
        $diente44 = new Diente();
        $diente44->numero = 41;
        $diente44->idParteCentro    = $pMid44->id;
        $diente44->idParteSuperior  = $pSup44->id;
        $diente44->idParteInferior  = $pInf44->id;
        $diente44->idParteDerecha   = $pDer44->id;
        $diente44->idParteIzquierda = $pIzq44->id;
        $diente44->save();
        //Fin diente 44 y sus partes

        //Inicio diente 45 y sus partes
        $pMid45 = new PDiente();
        $pMid45->save();
        $pSup45 = new PDiente();
        $pSup45->save();
        $pInf45 = new PDiente();
        $pInf45->save();
        $pDer45 = new PDiente();
        $pDer45->save();
        $pIzq45 = new PDiente();
        $pIzq45->save();
        
        $diente45 = new Diente();
        $diente45->numero = 31;
        $diente45->idParteCentro    = $pMid45->id;
        $diente45->idParteSuperior  = $pSup45->id;
        $diente45->idParteInferior  = $pInf45->id;
        $diente45->idParteDerecha   = $pDer45->id;
        $diente45->idParteIzquierda = $pIzq45->id;
        $diente45->save();
        //Fin diente 45 y sus partes

        //Inicio diente 46 y sus partes
        $pMid46 = new PDiente();
        $pMid46->save();
        $pSup46 = new PDiente();
        $pSup46->save();
        $pInf46 = new PDiente();
        $pInf46->save();
        $pDer46 = new PDiente();
        $pDer46->save();
        $pIzq46 = new PDiente();
        $pIzq46->save();
        
        $diente46 = new Diente();
        $diente46->numero = 32;
        $diente46->idParteCentro    = $pMid46->id;
        $diente46->idParteSuperior  = $pSup46->id;
        $diente46->idParteInferior  = $pInf46->id;
        $diente46->idParteDerecha   = $pDer46->id;
        $diente46->idParteIzquierda = $pIzq46->id;
        $diente46->save();
        //Fin diente 46 y sus partes

        //Inicio diente 47 y sus partes
        $pMid47 = new PDiente();
        $pMid47->save();
        $pSup47 = new PDiente();
        $pSup47->save();
        $pInf47 = new PDiente();
        $pInf47->save();
        $pDer47 = new PDiente();
        $pDer47->save();
        $pIzq47 = new PDiente();
        $pIzq47->save();
        
        $diente47 = new Diente();
        $diente47->numero = 33;
        $diente47->idParteCentro    = $pMid47->id;
        $diente47->idParteSuperior  = $pSup47->id;
        $diente47->idParteInferior  = $pInf47->id;
        $diente47->idParteDerecha   = $pDer47->id;
        $diente47->idParteIzquierda = $pIzq47->id;
        $diente47->save();
        //Fin diente 47 y sus partes

        //Inicio diente 48 y sus partes
        $pMid48 = new PDiente();
        $pMid48->save();
        $pSup48 = new PDiente();
        $pSup48->save();
        $pInf48 = new PDiente();
        $pInf48->save();
        $pDer48 = new PDiente();
        $pDer48->save();
        $pIzq48 = new PDiente();
        $pIzq48->save();
        
        $diente48 = new Diente();
        $diente48->numero = 34;
        $diente48->idParteCentro    = $pMid48->id;
        $diente48->idParteSuperior  = $pSup48->id;
        $diente48->idParteInferior  = $pInf48->id;
        $diente48->idParteDerecha   = $pDer48->id;
        $diente48->idParteIzquierda = $pIzq48->id;
        $diente48->save();
        //Fin diente 48 y sus partes

        //Inicio diente 49 y sus partes
        $pMid49 = new PDiente();
        $pMid49->save();
        $pSup49 = new PDiente();
        $pSup49->save();
        $pInf49 = new PDiente();
        $pInf49->save();
        $pDer49 = new PDiente();
        $pDer49->save();
        $pIzq49 = new PDiente();
        $pIzq49->save();
        
        $diente49 = new Diente();
        $diente49->numero = 35;
        $diente49->idParteCentro    = $pMid49->id;
        $diente49->idParteSuperior  = $pSup49->id;
        $diente49->idParteInferior  = $pInf49->id;
        $diente49->idParteDerecha   = $pDer49->id;
        $diente49->idParteIzquierda = $pIzq49->id;
        $diente49->save();
        //Fin diente 49 y sus partes

        //Inicio diente 50 y sus partes
        $pMid50 = new PDiente();
        $pMid50->save();
        $pSup50 = new PDiente();
        $pSup50->save();
        $pInf50 = new PDiente();
        $pInf50->save();
        $pDer50 = new PDiente();
        $pDer50->save();
        $pIzq50 = new PDiente();
        $pIzq50->save();
        
        $diente50 = new Diente();
        $diente50->numero = 36;
        $diente50->idParteCentro    = $pMid50->id;
        $diente50->idParteSuperior  = $pSup50->id;
        $diente50->idParteInferior  = $pInf50->id;
        $diente50->idParteDerecha   = $pDer50->id;
        $diente50->idParteIzquierda = $pIzq50->id;
        $diente50->save();
        //Fin diente 50 y sus partes
        //Fin quintos 10

        //Inicio ultimos 2
        //Inicio diente 51 y sus partes
        $pMid51 = new PDiente();
        $pMid51->save();
        $pSup51 = new PDiente();
        $pSup51->save();
        $pInf51 = new PDiente();
        $pInf51->save();
        $pDer51 = new PDiente();
        $pDer51->save();
        $pIzq51 = new PDiente();
        $pIzq51->save();
        
        $diente51 = new Diente();
        $diente51->numero = 37;
        $diente51->idParteCentro    = $pMid51->id;
        $diente51->idParteSuperior  = $pSup51->id;
        $diente51->idParteInferior  = $pInf51->id;
        $diente51->idParteDerecha   = $pDer51->id;
        $diente51->idParteIzquierda = $pIzq51->id;
        $diente51->save();
        //Fin diente 51 y sus partes

        //Inicio diente 52 y sus partes
        $pMid52 = new PDiente();
        $pMid52->save();
        $pSup52 = new PDiente();
        $pSup52->save();
        $pInf52 = new PDiente();
        $pInf52->save();
        $pDer52 = new PDiente();
        $pDer52->save();
        $pIzq52 = new PDiente();
        $pIzq52->save();
        
        $diente52 = new Diente();
        $diente52->numero = 38;
        $diente52->idParteCentro    = $pMid52->id;
        $diente52->idParteSuperior  = $pSup52->id;
        $diente52->idParteInferior  = $pInf52->id;
        $diente52->idParteDerecha   = $pDer52->id;
        $diente52->idParteIzquierda = $pIzq52->id;
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

        $historia->idOdontograma = $odontograma->id;
        $historia->idAdmin = $user->id;
        $historia->save();

        return View('HistoriaClinica.crearHistoriaClinica')
        ->with('departamentos',$departamentos)
        ->with('ciudades', $ciudades)
        ->with('user',$user)
        ->with('historia',$historia);
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

         return View('HistoriaClinica.crearHistoriaClinica')
        ->with('departamentos',$departamentos)
        ->with('ciudades', $ciudades)
        ->with('user',$user)
        ->with('historia',$historia);
    }

    public function posteditHistoriaClinica(Request $request, $id){
        $user = Auth::User();
        $departamentos = Departamento::all();
        $ciudades = Ciudad::all();

        $historia = HistoriaClinica::find($id);
        //Información personal
        $historia->nombreCompleto = $request->nombreCompleto;
        $historia->tipoDocumento = $request->tipoDocumento;
        $historia->documento = $request->documento;
        $historia->sexo = $request->sexo;
        $historia->edad = $request->edad;
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

        $historia->save();

        session_start();
        $_SESSION['id'] = $id;
        return redirect()->route('historia.editHistoriaClinica');
    }
}
