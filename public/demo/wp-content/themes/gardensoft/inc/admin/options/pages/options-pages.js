( function( $ ) {

	wp.customize( 'pages_title_bg_image', function( value ) {
			value.bind( function( newval ) {
				$('.page-title-bg .bg-title' ).css('background-image','url('+newval+')');
			} );
	});

	wp.customize( 'pages_title_bg_color', function( value ) {
			value.bind( function( newval ) {
				$( '.title-overlay' ).css('background-color',newval);
			} );
	});

} )( jQuery );