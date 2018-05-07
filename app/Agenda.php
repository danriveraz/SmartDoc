<?php
/*Realizado por Daniel Alejandro Rivera, ing*/
namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agenda';

    public function scopeAdmin($query, $idEmpresa){
      return $query->where('idEmpresa', 'like', '%' .$idEmpresa. '%');   
    }

    public function scopeTrabajador($query, $idUsuario){
      return $query->where('idUsuario', 'like', '%' .$idUsuario. '%');   
    }
}
