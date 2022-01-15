<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Portfolio Carousel
																		
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'sao_element_item_portfolio_carousel' ) ) {
add_filter('sao_element_item', 'sao_element_item_portfolio_carousel');
function sao_element_item_portfolio_carousel( $element ) {
 	
 	$element[]=  array(
 		'name'			=> 	esc_html__('Portfolio Carousel','ssel'),
 		'id'			=> 'portfolio_carousel',
		'group'			=> esc_html__('Grafin','ssel'),
		'img'			=>  SSEL_DIR.'/admin/assets/images/element-portfolio-carousel.jpg',
  	); 

	return $element;
}  
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Portfolio Carousel Options
																		
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_portfolio_carousel_options' ) ) {

add_filter('sao_element_options_portfolio_carousel', 'ssel_portfolio_carousel_options');
function ssel_portfolio_carousel_options( $option ) {
 
 	 
	
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
 		"group"			=>  esc_html__('Title Box','ssel'),		  
	);	
 
	$option[]= array( 
 		"group"			=>  esc_html__('Post Style','ssel'),		  
	);		
	$option[]= array( 
 		"group"			=>  esc_html__('Typography','ssel'),		  
	);	
	$option[]= array( 
 		"group"			=>  esc_html__('Attribute','ssel'),		  
	);							
	
	 
     	
   	include SSEL_PATH . '/sao-builder/portfolio/sao-portfolio-general.php'; 
	
	 
	 
	include SSEL_PATH . '/sao-builder/general/sao-slider.php'; 
	
	$option[]= array( 
		"name"			=> esc_html__('Layout','ssel'),
 		"id"			=> "layout",
 		"group"			=>  esc_html__('Layout','ssel'),
  		"default"		=> 'list',
		"type"			=> "radio_image",
   		"options"		=>  array( 
  			"list"		=> SSEL_DIR.'/admin/assets/images/list/list_1.jpg',
 			"grid"		=> SSEL_DIR.'/admin/assets/images/grid/grid_1.jpg',
 			"featured"	=> SSEL_DIR.'/admin/assets/images/featured/featured_1.jpg',
  		  
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
 
 	   

  	include SSEL_PATH . '/sao-builder/blog/sao-blog-layout.php'; 
	include SSEL_PATH . '/sao-builder/general/sao-title-box.php'; 
 	include SSEL_PATH . '/sao-builder/blog/sao-blog-post-style.php'; 
 	include SSEL_PATH . '/sao-builder/blog/sao-blog-typography.php'; 
   	include SSEL_PATH . '/sao-builder/general/sao-element.php';
	   
	   
  	 
    return $option;

} 
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Portfolio Carousel Perview
																		
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_builder_perview_portfolio_carousel' ) ) {

add_filter('sao_builder_perview_portfolio_carousel', 'ssel_builder_perview_portfolio_carousel');
function ssel_builder_perview_portfolio_carousel( $args ) {
	 
	
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

															Portfolio Carousel Config
																		
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_portfolio_carousel_config' ) ) {

add_filter('sao_builder_portfolio_carousel', 'ssel_portfolio_carousel_config');
function ssel_portfolio_carousel_config($args,$out = false ,$out_css=false) {
 

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
	
	$option['post_type']='portfolio';
	//Text Css
  
	$layout = ssel_data($option,'layout','list');
  	$between = ssel_data($option,'between',ssel_option('portfolio_between'));
  	$arrow_layout = ssel_data($option,'arrow_layout');
   
	
 	$arrow_class=' sao-arrow-style '; 
  	$arrow_class.= !empty($arrow_layout['location'])? ' sao-arrow-'.$arrow_layout['location'].' ':'  sao-arrow-slider-1 ';
 	$arrow_class.= !empty($arrow_layout['size'])? ' sao-arrow-'.$arrow_layout['size'].' ':'  sao-arrow-medium ';
 	$arrow_class.= !empty($arrow_layout['layout'])? ' sao-arrow-'.$arrow_layout['layout'].' ':'  sao-arrow-hover ';
	 
 

	$classes = array(
 		'rd-post-all-warp',
  		'rd-ajax-tab',
		'rd-carousel',
		 !empty($ssel_ismobile)?'rd-post-warp-mobile':'sao-opacity-hide',
		'sao-image-gallery',
		'rd-custom-slider',
		'rd-color-border',
		$arrow_class,
   		'rd-between-'.esc_attr($between),
 		'rd-portfolio-'.$layout.'-warp',
		'rd-'.$layout.'-warp',
 	);
	if($layout  == 'list'){
		$rd_post_warp= !empty($ssel_ismobile)?' dragscroll rd_post_350px':'';
 	}elseif($layout  == 'grid'){
		$rd_post_warp= !empty($ssel_ismobile)?' dragscroll rd_post_250px':'';
 	} elseif($layout  == 'featured'){
		$rd_post_warp= !empty($ssel_ismobile)?' dragscroll rd_post_250px':'';
 	}   
 
 
	echo '<aside class="'.esc_attr(join( ' ', $classes )).'"   data-key="'.esc_attr($key).'" >'; 

		ssel_portfolio_title_tabs($option,'ssel_post_'.$layout.'_1');	
 
			echo '<div class="rd-slider-list-warp rd-post-list-warp    rd-post-gap-warp  "  >';
				echo '<div class="rd-post-list  rd-slider-list"  >';
 
			
					 if($layout=='list'){
						 ssel_post_list_1($option); 
					}
					if($layout=='grid'){
						 ssel_post_grid_1($option); 
		
					}
					if($layout=='featured'){
						 ssel_post_featured_1($option); 
					}
			   
  				 
  			
		 		echo '</div>';
			
 			
				if(!empty($option['arrows'])  && empty($ssel_ismobile)){
					echo'<div class="rd-lSAction  sao-lSAction"><a class="lSPrev"></a><a class="lSNext"></a></div>';	
				}	
			echo '</div>';
 
 
 
		if(empty($ssel_ismobile)){
	
	$thumbItem = !empty($option['column']) ? $option['column'] : 4;
 
		 	
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
	
	
  	$slider_options['between']=    '0';	
	$slider_options['pager']= !empty($option['pager']) ? $option['pager'] : '';
	$slider_options['timer']= false;	
 	$slider_options['controls']=!empty($option['arrows']) ? $option['arrows'] : '';
 	$slider_options['loop']=isset($option['loop']) ? $option['loop'] : false;
	$slider_options['auto']=  !empty($option['auto']) ? $option['auto'] : '';
	
 	 echo ssel_lightslider($thumbItem,$slider_options);
	}
			
	echo '</aside>';	
	
 	$item = 'body .sao-element-'.$key.' ';
 
	$css.= ssel_box_css($option,$item);
	if($layout  == 'featured'){
		$css.= ssel_details_mode_3_css($option,$item);
	}else{
  	$css.= ssel_image_css($option,$item);
	}
   	$css.= ssel_title_box_css($option,$item);
	$css.= ssel_post_title_css($option,$item);
 	$css.= ssel_excerpt_css($option,$item);
  	$css.= ssel_meta_css($option,$item );
  	$css.= ssel_viewmore_css($option,$item );
  	$css.= ssel_arrow_css($option,$item );
	$css.= ssel_pager_css($option,$item );
 
    
 
 
 	$css.=ssel_element_padding( $key,$option); 
 	
  
   	$return['output']=  ob_get_clean();
  	$return['css']= $css;
	
	return !empty($out)? $return['output'] :$return;	

}
}}
 
?>