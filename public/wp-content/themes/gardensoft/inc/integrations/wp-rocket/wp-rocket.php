<?php

function flatsome_wp_rocket_integration() {
  global $integrations_uri;

  if(get_rocket_option( 'lazyload' )){
  	 wp_enqueue_script( 'flatsome-wp-rocket',  $integrations_uri.'/wp-rocket/flatsome-wp-rocket.js', array('flatsome-js'), 3.0, true);
  }

}
add_action( 'wp_enqueue_scripts', 'flatsome_wp_rocket_integration' );