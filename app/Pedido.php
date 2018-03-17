<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model{

	protected $fillable = ['cotacao_id', 'situacao_pedido_id', 'contato_id', 'numero_pedido', 'numero_nf','valor_pedido','qtd_itens'];

    public function cotacoes()
    {
        return $this->hasMany('App\Cotacao');
    }

    public function contato()
	{
		return $this->belongsTo('App\Contato');
	}

	public function situacao_pedido()
	{
		return $this->belongsTo('App\SituacaoPedido');
	}
}
