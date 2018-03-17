
@extends('layouts.app')

@section('content')
<div class="container">
	<h1>
			Transportadora
			<small>Editar</small>
		</h1>
	
	<div class="row">
		<ol class="bc breadcrumb">
		  <li><a href="{{ route('admin.principal')}}"><i class="fa fa-dashboard"></i> Início</a></li>
		  <li><a href="{{route('admin.clientes')}}">Clientes</a></li>
		  <li><a href="{{route('admin.clientes.detalhe',$transportadora->cliente->id)}}">Detalhe</a></li>
		  <li><a class="active">Editar Transportadora</a></li>
		</ol>
	</div>
	<div class="row">
		<p><b>Cliente: </b>{{ $transportadora->cliente->nome }}</p>
		<form action="{{ route('admin.transportadoras.atualizar', $transportadora->id) }}" method="post">

			{{csrf_field()}}
			<input type="hidden" name="_method" value="put">
			@include('admin.transportadoras._form')

			<button class="btn btn-primary">Atualizar</button>

		</form>
			
	</div>
	
</div>
	
@endsection