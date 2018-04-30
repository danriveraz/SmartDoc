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

        //return odontograma


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

        //Inicio modificar odontograma

        $odontograma = Odontograma::find($historia->idOdontograma);

        //Bloque superior
        //Diente # 18
        $diente1 = Diente::find($odontograma->idDiente1);
        $diente1->parteCentro = $request->c181;
        $diente1->parteSuperior = $request->t181;
        $diente1->parteInferior = $request->b181;
        $diente1->parteDerecha = $request->r181;
        $diente1->parteIzquierda = $request->l181;
        $diente1->save();

        //Diente # 17
        $diente2 = Diente::find($odontograma->idDiente2);
        $diente2->parteCentro = $request->c171;
        $diente2->parteSuperior = $request->t171;
        $diente2->parteInferior = $request->b171;
        $diente2->parteDerecha = $request->r171;
        $diente2->parteIzquierda = $request->l171;
        $diente2->save();

        //Diente # 16
        $diente3 = Diente::find($odontograma->idDiente3);
        $diente3->parteCentro = $request->c161;
        $diente3->parteSuperior = $request->t161;
        $diente3->parteInferior = $request->b161;
        $diente3->parteDerecha = $request->r161;
        $diente3->parteIzquierda = $request->l161;
        $diente3->save();

        //Diente # 15
        $diente4 = Diente::find($odontograma->idDiente4);
        $diente4->parteCentro = $request->c151;
        $diente4->parteSuperior = $request->t151;
        $diente4->parteInferior = $request->b151;
        $diente4->parteDerecha = $request->r151;
        $diente4->parteIzquierda = $request->l151;
        $diente4->save();

        //Diente # 14
        $diente5 = Diente::find($odontograma->idDiente5);
        $diente5->parteCentro = $request->c141;
        $diente5->parteSuperior = $request->t141;
        $diente5->parteInferior = $request->b141;
        $diente5->parteDerecha = $request->r141;
        $diente5->parteIzquierda = $request->l141;
        $diente5->save();

        //Diente # 13
        $diente6 = Diente::find($odontograma->idDiente6);
        $diente6->parteCentro = $request->c131;
        $diente6->parteSuperior = $request->t131;
        $diente6->parteInferior = $request->b131;
        $diente6->parteDerecha = $request->r131;
        $diente6->parteIzquierda = $request->l131;
        $diente6->save();

        //Diente # 12
        $diente7 = Diente::find($odontograma->idDiente7);
        $diente7->parteCentro = $request->c121;
        $diente7->parteSuperior = $request->t121;
        $diente7->parteInferior = $request->b121;
        $diente7->parteDerecha = $request->r121;
        $diente7->parteIzquierda = $request->l121;
        $diente7->save();

        //Diente # 11
        $diente8 = Diente::find($odontograma->idDiente8);
        $diente8->parteCentro = $request->c111;
        $diente8->parteSuperior = $request->t111;
        $diente8->parteInferior = $request->b111;
        $diente8->parteDerecha = $request->r111;
        $diente8->parteIzquierda = $request->l111;
        $diente8->save();

        //Diente # 21
        $diente9 = Diente::find($odontograma->idDiente9);
        $diente9->parteCentro = $request->c211;
        $diente9->parteSuperior = $request->t211;
        $diente9->parteInferior = $request->b211;
        $diente9->parteDerecha = $request->r211;
        $diente9->parteIzquierda = $request->l211;
        $diente9->save();

        //Diente # 22
        $diente10 = Diente::find($odontograma->idDiente10);
        $diente10->parteCentro = $request->c221;
        $diente10->parteSuperior = $request->t221;
        $diente10->parteInferior = $request->b221;
        $diente10->parteDerecha = $request->r221;
        $diente10->parteIzquierda = $request->l221;
        $diente10->save();

        //Diente # 23
        $diente11 = Diente::find($odontograma->idDiente11);
        $diente11->parteCentro = $request->c231;
        $diente11->parteSuperior = $request->t231;
        $diente11->parteInferior = $request->b231;
        $diente11->parteDerecha = $request->r231;
        $diente11->parteIzquierda = $request->l231;
        $diente11->save();

        //Diente # 24
        $diente12 = Diente::find($odontograma->idDiente12);
        $diente12->parteCentro = $request->c241;
        $diente12->parteSuperior = $request->t241;
        $diente12->parteInferior = $request->b241;
        $diente12->parteDerecha = $request->r241;
        $diente12->parteIzquierda = $request->l241;
        $diente12->save();

        //Diente # 25
        $diente13 = Diente::find($odontograma->idDiente13);
        $diente13->parteCentro = $request->c251;
        $diente13->parteSuperior = $request->t251;
        $diente13->parteInferior = $request->b251;
        $diente13->parteDerecha = $request->r251;
        $diente13->parteIzquierda = $request->l251;
        $diente13->save();

        //Diente # 26
        $diente14 = Diente::find($odontograma->idDiente14);
        $diente14->parteCentro = $request->c261;
        $diente14->parteSuperior = $request->t261;
        $diente14->parteInferior = $request->b261;
        $diente14->parteDerecha = $request->r261;
        $diente14->parteIzquierda = $request->l261;
        $diente14->save();

        //Diente # 27
        $diente15 = Diente::find($odontograma->idDiente15);
        $diente15->parteCentro = $request->c271;
        $diente15->parteSuperior = $request->t271;
        $diente15->parteInferior = $request->b271;
        $diente15->parteDerecha = $request->r271;
        $diente15->parteIzquierda = $request->l271;
        $diente15->save();

        //Diente # 28
        $diente16 = Diente::find($odontograma->idDiente16);
        $diente16->parteCentro = $request->c281;
        $diente16->parteSuperior = $request->t281;
        $diente16->parteInferior = $request->b281;
        $diente16->parteDerecha = $request->r281;
        $diente16->parteIzquierda = $request->l281;
        $diente16->save();

        //Bloque medio superior
        //Diente # 55
        $diente17 = Diente::find($odontograma->idDiente17);
        $diente17->parteCentro = $request->cleche551;
        $diente17->parteSuperior = $request->tleche551;
        $diente17->parteInferior = $request->bleche551;
        $diente17->parteDerecha = $request->rleche551;
        $diente17->parteIzquierda = $request->lleche551;
        $diente17->save();

        //Diente # 54
        $diente18 = Diente::find($odontograma->idDiente18);
        $diente18->parteCentro = $request->cleche541;
        $diente18->parteSuperior = $request->tleche541;
        $diente18->parteInferior = $request->bleche541;
        $diente18->parteDerecha = $request->rleche541;
        $diente18->parteIzquierda = $request->lleche541;
        $diente18->save();

        //Diente # 53
        $diente19 = Diente::find($odontograma->idDiente19);
        $diente19->parteCentro = $request->cleche511;
        $diente19->parteSuperior = $request->tleche511;
        $diente19->parteInferior = $request->bleche511;
        $diente19->parteDerecha = $request->rleche511;
        $diente19->parteIzquierda = $request->lechel511;
        $diente19->save();

        //Diente # 52
        $diente20 = Diente::find($odontograma->idDiente20);
        $diente20->parteCentro = $request->cleche51;
        $diente20->parteSuperior = $request->tleche521;
        $diente20->parteInferior = $request->bleche521;
        $diente20->parteDerecha = $request->rleche521;
        $diente20->parteIzquierda = $request->lleche521;
        $diente20->save();

        //Diente # 51
        $diente21 = Diente::find($odontograma->idDiente21);
        $diente21->parteCentro = $request->cleche511;
        $diente21->parteSuperior = $request->tleche511;
        $diente21->parteInferior = $request->bleche511;
        $diente21->parteDerecha = $request->rleche511;
        $diente21->parteIzquierda = $request->lleche511;
        $diente21->save();

        //Diente # 61
        $diente22 = Diente::find($odontograma->idDiente22);
        $diente22->parteCentro = $request->cleche611;
        $diente22->parteSuperior = $request->tleche611;
        $diente22->parteInferior = $request->bleche611;
        $diente22->parteDerecha = $request->rleche611;
        $diente22->parteIzquierda = $request->lleche611;
        $diente22->save();

        //Diente # 62
        $diente23 = Diente::find($odontograma->idDiente23);
        $diente23->parteCentro = $request->cleche621;
        $diente23->parteSuperior = $request->tleche621;
        $diente23->parteInferior = $request->bleche621;
        $diente23->parteDerecha = $request->rleche621;
        $diente23->parteIzquierda = $request->lleche621;
        $diente23->save();

        //Diente # 63
        $diente24 = Diente::find($odontograma->idDiente24);
        $diente24->parteCentro = $request->cleche631;
        $diente24->parteSuperior = $request->tleche631;
        $diente24->parteInferior = $request->bleche631;
        $diente24->parteDerecha = $request->rleche631;
        $diente24->parteIzquierda = $request->lleche631;
        $diente24->save();

        //Diente # 64
        $diente25 = Diente::find($odontograma->idDiente25);
        $diente25->parteCentro = $request->cleche641;
        $diente25->parteSuperior = $request->tleche641;
        $diente25->parteInferior = $request->bleche641;
        $diente25->parteDerecha = $request->rleche641;
        $diente25->parteIzquierda = $request->lleche641;
        $diente25->save();

        //Diente # 65
        $diente26 = Diente::find($odontograma->idDiente26);
        $diente26->parteCentro = $request->cleche651;
        $diente26->parteSuperior = $request->tleche651;
        $diente26->parteInferior = $request->bleche651;
        $diente26->parteDerecha = $request->rleche651;
        $diente26->parteIzquierda = $request->lleche651;
        $diente26->save();

        //Bloque medio inferior
        //Diente # 85
        $diente27 = Diente::find($odontograma->idDiente27);
        $diente27->parteCentro = $request->cleche851;
        $diente27->parteSuperior = $request->tleche851;
        $diente27->parteInferior = $request->bleche851;
        $diente27->parteDerecha = $request->rleche851;
        $diente27->parteIzquierda = $request->lleche851;
        $diente27->save();

        //Diente # 84
        $diente28 = Diente::find($odontograma->idDiente28);
        $diente28->parteCentro = $request->cleche841;
        $diente28->parteSuperior = $request->tleche841;
        $diente28->parteInferior = $request->bleche841;
        $diente28->parteDerecha = $request->rleche841;
        $diente28->parteIzquierda = $request->lleche841;
        $diente28->save();

        //Diente # 83
        $diente29 = Diente::find($odontograma->idDiente29);
        $diente29->parteCentro = $request->cleche831;
        $diente29->parteSuperior = $request->tleche831;
        $diente29->parteInferior = $request->bleche831;
        $diente29->parteDerecha = $request->rleche831;
        $diente29->parteIzquierda = $request->lleche831;
        $diente29->save();

        //Diente # 82
        $diente30 = Diente::find($odontograma->idDiente30);
        $diente30->parteCentro = $request->cleche821;
        $diente30->parteSuperior = $request->tleche821;
        $diente30->parteInferior = $request->bleche821;
        $diente30->parteDerecha = $request->rleche821;
        $diente30->parteIzquierda = $request->lleche821;
        $diente30->save();

        //Diente # 81
        $diente31 = Diente::find($odontograma->idDiente31);
        $diente31->parteCentro = $request->cleche811;
        $diente31->parteSuperior = $request->tleche811;
        $diente31->parteInferior = $request->bleche811;
        $diente31->parteDerecha = $request->rleche811;
        $diente31->parteIzquierda = $request->lleche811;
        $diente31->save();

        //Diente # 71
        $diente32 = Diente::find($odontograma->idDiente32);
        $diente32->parteCentro = $request->cleche711;
        $diente32->parteSuperior = $request->tleche711;
        $diente32->parteInferior = $request->bleche711;
        $diente32->parteDerecha = $request->rleche711;
        $diente32->parteIzquierda = $request->lleche711;
        $diente32->save();

        //Diente # 72
        $diente33 = Diente::find($odontograma->idDiente33);
        $diente33->parteCentro = $request->cleche721;
        $diente33->parteSuperior = $request->tleche721;
        $diente33->parteInferior = $request->bleche721;
        $diente33->parteDerecha = $request->rleche721;
        $diente33->parteIzquierda = $request->lleche721;
        $diente33->save();

        //Diente # 73
        $diente34 = Diente::find($odontograma->idDiente34);
        $diente34->parteCentro = $request->cleche731;
        $diente34->parteSuperior = $request->tleche731;
        $diente34->parteInferior = $request->bleche731;
        $diente34->parteDerecha = $request->rleche731;
        $diente34->parteIzquierda = $request->lleche731;
        $diente34->save();

        //Diente # 74
        $diente35 = Diente::find($odontograma->idDiente35);
        $diente35->parteCentro = $request->cleche741;
        $diente35->parteSuperior = $request->tleche741;
        $diente35->parteInferior = $request->bleche741;
        $diente35->parteDerecha = $request->rleche741;
        $diente35->parteIzquierda = $request->lleche741;
        $diente35->save();

        //Diente # 75
        $diente36 = Diente::find($odontograma->idDiente36);
        $diente36->parteCentro = $request->cleche751;
        $diente36->parteSuperior = $request->tleche751;
        $diente36->parteInferior = $request->bleche751;
        $diente36->parteDerecha = $request->rleche751;
        $diente36->parteIzquierda = $request->lleche751;
        $diente36->save();

        //Bloque inferior
        //Diente # 48
        $diente37 = Diente::find($odontograma->idDiente37);
        $diente37->parteCentro = $request->c481;
        $diente37->parteSuperior = $request->t481;
        $diente37->parteInferior = $request->b481;
        $diente37->parteDerecha = $request->r481;
        $diente37->parteIzquierda = $request->l481;
        $diente37->save();

        //Diente # 47
        $diente38 = Diente::find($odontograma->idDiente38);
        $diente38->parteCentro = $request->c471;
        $diente38->parteSuperior = $request->t471;
        $diente38->parteInferior = $request->b471;
        $diente38->parteDerecha = $request->r471;
        $diente38->parteIzquierda = $request->l471;
        $diente38->save();

        //Diente # 46
        $diente39 = Diente::find($odontograma->idDiente39);
        $diente39->parteCentro = $request->c461;
        $diente39->parteSuperior = $request->t461;
        $diente39->parteInferior = $request->b461;
        $diente39->parteDerecha = $request->r461;
        $diente39->parteIzquierda = $request->l461;
        $diente39->save();

        //Diente # 45
        $diente40 = Diente::find($odontograma->idDiente40);
        $diente40->parteCentro = $request->c451;
        $diente40->parteSuperior = $request->t451;
        $diente40->parteInferior = $request->b451;
        $diente40->parteDerecha = $request->r451;
        $diente40->parteIzquierda = $request->l451;
        $diente40->save();

        //Diente # 44
        $diente41 = Diente::find($odontograma->idDiente41);
        $diente41->parteCentro = $request->c441;
        $diente41->parteSuperior = $request->t441;
        $diente41->parteInferior = $request->b441;
        $diente41->parteDerecha = $request->r441;
        $diente41->parteIzquierda = $request->l441;
        $diente41->save();

        //Diente # 43
        $diente42 = Diente::find($odontograma->idDiente42);
        $diente42->parteCentro = $request->c431;
        $diente42->parteSuperior = $request->t431;
        $diente42->parteInferior = $request->b431;
        $diente42->parteDerecha = $request->r431;
        $diente42->parteIzquierda = $request->l431;
        $diente42->save();

        //Diente # 42
        $diente43 = Diente::find($odontograma->idDiente43);
        $diente43->parteCentro = $request->c421;
        $diente43->parteSuperior = $request->t421;
        $diente43->parteInferior = $request->b421;
        $diente43->parteDerecha = $request->r421;
        $diente43->parteIzquierda = $request->l421;
        $diente43->save();

        //Diente # 41
        $diente44 = Diente::find($odontograma->idDiente44);
        $diente44->parteCentro = $request->c411;
        $diente44->parteSuperior = $request->t411;
        $diente44->parteInferior = $request->b411;
        $diente44->parteDerecha = $request->r411;
        $diente44->parteIzquierda = $request->l411;
        $diente44->save();

        //Diente # 31
        $diente45 = Diente::find($odontograma->idDiente45);
        $diente45->parteCentro = $request->c311;
        $diente45->parteSuperior = $request->t311;
        $diente45->parteInferior = $request->b311;
        $diente45->parteDerecha = $request->r311;
        $diente45->parteIzquierda = $request->l311;
        $diente45->save();

        //Diente # 32
        $diente46 = Diente::find($odontograma->idDiente46);
        $diente46->parteCentro = $request->c321;
        $diente46->parteSuperior = $request->t321;
        $diente46->parteInferior = $request->b321;
        $diente46->parteDerecha = $request->r321;
        $diente46->parteIzquierda = $request->l321;
        $diente46->save();

        //Diente # 33
        $diente47 = Diente::find($odontograma->idDiente47);
        $diente47->parteCentro = $request->c331;
        $diente47->parteSuperior = $request->t331;
        $diente47->parteInferior = $request->b331;
        $diente47->parteDerecha = $request->r331;
        $diente47->parteIzquierda = $request->l331;
        $diente47->save();

        //Diente # 34
        $diente48 = Diente::find($odontograma->idDiente48);
        $diente48->parteCentro = $request->c341;
        $diente48->parteSuperior = $request->t341;
        $diente48->parteInferior = $request->b341;
        $diente48->parteDerecha = $request->r341;
        $diente48->parteIzquierda = $request->l341;
        $diente48->save();

        //Diente # 35
        $diente49 = Diente::find($odontograma->idDiente49);
        $diente49->parteCentro = $request->c351;
        $diente49->parteSuperior = $request->t351;
        $diente49->parteInferior = $request->b351;
        $diente49->parteDerecha = $request->r351;
        $diente49->parteIzquierda = $request->l351;
        $diente49->save();

        //Diente # 36
        $diente50 = Diente::find($odontograma->idDiente50);
        $diente50->parteCentro = $request->c361;
        $diente50->parteSuperior = $request->t361;
        $diente50->parteInferior = $request->b361;
        $diente50->parteDerecha = $request->r361;
        $diente50->parteIzquierda = $request->l361;
        $diente50->save();

        //Diente # 37
        $diente51 = Diente::find($odontograma->idDiente51);
        $diente51->parteCentro = $request->c371;
        $diente51->parteSuperior = $request->t371;
        $diente51->parteInferior = $request->b371;
        $diente51->parteDerecha = $request->r371;
        $diente51->parteIzquierda = $request->l371;
        $diente51->save();

        //Diente # 38
        $diente52 = Diente::find($odontograma->idDiente52);
        $diente52->parteCentro = $request->c381;
        $diente52->parteSuperior = $request->t381;
        $diente52->parteInferior = $request->b381;
        $diente52->parteDerecha = $request->r381;
        $diente52->parteIzquierda = $request->l381;
        $diente52->save();

        $historia->save();
        session_start();
        $_SESSION['id'] = $id;
        return redirect()->route('historia.editHistoriaClinica');
    }

    public function postdeleteHistoriaClinica(Request $request, $id){
        $historia2destroy = HistoriaClinica::find($id);
        $odontograma2destroy = Odontograma::find($historia2destroy->idOdontograma);
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
        $diente29 = Diente::find($odontograma2destroy->idDiente39);
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
}
