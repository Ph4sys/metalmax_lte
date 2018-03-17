@extends('layouts.app')

@section('content')
<div class="container">
	<h2 class="center">Editar Situações</h2>
	<div class="row">
		<ol class="bc breadcrumb">
		  <li><a href="{{ route('admin.principal')}}"><i class="fa fa-dashboard"></i> Início</a></li>
		  <li><a href="{{route('admin.classes')}}">Lista de Situações</a></li>
		  <li><a class="active">Editar Situação Pedido</a></li>
		</ol>
	</div>
	<div class="row">
		<form action="{{ route('admin.situacoes_pedido.atualizar', $registro->id) }}" method="post">

			{{csrf_field()}}
			<input type="hidden" name="_method" value="put">
			@include('admin.situacoes_pedido._form')
			<button class="btn btn-primary">Atualizar</button>

		</form>
			
	</div>
	
</div>
	

@endsection