<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoriaEvolucion extends Model
{
    protected $table = 'historiaEvolucion';

    public function scopeEmpresa($query, $idEmpresa){
      return $query->where('idEmpresa', '=', $idEmpresa);
    }
    
	public function scopeHistoriaClinica($query, $idHistoriaClinica){
      return $query->where('idHistoriaClinica', '=', $idHistoriaClinica);
    }

    public function HistoriaClinica(){
      return $this->belongsTo('App\HistoriaClinica', 'idHistoriaClinica');
    }
}
