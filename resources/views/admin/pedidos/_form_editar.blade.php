<div class="box box-default">
	<div class="container">
	  <div class="box-header with-border">
	    <h3 class="box-title">Editar Pedido 2</h3>
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
						<input type="text" name="numero_pedido" class="form-control" value="{{ $numero }}">
				    </div>
				    <div class="form-group col-xs-6 col-md-3">
				    	<label>Número Cotação Vinculada ao Pedido</label>
						<input type="text" name="cotacao_id" class="form-control" value="{{ $cotacao->numero_cotacao}}">
				    </div>
				    <input type="hidden" name="contato_id" class="form-control" value="{{ $contato->id}}">
			  	</div>
				
		        <table id="products-table" class="table table-bordered">
		        	<tbody>
		        		<tr>
		        			<th>Descrição</th>
		        			<th>Quantidade</th>
		        			<th>Unidade</th> 
		        			<th>Valor</th>
		        		</tr>
						@foreach($itens_cotacao as $item)
		        		<tr>		   
		        			<td><input type="text" name="item_desc[]" class="form-control" value="{{$item->item_desc }}"></td>
		        			<td><input type="text" name="quantidade" class="form-control" value="{{$item->quantidade }}"></td>
					    		<td><input type="text" name="unidade" class="form-control" value="{{$item->unidade }}"></td>
					    		<td><input type="text" name="valor" class="dinheiro form-control" value="{{$item->valor }}"></td>
		        		</tr>
	        			@endforeach
		        	</tbody>		
		        	<tfoot>		 
		        			
					</tfoot>		
				</table>

				<div class="row">
				    <div class="form-group col-xs-12 col-md-12">
			    		<label>Observação - Comentários</label>
						<textarea type="text" name="observacao" class="form-control">{{ isset($cotacao->observacao) ? $cotacao->observacao : ''}}</textarea>
			    	</div>
						<div class="form-group col-xs-12 col-md-12">
			    		<label>Pedido - Confirmado?</label>
						<textarea type="text" name="observacao" class="form-control">{{ isset($cotacao->observacao) ? $cotacao->observacao : ''}}</textarea>
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