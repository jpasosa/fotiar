$(document).ready(function() {

	$('#categoria_id').change(loadporCategoria);
	
	loadporCategoria();
	
	$('#form_evento').submit(function(){
		$('#hidden_subcategoria_id').val( $('#subcategoria_id').val());
	});

});	

function loadporCategoria()
{
	$('#subcategoria_id').empty();
	$.getJSON(getUrl('subcategoria','getbycategory','format=json&categoria_id='+$('#categoria_id').val()), function(json) { 
		$('#subcategoria_id').append('<option label="-- Seleccione --" value="">--Seleccionar--</option>');
		if (json.subcategorias.length > 0)
		{
			for (var i in json.subcategorias)
			{
				var o = json.subcategorias[i];
				var selected = '';
				if ($('#hidden_subcategoria_id').val() == o.id)
				{
					selected = 'selected="selected"';
				}
				$('#subcategoria_id').append('<option label="'+o.descripcion+'" value="'+o.id+'" '+selected+'>'+o.descripcion+'</option>');
			} 
		}
	});
}
