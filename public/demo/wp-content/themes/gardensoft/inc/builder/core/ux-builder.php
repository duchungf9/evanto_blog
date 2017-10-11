<?php

/**
 * Plugin Name:   UX Builder
 * Plugin URI:    http://builder.uxthemes.com
 * Description:   The best Page Builder for WordPress.
 * Author:        UX Themes
 * Author URI:    http://uxthemes.com
 * Version:       1.0.0
 */

// If this file is called directly, abort.
if( ! defined( 'WPINC' ) ) die;

// Register the autoloader.
spl_autoload_register( function ( $class_name ) {
  if ( false !== strpos( $class_name, 'UxBuilder' ) ) {
    $dir_sep = DIRECTORY_SEPARATOR;
    $class_name = str_replace( array( 'UxBuilder', '\\' ), array( 'src', $dir_sep ), $class_name );
    $classes_dir = realpath( plugin_dir_path( __FILE__ ) ) . $dir_sep . 'server' . $dir_sep;
    $class_file = str_replace( '_', $dir_sep, $class_name ) . '.php';
    require_once $classes_dir . $class_file;
  }
} );

// Defines
define( 'UX_BUILDER_VERSION', '1.0.0' );
define( 'UX_BUILDER_PATH', get_template_directory() . '/inc/builder/core' );
define( 'UX_BUILDER_URL',  get_template_directory_uri() );

// Required files.
require_once UX_BUILDER_PATH . '/server/helpers/helpers.php';
require_once UX_BUILDER_PATH . '/server/actions/actions.php';
require_once UX_BUILDER_PATH . '/server/filters/filters.php';
require_once UX_BUILDER_PATH . '/server/filters/post-options.php';
require_once UX_BUILDER_PATH . '/server/filters/meta-options.php';
require_once UX_BUILDER_PATH . '/server/src/Application.php';
require_once UX_BUILDER_PATH . '/shortcodes/shortcodes.php';
require_once UX_BUILDER_PATH . '/components/components.php';
require_once UX_BUILDER_PATH . '/server/setup.php';

/**
 * Initialize the plugin.
 */
add_action( 'plugins_loaded', array( 'UxBuilder\Application', 'get_instance' ) );
