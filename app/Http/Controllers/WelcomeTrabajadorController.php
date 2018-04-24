<?php
/*Realizado por Daniel Alejandro Rivera, ing*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class WelcomeTrabajadorController extends Controller
{
    
    public function __construct(){
		$this->middleware('auth');
	}  

    public function index()
    {
        //return View('WelcomeTrabajador/welcome');
    }
}
