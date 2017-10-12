<?php
/**
 * Flatsome functions and definitions
 *
 * @package flatsome
 */

require get_template_directory() . '/inc/init.php';
// Thay doi duong dan logo admin
function wpc_url_login(){
return "http://gardensoft.com.vn/"; // duong dan vao website cua ban
}
add_filter('login_headerurl', 'wpc_url_login');

// Thay doi logo admin wordpress
function login_css() {
wp_enqueue_style( 'login_css', get_template_directory_uri() . '/login.css' ); // duong dan den file css moi
}
add_action('login_head', 'login_css');

/**
 * Note: It's not recommended to add any custom code here. Please use a child theme so that your customizations aren't lost during updates.
 * Learn more here: http://codex.wordpress.org/Child_Themes
 */