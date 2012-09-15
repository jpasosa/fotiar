$(document).ready(function(){
	$("a[rel=\'ampliar-foto\']").colorbox({
		current:"{current} de {total}",
		height: '579px',
		loop: false,
		scrolling: false,
		width: '750px',
		onComplete: function(){$("a[rel=\'ampliar-foto\']").colorbox.resize();}
	});

	$("a[rel=\'ampliar\']").colorbox({
		current:"{current} de {total}",
		height: '579px',
		loop: false,
		scrolling: false,
		width: '750px',
		onComplete: function(){$("a[rel=\'ampliar\']").colorbox.resize();}
	});

	$("a[rel=\'enviar\']").colorbox({
		current:"{current} de {total}",
		height: '579px',
		loop: false,
		scrolling: false,
		width: '750px',
		onComplete: function(){$("a[rel=\'enviar\']").colorbox.resize();}
	});

//	$("a[rel=\'ampliar\']").colorbox.resize();
});

function desplegar_extra(targ) {
	$("#extra-"+targ).siblings().hide();
	$("#extra-"+targ).toggle();
	$("a."+targ).parent().siblings().find("a").removeClass("shown");
	$("a."+targ).toggleClass("shown");
	$("a[rel=\'ampliar-foto\']").colorbox.resize();
	$("a[rel=\'ampliar\']").colorbox.resize();
}