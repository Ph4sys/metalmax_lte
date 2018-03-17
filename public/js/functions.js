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
});