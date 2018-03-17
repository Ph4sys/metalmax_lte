<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCotacao extends Model
{
	
	protected $table = "itens_cotacoes";
	protected $fillable = ['cotacao_id','item_desc','quantidade','unidade','valor'];

    public function cotacao()
    {
    	return $this->belongsTo('App\Cotacao');
    }

}
