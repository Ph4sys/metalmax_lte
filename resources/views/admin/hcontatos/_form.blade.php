<div class="box box-default">
	<div class="container">
	  <div class="box-header with-border">
	    <h3 class="box-title">Histórico Contato</h3>
	  </div>
	  <div class="box-body">
		  	<div class="box-body">
			  	<div class="row">
				    <div class="form-group col-xs-6 col-md-6">
				    	<label>Nome Contato</label>
						<input type="text" name="contato_id" class="form-control" value="{{ $contato->nome }}">
				    </div>
				    <div class="form-group col-xs-6 col-md-6">
				    	<label>Contato Metalmax</label>
						<input type="text" name="nome_contato_metal" class="form-control" value="{{ Auth::user()->name }}">
				    </div>
				</div>
				<div class="row">
				    <div class="form-group col-xs-12 col-md-12">
			    		<label>Descrição Contato</label>
						<textarea type="text" name="descricao_contato" class="form-control">{{ isset($hcontato->descricao_contato) ? $hcontato->descricao_contato : ''}}</textarea>
						
			    	</div>
				</div>
			</div>
		</div>
	  <!-- /.box-body -->
	</div>
</div>