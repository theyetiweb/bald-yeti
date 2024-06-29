<?php

/**
 * Custom REST API Endpoints
 *
 * @since 1.0.0
 */

add_action('rest_api_init', function () {
  /**
   * REST API Endpoint for block info (used in theme options)
   *
   * @since 1.0.0
   */
  register_rest_route('bald-yeti/v1', '/block-info/(?P<name>.+)', [
    'methods' => 'GET',
    'callback' => function (WP_REST_Request $request) {
      $block_name = $request->get_param('name');
      $block_type = WP_Block_Type_Registry::get_instance()->get_registered($block_name);
      if ($block_type) {
        header('Cache-Control: max-age=7200, public'); // Cache for 2 hours
        return new WP_REST_Response([
          'icon' => $block_type->icon,
          'title' => $block_type->title,
          'description' => $block_type->description,
        ]);
      } else {
        return new WP_Error('block_not_found', 'Block not found', [
          'status' => 404,
        ]);
      }
    },
    'permission_callback' => '__return_true',
  ]);

  /**
   * REST API Endpoint for embed block variations (used in theme options)
   *
   * @since 1.0.0
   */
  register_rest_route('bald-yeti/v1', '/embed-variations', [
    'methods' => 'GET',
    'callback' => function (WP_REST_Request $request) {
      header('Cache-Control: max-age=7200, public'); // Cache for 2 hours
      $allowedVariations = carbon_get_theme_option('gutenberg_allowed_embed_variations');
      return new WP_REST_Response($allowedVariations);
    },
    'permission_callback' => '__return_true',
  ]);
});