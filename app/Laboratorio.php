<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{

	protected $table = 'laboratorio';
    
    public function scopeEmpresa($query, $idEmpresa){
      return $query->where('idEmpresa', 'like', '%' .$idEmpresa. '%');
    }

    public function scopeHistoriaClinica($query, $idHistoriaClinica){
      return $query->where('idHistoriaClinica', 'like', '%' .$idHistoriaClinica. '%');
    }
}
