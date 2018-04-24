<?php
/*Realizado por Daniel Alejandro Rivera, ing*/
namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoriaClinica extends Model
{
    protected $table = 'historiaClinica';

    public function scopeAdmin($query, $idAdmin){
      return $query->where('idAdmin', 'like', '%' .$idAdmin. '%');   
    }
}
