<?php

namespace UxBuilder\Collections;

class Breakpoints extends Collection {

  protected $default_name;

  /**
   * Add a breakpoint and sort the collection by
   * breakpoint width from smallest to largest.
   *
   * @param array $item
   */
  public function set( $name, $item ) {
    $this->items[$name] = $item;
    uasort( $this->items, function ( $a, $b ) {
      return ( $a['width'] > $b['width'] ) ? 1 : -1;
    } );
  }

  /**
   * Set the default breakpoint by index.
   */
  public function set_default( $index ) {
    $this->default = $index;
  }

  /**
   * Get the default breakpoint name.
   *
   * @return string
   */
  public function get_default() {
    return $this->default;
  }

  /**
   * Generate an array to be used as editor data.
   *
   * @return array
   */
  public function to_array() {
    return array(
      'current' => $this->get_default(),
      'default' => $this->get_default(),
      'all' => $this->items,
    );
  }
}
