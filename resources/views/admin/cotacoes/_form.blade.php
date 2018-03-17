<div class="box box-default">
	<div class="container">
	  <div class="box-header with-border">
	    <h3 class="box-title">Adicionar Cotações</h3>
	  </div>
	  <div class="box-body">
		  	<div class="box-body">
			  	<div class="row">
				    <div class="form-group col-xs-6 col-md-4">
				    	<label>Nome Contato Empresa</label>
						<input type="text" name="contato_nome" class="form-control" value="{{ $contato->nome }}">
				    </div>
				    <div class="form-group col-xs-6 col-md-4">
				    	<label>Contato Metalmax</label>
						<input type="text" name="nome_contato_metal" class="form-control" value="{{ Auth::user()->name }}">
				    </div>
				    <div class="form-group col-xs-6 col-md-4">
				    	<label>Condições de Pagamento</label>
						<input type="text" name="tolerancia" class="form-control" value="{{ isset($cotacao->tolerancia) ? $cotacao->tolerancia : '' }}">
				    </div>
				</div>

							
		        <table id="products-table" class="table table-bordered">
		        	<tbody>
		        		<tr>
		        			<th>Descrição</th>
		        			<th>Quantidade</th>
		        			<th>Unidade</th> 
		        			<th>Valor</th>
		        			<th>Ações</th>
		        		</tr>
		        		@foreach($itens_cotacao as $item)
		        		<tr>
		        			<td><input type="text" name="dados[].desc[]" class="form-control" 
		        				value="{{ isset($item->item_desc) ? $item->item_desc : '' }}"> </td>
		        			<td><input type="text" name="dados[].qtd[]" class="form-control" 
		        				value="{{ isset($item->quantidade) ? $item->quantidade : '' }}"></td>
					    	<td>
					    		<select name="dados[].und[]" class="form-control">
					    			<option value="pç">pç</option>
					    			<option value="kg">kg</option>
					    		</select>
					    	</td>
					    	<td><input type="text" name="dados[].val[]" class="dinheiro form-control"
					    		value="{{ isset($item->valor) ? $item->valor : '' }}"></td>
					    	<td>
    							<button onclick="RemoveTableRow(this)" type="button">Remover</button>
    						</td>
		        		</tr>

		        		<!--value="{{ isset($item->unidade) ? $item->unidade : '' }}"-->

		        		@endforeach	
		        	</tbody>		
		        	<tfoot>		 
		        		<tr>		   
		        			<td colspan="5" style="text-align: left;">		     
							<button onclick="AddTableRow()" type="button">Adicionar Produto</button>		   
							</td>
						</tr>		
					</tfoot>		
				</table>

				<div class="row">
				    <div class="form-group col-xs-12 col-md-12">
			    		<label>Observação - Comentários</label>
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