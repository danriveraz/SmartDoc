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
    public function resetPassword(){
        return View('Home.password');
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

    	return redirect('/')->with('message', 'Hemos envíado un nuava contraseña a tu correo');
    }
}
