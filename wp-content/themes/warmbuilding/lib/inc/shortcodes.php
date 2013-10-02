<?php
add_shortcode('button','msd_child_button_function');
function msd_child_button_function($atts, $content = null){	
	extract( shortcode_atts( array(
      'url' => null,
	  'target' => '_self'
      ), $atts ) );
	$ret = '<div class="button-wrapper">
<a class="button" href="'.$url.'" target="'.$target.'">'.remove_wpautop($content).'</a>
</div>';
	return $ret;
}
add_shortcode('hero','msd_child_landing_page_hero');
function msd_child_landing_page_hero($atts, $content = null){
	$ret = '<div class="hero">'.remove_wpautop($content).'</div>';
	return $ret;
}
add_shortcode('callout','msd_child_landing_page_callout');
function msd_child_landing_page_callout($atts, $content = null){
	$ret = '<div class="callout">'.remove_wpautop($content).'</div>';
	return $ret;
}



function column_shortcode($atts, $content = null){
	extract( shortcode_atts( array(
	'cols' => '3',
	'position' => '',
	), $atts ) );
	switch($cols){
		case 5:
			$classes[] = 'one-fifth';
			break;
		case 4:
			$classes[] = 'one-fouth';
			break;
		case 3:
			$classes[] = 'one-third';
			break;
		case 2:
			$classes[] = 'one-half';
			break;
	}
	switch($position){
		case 'first':
		case '1':
			$classes[] = 'first';
		case 'last':
			$classes[] = 'last';
	}
	return '<div class="'.implode(' ',$classes).'">'.remove_wpautop($content).'</div>';
}

add_shortcode('columns','column_shortcode');
add_shortcode('map','msd_add_map');

function msd_add_map(){
    return '<iframe width="960" height="245" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=1400+West+Jefferson+Street+Louisville,+KY+40203&amp;oe=utf-8&amp;client=firefox-a&amp;ie=UTF8&amp;hq=&amp;hnear=1400+W+Jefferson+St,+Louisville,+Kentucky+40203&amp;t=m&amp;z=14&amp;ll=38.255311,-85.774251&amp;output=embed"></iframe>';
}
