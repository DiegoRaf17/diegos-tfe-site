<?php
/**
 * functions-taxonomy.php
 * 
 * Add taxonomies for custom content types, such as wines, recipes, etc
 **/

// block direct access
if ( !defined( 'WPINC' ) ) {
	exit( 'This file cannot be accessed directly.' );
}

/*
 * This will be replaced by a function to loop through and create taxonomies for however many
 * different types are requested in settings
 * 
 */


// Create wine custom post type

class _tfestart_post_types {

  public function __construct() {
    add_action( 'init', array( $this, '_tfestart_get_theme_post_types' ) );
  }

  public function _tfestart_get_theme_post_types() {
    $_tfestart_post_types = get_field('post_types', 'option');
    foreach ($_tfestart_post_types as $_tfestart_post_type) {
      if ($_tfestart_post_type !== 'other' ) {
        $this -> _tfestart_register_post_type ( 
          [
            'singular'  =>  $_tfestart_post_type,
            'plural' =>  $_tfestart_post_type . 's',
          ]
        );
      } else {
        $_tfestart_custom_post_types = get_field('custom_post_types', 'option');
        if( have_rows( 'custom_post_types', 'option') ):
          while( have_rows( 'custom_post_types', 'option') ) : the_row();
            $singular = get_sub_field('singular');
            if ( !empty( get_sub_field('plural') ) ) {
              $plural = get_sub_field('plural');
            } else {
              $plural = $singular . 's';
            }
            $this -> _tfestart_register_post_type ( 
              [
                'singular'  =>  $singular,
                'plural' =>  $plural,
              ]
            );
          endwhile;
        endif;
      }
    }
  }

  private function _tfestart_register_post_type( $data ) {
    $post_type = strtolower( $data['plural'] );
    $singular = ucfirst( strtolower( $data['singular'] ) );
    $plural = ucfirst( $post_type );

    $labels = array(
      'name'                => _x( $plural, 'Post Type General Name' ),
      'singular_name'       => _x( $singular, 'Post Type Singular Name' ),
      'menu_name'           => __( $plural ),
      'all_items'           => __( 'All ' . $plural ),
      'view_item'           => __( 'View ' . $singular ),
      'add_new_item'        => __( 'Add New ' . $singular ),
      'add_new'             => __( 'Add New' ),
      'edit_item'           => __( 'Edit ' . $singular ),
      'update_item'         => __( 'Update ' . $singular ),
      'search_items'        => __( 'Search ' . $singular ),
      'not_found'           => __( 'Not Found' ),
      'not_found_in_trash'  => __( 'Not found in Trash' ),
    );
            
    $args = array(
      'labels'              => $labels,
      'label'               => $post_type,
      'supports'            => array( 
        'title', 
        'thumbnail', 
        'revisions', 
      ),
      'hierarchical'        => false,
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
      'show_in_admin_bar'   => true,
      'menu_position'       => 5,
      'can_export'          => true,
      'has_archive'         => false,
      'exclude_from_search' => false,
      'publicly_queryable'  => true,
      'capability_type'     => 'post',
      'show_in_rest'        => true,
      'menu_icon'           => 'dashicons-controls-play',
    );
    register_post_type( $post_type, $args );
  }
}

new _tfestart_post_types;