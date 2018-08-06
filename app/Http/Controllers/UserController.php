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
        return View('Users.perfil')->with('user',$user)
        ->with('empresa',$empresa)
        ->with('departamentos',$departamentos)
        ->with('ciudades', $ciudades)
        ->with('flag',$flag);
    }

    public function imagen(Request $request){
        /*$image = $request->upload_image;
        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name= time().'.png';
        $path = public_path('/images/admin/'.$image_name);
        file_put_contents($path, $image);*/
        return response()->json(['status'=>'success']);
    }

    public function postmodificarPerfil(Request $request){
        $user = Auth::User();
        $empresa = Empresa::find($user->idEmpresa);

        $empresa->nombreEstablecimiento = $request->nombreEstablecimiento;
        $empresa->eslogan = $request->eslogan;        
        $empresa->nit = $request->nit;
        $empresa->telefono = $request->telefono;
        $empresa->celular = $request->celular;
        $empresa->direccion = $request->direccion;
        $user->departamento = $request->idDepto;
        $user->ciudad = $request->idCiudad;

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
