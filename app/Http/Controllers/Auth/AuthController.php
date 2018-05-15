<?php
/*Realizado por Daniel Alejandro Rivera, ing*/
namespace App\Http\Controllers\Auth;

use App\User;
use App\Empresa;
use App\Cuentas;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;
use Illuminate\Http\Request;
use Session;
use Input;
use Redirect;
use Socialite;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    protected function redirectTo()
    {   
        if(Auth::User()->esPropietario){
            return '/Registro';
        }else if(Auth::User()->esAdmin){
            return '/WelcomeAdmin';
        }else if(Auth::User()->esEmpleado){
            return '/WelcomeTrabajador';
        }else{
            return '/';
        }
    }
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function postLogin(Request $request){
        if($request->email != null && $request->password != null){

            $user = User::Search($request->email)->get()->first();
            if(sizeOf($user) != 0){
                if($user->esPropietario == 1){
                    if (Auth::attempt(
                        [
                            'email' => $request->email,
                            'password' => $request->password
                        ], $request->has('remember')
                        )){
                        return redirect('/Registro');
                    }else{
                        return redirect('/')->with('message', 'Error al iniciar sesión');
                    }
                }else if($user->esAdmin == 1){
                    if (Auth::attempt(
                        [
                            'email' => $request->email,
                            'password' => $request->password
                        ], $request->has('remember')
                        )){
                        return redirect('/WelcomeAdmin');
                    }else{
                        return redirect('/')->with('message', 'Error al iniciar sesión');
                    }
                }else{
                    if (Auth::attempt(
                        [
                            'email' => $request->email,
                            'password' => $request->password
                        ], $request->has('remember')
                        )){
                        return redirect('/WelcomeTrabajador');
                    }else{
                        return redirect('/')->with('message', 'Error al iniciar sesión');
                    }
                }
            }else{
               return redirect('/')->with('message', 'Nombre de usuario o contraseña incorrecto');
            }
        }else{
            return redirect('/')->with('message', 'Por favor ingresar correo y contraseña');
        }
    }

    public function postRegister(Request $request){
        if($request->esPropietario == "true"){
            $email = $request->email;
            $cedula = $request->cedula;
            if($email == ""){
                $email = "none";
            }
            if($cedula == ""){
                $cedula = "none";
            }
            $user = User::Search($email)->get()->first();
            $identity = User::identity($cedula)->get()->first();
            if(sizeOf($user) == 0 && sizeof($identity) == 0){
                if($request->clavePrimaria == "123456"){
                    if($email == "none" || $request->nombre == "" || $cedula == "none" ){
                        dd($email, $request->nombre, $nit);
                        Flash::error('Por favor llenar todos los campos');
                        return redirect('/PocketCompany');
                    }else{
                        $empresa = new Empresa();
                        $empresa->nombreEstablecimiento = "PocketCompany";
                        $empresa->nit = "123";
                        $empresa->save();

                        $user = new User();
                        $user->email = $request->email;
                        $user->password = bcrypt($request->password);
                        $user->nombreCompleto = $request->nombre;
                        $user->cedula = $request->cedula;
                        $user->esPropietario = 1;
                        $user->idEmpresa = $empresa->id;
                        $user->save();
                        return redirect('/')->with('message', 'Por favor iniciar sesión.');
                    }
                }else{
                    Flash::error('Clave de acceso PocketCompany errada');
                    return redirect('/PocketCompany');
                }
            }else{
                if(sizeof($user) > 0){
                    Flash::error('Correo en uso');
                    return redirect('/PocketCompany');
                }else{
                    Flash::error('Cedula en uso');
                    return redirect('/PocketCompany');
                }
            }
        }else{
            $email = $request->email;
            $nit = $request->nit;
            $cedula = $request->cedula;
            if($email == ""){
                $email = "none";
            }
            if($nit == ""){
                $nit = "none";
            }
            if($cedula == ""){
                $cedula = "none";
            }
            $user = User::Search($email)->get()->first();
            $identity = User::identity($cedula)->get()->first();
            $empresaIdentity = Empresa::identity($nit)->get()->first();
            $userActual = Auth::User();
            if($userActual->esPropietario){
                if(sizeOf($user) == 0 && sizeof($identity) == 0 && sizeof($empresaIdentity) == 0){
                    $empresa = new Empresa();
                    $empresa->nombreEstablecimiento = $request->nombre;
                    $empresa->nit = $nit;
                    $empresa->telefono = $request->telefono;
                    $empresa->celular = $request->celular;
                    $empresa->direccion = $request->direccion;
                    $empresa->imagen = 'perfil.jpg';
                    $empresa->eslogan = "Ahora todo es más fácil con SmartDoc";
                    $empresa->save();

                    $user = new User();
                    $user->email = $request->email;
                    $user->password = bcrypt($request->password);
                    $user->nombreCompleto = "Administrador";
                    $user->cedula = $cedula;
                    $user->esAdmin = 1;
                    $user->idEmpresa = $empresa->id;
                    $user->save();

                    $cuentas = new Cuentas();
                    $cuentas->idEmpresa = $empresa->id;
                    $cuentas->save();

                    Flash::success('Registro exitoso');
                    return redirect('/Registro');
                }else{
                    if(sizeof($user) > 0){
                        flash('Correo en uso')->error()->important();
                        return redirect('/Registro');
                    }else if(sizeof($empresaIdentity) > 0){
                        flash('Nit en uso')->error()->important();
                        return redirect('/Registro');
                    }else{
                        flash('Cedula en uso')->error()->important();
                        return redirect('/Registro');
                    }
                }
            }else{

            }
        }
    }
}
