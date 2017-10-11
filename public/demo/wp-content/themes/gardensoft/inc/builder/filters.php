<?php

/**
 * Modify CSS declarations before element styles are generated.
 *
 * @param   array  $declaration
 * @return  array
 */
add_filter( 'ux_builder_css_declaration', function ( $declaration ) {
  switch ( $declaration['property'] ) {
    case 'height':
      if( $declaration['value'] == '100%' ) {
        $declaration['value'] = '100vh';
      } else if( strpos( $declaration['value'], '%' ) !== false ) {
        $declaration['property'] = 'padding-top';
      }
      break;
  }
  return $declaration;
} );
