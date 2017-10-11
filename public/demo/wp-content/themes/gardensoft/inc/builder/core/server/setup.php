<?php

add_action( 'ux_builder_setup', function () {
  // Add Ux Builder to posts and pages as default.
  add_ux_builder_post_type( 'post' );
  add_ux_builder_post_type( 'page' );

  // Register default breakpoints.
  add_ux_builder_breakpoint( 'sm', 550,  'Mobile',  'dashicons dashicons-smartphone' );
  add_ux_builder_breakpoint( 'md', 850,  'Tablet',  'dashicons dashicons-tablet' );
  add_ux_builder_breakpoint( 'lg', 1000, 'Desktop', 'dashicons dashicons-desktop' );

  // Set "lg" as default breakpoint.
  set_default_ux_builder_breakpoint( 'lg' );

  // Register default option types.
  add_ux_builder_option_type( 'checkbox' );
  add_ux_builder_option_type( 'col-slider', array(
   'defaults' => array(
     'min' => 1,
     'max' => 12,
   ),
  ) );
  add_ux_builder_option_type( 'colorpicker' );
  add_ux_builder_option_type( 'group', array(
   'class' => 'UxBuilder\Options\Custom\GroupOption',
   'defaults' => array(
     'full_width' => true,
     'options' => array()
   ),
  ) );
  add_ux_builder_option_type( 'gallery' );
  add_ux_builder_option_type( 'image', array(
    'class' => 'UxBuilder\Options\Custom\ImageOption',
    'defaults' => array(
      'thumb_size' => '',
      'bg_position' => '',
    ),
  ) );
  add_ux_builder_option_type( 'text-editor' );
  add_ux_builder_option_type( 'margins', array(
    'defaults' => array(
      'unit' => 'px',
      'default' => '0px',
      'simple' => false,
    ),
  ) );
  add_ux_builder_option_type( 'radio-buttons' );
  add_ux_builder_option_type( 'radio-images' );
  add_ux_builder_option_type( 'scrubfield', array(
    'defaults' => array(
      'unit' => 'px',
      'default' => '0px',
    ),
  )  );
  add_ux_builder_option_type( 'select', array(
   'class' => 'UxBuilder\Options\Custom\SelectOption',
   'defaults' => array(
     'options' => array()
   ),
  ) );
  add_ux_builder_option_type( 'slider' );
  add_ux_builder_option_type( 'textfield' );
} );
