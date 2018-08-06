<?php
/*Realizado por Daniel Alejandro Rivera, ing*/
namespace App;

use App\servicio;
use Illuminate\Database\Eloquent\Model;

class HistoriaClinica extends Model
{
    protected $table = 'historiaClinica';

    public function scopeAdmin($query, $idEmpresa){
      return $query->where('idEmpresa', 'like', '%' .$idEmpresa. '%');   
    }

    public function scopeIdentity($query, $documento){
    	return $query->where('documento', 'like', '%' .$documento. '%');  	
    }

    public function scopeEmpresaAndId($query, $idEmpresa, $id){
      return $query->where('idEmpresa', 'like', '%' .$idEmpresa. '%')
      				->where('id' , 'like', '%'.$id.'%'); 
    }

    public function servicios(){
      return $this->hasMany('App\servicio', 'idHistoriaClinica', 'id');
    }

}
