<?php

/**
 * Editor mode.
 *
 * @return  tring
 */
function ux_builder_mode() {
  return $_GET['ux_builder'] === 'frontend' ? 'frontend' : 'backend';
}

/**
 * Is the builder active?
 *
 * @return  boolean
 */
function ux_builder_is_active() {
  return ( ux_builder_is_iframe() || ux_builder_is_editor() ) && is_user_logged_in();
}

/**
 * Is this the editor?
 *
 * @return  boolean
 */
function ux_builder_is_editor() {
  return array_key_exists( 'ux_builder', $_GET );
}

/**
 * Is this the iframe?
 *
 * @return  boolean
 */
function ux_builder_is_iframe() {
  return array_key_exists( 'uxb_iframe', $_GET );
}
