<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WelcomeAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        /*$userActual = Auth::user();
        if($userActual != null){
            if (!$userActual->esAdmin) {
                flash('No Tiene Los Permisos Necesarios')->error()->important();
                return redirect('/WelcomeTrabajador')->send();
            }
        }*/

    }

    public function index()
    {
      
    }
}
