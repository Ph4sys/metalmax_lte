<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Contato extends Model
{
    protected $fillable = ['nome','email','telefone','celular'];

    public function cliente()
    {
    	return $this->belongsTo('App\Cliente');
    }

    public function hcontatos()
    {
        return $this->hasMany('App\HistoricoContato');
    }

    public function cotacoes()
    {
        return $this->hasMany('App\Cotacao');
    }
   
    public function pedidos()
    {
        return $this->hasMany('App\Pedido');
    }

   	public function addHContato(HistoricoContato $hcontat)
    {
        return $this->hcontatos()->save($hcontat);
    }

    public function addCotacao(Cotacao $cotacao)
    {
        return $this->cotacoes()->save($cotacao);
    }
}
