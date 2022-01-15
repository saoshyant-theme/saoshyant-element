<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																		Search Field
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'sao_element_item_search_field' ) ) {

add_filter('sao_element_item', 'sao_element_item_search_field');
function sao_element_item_search_field( $element ) {
 	
 	$element[]=  array(
 		'name'			=> 	esc_html__('Search Field','ssel'),
 		'id'			=> 'search_field',
		'img'			=>  SSEL_DIR.'/admin/assets/images/element-search.jpg',
		
   	); 
   
	
	return $element;
} 
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																		Search Field Options
																		
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_search_field_options' ) ) {

add_filter('sao_element_options_search_field', 'ssel_search_field_options');
function ssel_search_field_options( $option ) {
 
 	$option[]= array( 
		"name"			=> esc_html__('Search in Post Type ID','ssel'),
 		"id"			=> "post_type",
  		"type"			=> "select",
  		"options"		=> array(
			""				=> 		esc_html__('All','ssel'),
			"post" 			=> 		esc_html__('Post Blog','ssel'),
			"portfolio"		=> 	esc_html__('Portfolio','ssel'),
			"product"		=> 	esc_html__('Product','ssel'),
			),
 	);
 
	$option[]= array( 
		"name"			=> esc_html__('Placeholder','ssel'),
 		"id"			=> "placeholder",
  		"type"			=> "text",
		"default"		=>  ssel_t('searchitem'),
		
 	);
  	$option[]= array( 
		"name"			=> __('Search Button Type','ssel'),
 		"id"			=> "search_button_type",
  		"type"			=> "select",
 		"options"		=> array(
 			"icon" => esc_html__('Icon','ssel'),	
			"text" => esc_html__('Text','ssel'),	
		
		),
		
 	); 
	$option[]= array( 
		"name"			=> __('Width','ssel'),
 		"id"			=> "width",
  		"group"			=>  __('Layout','ssel'),
 		"type"			=> "select",
 		"options"		=> array(
 			"" =>esc_html__('Default','ssel'),
			"100%" =>  '100%',
			"95%" =>  '95%',
			"90%" =>  '90%',
			"85%" =>  '85%',
			"80%" =>  '80%',
			"75%" =>  '75%',
			"70%" =>  '70%',
			"65%" =>  '65%',
			"60%" =>  '60%',
			"55%" =>  '55%',
			"50%" =>  '50%',
			"45%" =>  '45%',
			"40%" =>  '40%',
			"35%" =>  '35%',
			"30%" =>  '30%',
			"25%" =>  '25%',
			"20%" =>  '20%',
  	
		),
  	);	
	
	
 	$option[]= array( 
		"name"			=> __('Height','ssel'),
 		"id"			=> "height",
  		"group"			=>  __('Layout','ssel'),
 		"type"			=> "number",
  	);		
			
	$option[]= array( 
		"name"			=> __('Alignment','ssel'),
 		"id"			=> "alignment",
  		"group"			=>  __('Layout','ssel'),
		"default"		=>  'center',
		"desc"			=>  __('Default "Center"','ssel'),
		"type"			=> "select",
		"options"		=>  array( 
			'' 			=> 	__('Default','ssel'),
			'left'			=>  is_rtl()? esc_html__('Right','ssel'): esc_html__('Left','ssel'),
			'center'		=>  esc_html__('Center','ssel'),
 			'right'			=>  is_rtl()? esc_html__('Left','ssel'):esc_html__('Right','ssel'),											
			 
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
		"name"			=> esc_html__('Search Style','ssel'),
 		"id"			=> "search_style",
 		"group"			=>  esc_html__('Search Style','ssel'),
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
		"name"			=> esc_html__('Search Button Style','ssel'),
 		"id"			=> "search_button_style",
 		"group"			=>  esc_html__('Search Style','ssel'),
   		"type"			=> "multi_options",
 		"options"			=>	array( 	
 			array( 
				"name"			=> __('Text Color','ssel'),			
  				"id"			=> "text",
				"type"			=> "color_rgba",
 			),

			array( 
 				"name"			=> 	__('Background','ssel'),
 				"id"			=> "background",
  				"type"			=> "color_rgba",
  			),		
 		 
		),							
   	); 	
	
	$option[]= array( 
		"name"			=> __('Search Border','ssel'),
 		"id"			=> "search_border_color",
		"group"			=>  esc_html__('Search Style','ssel'),
 		"type"			=> "color_rgba",
	); 	
	
	 
 	$option[]= array( 
		"name"			=> __('Search Border Radius','ssel'),
 		"id"			=> "search_radius",
 		"group"			=>  esc_html__('Search Style','ssel'),
 		"type"			=> "select",
  		"options"		=>  ssel_array_options('radius'),						
	 
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

																		Search Field Config
																		
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_search_field_config' ) ) {

add_filter('sao_builder_search_field', 'ssel_search_field_config');
function ssel_search_field_config( $args ) {
 
 
 
	$option = $args['option'];
	$key = $args['key'];
	$output='';
	$css ='';
	$ssel_ismobile=ssel_ismobile();	 
 	if(!empty($option['hide_mobile'])){
 		$is_mobile =!empty($ssel_ismobile)? 'hide':'show';
	}else{
		$is_mobile ='show';
	}
	if($is_mobile =='show'){
	
	ob_start(); 
	$search_button_type= !empty($option['search_button_type']) ?$option['search_button_type']:'icon';
	$alignment= !empty($option['alignment']) ?$option['alignment']:'center';
	$placeholder= !empty($option['placeholder']) ?$option['placeholder']:'';
	 
 			  

  	echo '<aside class="rd-searchfield-warp rd-auto-width-warp rd-searchfield-button-'.esc_attr($search_button_type).' rd-alignment-'.esc_attr($alignment).'">';
	 		 

 				echo '<form method="get" class="rd-searchfield rd-auto-width-item rd-color-border rd-color-text" action="'.esc_url(home_url( '/') ).'">';
  				echo '<input type="text" name="s" class="rd-searchfield-text rd-font-medium" value="" placeholder="'.esc_attr($placeholder).'" />';
				
				if($search_button_type == 'text' ){
					echo '<button type="submit" name="btnSubmit" class="rd-searchfield-button rd-font-medium button"  >'.esc_attr(ssel_t('search')).'</button>';
  				}else{
					echo '<button type="submit" name="btnSubmit" class="rd-searchfield-button fa-search"></button>';
					
 				}
				if(!empty($option['post_type'])){
 				 				echo '<input type="hidden" name="post_type" value="'.esc_attr($option['post_type']).'">';
				}
				echo '</form>';
				
				
				
 		 
	echo '</aside>';
	 
	$item = '.sao-element-'.$key.' '; 
 	$height= !empty($option['height']) ?$option['height']:'50';
 	$width= !empty($option['width']) ?$option['width']:'100%';

  	$search_css='';
 	if(!empty($height)){
 		$search_css.= "height:".$height."px !important;";
		$search_css.= "line-height:".$height."px !important;";
		
		if($search_button_type=='icon'){
			$search_css.= " grid-template-columns:auto ".$height."px !important;";
		}
 		
	}
 	if(!empty($width)){
 		$search_css.= "width:".$width." !important;";
 	}
	
	
	$search_css.= ssel_element_text_css($option,'search_style','text'); 
   	$search_css.= ssel_element_background_color_css( $option,'search_style','background');
 	$search_css.= ssel_element_border_css($option,'search_border_color');
 
	$css.= ssel_element_item_css($search_css , $item .' .rd-searchfield');	 
	
	
	$search_radius = ssel_element_radius_css($option,'search_radius');
	$css.= ssel_element_item_css($search_radius , $item .' .rd-searchfield,'.$item .' .rd-searchfield-button');	 
	
 
	$search_button_style = ssel_element_text_css($option,'search_button_style','text'); 
	$search_button_style.= ssel_element_background_color_css( $option,'search_button_style','background');
	
   	$css.= ssel_element_item_css($search_button_style , $item .' .rd-searchfield-button ');	 
 

  	$text_typo_css = ssel_element_font_typo($option,'text_typo'); 
	$css.= ssel_element_item_css($text_typo_css,$item.'  .rd-searchfield-text');	
	
	$css.=ssel_element_padding( $key,$option); 
 	
   	$return['output']=  ob_get_clean();;
  	$return['css']= $css;
	
	return $return;	
}
}
 
 }
?>