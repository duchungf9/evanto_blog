<?php

namespace UxBuilder\Ajax;

class Terms {

  public function get_terms() {
    $term_ids = array_key_exists( 'values', $_GET ) ? $_GET['values'] : array();
    $option = array_key_exists( 'option', $_GET ) ? $_GET['option'] : array();

    if ( empty ( $term_ids ) ) {
      return wp_send_json_success( array() );
    }

    $terms = get_terms( $option['taxonomies'], array(
      'include' => is_array( $term_ids ) ? $term_ids : array( $term_ids ),
      'hide_empty' => false,
      'orderby' => 'include',
    ) );

    $items = array_map( function ($term) {
      return array(
        'id' => $term->term_id,
        'title' => $term->name,
      );
    }, $terms );

    wp_send_json_success( $items );
  }

  public function search_terms() {
    $query = array_key_exists( 'query', $_GET ) ? $_GET['query'] : array();
    $option = array_key_exists( 'option', $_GET ) ? $_GET['option'] : array();

    $terms = get_terms( $option['taxonomies'], array(
      'number' => 25,
      'search' => $query,
      'hide_empty' => false,
    ) );

    $items = array_map( function ($term) {
      return array(
        'id' => $term->term_id,
        'title' => $term->name,
      );
    }, $terms );

    wp_send_json_success( $items );
  }
}
