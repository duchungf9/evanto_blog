function appendStyle(id, style){
	if(!jQuery('style#customizer-preview-'+id).length){
		jQuery('head').append('<style id="customizer-preview-'+id+'">'+style+'</style>');
	} else {
		jQuery('style#customizer-preview-'+id).text(style);
	}
}

( function( $ ) {

	$( document ).ready(function() {

		// Run JS after refresh
		if(wp.customize.selectiveRefresh){

			wp.customize.selectiveRefresh.bind( 'partial-content-rendered', function( placement ){
				 Flatsome.attach(placement.container);
				 createHelperTooltips(placement.container);
				 $('.partial-refreshing').remove();
			} );
		}

		var customize_helpers = [
			{target: '.product-footer', text: 'Product Tabs', focus: 'product_display',  pos: 'top'},
			{target: '.product-gallery', text: 'Product Gallery', focus: 'product_zoom',  pos: 'top'},
			{target: '#wrapper', text: 'Layout', focus: 'body_layout', pos: 'left'},
			{target: '.header-top', text: 'Top Bar', focus: 'top_bar', type: 'section'},
			{target: '.header-main', text: 'Header Main', focus: 'main_bar', type: 'section'},
			{target: '.header-bottom', text: 'Header Bottom',  focus: 'bottom_bar', type: 'section'},
			{target: '.product-info', text: 'Product Summary', focus: 'product_info_meta', pos: 'top'},
			{target: '.widget-upsell', text: 'Product Upsells', focus: 'product_upsell'},
			{target: '.social-icons.share-icons', text: 'Share Icons', focus: 'social_icons'},
			{target: '#logo', text: 'Logo', focus: 'blogname'},
			{target: '#header.transparent', text: 'Transparent Header', focus: 'header_height_transparent', pos: 'bottom-left'},
			{target: '.header-wrapper .nav-dropdown', text: 'Dropdown Style', focus: 'dropdown_border', pos: 'top-left'},
			{target: '.product-container', text: 'Product Layout', focus: 'product_layout', pos: 'top'},
			{target: '#product-sidebar', text: 'Product Sidebar Widgets', focus: 'sidebar-widgets-product-sidebar', type: 'section',  pos: 'top'},
			{target: '#shop-sidebar', text: 'Category Sidebar Widgets', focus: 'sidebar-widgets-shop-sidebar', type: 'section', pos: 'top'},
			{target: '.category-page-row', text: 'Category Layout', focus: 'category-page', type: 'section', pos: 'top'},
			{target: '.woocommerce-breadcrumbs', text: 'Shop Breadcrumbs', focus: 'category-page', type: 'section'},
			{target: '.shop-page-title .breadcrumbs', text: 'Shop Breadcrumbs', focus: 'breadcrumb_size'},
			{target: '.related-products-wrapper', text: 'Related Products', focus: 'max_related_products', pos: 'top'},
			{target: '.cart-container', text: 'Cart Layout', focus: 'cart-checkout', type: 'section', pos: 'top'},
			{target: '.checkout-container', text: 'Checkout Layout', focus: 'cart-checkout', type: 'section', pos: 'top'},
			{target: '.absolute-footer', text: 'Absoulte Footer', focus: 'footer_left_text'},
			{target: '.footer-1', text: 'Footer 1 Options', focus: 'footer', type: 'section',  pos: 'top'},
			{target: '.footer-2', text: 'Footer 2 Options', focus: 'footer', type: 'section',  pos: 'top'},
			{target: '.footer-1 .col', text: 'Footer 1 Widgets', focus: 'sidebar-widgets-sidebar-footer-1', type: 'section',  pos: 'top'},
			{target: '.footer-2 .col', text: 'Footer 2 Widgets', focus: 'sidebar-widgets-sidebar-footer-2', type: 'section',  pos: 'top'},
			{target: '.portfolio-page-wrapper', text: 'Portfolio Layout', focus: 'fl-portfolio', type: 'section',  pos: 'top'},
			{target: '.featured-posts', text: 'Featured Blog Posts', focus: 'blog_featured', pos: 'top'},
			{target: '.blog-wrapper.blog-archive', text: 'Blog Layout', focus: 'blog_layout',  pos: 'top'},
			{target: '.blog-wrapper.blog-single', text: 'Blog Single Post layout', focus: 'blog_post_layout',  pos: 'top'},
			{target: '.payment-icons', text: 'Payment Icons', focus: 'payment-icons', type: 'section', pos: 'top'},
			{target: 'li.cart-item', text: 'Header Cart', focus: 'header_cart', type: 'section', pos: 'top'},
			{target: 'li.account-item', text: 'Header Account', focus: 'header_account', type: 'section', pos: 'top'},
			{target: 'li.header-newsletter-item', text: 'Header Newsletter', focus: 'header_newsletter', type: 'section', pos: 'top'},
			{target: 'li.header-social-icons', text: 'Header Social', focus: 'follow', type: 'section', pos: 'top'},
			{target: 'li.header-search', text: 'Header Search', focus: 'header_search', type: 'section', pos: 'top'},
			{target: 'li.html.custom', text: 'Custom Content', focus: 'header_content', type: 'section', pos: 'top'},
			{target: '#secondary', text: 'Sidebar Widgets', focus: 'sidebar-widgets-sidebar-main', type: 'section',  pos: 'top'}
		];

		function createHelperTooltips(target){

				customize_helpers.forEach(function(entry) {

				if(!entry.pos) entry.pos = 'bottom';
				if(!entry.type) entry.type = 'control';

				if($(entry.target).hasClass('tooltipstered')) return;

				jQuery(entry.target, target).tooltipster({
					content: '<button class="customizer-focus" data-focus="'+entry.focus+'">'+entry.text+'</button>', 
					interactive: true,
					arrow: false,
					offsetY: -22,
					theme : 'tooltip-customizer',
					position: entry.pos,
					hideOnClick: true,
					functionReady: function(){
							$(this).addClass('customizer-active');
							$('.customizer-focus').click(function(){
								if(entry.type == 'control') window.parent.wp.customize.control($(this).data('focus')).focus();
								if(entry.type == 'section') window.parent.wp.customize.section($(this).data('focus')).focus();
								if(entry.type == 'panel') window.parent.wp.customize.panel($(this).data('focus')).focus();
							});
						},
						functionAfter: function(){
								$(this).removeClass('customizer-active');
						},
						speed: 10,
						delay: 10,
						contentAsHTML: true
				});
			});
		}
		createHelperTooltips(jQuery('body'));
	});
} )( jQuery );