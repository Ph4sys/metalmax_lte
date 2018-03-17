@extends('layouts.app')

@section('content')
<div class="container">
	<h1>
		Histórico Contatos
		<small>Adicionar</small>
	</h1>
	<div class="row">

		<ol class="bc breadcrumb">
		  <li><a href="{{ route('admin.principal')}}"><i class="fa fa-dashboard"></i> Início</a></li>
		  <li><a href="{{route('admin.clientes')}}">Lista de Clientes</a></li>
		  <li><a href="{{ route('admin.hcontatos',$cliente->id)}}"></i> Histórico Contatos</a></li>
		  <li><a href="{{route('admin.clientes.detalhe',$cliente->id)}}">Detalhes</a></li>
		  <li><a class="active">Adicionar Histórico Contato</a></li>
		</ol>
	</div>
	<div class="row">
		<form action="{{ route('admin.hcontatos.salvar',$contato->id) }}" method="post">

		{{csrf_field()}}
		@include('admin.hcontatos._form')

		<button class="btn btn-primary">Adicionar</button>

			
		</form>
			
	</div>
	
</div>
	

@endsection