<div class="box box-default">
	<div class="container">
	  <div class="box-header with-border">
	    <h3 class="box-title">Adicionar Pedido</h3>
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
						            <option value="{{ $situacao->id }}" {{(isset($registro->situacao_id) && $registro->situacao_id == $situacao->id  ? 'selected' : '')}}>{{ $situacao->situacao_pedido }}</option>
					        @endforeach
						</select>
					</div>
					<div class="form-group col-xs-6 col-md-3">
				    	<label>Quantidade Itens</label>
						<input type="text" name="qtd_itens" class="form-control" value="{{ $pedido->qtd_itens}}">
				    </div>
				     <div class="form-group col-xs-6 col-md-3">
				    	<label>Valor Total Pedido</label>
						<input type="text" name="valor_total" class="dinheiro form-control" value="{{ $pedido->valor_pedido }}">
				    </div>
				</div>
				<div class="row">
				<div class="form-group col-xs-6 col-md-3">
				    	<label>Ordem Compra (P.C.)</label>
						<input type="text" name="ordem_compra" class="form-control" value="{{ $pedido->ordem_compra}}">
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
						    	<td>{{ $item->valor }}</td>
						    	
			        		</tr>
			        		@endforeach	
			        	</tbody>		
			        	
					</table>
						
					<div class="row">
						<div class="  col-sm-6">
		      				<b>Condições de Pagamento</b>
						</div>
						<div class="divCaixaLinha_pedido">
	      					{{ $cotacao->tolerancia }}
						</div>	
					</div>

					<div class="row">
						<div class="  col-sm-3">
						<label>Pedido Confirmado?</label>
						<select name="confirmacao_pedido" class="form-control">
									 	<option value="não" {{(isset($pedido->confirmacao_pedido) && $pedido->confirmacao_pedido == 'nao'  ? 'selected' : '')}}>Não</option>
										<option value="sim" {{(isset($pedido->confirmacao_pedido) && $pedido->confirmacao_pedido == 'sim'  ? 'selected' : '')}}>Sim</option>
				 		</select>
						</div>	
					</div>
                  
				</div>

			</div>
		</div>
	  <!-- /.box-body -->
	</div>
</div>

<!-- 
<div class="form-group col-xs-6 col-md-3">
	<label>Número Cotação</label>
	<input type="text" name="contato_id" class="form-control" value="{{ isset($cotacao->numero_cotacao) ? $cotacao->numero_cotacao : ''}}">
</div>
-->