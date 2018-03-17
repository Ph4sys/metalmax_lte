@extends('layouts.app')

@section('content')
	
<div class="container">
	<div class="row">
	 	<h1>
			Gerar
			<small>Pedido</small>
		</h1>
			<!-- 
		<section class="content-header"> -->
			<ol class="bc breadcrumb">
			  <li><a href="{{ route('admin.principal')}}"><i class="fa fa-dashboard"></i> Início</a></li>
			  <li><a href="{{ route('admin.clientes.detalhe',$cliente->id)}}"></i> Detalhe</a></li>
			  <li class="active"><a>Histórico Contatos</a></li>
			  <!--<li class="active">Top Navigation</li> -->
			</ol>
		<!-- </section> -->
		</div>
  	<div class="col-xs-12">
  		<div class="box">
			<div class="box-header">
			  <h3 class="box-title">Dados Cliente</h3>
				</div>	
			<!-- /.box-header -->
			    <div class="box-body">
			      	<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
			          	<div class="row">
			          		<div class="col-sm-6">			
			          		</div>
			          		<div class="col-sm-6"></div>
			          	</div>

			      		<div class="row">
			      			<div class="col-sm-5">
			      				<b>Cliente: </b>{{ $cliente->nome}}
		      				</div>
				          	<div class="col-sm-3">
				          		<b>Classe: </b>{{ $cliente->classe->classe}}
				          	</div>
				          	<div class="col-sm-4">
				          		<b>Situação: </b>{{ $cliente->situacao->situacao}}
				          	</div>
				          	<div class="col-sm-5">
				          		<b>Endereço: </b>{{ $cliente->endereco }}
				          	</div>
				          	<div class="col-sm-3">
				          		<b>Bairro: </b>{{ $cliente->bairro->nome}}
				          	</div>
				          	<div class="col-sm-3">
				          		<b>Cidade: </b>{{ $cliente->cidade->nome}}-{{ $cliente->estado->sigla}}
				          	</div>
				          	<div class="col-sm-3">
		              			<b>Contato Cliente: </b>{{ $contato->id}} - {{ $contato->nome }}
		              		</div>
			  			</div>
			  			
			  	
			      		<div class="row">
			      			<div class="col-sm-5">
		    	  				<div class="dataTables_info" id="example2_info" role="status" aria-live="polite"></div>
					   		</div>
				      		<div class="col-sm-7"></div>
				   		</div>
			  		</div>
			</div>
		<!-- /.box-body -->
		</div>
  	</div>
  	<div class="col-xs-12">
  		<div class="box">
			<div class="box-header">
              <h3 class="box-title">Histórico Contatos</h3>
              	
            	<div class="box-tools pull-right">
	            	<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	            	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          		</div>
         	</div>
	        
	        <div class="box-body">

	        	<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
	              	<div class="row">
	              		<div class="col-sm-6">			
	              		</div>
	              		<div class="col-sm-6"></div>
	              	</div>

			        <div class="row">
		              	
		              	<div class="col-sm-12">

				          	<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
				                <thead>
					                <tr role="row">
					                	<th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Id</th>
					                	<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">Nome Contato Empresa</th>
					                	<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">Contato Metalmax</th>
					                	<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">Data Contato</th>
					                	<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">Data atualização</th>
					                	<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">Descrição do contato realizado</th>
					                	<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Ação version: activate to sort column ascending">Ação</th>
					                </tr>
				                </thead>
				                <tbody>
				                	@foreach($hcontatos as $hcontato)
										<tr role="row" class="odd">
											<td class="sorting_1">{{ $hcontato->id }}</td>
											<td>{{ $contato->nome }}</td>
											<td>{{ $hcontato->nome_contato_metal }}</td>
											<td>{{ $hcontato->created_at }}</td>
											<td>{{ $hcontato->updated_at }}</td>
											<td>{{ $hcontato->descricao_contato }}</td>
											<td>
												<a class="fa-btn label label-success" href="{{route('admin.hcontatos.editar',$hcontato->id)}}">Editar</a>
												<a class="fa-btn label label-danger" href="javascript: if(confirm('Deletar esse registro?')){ window.location.href = '{{route('admin.hcontatos.deletar',$hcontato->id)}}' }">Deletar</a>
											</td>
										</tr>
									@endforeach
				            	</tbody>
				            	<tfoot>      		
					            </tfoot>
								<!-- /.BOTAO ADICIONAR-->
					        </table>
						    <div>
								<a class="btn btn-primary" href="{{route('admin.hcontatos.adicionar',$contato->id, $cliente->id)}}">Adicionar Histórico</a>
							</div>
						</div>
					</div>
				</div>	
			</div>
  		</div>
	</div>

	<div class="col-xs-12">
  		<div class="box">
			<div class="box-header">
              <h3 class="box-title">Histórico Cotações</h3>
              	
            	<div class="box-tools pull-right">
	            	<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	            	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          		</div>
         	</div>
	        
	        <div class="box-body">

	        	<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
	              	<div class="row">
	              		<div class="col-sm-6">			
	              		</div>
	              		<div class="col-sm-6"></div>
	              	</div>

			        <div class="row">
		              	
		              	<div class="col-sm-12">

				          	<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
				                <thead>
					                <tr role="row">
					                	<th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Id Cotação</th>
					                	<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">Número Cotação</th>
					                	<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">Nome Contato Empresa</th>
					                	<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">Contato Metalmax</th>
					                	<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">Data Cotação</th>
					                	<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">Data atualização</th>
					                	<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">Descrição cotação</th>
					                	<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Ação version: activate to sort column ascending">Ação</th>
					                </tr>
				                </thead>
				                <tbody>
				                	@foreach($cotacoes as $cotacao)
										<tr role="row" class="odd">
											<td class="sorting_1">{{ $cotacao->id }}</td>
											<td>{{ $cotacao->numero_cotacao }}</td>
											<td>{{ $contato->nome }}</td>
											<td>{{ $cotacao->nome_contato_metal }}</td>
											<td>{{ $cotacao->created_at }}</td>
											<td>{{ $cotacao->updated_at }}</td>
											<td>{{ $cotacao->descricao_contato }}</td>
											<td>
												<a class="fa-btn label label-success" href="{{route('admin.cotacoes.editar',$hcontato->id)}}">Editar</a>
												<a class="fa-btn label label-danger" href="javascript: if(confirm('Deletar esse registro?')){ window.location.href = '{{route('admin.cotacoes.deletar',$hcontato->id)}}' }">Deletar</a>
											</td>
										</tr>
									@endforeach
				            	</tbody>
				            	<tfoot>      		
					            </tfoot>
								<!-- /.BOTAO ADICIONAR-->
					        </table>
						    <div>
								<a class="btn btn-primary" href="{{route('admin.cotacoes.adicionar',$contato->id, $cliente->id)}}">Adicionar Cotação</a>
							</div>
						</div>
					</div>
				</div>	
			</div>
  		</div>
	</div>

</div>
@endsection