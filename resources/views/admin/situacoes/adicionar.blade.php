@extends('layouts.app')

@section('content')
<div class="container">
	<h2 class="center">Adicionar Situações</h2>
	<div class="row">

		<ol class="bc breadcrumb">
		  <li><a href="{{ route('admin.principal')}}"><i class="fa fa-dashboard"></i> Início</a></li>
		  <li><a href="{{route('admin.situacoes')}}">Lista de Situações</a></li>
		  <li><a href="#" class="active">Adicionar Situação</a></li>
		</ol>
	</div>
	<div class="row">
		<form action="{{ route('admin.situacoes.salvar') }}" method="post">

		{{csrf_field()}}
		@include('admin.situacoes._form')

		<button class="btn btn-primary">Adicionar</button>

			
		</form>
			
	</div>
	
</div>
	

@endsection