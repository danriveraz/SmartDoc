<?php

namespace App\Http\Controllers\Auth;

use App\User;
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
    protected $redirectTo = '/WelcomeAdmin';

    protected function redirectTo()
    {
        if(Auth::User()->esAdmin){
            return '/WelcomeAdmin';
        }elseif(Auth::User()->esEmpleado){
            return '/WelcomeEmpleado';
        }
    }
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
                    if($user->email == $request->email && $user->password == $request->password){
                        //Auth::login($user);
                        return redirect('consultorio/registro');
                    }
                }else{
                    if (Auth::attempt(
                        [
                            'email' => $user->email,
                            'password' => $user->password
                        ], true
                        )){
                        return redirect('usuario/perfil');
                    }else{
                        Flash::warning('Contraseña incorrecta, intente de nuevo')->important();
                        return redirect('/');
                    }
                }
            }else{
                dd("aiuda");
                Flash::warning('El nombre de usuario o contraseña son incorrectos')->important();
                return redirect('/');
            }
        }else{
            dd("aiuda");
            Flash::error('Debe ingresar los campos de nombre de usuario y contraseña')->important();
            return redirect('/');
        }
    }

    public function postRegister(Request $request){

        if($request->esPropietario == "true"){
            $user = User::Search($request->email)->get()->first();
            if(sizeOf($user) == 0){
                if($request->clavePrimaria == "123456"){
                    $user = new User();
                    $user->email = $request->email;
                    $user->password = bcrypt($request->password);
                    $user->nombreCompleto = $request->nombre;
                    $user->esPropietario = 1;
                    //$user->save();
                    return redirect('/');
                }else{
                    Flash::error('Clave de acceso PocketCompany errada');
                    return redirect('/pocketCompany');
                }
            }else{
                //dd("?");
                Flash::error('Correo en uso');
                return redirect('/pocketCompany');
            }
        }else{
            $user = User::Search($request->email)->get()->first();
            if(sizeOf($user) == 0){
                $user = new User();
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $user->nombreCompleto = $request->nombre;
                $user->imagenPerfil = 'perfil.jpg'; 
                //$user->save();
                if (Auth::attempt(
                        [
                            'email' => $user->email,
                            'password' => $request->password,
                        ], true
                        )){
                    return redirect('/consultorio/registro');
                }else{
                    flash('Registro exitoso, por favor inicie sesión')->warning()->important();
                    return redirect('/consultorio/registro');
                }
            }else{
                flash('El usuario ya se encuentra registrado')->warning()->important();
                return redirect('/consultorio/registro');
            }
        }
    }
}
