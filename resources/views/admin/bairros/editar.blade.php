@extends('layouts.app')

@section('content')
<div class="container">
	<h2 class="center">Editar Bairros</h2>
	<div class="row">
		<ol class="bc breadcrumb">
		  <li><a href="{{ route('admin.principal')}}"><i class="fa fa-dashboard"></i> Início</a></li>
		  <li><a href="{{route('admin.classes')}}">Lista de Bairros</a></li>
		  <li><a class="active">Editar Bairro</a></li>
		</ol>
	</div>
	<div class="row">
		<form action="{{ route('admin.bairros.atualizar', $registro->id) }}" method="post">

			{{csrf_field()}}
			<input type="hidden" name="_method" value="put">
			@include('admin.bairros._form')
			<button class="btn btn-primary">Atualizar</button>

		</form>
			
	</div>
	
</div>
	

@endsection