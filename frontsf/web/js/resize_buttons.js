$(document).ready(function(){
	$('.button-standarization').each(function(){
		  var new_width = 0;
      new_width += $(this).find('.left').width();
      new_width += $(this).find('.middle').width();
      new_width += $(this).find('.right').width();
		  $(this).width(new_width);
  })
});