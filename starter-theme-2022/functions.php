<?php

// block direct access
if ( !defined( 'WPINC' ) ) {
	exit( 'This file cannot be accessed directly.' );
}

$template_directory = get_template_directory();

// Basic functionality
require_once $template_directory . '/includes/functions-utilities.php';

// Theme settings
require_once $template_directory . '/includes/functions-theme-settings.php';

// Menu setup
require_once $template_directory . '/includes/functions-menus.php';

// Enqueue scripts and styles
require_once $template_directory . '/includes/functions-enqueue.php';

// Creat custom content taxonomies
require_once $template_directory . '/includes/functions-taxonomy.php';

// Removes all comment functionality
require_once $template_directory . '/includes/functions-nocomment.php';