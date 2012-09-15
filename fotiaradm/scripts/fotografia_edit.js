$(document).ready(function() {

	$('#categoria_id').change(loadporCategoria);
	
	loadporCategoria();
	
	$('#checklugar').attr('checked','true');
	$('#checktema').attr('checked','true');
	$('#checkcategorias').attr('checked','true');

	$('#checkcategorias').click(showcategorias);
	
	showcategorias();
	
	$('#checklugar').click(showLugarPopular);
	
	showLugarPopular();

	$('#checktema').click(showTemaPopular);
	
	showTemaPopular();
	
	$('#form_Catalogado').submit(function(){
		$('#hidden_subcategoria_id').val( $('#subcategoria_id').val());
	});
	
	$("a.viewpicture").fancybox({
		'hideOnContentClick': true
	});
	
	$("a[id^=inline]").fancybox({
		'hideOnContentClick': true,
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

function showLugarPopular()
{
	if ($('#checklugar').attr('checked'))
		{
			$('#lugares-label').show();
			$('#lugares-element').show();
		}
	else
		{
			$('#lugares-label').hide();
			$('#lugares-element').hide();		
		}
}

function showTemaPopular()
{
	if ($('#checktema').attr('checked'))
		{
			$('#temas-label').show();
			$('#temas-element').show();
		}
	else
		{
			$('#temas-label').hide();
			$('#temas-element').hide();		
		}
}

function showcategorias()
{
	if ($('#checkcategorias').attr('checked'))
		{
			$('#categoria_id-label').show();
			$('#categoria_id-element').show();
			$('#subcategoria_id-label').show();
			$('#subcategoria_id-element').show();
		}
	else
		{
			$('#categoria_id-label').hide();
			$('#categoria_id-element').hide();	
			$('#subcategoria_id-label').hide();
			$('#subcategoria_id-element').hide();	
		}
}