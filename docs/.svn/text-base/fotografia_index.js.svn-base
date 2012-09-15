$(document).ready(function() {
	$('#tipobusqueda-0').click(tipoBusqueda);
	$('#tipobusqueda-1').click(tipoBusqueda);
	$('#tipobusqueda-2').click(tipoBusqueda);
	
	if ($('#sesion_id').val()=='')
		{
			if ($("#form_Busqueda input[name='carga_id']:checked").val()!= null)
			{
				$('#tipobusqueda-2').attr('checked',true);
			}
			else
			{
				$('#tipobusqueda-0').attr('checked',true);
			
			}
		}
	else
		{
		$('#tipobusqueda-1').attr('checked',true);
		}
	
	tipoBusqueda();
	
	$("#fechainicial").datepicker($.extend({}, 
			$.datepicker.regional["es"], { 
	    	showStatus: true,
	    	dateFormat: "yy/mm/dd"
		})); 
		
	if ($("#fechainicial").val() =='0000-00-00')
	{
		$("#fechainicial").val('');
	} 

		$("#fechafinal").datepicker($.extend({}, 
			$.datepicker.regional["es"], { 
	    	showStatus: true,
	    	dateFormat: "yy/mm/dd"
		})); 
		
	if ($("#fechafinal").val() =='0000-00-00')
	{
		$("#fechafinal").val('');
	} 
	
	$('#categoria_id').change(loadporCategoria);
	
	loadporCategoria();

	if ($('#etiquetalugar').val()=='')
	{
		$('#checklugar').attr('checked',true);
	}
	else
	{
		$('#checklugar').removeAttr('checked');
	}

	$('#checklugar').click(unmarkandshowLugar);
	
	showLugarPopular();

	if ($('#etiquetatema').val()=='')
	{
		$('#checktema').attr('checked',true);
	}
	else
	{
		$('#checktema').removeAttr('checked');
	}

	$('#checktema').click(unmarkandshowTema);
	
	showTemaPopular();
	
	$('#form_Catalogado').submit(function(){
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

function unmarkandshowLugar()
{
	$("[id^=lugares-]").removeAttr('checked');
	showLugarPopular();
}
function unmarkandshowTema()
{
	$("[id^=temas-]").removeAttr('checked');
	showTemaPopular();
}

function showLugarPopular()
{
if ($('#tipobusqueda-0').attr('checked')){
	if ($('#checklugar').attr('checked'))
		{
			$('#lugares-label').show();
			$('#lugares-element').show();
			$('#etiquetalugar-label').hide();
			$('#etiquetalugar-element').hide();
			$('#etiquetalugar').val('');			
		}
	else
		{
			$('#lugares-label').hide();
			$('#lugares-element').hide();		
			$('#etiquetalugar-label').show();
			$('#etiquetalugar-element').show();
			//$("[id^=lugares-]").removeAttr('checked');
		}
}}

function showTemaPopular()
{
if ($('#tipobusqueda-0').attr('checked')){	
	if ($('#checktema').attr('checked') && $('#tipobusqueda-0').attr('checked'))
		{
			$('#temas-label').show();
			$('#temas-element').show();
			$('#etiquetatema-label').hide();
			$('#etiquetatema-element').hide();
			$('#etiquetatema').val('');
		}
	else
		{
			$('#temas-label').hide();
			$('#temas-element').hide();
			$('#etiquetatema-label').show();
			$('#etiquetatema-element').show();
			//$("[id^=temas-]").removeAttr('checked');
		}
}}

function tipoBusqueda()
{
	if ($('#tipobusqueda-0').attr('checked'))
		{
			$('#sesion_id-label').hide();
			$('#sesion_id-element').hide();
			$('#carga_id-label').hide();
			$('#carga_id-element').hide();
			$('#sesion_id').val('');
			$('#sesion_id').removeAttr('required');
			$('input[name="carga_id"]').attr('checked',false);
			
			
			$('#ordenbusqueda-label').show();
			$('#ordenbusqueda-element').show();
			$('#usuario_id-label').show();
			$('#usuario_id-element').show();	
			$('#categoria_id-label').show();
			$('#categoria_id-element').show();	
			$('#subcategoria_id-label').show();
			$('#subcategoria_id-element').show();	
			$('#etiquetatema-label').show();
			$('#etiquetatema-element').show();	
			$('#tema-label').show();
			$('#tema-element').show();
			$('#temas-label').show();
			$('#temas-element').show();	
			$('#checktema-label').show();
			$('#checktema-element').show();
			$('#etiquetalugar-label').show();
			$('#etiquetalugar-element').show();	
			$('#lugares-label').show();
			$('#lugares-element').show();
			$('#lugar-label').show();
			$('#lugar-element').show();	
			$('#checklugar-label').show();
			$('#checklugar-element').show();
			$('#fechainicial-label').show();
			$('#fechainicial-element').show();	
			$('#fechafinal-label').show();
			$('#fechafinal-element').show();	
			
			showTemaPopular();
			showLugarPopular();

		}


	if ($('#tipobusqueda-1').attr('checked'))
		{
			$('#sesion_id-label').show();
			$('#sesion_id-element').show();
			$('#sesion_id').attr('required', 'true');
			$('input[name="carga_id"]').attr('checked',false);
			
			$('#ordenbusqueda-label').hide();
			$('#ordenbusqueda-element').hide();
			$('#usuario_id-label').hide();
			$('#usuario_id-element').hide();	
			$('#categoria_id-label').hide();
			$('#categoria_id-element').hide();	
			$('#subcategoria_id-label').hide();
			$('#subcategoria_id-element').hide();	
			$('#etiquetatema-label').hide();
			$('#etiquetatema-element').hide();	
			$('#tema-label').hide();
			$('#tema-element').hide();	
			$('#temas-label').hide();
			$('#temas-element').hide();
			$('#checktema-label').hide();
			$('#checktema-element').hide();	
			$('#etiquetalugar-label').hide();
			$('#etiquetalugar-element').hide();	
			$('#lugar-label').hide();
			$('#lugar-element').hide();	
			$('#lugares-label').hide();
			$('#lugares-element').hide();	
			$('#checklugar-label').hide();
			$('#checklugar-element').hide();
			$('#fechainicial-label').hide();
			$('#fechainicial-element').hide();	
			$('#fechafinal-label').hide();
			$('#fechafinal-element').hide();
			$('#carga_id-label').hide();
			$('#carga_id-element').hide();
			
			showTemaPopular();
			showLugarPopular();
		}
	
	if ($('#tipobusqueda-2').attr('checked'))
	{
		$('#carga_id-label').show();
		$('#carga_id-element').show();
		
		$('#sesion_id-label').hide();
		$('#sesion_id-element').hide();
		$('#sesion_id').val('');
		$('#sesion_id').removeAttr('required');
		$('#ordenbusqueda-label').hide();
		$('#ordenbusqueda-element').hide();
		$('#usuario_id-label').hide();
		$('#usuario_id-element').hide();	
		$('#categoria_id-label').hide();
		$('#categoria_id-element').hide();	
		$('#subcategoria_id-label').hide();
		$('#subcategoria_id-element').hide();	
		$('#etiquetatema-label').hide();
		$('#etiquetatema-element').hide();	
		$('#tema-label').hide();
		$('#tema-element').hide();	
		$('#temas-label').hide();
		$('#temas-element').hide();
		$('#checktema-label').hide();
		$('#checktema-element').hide();	
		$('#etiquetalugar-label').hide();
		$('#etiquetalugar-element').hide();	
		$('#lugar-label').hide();
		$('#lugar-element').hide();	
		$('#lugares-label').hide();
		$('#lugares-element').hide();	
		$('#checklugar-label').hide();
		$('#checklugar-element').hide();
		$('#fechainicial-label').hide();
		$('#fechainicial-element').hide();	
		$('#fechafinal-label').hide();
		$('#fechafinal-element').hide();
		
		showTemaPopular();
		showLugarPopular();
	}
}