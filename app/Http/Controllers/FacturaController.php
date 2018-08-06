<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\User;
use App\Empresa;

class FacturaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$user = Auth::User();
    	$empresa = Empresa::find($user->idEmpresa);
       	$flag = "factura";
       	return View('Factura.index')
       	->with('user',$user)
        ->with('empresa',$empresa)
        ->with('flag', $flag);
    }

}
