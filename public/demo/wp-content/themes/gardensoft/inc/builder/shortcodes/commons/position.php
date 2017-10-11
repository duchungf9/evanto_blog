<?php

return array(
    'type' => 'group',
    'heading' => __( 'Position' ),
    'require' => array('ux_banner'),
    'options' => array(
      'position_x' => array(
        'type' => 'slider',
        'heading' => __( 'Horizontal' ),
        'responsive' => true,
        'default' => 50,
        'min'  => 0,
        'max'  => 100,
        'step' => 5
      ),
      'position_y' => array(
        'type' => 'slider',
        'heading' => __( 'Vertical' ),
        'responsive' => true,
        'default' => 50,
        'min'  => 0,
        'max'  => 100,
        'step' => 5
        ),
    ),
);
