<?php

/*************
 * Pages Panel
 *************/

Flatsome_Option::add_section( 'pages', array(
    'title'       => __( 'Pages', 'flatsome-admin' ),
    'description' => __( 'Change the default page layout for all pages. You can also override some of these options per page in the page editor.', 'flatsome-admin' ),
) );


Flatsome_Option::add_field( 'option', array(
    'type'        => 'select',
    'settings'     => 'pages_template',
    'label'       => __( 'Default - Page Template', 'flatsome-admin' ),
    'section'     => 'pages',
    'default'     => 'default',
    'choices'     => array(
        'default' => __( 'Container (Default)', 'flatsome-admin' ),
        'blank' => __( 'Full-Width', 'flatsome-admin' ),
        'transparent-header' => __( 'Full-Width - Transparent Header', 'flatsome-admin' ),
        'transparent-header-light' => __( 'Full-Width - Transparent Header Light', 'flatsome-admin' ),
        'right-sidebar' => __( 'Sidebar Right', 'flatsome-admin' ),
        'left-sidebar' => __( 'Sidebar Left', 'flatsome-admin' ),
    ),
));

/*
Flatsome_Option::add_field( 'option', array(
    'type'        => 'select',
    'settings'     => 'pages_title',
    'label'       => __( 'Default - Page Title', 'flatsome-admin' ),  
    'section'     => 'pages',
    'default'     => 'blank',
    'choices'     => array(
        'blank' => __( 'Blank', 'flatsome-admin' ),
        'title' => __( 'Title - Left', 'flatsome-admin' ),
        'centered' => __( 'Title - Centered', 'flatsome-admin' ),
        'breadcrumbs' => __( 'Breadcrumbs - Title', 'flatsome-admin' ),
        'breadcrumbs-centered' => __( 'Breadcrumbs - Title Centered', 'flatsome-admin' ),
        'breadcrumbs-simple' => __( 'Breadcrumbs - Simple', 'flatsome-admin' ),
    ),
));


Flatsome_Option::add_field( 'option', array(
    'type'        => 'select',
    'settings'     => 'pages_title_style',
    'label'       => __( 'Default - Page Title Style', 'flatsome-admin' ),  
    'section'     => 'pages',
    'default'     => 'normal',
    'choices'     => array(
        'small' => __( 'Small', 'flatsome-admin'),
        'normal' => __( 'Normal', 'flatsome-admin' ),
        'medium' => __( 'Medium', 'flatsome-admin' ),
        'large' => __( 'Large', 'flatsome-admin' ),
        'featured-small' => __( 'Featured - Small', 'flatsome-admin' ),
        'featured-normal' => __( 'Featured - Normal', 'flatsome-admin' ),
        'featured-medium' => __( 'Featured - Medium', 'flatsome-admin' ),
        'featured-large' => __( 'Featured - Large', 'flatsome-admin' ),
        'featured-full' => __( 'Featured - Full', 'flatsome-admin' ),
)));


Flatsome_Option::add_field( 'option',  array(
    'type'        => 'color-alpha',
    'settings'     => 'pages_title_bg_color',
    'label'       => __( 'Featured - Page Header BG Color', 'flatsome-admin' ),
    'section'     => 'pages',
    'default'     => '',
    'transport' => 'postMessage'
));

Flatsome_Option::add_field( 'option',  array(
    'type'        => 'image',
    'settings'     => 'pages_title_bg_image',
    'label'       => __( 'Featured - Page Header BG Image', 'flatsome-admin' ),
    'section'     => 'pages',
    'default'     => '',
    'transport' => 'postMessage'
));

Flatsome_Option::add_field( 'option',  array(
    'type'        => 'checkbox',
    'settings'     => 'pages_title_bg_featured',
    'label'       => __( 'Use Featured Image as Background', 'flatsome-admin' ),
    'section'     => 'pages',
    'default'     => '1',
));
*/

?>