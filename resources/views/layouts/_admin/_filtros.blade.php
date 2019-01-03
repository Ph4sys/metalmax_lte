
  		<form action="{{route('admin.clientes.busca')}}">
	        <table id="products-table" class="table table-bordered">
	        	<tbody>
	        		<tr>
	        			<th>Nome</th>
	        			<th>CNPJ</th>
	        			<th>Classe</th>
	        			<th>Situação</th> 
	        			<th>Cidade</th>
	        			<th></th>
	        		</tr>		 
	        		<tr>		   
	        			<td>
	        				<input type="text" name="nome" class="form-control" value="{{ isset($busca['nome']) ? $busca['nome'] : '' }}">
	        			</td>

	        			<td>
	        				<input type="text" name="cnpj" class="form-control" value="{{ isset($busca['cnpj']) ? $busca['cnpj'] : '' }}">
	        			</td>

	        			<td>
	        				<select name="classe_id" class="form-control">
	        					<option {{ isset($busca['classe_id']) && $busca['classe_id'] == 'todos' ? 'selected' : '' }} value="todos">Todas as classes</option>
						        @foreach($classes as $classe)
						            <option {{ isset($busca['classe_id']) && $busca['classe_id'] == $classe->id ? 'selected' : '' }} value="{{ $classe->id }}">{{ $classe->classe }}</option>
						        @endforeach
				    		</select>
					    </td>
					    
				    	<td>
				    		<select name="situacao_id" class="form-control">
				    			<option {{ isset($busca['situacao_id']) && $busca['situacao_id'] == 'todos' ? 'selected' : '' }} value="todos">Todas as situações</option>
						        @foreach($situacoes as $situacao)
						            <option {{ isset($busca['situacao_id']) && $busca['situacao_id'] == $situacao->id ? 'selected' : '' }} value="{{ $situacao->id }}">{{ $situacao->situacao }}</option>
						        @endforeach
						    </select>
				    	</td>
				    	<td>
				    		<select name="cidade_id" class="form-control">
				    			<option {{ isset($busca['cidade_id']) && $busca['cidade_id'] == 'todos' ? 'selected' : '' }} value="todos">Todas as cidades</option>
								@foreach($cidades as $cidade)
							            <option {{ isset($busca['cidade_id']) && $busca['cidade_id'] == $cidade->id ? 'selected' : '' }} value="{{ $cidade->id }}">{{ $cidade->nome }}</option>
						        @endforeach
							</select>
				    	</td>
				    	<td>
							<button class="btn btn-primary" align="center" >Filtrar</button>
						</td>
	        		</tr>
	        		<tr>
	        			<td>
	        				<a class="btn btn-primary" alt="Adicionar novo cliente" href="{{route('admin.clientes.adicionar')}}">+ Novo Cliente</a>	
	        			</td>
	        		</tr>		
	        	</tbody>		
	        	<tfoot></tfoot>		
			</table>
		</form>