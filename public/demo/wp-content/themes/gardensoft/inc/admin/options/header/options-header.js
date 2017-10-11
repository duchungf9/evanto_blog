( function( $ ) {

	wp.customize( 'header_width', function( value ) {
		value.bind( function( newval ) {
			$( '#header' ).removeClass('header-full-width');
			if(newval == 'full-width'){
				$('#header').addClass('header-full-width');
			}
		} );
	} );

	wp.customize( 'logo_position', function( value ) {
		value.bind( function( newval ) {
			$( '.header-inner' ).removeClass('logo-center logo-left');
			if(newval == 'center'){
				$('.header-builder .hb-main', parent.document).addClass('hb-logo-center');
				$('.header-inner').addClass('logo-center');
			} else {
				$('.header-builder .hb-main',  parent.document).removeClass('hb-logo-center');
				$('.header-inner').addClass('logo-left');
			}
		} );
	} );

	wp.customize( 'logo_width', function( value ) {
		value.bind( function( newval ) {
			var newval = parseInt(newval);
			$( '#logo' ).removeClass('changed');
			setTimeout(function(){ $( '#logo' ).addClass('changed'); }, 50);
			appendStyle('logo_width','#logo{width: '+newval+'px}');
		} );
	} );


	wp.customize( 'logo_padding', function( value ) {
		value.bind( function( newval ) {
			var newval = parseInt(newval);
			appendStyle('logo_padding','#logo img {padding: '+newval+'px 0}');
		} );
	} );

	wp.customize( 'header_bg', function( value ) {
		value.bind( function( newval ) {
			appendStyle('header_bg','.header-bg-color {background-color:'+newval+';}');
		} );
	} );

	wp.customize( 'nav_position_bg', function( value ) {
		value.bind( function( newval ) {
			appendStyle('nav_position_bg','.header-bottom {background-color:'+newval+';}');
		} );
	} );

	wp.customize( 'nav_height', function( value ) {
		value.bind( function( newval ) {
			if(newval !== 16){
				appendStyle('nav_height','.header-main .nav > li > a{line-height:'+newval+'px;}');
			}
		} );
	} );
	
	wp.customize( 'type_nav_color', function( value ) {
		value.bind( function( newval ) {
			appendStyle('type_nav_color','.header:not(.transparent) .header-nav.nav > li > a{color: '+newval+';}');
		} );
	} );


	wp.customize( 'nav_push', function( value ) {
		value.bind( function( newval ) {
			var newval = parseInt(newval);
			appendStyle('nav_push','.header-main .header-nav{margin-top:'+newval+'px;}');
		} );
	} );

	wp.customize( 'nav_height_sticky', function( value ) {
		value.bind( function( newval ) {
			appendStyle('nav_height_sticky','.stuck .header-main .nav > li > a{line-height:'+newval+'px;}');
		} );
	} );

	wp.customize( 'nav_height_bottom', function( value ) {
		value.bind( function( newval ) {
			appendStyle('nav_height_bottom','.header-bottom .nav > li > a{line-height:'+newval+'px;}');
		} );
	} );

	wp.customize( 'header_bg_transparent', function( value ) {
		value.bind( function( newval ) {
			appendStyle('header_bg_transparent','#header.transparent .header-wrapper {background-color:'+newval+';}');
		} );
	} );

	wp.customize( 'header_bg_img', function( value ) {
		value.bind( function( newval ) {
			appendStyle('header-wrapper-bg','.header-bg-image {background-image: url("'+newval+'")}');
		} );
	} );

	wp.customize( 'header_bg_img_repeat', function( value ) {
		value.bind( function( newval ) {
			appendStyle('header-wrapper-repeat','.header-bg-image {background-repeat: '+newval+'}');
		} );
	} );

	/* Header Heights */
	wp.customize( 'header_height', function( value ) {
		value.bind( function( newval ) {
			var newval = parseInt(newval);
			appendStyle('logo-height','#header #logo img{max-height: '+newval+'px!important}');
			appendStyle('header-height','#header .header-main{height: '+newval+'px!important}');
		} );
	} );

	wp.customize( 'header_height_transparent', function( value ) {
		value.bind( function( newval ) {
			var newval = parseInt(newval);
			appendStyle('transparent-height','#header.transparent #masthead{height: '+newval+'px!important}');
			appendStyle('transparent-height-logo','#header.transparent #logo img{max-height: '+newval+'px!important}');
		} );
	} );

	wp.customize( 'header_height_stuck', function( value ) {
		value.bind( function( newval ) {
			appendStyle('header_height_stuck','.header.show-on-scroll, .stuck .header-main{height: '+parseInt(newval)+'px}');
		} );
	} );

	wp.customize( 'header_bottom_height', function( value ) {
			value.bind( function( newval ) {
				var newval = parseInt(newval);
				appendStyle('header-bottom-height','.header-bottom{min-height: '+newval+'px}');
			} );
	} );


	wp.customize( 'header_top_height', function( value ) {
		value.bind( function( newval ) {
			var newval = parseInt(newval);
			appendStyle('header_top_height','.header-top {min-height: '+newval+'px}');
		} );
	} );


	wp.customize( 'header_height_mobile', function( value ) {
		value.bind( function( newval ) {
			jQuery('button.preview-mobile', parent.document).click();
			appendStyle('header_height_mobile','@media (max-width: 550px) { .header-main{height: '+newval+'px} #logo img{max-height: '+newval+'px}');
		} );
	} );

	wp.customize( 'mobile_overlay', function( value ) {
		value.bind( function( newval ) {
			$( 'html.has-off-canvas' ).removeClass('has-off-canvas-right has-off-canvas-center has-off-canvas-left');
			$( '.mfp-bg, .mfp-wrap' ).removeClass('off-canvas-right off-canvas-center off-canvas-left');
			$( '.mfp-content' ).removeClass('text-center');

			if(newval){
				$( 'html.has-off-canvas' ).addClass('has-off-canvas-'+newval);
				$( '.mfp-bg, .mfp-wrap' ).addClass('off-canvas-'+newval);
				if(newval == 'center'){$( '.mfp-content' ).addClass('text-center');}
			}
		} );
	} );

	wp.customize( 'mobile_overlay_bg', function( value ) {
		value.bind( function( newval ) {
			appendStyle('mobile_overlay_bg','.main-menu-overlay{background-color: '+newval+'!important}');
		} );
	} );

	wp.customize( 'mobile_overlay_color', function( value ) {
		value.bind( function( newval ) {
			$( '.off-canvas' ).removeClass('dark');
			if(newval == 'dark') {
				$( '.off-canvas' ).addClass('dark');
			}
		} );
	} );

	/* Header Nav colors */
	wp.customize( 'header_color', function( value ) {
			value.bind( function( newval ) {
				$( '.header-main' ).removeClass('nav-dark');
				if(newval == 'dark'){
					$( '.header-main' ).addClass('nav-dark');
				}
			} );
	} );

	wp.customize( 'nav_position_color', function( value ) {
			value.bind( function( newval ) {
				$( '.header-bottom' ).removeClass('nav-dark');
				if(newval == 'dark'){
					$( '.header-bottom' ).addClass('nav-dark');
				}
			} );
	} );

	wp.customize( 'topbar_color', function( value ) {
			value.bind( function( newval ) {
				$( '#top-bar' ).removeClass('nav-dark');
				if(newval == 'dark'){
					$( '#top-bar' ).addClass('nav-dark');
				};
			} );
	} );

	/* Box Shadow to header */
	wp.customize( 'box_shadow_header', function( value ) {
			value.bind( function( newval ) {
				$( 'body' ).removeClass('header-shadow');
				if(newval){
					$('body').addClass('header-shadow');
				}
			} );
	} );

	/* Header Search */
	wp.customize( 'header_search_width', function( value ) {
		value.bind( function( newval ) {
			appendStyle('header_search_width','.search-form{width: '+newval+'%}');
		} );
	} );

	wp.customize( 'header_search_form_style', function( value ) {
		value.bind( function( newval ) {
			$( 'header .searchform-wrapper' ).removeClass('form-flat');
			$( 'header .searchform-wrapper' ).addClass('form-'+newval);
		} );
	} );

	/* Dropdown */
	wp.customize( 'dropdown_text', function( value ) {
		value.bind( function( newval ) {
			$('.has-dropdown.menu-item:first').addClass('current-dropdown');
			$( '.nav-dropdown' ).removeClass('dark');
			if(newval == 'dark'){
				$( '.nav-dropdown' ).addClass(newval);
			};
		} );
	} );

	wp.customize( 'dropdown_text_style', function( value ) {
		value.bind( function( newval ) {
			$('.has-dropdown.menu-item:first').addClass('current-dropdown');
			$( '.nav-dropdown' ).removeClass('dropdown-uppercase');
			if(newval == 'uppercase'){
				$( '.nav-dropdown' ).addClass('dropdown-'+newval);
			};
		} );
	} );

	wp.customize( 'nav_uppercase', function( value ) {
		value.bind( function( newval ) {
			$( '.header-main .header-nav').removeClass('nav-uppercase');
			if(newval){
				$( '.header-main .header-nav').addClass('nav-uppercase');
			};
		} );
	} );


	wp.customize( 'nav_uppercase_bottom', function( value ) {
		value.bind( function( newval ) {
			$( '.header-bottom .header-nav').removeClass('nav-uppercase');
			if(newval){
				$( '.header-bottom .header-nav').addClass('nav-uppercase');
			};
		} );
	} );


 	wp.customize( 'topbar_elements_left', function( value ) {
		value.bind( function( newval ) {
			if(newval && !$('#top-bar').length) {
				$('#masthead').before('<div id="top-bar"></div>');
			}
		} );
	} );
	
    wp.customize( 'topbar_elements_center', function( value ) {
		value.bind( function( newval ) {
			if(newval && !$('#top-bar').length) {
				$('#masthead').before('<div id="top-bar"></div>');
			}
		} );
	} );
    wp.customize( 'topbar_elements_right', function( value ) {
		value.bind( function( newval ) {
			if(newval && !$('#top-bar').length) {
				$('#masthead').before('<div id="top-bar"></div>');
			}
		} );
	} );

	wp.customize( 'header_elements_bottom_left', function( value ) {
		value.bind( function( newval ) {
			if(newval && !$('#wide-nav').length) {
				$('#masthead').after('<div id="wide-nav"></div>');
			}
		} );
	} );

	wp.customize( 'header_elements_bottom_right', function( value ) {
		value.bind( function( newval ) {
			if(newval && !$('#wide-nav').length) {
				$('#masthead').after('<div id="wide-nav"></div>');
			}
		} );
	} );
	
	wp.customize( 'header_elements_bottom_center', function( value ) {
		value.bind( function( newval ) {
			if(newval && !$('#wide-nav').length) {
				$('#masthead').after('<div id="wide-nav"></div>');
			}
		} );
	} );	

	wp.customize( 'dropdown_style', function( value ) {
		value.bind( function( newval ) {
			$('.has-dropdown.menu-item:first').addClass('current-dropdown');
			$( '.nav-dropdown' ).removeClass('nav-dropdown-bold nav-dropdown-simple nav-dropdown-default');
			if(newval){
				$( '.nav-dropdown' ).addClass('nav-dropdown-'+newval);
			};
		} );
	} );

	wp.customize( 'dropdown_border', function( value ) {
		value.bind( function( newval ) {
			$('.has-dropdown.menu-item:first').addClass('current-dropdown');
			appendStyle('dropdown_border','li.has-dropdown:before{border-bottom-color:'+newval+';} .nav .nav-dropdown{border-color: '+newval+' }');
		} );
	} );

	wp.customize( 'dropdown_bg', function( value ) {
		value.bind( function( newval ) {
			$('.has-dropdown.menu-item:first').addClass('current-dropdown');
			appendStyle('dropdown_bg','li.has-dropdown:after{border-bottom-color:'+newval+';} .nav .nav-dropdown{background-color: '+newval+' }');
		} );
	} );

	// Custom texts
	wp.customize( 'top_right_text', function( value ) {
		value.bind( function( newval ) {
			$('.html_top_right_text').html(newval);
		} );
	} );

	wp.customize( 'nav_position_text_top', function( value ) {
		value.bind( function( newval ) {
			$('.html_nav_position_text_top').html(newval);
		} );
	} );

	wp.customize( 'topbar_left', function( value ) {
		value.bind( function( newval ) {
			$('.html_topbar_left').html(newval);
		} );
	} );

	wp.customize( 'topbar_right', function( value ) {
		value.bind( function( newval ) {
			$('.html_topbar_right').html(newval);
		} );
	} );

	wp.customize( 'nav_position_text', function( value ) {
		value.bind( function( newval ) {
			$('.html_nav_position_text').html(newval);
		} );
	} );

	wp.customize( 'header_newsletter_height', function( value ) {
		value.bind( function( newval ) {
			$('#header-newsletter-signup .banner').css('padding-top', newval);
		} );
	} );

} )( jQuery );