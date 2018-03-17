<div class="box box-default">
	<div class="container">
	  <div class="box-header with-border">
	    <h3 class="box-title">Nova Situação</h3>
	  </div>
	  <div class="box-body">
	    <div class="form-group" >
			<label>Situação</label>
			<input type="text" name="situacao" class="form-control" value="{{ isset($registro->situacao) ? $registro->situacao : ''}}" placeholder="Entre com a situação">
	    </div>
	  </div>
	  <!-- /.box-body -->
	</div>
</div>