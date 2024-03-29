<?php
/*Realizado por Daniel Alejandro Rivera, ing*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Mail;
use Validator;
use App\User;
use App\Http\Requests;

class HomeController extends Controller
{

    public function __construct(){
        $this->middleware('guest');

    }

    public function resetPassword(){
        return View('Home.password');
    }

    public function index(){
        return View('Home.index');
    }

    public function preguntas(){
        return View('Home.preguntas');
    }

    public function pocketclub(){
        return View('Home.pocketClub');
    }

    public function registroPropietario(){
        return View('Users.registroPropietario');
    }
    
    public function postresetPassword(Request $request){
    	$newPassword = time();
    	$user = User::Search($request->email)->first();
    	$user->password = bcrypt($newPassword);
    	$user->save();

    	$data = $newPassword;

    	Mail::send('Emails.resetPassword', ['data' => $data, 'user' => $user], function($mail) use($data,$user){
            $mail->to($user->email)->subject('Olvidé mi contraseña');
        });

    	return redirect('/')->with('message', 'Hemos envíado un nueva contraseña a tu correo');
    }
}
