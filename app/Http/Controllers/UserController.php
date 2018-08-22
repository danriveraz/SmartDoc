<?php
/*Realizado por Daniel Alejandro Rivera, ing*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Empresa;
use App\Departamento;
use App\Ciudad;
use App\Http\Requests;
use Laracasts\Flash\Flash;
use App\HistorialResoluciones;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $userActual = Auth::user();
    }
    
    public function index(){
        return View('');
    }

    public function registro(){
        return View('Users.registro');
    }

    public function modificarPerfil(){
        $departamentos = Departamento::all();
        $ciudades = Ciudad::all();
    	$user = Auth::User();
        $empresa = Empresa::find($user->idEmpresa);
        $flag = "none";

        if($user->esAdmin){
            return View('Users.perfil')
            ->with('user',$user)
            ->with('empresa',$empresa)
            ->with('departamentos',$departamentos)
            ->with('ciudades', $ciudades)
            ->with('flag',$flag);
        }else if($user->esEmpleado){
            return View('Users.perfilTrabajador')
            ->with('user',$user)
            ->with('departamentos',$departamentos)
            ->with('ciudades', $ciudades)
            ->with('flag',$flag);
        }
    }

    public function imagen(Request $request){
        $user = Auth::User();
        if($user->esAdmin){
            $empresa = Empresa::find($user->idEmpresa);

            $image = $_POST["image"];
            $image_array_1 = explode(";", $image);
            $image_array_2 = explode(",", $image_array_1[1]);
            $image = base64_decode($image_array_2[1]);
            $imageName= 'perfil' .time().'.png';
            $path = public_path('/images/admin/'.$imageName);

            file_put_contents($path, $image);

            if($empresa->imagen != "perfil.jpg"){
                $imagenActual = 'images/admin/'.$empresa->imagen;
                unlink($imagenActual);
            }
            
            $empresa->imagen = $imageName;
            $empresa->save();

            return response()->json(['status'=>'success']);
        }else if($user->esEmpleado){
            $image = $_POST["image"];
            $image_array_1 = explode(";", $image);
            $image_array_2 = explode(",", $image_array_1[1]);
            $image = base64_decode($image_array_2[1]);
            $imageName= 'perfil' .time().'.png';
            $path = public_path('/images/admin/'.$imageName);

            file_put_contents($path, $image);

            if($user->imagenPerfil != "perfil.jpg"){
                $imagenActual = 'images/admin/'.$user->imagenPerfil;
                unlink($imagenActual);
            }
            
            $user->imagenPerfil = $imageName;
            $user->save();

            return response()->json(['status'=>'success']);
        }
    }

    public function postmodificarPerfil(Request $request){
        $user = Auth::User();
        if($user->esAdmin){
            $empresa = Empresa::find($user->idEmpresa);
            $empresa->nombreEstablecimiento = $request->nombreEstablecimiento;
            $empresa->eslogan = $request->eslogan;        
            $empresa->nit = $request->nit;
            $empresa->telefono = $request->telefono;
            $empresa->celular = $request->celular;
            $empresa->direccion = $request->direccion;
            $empresa->tipoRegimen = $request->tipoRegimen;
            if($empresa->prefijo != $request->prefijo or $empresa->nResolucionFacturacion != $request->resolucion
                or $empresa->fechaResolucion != $request->fechaResolucion or $empresa->nInicioFactura != $request->nInicio
                or $empresa->nFinFactura != $request->nFinal){
                $resolucion = new HistorialResoluciones();
                $resolucion->idEmpresa = $empresa->id;
                $resolucion->prefijo = $request->prefijo;
                $resolucion->nResolucionFacturacion = $request->resolucion;
                $resolucion->fechaResolucion = $request->fechaResolucion;
                $resolucion->nInicioFactura = $request->nInicio;
                $resolucion->nFinFactura = $request->nFinal;
                $resolucion->save();
                $empresa->contadorFacturacion = $request->nInicio-1;

            }
            $empresa->prefijo = $request->prefijo;
            $empresa->nResolucionFacturacion = $request->resolucion;
            $empresa->fechaResolucion = $request->fechaResolucion;
            $empresa->nInicioFactura = $request->nInicio;
            $empresa->nFinFactura = $request->nFinal;

            if($request->tipoRegimen == "simplificado"){
                $empresa->nInicioFactura = $request->NumSimpli;
            }
            $empresa->impuesto1 = $request->impuesto1;
            $empresa->impuesto2 = $request->impuesto2;
            $empresa->valorImpuesto1 = $request->valori1;
            $empresa->valorImpuesto2 = $request->valori2;
            $empresa->departamento = $request->idDepto;
            $empresa->ciudad = $request->idCiudad;

            //For the profile image
            $path = public_path() . '/images/admin/';
            $file = $request->file('imagen');
            if($file!=null){// verifica que se haya subido una imagen nueva
              //obtenemos el nombre del archivo
              $perfilNombre = 'perfil' . time() . '.' . $file->getClientOriginalExtension();
              //indicamos que queremos guardar un nuevo archivo en el disco local
              $file->move($path, $perfilNombre);
              if($empresa->imagen != "perfil.jpg"){
                $imagenActual = $path . $empresa->imagen;
                unlink($imagenActual);
              }
              $empresa->imagen = $perfilNombre;
            }

            $empresa->save();
            $user->save();
            flash::success('Perfil modificado exitosamente')->important();
            return redirect('/Perfil');
        }else if($user->esEmpleado){
            $user->nombreCompleto = $request->nombreCompleto;
            $user->direccion = $request->direccion;
            $user->telefono = $request->telefono;
            $user->sexo = $request->sexo;
            $user->fechaNacimiento = $request->fechaNacimiento;
            $user->cedula = $request->cedula;
            $user->departamento = $request->idDepto;
            $user->ciudad = $request->idCiudad;
            $user->especialidad = $request->especialidad;
            $user->save();
            flash::success('Perfil modificado exitosamente')->important();
            return redirect('/Perfil');
        }
    }

    public function modificarConfiguracion(){
        $user = Auth::User();
        $empresa = Empresa::find($user->idEmpresa);
        $flag = "none";
        if($user->esAdmin){
            return View('Users.configuracion')
            ->with('empresa', $empresa)
            ->with('user',$user)
            ->with('flag',$flag);
        }else{
            return View('Users.configuracionTrabajador')
            ->with('empresa', $empresa)
            ->with('user',$user)
            ->with('flag',$flag);
        }
    }

    public function postmodificarConfiguracion(Request $request){
        $correoActual = Auth::User()->email;
        $correo = $request->email;
        if($correo == ""){
            $correo = "none";
        }else if($correo == $correoActual){
            $correo = "correo valido";
        }
        $user = User::search($correo)->get()->first();   
        if(sizeof($user) == null){
            $newUser = Auth::User();
            if($request->email != null){
                $newUser->email = $request->email;
            }
            if($request->password != null){
                if(strlen($request->password) < 4 || strlen($request->password) > 18){
                    flash::error('La contraseña debe tener minimo 4 caracteres y no exceder los 18')->important();
                    return redirect('/Configuracion'); 
                }else{
                    $newUser->password = bcrypt($request->password);   
                }
            }
            $newUser->save();
            flash::success('Perfil modificado exitosamente')->important();
            return redirect('/Configuracion'); 
        }else{
            flash::error('Correo en uso')->important();
            return redirect('/Configuracion');          
        }
    }

    public function verificarUser(){
    if(Auth::check()){
      return response()->json(['success' => true,'message' => 'Está todavía logueado']);
    }else{
      return response()->json(['success' => false,'message' => 'Ya no está logueado']);
    }
  }
}
