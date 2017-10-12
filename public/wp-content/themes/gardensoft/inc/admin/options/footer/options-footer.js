( function( $ ) {

	wp.customize( 'footer_1_bg_color', function( value ) {
		value.bind( function( newval ) {
			appendStyle('footer_1_bg_color','.footer-1{background-color: '+newval+'}');
		} );
	} );

	wp.customize( 'footer_2_bg_color', function( value ) {
		value.bind( function( newval ) {
			appendStyle('footer_2_bg_color','.footer-2{background-color: '+newval+'}');
		} );
	} );

	wp.customize( 'footer_bottom_color', function( value ) {
		value.bind( function( newval ) {
			appendStyle('footer_bottom_color','.absolute-footer, html{background-color: '+newval+'}');
		} );
	} );

} )( jQuery );