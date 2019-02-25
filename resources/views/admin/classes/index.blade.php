@extends('layouts.app')

@section('content')

<div class="container">

	<div class="row">
			
		<h1>
			Cadastro
			<small>Lista de Classes</small>
		</h1>
		<ol class="bc breadcrumb">
			<li><a href="{{ route('admin.principal')}}"><i class="fa fa-dashboard"></i> Início</a></li>
			<li class="active"><a>Lista de Classes</a></li>
		</ol>
	</div>

	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Tabela de Classe dos Clientes</h3>
			</div>

			<div class="box-body">
				<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
					<div class="col-sm-12">
						<table id="TableAdmUser" class="table table-bordered table-hover dataTable" style="width:100%">
							<thead>
							<tr role="row">
									<th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Id</th>
									<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">Classe</th>
									<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Ação version: activate to sort column ascending">Ação</th>
								</tr>
							</thead>
							<tbody>
								@foreach($registros as $registro)
									<tr role="row" class="odd">
										<td class="sorting_1">{{ $registro->id }}</td>
										<td>{{ $registro->classe }}</td>
											<td>
												<a class="fa-btn label label-success" href="{{route('admin.classes.editar', $registro->id)}}">Editar</a>
												<a class="fa-btn label label-danger" href="javascript: if(confirm('Deletar esse registro?')){ window.location.href = '{{ route('admin.classes.deletar',$registro->id) }}' }">Deletar</a>

											</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						<div> <!--botao inserir-->
							<a class="btn btn-primary" href="{{route('admin.classes.adicionar')}}">Adicionar</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
			<!--
			<div class="box-body">
				<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
					<div class="col-sm-12">
						<table id="TableAdm" class="table table-bordered table-hover dataTable" style="width:100%">
							<thead>
								<tr role="row">
									<th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Id</th>
									<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">Classe</th>
									<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Ação version: activate to sort column ascending">Ação</th>
								</tr>
							</thead>
							<tbody>
								@foreach($registros as $registro)
									<tr role="row" class="odd">
										<td class="sorting_1">{{ $registro->id }}</td>
										<td>{{ $registro->classe }}</td>
											<td>
												<a class="fa-btn label label-success" href="{{route('admin.classes.editar', $registro->id)}}">Editar</a>
												<a class="fa-btn label label-danger" href="javascript: if(confirm('Deletar esse registro?')){ window.location.href = '{{ route('admin.classes.deletar',$registro->id) }}' }">Deletar</a>

											</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						<div>
							<a class="btn btn-primary" href="{{route('admin.classes.adicionar')}}">Adicionar</a>
						</div>
					</div>
				</div>
			</div>
			-->
		</div>
	</div>

</div> <!--Container-->
@endsection