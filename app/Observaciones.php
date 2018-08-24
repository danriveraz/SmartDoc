<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Observaciones extends Model
{
    protected $table = 'observaciones';

    public function scopeSearchHistoria($query, $idHistoriaClinica){
    	return $query->where('idHistoriaClinica', '=', $idHistoriaClinica);
    }
}
