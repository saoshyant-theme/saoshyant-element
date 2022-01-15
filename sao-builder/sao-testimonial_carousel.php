<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																		Testimonial Carousel
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'sao_element_item_testimonial_carousel' ) ) {

add_filter('sao_element_item', 'sao_element_item_testimonial_carousel');
function sao_element_item_testimonial_carousel( $element ) {
 	
 	$element[]=  array(
 		'name'			=> 	esc_html__('Testimonial Carousel','ssel'),
 		'id'			=> 'testimonial_carousel',
		'group'			=> esc_html__('Grafin','ssel'),
		'img'			=>  SSEL_DIR.'/admin/assets/images/element-testimonial-carousel.jpg',
  	);
	return $element;
}  
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																		Testimonial Carousel
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_testimonial_carousel_options' ) ) {

add_filter('sao_element_options_testimonial_carousel', 'ssel_testimonial_carousel_options');
function ssel_testimonial_carousel_options( $option ) {
 	  
	$option[]= array( 
 		"group"			=>  esc_html__('General','ssel'),		  
	);	
	$option[]= array( 
 		"group"			=>  esc_html__('Slider','ssel'),		  
	);
	$option[]= array( 
 		"group"			=>  esc_html__('Layout','ssel'),		  
	);		
	 
 	$option[]= array( 
 		"group"			=>  esc_html__('Testimonial Style','ssel'),		  
	);		
 	$option[]= array( 
 		"group"			=>  esc_html__('Typography','ssel'),		  
	);	
	$option[]= array( 
 		"group"			=>  esc_html__('Attribute','ssel'),		  
	);							
	
	 
     	
   	include SSEL_PATH . '/sao-builder/testimonial/sao-testimonial-general.php'; 
	
	 
	$option[]= array( 
		"name"			=> __('Pager','ssel'),
 		"id"			=> "pager",
		"default"		=>  1,
 		"group"			=>  __('Slider','ssel'),
  		"type"			=> "checkbox",
 	); 		
	$option[]= array( 
		"name"			=> __('Pager Style','ssel'),
 		"id"			=> "pager_style",
  		"group"			=> esc_html__('Slider','ssel'),
  		"fold"			=>  array("1"=>"pager"),
 		"type"			=> "multi_options",
		"options"			=>	array( 	
		
		array( 
 				"name"			=> 	__('Pager Color','ssel'),
 				"id"			=> "pager",
  				"type"			=> "color_rgba",
  			
 			), 	
  			array( 
				"name"			=> __('Active Color','ssel'),			
  				"id"			=> "pager_actvie",
				"type"			=> "color_rgba",
 			),

					
		 	 
		
		), 			
	 
	); 		 	 
	include SSEL_PATH . '/sao-builder/general/sao-slider.php'; 
	
	$option[]= array( 
		"name"			=> esc_html__('Layout','ssel'),
 		"id"			=> "layout",
 		"group"			=>  esc_html__('Layout','ssel'),
  		"default"		=> 'list',
		"type"			=> "radio_image",
   		"options"		=>  array( 
  			"list"		=> SSEL_DIR.'/admin/assets/images/list/list_2.jpg',
 			"grid"		=> SSEL_DIR.'/admin/assets/images/grid/grid_2.jpg',
   		  
 		),						
				  
	); 

	$option[]= array( 
		"name"			=> esc_html__('Column Layout','ssel'),
 		"id"			=> "column",
 		"group"			=>  esc_html__('Layout','ssel'),
  		"default"		=> '1',
		"type"			=> "select",
   		"options"		=>  array( 
 			"1"	=> 1, 
 			"2"	=> 2, 
 			"3"	=> 3, 
 			"4"	=> 4, 
 			"5"	=> 5, 
 			"5"	=> 5, 
 			"6"	=> 6,
			"7"	=> 7, 
 			"8"	=> 8, 
 		  
 		),						
				  
	);  
 
 	   

  	include SSEL_PATH . '/sao-builder/testimonial/sao-testimonial-layout.php'; 
  	include SSEL_PATH . '/sao-builder/testimonial/sao-testimonial-style.php'; 
 	include SSEL_PATH . '/sao-builder/testimonial/sao-testimonial-typography.php'; 
   	include SSEL_PATH . '/sao-builder/general/sao-element.php';
  	 
    return $option;

} 
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																		Testimonial Carousel Perview
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_builder_perview_testimonial_carousel' ) ) {

add_filter('sao_builder_perview_testimonial_carousel', 'ssel_builder_perview_testimonial_carousel');
function ssel_builder_perview_testimonial_carousel( $args ) {
	 
	
	$key = $args['key'];
	$option = $args['option'];
	$output='';
	$css='';
	if(!empty($option['layout']) && !empty($option['column'])){
				$output ='<img src="'.SSEL_DIR.'/admin/assets/images/'.$option['layout'].'-carousel/'.$option['layout'].'_carousel_'.esc_attr($option['column']).'.jpg">'; 
	}
	$css.= '.sao-element-'.$key.' {text-align: center;}'; 
  	$return['css']= $css;
	$return['output']= $output;
		return $return;
}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																		Testimonial Carousel config
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_testimonial_carousel_config' ) ) {

add_filter('sao_builder_testimonial_carousel', 'ssel_testimonial_carousel_config');
function ssel_testimonial_carousel_config($args,$out = false ,$out_css=false ) {
 

	$option = $args['option'];
	$key = $args['key'];
	$ssel_ismobile=ssel_ismobile();	 
 	if(!empty($option['hide_mobile'])){
 		$is_mobile =!empty($ssel_ismobile)? 'hide':'show';
	}else{
		$is_mobile ='show';
	}
	if($is_mobile =='show'){
	ob_start(); 
	$option['key']=!empty($args['key'])? $args['key']:'';
 
	$output='';
	$css =''; 
	
	$option['post_type']='testimonial';
	//Text Css
 
 
  	$layout = ssel_data($option,'layout','list');
  	$between = ssel_data($option,'between',ssel_option('blog_between'));
  	$arrow_layout = ssel_data($option,'arrow_layout');
   
	
	$arrow_class=' sao-arrow-style '; 
  	$arrow_class.= !empty($arrow_layout['location'])? ' sao-arrow-'.$arrow_layout['location'].' ':'  sao-arrow-slider-1 ';
 	$arrow_class.= !empty($arrow_layout['size'])? ' sao-arrow-'.$arrow_layout['size'].' ':'  sao-arrow-medium ';
 	$arrow_class.= !empty($arrow_layout['layout'])? ' sao-arrow-'.$arrow_layout['layout'].' ':'  sao-arrow-hover ';
	 
 
  
	$classes = array(
 		'rd-post-all-warp',
  		'rd-ajax-tab',
		'rd-color-border', 
		'rd-carousel', 
		'sao-image-gallery',
		'rd-custom-slider',
		 !empty($ssel_ismobile)?'rd-post-warp-mobile':'sao-opacity-hide',
		'rd-testimonial-'.$layout.'-carousel',
		'rd-testimonial-carousel',
		$arrow_class,
   		'rd-between-'.esc_attr($between),
 		'rd-testimonial-'.$layout.'-warp',
		'rd-'.$layout.'-warp',
 	);

	if($layout  == 'list'){
		$rd_post_warp= !empty($ssel_ismobile)?' dragscroll rd_post_350px':'';
 	}elseif($layout  == 'grid'){
		$rd_post_warp= !empty($ssel_ismobile)?' dragscroll rd_post_250px':'';
 	}   
  
 
 	echo '<aside class="'.esc_attr(join( ' ', $classes )).'"   data-key="'.esc_attr($key).'" >'; 
	 
	 
		echo '<div class="rd-slider-list-warp rd-post-list-warp  rd-post-gap-warp "  >';
		
			echo '<div class="rd-post-list  rd-slider-list "  >';
 
				 if($layout=='list'){
					 ssel_post_list_1($option); 
				}
				if($layout=='grid'){
					 ssel_post_grid_1($option); 
	
				} 
		 
		 	echo '</div>';
 				
 			if(!empty($option['arrows'])  && empty($ssel_ismobile)){
			echo'<div class="rd-lSAction  sao-lSAction"><a class="lSPrev"></a><a class="lSNext"></a></div>';	
			}		
		echo '</div>';
 
 		if(empty($ssel_ismobile)){

 
	
	$thumbItem = !empty($option['column']) ? $option['column'] : 3;
 	$slider_options = array( 
   					
		"responsive"		=>  array(  array( 
				"breakpoint"		=> 1199,
				"settings"			=> 
					array( 
						"controls"		=> true,
						"item"			=> ssel_post_responsive_item($thumbItem ,1199) ,
 					),
			),
			array( 
				"breakpoint"		=> 990,
				"settings"			=> 
					array( 
						"controls"		=> true,
						"item"			=> ssel_post_responsive_item($thumbItem ,990) ,
					),
			),
			array( 
				"breakpoint"		=> 767,
				"settings"			=> 
					array( 
						"controls"		=> true,
						"item"			=> ssel_post_responsive_item($thumbItem ,'767'),
					),
			) ,
			array( 
				"breakpoint"		=> 499,
				"settings"			=> 
					array( 
						"controls"		=> true,
						"item"			=>  ssel_post_responsive_item($thumbItem ,499) ,
						
						
					),
			),	),
			
 			
	); 	
	
		 
 	
 	$slider_options['speed']=  !empty($option['speed']) ? $option['speed'] : '2000';
	
 	$slider_options['pause']= !empty($option['pause']) ? $option['pause'] : '5000';
	
	
  	$slider_options['between']=  '0';	
	$slider_options['pager']= !empty($option['pager']) ? $option['pager'] : '';
	$slider_options['timer']= false;	
 	$slider_options['controls']=!empty($option['arrows']) ? $option['arrows'] : '';
 	$slider_options['loop']=isset($option['loop']) ? $option['loop'] : false;
	$slider_options['auto']=  !empty($option['auto']) ? $option['auto'] : '';
	
 	 echo ssel_lightslider($thumbItem,$slider_options);
			 
		}
			
   		echo '</aside>';	
	
 	$item = '.sao-element-'.$key.' ';
 	
	
 	$css.= ssel_box_css($option,$item);
 	$css.= ssel_image_css($option,$item );
	  	 
   	$css.= ssel_testimonial_author_name_css($option,$item);
  	$css.= ssel_testimonial_author_information_css($option,$item);
  	$css.= ssel_testimonial_author_rating_css($option,$item);
  	$css.= ssel_testimonial_author_quote_css($option,$item);
 
	$css.= ssel_arrow_css($option,$item );
	$css.= ssel_pager_css($option,$item );
    
 
 
 	$css.=ssel_element_padding( $key,$option); 
 	
	 
   	$return['output']=  ob_get_clean();
  	$return['css']= $css;
	
	return !empty($out)? $return['output'] :$return;	

}
}
 }
 
?>