<?php

$sidebar_options = array();
foreach ($GLOBALS['wp_registered_sidebars'] as $sidebar){
    $sidebar_options[$sidebar['id']] = $sidebar['name'];
}


// TODO: Get sidebars
add_ux_builder_shortcode( 'ux_sidebar', array(
    'name' => __( 'Sidebar' ),
    'category' => __( 'Layout' ),
    'thumbnail' =>  flatsome_ux_builder_thumbnail( 'sidebar' ),
    'options' => array(
        'id' => array(
            'type' => 'select',
            'heading' => 'Sidebar',
            'options' => $sidebar_options
        ),

    ),
) );