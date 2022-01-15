<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Contact Form 7
																		
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'sao_element_item_contactform' ) ) {

add_filter('sao_element_item', 'sao_element_item_contactform');
function sao_element_item_contactform( $element ) {
 	
 	$element[]=  array(
 		'name'			=> 	esc_html__('Contact Form 7','ssel'),
 		'id'			=> 'contactform',
		'group'			=> esc_html__('Grafin','ssel'),
		'img'			=>  SSEL_DIR.'/admin/assets/images/element-contact-form.jpg',
		
   	); 
  
	return $element;
}  
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Contact Form 7 Options
																		
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_contactform_options' ) ) {
add_filter('sao_element_options_contactform', 'ssel_contactform_options');
function ssel_contactform_options( $option ) {
  
	$option[]= array( 
		"name"			=> esc_html__('Contact Form','ssel'),
 		"id"			=> "contactform_id",
  		"type"			=> "select",
 		"options"		=>  ssel_array_options('contactform'),						
 	);	

  
 	$option[]= array( 
		"name"			=> __('Field Height','ssel'),
 		"id"			=> "height",
  		"group"			=>  __('Layout','ssel'),
 		"type"			=> "number",
  	);	
	
	$option[]= array( 
		"name"			=> __('Textarea Height','ssel'),
 		"id"			=> "textarea_height",
  		"group"			=>  __('Layout','ssel'),
 		"type"			=> "number",
  	);		
	
	$option[]= array( 
		"name"			=> esc_html__('Between Field','ssel'),
 		"id"			=> "between",
 		"group"			=>  esc_html__('Layout','ssel'),
		"type"			=> "select",
  		"default"		=>  '',
		"options" 		=>	array(
			"" 	=>__('Default','ssel'),
			"0px" 	=> "0px",
			"2px" 	=> "2px",
  			"10px" 	=> "10px",
			"15px" 	=> "15px",
			"20px" 	=> "20px",
 			"30px" 	=> "30px",
			"40px" 	=> "40px",
			"60px" 	=> "60px",
 		 ),
  	);
 	$option[]= array( 
		"name"			=> __('Padding','ssel'),
 		"id"			=> "padding",
  		"group"			=>  __('Layout','ssel'),
		"default"		=>  array( 
			"top"			=> '20',
			"left"			=> '20',
			"bottom"		=> '20',
			"right"			=> '20',
 			), 
		
		"type"			=> "multi_options",
 		"options"		=>  sao_multi_array_options('margin'),						
 	);
	 
	 
 
 	$option[]= array( 
		"name"			=> esc_html__('CSS Animation','ssel'),
 		"id"			=> "cssanime",
		"desc"			=>  esc_html__('Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.','ssel'),
 		"group"			=>  esc_html__('Layout','ssel'),
		"type"			=> "select",
 		"options"		=>  sao_array_options('cssanime'),						
 	);
	
	
$option[]= array( 
		"name"			=> __('Text Color','ssel'),
 		"id"			=> "text_color",
		"group"			=>  esc_html__('Style','ssel'),
 		"type"			=> "color",
	); 		
	
	$option[]= array( 
		"name"			=> __('Field Background Color','ssel'),
 		"id"			=> "field_background_color",
		"group"			=>  esc_html__('Style','ssel'),
 		"type"			=> "color_rgba",
	); 	
	$option[]= array( 
		"name"			=> __('Field Text Color','ssel'),
 		"id"			=> "field_text_color",
		"group"			=>  esc_html__('Style','ssel'),
 		"type"			=> "color",
	); 		 
 	 
	$option[]= array( 
		"name"			=> __('Field Border Color','ssel'),
 		"id"			=> "field_border_color",
		"group"			=>  esc_html__('Style','ssel'),
 		"type"			=> "color_rgba",
	); 	 
	
 							
 
	
	$option[]= array( 
		"name"			=> __('Button color','ssel'),
 		"id"			=> "button_color",
		"group"			=>  esc_html__('Style','ssel'),
		"type"			=> "multi_options",
		"options"			=>	array( 	
							array( 
								"name"			=> 	__('Background Color','ssel'),
								"id"			=> "background",
								"type"			=> "color_rgba",
							),	
							array( 
								"name"			=> __('Text Color','ssel'),			
								"id"			=> "text",
								"type"			=> "color_rgba",
							), 
					),						
	); 	 
	$option[]= array(
		"name"			=> esc_html__('Border Radius','ssel'),
		"id"			=> "border_radius", 
		"type"		=> "select",
		"group"			=>  esc_html__('Style','ssel'),
		"options"	=>  ssel_array_options('radius'),
	);
	$option[] = array(
		"name" 		=> esc_html__('Textarea Border Radius' , 'ssel'),
		"id" 		=> "textarea_radius",
		"type"		=> "select",
		"group"			=>  esc_html__('Style','ssel'),
		"options"	=>  ssel_array_options('radius_mini'),
	);   		
				
  	
	
	$option[]= array( 
		"name"			=> esc_html__('Text Typography','ssel'),
 		"id"			=> "text_typo",
  		"group"			=>  esc_html__('Typography','ssel'),
   		"type"			=> "multi_options",
		"options"		=>	ssel_multi_array_options('typo')
		 
	);
			
	$option[]= array( 
		"name"			=> esc_html__('Element ID','ssel'),
 		"id"			=> "element_id",
 		"group"			=>  esc_html__('Attribute','ssel'),
		"desc"			=>  esc_html__('Enter Column ID ,','ssel').'<a href="https://www.w3schools.com/tags/att_global_id.asp">'.esc_html__('Learn more','ssel').'</a>',
		"type"			=> "text",
		 
	);
	
	$option[]= array( 
		"name"			=> esc_html__('Element Custom Class','ssel'),
 		"id"			=> "custom_class",
 		"group"			=>  esc_html__('Attribute','ssel'),
		"desc"			=>  esc_html__('Enter Class ,','ssel'),
		"type"		=> "text",

	);				 
 
    return $option;
} 
}
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Contact Form 7 Config
																		
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_contactform_config' ) ) {

add_filter('sao_builder_contactform', 'ssel_contactform_config');
function ssel_contactform_config( $args , $out = false ,$out_css=false) {
  
 
	$option = $args['option'];
	$key = $args['key'];
	$output='';
	$css ='';
	ob_start(); 
	$ssel_ismobile=ssel_ismobile();	 
 	if(!empty($option['hide_mobile'])){
 		$is_mobile =!empty($ssel_ismobile)? 'hide':'show';
	}else{
		$is_mobile ='show';
	}
	if($is_mobile =='show'){
	$search_button_type= !empty($option['search_button_type']) ?$option['search_button_type']:'icon';
  	$between = ssel_data($option,'between','40px');
	
	
	
	if(!empty($option['contactform_id'])) {
	 
   			echo '<div class="rd-contactform rd-auto-width-warp rd-color-border rd-color-item rd-color-text rd-between-'.esc_attr($between).'" >';
					echo '<div class="rd-post-list-warp rd-post-gap-warp"   >';

				$contactform_id = get_page_by_path($option['contactform_id'],OBJECT, 'wpcf7_contact_form');
				if(  !empty($contactform_id->ID)){
					echo do_shortcode('[contact-form-7 id="'.esc_attr($contactform_id->ID).'" title=""]');
				}  
		 	echo '</div>';
			echo '</div>';
	}
	 
	$item = '.sao-element-'.$key.' .rd-contactform'; 
 
  	$height='';
 	if(!empty($option['height'])){
 		$height.= "height:".$option['height']."px !important;";
		$height.= "line-height:".$option['height']."px !important;";
		
		 
	}
	$css.= ssel_element_item_css($height , $item .'   input,'.$item .'  select,body '.$item .' .wpcf7-submit');	 
	
	$textarea_height='';
 	if(!empty($option['textarea_height'])){
 		$textarea_height.= "height:".$option['textarea_height']."px !important;";
  	}	
	$css.= ssel_element_item_css($textarea_height , $item .' textarea');	 



 	$text_css = ssel_element_text_css( $option,'text_color');	
	$text_css.= ssel_element_font_typo($option,'text_typo') ; 
	$css.= ssel_element_item_css($text_css , $item .' label');	 



 	$field_css = ssel_element_background_color_css( $option,'field_background_color');	
 	$field_css.= ssel_element_text_css( $option,'field_text_color');	
 	$field_css.= ssel_element_border_css( $option,'field_border_color');	

	$css.= ssel_element_item_css($field_css , $item .' select,'. $item .' input,'.$item .' textarea,'.$item .' .wpcf7-submit');	 
	
	
 	
	if(!empty($option['field_text_color'])){
 		$field_placeholder_css = "color:".ssel_hex2rgbacolor($option['field_text_color'],0.8)." !important;";
 		$css.= ssel_element_item_css($field_placeholder_css , $item .' select::placeholder,'. $item .' input::placeholder,'.$item .' textarea::placeholder');	 	
   	}	
   
 		  
 
	

	$button_css = ssel_element_background_color_css( $option,'button_color','background');	
 	$button_css.= ssel_element_text_css( $option,'button_color','text');	
  
 
	  
	$css.= ssel_element_item_css($button_css , $item .' .wpcf7-form .wpcf7-submit');	 
	
	
	  
	$border_radius = ssel_element_radius_css($option,'border_radius');
	$css.= ssel_element_item_css($border_radius , $item .' select,'. $item .' input');	 
		  
	$textarea_radius = ssel_element_radius_css($option,'textarea_radius');
	$css.= ssel_element_item_css($textarea_radius , $item .' textarea');	 
	  
	    	 
	$css.=ssel_element_padding( $key,$option); 
	 
   	$return['output']=  ob_get_clean();
  	$return['css']= $css;
	
	return !empty($out)? $return['output'] :$return;	
}
}
 }
?>