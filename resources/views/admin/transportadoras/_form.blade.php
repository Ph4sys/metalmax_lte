<div class="box box-default">
	<div class="container">
	  <div class="box-header with-border"><h3 class="box-title">Transportadora</h3></div>
		<div class="box-body">
		  	<div class="box-body">
			  <div class="row">
			    <div class="form-group col-xs-9 col-md-9">
			    	<label>Nome</label>
					<input type="text" name="nome" class="form-control" value="{{ isset($transportadora->nome) ? $transportadora->nome : ''}}" placeholder="Entre com o nome da transportadora">
			    </div>
			    <div class="form-group col-xs-3 col-md-3">
			    	<label>Telefone</label>
					<input id="telefone" type="text" name="telefone" class="form-control" value="{{ isset($transportadora->telefone) ? $transportadora->telefone : ''}}" placeholder="Entre com o número do telefone">
			    </div>
			  </div>
			  <div class="row">
			    <div class="form-group col-xs-6 col-md-10">
			    	<label>Endereço entrega</label>
						<input type="text" name="endereco" class="form-control" value="{{ isset($transportadora->endereco) ? $transportadora->endereco : ''}}" placeholder="Entre com o endereço">
			    </div>
			    <div class="form-group col-xs-6 col-md-2">
			    	<label>Bairro</label>
						<div class="input-field">
						    <select name="bairro_id" class="form-control">
						        @foreach($bairros as $bairro)
						            <option value="{{ $bairro->id }}" {{(isset($transportadora->bairro_id) && $transportadora->bairro_id == $bairro->id  ? 'selected' : '')}}>{{ $bairro->nome }}</option>
						        @endforeach
						    </select>
						</div>
			    </div>
			  </div>
			  <div class="row">
			    <div class="form-group col-xs-4">
			    	<label>Cidade</label>
					<select name="cidade_id" class="form-control">
						@foreach($cidades as $cidade)
					            <option value="{{ $cidade->id }}" {{(isset($transporte->cidade_id) && $transporte->cidade_id == $cidade->id  ? 'selected' : '')}}>{{ $cidade->nome }}</option>
				        @endforeach
					</select>
			    </div>
			    <div class="form-group col-xs-4">
			    	<label>Estado</label>
					<div class="input-field">
					    <select name="estado_id" class="form-control">
					      @foreach($estados as $estado)
					            <option value="{{ $estado->id }}" {{(isset($transportadora->estado_id) && $transportadora->estado_id == $estado->id  ? 'selected' : '')}}>{{ $estado->sigla }}</option>
					        @endforeach
					    </select>
					</div>
			    </div>
			    <div class="form-group col-xs-4">
			    	<label>CEP</label>
					<input id="cep" type="text" name="cep" class="form-control" value="{{ isset($transportadora->cep) ? $transportadora->cep : ''}}" placeholder="Entre com o CEP">
			    </div>
			  </div>
			</div>
		</div>
	</div>
</div>