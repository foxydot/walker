<?php
/* Subtitle Support - Admin */
if(!class_exists('WPAlchemy_MetaBox')){
	include_once WP_CONTENT_DIR.'/wpalchemy/MetaBox.php';
}
add_action('init','add_custom_metaboxes');
function add_custom_metaboxes(){
	global $pagetop_metabox;
	$pagetop_metabox = new WPAlchemy_MetaBox(array
			(
					'id' => '_pagetop',
					'title' => 'Page Top Content',
					'types' => array('page'),
					'template' => get_stylesheet_directory() . '/lib/template/pagetop-meta.php',
			));
}
add_action('admin_footer','pagetop_footer_hook');
function pagetop_footer_hook()
{
	?><script type="text/javascript">
		jQuery('#titlediv').before(jQuery('#_pagetop_metabox'));
	</script><?php
}

// include css to help style our custom meta boxes
add_action( 'admin_print_scripts', 'my_metabox_styles' );
 
function my_metabox_styles()
{
    if ( is_admin() )
    {
        wp_enqueue_style('wpalchemy-metabox', get_stylesheet_directory_uri() . '/lib/template/meta.css');
    }
}

add_filter( 'enter_title_here', 'change_default_title' );
function change_default_title( $title ){
	$screen = get_current_screen();
	if  ( $screen->post_type == 'page' ) {
		return __('Enter main area title here','msd_child');
	}
}

/* Subtitle Support - Theme */
add_action( 'genesis_before_content_sidebar_wrap', 'msdlab_do_post_pagetop' );

function msdlab_do_post_pagetop() {
	global $pagetop_metabox;
	$pagetop_metabox->the_meta();
	$pagetop_title = $pagetop_metabox->get_the_value('pagetop_title');
	$pagetop_content = $pagetop_metabox->get_the_value('pagetop_content');

	if ( strlen( $pagetop_title ) == 0 && strlen( $pagetop_content ) == 0 && !has_post_thumbnail())
		return;

	$pagetop_title = apply_filters( 'genesis_post_title_output', apply_filters( 'genesis_post_title_text',$pagetop_title) );
    add_filter('pagetop_content','do_shortcode');
    $pagetop_content = apply_filters('pagetop_content', $pagetop_content);
    $pagetop_content = apply_filters('the_content', $pagetop_content);
    do_action('pagetop_image');
	print '<div id="pagetop">';
	print '<div class="content">';
				if($pagetop_title!=''){print '<h2 class="entry-title">'.$pagetop_title.'</h2>';}
				if($pagetop_content!=''){print '<div class="entry-content">'.$pagetop_content.'</div>';}
	print	'</div>
			</div>';

}

/** Add new image sizes */
add_image_size( 'pagetop-image', 325, 245, TRUE ); //image to float to right of top area
add_image_size( 'pagetop-hero', 960, 245, TRUE ); //image to float to right of top area

/* Manipulate the featured image */
add_action( 'pagetop_image', 'msd_post_image', 8 );
function msd_post_image() {
	global $post,$pagetop_metabox;
	//setup thumbnail image args to be used with genesis_get_image();
	//if($pagetop_metabox->get_the_value('pagetop_content')!=''){
	//   $size = 'pagetop-image'; // Change this to whatever add_image_size you want
    //} else {
       $size = 'pagetop-hero'; // Change this to whatever add_image_size you want
    //}
	$default_attr = array(
			'class' => "alignnone attachment-$size $size",
			'alt'   => $post->post_title,
			'title' => $post->post_title,
	);

	// This is the most important part!  Checks to see if the post has a Post Thumbnail assigned to it. You can delete the if conditional if you want and assume that there will always be a thumbnail
	if ( has_post_thumbnail() && is_page() ) {
		printf( '%s', genesis_get_image( array( 'size' => $size, 'attr' => $default_attr ) ) );
	}

}