<?php
add_theme_support( 'genesis-footer-widgets', 1 );
add_theme_support( 'genesis-structural-wraps', array('header','subnav', 'footer-widgets','footer') );

/**
 * Move nav into header
 */
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav' );

add_action('after_setup_theme','msd_child_add_homepage_hero3_sidebars');
function msd_child_add_homepage_hero3_sidebars(){
	genesis_register_sidebar(array(
	'name' => 'Homepage Hero',
	'description' => 'Homepage hero space',
	'id' => 'homepage-top'
	));
	genesis_register_sidebar(array(
	'name' => 'Homepage Widget Area',
	'description' => 'Homepage central widget areas',
	'id' => 'homepage-widgets'
	));
}
/** Customize search form input box text */
add_filter( 'genesis_search_text', 'custom_search_text' );
function custom_search_text($text) {
	return esc_attr( 'Begin your search here...' );
}

add_filter('genesis_breadcrumb_args', 'custom_breadcrumb_args');
function custom_breadcrumb_args($args) {
	$args['labels']['prefix'] = ''; //marks the spot
	$args['sep'] = ' > ';
	return $args;
}

remove_action('genesis_before_loop', 'genesis_do_breadcrumbs');
add_action('genesis_before_content_sidebar_wrap', 'genesis_do_breadcrumbs');

remove_action( 'genesis_before_post_content', 'genesis_post_info' );
remove_action( 'genesis_after_post_content', 'genesis_post_meta' );

add_action('genesis_header_right','msd_header_social');
function msd_header_social($content){
	global $msd_social;
	if($msd_social){
		print '<div class="social widget">';
		if(get_option('msdsocial_twitter_user')!=''){
			print '<a href="http://www.twitter.com/'.get_option('msdsocial_twitter_user').'" class="tw" title="Follow Us on Twitter!" target="_blank"><i class="icon-twitter icon-large" title="twitter"></i></a>';
		}
		if(get_option('msdsocial_phone')!=''){
			print '<a class="social-pop" title="" data-content="'.get_option('msdsocial_phone').'" data-placement="bottom" data-toggle="popover" href="#" data-original-title=""><i class="icon-mobile-phone icon-large" title="phone"></i></a>';
		}
		if(get_option('msdsocial_contact_link')!=''){
			print '<a class="" href="'.get_option('msdsocial_contact_link').'"><i class="icon-envelope-alt icon-large" title="contact"></i></a>';
		}
		print '</div>';
	}
}

/**
 * Replace footer
 */
remove_action('genesis_footer','genesis_do_footer');
add_action('genesis_footer','hot_career_do_footer');
function hot_career_do_footer(){
	global $msd_social;
	if($msd_social){
		$copyright .= 'Copyright &copy;'.date('Y').' '.$msd_social->get_bizname().' &middot; All Rights Reserved';
	} else {
		$copyright .= 'Copyright &copy;'.date('Y').' '.get_bloginfo('name').' &middot; All Rights Reserved ';
	}
	print '<div id="copyright">'.$copyright.'</div>';
}

/**
 * Reversed out style SCS
 * This ensures that the primary sidebar is always to the left.
 */
add_action('genesis_before', 'msd_new_custom_layout_logic');
function msd_new_custom_layout_logic() {
	$site_layout = genesis_site_layout();	 
	if ( $site_layout == 'sidebar-content-sidebar' ) {
		// Remove default genesis sidebars
		remove_action( 'genesis_after_content', 'genesis_get_sidebar' );
		remove_action( 'genesis_after_content_sidebar_wrap', 'genesis_get_sidebar_alt');
		// Add layout specific sidebars
		add_action( 'genesis_before_content_sidebar_wrap', 'genesis_get_sidebar' );
		add_action( 'genesis_after_content', 'genesis_get_sidebar_alt');
	}
}