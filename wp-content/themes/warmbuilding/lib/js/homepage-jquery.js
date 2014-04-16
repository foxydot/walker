jQuery(document).ready(function($) {
	var numwidgets = $('.footer-widgets-1 div.widget').length;
	$('.footer-widgets-1').addClass('cols-'+numwidgets);
	//$('.footer-widgets-1 .widget,.footer-widgets-1 .widget .widget-wrap').equalHeights();
	$('.equalize').equalHeights();
	
	$('#hp-bot a.widget_sp_image-link').mouseenter(function(){
	    var src = origsrc = $(this).find('img').attr('src');
	    $(this).find('img').attr('src',src.replace('.png','-over.png'));
	}).mouseleave(function(){
        $(this).find('img').attr('src',origsrc);
	});
	
	
});