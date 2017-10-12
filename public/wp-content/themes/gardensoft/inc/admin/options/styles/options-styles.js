( function( $ ) {

	wp.customize( 'html_custom_css', function( value ) {
		value.bind( function( newval ) {
			appendStyle("html_custom_css", newval);
		} );
	} );

	wp.customize( 'html_custom_css_mobile', function( value ) {
		value.bind( function( newval ) {
			appendStyle("html_custom_css_mobile", '@media (max-width: 550px){'+newval+'}');
		} );
	} );

	wp.customize( 'html_custom_css_tablet', function( value ) {
		value.bind( function( newval ) {
			appendStyle("html_custom_css_tablet", '@media (max-width: 850px){'+newval+'}');
		} );
	} );


} )( jQuery );