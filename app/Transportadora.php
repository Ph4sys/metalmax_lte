<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Transportadora extends Model
{

    protected $fillable = ['cliente_id','cidade_id','bairro_id','estado_id','nome','endereco','cep','telefone'];

    
    public function cliente()
    {
    	return $this->belongsTo('App\Cliente');
    }
  
  	public function cidade()
    {
    	return $this->belongsTo('App\Cidade');
    }
    
    public function bairro()
    {
    	return $this->belongsTo('App\Bairro');
    }

 	public function estado()
    {
    	return $this->belongsTo('App\Estado');
    }
}
