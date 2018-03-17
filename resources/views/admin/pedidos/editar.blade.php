@extends('layouts.app')

@section('content')
<div class="container">
	<h2 class="center">Editar Pedido</h2>
	<div class="row">
		<ol class="bc breadcrumb">
		  <li><a href="{{ route('admin.principal')}}"><i class="fa fa-dashboard"></i> Início</a></li>
		  <li><a href="{{route('admin.clientes')}}">Lista de Clientes</a></li>
		  <li><a href="{{route('admin.clientes.detalhe',$cotacao->contato->cliente->id)}}">Detalhe</a></li>
		  <li><a href="{{route('admin.hcontatos', $cotacao->contato->id)}}">Histórico Contatos</a></li>
		  <li><a>Editar Pedido</a></li>
		</ol>
	</div>
	<div class="row">
		<form action="{{ route('admin.pedidos.atualizar', $pedido->id) }}" method="post">

			{{csrf_field()}}
			<input type="hidden" name="_method" value="put">
			
				@include('admin.pedidos._form')

			<button class="btn btn-primary">Atualizar</button>

		</form>
			
	</div>
	
</div>
	

@endsection