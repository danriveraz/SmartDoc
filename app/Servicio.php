<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicio';
    
    public function scopeEmpresa($query, $idEmpresa){
      return $query->where('idEmpresa', 'like', '%' .$idEmpresa. '%');
    }

    public function scopeProcedimiento($query, $idProcedimiento){
      return $query->where('idProcedimiento', 'like', '%' .$idProcedimiento. '%');
    }

    public function scopeHistoriaClinica($query, $idHistoriaClinica){
      return $query->where('idHistoriaClinica', 'like', '%' .$idHistoriaClinica. '%');
    }

    public function procedimiento(){
      return $this->belongsTo('App\procedimiento', 'idProcedimiento');
    }

    public function HistoriaClinica(){
      return $this->belongsTo('App\HistoriaClinica', 'idHistoriaClinica');
    }

    public function abonos(){
      return $this->hasMany('App\Abono', 'idServicio', 'id');
    }
}
