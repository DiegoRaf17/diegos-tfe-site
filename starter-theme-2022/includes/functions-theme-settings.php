<?php
/**
 * functions-theme-settings.php
 *
 * Setup theme options page
 **/

// block direct access
if ( !defined( 'WPINC' ) ) {
	exit( 'This file cannot be accessed directly.' );
}

// add theme settings page
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Options',
		'menu_slug' 	=> 'theme-settings',
		'capability'	=> 'edit_theme_options',
    'icon_url'    => 'dashicons-star-filled',
		'redirect'		=> false
	));	
}

// if( is_admin() ) $my_settings_page = new ThemeSettingsPage();

function acf_load_color_field_choices( $field ) {
    
	// reset choices
	$field['choices'] = array();
	$choices = get_field('theme_colors', 'option', false);

	// explode the value so that each line is a new array piece
	$choices = explode("\n", $choices);

	// remove any unwanted white space
	$choices = array_map('trim', $choices);
	
	// loop through array and add to field 'choices'
	if( is_array($choices) ) {
		foreach( $choices as $choice ) {
			$choice_pair = explode(' : ', $choice);
			$field['choices'][ $choice_pair[0] ] = $choice_pair[1]; 
		} 
	}
	// return the field
	return $field;
}
add_filter('acf/load_field/name=color', 'acf_load_color_field_choices');