<?php

/**
 * Theme Setup
 *
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
  exit(); // Exit if accessed directly.
}

function bald_theme_setup() {
  require get_template_directory() . '/vendor/autoload.php';
  define( 'Carbon_Fields\DIR', get_parent_theme_file_path( 'vendor/htmlburger/carbon-fields' ) );
  \Carbon_Fields\Carbon_Fields::boot();

	load_theme_textdomain( 'bald-yeti', get_template_directory() . '/languages' );
	add_theme_support( 'html5', array('title-tag', 'automatic-feed-links', 'post-thumbnails') );
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	
	do_action( 'bald_theme_setup' );

}
add_action( 'after_setup_theme', 'bald_theme_setup');


/**
 * Enqueue scripts and styles.
 * 
 * @since 1.0.0
 */
function bald_yeti_admin_style() {
  wp_enqueue_style(
    'bald-yeti-options',
    get_template_directory_uri() . '/assets/css/theme-options.css',
    [],
    BALD_YETI_VERSION,
    'all',
  );

  wp_enqueue_style(
    'bald-yeti-blockicons',
    get_template_directory_uri() . '/assets/css/blockicons.css',
    [],
    BALD_YETI_VERSION,
    'all',
  );
}
add_action('admin_enqueue_scripts', 'bald_yeti_admin_style');

function bald_yeti_admin_scripts($hook_suffix) {
  if (isset($_GET['page']) && $_GET['page'] === 'crb_carbon_fields_container_allowed_blocks.php') {
    wp_enqueue_script('theme-options', get_template_directory_uri() . '/assets/js/theme-options.js', [], BALD_YETI_VERSION, true);
  }
  
  wp_enqueue_script('restrict-blocks', get_template_directory_uri() . '/assets/js/restrict-block-variations.js', [], BALD_YETI_VERSION, true);
}
add_action('admin_enqueue_scripts', 'bald_yeti_admin_scripts');