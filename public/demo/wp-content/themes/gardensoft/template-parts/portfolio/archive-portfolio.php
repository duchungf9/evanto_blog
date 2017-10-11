<?php get_template_part('template-parts/portfolio/archive-portfolio-title', flatsome_option('portfolio_archive_title')); ?>

<div id="content" role="main" class="page-wrapper">		
	<?php
		$post_counter = 0;
		$ids = array();

		if(is_page()){
			$wp_query = new WP_Query(array(
				'post_type' => 'featured_item',
				'posts_per_page' => 12,
				'orderby'=> 'menu_order',
				'paged'=>$paged
			));
		}
		
		while ($wp_query->have_posts()) : $wp_query->the_post();
			$post_counter++;
			array_push($ids, get_the_ID());
		endwhile; // end of the loop.

		$ids = implode(',', $ids);

		$filter = flatsome_option('portfolio_archive_filter');
		$filter_nav = flatsome_option('portfolio_archive_filter_style');

		if($filter == 'disabled' || is_tax()){
			$filter = 'disabled';
		}
		
		echo do_shortcode('[featured_items_grid filter="'.$filter.'" filter_nav="'.$filter_nav.'" type="row" ids="'.$ids.'"]');
	?>

<?php wp_reset_query(); ?>

</div><!-- #content -->