<?php 

Flatsome_Option::add_section( 'type', array(
    'title' => __( 'Typography', 'flatsome-admin' ),
    'panel'       => 'style',
) );


Flatsome_Option::add_field( 'option',  array(
    'type'        => 'checkbox',
    'settings'     => 'disable_fonts',
    'label'       => __( 'Disable google fonts. No fonts will be loaded from Google.', 'flatsome-admin' ),
    'section'  => 'type',
    'default'     => 0,
));

Flatsome_Option::add_field( '', array(
    'type'        => 'custom',
    'settings' => 'custom_title_type_headings',
    'label'       => __( '', 'flatsome-admin' ),
    'section'  => 'type',
    'default'     => '<div class="options-title-divider">Headlines</div>',
) );

Flatsome_Option::add_field( 'option', array(
    'type'        => 'typography',
    'settings'    => 'type_headings',
    'label'       => esc_attr__( 'Font', 'flatsome-admin' ),
    'transport' => 'auto',
    'section'  => 'type',
    'default'     => array(
        'font-family'    => 'Lato',
        'variant'        => '700',
    ),
) );

Flatsome_Option::add_field( '', array(
    'type'        => 'custom',
    'settings' => 'custom_title_type_base',
    'label'       => __( '', 'flatsome-admin' ),
    'section'  => 'type',
    'default'     => '<div class="options-title-divider">Base</div>',
) );

Flatsome_Option::add_field( 'option', array(
    'type'        => 'typography',
    'settings'    => 'type_texts',
    'label'       => esc_attr__( 'Base Text Font', 'flatsome-admin' ),
    'section'  => 'type',
    'default'     => array(
        'font-family'    => 'Lato',
        'variant' => '400',
    ),
) );

Flatsome_Option::add_field( '', array(
    'type'        => 'custom',
    'settings' => 'custom_title_type_nav',
    'label'       => __( '', 'flatsome-admin' ),
    'section'  => 'type',
    'default'     => '<div class="options-title-divider">Navigation</div>',
) );

Flatsome_Option::add_field( 'option', array(
    'type'        => 'typography',
    'settings'    => 'type_nav',
    'label'       => esc_attr__( 'Font', 'flatsome-admin' ),
    'section'  => 'type',
    'transport' => $transport,
    'default'     => array(
        'font-family'    => 'Lato',
        'variant'        => '700',
    ),
) );

Flatsome_Option::add_field( '', array(
    'type'        => 'custom',
    'settings' => 'custom_title_type_alt',
    'label'       => __( '', 'flatsome-admin' ),
    'section'  => 'type',
    'default'     => '<div class="options-title-divider">Alt Fonts</div>',
) );

Flatsome_Option::add_field( 'option', array(
    'type'        => 'typography',
    'settings'    => 'type_alt',
    'label'       => esc_attr__( 'Alt font (.alt-font)', 'flatsome-admin' ),
    'section'  => 'type',
    'transport' => $transport,
    'default'     => array(
        'font-family'    => 'Dancing Script',
    ),
) );