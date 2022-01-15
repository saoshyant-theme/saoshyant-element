jQuery(function($) {
 	jQuery(document).ready(function($) {
			"use strict";

		
 		function ssel_block_options(row,index,label,id,type,option,std) {
			
			var opt='';
			
			
			var data='ssel_'+ row +'['+ index +']['+id+']';
			
			if(type == 'metabox'){
			}else if(type == 'meta_end' ){
			}else{
				opt+='<li class="rd_options_item rd_'+id+' rd_options_'+type+'">';
					opt+='<div class="rd_options_name" ><label for="'+data+'" >'+label+'</label></div>';
					if( type== 'tabs'){
						opt+='<a class="rd_add_tab button">'+ssel_text.addtab+'</a>'
					}
					opt+='<div class="rd_options_setting">';
			}
				if( type == 'meta_start'){
					 opt+='<ul class="rd-multicheckbox" >';
				}
				switch(type){
					case 'text':						
						opt+='<input type="text" name="'+data+'"  id="'+data+'" value="">';
					break;
		
			
					case 'color_rgba':						
						opt+='<input type="text"  class="cs-wp-color-picker rd-color"  data-rgba="true" name="'+data+'"  id="'+data+'" value="">';
					break;
					
					
					case 'color':						
						opt+='<input type="text"  class="cs-wp-color-picker rd-color"  data-rgba="false" name="'+data+'"  id="'+data+'" value="">';
					break;
								
					case 'textarea':						
						opt+='<textarea name="'+data+'"  id="'+data+'" ></textarea>';
					break;
					 
					
					case 'number':						
						opt+='<input type="text" name="'+data+'"  id="'+data+'" value="'+option+'" >';
					break;
					case 'checkbox':
					
						if(option==1){
							var checked = "checked='checked'";
						} else {
							var checked = '';
						}
						
						opt+='<div class="rd_checkbox rd_checkbox_primary">';
						opt+='<input type="checkbox" name="'+data+'" id="'+data+'" '+checked+' value="1">';
						opt+='<label for="'+data+'"  >';
						opt+='</div>';
					break; 
					case 'select':			 
						opt+='<select  name="'+data+'"  id="'+data+'" class="select_'+type+'">';
							if(id== 'cats'){
								opt+='<option value="">'+ssel_text.allcats+'</option>';
							};	
		 
							jQuery.each( option, function( key, name ) {
								if(std == key ){
								var selected = 'selected="selected"';
								} else{
								var selected = '';
								}
								opt+='<option id="rd_'+id+'_'+key+'" value="'+key+'"  '+selected +'>'+name+'</option>';
							});					 
						opt+='</select>';	
					break;
					
					case 'multicheck':
						opt+='<div class="rd_dropdown">';				
							opt+='<dt>';				
								opt+='<a href="#">';				
									opt+='<span class="rd_hida"></span>';				
									opt+='<p class="rd_multiSel"></p>';				
								opt+='</a>';				
							opt+='</dt>';				
							opt+='<dd>';
								opt+='<div class="rd_mutliSelect">';				
									opt+='<ul>';
									jQuery.each( option, function( key, name ) {
										opt+='<li><input type="checkbox" name="'+data+'['+key+']"  id="'+data+'['+key+']"  value="1">';
										opt+='<label for="'+data+'['+key+']" rd-id="'+key+'">'+name+'</label></li>';								
									});												
									opt+='</ul>';				
								opt+='</div>';				
							opt+='</dd>';				
						opt+='</div>';				
							
					break;			
					case 'metabox':
						opt+='<li>';
							opt+='<div class="rd_checkbox rd_checkbox_primary">';
								opt+='<input type="checkbox" name="'+data+'"  id="'+data+'"  value="1">';
								opt+='<label for="'+data+'"></label>';	
							opt+='</div>';
							opt+='<label for="'+data+'" >'+label+'</label>';	
							opt+='</li>';
					break;
					case 'upload':	
						opt+='<a class="rd_upload_image  button button-small"  >'+ssel_text.upload+'</a>';
						opt+='<input type="hidden" name="'+data+'" id="'+data+'"  value="">';
		 
					break;
		 
				
		
				}  
				if ( type == 'meta_end'  ){
					opt+='</ul>';
				}
			if ( type == 'metabox'){}
			else if ( type == 'meta_start'  ){}
			else{
					opt+='</div>';
				opt+='</li>';
			} 
				
			return opt;
		}
		// Block Options True
		function ssel_block_opt(row,index,option,id) {
			
			var opt=[];
		
			if(option.title== true){
				opt+= ssel_block_options(row,index,ssel_text.title,'title','text')
			}
			if(option.number== true){
				opt+= ssel_block_options(row,index,ssel_text.number,'number','number','5')
			}
			 
			if(option.post_type== true){
				opt+= ssel_block_options(row,index,ssel_text.post_type,'post_type','select',ssel_post_type)
			}
			if(option.sliders== true){
				opt+= ssel_block_options(row,index,ssel_text.slider,'sliders','select',ssel_sliders)
			}
			
			if(option.multi_cats== true){
				opt+= ssel_block_options(row,index,ssel_text.cats,'multi_cats','multicheck',ssel_cats)
			}
			
			if(option.cats== true){
				opt+= ssel_block_options(row,index,ssel_text.cats,'cats','select',ssel_cats)
			}	
			
			if(option.orderby== true){
				opt+= ssel_block_options(row,index,ssel_text.orderby,'orderby','select',ssel_orderby)
			}  
		
			if(option.tabs== true){
				opt+= ssel_block_options(row,index,ssel_text.tabs,'tabs','tabs')
			} 
			
			if(option.size1== true){
				opt+= ssel_block_options(row,index,ssel_text.size,'size','select',ssel_size1)
			} 
			
			if(option.size2== true){
				opt+= ssel_block_options(row,index,ssel_text.size,'size','select',ssel_size2,'rd-img-medium')
			} 
				
			if(option.height== true){
				opt+= ssel_block_options(row,index,ssel_text.height,'height','select',ssel_height)
			} 	
			
			if(option.height_content== true){
				opt+= ssel_block_options(row,index,ssel_text.height,'height','select',ssel_height_content)
			} 
			
			if(option.ratio1== true){
				opt+= ssel_block_options(row,index,ssel_text.ratio,'ratio','select',ssel_ratio1);
				
			} 
			else if(option.ratio2== true){
				opt+= ssel_block_options(row,index,ssel_text.ratio,'ratio','select',ssel_ratio2);
				
			} 
			else if(option.ratio3== true){
				opt+= ssel_block_options(row,index,ssel_text.ratio,'ratio','select',ssel_ratio3);
				
			}
			else if(option.ratio4== true){
				opt+= ssel_block_options(row,index,ssel_text.ratio,'ratio','select',ssel_ratio4)
				
			} 
			
			if(option.space== true){
				opt+= ssel_block_options(row,index,ssel_text.space,'space','checkbox','')
			}
			
			
			if(option.post_title== true){
				opt+= ssel_block_options(row,index,ssel_text.post_title,'post_title','checkbox','1')
			}
			
			if(option.excerpt== true){
				opt+= ssel_block_options(row,index,ssel_text.excerpt,'excerpt','checkbox','1')
			} 
			
			if(option.title_limit== true){
				opt+= ssel_block_options(row,index,ssel_text.title_limit,'title_limit','number','')
			}
			if(option.excerpt_limit== true){
				opt+= ssel_block_options(row,index,ssel_text.excerpt_limit,'excerpt_limit','number','')
			}
			
			if(option.meta_category== true){
				opt+= ssel_block_options(row,index,ssel_text.meta_category,'meta_category','checkbox','1')
			}
			
			if(option.meta== true){
				opt+= ssel_block_options(row,index,ssel_text.meta,'meta','meta_start');
				opt+= ssel_block_options(row,index,ssel_meta.comments,'meta_comments','metabox');
				opt+= ssel_block_options(row,index,ssel_meta.view,'meta_view','metabox');
				opt+= ssel_block_options(row,index,ssel_meta.date,'meta_date','metabox');
				opt+= ssel_block_options(row,index,ssel_meta.author,'meta_author','metabox');
				opt+= ssel_block_options(row,index,ssel_meta.review,'meta_review','metabox');
				opt+= ssel_block_options(row,index,ssel_meta,'meta','meta_end');
			}	
			
			if(option.text_center== true){
				opt+= ssel_block_options(row,index,ssel_text.text_center,'text_center','checkbox')
			}
			
			if(option.details_middle== true){
				opt+= ssel_block_options(row,index,ssel_text.details_middle,'details_middle','checkbox')
			}
			 
			 
			if(option.load_more== true){
				opt+= ssel_block_options(row,index,ssel_text.load_more,'load_more','checkbox','1')
			} 
			
			if(option.newwindow== true){
				opt+= ssel_block_options(row,index,ssel_text.newwindow,'newwindow','checkbox','1')
			} 	
				
			if(option.nofollow== true){
				opt+= ssel_block_options(row,index,ssel_text.nofollow,'nofollow','checkbox','1')
			} 	
				
			if(option.image== true){
				opt+= ssel_block_options(row,index,ssel_text.image,'image','upload','')
			}
			
			if(option.ads_url== true){
				opt+= ssel_block_options(row,index,ssel_text.ads_url,'ads_url','text','')
			} 
			
			if(option.resize== true){
				opt+= ssel_block_options(row,index,ssel_text.resize,'resize','checkbox','0')
			} 
			
			if(option.textarea== true){
				opt+= ssel_block_options(row,index,ssel_text.textarea,'textarea','textarea','')
			} 
			
			if(option.effect== true){
				opt+= ssel_block_options(row,index,ssel_text.effect,'effect','select',ssel_effect)
			}
			if(option.speed== true){
				opt+= ssel_block_options(row,index,ssel_text.speed,'speed','number','2000')
			}
			if(option.pause== true){
				opt+= ssel_block_options(row,index,ssel_text.pause,'pause','number','10000')
			}
			
			if(option.background_thumb== true){
				opt+= ssel_block_options(row,index,ssel_text.background_thumb,'background_thumb','select',ssel_background_thumb)
			}

			if(option.style_featured== true){
				opt+= ssel_block_options(row,index,ssel_text.style_featured,'style_featured','select',ssel_style_featured)
			}
			if(option.style_featured_2== true){
				opt+= ssel_block_options(row,index,ssel_text.style_featured,'style_featured','select',ssel_style_featured_2)
			}


			if(option.style_grid== true){
				opt+= ssel_block_options(row,index,ssel_text.style_layout,'style_layout','select',ssel_style_grid);
				
			}else if(option.style_list== true){
				opt+= ssel_block_options(row,index,ssel_text.style_layout,'style_layout','select',ssel_style_list);
				
			}else if(option.style_text== true){
				opt+= ssel_block_options(row,index,ssel_text.style_layout,'style_layout','select',ssel_style_text);
				
			}
		
			if(option.sidebar== true){
				opt+= ssel_block_options(row,index,ssel_text.sidebar,'sidebar','select',ssel_sidebar)
			}	
						
			
			if(option.style_title_box== true){
				opt+= ssel_block_options(row,index,ssel_text.style_title,'style_title_box','select',ssel_style_boxid)
			}
			if(option.style_boxid== true){
				opt+= ssel_block_options(row,index,ssel_text.style_boxid,'style_boxid','select',ssel_style_boxid)
			}			
  
			
			return opt;		
						 
		}
		
		$(".rd_model_block").each( function() {
			$(this).find("li:first").addClass('selected');
			$(this).find("li:first input").attr('checked','checked');
		});
		  
		$(document).on("click",".rd_model_item", function() {
			$(this).parent().find('.selected').removeClass('selected');
 			$(this).addClass('selected');
 		});
	 
		
		$(document).on("click",".rd_model_block .rd_model_add", function() {
			$(".cs-wp-color-picker").cs_wpColorPicker();
		 

				 
	
			var selected= $(this).parents('.rd_model').find('.selected');
				 
			var row = selected.data('row');
			var id = selected.data('id');
			var array = selected.data('blocks');
			var data =  selected.parents('.rd_model').attr('rd-data-id');
			var col =  selected.parents('.rd_model').attr('rd-data-col'); 
			var index = Math.floor(Math.random() * 9999999);
				 
	 
			var img_src = $('.rd_block_'+row+'[rd-data-id="'+data+'"] .rd_model_item.selected img').attr('src');
			var block='';
			
			block+= '<section class="rd_block_item">';
				block+= '<input type="hidden" name="ssel_'+ row +'['+ index +'][value]"  value="'+ id +'">';
				block+= '<input type="hidden" name="ssel_'+ row +'['+ index +'][order]"  value="'+data+'">';
				block+= '<input type="hidden" name="ssel_'+ row +'['+ index +'][col]"  value="'+col+'">';
				block+= '<img src="'+img_src+'"/><span class="rd_block_title"></span>';
				block+= '<a class="rd_block_remove" ></a>';
				block+= '<a class="rd_block_options"></a>';
				block+= '<div class="rd_options">';
					block+= '<div class="rd_options_middle">';
						block+= '<div class="rd_options_title">';
							block+= ssel_text.rd_options ;
							block+= '<div class="rd_options_add button-primary">'+ssel_text.done +'</div>';
						block+= '</div>';
						block+= '<ul class="rd_options_content">'+ssel_block_opt(row,index,array,id)+'</ul>';
					block+= '</div>';
				block+= '</div>';
			block+= '</section>';		
						
			 $('.rd_row_item[rd-data-id="'+data+'"] .rd_column_'+row+'[rd-data-col="'+col+'"] .rd_block_list').append(block);
					 
				 
			$(".rd_model").hide();$( ".rd_builder_list,.rd_block_list" ).sortable({ disabled: false });
			 
		 $('.rd_options_content').each( function(index, element) {
			$('.rd_post_type select').on('change', function() {
			   if ( $(this).val() == 'posts' ) {
				 
					jQuery(this).parents('.rd_options_content').find('.rd_cats,.rd_orderby,.rd_date_quray').show();
					jQuery(this).parents('.rd_options_content').find('.rd_sliders').hide();
			   }if ( $(this).val() == 'slides' ) {
					jQuery(this).parents('.rd_options_content').find('.rd_cats,.rd_orderby,.rd_date_quray').hide();
					jQuery(this).parents('.rd_options_content').find('.rd_sliders').show();
			   }
			}); 
			
			$('.rd_style_layout select').on('change', function() {
			   if ( $(this).val() == 'boxid' || $(this).val() == 'post-boxid' || $(this).val() == 'details-boxid' || $(this).val() == 'details-boxid-2') {
 					jQuery(this).parents('.rd_options_content').find('.rd_style_boxid').show();
  			   } else { 
					jQuery(this).parents('.rd_options_content').find('.rd_style_boxid').hide();
 			   }
			}); 
			
			
		}); 
	  
	  
	 });
	 
	 
		 /*
			Dropdown with Multiple checkbox select with jQuery - May 27, 2013
			(c) 2013 @ElmahdiMahmoud
			license: http://www.opensource.org/licenses/mit-license.php
		*/
		
			"use strict";

		$(document).on('click','.rd_dropdown dt a', function() {
		  $(this).parents('.rd_dropdown').find("ul").slideToggle('fast');
		});
		
		$(document).on('click','.dropdown dd ul li a', function() {
		  $(".rd_dropdown dd ul").hide();
		});
		
		function getSelectedValue(id) {
		  return $("#" + id).find("dt a span.value").html();
		}
		
		$(document).bind('click', function(e) {
		  var $clicked = $(e.target);
		  if (!$clicked.parents().hasClass("rd_dropdown")) $(".rd_dropdown dd ul").hide();
		});
		
		$(document).on('click','.rd_mutliSelect input[type="checkbox"]', function() {
		
		  var title = $(this).next().text(),title = $(this).next().text() + ",";
		  var id = $(this).next().attr('rd-id');
			 
		  if ($(this).is(':checked')) {
			var html = '<span rd-id="' + id + '">' + title + '</span>';
			$(this).parents('.rd_dropdown').find('.rd_multiSel').append(html);
			 $(this).parents('.rd_dropdown').find(".rd_hida").hide();
		  } else {
			 $(this).parents('.rd_dropdown').find('span[rd-id="' + id + '"]').remove();
			var ret =  $(this).parents('.rd_dropdown').find(".rd_hida");
			 $(this).parents('.rd_dropdown').find('.rd_dropdown dt a').append(ret);
		
		  }
		}); 
		
		$(document).on( 'click', '.rd_upload_image',function(event) {
			var that= $(this);
			var imageFrame;

			event.preventDefault();
			
			var options, attachment;
			 var rd_options_upload = that.parents('.rd_options_upload');
 			var $self = $(event.target);
			var $div = $self.closest(rd_options_upload);
			
			// if the frame already exists, open it
			if ( imageFrame ) {
				imageFrame.open();
				return;
			}
			
			// set our settings
			imageFrame = wp.media({
				title: ssel_text.choose,
				multiple: false,
				library: {
					type: 'image'
				},
				button: {
					text:ssel_text.uploader_button
				}
			});
			
			// set up our select handler
			imageFrame.on( 'select', function() {
				var	selection = imageFrame.state().get('selection');
				
				if ( ! selection )
				return;
				
				// loop through the selected files
				selection.each( function( attachment ) {
					console.log(attachment);
					var src = attachment.attributes.sizes.full.url;
					
					var data = '<span class="rd_remove_image  button button-small">'+ssel_text.remove+'</span><img  src="'+src+'"/>';
					that.parent().find('.rd_remove_image').remove();
					that.parent().find('img').remove();
					that.parent().find('input').attr('value',src);	
					that.parent().append(data);
				} );
			});
			
			// open the frame
			imageFrame.open();
		});
	 
		// ADD Row
		$('.rd_builder').on('click', '.rd_add_row', function(e) {
			$('.rd_model_row').css("display","table");
			$(".cs-wp-color-picker").cs_wpColorPicker();
			$( ".rd_builder_list,.rd_block_list" ).sortable({ disabled: true });
		});
		function ssel_row_options(row,index,value) {
			$(".cs-wp-color-picker").wpColorPicker();
	
			var opt='';
			if(value=='800_400'||value=='400_800'){
				opt+= ssel_block_options(row,index,ssel_text.sticky,'sticky_sidebar','checkbox','1');
			}
			
			opt+= ssel_block_options(row,index,ssel_text.background_image,'background_image','upload');
			opt+= ssel_block_options(row,index,ssel_text.background_color,'background_color','color_rgba');
	
  			opt+= ssel_block_options(row,index,ssel_text.link_color,'link_color','color');
	
			opt+= ssel_block_options(row,index,ssel_text.text_color,'text_color','color');
	
			opt+= ssel_block_options(row,index,ssel_text.meta_color,'meta_color','color');
	
			opt+= ssel_block_options(row,index,ssel_text.padding_top,'padding_top','checkbox');
	
			opt+= ssel_block_options(row,index,ssel_text.padding_bottom,'padding_bottom','checkbox');
 	
 		
			return opt;		
				
		}
		function ssel_row_title(index,value) {
	 
			var title='';
			title+= '<input type="hidden" name="ssel_row[' + index + '][value]" value="'+ value + '">';
			title+= '<div class="rd_row_title">';
				title+= '<a class="rd_row_remove"></a>';
				title+= '<a class="rd_row_options"></a>';
				title+= '<div class="rd_options">';
					title+= '<div class="rd_options_middle">';
						title+= '<div class="rd_options_title">';
							title+= ssel_text.rd_options ;
							title+= '<div class="rd_options_add button-primary">'+ssel_text.done +'</div>';
						title+= '</div>';
						title+= '<ul class="rd_options_content">'+ssel_row_options('row',index,value)+'</ul>';
					title+= '</div>';	 
				title+= '</div>';
			title+= '</div>';
			  
			return title;
		  } 
		  
		 
		  function ssel_sidebar_panel(index,col) {
			return '<a class="rd_sidebar_options"></a><div class="rd_options"><div class="rd_options_middle"><div class="rd_options_title">'+ssel_text.rd_options+'</div><ul class="rd_options_content">'+ssel_block_options('row',index,ssel_text.sidebar,'sidebar-'+col,'select',ssel_sidebar)+ ssel_block_options('row',index,ssel_text.sticky,'sticky-sidebar-'+col,'checkbox','0')+'</ul><div class="rd_options_bottom"><div class="rd_options_add button-primary">'+ ssel_text.done +'</div></div></div></div>';
		  } 
		  
		  // Row 
		$('.rd_model_row').on('click', '.rd_model_add', function(e) {
			
			var index =  Math.floor(Math.random() * 9999999);
			
	 
			if(document.getElementById('rd_model_1920').checked){
				$('.rd_builder_list').append('<li rd-data-id="'+ index +'" class="rd_row_item rd_row_1920"  >' + ssel_row_title(index,'1920') +'<div class="rd_row_container"><div class="rd_column rd_column_wide"  rd-data-col="1"><ul class="rd_block_list"></ul><a id="'+index+'" class="rd_add_block" ></a></div></div></li>');
		  			$(".cs-wp-color-picker").cs_wpColorPicker();

			};
			
			
			if(document.getElementById('rd_model_1200').checked){
				$('.rd_builder_list').append('<li rd-data-id="'+ index +'" class="rd_row_item rd_row_1200"  >' + ssel_row_title(index,'1200') +'<div class="rd_row_container"><div class="rd_column rd_column_content"  rd-data-col="1"><ul class="rd_block_list"></ul><a id="'+index+'" class="rd_add_block" ></a></div></div></li>');
		  			$(".cs-wp-color-picker").cs_wpColorPicker();

			};
			
		 
			
			if(document.getElementById('rd_model_800_400').checked){
				$('.rd_builder_list').append('<li rd-data-id="'+ index +'" class="rd_row_item rd_row_800_400" >' + ssel_row_title(index,'800_400') +'<div class="rd_row_container"><div class="rd_column rd_column_main"  rd-data-col="1" ><ul class="rd_block_list"></ul><a id="'+index+'" class="rd_add_block" ></a></div><div class="rd_column rd_column_mini"  rd-data-col="2" ><ul class="rd_block_list"></ul><a id="'+index+'" class="rd_add_block" ></a></div></div></li>');
		  			$(".cs-wp-color-picker").cs_wpColorPicker();

			};		
	  
			
			if(document.getElementById('rd_model_400_800').checked){
				$('.rd_builder_list').append('<li rd-data-id="'+ index +'" class="rd_row_item rd_row_400_800" >' + ssel_row_title(index,'400_800') +'<div class="rd_row_container"><div class="rd_column rd_column_mini" rd-data-col="1" ><ul class="rd_block_list"></ul><a id="'+index+'" class="rd_add_block" ></a></div><div class="rd_column rd_column_main"  rd-data-col="2" ><ul class="rd_block_list"></ul><a id="'+index+'" class="rd_add_block" ></a></div></div></li>');
		  			$(".cs-wp-color-picker").cs_wpColorPicker();

			};
			
			if(document.getElementById('rd_model_3c_400').checked){
				$('.rd_builder_list').append('<li rd-data-id="'+ index +'" class="rd_row_item rd_row_3c_400" >' + ssel_row_title(index,'3c_400') +'<div class="rd_row_container"><div class="rd_column rd_column_mini"  rd-data-col="1"><ul class="rd_block_list"></ul><a id="'+index+'" class="rd_add_block" ></a></div><div class="rd_column rd_column_mini" rd-data-col="2"><ul class="rd_block_list"></ul><a id="'+index+'" class="rd_add_block" ></a></div><div class="rd_column rd_column_mini" rd-data-col="3"><ul class="rd_block_list"></ul><a id="'+index+'" class="rd_add_block" ></a></div></div></li>');
		  			$(".cs-wp-color-picker").cs_wpColorPicker();

			}; 	
									
			$('.rd_model').hide();
			$( ".rd_builder_list,.rd_block_list" ).sortable({ disabled: false });
		});
			 
	
			
		$(document).on('change', '.rd_title  input', function(e) {
			var text = $(this).val();
			$(this).parents('.rd_block_item').find('.rd_block_title').html(text);
			
		});
	 
					$('.rd_title  input').each( function(e) {
			var text = $(this).val();
			$(this).parents('.rd_block_item').find('.rd_block_title').html(text);
			
		});
		 
				$(".rd-color").wpColorPicker();
	
		// ADD Block
		$(document).on('click', '.rd_column_wide .rd_add_block', function(e) {
			var data = $(this).parents('.rd_row_item').attr('rd-data-id');
			var col = $(this).parents('.rd_column').attr('rd-data-col');
			$('.rd_block_wide').css("display","table").attr('rd-data-id',data).attr('rd-data-col',col);
			$( ".rd_builder_list,.rd_block_list" ).sortable({ disabled: true });
  
			
			 
			});
		$(document).on('click', '.rd_column_content .rd_add_block', function(e) {
			var data = $(this).parents('.rd_row_item').attr('rd-data-id');
			var col = $(this).parents('.rd_column').attr('rd-data-col');
			$('.rd_block_content').css("display","table").attr('rd-data-id',data).attr('rd-data-col',col);
			$( ".rd_builder_list,.rd_block_list" ).sortable({ disabled: true });
		});
		
		$(document).on('click', '.rd_column_main .rd_add_block', function(e) {
			var data = $(this).parents('.rd_row_item').attr('rd-data-id');
			var col = $(this).parents('.rd_column').attr('rd-data-col');
			$('.rd_block_main').css("display","table").attr('rd-data-id',data).attr('rd-data-col',col);
			$( ".rd_builder_list,.rd_block_list" ).sortable({ disabled: true });
		}); 
		$(document).on('click', '.rd_column_mini .rd_add_block', function(e) {
			var data = $(this).parents('.rd_row_item').attr('rd-data-id');
			var col = $(this).parents('.rd_column').attr('rd-data-col');
			$('.rd_block_mini').css("display","table").attr('rd-data-id',data).attr('rd-data-col',col);
			$( ".rd_builder_list,.rd_block_list" ).sortable({ disabled: true });
		});
			
			
			
			
			  
	 
		 $('.rd_options_content').each( function(index, element) {
			var post_type = $(this).find('.rd_post_type select').val();
			 if( post_type == 'posts') {
				jQuery(this).find('.rd_cats,.rd_orderby,.rd_date_quray').show();
				jQuery(this).find('.rd_sliders').hide();
				
			} else if(post_type == 'slides'){
				jQuery(this).find('.rd_cats,.rd_orderby,.rd_date_quray').hide();
				jQuery(this).find('.rd_sliders').show();
				
			}	
			var style_grid = $(this).find('.rd_style_layout select').val();
 			 if( style_grid == 'boxid' || style_grid == 'post-boxid' || style_grid == 'details-boxid' || style_grid == 'details-boxid-2') {

					jQuery(this).find('.rd_style_boxid').show();
 			   }
			   if ( style_grid =='none' ) { 
					jQuery(this).find('.rd_style_boxid').hide();
			   }
  		 
			
			
			 
		 }); 
		 
		jQuery(document).on("click" ,' #rd_post_type_posts'   ,function(){
			jQuery(this).parents('.rd_options_content').addClass('rd_post_type_posts');
 		});
		jQuery(document).on("click" , '#rd_post_type_slides' ,function(){
			jQuery(this).parents('.rd_options_content').addClass('rd_post_type_slides');

		});  
		 
		 $('.rd_options_content').each( function(index, element) {
			$('.rd_post_type select').on('change', function() {
		   if ( $(this).val() == 'posts' ) {
			 
				jQuery(this).parents('.rd_options_content').find('.rd_cats,.rd_orderby,.rd_date_quray').show();
				jQuery(this).parents('.rd_options_content').find('.rd_sliders').hide();
		   }if ( $(this).val() == 'slides' ) {
				jQuery(this).parents('.rd_options_content').find('.rd_cats,.rd_orderby,.rd_date_quray').hide();
				jQuery(this).parents('.rd_options_content').find('.rd_sliders').show();
		   }
			}); 
			
			$('.rd_style_layout select').on('change', function() {
			   if ( $(this).val() == 'boxid' || $(this).val() == 'post-boxid' || $(this).val() == 'details-boxid' || $(this).val() == 'details-boxid-2' ) {
				 
					jQuery(this).parents('.rd_options_content').find('.rd_style_boxid').show();
 			   } else { 
					jQuery(this).parents('.rd_options_content').find('.rd_style_boxid').hide();
			   }
			}); 
			
			
		}); 
			
		$(document).on('click', '.rd_model_close', function(e) {
			$( ".rd_builder_list,.rd_block_list" ).sortable({ disabled: false });
			$('.rd_model').hide();
		});
			
					
		$(document).on('click', '.rd_options_add', function(e) {
			$('.rd_options').each(function() {
				$( ".rd_builder_list,.rd_block_list" ).sortable({ disabled: false });
				$(this).hide();
			});
			
		}); 
			
		$(document).on('click', '.rd_block_options', function(e) {
			$( ".rd_builder_list,.rd_block_list" ).sortable({ disabled: true });
			$(this).next().css("display","table");
		});
		
		$(document).on('click', '.rd_sidebar_options', function(e) {
			$( ".rd_builder_list,.rd_block_list" ).sortable({ disabled: true });
			$(this).next().css("display","table");
		});
		 
		$(document).on('click', '.rd_row_options', function(e) {
			$( ".rd_builder_list,.rd_block_list" ).sortable({ disabled: true });
			$(this).next().css("display","table");
		});
		 
		 
		  //add tabs
		$(document).on('click', '.rd_add_tab', function(e) {
			
			var id = $(this).prev().find('label').attr('for');
			var index =  Math.floor(Math.random() * 9999999);
			var data='';
				data='<div class="rd_tab_option"><input type="text" placeholder="'+ssel_text.title+'" name="'+id+'['+index+'][title]" id="'+id+'['+index+'][title]" value=""></div>';
			
				data+='<div class="rd_tab_option"><select  name="'+id+'['+index+'][cats]"  id="'+id+'['+index+'][cats]">';
				data+='<option value="">'+ssel_text.allcats+'</option>';
		
				jQuery.each( ssel_cats, function( key, name ) {
					data+='<option  value="'+key+'">'+name+'</option>';
				});	
				data+='</select></div>';
				
				data+='<div class="rd_tab_option"><select  name="'+id+'['+index+'][orderby]"  id="'+id+'['+index+'][orderby]">';
		 
				jQuery.each( ssel_orderby, function( key, name ) {
					data+='<option  value="'+key+'">'+name+'</option>';
				});	
				data+='</select></div>';		
				data+='<a class="rd_remove_tab"></a>';		
	 
			$(this).parents('.rd_options_tabs').find('.rd_options_setting').append('<div class="rd_tab_item">'+data+'</div>');
		   
			 
		});
		
		// Row Remove
		$(document).on('click', '.rd_remove_tab', function(e) {
			 $(this).parents('.rd_tab_item').remove();
			 
		});
		
		 
		// Row Remove
		$(document).on('click', '.rd_row_remove', function(e) {
			e.preventDefault();
			$(this).parents('li').animate({ opacity: 0 }, 200, function() {
				$(this).remove();
			});
		});
	  
		$(document).on('click', '.rd_block_item a.rd_block_remove', function(e) {
			e.preventDefault();
			$(this).parents('.rd_block_item').animate({ opacity: 0 }, 200, function() {
				$(this).remove();
			});
		});
	
		$('.rd_builder_list').sortable({
		  opacity: 0.6,
		  stop: function() {}
		});
		
	   $('.rd_block_list').sortable({
		  opacity: 0.6,
		  stop: function() {}
		});
		
	   $('.rd_options_tabs .rd_options_setting ').sortable({
		  opacity: 0.6,
		  stop: function() {}
		}); 	
		jQuery("#ssel_builder_metabox,#ssel_page_options_box").hide();
	
		if( $('#page_template [value="template-builder.php"]').is( ":selected" )) {
			jQuery("#wp-content-editor-tools,#postdivrich,#wp-content-editor-container").hide();
			jQuery("#ssel_builder_metabox,#ssel_page_options_box").show();
	 
		} else{
			jQuery("#wp-content-editor-tools,#postdivrich,#wp-content-editor-container").show();
			jQuery("#ssel_builder_metabox").hide();
		}
		
		
		var $ssel_template = $('#page_template');
	 
		$ssel_template.change(function(){
			if ($ssel_template.val() === 'template-builder.php') {
				jQuery("#wp-content-editor-tools,#postdivrich,#wp-content-editor-container").hide();
				jQuery("#ssel_builder_metabox,#ssel_page_options_box").show();
			 }
			else {
				jQuery("#wp-content-editor-tools,#postdivrich,#wp-content-editor-container").show();
				jQuery("#ssel_builder_metabox,#ssel_page_options_box").hide();
			 }
		});
		 
		$(".rd_model_item img").click(function(){
			$(this).prev().attr('checked',true);
		})   
	});
});
 