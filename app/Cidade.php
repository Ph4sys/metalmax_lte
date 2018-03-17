<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Cidade extends Model
{
    public function clientes()
    {
    	return $this->hasMany('App\Cliente','cidade_id');
    }

    public function transportadoras()
    {
    	return $this->hasMany('App\Transportadora','cidade_id');
    }
}
