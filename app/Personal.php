<?php
/*Realizado por Daniel Alejandro Rivera, ing*/
namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    //
    protected $table = 'personal';

    protected $fillable = [
        'nombreCompleto', 'departamento', 'ciudad', 'fechaNacimiento', 'cedula', 'sexo', 'telefono', 'email', 'esAdmin', 'esEmpleado', 'direccion', 'descripcionGeneral', 'password','salario'];

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

    public function scopeAdmin($query, $idAdmin){
      return $query->where('idAdmin', 'like', '%' .$idAdmin. '%');   
    }
}
