<?php

function newtendency_setup() {
	
	register_nav_menu( 'primary', __( 'Primary Menu', 'newtendency' ) );
	
}

add_image_size( 'press_feature_frontpage', 999, 45 );
add_action( 'after_setup_theme', 'newtendency_setup' );

// add tag support to pages
function tags_support_all() {
	register_taxonomy_for_object_type('post_tag', 'page');
}

// ensure all tags are included in queries
function tags_support_query($wp_query) {
	if ($wp_query->get('tag')) $wp_query->set('post_type', 'any');
}

// tag hooks
add_action('init', 'tags_support_all');
add_action('pre_get_posts', 'tags_support_query');

add_theme_support( 'post-thumbnails' );

/*

add_filter('site_url',  'wplogin_filter', 10, 3);
function wplogin_filter( $url, $path, $orig_scheme )
{
 $old  = array( "/(wp-login\.php)/");
 $new  = array( "login");
 return preg_replace( $old, $new, $url, 1);
}

*/

if ( ! isset( $content_width ) ) $content_width = 950;


?>