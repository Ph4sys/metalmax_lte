<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Cliente extends Model
{
    //Relacionamentos Cliente -> 1
    protected $fillable = ['nome','cnpj','classe','situacao','cidade'];
    
    public function situacao()
    {
    	return $this->belongsTo('App\SituacaoCliente','situacao_id');
    }

    public function classe()
    {
    	return $this->belongsTo('App\ClasseCliente','classe_id');
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
    
    //Relacionamentos Cliente -> *

    public function contatos()
    {
        return $this->hasMany('App\Contato');
    }

    public function transportadoras()
    {
        return $this->hasMany('App\Transportadora');
    }

    //Funções add relações -> *

    public function addContato(Contato $contat)
    {
        return $this->contatos()->save($contat);
    }

    public function addTransportadora(Transportadora $transport)
    {
        return $this->contatos()->save($transport);
    }
}
