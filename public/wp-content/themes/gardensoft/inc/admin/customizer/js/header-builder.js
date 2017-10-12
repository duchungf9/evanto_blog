jQuery(function ($) {

    // fix Clear button on color boxes
    $('.wp-picker-clear').click(function(){
      var reset = jQuery(this).parent().find('[data-customize-setting-link]').data('customizeSettingLink');
      wp.customize.instance(reset).set('');
    });

    // Hide builder on customizing Overlay elements
    $('#customize-control-mobile_sidebar input').focus(function(){
        $('.header-builder').addClass('header-builder-disabled');
        jQuery('[data-open="#main-menu"]').click();
    });

    $('#customize-control-mobile_sidebar input').blur(function(){
        $('.header-builder').removeClass('header-builder-disabled');
    });

    // Preset click
    $('.preset-click img').on( 'click', function(e) {
     var preset = $(this).data('preset');
     $('#customize-control-preset_demo').find('select option').val(preset).change();
     
       setTimeout(function(){
          headerBuilderRefresh();
          headerBuilderInit();
       }, 300);
       e.preventDefault();
     });

    $('.enable-desktop').click(function(e){
      $('.devices .preview-desktop').click();
      e.preventDefault();
    });

     $('.enable-tablet').click(function(e){
      $('.devices .preview-tablet').click();
      e.preventDefault();
    });

    $('.enable-mobile').click(function(e){
      $('.devices .preview-mobile').click();
      e.preventDefault();
    });

    function headerBuilderRefresh(){
        $('.hb-drop').each(function(){
            $(this).find('span').appendTo('.hb-avaiable-desktop .hb-list');
        });

        $('.hb-drop-mobile').each(function(){
            $(this).find('span').appendTo('.hb-avaiable-mobile .hb-list');
        });
    }

    // Start Header builder
     wp.customize.panel( 'header' ).expanded.bind( function( state )  {
        if(state == true){
            
            $('.header-builder').addClass('active');
        } else{
           $('.header-builder').removeClass('active');
        }
    } );

    function headerBuilderClear(){
          $('.hb-drop').each(function(){
              $(this).find('span').appendTo('.hb-avaiable-desktop .hb-list');
              var id = $(this).data('id');
              headerBuilderUpdate(id);
          });

          $('.hb-drop-mobile').each(function(){
              var id = $(this).data('id');
              $(this).find('span').appendTo('.hb-avaiable-mobile .hb-list');
              headerBuilderUpdateMobile(id);
          });
    }

    $('.header-clear-button').click(headerBuilderClear);
    
    $('.header-close-button').click(function(){
         wp.customize.panel( 'header' ).expanded(false);
    });

    function headerBuilderUpdate(id){
        if(!id) return;

        var options = [];
        $('.hb-drop[data-id="'+id+'"]').find('span').each(function(){
            options.push($(this).data('id'));
        });

        var $select = $('select[data-customize-setting-link="'+id+'"]').selectize();
        var selectize = $select[0].selectize;
        selectize.setValue( options, true );
        wp.customize.instance(id).set(options);
    }

    function headerBuilderUpdateMobile(id){
        if(!id) return;

        wp.customize.control('','')
        var options = [];
        $('.hb-drop-mobile[data-id="'+id+'"]').find('span').each(function(){
            options.push($(this).data('id'));
        });

        var $select = $('select[data-customize-setting-link="'+id+'"]').selectize();
        var selectize = $select[0].selectize;
        selectize.setValue( options, true );
        wp.customize.instance(id).set(options);
    }


    // fix Header drop
    function headerBuilderInit(){
      $('.hb-drop').each(function(){
          var id = $(this).data('id');
            if(id && wp.customize.instance(id)){
              wp.customize.instance(id).get().forEach(function(entry) {
                $('.hb-avaiable-desktop span[data-id="'+entry+'"]').appendTo('.header-builder [data-id="'+id+'"]');
              });
            }
      });

       // fix Header mobile drop
      $('.hb-drop-mobile').each(function(){
          var id = $(this).data('id');
            if(id && wp.customize.instance(id)){
              wp.customize.instance(id).get().forEach(function(entry) {
                $('.hb-avaiable-mobile span[data-id="'+entry+'"]').appendTo('.header-builder [data-id="'+id+'"]');
              });
            }
      });

      $( '.hb-drop' ).sortable({
        connectWith: '.hb-drop',
        update: function( event, ui ) {
          headerBuilderUpdate(jQuery(ui.item).parent().data('id'));
          headerBuilderUpdate(jQuery(ui.sender).data('id'));
        }
      }).disableSelection();

      $( '.hb-drop-mobile' ).sortable({
        connectWith: '.hb-drop-mobile',
        update: function( event, ui ) {
          headerBuilderUpdateMobile(jQuery(ui.item).parent().data('id'));
          headerBuilderUpdateMobile(jQuery(ui.sender).data('id'));
        }
      }).disableSelection();

      // Fix Logo position
      $('.header-builder .hb-main').removeClass('hb-logo-center');
      if(wp.customize.instance('logo_position').get() == 'center'){
        $('.header-builder .hb-main').addClass('hb-logo-center');
      }
    }

    headerBuilderInit();

    $('.header-builder .logo-pos a').click(function(e){
      
      var pos = $(this).data('id');

      wp.customize.instance('logo_position').set(pos);

      $('.header-builder .hb-main').removeClass('hb-logo-center');

      if(pos == 'center'){
        $('.header-builder .hb-main').addClass('hb-logo-center');
      }
      e.preventDefault();
    });

  // Add options
  $('.header-builder span[data-id="search"]').attr('data-section','header_search');
  $('.header-builder span[data-id="search-form"]').attr('data-section','header_search');
  $('.header-builder span[data-id="account"]').attr('data-section','header_account');
  $('.header-builder span[data-id="cart"]').attr('data-section','header_cart');
  $('.header-builder span[data-id*="html"]').attr('data-section','header_content');
  $('.header-builder span[data-id="social"]').attr('data-section','follow');
  $('.header-builder span[data-id="menu-icon"]').attr('data-section','header_mobile');
  $('.header-builder span[data-id="contact"]').attr('data-section','header_contact');
  $('.header-builder span[data-id="wishlist"]').attr('data-section','header_wishlist');
  $('.header-builder span[data-id="button-1"]').attr('data-section','header_buttons');
  $('.header-builder span[data-id="button-2"]').attr('data-section','header_buttons');
  $('.header-builder span[data-id="block-1"]').attr('data-section','header_content');
  $('.header-builder span[data-id="block-2"]').attr('data-section','header_content');
  $('.header-builder span[data-id="newsletter"]').attr('data-section','header_newsletter');

  // Go to section / options
  $('.header-builder [data-section]').click(function(e){
    var section = $(this).data('section');
    if(wp.customize.section(section)){
      wp.customize.section(section).focus();
    }
    e.preventDefault();
  });

  $('.header-builder [data-section] [data-section]').click(function(e){
    e.preventDefault();
    var section = $(this).data('section');
    if(wp.customize.section(section)){
      wp.customize.section(section).focus();
    }
  });

});