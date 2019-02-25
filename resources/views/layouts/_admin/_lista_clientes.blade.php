<div class="row">
	<ol class="bc breadcrumb">
		<li><a href="{{ route('admin.principal')}}"><i class="fa fa-dashboard"></i> Início</a></li>
		<li class="active"><a>Lista de Clientes</a></li>
		<!--<li class="active">Top Navigation</li> -->
	</ol>
	<h1>
		Clientes <small>Lista principal</small>
	</h1>
</div>

	@include('layouts._admin._filtros')

	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Clientes</h3>
			</div>
            <!-- /.box-header -->
			<div class="box-body">
				<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
					<div class="row">
						<div class="col-sm-6">
							<div class="dataTables_length" id="example1_length"></div>
						</div>
						<div class="col-sm-6">
							<div class="dataTables_filter" id="example1_filter"></div>
						</div>
					</div>
					
					<div class="box-body">
						<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
							<div class="col-sm-12">
								<table id="TableClientePrinc" class="table table-bordered table-hover dataTable" style="width:100%">
									<thead>
										<tr role="row">
											<th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Id</th>
											<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">Nome</th>
											<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">CNPJ</th>
											<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">Classe</th>
											<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">Situação</th>
											<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">Cidade</th>
											<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Ação version: activate to sort column ascending">Ação</th>
										</tr>
									</thead>
									<tbody>
										@foreach($registros as $registro)
										<tr role="row" class="odd">
											<td class="sorting_1">{{ $registro->id }}</td>
											<td>{{ $registro->nome }}</td>
											<td>{{ $registro->cnpj }}</td>
											<td>{{ $registro->classe->classe }}</td>
											<td>{{ $registro->situacao->situacao }}</td>
											
											<td >{{ $registro->cidade->nome }}</td>
											<td>
											<a class="fa-btn label label-info" href="{{route('admin.clientes.detalhe',$registro->id)}}">Detalhe</a>
											<a class="fa-btn label label-success" href="{{route('admin.clientes.editar',$registro->id)}}">Editar</a>
											<a class="fa-btn label label-danger" href="javascript: if(confirm('Deletar esse registro?')){ window.location.href = '{{ route('admin.clientes.deletar',$registro->id) }}' }">Deletar</a>
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
					<!--
					<div class="col-sm-12">
						<table id="tableClientes" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
							<thead>
								<tr role="row">
									<th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Id</th>
									<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">Nome</th>
									<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">CNPJ</th>
									<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">Classe</th>
									<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">Situação</th>
									
									<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">Cidade</th>
									
									<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Ação version: activate to sort column ascending">Ação</th>
								</tr>
							</thead>
								<tbody>
									@foreach($registros as $registro)
									<tr role="row" class="odd">
										<td class="sorting_1">{{ $registro->id }}</td>
										<td>{{ $registro->nome }}</td>
										<td>{{ $registro->cnpj }}</td>
										<td>{{ $registro->classe->classe }}</td>
										<td>{{ $registro->situacao->situacao }}</td>
										
										<td >{{ $registro->cidade->nome }}</td>
										<td>
										<a class="fa-btn label label-info" href="{{route('admin.clientes.detalhe',$registro->id)}}">Detalhe</a>
										<a class="fa-btn label label-success" href="{{route('admin.clientes.editar',$registro->id)}}">Editar</a>
										<a class="fa-btn label label-danger" href="javascript: if(confirm('Deletar esse registro?')){ window.location.href = '{{ route('admin.clientes.deletar',$registro->id) }}' }">Deletar</a>
										</td>
									</tr>
									@endforeach
								</tbody>
						</table>
					</div>
				</div>
           	</div> -->
      	</div> 
    </div>