$(document).ready(function() {

	$('#hidden_sesion-label,#hidden_sesion-element').hide();
	
	$('#sesion_id').change(verificaSesion);

	verificaSesion();
});	


function verificaSesion()
{
	if ($('#sesion_id').val() == '0')
	{

		$('#hidden_sesion-label,#hidden_sesion-element').show();
	}
	else
	{
		$('#hidden_sesion-label,#hidden_sesion-element').hide();
		$('#hidden_sesion').val('');
	}
}
