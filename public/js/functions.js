(function($) {
	
	AddTableRow = function() {

    var newRow = $("<tr>");
    var cols = "";
    var x = +1;
    cols += '<td><input type="text" name="dados[].desc[]" class="form-control"></td>';
    cols += '<td><input type="text" name="dados[].qtd[]" class="form-control"></td>';
    cols += '<td><select name="dados[].und[]" class="form-control"><option value="pç">pç</option><option value="kg">kg</option></select></td>';
    cols += '<td><input type="text" name="dados[].val[]" class="dinheiro form-control"></td>';

    cols += '<td>';
    cols += '<button onclick="RemoveTableRow(this)" type="button">Remover</button>';
    cols += '</td>';

    newRow.append(cols);
    $("#products-table").append($(newRow).clone(true));

    return false;

	};


})(jQuery);

(function($) {

	RemoveTableRow = function(item) {    
			
		var tr = $(item).closest('tr');	

	    tr.fadeOut(400, function() {		
	          tr.remove();  		   
	    });		
	    
	    return false;		
	}

})(jQuery);

$(document).ready(function(){
    $("input.dinheiro").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});
    //Cliente Table 
    $('#tableClientes').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false,
        'pageLength':10,
        "oLanguage": {
          "sSearch": "Apply filter _INPUT_ to table",
          "sInfo": "Mostrando _START_ to _END_ of _TOTAL_ registros",
          "sLengthMenu": 'Mostrar <select>'+
            '<option value="2">2</option>'+
            '<option value="3">3</option>'+
            '<option value="4">4</option>'+
            '<option value="5">5</option>'+
            '<option value="8">8</option>'+
            '<option value="10">10</option>'+
            '<option value="20">20</option>'+
            '<option value="-1">All</option>'+
            '</select> registros',
          "oPaginate": {
            "sNext": ">",
            "sPrevious": "<"
          }
        }
    });
    $('#tableContatos').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false,
        'pageLength':3,
        "order": [[ 0, 'desc' ]],
        "oLanguage": {
          "sSearch": "Apply filter _INPUT_ to table",
          "sInfo": "Mostrando _START_ to _END_ of _TOTAL_ registros",
          "sLengthMenu": 'Mostrar <select>'+
            '<option value="2">2</option>'+
            '<option value="3">3</option>'+
            '<option value="4">4</option>'+
            '<option value="5">5</option>'+
            '<option value="8">8</option>'+
            '<option value="10">10</option>'+
            '<option value="20">20</option>'+
            '<option value="-1">All</option>'+
            '</select> registros',
          "oPaginate": {
            "sNext": ">",
            "sPrevious": "<"
          }
        }
    });
    $('#tableTransportadoras').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false,
        'pageLength':1,
        "order": [[ 0, 'desc' ]],
        "oLanguage": {
          "sSearch": "Apply filter _INPUT_ to table",
          "sInfo": "Mostrando _START_ to _END_ of _TOTAL_ registros",
          "sLengthMenu": 'Mostrar <select>'+
            '<option value="1">1</option>'+
            '<option value="-1">All</option>'+
            '</select> registros',
          "oPaginate": {
            "sNext": ">",
            "sPrevious": "<"
          }
        }
    });
    $('#tableHContatos').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false,
        'pageLength':3,
        "order": [[ 0, 'desc' ]],
        "oLanguage": {
          "sSearch": "Apply filter _INPUT_ to table",
          "sInfo": "Mostrando _START_ to _END_ of _TOTAL_ registros",
          "sLengthMenu": 'Mostrar <select>'+
            '<option value="1">1</option>'+
            '<option value="2">2</option>'+
            '<option value="3">3</option>'+
            '<option value="4">4</option>'+
            '<option value="6">6</option>'+
            '<option value="8">8</option>'+
            '<option value="-1">All</option>'+
            '</select> registros',
          "oPaginate": {
            "sNext": ">",
            "sPrevious": "<"
          }
        }
    });
    $('#tableHCotacoes').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false,
        'pageLength':3,
        "order": [[ 0, 'desc' ]],
        "oLanguage": {
          "sSearch": "Apply filter _INPUT_ to table",
          "sInfo": "Mostrando _START_ to _END_ of _TOTAL_ registros",
          "sLengthMenu": 'Mostrar <select>'+
            '<option value="1">1</option>'+
            '<option value="2">2</option>'+
            '<option value="3">3</option>'+
            '<option value="4">4</option>'+
            '<option value="6">6</option>'+
            '<option value="8">8</option>'+
            '<option value="-1">All</option>'+
            '</select> registros',
          "oPaginate": {
            "sNext": ">",
            "sPrevious": "<"
          }
        }
    });
    $('#tableHPedidos').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false,
        'pageLength':3,
        "order": [[ 0, 'desc' ]],
        "oLanguage": {
          "sSearch": "Apply filter _INPUT_ to table",
          "sInfo": "Mostrando _START_ to _END_ of _TOTAL_ registros",
          "sLengthMenu": 'Mostrar <select>'+
            '<option value="1">1</option>'+
            '<option value="2">2</option>'+
            '<option value="3">3</option>'+
            '<option value="4">4</option>'+
            '<option value="6">6</option>'+
            '<option value="8">8</option>'+
            '<option value="-1">All</option>'+
            '</select> registros',
          "oPaginate": {
            "sNext": ">",
            "sPrevious": "<"
          }
        }
    });
});