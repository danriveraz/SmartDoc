<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procedimiento extends Model
{
    protected $table = 'procedimiento';

    public function scopeAdmin($query, $idAdmin){
      return $query->where('idAdmin', 'like', '%' .$idAdmin. '%');   
    }
}
