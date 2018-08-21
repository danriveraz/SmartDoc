<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicio';
    
    public function scopeEmpresa($query, $idEmpresa){
      return $query->where('idEmpresa', '=', $idEmpresa);
    }

    public function scopeProcedimiento($query, $idProcedimiento){
      return $query->where('idProcedimiento', '=', $idProcedimiento);
    }

    public function scopeHistoriaClinica($query, $idHistoriaClinica){
      return $query->where('idHistoriaClinica', '=', $idHistoriaClinica);
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

    public function scopeEmpresaYMes($query, $idEmpresa, $month, $year){
      return $query->where('idEmpresa', '=', $idEmpresa)
          ->whereMonth('fecha','=', $month)
          ->whereYear('fecha','=', $year);
    } 
}
//WHERE fecha BETWEEN '20121201' AND '20121202'