<?php

/**
 * Disable Gutenberg blocks
 *
 * @since 1.0.0
 *
 */

function bald_theme_disable_blocks($allowed_blocks) {
  $admin_allowed_blocks = carbon_get_theme_option('gutenberg_allowed_blocks');

  return $admin_allowed_blocks;
}
add_filter('allowed_block_types_all', 'bald_theme_disable_blocks');
