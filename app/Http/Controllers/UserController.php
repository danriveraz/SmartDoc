<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Departamento;
use App\Ciudad;
use App\Http\Requests;
use Laracasts\Flash\Flash;

class UserController extends Controller
{
    public function index(){
        return View('');
    }

    public function registro(){
        return View('Users.registro');
    }

    public function registroPropietario(){
        return View('Users.registroPropietario');
    }

    public function modificarPerfil(){
        $departamentos = Departamento::all();
        $ciudades = Ciudad::all();
    	$user = Auth::User();
        return View('Users.perfil')->with('user',$user)
        ->with('departamentos',$departamentos)
        ->with('ciudades', $ciudades);
    }

    public function postmodificarPerfil(Request $request){
        $user = Auth::User();
        $user->nombreCompleto = $request->nombre;
        $user->cedula = $request->cedula;
        $user->telefono = $request->telefono;
        $user->direccion = $request->direccion;
        $user->salario = $request->salario;
        $user->fechaNacimiento = $request->fechaNacimiento;
        $user->sexo = $request->sexo;
        $user->departamento = $request->idDepto;
        $user->ciudad = $request->idCiudad;
        $user->descripcionGeneral = $request->descripcion;

        //For the profile image
        $path = public_path() . '/images/admin/';
        $file = $request->file('imagen');
        if($file!=null){// verifica que se haya subido una imagen nueva
          //obtenemos el nombre del archivo
          $perfilNombre = 'perfil' . time() . '.' . $file->getClientOriginalExtension();
          //indicamos que queremos guardar un nuevo archivo en el disco local
          $file->move($path, $perfilNombre);
          if($user->imagen != "perfil.png"){
            $imagenActual = $path . $user->imagen;
            unlink($imagenActual);
          }
          $user->imagen = $perfilNombre;
        }

        $user->save();
        flash::success('Perfil modificado exitosamente')->important();
        return redirect('/Perfil');
    }

    public function modificarConfiguracion(){
        $user = Auth::User();
        return View('Users.configuracion')->with('user',$user);
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
}
