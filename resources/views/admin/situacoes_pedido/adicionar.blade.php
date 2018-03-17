@extends('layouts.app')

@section('content')
<div class="container">
	<h2 class="center">Adicionar Situação</h2>
	<div class="row">

		<ol class="bc breadcrumb">
		  <li><a href="{{ route('admin.principal')}}"><i class="fa fa-dashboard"></i> Início</a></li>
		  <li><a href="{{route('admin.situacoes_pedido')}}">Lista de Situações</a></li>
		  <li><a href="#" class="active">Adicionar Situação</a></li>
		</ol>
	</div>
	<div class="row">
		<form action="{{ route('admin.situacoes_pedido.salvar') }}" method="post">

		{{csrf_field()}}
		@include('admin.situacoes_pedido._form')

		<button class="btn btn-primary">Adicionar</button>

			
		</form>
			
	</div>
	
</div>
	

@endsection