<?php

function ux_builder_admin_setup() {
    do_action( 'ux_builder_init' );
}
add_action( 'admin_init', 'ux_builder_admin_setup' );

/**
 * Add «Edit with UX Builder» button in
 * admin toolbar for registered post types.
 */
function ux_builder_admin_bar_link() {
    global $wp_admin_bar;
    global $post;

    if( ! is_page() && ! is_single() ) return;

    $permalink = get_the_permalink();
    $afterlink = get_option( 'permalink_structure' ) ? '?' : '&';
    $post_types = get_ux_builder_post_types();

    if ( array_key_exists( $post->post_type, $post_types ) ) {
        $wp_admin_bar->add_menu( array(
            'parent' => 'edit',
            'id' => 'edit_uxbuilder',
            'title' => 'Edit with UX Builder',
            'href' => ux_builder_edit_url( $post->ID ),
        ));
    }
}
add_action( 'wp_before_admin_bar_render', 'ux_builder_admin_bar_link' );

/**
 * Add editor tabs to top of edit page on registered post types.
 */
function ux_builder_meta_boxes() {
    $current_screen = get_current_screen()->id;
    $post_types = get_ux_builder_post_types();

    if ( array_key_exists( $current_screen, $post_types ) ) {
        add_action( 'edit_form_top', 'ux_builder_edit_form_top' );
    }
}
add_action( 'add_meta_boxes', 'ux_builder_meta_boxes' );

/**
 * Render the editor tabs.
 */
function ux_builder_edit_form_top(){
    global $post; ?>
    <h2 id="uxbuilder-enable-disable" class="nav-tab-wrapper woo-nav-tab-wrapper">
        <a href="<?php echo admin_url( "post.php?post={$post->ID}&action=edit" ) ?>" class="nav-tab nav-tab-active">
            <?php echo __( 'Editor' ); ?>
        </a>
        <a href="<?php echo ux_builder_edit_url( $post->ID ); ?>" class="nav-tab">
            <strong style="color:#627f9a; padding: 0px 5px; margin-right:5px; border: 2px solid #627f9a;">UX</strong>
            <?php echo __( 'Builder' ); ?>
        </a>
    </h2>
    <?php
}

/**
 * Add inline links to post tables.
 *
 * @param  array  $actions
 * @param  object $page_object
 * @return array
 */
function ux_builder_page_row_actions( $actions, $page_object ) {
    $post_types = get_ux_builder_post_types();

    if ( array_key_exists( $page_object->post_type, $post_types ) ) {
        array_splice($actions, 1, 0, '<a href="' . ux_builder_edit_url( $page_object->ID ) . '">' . __( 'Edit with UX Builder' ) . '</a>' );
    }

    return $actions;
}
add_filter( 'page_row_actions', 'ux_builder_page_row_actions', 10, 2 );

/**
 * Save block contents.
 *
 * @param  string $content
 * @param  array  $options
 */
function ux_builder_update_block_content( $content, $options ) {

    global $wpdb;

    if( ! array_key_exists( 'id', $options ) ) return;

    $post_name = $options['id'];
    $post_id = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE post_name = '$post_name'" );

    $post = array(
        'ID' => $post_id,
        'post_content' => $content,
    );

    if( ! wp_update_post( $post ) ) {
        throw new Exception("Error while saving block: '{$post_name}", 1);
    }
}
add_action( 'ux_builder_save_block', 'ux_builder_update_block_content', 10, 2 );

/**
 * Search only page title when searching for posts.
 *
 * @param  string $search
 * @param  object &$wp_query
 * @return string
 */
function ux_builder_post_search( $search, &$wp_query ) {
    global $wpdb;

    if( empty( $search ) ) return $search;

    if ( array_key_exists( 'action', $_GET ) &&
        $_GET['action'] == 'ux_builder_search_posts' ) {

        $q = $wp_query->query_vars;
        $n = !empty( $q['exact'] ) ? '' : '%';
        $search = $searchand = '';

        foreach ( (array) $q['search_terms'] as $term) {
            $term = esc_sql( $wpdb->esc_like( $term ) );
            $search .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
            $searchand = ' AND ';
        }

        if ( !empty( $search ) ) {
            $search = " AND ({$search}) ";
            if (!is_user_logged_in())
                $search .= " AND ($wpdb->posts.post_password = '') ";
        }
    }
    return $search;
}
add_filter( 'posts_search', 'ux_builder_post_search', 500, 2 );
