<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresa';

    public function scopeIdentity($query, $nit){
      return $query->where('nit', 'like', '%' .$nit. '%');
    }
}
