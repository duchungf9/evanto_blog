<?php

namespace UxBuilder\Ajax;

use UxBuilder\Options\Options;
use UxBuilder\Transformers\ArrayToString;

class PostSaver {

  public function save() {
    define( 'UX_BUILDER_SAVING', true );

    $post_content = '';
    $data = json_decode( stripslashes( $_POST['data'] ), true );

    if( array_key_exists( 'children', $data['content'] ) ) {
      $post_content = ux_builder( 'to-string' )->transform( $data['content']['children'] );
    }

    $post = apply_filters( 'ux_builder_save_post', array_merge( $data['attributes'], array(
      'ID' => $data['id'],
      'meta_input' => $data['meta'],
      'post_content' => trim( $post_content ),
      'post_status' => 'publish',
    ) ) );

    if ( wp_update_post( $post ) ) {
      return wp_send_json_success( $post );
    }

    return wp_send_json_error();
  }
}
