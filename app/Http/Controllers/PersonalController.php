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
        $personales = Personal::all();
    	$departamentos = Departamento::all();
        $ciudades = Ciudad::all();
    	$user = Auth::User();
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
}
