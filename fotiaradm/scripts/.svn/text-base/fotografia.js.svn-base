$(document).ready(function() {
	$("a.viewpicture").fancybox({
		'hideOnContentClick': true
	});
	
	$("a[id^=inline]").fancybox({
		'hideOnContentClick': true
	});
	
	$('#selectall').click(seleccionTodas);
	
	seleccionTodas();
	
});

function seleccionTodas()
{
	if ($('#selectall').attr('checked'))
	{
		$("input[id^=c]").attr('checked','true');
	}
	else
	{
		$("input[id^=c]").removeAttr('checked');
	}
}
/*$('a[id*="rotate"]').click(function(){
	var id = $(this).attr('id');
	id = id.substr(6);
	var src = $("#"+id+"img").attr('src');
	src = src.replace(/\?.*$/, '') + '?' + Math.random();
	var timestamp = new Date().getTime();
	$("#"+id+"img").fadeOut('fast').attr("src", src).fadeIn('fast');
	});*/

