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
			  <li><a href="{{ route('admin.clientes')}}"></i>Lista de Clientes</a></li>
			  <li><a href="{{ route('admin.clientes.detalhe', $cotacao->contato->cliente->id )}}"></i> Detalhe</a></li>
			  <li><a href="{{ route('admin.hcontatos',$cotacao->contato->id)}}"></i> Histórico Contatos</a></li>
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
			</div>
	  	</div>

	  	<div class="col-xs-12">
  		<div class="box">
			<div class="box-header">
              <h3 class="box-title">Pedido</h3>
              	
            	<div class="box-tools pull-right">
	            	<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	            	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          		</div>
         	</div>
	        
         	<div class="box-body">
			  	<div class="box-body">
				  	<div class="row">
				  		<div class="form-group col-xs-6 col-md-3">
					    	<label>Empresa</label>
							<input type="text" name="qtd_itens" class="form-control" value="{{ $contato->cliente->nome}}">
					    </div>
					    <div class="form-group col-xs-6 col-md-3">
					    	<label>Contato Empresa</label>
							<input type="text" name="contato_id" class="form-control" value="{{ $contato->nome}}">
					    </div>
					    <div class="form-group col-xs-6 col-md-3">
					    	<label>Número Pedido</label>
							<input type="text" name="numero_pedido" class="form-control" value="{{ $pedido->numero_pedido }}">
					    </div>
					    <div class="form-group col-xs-6 col-md-3">
					    	<label>Número Cotação Vinculada ao Pedido</label>
							<input type="text" name="cotacao_num" class="form-control" value="{{ $cotacao->numero_cotacao}}">
					    </div>
					    <input type="hidden" name="contato_id" class="form-control" value="{{ $contato->id}}">
					    <input type="hidden" name="cotacao_id" class="form-control" value="{{ $cotacao->id}}">
				  	</div>

				  	<div class="row">
					    <div class="form-group col-xs-6 col-md-3">
					    	<label>Número N.F.</label>
							<input type="text" name="numero_nf" class="form-control" value="{{ isset($pedido->numero_nf) ? $pedido->numero_nf : '' }}">
					    </div>
					    <div class="form-group col-xs-6 col-md-3"">
							<label>Situação</label>
							<select name="situacao_pedido" class="form-control">
								@foreach($situacoes as $situacao)
							            <option value="{{ $situacao->id }}" {{(isset($situacao->situacao_id) && $situacao->situacao_id == $situacao->id  ? 'selected' : '')}}>{{ $situacao->situacao_pedido }}</option>
						        @endforeach
							</select>
						</div>
						<div class="form-group col-xs-6 col-md-3">
					    	<label>Quantidade Itens</label>
							<input type="text" name="qtd_itens" class="form-control" value="{{ $pedido->qtd_itens}}">
					    </div>
					     <div class="form-group col-xs-6 col-md-3">
					    	<label>Valor Total Pedido</label>
							<input type="text" name="valor_total" class="form-control" value="{{ $pedido->valor_pedido }}">
					    </div>
					</div>
					
					<div>
						<h4 class="box-title">Itens do Pedido</h4>
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
							
						<div class="row">
							<div class="  col-sm-12">
			      				<b>Observação - Comentários </b>
		      				</div>
		      				<div class="divCaixaLinha_pedido">
		      					{{ $cotacao->observacao }}
		      				</div>
						</div>
					
					</div>

				</div>
			</div>
		
		</div>
	
	</div>

</div>
@endsection