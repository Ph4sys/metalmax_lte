<div class="box box-default">
	<div class="container">
	  <div class="box-header with-border">
	    <h3 class="box-title">Contato</h3>
	  </div>
	  <div class="box-body">
		  	<div class="box-body">
			  <div class="row">
			    <div class="form-group col-xs-8 col-md-8">
			    	<label>Nome</label>
					<input type="text" name="nome" class="form-control" value="{{ isset($contato->nome) ? $contato->nome : ''}}" placeholder="Entre com o nome do bairro">
			    </div>
			    <div class="form-group col-xs-2 col-md-2">
			    	<label>Telefone</label>
					<input id="telefone" type="text" name="telefone" class="form-control" value="{{ isset($contato->telefone) ? $contato->telefone : ''}}">
			    </div>
			    
				<div class="form-group col-xs-2 col-md-2">
			    	<label>Celular</label>
					<input id="celular" type="text" name="celular" class="form-control" value="{{ isset($contato->celular) ? $contato->celular : ''}}">
			    </div>

			  </div>
				<div class="row">
				    <div class="form-group col-xs-8 col-md-12">
				    	<label>E-mail</label>
							<input type="email" name="email" class="form-control" value="{{ isset($contato->email) ? $contato->email : ''}}" placeholder="Entre com a sigla do estado">
				    </div>
						<div class="form-group col-xs-8 col-md-12">
				    	<label>Função</label>
							<input type="email" name="email" class="form-control" value="{{ isset($contato->email) ? $contato->email : ''}}" placeholder="Entre com a sigla do estado">
				    </div>
				</div>
			  
			</div>
		</div>
	  <!-- /.box-body -->
	</div>
</div>