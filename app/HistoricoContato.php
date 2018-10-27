<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoricoContato extends Model
{
    protected $table = "historico_contatos";
    
    protected $fillable = ['contato_id','nome_contato_metal','descricao_contato'];

    public function contato()
    {
    	return $this->belongsTo('App\Contato');
    }

    public function getDateTimezone($value)
	{
        return Carbon\Carbon::parse($value, $this->deployment->timezone)->timezone('America/São_Paulo');
	}
}
