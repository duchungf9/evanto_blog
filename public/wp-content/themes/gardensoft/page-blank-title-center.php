<?php
/*
Template name: Default Template (Center title)
*/
get_header(); 
?>

<?php do_action( 'flatsome_before_page' ); ?>

<div class="row page-wrapper">
<div id="content" class="large-12 col" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
					<header class="entry-header text-center">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<div class="is-divider medium"></div>
					</header>

					<div class="entry-content">
						<?php the_content(); ?>
					</div>
					
				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template();
				?>

		<?php endwhile; // end of the loop. ?>


</div><!-- #content -->
</div><!-- .row -->

<?php get_footer(); ?>