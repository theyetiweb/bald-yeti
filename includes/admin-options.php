<?php

/**
 * Bald Yeti Options
 *
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
  exit(); // Exit if accessed directly.
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

function bald_theme_attach_theme_options() {
  // Default options page
  $basic_options_container = Container::make('theme_options', __('Bald Yeti Options'))
    ->set_page_menu_title('Bald Yeti')
    ->set_page_menu_position( 80 )
    ->set_icon(
      'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDMxIiBoZWlnaHQ9IjM5NyIgdmlld0JveD0iMCAwIDQzMSAzOTciIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxtYXNrIGlkPSJtYXNrMF8yMTFfMzciIHN0eWxlPSJtYXNrLXR5cGU6YWxwaGEiIG1hc2tVbml0cz0idXNlclNwYWNlT25Vc2UiIHg9Ii0xIiB5PSIwIiB3aWR0aD0iNDMzIiBoZWlnaHQ9IjM5NyI+CjxwYXRoIGQ9Ik0zMjMuNSA3MEMyODQuNSAtMjQgMTQ4LjUgLTE5IDEwOS41IDcwSDBWMzk2LjVINDI3LjVMNDMwLjUgNzBIMzIzLjVaIiBmaWxsPSJibGFjayIgc3Ryb2tlPSJibGFjayIvPgo8L21hc2s+CjxnIG1hc2s9InVybCgjbWFzazBfMjExXzM3KSI+CjxwYXRoIGQ9Ik0zOS4zMjU4IDEyOC43NjVDNTYuMTMyNyA5Ni4wODkyIDkzLjUwNiA3NC44Njc4IDEwOC45ODYgNzAuNDUyMkMxMTYuMDYzIDUyLjc4OTcgMTMzLjMxMiAzMy42NTU0IDE0MS4wNTIgMjYuMjk2SDEzMy4zMTJDMTQ1LjY5NiAxNi41ODE2IDE2My41MzUgOS43Mzc0NCAxNzAuOTA2IDcuNTI5NjVDMTY5LjEzNyAwLjQ2NDY2NyAxNzkuNzUyIC0xLjQ5NTk2IDE3Ni40MzUgLTYuODIxMUMxODAuODU4IC00LjYxMzMxIDE4Ny40OTIgOC40MzkxNiAxODkuNzAzIDIuOTE5NjVDMTk0LjEyNiAtMi43OTQyNSAxOTYuMzM4IC0yLjU5OTg2IDE5Ny40NDMgLTE0Ljc0MjhDMjA1LjE4NCAtMTEuNDMxMSAyMDAuNzYxIDMuMTQwNDUgMjA5LjYwNiAtMC4zOTIwNTVDMjE4LjQ1MiAtMTAuMTA2NCAyMjcuNjY2IC0xNy42ODY1IDIzMi44MjYgLTE2Ljk1MDZDMjI5LjUwOSAtMTQuMDA2OSAyMzAuMzk0IC0wLjYzOTI1NSAyMzguMzU1IDIuMDEwMTJDMjQ2LjMxNiA0LjY1OTQ5IDI1Mi4zNjEgLTIuNTk5ODUgMjUyLjcyOSAtNS45MTE1NkMyNjIuNDYgLTEuNDk1OTUgMjYzLjA0OSA3LjcwMzI1IDI2My43ODcgMTAuNjQ3QzI4NS4wMTYgMTEuNTMwMSAyOTguMDY0IDE5LjQ3ODIgMzAxLjM4MSAyNC45OTc4QzI5OS42MTIgMjMuMjMxNSAyOTIuOTA0IDI1LjkyOCAyOTAuMzI0IDI2LjI5NkMyOTkuMTcgMzEuNTk0NyAzMTkuMDcyIDQ0Ljg2OCAzMjMuNDk1IDUyLjU5NTRIMzE0LjY1QzMyMC44NDIgNjAuNTQzNSAzMjQuMjMyIDY4LjYxMjMgMzI0LjYwMSA3MC40NTIyQzM1OS45ODQgNzkuMjgzNCAzODguNzMzIDExNC43ODIgMzk3LjU3OCAxMjkuODY5TDM5MC45NDQgMTI4Ljk1OUM0MDYuODY2IDE1Ni4zMzYgNDE2Ljc0NCAxOTQuODI1IDQxOS42OTMgMjEwLjY0OEw0MTQuMTY0IDIwOC40NEM0MTQuOTAxIDIxMy41OTIgNDE2LjM3NiAyMjYuNTQ0IDQxNi4zNzYgMjM3LjE0MkM0MTYuMzc2IDI0Ny43MzkgNDIwLjA2MSAyNjQuMzcxIDQyMS45MDQgMjcxLjM2M0w0MTYuMzc2IDI2OS4xNTVDNDE3LjExMyAyNzEuNzMxIDQyMS4wMiAyNzguNDI4IDQyMS45MDQgMjk3Ljg1NkM0MjIuNzg5IDMxNy4yODUgNDE3LjQ4MSAzMjQuMTU2IDQwOC42MzYgMzIzLjI0NkM0MDUuMDk3IDMyOC41NDUgMzkzLjE1NiAzMjUuMjYgMzg5LjgzOCAzMjQuMTU2QzM3NC4zNTggMzI4LjU3MSAzNjkuNTY3IDMyNi4xOSAzNjQuNDA3IDMxOC44MzFDMzU1LjU2MSAzMjIuMTQyIDM1Mi4yNDQgMzEzLjMxMSAzNTAuMDMzIDMwOC44OTVDMzQ3LjgyMSAzMDQuNDggMzQ4LjkyNyAzMDEuMjI5IDM0OC45MjcgMjkxLjIzM0MzNDguOTI3IDI4NS41MTkgMzUxLjEzOCAyODAgMzU0LjQ1NSAyNzQuNjc0QzM1Ny4wOTggMjcwLjQzMiAzNjAuMzUzIDI2My42MzUgMzYxLjA5IDI2MC4zMjRIMzU0LjQ1NUMzNjIuNDE3IDI0OS43MjYgMzU3Ljc3MyAyMTEuNzUyIDM1NC40NTUgMTk0LjA4OUwzNTAuMDMzIDE5OC41MDVDMzUxLjgwMiAxODUuMjU4IDM0MS45MjQgMTY4LjcgMzM2Ljc2NCAxNjIuMDc2QzMzNy44NyAxNzcuMzM3IDM0My4zOTggMjExLjc1MiAzMzguOTc1IDIzMy44M0MzMzQuNTUzIDI1NS45MDggMzMxLjIzNSAyODEuMTA0IDMzMS4yMzUgMjkzLjI0N0wzMjQuNjAxIDI4Ni44MTdDMzI0LjYwMSAyODcuOTIxIDMyMy40OTUgMzE0LjQxNSAzMTkuMDcyIDMyNi41NThDMzE1LjUzNCAzMzYuMjcyIDMxMi44MDcgMzQ2LjYwMiAzMTMuNTQ0IDM1Mi44NTdMMzA5LjEyMSAzNDYuNDI4QzMwNC42OTggMzYxLjg4MyAzMDYuOTEgMzc1LjEzIDMwNC42OTggMzg1LjA2NUMzMDIuOTI5IDM5My4wMTMgMjk2LjU5IDM5NC4yNjQgMjkzLjY0MSAzOTMuODk2SDI2MC40NjlDMjUwLjUxOCAzOTMuODk2IDI0OS40MTIgMzg2LjE2OSAyNDkuNDEyIDM4MC42NDlDMjQ5LjQxMiAzNzUuMTMgMjUwLjUxOCAzNjUuMTk1IDI0OS40MTIgMzU3LjQ2N0MyNDguNTI4IDM1MS4yODUgMjQyLjQwOSAzNDIuMzgxIDIzOS40NjEgMzM4LjcwMUMyMjIuNjU0IDM0Mi4yMzMgMjAxLjQ5OCAzNDAuMTczIDE5My4wMjEgMzM4LjcwMUMxODEuOTYzIDM2MC43NzkgMTg1LjI4MSAzNjguNTA2IDE4NS4yODEgMzgxLjc1M0MxODUuMjgxIDM5Mi4zNTEgMTc5LjM4MyAzOTUgMTc2LjQzNSAzOTVIMTQ1LjQ3NUMxMzIuMjA2IDM5NSAxMzIuMjA2IDM4Ny4yNzMgMTI5Ljk5NSAzODEuNzUzQzEyOC4yMjYgMzc3LjMzOCAxMjYuMzA5IDM1Ni4zNjMgMTI1LjU3MiAzNDYuNDI4TDEyMC4wNDMgMzUxLjc1M0MxMjEuMTQ5IDM0Mi45MjIgMTE4LjkzNyAzMzUuMzg5IDExNC41MTUgMzI2LjU1OEMxMTAuOTc2IDMxOS40OTMgMTA5LjM1NSAyOTYuMzg1IDEwOC45ODYgMjg1LjcxM0MxMDYuOTk0IDI4OC4xOTkgMTA0Ljc2NyAyOTAuMjYgMTAzLjgwNCAyOTEuMzM2QzEwMy43NTQgMjkxLjg5NSAxMDMuNjM0IDI5Mi4xNDMgMTAzLjQ1NyAyOTIuMTQzQzEwMy4xNyAyOTIuMTQzIDEwMy4zNDEgMjkxLjg1MyAxMDMuODA0IDI5MS4zMzZDMTA0LjA3IDI4OC4zODcgMTAyLjQgMjc2Ljc3MSA5Ni44MjMxIDI0Ny4wNzdDOTEuNTE1NyAyMTguODE3IDk2LjgyMzEgMTY3LjQwMSA5Ni44MjMxIDE2MC45NzJDODYuMjA4MiAxNzguNjM1IDg2Ljg3MTcgMTkxLjY4NyA4Mi40NDg4IDE5OS40MTVMODAuMjM3NCAxOTIuOTg2QzcxLjM5MTYgMjI3LjQyNyA3NC4zNDAyIDI1Mi43NyA3OC4wMjU5IDI2MS4yMzNMNzMuNjAzMSAyNTkuMjJDNzQuNDg3NiAyNjEuODY5IDc4LjM5NDUgMjY5LjE1NSA4MC4yMzc0IDI3Mi40NjdDODIuMDgwMiAyNzUuMDQyIDg1Ljc2NiAyODMuNTA2IDg1Ljc2NiAyOTYuNzUzQzg1Ljc2NiAzMTguODMxIDczLjYwMzEgMzIyLjY4NCA2OC4wNzQ1IDMyMC44NDRDNjAuMzM0NCAzMzAuNzc5IDQ1Ljk2MDEgMzMwLjc3OSAzOS4zMjU4IDMyNi41NThDMzAuNDgwMSAzMjkuMjA3IDI2Ljc5NDMgMzI1LjQ1NCAyNi4wNTcyIDMyMy4yNDZDMjIuNzQgMzIzLjI0NiAxNSAzMTkuOTM1IDE1IDMwMi4yNzJDMTUgMjg4LjE0MiAxNy45NDg2IDI3Mi44MzUgMTkuNDIyOSAyNjYuOTQ3TDE1IDI3MC4wNjVDMTkuNDIyOSAyNDguODcgMTkuNzkxNCAyMTkuMTExIDE5LjQyMjkgMjA3LjMzNkwxNSAyMTAuNDU0QzE5LjQyMjkgMTc2Ljg5NSAzNy40ODI5IDE0MC4zNjYgNDUuOTYwMSAxMjcuODU1TDM5LjMyNTggMTI4Ljc2NVoiIGZpbGw9IiMyOEJBRTAiLz4KPC9nPgo8L3N2Zz4K',
    )
    ->add_fields([
      Field::make('html', 'bald_theme_options_page_logo')->set_html('
        <img src="'.get_template_directory_uri() . '/assets/images/baldyeti.png'.'" width="200" alt="Bald Yeti" />
      '),
      Field::make('html', 'bald_theme_options_page_general')->set_html('
        <div class="button-group">
          <a class="button button-hero" href="/wp-admin/admin.php?page=crb_carbon_fields_container_page_editor.php">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18 5.5H6a.5.5 0 00-.5.5v3h13V6a.5.5 0 00-.5-.5zm.5 5H10v8h8a.5.5 0 00.5-.5v-7.5zm-10 0h-3V18a.5.5 0 00.5.5h2.5v-8zM6 4h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6a2 2 0 012-2z" /></svg>
            <strong>Manage Page Editor</strong>
            <p>Choose which page editor is enabled for various pages.</p>
          </a>
          <a class="button button-hero" href="/wp-admin/admin.php?page=crb_carbon_fields_container_allowed_blocks.php">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19 8h-1V6h-5v2h-2V6H6v2H5c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2v-8c0-1.1-.9-2-2-2zm.5 10c0 .3-.2.5-.5.5H5c-.3 0-.5-.2-.5-.5v-8c0-.3.2-.5.5-.5h14c.3 0 .5.2.5.5v8z" /></svg>
            <strong>Manage Gutenberg Blocks</strong>
            <p>Select which Gutenberg Blocks are available to content editors.</p>
          </a>
        </div>
      '),
      Field::make('html', 'bald_theme_options_page_about')->set_html('
        <h4 style="margin-bottom:0;">About Bald Yeti</h4>
        <p style="margin-top:4px;">The Bald Yeti theme is purpose-built for Headless WordPress. It is intended to be used in conjunction with a separate front-end application and does not contain any front-end assets. Learn more about the Bald Yeti theme <a href="https://www.yetiweb.io/bald-yeti/" target="_blank">here</a>.</p>
        <p style="font-size:10px; text-align:right;">Version '.BALD_YETI_VERSION.' | Created by <a href="https://www.yetiweb.io" target="_blank">Yeti Web, LLC</a>.</p>
      '),
    ]);

  Container::make('theme_options', __('Page Editor'))
    ->set_page_parent($basic_options_container) // reference to a top level container
    ->add_fields([
      Field::make('html', 'bald_theme_opt_header_gutenberg_editor')
        ->set_html('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18 5.5H6a.5.5 0 00-.5.5v3h13V6a.5.5 0 00-.5-.5zm.5 5H10v8h8a.5.5 0 00.5-.5v-7.5zm-10 0h-3V18a.5.5 0 00.5.5h2.5v-8zM6 4h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6a2 2 0 012-2z" /></svg>
        <h3 style="margin-bottom: 0;">Page Editor Settings</h3>
        <p style="margin-top: 0;">Use the settings below to disable the default WordPress Page Editor. This is useful for pages which only use custom fields for managing content.</p>'),
      Field::make('checkbox', 'gutenberg_disable_homepage', __('Disable Editor on Homepage'))->set_classes('toggle'),
      Field::make('checkbox', 'gutenberg_disable_posts_page', __('Disable Editor on Posts Archive Page'))->set_classes(
        'toggle',
      ),
      Field::make('set', 'gutenberg_disabled_templates', __('Disable Editor by Template:'))
        ->add_options('bald_theme_crb_template_options')
        ->set_classes('toggle-set')
        ->set_default_value(['templates/disable-gutenberg-editor.php']),
      Field::make('set', 'gutenberg_disabled_post_types', __('Disable Editor by Post Type:'))
        ->add_options('bald_theme_crb_post_type_options')
        ->set_classes('toggle-set'),
    ]);

  Container::make('theme_options', __('Allowed Blocks'))
    ->set_page_parent($basic_options_container) // reference to a top level container
    ->add_fields([
      Field::make('html', 'bald_theme_opt_header_gutenberg_blocks')
        ->set_html('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19 8h-1V6h-5v2h-2V6H6v2H5c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2v-8c0-1.1-.9-2-2-2zm.5 10c0 .3-.2.5-.5.5H5c-.3 0-.5-.2-.5-.5v-8c0-.3.2-.5.5-.5h14c.3 0 .5.2.5.5v8z" /></svg>
        <h3 style="margin-bottom: 0;">Gutenberg Block Settings</h3>
        <p style="margin-top: 0;">Select which Gutenberg Blocks are available for use.</p>'),
      Field::make('set', 'gutenberg_allowed_blocks', __('Allowed Gutenberg Blocks'))
        ->add_options('bald_theme_crb_blocks_options')
        ->set_classes('toggle-set block-toggles')
        ->set_default_value([
          'core/column',
          'core/columns',
          'core/group',
          'core/separator',
          'core/spacer',
          'core/text-columns',
          'core/video',
          'core/block',
          'core/heading',
          'core/list',
          'core/list-item',
          'core/missing',
          'core/paragraph',
          'core/pullquote',
          'core/quote',
          'core/table',
          'core/pattern',
          'core/html',
          'core/image',
          'core/freeform',
        ]),
      Field::make('set', 'gutenberg_allowed_embed_variations', __('Allowed Embed Sources'))
        ->add_options([
          'twitter' => 'Twitter',
          'youtube' => 'Youtube',
          'facebook' => 'Facebook',
          'instagram' => 'Instagram',
          'wordpress' => 'Wordpress',
          'soundcloud' => 'Soundcloud',
          'spotify' => 'Spotify',
          'flickr' => 'Flickr',
          'vimeo' => 'Vimeo',
          'animoto' => 'Animoto',
          'cloudup' => 'Cloudup',
          'collegehumor' => 'Collegehumor',
          'crowdsignal' => 'Crowdsignal',
          'dailymotion' => 'Dailymotion',
          'imgur' => 'Imgur',
          'issuu' => 'Issuu',
          'kickstarter' => 'Kickstarter',
          'mixcloud' => 'Mixcloud',
          'pocket-casts' => 'Pocket-Casts',
          'reddit' => 'Reddit',
          'reverbnation' => 'Reverbnation',
          'screencast' => 'Screencast',
          'scribd' => 'Scribd',
          'slideshare' => 'Slideshare',
          'smugmug' => 'Smugmug',
          'speaker-deck' => 'Speaker-Deck',
          'tiktok' => 'Tiktok',
          'ted' => 'Ted',
          'tumblr' => 'Tumblr',
          'videopress' => 'Videopress',
          'wordpress-tv' => 'Wordpress-Tv',
          'amazon-kindle' => 'Amazon Kindle',
          'pinterest' => 'Pinterest',
          'wolfram-cloud' => 'Wolfram Cloud',
        ])
        ->set_classes('toggle-set embed-variant-toggles')
        ->set_default_value(['youtube', 'vimeo'])
        ->set_conditional_logic([
          'relation' => 'and',
          [
            'field' => 'gutenberg_allowed_blocks',
            'value' => 'core/embed',
            'compare' => 'INCLUDES',
          ],
        ]),
    ]);
}
add_action('carbon_fields_register_fields', 'bald_theme_attach_theme_options');

function bald_theme_crb_template_options() {
  $templates = wp_get_theme()->get_page_templates();
  $options = [];
  foreach ($templates as $file => $name) {
    $options[$file] = $name;
  }
  asort($options);
  return $options;
}

function bald_theme_crb_blocks_options() {
  $block_types = WP_Block_Type_Registry::get_instance()->get_all_registered();
  $options = [];
  foreach ($block_types as $block_type) {
    $options[$block_type->name] = $block_type->name;
  }
  asort($options);
  return $options;
}

function bald_theme_crb_post_type_options() {
  $args = [
    'public' => true,
  ];

  $output = 'objects';
  $operator = 'and';

  $post_types = get_post_types($args, $output, $operator);

  $options = [];

  foreach ($post_types as $post_type) {
    if ($post_type->name === 'attachment') {
      continue;
    }
    $options[$post_type->name] = $post_type->label;
  }

  asort($options);
  return $options;
}