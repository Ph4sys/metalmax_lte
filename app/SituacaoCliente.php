<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SituacaoCliente extends Model
{
    public function clientes()
    {
    	return $this->hasMany('App\Cliente','situacao_id');
    }
}
