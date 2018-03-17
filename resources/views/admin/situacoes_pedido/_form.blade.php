<div class="box box-default">
	<div class="container">
	  <div class="box-header with-border">
	    <h3 class="box-title">Nova Situação</h3>
	  </div>
	  <div class="box-body">
	    <div class="form-group" >
			<label>Situação Pedido</label>
			<input type="text" name="situacao" class="form-control" value="{{ isset($registro->situacao_pedido) ? $registro->situacao_pedido : ''}}" placeholder="Entre com a situação">
	    </div>
	  </div>
	  <!-- /.box-body -->
	</div>
</div>