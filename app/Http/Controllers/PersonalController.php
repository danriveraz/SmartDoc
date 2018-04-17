<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Departamento;
use App\Ciudad;
use App\Personal;
use App\Http\Requests;
use Laracasts\Flash\Flash;

class PersonalController extends Controller
{
    public function modificarPersonal(){
        $user = Auth::User();
        $personales = Personal::admin($user->id)->get();
    	$departamentos = Departamento::all();
        $ciudades = Ciudad::all();
    	return View('Personal.personal')->with('user',$user)
    	->with('departamentos',$departamentos)
        ->with('ciudades', $ciudades)
        ->with('personales', $personales);
    }

     public function postmodificarPersonal(Request $request){
        $email = $request->email;
        $cedula = $request->cedula;
        if ($email == "") {
            $email = "none";
        }
        if($cedula == ""){
            $cedula = "none";
        }

    	$person = Personal::search($email)->get()->first();
        $users = User::search($email)->get()->first();
        $identity = Personal::identity($cedula)->get()->first();
        $usersIdentity = User::identity($cedula)->get()->first();

        if(sizeof($person) == null && sizeof($users) == null){
            if(sizeof($identity) == null && sizeof($usersIdentity) == null){
                $personal = new Personal();
                $admin = Auth::User();
                $personal->nombreCompleto = $request->nombre;
                $personal->email = $email;
                $personal->cedula = $cedula;
                $personal->esEmpleado = 1;
                $personal->telefono = $request->telefono;

                if(strlen($request->password) > 4 && strlen($request->password) < 18){
                    $personal->password = bcrypt($request->password);
                    $personal->direccion = $request->direccion;
                    $personal->salario = $request->salario;
                    $personal->fechaNacimiento = $request->fechaNacimiento;
                    $personal->sexo = $request->sexo;
                    $personal->departamento = $request->idDepto;
                    $personal->ciudad = $request->idCiudad;
                    $personal->descripcionGeneral = $request->descripcion;
                    $personal->idAdmin = $admin->id;
                    $personal->save();
                    flash('Registro exitoso')->success()->important();
                    return redirect('/Personal');
                }else{
                    flash('La contraseña debe tener más de 4 caracteres y
                     menos de 18, no usar caracteres especiales')->error()->important();
                    return redirect('/Personal');
                }

            }else{
                flash('Cedula en uso')->error()->important();
                return redirect('/Personal');
            }
        }else{
            flash('Correo en uso')->error()->important();
            return redirect('/Personal');
        }
    }

    public function postupdateProfile(Request $request, $id){
        //Se definen los datos dinamicos del usuario
        $modificableCorreo = 0;
        $modificableCedula = 0;
        $nombre = "nombre".$id;
        $correo = "email".$id;
        $cedula = "cedula".$id;
        $telefono =  "telefono".$id;
        $direccion = "direccion".$id;
        $salario = "salario".$id;
        $fechaNacimiento = "fechaNacimiento".$id;
        $sexo = "sexo".$id;
        $descripcion = "descripcion".$id;

        $email = $request->$correo;

        $user2update = Personal::find($id);

        $person = Personal::search($email)->get()->first();
        $user = User::search($email)->get()->first();
        $usersIdentity = User::identity($request->$cedula)->get()->first();
        $personIdentity = Personal::identity($request->$cedula)->get()->first();

        if(sizeof($person) == 1){
            if($user2update->email == $email){
                $modificableCorreo = 1;
            }
        }else if(sizeof($user) == 1){
            $modificableCorreo = 0;
        }else if(sizeof($person == null)){
            $modificableCorreo = 1;
        }

        if(sizeof($personIdentity) == 1){
            if($user2update->cedula == $request->$cedula){
                $modificableCedula = 1;
            }
        }else if(sizeof($usersIdentity) == 1){
            $modificableCedula = 0;
        }else if(sizeof($personIdentity) == null){
            $modificableCedula = 1;
        }

        if($modificableCorreo){
            if($modificableCedula){
                $user2update->nombreCompleto = $request->$nombre;
                $user2update->email = $request->$correo;
                $user2update->cedula = $request->$cedula;
                $user2update->telefono = $request->$telefono;
                $user2update->direccion = $request->$direccion;
                $user2update->salario = $request->$salario;
                $user2update->fechaNacimiento = $request->$fechaNacimiento;
                $user2update->sexo = $request->$sexo;
                $user2update->descripcionGeneral = $request->$descripcion;
                $user2update->save();
                flash('Modificación exitosa')->success()->important();
                return redirect('/Personal');
            }else{
                flash('Cedula en uso')->error()->important();
                return redirect('/Personal');
            }
        }else{
            flash('Correo en uso')->error()->important();
            return redirect('/Personal');
        }
    }

    public function postdeleteProfile(Request $request, $id){
        $user2destroy = Personal::find($id);
        $user2destroy->delete();
        flash('Eliminación exitosa')->success()->important();
        return redirect('/Personal');
    }
}
