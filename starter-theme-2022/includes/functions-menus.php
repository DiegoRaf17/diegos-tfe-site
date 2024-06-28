<?php
/**
 * Functions menus
 * 
 * Register and manipulate nav menus
 */

// block direct access
if ( !defined( 'WPINC' ) ) {
	exit( 'This file cannot be accessed directly.' );
}

// register nav menus after theme install 
if ( ! function_exists( '_tfestart_theme_setup' ) ) {
	function _tfestart_theme_setup() {
		if ( ! function_exists( '_tfestart_register_my_menus' ) ){
			function _tfestart_register_my_menus(){
				register_nav_menus( array(
					'header_menu' => __( 'Header Menu', 'tfestart' ),
					'footer_menu'  => __( 'Footer Menu', 'tfestart' ),
				) );
			}
		}
		add_action( 'init', '_tfestart_register_my_menus' );
	}
}
add_action( 'after_setup_theme', '_tfestart_theme_setup' );
