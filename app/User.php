<?php

namespace App;

//use PocketByR\RegistroLogin; // modelo de regitro de entreda y salida
//use Carbon\Carbon; // clase para obtener la Hora del registro, función Now()
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //Nombre de la tabla
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombreCompleto', 'departamento', 'ciudad', 'fechaNacimiento', 'cedula', 'sexo', 'telefono', 'email', 'esAdmin', 'esEmpleado', 'direccion', 'descripcionGeneral', 'password','salario', 'imagen'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeSearch($query, $email){
      return $query->where('email', 'like', '%' .$email. '%');
    }

    public function scopeIdentity($query, $cedula){
      return $query->where('cedula', 'like', '%' .$cedula. '%');
    }
}
