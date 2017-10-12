<?php


function flatsome_sidebar_shortcode( $atts ){
  
  extract( shortcode_atts( array(
    'id' => '',
  ), $atts ) );

  return dynamic_sidebar($id);
     
}
add_shortcode('ux_sidebar', 'flatsome_sidebar_shortcode');