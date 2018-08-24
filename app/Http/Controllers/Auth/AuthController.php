<?php
/*Realizado por Daniel Alejandro Rivera, ing*/
namespace App\Http\Controllers\Auth;

use App\User;
use App\Empresa;
use App\Cuentas;
use App\Departamento;
use App\Ciudad;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Validator;
use Auth;
use Mail;
use Session;
use Input;
use Redirect;
use Socialite;

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
        $this->middleware($this->guestMiddleware(), ['except' => ['getLogout']]);
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

    public function getLogin(){
        return View('Auth.Login');
    }

    public function getRegister(){
        $departamentos = Departamento::all();
        $ciudades = Ciudad::all();
        return View('Auth.Register')
                ->with('departamentos',$departamentos)
                ->with('ciudades',$ciudades);
    }

    public function postLogin(Request $request){
        if($request->email != null && $request->password != null){

            $user = User::Search($request->email)->get()->first();
            if(sizeOf($user) != 0){
                if($user->esPropietario == 1){
                    /*if (Auth::attempt(
                        [
                            'email' => $request->email,
                            'password' => $request->password
                        ], $request->has('remember')
                        )){
                        return redirect('/Registro');
                    }else{
                        return redirect('/')->with('message', 'Error al iniciar sesión');
                    }*/
                }else if($user->esAdmin == 1){
                    if (Auth::attempt(
                        [
                            'email' => $request->email,
                            'password' => $request->password
                        ], $request->has('remember')
                        )){
                        $cuentas = Cuentas::Empresa($user->idEmpresa)->get();

                        if(sizeof($cuentas) == 1){
                            if($cuentas[0]->titulo == ""){
                                $cuentas[0]->titulo = "Ventas";
                                $cuentas[0]->save();
                            }
                        }

                        if(sizeof($cuentas) == 1){
                            $cuentas2 = new Cuentas();
                            $cuentas2->idEmpresa = $user->idEmpresa;
                            $cuentas2->titulo = "Costos";
                            $cuentas2->fechaActual = Carbon::now()->subHour(5);
                            $cuentas2->save();

                            $cuentas3 = new Cuentas();
                            $cuentas3->idEmpresa = $user->idEmpresa;
                            $cuentas3->titulo = "Utilidad";
                            $cuentas3->fechaActual = Carbon::now()->subHour(5);
                            $cuentas3->save();
                        }

                        for ($i=0; $i < sizeof($cuentas) ; $i++) { 

                            $fecha = Carbon::parse($cuentas[$i]->fechaActual);
                            $fechaActual = Carbon::now()->subHour(5);

                            if($fecha->year != $fechaActual->year){

                                $cuentas[$i]->anterior = 0;
                                $cuentas[$i]->eneroPasado = $cuentas[$i]->enero;
                                $cuentas[$i]->enero = 0;
                                $cuentas[$i]->anterior = $cuentas[$i]->anterior + $cuentas[$i]->eneroPasado;
                                $cuentas[$i]->febreroPasado = $cuentas[$i]->febrero;
                                $cuentas[$i]->febrero = 0;
                                $cuentas[$i]->anterior = $cuentas[$i]->anterior + $cuentas[$i]->febreroPasado;
                                $cuentas[$i]->marzoPasado = $cuentas[$i]->marzo;
                                $cuentas[$i]->marzo = 0;
                                $cuentas[$i]->anterior = $cuentas[$i]->anterior + $cuentas[$i]->marzoPasado;
                                $cuentas[$i]->abrilPasado = $cuentas[$i]->abril;
                                $cuentas[$i]->abril = 0;
                                $cuentas[$i]->anterior = $cuentas[$i]->anterior + $cuentas[$i]->abrilPasado;
                                $cuentas[$i]->mayoPasado = $cuentas[$i]->mayo;
                                $cuentas[$i]->mayo = 0;
                                $cuentas[$i]->anterior = $cuentas[$i]->anterior + $cuentas[$i]->mayoPasado;
                                $cuentas[$i]->junioPasado = $cuentas[$i]->junio;
                                $cuentas[$i]->junio = 0;
                                $cuentas[$i]->anterior = $cuentas[$i]->anterior + $cuentas[$i]->junioPasado;
                                $cuentas[$i]->julioPasado = $cuentas[$i]->julio;
                                $cuentas[$i]->julio = 0;
                                $cuentas[$i]->anterior = $cuentas[$i]->anterior + $cuentas[$i]->julioPasado;
                                $cuentas[$i]->agostoPasado = $cuentas[$i]->agosto;
                                $cuentas[$i]->agosto = 0;
                                $cuentas[$i]->anterior = $cuentas[$i]->anterior + $cuentas[$i]->agostoPasado;
                                $cuentas[$i]->septiembrePasado = $cuentas[$i]->septiembre;
                                $cuentas[$i]->septiembre = 0;
                                $cuentas[$i]->anterior = $cuentas[$i]->anterior + $cuentas[$i]->septiembrePasado;
                                $cuentas[$i]->octubrePasado = $cuentas[$i]->octubre;
                                $cuentas[$i]->octubre = 0;
                                $cuentas[$i]->anterior = $cuentas[$i]->anterior + $cuentas[$i]->octubrePasado;
                                $cuentas[$i]->noviembrePasado = $cuentas[$i]->noviembre;
                                $cuentas[$i]->noviembre = 0;
                                $cuentas[$i]->anterior = $cuentas[$i]->anterior + $cuentas[$i]->noviembrePasado;
                                $cuentas[$i]->diciembrePasado = $cuentas[$i]->diciembre;
                                $cuentas[$i]->diciembre = 0;
                                $cuentas[$i]->anterior = $cuentas[$i]->anterior + $cuentas[$i]->diciembrePasado;
                                $cuentas[$i]->actual = 0;
                                $cuentas[$i]->fechaActual = $fechaActual;
                                $cuentas[$i]->save();

                            }
                        }
                        return redirect()->intended($this->redirectPath());
                    }else{
                        return redirect('/login')->with('message', 'Error al iniciar sesión');
                    }
                }else{
                    if (Auth::attempt(
                        [
                            'email' => $request->email,
                            'password' => $request->password
                        ], $request->has('remember')
                        )){
                        return redirect()->intended($this->redirectPath());
                    }else{
                        return redirect('/')->with('message', 'Error al iniciar sesión');
                    }
                }
            }else{
               return redirect('/login')->with('message', 'Nombre de usuario o contraseña incorrecto');
            }
        }else{
            return redirect('/login')->with('message', 'Por favor ingresar correo y contraseña');
        }
    }

    public function postRegister(Request $request){
        $email = $request->email;
        if($email == ""){
            $email = "none";
        }
        $departamentos = Departamento::All();
        $ciudades = Ciudad::all();
        $user = User::Search($email)->get()->first();
        if(sizeOf($user) == 0){

            $empresa = new Empresa();
            $empresa->nombreEstablecimiento = $request->nombreEstablecimiento;
            $empresa->telefono = $request->telefono;
            $empresa->direccion = $request->direccion;
            $empresa->imagen = 'perfil.jpg';
            $empresa->eslogan = "Ahora todo es más fácil con SmartDoc";
            $empresa->departamento = $departamentos[($request->idDepto) -1]->nombre;
            $empresa->ciudad = $ciudades[($request->idCiudad) -1]->nombre;
            $empresa->save();

            $user = new User();
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->nombreCompleto = "Administrador";
            $user->esAdmin = 1;
            $user->imagenPerfil = 'perfil.jpg';
            $user->idEmpresa = $empresa->id;
            $user->confirmoEmail = 0;
            $user->remember_token = str_random(100);
            $user->confirm_token = str_random(100);
            $user->save();

            $empresa->usuario_id = $user->id;
            $empresa->save();

            $cuentas1 = new Cuentas();
            $cuentas1->idEmpresa = $empresa->id;
            $cuentas1->titulo = "Ventas";
            $cuentas1->fechaActual = Carbon::now()->subHour(5);
            $cuentas1->save();

            $cuentas2 = new Cuentas();
            $cuentas2->idEmpresa = $empresa->id;
            $cuentas2->titulo = "Costos";
            $cuentas2->fechaActual = Carbon::now()->subHour(5);
            $cuentas2->save();

            $cuentas3 = new Cuentas();
            $cuentas3->idEmpresa = $empresa->id;
            $cuentas3->titulo = "Utilidad";
            $cuentas3->fechaActual = Carbon::now()->subHour(5);
            $cuentas3->save();

            $data = $user;
            Mail::send('Emails.confirmacionRegistro', ['data' => $data], function($mail) use($data){
                $mail->to($data->email)->subject('Confirma tu cuenta de SmartDoc');
            });

            return redirect("/login")
            ->with("message", "Hemos enviado un enlace de confirmación a su cuenta de correo electrónico");
        }else{
            if(sizeof($user) > 0){
                flash('Correo en uso')->error()->important();
                return redirect('/register');
            }
        }
    }

    public function confirmRegister($email, $confirm_token){
        $user = new User;
        $the_user = $user->select()->where('email', '=', $email)
        ->where('confirm_token', '=', $confirm_token)->get();
        if (count($the_user) > 0){
           $confirmoEmail = 1;
           $confirm_token = str_random(100);
           $user->where('email', '=', $email)
           ->update(['confirmoEmail' => $confirmoEmail, 'confirm_token' => $confirm_token]);

           /*return redirect('Auth/login')
           ->with('message', 'Bienvenido ' . $the_user[0]['nombrePersona'] . ' ya puede iniciar sesión');*/
           //dd($the_user);
            Auth::login($the_user[0], true);
            return redirect()->intended($this->redirectPath());
        }else{
           return redirect('');
        }
    }
}
