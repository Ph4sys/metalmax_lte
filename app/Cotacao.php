<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotacao extends Model
{

	protected $table = "cotacoes";

    protected $fillable = ['numero_cotacao','nome_contato_metal','tolerancia','observacao'];

	public function contato()
	{
		return $this->belongsTo('App\Contato');
	}

	public function itensCotacao()
    {
        return $this->hasMany('App\ItemCotacao');
    }

    public function addItemCotacao(ItemCotacao $item)
    {
        return $this->itensCotacao()->save($item);
    }
}
