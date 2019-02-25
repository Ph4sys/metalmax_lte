@extends('layouts.app')

@section('content')
	
	<div class="container">
          
      	<!-- Content Header (Page header) 
	      <section class="content-header">
	        
	      </section> -->

		<div class="row">
		 	
		 	<h1>
				Cadastro
				<small>Lista de Situações</small>
			</h1>
			<!-- 
			<section class="content-header"> -->
				<ol class="bc breadcrumb">
				  <li><a href="{{ route('admin.principal')}}"><i class="fa fa-dashboard"></i> Início</a></li>
				  <li class="active"><a href="#">Lista de Situações</a></li>
				  <!--<li class="active">Top Navigation</li> -->
				</ol>
			<!-- </section> -->

		</div>
		
		<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabela de Situação dos Clientes</h3>
         	</div>	
					 <div class="box-body">
					<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
						<div class="col-sm-12">
							<table id="TableAdmUser" class="table table-bordered table-hover dataTable" style="width:100%">
								<thead>
									<tr role="row">
										<th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Id</th>
										<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">Situação</th>
										<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Ação version: activate to sort column ascending">Ação</th>
									</tr>
								</thead>
								<tbody>
									@foreach($registros as $registro)
									<tr role="row" class="odd">
										<td class="sorting_1">{{ $registro->id }}</td>
										<td>{{ $registro->situacao }}</td>
											<td>
												<a class="fa-btn label label-success" href="{{route('admin.situacoes.editar', $registro->id)}}">Editar</a>
												<a class="fa-btn label label-danger" href="javascript: if(confirm('Deletar esse registro?')){ window.location.href = '{{ route('admin.situacoes.deletar',$registro->id) }}' }">Deletar</a>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
							<div> <!--botao inserir-->
								<a class="btn btn-primary" href="{{route('admin.situacoes.adicionar')}}">Adicionar</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
  </div>
    
</div>
@endsection