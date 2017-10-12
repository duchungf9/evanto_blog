 jQuery( document ).ready(function($) {

 	$('[data-to-panel]').click(function(e){
		wp.customize.panel($(this).data('toPanel')).focus();
		e.preventDefault();
	});

	$('[data-to-section]').click(function(e){
		wp.customize.section($(this).data('toSection')).focus();
		e.preventDefault();
	});

	/*
	Array.prototype.contains = function(obj) {
	    var i = this.length;
	    while (i--) {
	        if (this[i] === obj) {
	            return true;
	        }
	    }
	    return false;
	}

    var ignore = ['footer_left_text','search_result','header_button_1_link','header_button_2_link','social_icons','footer_right_text','select_preset','follow_facebook','follow_youtube', 'follow_twitter', 'follow_instagram', 'follow_google','follow_vk','site_logo','contact_phone','topbar_left','topbar_right','contact_email','deparments_menu_label','contact_location','contact_hours','countact_hours_details','site_logo_dark','site_logo_sticky','blogname','blogdesciption'];
    var force = [];
    var force_section = ['top_bar','bottom_bar','header-layout','main_bar'];
    var make = '';

    wp.customize.control.each( function ( control ) {
		// set value to default
		var section = String(control.params.section);
		var df = String(control.params.default);
		var value = String(control.params.value);
		var id = String(control.params.id);

		if((control.params.type == 'kirki-custom')) return;

		if(id !== 'undefined' && force_section.contains(section) || force.contains(id) || ($.inArray(id, ignore) == -1 && df && value !== df)){
			if( typeof control.params.value === 'string' ) {
			  make = make+'"'+id+'" => "'+value+'",';
			} else {
			  value = value.replace(/,/g, '","');
			  make = make+'"'+id+'" => array("'+value+'"),';
			}
		}

		// Force defaults
		
 	});
	make = make.replace(/array\(\"\"\)/g, 'array()');
 	console.log('array('+make+');');
 	*/

    var make = '';

    wp.customize.control.each( function ( control ) {
		// set value to default
		var section = String(control.params.section);
		var df = String(control.params.default);
		var value = String(control.params.value);
		var id = String(control.params.id);

		//if((control.params.type == 'kirki-custom')) return;

		if(value && value !== df){
			if( typeof control.params.value === 'string' ) {
			  make = make+'"'+id+'" => "'+value+'",';
			} else {
			  value = value.replace(/,/g, '","');
			  make = make+'"'+id+'" => array("'+value+'"),';
			}
		}

		// Force defaults
		
 	});
	make = make.replace(/array\(\"\"\)/g, 'array()');
 	console.log('array('+make+');');
}); 