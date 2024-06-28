<?php
/**
 * functions-enqueue.php
 * 
 * Enqueue scripts and styles
 **/

// block direct access
if ( !defined( 'WPINC' ) ) {
	exit( 'This file cannot be accessed directly.' );
}

function dynamic_css() {
  require( get_template_directory() . '/assets/css/dynamic.css.php');
  exit;
}
add_action('wp_ajax_dynamic_css', 'dynamic_css');
add_action('wp_ajax_nopriv_dynamic_css', 'dynamic_css');


// enqueue main theme stylesheet
function _tfestart_enqueue_styles() {
	wp_enqueue_style(
		'theme-styles', 
		get_template_directory_uri() . '/assets/css/style.css', 
		false, 
		filemtime( get_template_directory() . '/assets/css/style.css' )
	);
	wp_enqueue_style(
		'dynamic-css',
    admin_url('admin-ajax.php').'?action=dynamic_css',
		false,
		filemtime( get_template_directory() . '/assets/css/dynamic.css.php' ),
		null,
	);
}
add_action('wp_enqueue_scripts', '_tfestart_enqueue_styles');



// enqueue fonts 
function _tfestart_enqueue_fonts() {
	wp_enqueue_style( 'tfestart-google-fonts-garamond', 
		'https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800', 
		false 
	); 
	wp_enqueue_style( 'tfestart-google-fonts-opensans', 
		'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800', 
		false 
	); 
	// for front end mobile nav open/close icons
	// wp_enqueue_style(
  //   'fontawesome', 
	//   'https://use.fontawesome.com/releases/v6.0.0/css/all.css', 
	//   false, 
  //   '6.0.0', 
  //   'all'
  // );	
}
add_action( 'wp_enqueue_scripts', '_tfestart_enqueue_fonts' );

// enqueue javascript
function add_custom_script() {
  wp_enqueue_script('jquery');
  wp_register_script('nav_script', 
		get_template_directory_uri() . '/assets/js/nav.js', 
		array( 'jquery' ), 
    filemtime( get_template_directory() . '/assets/js/nav.js' )
	);
  wp_enqueue_script('nav_script');
}
add_action( 'wp_enqueue_scripts', 'add_custom_script' );

//enqueue admin stylesheet
function _tfestart_enqueue_custom_admin_style() {
	wp_enqueue_style( 'custom_admin_css', 
		get_template_directory_uri().'/assets/css/admin.css', 
		false, '20210309'
	);
}
add_action( 'admin_enqueue_scripts', '_tfestart_enqueue_custom_admin_style' );


// Set custom post type admin icons
function fontawesome_dashboard() {
  wp_enqueue_style(
    'fontawesome',
    'https://use.fontawesome.com/releases/v6.0.0/css/all.css', 
    false, 
    '6.0.0', 
    'all'
  );
}
add_action( 'admin_enqueue_scripts', 'fontawesome_dashboard');
add_action( 'wp_enqueue_scripts', 'fontawesome_dashboard' );
