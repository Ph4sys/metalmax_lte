@extends('layouts.app')

@section('content')
	
<div class="container">
	<div class="row">
	 	<h1>
			Cotação
			<small>Detalhes</small>
		</h1>
			<!-- 
		<section class="content-header"> -->
			<ol class="bc breadcrumb">
			  <li><a href="{{ route('admin.principal')}}"><i class="fa fa-dashboard"></i> Início</a></li>
			  <li><a href="{{ route('admin.clientes')}}"></i> Clientes</a></li>
			  <li><a href="{{ route('admin.clientes', $cliente->id)}}"></i> Detalhe</a></li>
			  <li><a href="{{ route('admin.hcontatos',$contato->id)}}"></i> Histórico Contatos</a></li>
			  
			  <li class="active"><a>Detalhe</a></li>
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
			      				<b>Cliente: </b>{{ $cliente->nome }}
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
              <h3 class="box-title">Cotação</h3>
              	
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
					                	
					                </tr>
				                </thead>
				                <tbody>
										<tr role="row" class="odd">
											<td>{{ $cotacao->numero_cotacao }}</td>
											<td>{{ $cotacao->nome_contato_metal }}</td>
											<td>{{ $cotacao->created_at }}</td>
											<td>{{ $cotacao->updated_at }}</td>
										</tr>
				            	</tbody>
				            	<tfoot>      		
					            </tfoot>
								
					        </table>
						</div>

						<div class="container">
						  	<div class="box-body">
							  	
							  	<div class="row">
							  		<div class="divCaixa col-sm-4" >
					      				<b>Nome Contato Empresa: </b>{{ $contato->nome }}
				      				</div>
									<div class="divCaixa col-sm-4">
					      				<b>Contato Metalmax: </b>{{ Auth::user()->name }}
				      				</div>
									<div class="divCaixa col-sm-4">
					      				<b>Condições de Pagamento: </b>{{ $cotacao->tolerancia }}
				      				</div>
								</div>
									
								<div class="row col-sm-12">
									<div class="divCaixaLinha">
										<b>Descrição Cotação </b>{{ $cotacao->descricao_cotacao }}
									</div>
								</div>

						 	</div>
						</div>

						<div class="col-sm-12">
							<table id="products-table" class="table table-bordered col-sm-8">
					        	<tbody>
					        		<tr>
					        			<th>Descrição</th>
					        			<th>Quantidade</th>
					        			<th>Unidade</th> 
					        			<th>Valor</th>
					        			
					        		</tr>
					        		@foreach($itens_cotacao as $item)
					        		<tr>
					        			<td>{{ $item->item_desc }}</td>
					        			<td>{{ $item->quantidade }}</td>
								    	<td>{{ $item->unidade }}</td>
								    	<td>{{ number_format($item->valor, 2, ',', '.') }}</td>
								    	
					        		</tr>
					        		@endforeach	
					        	</tbody>		
					        	
							</table>
								
							<div class="divCaixaLinha">

								<div>
				      				<b>Observação - Comentários </b>
			      				</div>
			      				<div>
			      					{{ $cotacao->observacao }}
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