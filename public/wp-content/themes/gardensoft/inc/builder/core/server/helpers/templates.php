<?php

function ux_builder_add_template ( $id, $data ) {
  ux_builder( 'templates' )->set( $id, $data );
}

function ux_builder_remove_template ( $id ) {
  ux_builder( 'templates' )->remove( $id );
}
