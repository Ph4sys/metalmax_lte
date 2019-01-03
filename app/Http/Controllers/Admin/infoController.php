<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pedido;
use App\HistoricoContato;
use \Datetime;

class infoController extends Controller
{
    /*	
    Route::get('/admin/info',['as'=>'admin.principal', function(){
		return view('admin.principal.info');
    }]);
    */

    public function index()
    {
        $atual = new DateTime('-10 day');
        //dd($atual);

        $hContatosRealizados =  HistoricoContato::where('created_at','>=', $atual )
        ->orderBy('created_at')->get();

        $pedidosNconfirmados = Pedido::where('confirmacao_pedido', '!=', 'sim')
        ->orderBy('numero_pedido')->get();
       
        return view('admin.principal.info', compact('pedidosNconfirmados', 'hContatosRealizados'));
    }
}

 /*
public function naoConfirmados( Request $request)
{
   
    $busca =  $request->all();
    
    $classes = ClasseCliente::orderBy('classe')->get();
    $situacoes = SituacaoCliente::orderBy('situacao')->get();;
    $cidades = Cidade::orderBy('nome')->get();

    $paginacao = false;

    if($busca['classe_id'] == 'todos'){
        $testeClasse = [
            ['classe_id','<>',null]
        ];
    }else{
        $testeClasse = [
            ['classe_id','=',$busca['classe_id']]
        ];
    }

    if($busca['situacao_id'] == 'todos'){
        $testeSituacao = [
            ['situacao_id','<>',null]
        ];
    }else{
        $testeSituacao = [
            ['situacao_id','=',$busca['situacao_id']]
        ];
    }

    if($busca['cidade_id'] == 'todos'){
        $testeCidade = [
            ['cidade_id','<>',null]
        ];
    }else{
        $testeCidade = [
            ['cidade_id','=',$busca['cidade_id']]
        ];
    }

    If($busca['nome'] != ''){
        $testeNome = [
            ['nome','like','%'.$busca['nome'].'%']
        ];
    }else{
        $testeNome = [
            ['nome','<>',null]
        ];
    }
    
    If($busca['cnpj'] != ''){
        $testecnpj = [
            ['cnpj','like','%'.$busca['cnpj'].'%']
        ];
    }else{
        $testecnpj = [
            ['cnpj','<>',null]
        ];
    }

    $registros = Cliente::where($testeClasse)
                ->where($testeSituacao)
                ->where($testeCidade)
                ->where($testeNome)
                ->where($testecnpj)
                ->orderBy('nome')->get();
    
    return view('admin.clientes.busca', compact('registros','busca','classes','situacoes','cidades','paginacao'));
  
}
  */