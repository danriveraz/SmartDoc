<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\User;

class WelcomePropietarioController extends Controller
{
    public function create(){
        return View('Propietario.registro');
    }

    public function verificarUser(){
    if(Auth::check()){
      return response()->json(['success' => true,'message' => 'Está todavía logueado']);
    }else{
      return response()->json(['success' => false,'message' => 'Ya no está logueado']);
    }
  }
}
