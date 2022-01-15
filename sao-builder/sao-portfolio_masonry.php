<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																		Portfolio Masonry
																		
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'xxxxxxxxxxxxxx' ) ) {

add_filter('sao_element_item', 'sao_element_item_portfolio_masonry');
function sao_element_item_portfolio_masonry( $element ) {
 	
 	$element[]=  array(
 		'name'			=> 	esc_html__('Portfolio Masonry','ssel'),
 		'id'			=> 'portfolio_masonry',
		'group'			=> esc_html__('Grafin','ssel'),
		'img'			=>  SSEL_DIR.'/admin/assets/images/element-portfolio-masonry.jpg',
  	); 
			
	
	return $element;
}  
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																		Portfolio Masonry Options
																		
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_portfolio_masonry_options' ) ) {

add_filter('sao_element_options_portfolio_masonry', 'ssel_portfolio_masonry_options');
function ssel_portfolio_masonry_options( $option ) {
 
 	$option[]= array( 
 		"group"			=>  esc_html__('General','ssel'),		  
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
	
	$option[]= array( 
		"name"			=> esc_html__('More Posts','ssel'),
 		"id"			=> "more_posts",
		"type"			=> "select",
 		"options"		=>   array( 
			""			=> 	__('None','ssel'),
			"load_more"		=> 	__('Load More','ssel'),
   			 
		),										
	); 
	   
	
	$option[]= array( 
		"name"			=> esc_html__('Layout','ssel'),
 		"id"			=> "layout",
 		"group"			=>  esc_html__('Layout','ssel'),
  		"default"		=> 'grid',
		"type"			=> "radio_image",
   		"options"		=>  array( 
  			"grid"		=> SSEL_DIR.'/admin/assets/images/grid/grid_1.jpg',
 			"featured"	=> SSEL_DIR.'/admin/assets/images/featured/featured_1.jpg',
  		  
 		),						
				  
	); 

	$option[]= array( 
		"name"			=> esc_html__('Column Layout','ssel'),
 		"id"			=> "column",
 		"group"			=>  esc_html__('Layout','ssel'),
  		"default"		=> '2',
		"type"			=> "select",
   		"options"		=>  array( 
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
 
 	   

  	include SSEL_PATH . '/sao-builder/blog/sao-blog-masonry-layout.php'; 
	include SSEL_PATH . '/sao-builder/general/sao-title-box.php'; 
 	include SSEL_PATH . '/sao-builder/blog/sao-blog-post-style.php'; 
 	include SSEL_PATH . '/sao-builder/blog/sao-blog-typography.php'; 
   	include SSEL_PATH . '/sao-builder/general/sao-element.php';
	   
  	 
	   
    return $option;

} 
 }
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																		Portfolio Masonry Perview
																		
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_builder_perview_portfolio_masonry' ) ) {

add_filter('sao_builder_perview_portfolio_masonry', 'ssel_builder_perview_portfolio_masonry');
function ssel_builder_perview_portfolio_masonry( $args ) {
	 
	
  		$key = $args['key'];
 		$option = $args['option'];
		$output='';
		$css='';
			if(!empty($option['layout']) && !empty($option['column'])){
				$output ='<img src="'.SSEL_DIR.'/admin/assets/images/'.$option['layout'].'-masonry/'.$option['layout'].'_masonry_'.esc_attr($option['column']).'.jpg">'; 
			}
			 
			 
		$css.= '.sao-element-'.$key.' {text-align: center;}'; 
  	$return['css']= $css;
	$return['output']= $output;
		return $return;
}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																		Portfolio Masonry Config
																		
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_portfolio_masonry_config' ) ) {

add_filter('sao_builder_portfolio_masonry', 'ssel_portfolio_masonry_config');
function ssel_portfolio_masonry_config( $args,$out = false ,$out_css=false ) {
 
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
 	$more_posts = !empty($option['more_posts']) ?$option['more_posts'] : '';
    
	$layout = ssel_data($option,'layout','grid');
	$column = ssel_data($option,'column','3');
    
  	 if($layout=='featured'){
		$option['ratio']='rd-ratio-auto';
	 }
   	
	$between = ssel_data($option,'between',ssel_option('portfolio_between'));
   
	$classes = array(
 		'rd-post-all-warp',
  		'rez-portfolio',
		'rez-portfolio-flex',
 		'macy-masonry', 
		'rd-color-border',
  		'rd-between-'.esc_attr($between),
 		'rd-portfolio-'.$layout.'-warp',
		'rd-'.$layout.'-warp',
 	);
 
  	echo '<aside class="'.esc_attr(join( ' ', $classes )).'"  data-column="'.esc_attr($column).'"  data-key="'.esc_attr($key).'" >'; 

  		ssel_portfolio_title_tabs($option);	
		echo '<div class="rd-post-list-warp rd-post-gap-warp "  >';
		echo '<div class="rd-post-list   "  >';
 
 			if($layout=='grid'){
				if($column=='2') ssel_post_grid_masonry_2($option);
				if($column=='3') ssel_post_grid_masonry_3($option); 
				if($column=='4') ssel_post_grid_masonry_4($option);
				if($column=='5') ssel_post_grid_masonry_5($option);
				if($column=='6') ssel_post_grid_masonry_6($option);
				if($column=='7') ssel_post_grid_masonry_7($option);
				if($column=='8') ssel_post_grid_masonry_8($option);  			 
			}else{
 				if($column=='2') ssel_post_featured_masonry_2($option);
				if($column=='3') ssel_post_featured_masonry_3($option); 
				if($column=='4') ssel_post_featured_masonry_4($option);
				if($column=='5') ssel_post_featured_masonry_5($option);
				if($column=='6') ssel_post_featured_masonry_6($option);
				if($column=='7') ssel_post_featured_masonry_7($option);
				if($column=='8') ssel_post_featured_masonry_8($option);  			
			}
  				
  			
		 	echo '</div>';
		 	echo '</div>';
 
			if($more_posts == 'load_more'){
				ssel_load_more($option,'ssel_post_'.$layout.'_masonry_'.$column);						
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
 
 
 	$css.=ssel_element_padding( $key,$option); 
 	
	 
   	$return['output']=  ob_get_clean();
  	$return['css']= $css;
	
	return !empty($out)? $return['output'] :$return;	


 
}
}
 }
 
?>