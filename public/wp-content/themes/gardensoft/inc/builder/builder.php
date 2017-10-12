<?php

require_once ABSPATH . 'wp-admin/includes/plugin.php';

require_once __DIR__ . '/core/ux-builder.php';

require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/shortcodes.php';

// Templates
add_action( 'ux_builder_init', function () {
  require_once __DIR__ . '/templates/templates.php';
} );
