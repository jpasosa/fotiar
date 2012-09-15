$(document).ready(function(){
	
	
	  function actualizar_combos() {
	    $("#cbo-subcategoria .content").fadeOut(function() {
		  $("#cbo-subcategoria .loading").fadeIn(function() {
		    $("#cbo-subcategoria").load("busqueda/refreshCboSubcat?categoria="+$("#busqueda_categoria_id").val());
		  });
		});
	  }

  
    $("#busqueda_categoria_id").change(function() {
      actualizar_combos();
    });
    
//    $("#busqueda_categoria_id").val('<?=$grupo;?>');
//    actualizar_combos();
    
// TODO: Revisar si es que hay bug en explorer
//	if ( $.browser.msie ) {
//		$('#carrera_id').live('focus',function(e){
//		$(this).data('original_width',$(this).width());																		 
//		$(this).css('width','auto');																		 
//		});
//		$('#carrera_id').live('change',function(e){
//			$(this).blur();
//		});
//		$('#carrera_id').live('blur',function(e){
//			$(this).css('width',$(this).data('original_width')+'px');
//	});
});