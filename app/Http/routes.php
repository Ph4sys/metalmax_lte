<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',['as'=>'home', function(){
	return view('home');
}]);


Route::get('/admin/login',['as'=>'admin.login', function(){
	return view('admin.login.index');
}]);

Route::post('/admin/login',['as'=>'admin.login', 'uses'=>'Admin\UsuarioController@login']);


Route::group(['middleware'=>'auth'], function(){

	Route::get('/admin/login/sair',['as'=>'admin.login.sair', 'uses'=>'Admin\UsuarioController@sair']);

	Route::get('/admin/info',['as'=>'admin.principal', 'uses'=>'Admin\infoController@index']);

	Route::get('/admin/usuarios',['as'=>'admin.usuarios', 'uses'=>'Admin\UsuarioController@index']);
	Route::get('/admin/usuarios/adicionar',['as'=>'admin.usuarios.adicionar', 'uses'=>'Admin\UsuarioController@adicionar']);
	Route::post('/admin/usuarios/salvar',['as'=>'admin.usuarios.salvar', 'uses'=>'Admin\UsuarioController@salvar']);
	Route::get('/admin/usuarios/editar/{id}',['as'=>'admin.usuarios.editar', 'uses'=>'Admin\UsuarioController@editar']);
	Route::put('/admin/usuarios/atualizar/{id}',['as'=>'admin.usuarios.atualizar', 'uses'=>'Admin\UsuarioController@atualizar']);
	Route::get('/admin/usuarios/deletar/{id}',['as'=>'admin.usuarios.deletar', 'uses'=>'Admin\UsuarioController@deletar']);


	Route::get('/admin/classes',['as'=>'admin.classes', 'uses'=>'Admin\ClasseClienteController@index']);
	Route::get('/admin/classes/adicionar',['as'=>'admin.classes.adicionar', 'uses'=>'Admin\ClasseClienteController@adicionar']);
	Route::post('/admin/classes/salvar',['as'=>'admin.classes.salvar', 'uses'=>'Admin\ClasseClienteController@salvar']);
	Route::get('/admin/classes/editar/{id}',['as'=>'admin.classes.editar', 'uses'=>'Admin\ClasseClienteController@editar']);
	Route::put('/admin/classes/atualizar/{id}',['as'=>'admin.classes.atualizar', 'uses'=>'Admin\ClasseClienteController@atualizar']);
	Route::get('/admin/classes/deletar/{id}',['as'=>'admin.classes.deletar', 'uses'=>'Admin\ClasseClienteController@deletar']);

	Route::get('/admin/situacoes',['as'=>'admin.situacoes', 'uses'=>'Admin\SituacaoClienteController@index']);
	Route::get('/admin/situacoes/adicionar',['as'=>'admin.situacoes.adicionar', 'uses'=>'Admin\SituacaoClienteController@adicionar']);
	Route::post('/admin/situacoes/salvar',['as'=>'admin.situacoes.salvar', 'uses'=>'Admin\SituacaoClienteController@salvar']);
	Route::get('/admin/situacoes/editar/{id}',['as'=>'admin.situacoes.editar', 'uses'=>'Admin\SituacaoClienteController@editar']);
	Route::put('/admin/situacoes/atualizar/{id}',['as'=>'admin.situacoes.atualizar', 'uses'=>'Admin\SituacaoClienteController@atualizar']);
	Route::get('/admin/situacoes/deletar/{id}',['as'=>'admin.situacoes.deletar', 'uses'=>'Admin\SituacaoClienteController@deletar']);

	Route::get('/admin/cidades',['as'=>'admin.cidades', 'uses'=>'Admin\CidadeController@index']);
	Route::get('/admin/cidades/adicionar',['as'=>'admin.cidades.adicionar', 'uses'=>'Admin\CidadeController@adicionar']);
	Route::post('/admin/cidades/salvar',['as'=>'admin.cidades.salvar', 'uses'=>'Admin\CidadeController@salvar']);
	Route::get('/admin/cidades/editar/{id}',['as'=>'admin.cidades.editar', 'uses'=>'Admin\CidadeController@editar']);
	Route::put('/admin/cidades/atualizar/{id}',['as'=>'admin.cidades.atualizar', 'uses'=>'Admin\CidadeController@atualizar']);
	Route::get('/admin/cidades/deletar/{id}',['as'=>'admin.cidades.deletar', 'uses'=>'Admin\CidadeController@deletar']);

	Route::get('/admin/bairros',['as'=>'admin.bairros', 'uses'=>'Admin\BairroController@index']);
	Route::get('/admin/bairros/adicionar',['as'=>'admin.bairros.adicionar', 'uses'=>'Admin\BairroController@adicionar']);
	Route::post('/admin/bairros/salvar',['as'=>'admin.bairros.salvar', 'uses'=>'Admin\BairroController@salvar']);
	Route::get('/admin/bairros/editar/{id}',['as'=>'admin.bairros.editar', 'uses'=>'Admin\BairroController@editar']);
	Route::put('/admin/bairros/atualizar/{id}',['as'=>'admin.bairros.atualizar', 'uses'=>'Admin\BairroController@atualizar']);
	Route::get('/admin/bairros/deletar/{id}',['as'=>'admin.bairros.deletar', 'uses'=>'Admin\BairroController@deletar']);

	Route::get('/admin/estados',['as'=>'admin.estados', 'uses'=>'Admin\EstadoController@index']);
	Route::get('/admin/estados/adicionar',['as'=>'admin.estados.adicionar', 'uses'=>'Admin\EstadoController@adicionar']);
	Route::post('/admin/estados/salvar',['as'=>'admin.estados.salvar', 'uses'=>'Admin\EstadoController@salvar']);
	Route::get('/admin/estados/editar/{id}',['as'=>'admin.estados.editar', 'uses'=>'Admin\EstadoController@editar']);
	Route::put('/admin/estados/atualizar/{id}',['as'=>'admin.estados.atualizar', 'uses'=>'Admin\EstadoController@atualizar']);
	Route::get('/admin/estados/deletar/{id}',['as'=>'admin.estados.deletar', 'uses'=>'Admin\EstadoController@deletar']);

	
	Route::get('/admin/clientes/deletar/{id}',['as'=>'admin.clientes.deletar', 'uses'=>'Admin\ClienteController@deletar']);
	Route::get('/admin/clientes',['as'=>'admin.clientes', 'uses'=>'Admin\ClienteController@index']);
	Route::get('/admin/clientes/adicionar',['as'=>'admin.clientes.adicionar', 'uses'=>'Admin\ClienteController@adicionar']);
	Route::post('/admin/clientes/salvar',['as'=>'admin.clientes.salvar', 'uses'=>'Admin\ClienteController@salvar']);
	Route::get('/admin/clientes/editar/{id}',['as'=>'admin.clientes.editar', 'uses'=>'Admin\ClienteController@editar']);
	Route::put('/admin/clientes/atualizar/{id}',['as'=>'admin.clientes.atualizar', 'uses'=>'Admin\ClienteController@atualizar']);
	Route::get('/admin/clientes/deletar/{id}',['as'=>'admin.clientes.deletar', 'uses'=>'Admin\ClienteController@deletar']);

	Route::get('/admin/clientes/busca',['as'=>'admin.clientes.busca', 'uses'=>'Admin\ClienteController@busca']);

	Route::get('/admin/clientes/detalhe/{id}',['as'=>'admin.clientes.detalhe', 'uses'=>'Admin\ClienteController@detalhe']);
	
	Route::get('/admin/contatos',['as'=>'admin.contatos', 'uses'=>'Admin\ContatoController@index']);
	Route::get('/admin/contatos/adicionar/{id}',['as'=>'admin.contatos.adicionar', 'uses'=>'Admin\ContatoController@adicionar']);
	Route::post('/admin/contatos/salvar/{id}',['as'=>'admin.contatos.salvar', 'uses'=>'Admin\ContatoController@salvar']);
	Route::get('/admin/contatos/editar/{id}',['as'=>'admin.contatos.editar', 'uses'=>'Admin\ContatoController@editar']);
	Route::put('/admin/contatos/atualizar/{id}',['as'=>'admin.contatos.atualizar', 'uses'=>'Admin\ContatoController@atualizar']);
	Route::get('/admin/contatos/deletar/{id}',['as'=>'admin.contatos.deletar', 'uses'=>'Admin\ContatoController@deletar']);

	Route::get('/admin/transportadoras',['as'=>'admin.transportadoras', 'uses'=>'Admin\TransportadoraController@index']);
	Route::get('/admin/transportadoras/adicionar/{id}',['as'=>'admin.transportadoras.adicionar', 'uses'=>'Admin\TransportadoraController@adicionar']);
	Route::post('/admin/transportadoras/salvar/{id}',['as'=>'admin.transportadoras.salvar', 'uses'=>'Admin\TransportadoraController@salvar']);
	Route::get('/admin/transportadoras/editar/{id}',['as'=>'admin.transportadoras.editar', 'uses'=>'Admin\TransportadoraController@editar']);
	Route::put('/admin/transportadoras/atualizar/{id}',['as'=>'admin.transportadoras.atualizar', 'uses'=>'Admin\TransportadoraController@atualizar']);
	Route::get('/admin/transportadoras/deletar/{id}',['as'=>'admin.transportadoras.deletar', 'uses'=>'Admin\TransportadoraController@deletar']);

	Route::get('/admin/hcontatos/{id}',['as'=>'admin.hcontatos', 'uses'=>'Admin\HistoricoContatoController@index']);
	Route::get('/admin/hcontatos/adicionar/{id}',['as'=>'admin.hcontatos.adicionar', 'uses'=>'Admin\HistoricoContatoController@adicionar']);
	Route::post('/admin/hcontatos/salvar/{id}',['as'=>'admin.hcontatos.salvar', 'uses'=>'Admin\HistoricoContatoController@salvar']);
	Route::get('/admin/hcontatos/editar/{id}',['as'=>'admin.hcontatos.editar', 'uses'=>'Admin\HistoricoContatoController@editar']);
	Route::put('/admin/hcontatos/atualizar/{id}',['as'=>'admin.hcontatos.atualizar', 'uses'=>'Admin\HistoricoContatoController@atualizar']);
	Route::get('/admin/hcontatos/deletar/{id}',['as'=>'admin.hcontatos.deletar', 'uses'=>'Admin\HistoricoContatoController@deletar']);


	Route::get('/admin/cotacoes/{id}',['as'=>'admin.cotacoes', 'uses'=>'Admin\CotacaoController@index']);
	Route::get('/admin/cotacoes/adicionar/{id}',['as'=>'admin.cotacoes.adicionar', 'uses'=>'Admin\CotacaoController@adicionar']);
	Route::post('/admin/cotacoes/salvar/{id}',['as'=>'admin.cotacoes.salvar', 'uses'=>'Admin\CotacaoController@salvar']);
	Route::get('/admin/cotacoes/editar/{id}',['as'=>'admin.cotacoes.editar', 'uses'=>'Admin\CotacaoController@editar']);
	Route::put('/admin/cotacoes/atualizar/{id}',['as'=>'admin.cotacoes.atualizar', 'uses'=>'Admin\CotacaoController@atualizar']);
	Route::get('/admin/cotacoes/deletar/{id}',['as'=>'admin.cotacoes.deletar', 'uses'=>'Admin\CotacaoController@deletar']);
	
	Route::get('/admin/cotacoes/detalhe/{id}',['as'=>'admin.cotacoes.detalhe', 'uses'=>'Admin\CotacaoController@detalhe']);

	Route::get('/admin/pedidos/{id}',['as'=>'admin.pedidos', 'uses'=>'Admin\PedidoController@index']);
	Route::get('/admin/pedidos/adicionar/{id}',['as'=>'admin.pedidos.adicionar', 'uses'=>'Admin\PedidoController@adicionar']);
	Route::post('/admin/pedidos/salvar/{id}',['as'=>'admin.pedidos.salvar', 'uses'=>'Admin\PedidoController@salvar']);
	Route::get('/admin/pedidos/editar/{id}',['as'=>'admin.pedidos.editar', 'uses'=>'Admin\PedidoController@editar']);
	Route::put('/admin/pedidos/atualizar/{id}',['as'=>'admin.pedidos.atualizar', 'uses'=>'Admin\PedidoController@atualizar']);
	Route::get('/admin/pedidos/deletar/{id}',['as'=>'admin.pedidos.deletar', 'uses'=>'Admin\PedidoController@deletar']);
	
	Route::get('/admin/pedidos/detalhe/{id}',['as'=>'admin.pedidos.detalhe', 'uses'=>'Admin\PedidoController@detalhe']);

	Route::get('/admin/situacoes_pedido',['as'=>'admin.situacoes_pedido', 'uses'=>'Admin\SituacaoPedidoController@index']);
	Route::get('/admin/situacoes_pedido/adicionar',['as'=>'admin.situacoes_pedido.adicionar', 'uses'=>'Admin\SituacaoPedidoController@adicionar']);
	Route::post('/admin/situacoes_pedido/salvar',['as'=>'admin.situacoes_pedido.salvar', 'uses'=>'Admin\SituacaoPedidoController@salvar']);
	Route::get('/admin/situacoes_pedido/editar/{id}',['as'=>'admin.situacoes_pedido.editar', 'uses'=>'Admin\SituacaoPedidoController@editar']);
	Route::put('/admin/situacoes_pedido/atualizar/{id}',['as'=>'admin.situacoes_pedido.atualizar', 'uses'=>'Admin\SituacaoPedidoController@atualizar']);
	Route::get('/admin/situacoes_pedido/deletar/{id}',['as'=>'admin.situacoes_pedido.deletar', 'uses'=>'Admin\SituacaoPedidoController@deletar']);

	Route::get('/admin/pedidos/naoConfirmados',['as'=>'admin.pedidos.naoConfirmados', 'uses'=>'Admin\PedidoController@naoConfirmados']);
});

