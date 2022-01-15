<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Admin Custom Css
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function ssel_admin_custom_css() {
	global $smof_data;
	$css='';
 	$font_family = ssel_option('body_font_family','sao-iransans'); 
	//**Body Start
	$css.='.sao-slider-perveiw-warp,.sao_element_perview,
	.rtl #of_container *,
	.rtl #of_container input,
	.rtl #of_container select,
	.rtl #of_container textarea,
	.sao_builder_options_element,
	.rtl h1, .rtl h2, .rtl h3, .rtl h4, .rtl h5, .rtl h6,
	body .sao_model ,
	body .sao_model *{';

				$css.='font-family:'.esc_html($font_family ).',"roboto",IRANSans !important;';
 		
	$css.='}';
	 
 	 
 

/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Genera Style Color
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
   	$primary_bacgkround =  ssel_option_2('primary_color','background'); 
	$primary_text =  ssel_option_2('primary_color','text');	
  
	$hover_primary_bacgkround =  ssel_option_2('hover_primary_color','background'); 
	$hover_primary_text =  ssel_option_2('hover_primary_color','text');	
   
 	
	$css.='
		.sao_element_perview .button,
		.sao_element_perview .rd-button,
		.sao_element_perview  input#submit,
   		.sao_element_perview .sao-color-primary-bacgkround,
		.sao_element_perview .sao-color-primary-text,
		.sao_element_perview .lSSlideOuter .lSPager.lSpg > li.active a,
		.sao_element_perview .rd-contactform .wpcf7-submit{
  			'.ssel_custom_text_css($primary_text,true).'
  			'.ssel_custom_background_css($primary_bacgkround,true).'
  	 
		} 
		 
	  ';
	
 	
  
 	$css.='
 		#sao_buidler_perview .sao_element_perview .button,
		 #sao_buidler_perview .sao_element_perview button{
  			'.ssel_custom_text_css($primary_text).'
  			'.ssel_custom_background_css($primary_bacgkround).'
  	 
		} ';
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Main Content Style
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
  	$main_link_color_text =  ssel_option_2('main_link_color','link'); 
	$main_link_color_hover =  ssel_option_2('main_link_color','hover');	
 	$main_text_color =  ssel_option('main_text_color');	
	$main_highlight_color =  ssel_option('main_highlight_color');	
	$main_border_color =  ssel_option('main_border_color');	
	$main_grey_color =  ssel_option('main_grey_color');	
	$main_radius =  ssel_option('main_radius');	
  	//------------------------------CSS ----------------------------------------------------------

	$css.='.sao_element_perview p,
		.sao_element_perview input,
		.sao_element_perview,
	.sao_element_perview input ,
		.sao_element_perview select ,
		.sao_element_perview textarea,		
		.sao_element_perview .sao-color-text {
  			'.ssel_custom_text_css($main_text_color).'
 		
		} 
 	
		.sao_element_perview input::placeholder,
		.sao_element_perview select::placeholder,
		.sao_element_perview textarea::placeholder{
 
			'.ssel_custom_text_css(ssel_hex2rgbacolor($main_text_color,0.7)).'			
 
		}
	
 		.sao_element_perview a,
		.sao_element_perview .rd-title,
		.sao_element_perview .sao-color-link,
		..sao_element_perview sao-color-item a,
		.sao_element_perview .rd-share span {
  			'.ssel_custom_text_css($main_link_color_text).'
 			
		} 
	 
			 
		.sao_element_perview blockquote p{
  			'.ssel_custom_border_color_css($main_highlight_color).'
		
		}
		 
 		.sao-slider-perveiw-warp  span,
		.sao-slider-perveiw-warp .sao-color-span,
		.sao-slider-perveiw-warp .sao-color-item span,
		 .sao_element_perview  span,
	 	.sao_element_perview .sao-color-span,
		.sao_element_perview .sao-color-item span
		{
  			'.ssel_custom_text_css($main_highlight_color).'
 		
		} 	
	 
		 .sao_element_perview .sao-color-border,
		 .sao_element_perview .sao-color-item,
 		.sao_element_perview .sao-color-item *,
		 .sao_element_perview .rd-color-border,
		 .sao_element_perview  .rd-color-item,
		 .sao_element_perview .rd-color-item *,
	 	.sao_element_perview body input,
		 .sao_element_perview textarea,
		  .sao_element_perview select,
 		  .sao_element_perview th,
		 .sao_element_perview table,
		 .sao_element_perview tbody,
		 .sao_element_perview td,
		 .sao_element_perview tr,
		 .sao_element_perview .rd-share-icons.rd-share-style-2 li a,
		 .sao_element_perview .rd-social-icons.rd-social-style-2 li a{
  			'.ssel_custom_border_color_css($main_border_color).' 
			
		}
		 .sao_element_perview input,
		.sao_element_perview  .rd-searchfield,
 		 .sao_element_perview select,
		 .sao_element_perview textarea{
  			'.ssel_custom_background_color_css($main_grey_color,true).'
 			
		}  
 		 .sao_element_perview  input,
		 .sao_element_perview  textarea,
		 .sao_element_perview  select{
			 
			'.ssel_custom_radius_css($main_radius).'
	 
	 	}';		
	  		
	$button_radius =  ssel_option('button_radius');   	
	$button_font_weight =  ssel_option_2('button_typo','font_weight');  
	$button_text_transform =  ssel_option_2('button_typo','text_transform');
  	//------------------------------CSS ----------------------------------------------------------
	$css.=' 
 		.sao_element_perview  .button,
		.sao_element_perview  .rd-button,
		.sao_element_perview  button,
		.sao_element_perview  input#submit,
 		
		.sao_element_perview  select,
		.sao_element_perview  input,
 		.sao_element_perview  .rd-social-style-2 li a,
		.sao_element_perview  .rd-social-style-3 li a,
    	.sao_element_perview  .rd-searchform select,
		.sao_element_perview  .rd-share-icons.rd-share-style-2 li a,
		.sao_element_perview  .rd-share-icons.rd-share-style-3 li a,
		.sao_element_perview  .rd-searchfield,
 		.sao_element_perview  .rd-searchfield-button {
		
			'.ssel_custom_radius_css($button_radius).'
	
		} 
		
 		.sao_element_perview  .button,
		.sao_element_perview  .rd-button,
		.sao_element_perview  button,
		.sao_element_perview  body input#submit,
		.sao_element_perview  .wpcf7-submit{
   			'.ssel_custom_font_weight_css($button_font_weight,true).' 
   			'.ssel_custom_text_transform_css($button_text_transform,true).' 
  			'.ssel_custom_border_color_css($main_grey_color).'  
			
		}';
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Arrow Style
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$arrow_text= ssel_option_2('arrow_color','arrow');  
	$arrow_background= ssel_option_2('arrow_color','background');  	
 
	//------------------------------CSS ----------------------------------------------------------
	$css.='
		.sao_element_perview  .sao-lSAction a::before {
  			'.ssel_custom_text_css($arrow_text,true).'
 		} 
		.sao_element_perview  .sao-lSAction a::after {
  			'.ssel_custom_background_css($arrow_background,true).'
  
		}';
	
	
return $css;

	}
	?>