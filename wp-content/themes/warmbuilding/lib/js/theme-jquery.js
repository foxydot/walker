jQuery(document).ready(function($) {	
	$('ul li:first-child').addClass('first-child');
	$('ul li:last-child').addClass('last-child');
	$('ul li:nth-child(even)').addClass('even');
	$('ul li:nth-child(odd)').addClass('odd');
	$('table tr:first-child').addClass('first-child');
	$('table tr:last-child').addClass('last-child');
	$('table tr:nth-child(even)').addClass('even');
	$('table tr:nth-child(odd)').addClass('odd');
	$('tr td:first-child').addClass('first-child');
	$('tr td:last-child').addClass('last-child');
	$('tr td:nth-child(even)').addClass('even');
	$('tr td:nth-child(odd)').addClass('odd');
	$('div:first-child').addClass('first-child');
	$('div:last-child').addClass('last-child');
	$('div:nth-child(even)').addClass('even');
	$('div:nth-child(odd)').addClass('odd');


	$('#footer-widgets div.widget:first-child').addClass('first-child');
	$('#footer-widgets div.widget:last-child').addClass('last-child');
	$('#footer-widgets div.widget:nth-child(even)').addClass('even');
	$('#footer-widgets div.widget:nth-child(odd)').addClass('odd');
	
	var numwidgets = $('#footer-widgets div.widget').length;
	$('#footer-widgets').addClass('cols-'+numwidgets);
	
	//special for lifestyle
	$('.ftr-menu ul.menu>li').after(function(){
		if(!$(this).hasClass('last-child') && $(this).hasClass('menu-item') && $(this).css('display')!='none'){
			return '<li class="separator">|</li>';
		}
	});
	
});
var MTUserId='1b6a0783-d341-46bf-ab2b-aed0572fb0f2';
var MTFontIds = new Array();

MTFontIds.push("675364"); // Trade Gothic WFS W01 Roman 
MTFontIds.push("675334"); // Trade Gothic WFS W01 Condensed Bold #20 
MTFontIds.push("808520"); // Trade Gothic WFS W01 Extended 
(function() {
var mtTracking = document.createElement('script');
mtTracking.type='text/javascript';
mtTracking.async='true';
mtTracking.src=('https:'==document.location.protocol?'https:':'http:')+'//fast.fonts.net/lt/trackingCode.js';

(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(mtTracking);
})();