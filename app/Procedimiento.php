<?php
/*Realizado por Daniel Alejandro Rivera, ing*/
namespace App;

use Illuminate\Database\Eloquent\Model;

class Procedimiento extends Model
{
    protected $table = 'procedimiento';

    public function scopeAdmin($query, $idEmpresa){
      return $query->where('idEmpresa', '=', $idEmpresa);   
    }
}
