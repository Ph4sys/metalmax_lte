@extends('layouts.app')

@section('content')
<div class="container">
	<h1>
		Transportadora
		<small>Adicionar</small>
	</h1>
	<div class="row">

		<ol class="bc breadcrumb">
		  <li><a href="{{ route('admin.principal')}}"><i class="fa fa-dashboard"></i> Início</a></li>
		  <li><a href="{{route('admin.clientes')}}">Lista de Clientes</a></li>
		  <li><a href="{{route('admin.clientes.detalhe',$cliente->id)}}">Detalhe</a></li>
		  <li><a class="active">Adicionar Transportadora</a></li>
		</ol>
	</div>
	<div class="row">
		<form action="{{ route('admin.transportadoras.salvar',$cliente->id) }}" method="post">

		{{csrf_field()}}
		
		@include('admin.transportadoras._form')

		<button class="btn btn-primary">Adicionar</button>

			
		</form>
			
	</div>
	
</div>
	

@endsection