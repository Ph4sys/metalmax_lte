<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoricoContato extends Model
{
	protected $fillable = ['nome_contato_metal','descricao_contato'];

    public function contato()
    {
    	return $this->belongsTo('App\Contato');
    }

    public function getDateTimezone($value)
	{
    return Carbon\Carbon::parse($value, $this->deployment->timezone)->timezone('America/São_Paulo');
	}
}
