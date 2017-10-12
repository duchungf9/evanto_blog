( function( $ ) {

	/* Product Page */
	wp.customize( 'product_image_width', function( value ) {
		value.bind( function( newval ) {
			$( '.product-gallery.col' ).removeClass('large-5 large-6 large-4 large-8 large-9 large-7 large-3 large-2');
			$( '.product-gallery.col' ).addClass('large-'+newval);
			$( '.js-flickity' ).flickity('resize');

			var image_width = $( '.product-gallery' ).find('.slide').outerWidth();

			$('#customize-control-product_image_width .selectize-control', parent.document).attr('data-helper-label','Recommended product image size: '+image_width+'px<. You can change this in WooCommerce Image Settings.');
		} );
	} );

} )( jQuery );