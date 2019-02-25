@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
			
		<h1>
			Painel de Controle
			<small>Informações gerais</small>
		</h1>
		<!-- 
		<section class="content-header"> -->
			<ol class="bc breadcrumb">
			<li><a href="{{ route('admin.principal')}}"><i class="fa fa-dashboard"></i> Início</a></li>
			<!--li class="active"><a href="#">Informações gerais</a></li-->
			<!--<li class="active">Top Navigation</li> -->
			</ol>
		<!-- </section> -->
	</div>
	
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Últimos contatos realizados (10 dias)</h3>
			</div>

			<div class="box-body">
				<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
					<div class="col-sm-12">
						<table id="contatosClientes" class="table table-bordered table-hover dataTable" style="width:100%">
							<thead>
								<tr role="row">
								<th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Id</th>
								<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">Nome contato cliente</th>
								<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">E-mail</th>
								<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">Nome contato Metalmax</th>
								<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">Descrição</th>
								<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">Data</th>
								<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Ação version: activate to sort column ascending">Ação</th>
								</tr>
							</thead>
							<tbody>
								@foreach($hContatosRealizados as $hcontato)
								<tr role="row" class="odd">
								<td class="sorting_1">{{ $hcontato->id }}</td>
								<td>{{ $hcontato->contato->nome }}</td>
								<td>{{ $hcontato->contato->email }}</td>
								<td>{{ $hcontato->nome_contato_metal }}</td>
								<td>{{ $hcontato->descricao_contato }}</td>								
								<td>{{ $hcontato->created_at }}</td>
							
								<td>
								<a class="fa-btn label label-info" href="{{route('admin.hcontatos.editar',$hcontato->id)}}">Visualizar contato</a>
								</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
@endsection