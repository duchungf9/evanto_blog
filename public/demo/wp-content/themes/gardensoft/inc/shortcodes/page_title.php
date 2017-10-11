<?php

// [page_tile]
function flatsome_page_title_shortcode($atts, $content = null) {
  extract(shortcode_atts(array(
        '_id' => false,
        'bg'  => '', // url / use featured by default
        'bg_color' => '',
        'bg_featured' => false,
        'bg_overlay' => '',
        'height' => '100px',
        'parallax' => '',
        'padding' => '',
        'x_align' => 'center', // left / Center
        'y_align' => 'middle', // top / middle / bottom
  ), $atts));

  $shortcode_id = 'el-' . ( $_id ? $_id : rand() );

  ?>

  <div class="page-title featured-title dark no-overflow" id="<php echo $shortcode_id;?>">
    <div class="page-title-bg bg-fill fill" 
    data-parallax-container=".page-title" data-parallax="-4">
      <div class="page-title-bg-overlay fill"></div>
    </div>

    <div class="page-title-inner container flex-row align-middle text-center medium-text-center">
      <div class="flex-col">
        <?php echo do_shortcode($content); ;?>
      </div>
    </div><!-- flex-row -->

  </div><!-- .page-title -->

 <?php
 $args = array(
    'height' => array( 'target' => '.page-title-inner', 'attribute' => 'min-height','value' => $height),
    'bg' => array('target' => '.page-title-bg', 'attribute' => 'background-image', 'value' => $bg),
    'bgOverlay' => array('target' => '.page-title-bg-overlay','attribute' => 'background-color','value' => $bg_overlay)
  );
  if ( function_exists( 'ux_builder' ) && $_id ) {
    echo ux_builder_element_style_tag( $_id, $args );
  }  
  ?>
  <?php
}

add_shortcode("page_title", "flatsome_page_title_shortcode");