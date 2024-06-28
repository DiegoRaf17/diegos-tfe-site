<?php
/**
 * Functions utilities
 * 
 * Misc standalone functions
 */

// block direct access
if ( !defined( 'WPINC' ) ) {
	exit( 'This file cannot be accessed directly.' );
}

add_theme_support( 'post-thumbnails' );

// add page slug to body class list
function _tfestart_add_pagename_class( $classes ) {
  global $post;
  $page = $post->post_name ?? null; 
  if ( $page ) {
    $classes = array_merge( $classes, array( $page, 'no-js' ) );
  }
    return $classes;
}
add_filter( 'body_class', '_tfestart_add_pagename_class' );


// set acf pro folder location 
function _tfestart_acf_json_save_point( $path ) {
	$path = get_stylesheet_directory() . '/assets/acf-json';
	return $path;
}
add_filter('acf/settings/save_json', '_tfestart_acf_json_save_point');

function _tfestart_acf_json_load_point( $paths ) {
   unset( $paths[0] );
   $paths[] = get_stylesheet_directory() . '/assets/acf-json';
   return $paths;
}
add_filter('acf/settings/load_json', '_tfestart_acf_json_load_point');


// Add Google tag manager code
function google_tag_manager_head() { 
	?>
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-XXXXXX' );</script>
		<!-- End Google Tag Manager -->
	<?php 
}
add_action('wp_enqueue_scripts', 'google_tag_manager_head', 1);

function google_tag_manager_body() { 
	?>
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-XXXXXX" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
  <?php
}
add_action('wp_body_open', 'google_tag_manager_body', 1);


// add Instructions to Featured Image Box
function add_featured_image_html( $html ) {
	return $html .= '<p>Thumbnail requirements go here.</p>'; 
}
// add_filter( 'admin_post_thumbnail_html', 'add_featured_image_html');