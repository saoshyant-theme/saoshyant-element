jQuery(function($) {
	jQuery(document).ready(function($) {
		"use strict";
 
	 
		
		
		
		
		/*
		jQuery(document).on("click",".rd_add_icon",function(){
			jQuery('body').addClass('rd-active-icon');
		var title='';
 		var menu_settings = $(this).parents('.menu-item-settings').attr('id');
		var text= $(this).text();
		var set= $(this).data('set');
				title+= '<div class="rd_icon" data-id="'+menu_settings+'">';
						title+= '<div class="rd_icon_middle">';
							title+= '<div class="rd_icon_title">'+text+'<i class="rd_icon_close"></i></div>';
							title+= '<ul class="rd_icon_content">';
							 jQuery.each( icons, function( key, name ) {
								title+= '<li class="rd_icon_item" data-icon="'+name+'">';
									title+='<i class="fa '+name+'"></i>';
									title+='<span>'+name+'</span>';
																
								title+= '</li>';	
								});						
							title+= '</ul>';
							title+= '<div class="rd_icon_bottom"><a class="rd_icon_add button-primary">'+set+'</a></div>';	 
						title+= '</div>';
				title+= '</div>';
			  
			jQuery('body').append(title);
  		});
		
		jQuery(document).on("click",".rd_remove_icon",function(){
			jQuery('body').removeClass('rd-active-icon');
			
				$(this).parent().find('.rd-menu-icon ').remove();
				$(this).removeClass('rd-remove-show');
				$(this).addClass('rd-remove-hide');
				$(this).parent().find('input').attr('value','')
				$(this).remove();
 		});
			
		jQuery(document).on("click",".rd_icon ul li",function(){
					$(this).parents('.rd_icon').find('.rd_icon_item').removeClass('selected');
	
			$(this).addClass('selected');
		});
		
		jQuery(document).on("click",".rd_icon_add",function(){
			var icon = $(this).parents('.rd_icon').find('.selected').data('icon');
			var menu_settings = $(this).parents('.rd_icon').data('id');

			$("#"+menu_settings).find('.rd_add_icon').data('remove');
				var menu_icons = '<i class="fa rd-menu-icon '+icon+'"></i>';	 
 				$("#"+menu_settings).find('.ssel_menu_icon .rd-menu-icon ').remove();
 				$("#"+menu_settings).find('.ssel_menu_icon .rd_remove_icon ').addClass('rd-remove-show');
				$("#"+menu_settings).find('.ssel_menu_icon input').attr('value',icon)
				$("#"+menu_settings).find('.ssel_menu_icon').append(menu_icons);
 				
				$(this).parents('.rd_icon').remove();
				jQuery('body').removeClass('rd-active-icon');
	
	
		}); 
			
		jQuery(document).on("click",".rd_icon_close",function(){
	  
			jQuery('body').removeClass('rd-active-icon');
				$(this).parents('.rd_icon').remove();
	
		}); */
				
		jQuery('.ssel_category').hide();
		
		jQuery(".menu-item-settings").each(  function(index, element) {
			var menu_type = $(this).find(' .ssel_menu_type select').val();
			 if( menu_type == 'recent'||menu_type == 'random'||menu_type == 'sub-random'||menu_type == 'sub-recent') {
			jQuery(this).find('.ssel_category,.ssel_ratio').show();
	
				
			} else  {
				jQuery(this).find('.ssel_category,.ssel_ratio').hide();
	
				
			}	
			
		});
		
		jQuery(document).on("click" ,'.ssel_menu_type  option[value="recent"],.ssel_menu_type  option[value="random"],.ssel_menu_type  option[value="sub-recent"],.ssel_menu_type  option[value="sub-random"]' ,function(){
			jQuery(this).parents('.menu-item-settings').find('.ssel_category,.ssel_ratio').show();
		}); 
		jQuery(document).on("click" ,'.ssel_menu_type  option[value=""],.ssel_menu_type  option[value="col-2"],.ssel_menu_type  option[value="col-3"],.ssel_menu_type  option[value="col-4"],.ssel_menu_type  option[value="col-5"],.ssel_menu_type  option[value="col-6"]' ,function(){
			jQuery(this).parents('.menu-item-settings').find('.ssel_category,.ssel_ratio').hide();
		}); 
		
		

				 
	// the upload image button, saves the id and outputs a preview of the image
	$(document).on( 'click', '.ssel_menu_add_image',function(event) {
		var imageFrame;
 		var that = $(this);
 		var remove = $(this).attr('data-remove-text');
		event.preventDefault();
		var this_class= $(this).parents('.ssel_menu_upload');
		var options, attachment;
 		var $self = $(event.target);
 		
		// if the frame already exists, open it
		if ( imageFrame ) {
			imageFrame.open();
			return;
		}
		
		imageFrame = wp.media({
  			title: $(this).data('uploader-title'),
			button: {
				text: $(this).data('uploader-button-text'),
			},
			multiple: false
		});
		
		// set up our select handler
		imageFrame.on( 'select', function() {
			var selection = imageFrame.state().get('selection');
			
			if ( ! selection )
			return;
			
			// loop through the selected files
			selection.each( function( attachment ) {
				console.log(attachment);
				var src = attachment.attributes.sizes.full.url;
				var id = attachment.attributes.id;
				var data = '<a class="ssel_remove_image button button-small">'+remove+'</a><img  src="'+src+'"/>';
				this_class.find('.ssel_remove_image').remove();
				this_class.find('img').remove();
 				this_class.find('input').attr('value',id);	
 				this_class.append(data);
  			} );
		});
		
		// open the frame
		imageFrame.open();
	});
	
	$(document).on('click', '.ssel_remove_image ', function(e) {
		$(this).parent().find('input').attr('value','');
		
		$(this).parent().find('img').remove()
		$(this).remove();
  	}); 	

   	$(document).on("click",".ssel_menu_sub_column_ui img",function(){
			$(this).parents('.ssel_menu_sub_column_ui').find('.selected').removeClass('selected');
			$(this).parents('.ssel_menu_sub_column_ui').find('input:checked').removeAttr('checked');
			$(this).parent().addClass('selected');
 			$(this).prev().attr('checked','checked');
  	});	
		 
	});
});