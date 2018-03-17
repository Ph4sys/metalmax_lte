@extends('layouts.app')

@section('content')
	
<div class="container">
	<div class="row">
	 	<h1>
			Histórico
			<small>Contatos</small>
		</h1>
			<!-- 
		<section class="content-header"> -->
			<ol class="bc breadcrumb">
			  <li><a href="{{ route('admin.principal')}}"><i class="fa fa-dashboard"></i> Início</a></li>
			  <li><a href="{{ route('admin.clientes')}}"></i> Clientes</a></li>
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
					        
					        <div class="row">
				      			<div class="col-sm-5">
				   	  				<div class="dataTables_info" id="example2_info" role="status" aria-live="polite"></div>
					      		</div>
					      		<div class="col-sm-7">
					      			<div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
					      				{!! $hcontatos->links() !!}
					      			</div>
					      		</div>
				      		</div>

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
					                	
					                	<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">Número Cotação</th>
					                	<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">Contato Metalmax</th>
					                	<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">Data Cotação</th>
					                	<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">Data atualização</th>
					                	<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Ação version: activate to sort column ascending">Ação</th>
					                </tr>
				                </thead>
				                <tbody>
				                	@foreach($cotacoes as $cotacao)
										<tr role="row" class="odd">
											<td>{{ $cotacao->numero_cotacao }}</td>
											<td>{{ $cotacao->nome_contato_metal }}</td>
											<td>{{ $cotacao->created_at }}</td>
											<td>{{ $cotacao->updated_at }}</td>
											<td>
												<a class="fa-btn label label-info" href="{{route('admin.cotacoes.detalhe',$cotacao->id)}}">Detalhe</a>
												<a class="fa-btn label label-success" href="{{route('admin.cotacoes.editar',$cotacao->id)}}">Editar</a>
												<a class="fa-btn label label-warning" href="{{route('admin.pedidos.adicionar',$cotacao->id)}}">Gerar Pedido</a>
												
											</td>
										</tr>
									@endforeach
				            	</tbody>
				            	<tfoot>      		
					            </tfoot>
								<!-- /.BOTAO ADICIONAR-->
					        </table>

							<div class="row">
				      			<div class="col-sm-5">
				   	  				<div class="dataTables_info" id="example2_info" role="status" aria-live="polite"></div>
					      		</div>
					      		<div class="col-sm-7">
					      			<div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
					      				{!! $cotacoes->links() !!}
					      			</div>
					      		</div>
				      		</div>

						    <div>
								<a class="btn btn-primary" href="{{route('admin.cotacoes.adicionar',$contato->id, $cliente->id)}}">Adicionar Cotação</a>
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
	              <h3 class="box-title">Histórico Pedidos</h3>
	              	
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
						                	<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">Número Pedido</th>
						                	<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">Número NF</th>
						                	<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">Data Pedido</th>
						                	<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">Qtd Itens</th>
						                	<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">Status</th>
						                	<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">Data atualização</th>
						                	<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending">Valor Pedido</th>
						                	<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Ação version: activate to sort column ascending">Ação</th>
						                </tr>
					                </thead>
					                <tbody>
					                	@foreach($pedidos as $pedido)
											<tr role="row" class="odd">
												<td>{{ $pedido->numero_pedido }}</td>
												<td>{{ $pedido->numero_nf }}</td>
												<td>{{ $pedido->created_at }}</td>
												<td>{{ $pedido->qtd_itens }}</td>
												<td>{{ $pedido->situacao_pedido->situacao_pedido }}</td>
												<td>{{ $pedido->updated_at }}</td>
												<td>{{ $pedido->valor_pedido }}</td>
												<td>
													<a class="fa-btn label label-info" href="{{route('admin.pedidos.detalhe',$pedido->id)}}">Detalhe</a>
													<a class="fa-btn label label-success" href="{{route('admin.pedidos.editar',$pedido->id)}}">Editar</a>
												</td>
											</tr>
										@endforeach
					            	</tbody>
					            	<tfoot>      		
						            </tfoot>
									<!-- /.BOTAO ADICIONAR-->
						        </table>
							    
									<div class="row">
						      			<div class="col-sm-5">
						   	  				<div class="dataTables_info" id="example2_info" role="status" aria-live="polite"></div>
							      		</div>
							      		<div class="col-sm-7">
							      			<div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
							      				{!! $pedidos->links() !!}
						      			</div>
						      		</div>
				      			</div>

							</div>
						</div>
					</div>	
				</div>
	  		</div>
		</div>
</div>
@endsection