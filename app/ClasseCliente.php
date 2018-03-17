<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ClasseCliente extends Model
{
    public function clientes()
    {
    	return $this->hasMany('App\Cliente','classe_id');
    }
}
