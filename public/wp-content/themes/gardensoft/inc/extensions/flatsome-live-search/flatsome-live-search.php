<?php

function flatsome_live_search_script(){
     global $extensions_uri;
     wp_enqueue_script( 'flatsome-live-search', $extensions_uri.'/flatsome-live-search/flatsome-live-search.js', FALSE, '3.0', TRUE );
}

add_action( 'wp_enqueue_scripts', 'flatsome_live_search_script' );

function flatsome_ajax_search_products() {
            global $woocommerce;

            $search_keyword = esc_attr( $_REQUEST['query'] );

            $ordering_args = $woocommerce->query->get_catalog_ordering_args( 'title', 'asc' );
            $suggestions   = array();

            $args = array(
                's'                   => apply_filters( 'flatsome_ajax_search_products_search_query', $search_keyword ),
                'post_type'           => 'product',
                'post_status'         => 'publish',
                'ignore_sticky_posts' => 1,
                'orderby'             => $ordering_args['orderby'],
                'order'               => $ordering_args['order'],
                'meta_query'          => array(
                    array(
                        'key'     => '_visibility',
                        'value'   => array( 'search', 'visible' ),
                        'compare' => 'IN'
                    )
                )
            );

            $args_posts = array(
                's'                   => apply_filters( 'flatsome_ajax_search_products_search_query', $search_keyword ),
                'post_type'           => array('post','page'),
                'post_status'         => 'publish',
                'ignore_sticky_posts' => 1,
                'orderby'             => $ordering_args['orderby'],
                'order'               => $ordering_args['order'],
            );

            $posts = get_posts( $args_posts );


            if ( isset( $_REQUEST['product_cat'] ) ) {
                $args['tax_query'] = array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'product_cat',
                        'field'    => 'term_id',
                        'terms'    => $_REQUEST['product_cat']
                    ) );
            }

            $products = get_posts( $args );

            // Get products
            if ( !empty( $products ) ) {

                foreach ( $products as $post ) {
                    $product = wc_get_product( $post );

                    $product_image = wp_get_attachment_image_src( get_post_thumbnail_id( $product->id ) );

                    if(isset($product->id)){
                        $suggestions[] = array(
                            'type' => 'Product',
                            'id'    => $product->id,
                            'value' => $product->get_title(),
                            'url'   => $product->get_permalink(),
                            'price'   => $product->get_price_html(),
                            'img'   => $product_image[0]
                        );
                    }
                }
            }

            // Get posts
            if( !empty( $posts) ){
                foreach ( $posts as $post ) {
                    $suggestions[] = array(
                        'type' => 'Page',
                        'id'    => $post->ID,
                        'value' => get_the_title($post->ID),
                        'url'   => get_the_permalink($post->ID),
                        'img'   => get_the_post_thumbnail_url($post->ID,'thumbnail'),
                        'price'   => '',
                    );
                }
            }

            // Empty message
            if(empty( $posts) && empty( $products)) {
                $suggestions[] = array(
                    'id'    => - 1,
                    'value' => __( 'No results', 'woocommerce' ),
                    'url'   => '',
                );
            }

            wp_reset_postdata();


            $suggestions = array(
                'suggestions' => $suggestions
            );


            echo json_encode( $suggestions );
            die();
}

add_action( 'wp_ajax_flatsome_ajax_search_products', 'flatsome_ajax_search_products' );

add_action( 'wp_ajax_nopriv_flatsome_ajax_search_products','flatsome_ajax_search_products' );
