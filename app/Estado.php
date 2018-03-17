<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
   public function clientes()
    {
    	return $this->hasMany('App\Cliente','estado_id');
    }

    public function transportadoras()
    {
    	return $this->hasMany('App\Transportadora','estado_id');
    }
}
