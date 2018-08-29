<?php
/*Realizado por Daniel Alejandro Rivera, ing*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Empresa;
use App\Agenda;
use App\Departamento;
use App\Ciudad;
use App\Http\Requests;
use Laracasts\Flash\Flash;

class PersonalController extends Controller
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
    
    public function modificarPersonal(){
        $user = Auth::User();
        $personales = User::Empresa($user->idEmpresa)->get();
        $empresa = Empresa::find($user->idEmpresa);
    	$departamentos = Departamento::all();
        $ciudades = Ciudad::all();
        $flag = "personal";
    	return View('Personal.personal')->with('user',$user)
        ->with('empresa',$empresa)
    	->with('departamentos',$departamentos)
        ->with('ciudades', $ciudades)
        ->with('personales', $personales)
        ->with('flag', $flag);
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

        $users = User::search($email)->get()->first();
        $usersIdentity = User::identity($cedula)->get()->first();

        if(sizeof($users) == null){
            if(sizeof($usersIdentity) == null){
                $personal = new User();
                $admin = Auth::User();
                $personal->nombreCompleto = $request->nombre;
                $personal->email = $email;
                $personal->cedula = $cedula;
                $personal->esEmpleado = 1;
                $personal->telefono = $request->telefono;
                $personal->especialidad = $request->especialidad;

                $path = public_path() . '/images/admin/';
                $file = $request->file('imagen');
                if($file!=null){// verifica que se haya subido una imagen nueva
                    //obtenemos el nombre del archivo
                    $perfilNombre = 'perfil' . time() . '.' . $file->getClientOriginalExtension();
                    //indicamos que queremos guardar un nuevo archivo en el disco local
                    $file->move($path, $perfilNombre);
                    if($personal->imagenPerfil != "perfil.jpg"){
                        $imagenActual = $path . $personal->imagenPerfil;
                    }
                    $personal->imagenPerfil = $perfilNombre;
                }else{
                    $personal->imagenPerfil = "perfil.jpg";
                }

                if(strlen($request->password) > 4 && strlen($request->password) < 18){
                    $personal->password = bcrypt($request->password);
                    $personal->direccion = $request->direccion;
                    $personal->fechaNacimiento = $request->fechaNacimiento;
                    $personal->sexo = $request->sexo;
                    $personal->departamento = $request->idDepto;
                    $personal->ciudad = $request->idCiudad;
                    $personal->idEmpresa = $admin->idEmpresa;
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
        $fechaNacimiento = "fechaNacimiento".$id;
        $sexo = "sexo".$id;
        $especialidad = "especialidad".$id;

        $email = $request->$correo;

        $user2update = User::find($id);

        $user = User::search($email)->get()->first();
        $usersIdentity = User::identity($request->$cedula)->get()->first();

        if(sizeof($user) == 1){
            if($user2update->email == $email){
                $modificableCorreo = 1;
            } 
        }
            
        if(sizeof($usersIdentity) == 1){
            if($user2update->cedula == $request->$cedula){
                $modificableCedula = 1;
            }
        }

        if($modificableCorreo){
            if($modificableCedula){
                $user2update->nombreCompleto = $request->$nombre;
                $user2update->email = $request->$correo;
                $user2update->cedula = $request->$cedula;
                $user2update->telefono = $request->$telefono;
                $user2update->direccion = $request->$direccion;
                $user2update->fechaNacimiento = $request->$fechaNacimiento;
                $user2update->sexo = $request->$sexo;
                $user2update->especialidad = $request->$especialidad;
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
        $user2destroy = User::find($id);
        $user2destroy->eliminado = 1;
        $user2destroy->save();
        flash('Eliminación exitosa')->success()->important();
        return redirect('/Personal');
    }
}
