<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SituacaoPedido extends Model
{
    protected $table = "situacoes_pedido";

    public function pedidos()
    {
    	return $this->hasMany('App\Pedido','situacao_pedido_id');
    }
}
