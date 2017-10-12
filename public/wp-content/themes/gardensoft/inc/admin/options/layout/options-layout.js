( function( $ ) {

	wp.customize( 'body_layout', function( value ) {
		value.bind( function( newval ) {
			$('body').removeClass('boxed framed full-width');
			$('body').addClass(newval);
		} );
	} );

	wp.customize( 'site_width', function( value ) {
		value.bind( function( newval ) {
			newval = parseInt(newval);
			if(newval < 300) return;
			appendStyle('site_width','.container, .row {max-width: '+parseInt(newval - 30)+'px } .row.row-collapse{max-width:'+parseInt(newval - 60)+'px} .row.row-small{max-width: '+parseInt(newval - 37.5)+'px} .row.row-large{max-width: '+parseInt(newval)+'px}');
			setTimeout(function(){
				jQuery('.slider').flickity('resize');
				jQuery('.row-grid').packery('layout');

			}, 300);	
		} );
	} );

	wp.customize( 'body_bg', function( value ) {
		value.bind( function( newval ) {
			appendStyle('body_bg', 'html{background-color: '+newval+'}');
		} );
	} );

	wp.customize( 'box_shadow', function( value ) {
		value.bind( function( newval ) {
			$( 'body' ).removeClass('box-shadow');
			if(newval){
				$('body').addClass('box-shadow');
			}
		} );
	} );

	wp.customize( 'body_bg_image', function( value ) {
		value.bind( function( newval ) {
			appendStyle('body_bg_image','html {background-image: url("'+newval+'") }');
		} );
	} );


	wp.customize( 'body_bg_type', function( value ) {
		value.bind( function( newval ) {
			$('html').removeClass('bg-fill');
			if(newval == 'bg-full-size'){
				$('html').addClass('bg-fill');
			}
		} );
	} );

	wp.customize( 'content_color', function( value ) {
		value.bind( function( newval ) {
			$('#main').removeClass('dark');
			if(newval == 'dark'){
				$('#main').addClass('dark');
			}
		} );
	} );

	wp.customize( 'content_bg', function( value ) {
		value.bind( function( newval ) {
			appendStyle('content_bg','#main{background-color: '+newval+'!important}');
		} );
	} );
	
} )( jQuery );