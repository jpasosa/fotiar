$(document).ready(function() {

	$('#categoria_id').change(loadporCategoria);
	
	$('#upload').hide();
	
	$('#uploadbutton').hide();
	
	$('#subcategoria_id').append('<option label="-- Seleccione --" value="">--Seleccionar--</option>');
	
	$('#form_Carga').submit(function(){
		$('#hidden_subcategoria_id').val( $('#subcategoria_id').val());
	});
});	

function loadporCategoria()
{
	if ($('#categoria_id').val() != 0)	
		{$('#upload').show();}
	else
		{$('#upload').hide();$('#uploadbutton').hide();}
	
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