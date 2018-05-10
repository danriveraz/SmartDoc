<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Observaciones extends Model
{
    protected $table = 'observaciones';

    public function scopeSearch($query, $idHistoriaClinica){
    	return $query->where('idHistoriaClinica', 'like', '%' .$idHistoriaClinica. '%');
    }
}
