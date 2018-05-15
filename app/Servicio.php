<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicio';
    
    public function scopeEmpresa($query, $idEmpresa){
      return $query->where('idEmpresa', 'like', '%' .$idEmpresa. '%');
    }
}
