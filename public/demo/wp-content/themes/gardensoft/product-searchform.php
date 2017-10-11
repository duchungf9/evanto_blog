<?php
/**
 * The template for displaying search forms in flatsome
 *
 * @package flatsome
 */
?>
<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<div class="flex-row relative">
			<?php if(flatsome_option('header_search_categories')){ ?>
			<div class="flex-col search-form-categories">
			<?php
				$args = array(
				    'number'     => '999',
				    'orderby'    => 'name',
				    'hide_empty' => true,
				);

				$product_categories = get_terms( 'product_cat', $args );

				$selected_category = ( isset( $_REQUEST['product_cat'] ) ) ? $_REQUEST['product_cat'] : '';

				echo '<select class="search_categories resize-select mb-0" name="product_cat">';
				echo '<option value="" '.selected( '', $selected_category ).'>'.__( 'All', 'flatsome' ).'</option>';

				foreach ($product_categories as $value) {
					if($value && !$value->parent) echo '<option value="'.$value->term_id.'" '.selected( $value->term_id, $selected_category ).'>'.$value->name.'</option>';
				}
				echo '</select>';
			?> 
			</div><!-- .flex-col -->
			<?php } ?>
			<div class="flex-col flex-grow">
			  <input type="search" class="search-field mb-0" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php echo _e( 'Search', 'woocommerce' ); ?>&hellip;" />
		      <input type="hidden" name="post_type" value="product" />
		        <?php if ( defined( 'ICL_LANGUAGE_CODE' ) ): ?>
		            <input type="hidden" name="lang" value="<?php echo( ICL_LANGUAGE_CODE ); ?>" />
		        <?php endif ?>
			</div><!-- .flex-col -->
			<div class="flex-col">
				<button type="submit" class="ux-search-submit submit-button secondary button icon mb-0">
					<?php echo get_flatsome_icon('icon-search'); ?>
				</button>
			</div><!-- .flex-col -->
		</div><!-- .flex-row -->

	 <div class="live-search-results text-left z-top"></div>
</form>