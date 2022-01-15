jQuery(function($) {
 	jQuery(document).ready(function($) {
		"use strict";
  	function remove_add_error_loading(){
			var output ='';
 			output ='<div class="ssel-errored">';
			output+= "خطا";
  			output+= '</div>';
		 $('.ssel-mouse-wait').append(output);
		  setTimeout(function(){ $('.ssel-mouse-wait').remove() }, 2500);
 	}
	
	$(document).ajaxError(function( event, jqxhr, settings, thrownError ) {
		remove_add_error_loading();
	  });
	  	jQuery(document).on("click" ,'.ssel_title_tabs a' ,function(){
		$(this).parent().find('.ssel_layout_active').removeClass('ssel_layout_active');
		$(this).addClass('ssel_layout_active');
		var value = $(this).attr('data-id');
		$(this).parents('.ssel_icon,.ssel_options_middle,.ssel_model_middle').find('.ssel_layout_group_active').removeClass('ssel_layout_group_active');
		$(this).parents('.ssel_icon,.ssel_options_middle,.ssel_model_middle').find('[data-tab="'+value+'"]').addClass('ssel_layout_group_active');
 			
	});
		 
	   
	  	$(document).on("click",'.ssel_title_tabs a',function() {
			var id =$(this).attr('data-id'); 
  					$('.ssel_options_warp[data-tab="'+id+'"]').find('.ssel_options_fold').each(function() {
					var show;
					$(this).find('.ssel_options_fold_item').each(function() {
					var data_name = $(this).attr('data-name'); 			
					var data_value = $(this).attr('data-value');
					var type = $('.ssel_options  [name="'+data_name+'"]').attr('type');
						if(type == 'radio'){
						var checked = $('.ssel_options [name="'+data_name+'"][value="'+data_value+'"]').attr('checked');
							if( checked == 'checked' ){
									show = 'checked';
							}
						}else{
							var val =$('.ssel_options [name="'+data_name+'"]').val();
							if(data_value == val){
								show = 'checked';
							}
							
						}
											
					});
						if( show == 'checked' ){
							$(this).parent().attr('data-active','show');
						}else{
							$(this).parent().attr('data-active','hide');
						}
				 });	
	 
	 
			$('.ssel_options_warp[data-tab="'+id+'"]').find('.ssel_options_fold_item').each(function() {
				var data_name = $(this).attr('data-name');
				var actives  = $('[name="'+data_name+'"]').parents(items).attr('data-active');
				if(	 actives == 'hide' ){
					$(this).parent().parent().attr('data-active','hide');
				}
 			}); 
		});
		
		
		
		 
  	
	 
	/****************************************************
	Icons
	*****************************************************/	
	jQuery(document).on("click",".ssel_icon_close",function(){
 		jQuery('body').removeClass('ssel-active-icon');
		$(this).parents('.ssel_icon').remove();
	
	}); 		 
	jQuery(document).on("click",".ssel_builder_choose_icon",function(){
	 
		jQuery('body').addClass('ssel-active-icon');
		
		$('body').append('<div class="ssel-mouse-wait"></div>');
  		var get = $(this).parent().attr('id-icon');
 		var data_this = $(this);
		$.ajax({
			type: 'POST',

 			url: icon_js.ajaxurl,
			data : {
				action : 'ssel_icon_picker',
				id : get,
			},
			success:function(data) {
 				if( data.length){
					
					jQuery('body').append(data); 
					$('.ssel-mouse-wait').remove(); 
				}else{
					 remove_add_error_loading();
				}
   			} 
		});  			  
   	});
	 	 
	jQuery(document).on("click",".ssel_icon ul li",function(){
		$(this).parents('.ssel_icon').find('.ssel_icon_item').removeClass('selected');
		$(this).addClass('selected');
	});
		 
	// Set Icon	 
	jQuery(document).on("click",".ssel_set_icon",function(){
			
		var icon = $(this).parents('.ssel_icon').find('.selected').data('icon');
		var id =   $(this).parents('.ssel_icon').data('id');
		var set = $('.ssel_menu_icon[id-icon="'+id+'"]');
		$(set).find('.ssel-menu-icon ').remove();
		$(set).find('input').attr('value',icon);
		$(set).append('<i class="fa ssel-menu-icon '+icon+'"><a  class="ssel_builder_remove_icon" ></a></i>');
 		$(this).parents('.ssel_icon').remove();
		jQuery('body').removeClass('ssel-active-icon');
 	}); 
		
	jQuery(document).on("click",".ssel_builder_remove_icon",function(){
		$(this).parents('.ssel_menu_icon').find('input').val('');
		$(this).parent().remove();
	}); 
	jQuery(document).on("keyup",".search-icon-control",function(){
		var val = $(this).val();
		if(val !== ''){
			 $(this).parents('.ssel_icon').attr('ssel-has-search','active');
 		}else{
			 $(this).parents('.ssel_icon').attr('ssel-has-search','deactive');
		}
	  $('.ssel_icon_item').each(function(){
			 $(this).addClass('ssel-search-item');
			if($(this).find('span').text().toLowerCase().indexOf(""+val+"") != -1 ){
			 $(this).addClass('ssel-search-show');
			}else{
			 $(this).removeClass('ssel-search-show');
			}
 	 });
	  $('.ssel_icon_head').each(function(){
			 $(this).addClass('ssel-search-item');
 	 });
  
  
 	});
	
	
	});
});
 