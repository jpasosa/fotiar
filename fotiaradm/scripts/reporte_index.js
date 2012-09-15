$(document).ready(function() {

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
	
});	

function anoCurso()
{
	var d = new Date();
	$("#fechainicial").val(d.getFullYear()+'-01-01');
	$("#fechafinal").val(d.getFullYear()+'-'+(d.getMonth()+1)+'-'+d.getDate());
}

function mesAnterior()
{
	var d = new Date();
	
	if(d.getMonth()== 0){
		$("#fechainicial").val((d.getFullYear()-1)+'-12-01');
		$("#fechafinal").val((d.getFullYear()-1)+'-12-31');
	}
	else{
		var dias = new Date(d.getFullYear(), d.getMonth(), 0).getDate();
		$("#fechainicial").val(d.getFullYear()+'-'+d.getMonth()+'-01');
		$("#fechafinal").val(d.getFullYear()+'-'+d.getMonth()+'-'+dias);
	}
}