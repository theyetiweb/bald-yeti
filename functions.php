<?php

/**
 * Bald Yeti theme functions and definitions
 * 
 * @since 1.0.0
 * 
 * @package Bald_Yeti
 */

if ( ! defined( 'BALD_YETI_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'BALD_YETI_VERSION', '1.0.0' );
}

require_once( get_template_directory() . '/includes/theme-setup.php' );
require_once( get_template_directory() . '/includes/admin-options.php' );
require_once( get_template_directory() . '/includes/api.php' );
require_once( get_template_directory() . '/includes/disable-gutenberg-editor.php' );
require_once( get_template_directory() . '/includes/disable-gutenberg-blocks.php' );