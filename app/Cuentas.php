<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuentas extends Model
{
   	protected $table = 'cuentas';
    
    public function scopeEmpresa($query, $idEmpresa){
      return $query->where('idEmpresa', 'like', '%' .$idEmpresa. '%');
    }
   
}
