<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Portfolio
																		
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'sao_element_item_portfolio' ) ) {

add_filter('sao_element_item', 'sao_element_item_portfolio');
function sao_element_item_portfolio( $element ) {
 	
 	$element[]= array(
 		'name'			=> 	esc_html__('Portfolio','ssel'),
 		'id'			=> 'portfolio',
		'group'			=> esc_html__('Grafin','ssel'),
   	); 
	
	return $element;
}  
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Portfolio Perview Options
																		
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_portfolio_options' ) ) {

add_filter('sao_element_options_portfolio', 'ssel_portfolio_options');
function ssel_portfolio_options( $option ) {
 
			
		
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
			"pagenavi"		=>  esc_html__('Page Number','ssel'),
  			 
		),										
		
 	);    
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
		"name"			=> esc_html__('List Layout','ssel'),
 		"id"			=> "list_layout",
 		"group"			=>  esc_html__('Layout','ssel'),
  		"default"		=> 'list_1',
 		"fold"			=>	array( 	
  			"list"				=> "layout",
   		), 
		"type"			=> "radio_image",
   		"options"		=>  array( 
 			"list_1"	=> SSEL_DIR.'/admin/assets/images/list/list_1.jpg',
 			"list_2"	=> SSEL_DIR.'/admin/assets/images/list/list_2.jpg',
 			"list_3"	=> SSEL_DIR.'/admin/assets/images/list/list_3.jpg',
 			"list_4"	=> SSEL_DIR.'/admin/assets/images/list/list_4.jpg',
 		  
 		),						
				  
	); 
	

	$option[]= array( 
		"name"			=> esc_html__('Grid Layout','ssel'),
 		"id"			=> "grid_layout",
 		"group"			=>  esc_html__('Layout','ssel'),
  		"default"		=> 'grid_3',
 		"fold"			=>	array( 	
  			"grid"				=> "layout",
   		), 
		"type"			=> "radio_image",
   		"options"		=>  array( 
 			"grid_1"	=> SSEL_DIR.'/admin/assets/images/grid/grid_1.jpg',
 			"grid_2"	=> SSEL_DIR.'/admin/assets/images/grid/grid_2.jpg',
 			"grid_3"	=> SSEL_DIR.'/admin/assets/images/grid/grid_3.jpg',
 			"grid_4"	=> SSEL_DIR.'/admin/assets/images/grid/grid_4.jpg',
 			"grid_5"	=> SSEL_DIR.'/admin/assets/images/grid/grid_5.jpg',
 			"grid_6"	=> SSEL_DIR.'/admin/assets/images/grid/grid_6.jpg',
 			"grid_7"	=> SSEL_DIR.'/admin/assets/images/grid/grid_7.jpg',
 			"grid_8"	=> SSEL_DIR.'/admin/assets/images/grid/grid_8.jpg', 
  		),						
				  
	); 
	

	$option[]= array( 
		"name"			=> esc_html__('Featured Layout','ssel'),
 		"id"			=> "featured_layout",
 		"group"			=>  esc_html__('Layout','ssel'),
  		"default"		=> 'featured_4',
 		"fold"			=>	array( 	
  			"featured"				=> "layout",
   		), 		
		"type"			=> "radio_image",
   		"options"		=>  array( 
 			"featured_1"	=> SSEL_DIR.'/admin/assets/images/featured/featured_1.jpg',
 			"featured_2"	=> SSEL_DIR.'/admin/assets/images/featured/featured_2.jpg',
 			"featured_3"	=> SSEL_DIR.'/admin/assets/images/featured/featured_3.jpg',
 			"featured_4"	=> SSEL_DIR.'/admin/assets/images/featured/featured_4.jpg',
 			"featured_5"	=> SSEL_DIR.'/admin/assets/images/featured/featured_5.jpg',
 			"featured_6"	=> SSEL_DIR.'/admin/assets/images/featured/featured_6.jpg',
 			"featured_7"	=> SSEL_DIR.'/admin/assets/images/featured/featured_7.jpg',
 			"featured_8"	=> SSEL_DIR.'/admin/assets/images/featured/featured_8.jpg',
 			"featured_9"	=> SSEL_DIR.'/admin/assets/images/featured/featured_9.jpg',
 			"featured_10"	=> SSEL_DIR.'/admin/assets/images/featured/featured_10.jpg',
 			"featured_11"	=> SSEL_DIR.'/admin/assets/images/featured/featured_11.jpg',
 			"featured_12"	=> SSEL_DIR.'/admin/assets/images/featured/featured_12.jpg',
 			"featured_13"	=> SSEL_DIR.'/admin/assets/images/featured/featured_13.jpg',
 			"featured_14"	=> SSEL_DIR.'/admin/assets/images/featured/featured_14.jpg',
 			"featured_15"	=> SSEL_DIR.'/admin/assets/images/featured/featured_15.jpg',
 			"featured_16"	=> SSEL_DIR.'/admin/assets/images/featured/featured_16.jpg',
 			"featured_17"	=> SSEL_DIR.'/admin/assets/images/featured/featured_17.jpg',
 			"featured_18"	=> SSEL_DIR.'/admin/assets/images/featured/featured_18.jpg',
 			"featured_19"	=> SSEL_DIR.'/admin/assets/images/featured/featured_19.jpg',
 			"featured_20"	=> SSEL_DIR.'/admin/assets/images/featured/featured_20.jpg',
 			"featured_21"	=> SSEL_DIR.'/admin/assets/images/featured/featured_21.jpg',
 			"featured_22"	=> SSEL_DIR.'/admin/assets/images/featured/featured_22.jpg',
 			"featured_23"	=> SSEL_DIR.'/admin/assets/images/featured/featured_23.jpg',
 			"featured_24"	=> SSEL_DIR.'/admin/assets/images/featured/featured_24.jpg',
 			"featured_25"	=> SSEL_DIR.'/admin/assets/images/featured/featured_25.jpg',
 			"featured_26"	=> SSEL_DIR.'/admin/assets/images/featured/featured_26.jpg',
 			"featured_27"	=> SSEL_DIR.'/admin/assets/images/featured/featured_27.jpg',
 			"featured_28"	=> SSEL_DIR.'/admin/assets/images/featured/featured_28.jpg',
 			"featured_29"	=> SSEL_DIR.'/admin/assets/images/featured/featured_29.jpg',
 			"featured_30"	=> SSEL_DIR.'/admin/assets/images/featured/featured_30.jpg',
 			"featured_31"	=> SSEL_DIR.'/admin/assets/images/featured/featured_31.jpg',
 			"featured_32"	=> SSEL_DIR.'/admin/assets/images/featured/featured_32.jpg',
 		),						
				  
	);
	 	
 	include SSEL_PATH . '/sao-builder/blog/sao-blog-layout.php'; 
	include SSEL_PATH . '/sao-builder/general/sao-title-box.php'; 
 	include SSEL_PATH . '/sao-builder/blog/sao-blog-post-style.php'; 
 	include SSEL_PATH . '/sao-builder/blog/sao-blog-typography.php'; 
   	include SSEL_PATH . '/sao-builder/general/sao-element.php';
	   
  	  
    return $option;
} 
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Portfolio Perview
																		
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_builder_perview_portfolio' ) ) {

add_filter('sao_builder_perview_portfolio', 'ssel_builder_perview_portfolio');
function ssel_builder_perview_portfolio( $args ) {
	 
	
  		$key = $args['key'];
 		$option = $args['option'];
		$output='';
		$css='';
		if(!empty($option['layout'])){
			if($option['layout'] =='list' && !empty($option['list_layout'])){
				$output ='<img src="'.SSEL_DIR.'/admin/assets/images/list/'.esc_attr($option['list_layout']).'.jpg">'; 
			}
			if($option['layout'] =='grid' && !empty($option['grid_layout'])){
				$output ='<img src="'.SSEL_DIR.'/admin/assets/images/grid/'.esc_attr($option['grid_layout']).'.jpg">'; 
			}
				if($option['layout'] =='featured' && !empty($option['featured_layout'])){
				$output ='<img src="'.SSEL_DIR.'/admin/assets/images/featured/'.esc_attr($option['featured_layout']).'.jpg">'; 
			}
			
			
		}
		$css.= '.sao-element-'.$key.' {text-align: center;}'; 
  	$return['css']= $css;
	$return['output']= $output;
		return $return;
}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Portfolio Config
																		
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_portfolio_config' ) ) {

add_filter('sao_builder_portfolio', 'ssel_portfolio_config');
function ssel_portfolio_config( $args,$out = false ,$out_css=false ) {
 
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

   
	$layout = ssel_data($option,'layout','list');
	$list_layout = ssel_data($option,'list_layout','list_1');
	$grid_layout = ssel_data($option,'grid_layout','grid_1');
	$featured_layout = ssel_data($option,'featured_layout','featured_1');
 	$between = ssel_data($option,'between',ssel_option('blog_between'));
   
  	$query = ssel_query($option,1);
	
	if($layout  == 'list'){
		$post_warp_class= 'list_1';	
	}elseif($layout  == 'grid'){
		$post_warp_class= 'grid_1';	
	}else{
		$post_warp_class= $featured_layout;	
	}
 
	if($list_layout=='list_2'){
 	 	$list_class =' rd_column_1_2 rd_desktop_1_2 rd_tablet_1_1 rd_phablet_1_1 rd_phone_1_1	';
	}else if($list_layout=='list_3'){
 	 	$list_class =' rd_column_1_3 rd_desktop_1_3 rd_tablet_1_1 rd_phablet_1_1 rd_phone_1_1	';
	}else if($list_layout=='list_4'){
 	 	$list_class =' rd_column_1_4 rd_desktop_1_4 rd_tablet_1_2 rd_phablet_1_1 rd_phone_1_1 ';
	}else{
 	 	$list_class =' rd_column_1_1 rd_desktop_1_4 rd_tablet_1_1 rd_phablet_1_1 rd_phone_1_1';
	}
	
	if($grid_layout=='grid_2'){
 	 	$grid_class =' rd_column_1_2 rd_desktop_1_2 rd_tablet_1_2 rd_phablet_1_2 rd_phone_1_2	';
	}else if($grid_layout=='grid_3'){
 	 	$grid_class =' rd_column_1_3 rd_desktop_1_3 rd_tablet_1_3 rd_phablet_1_2 rd_phone_1_2	';
	}else if($grid_layout=='grid_4'){
 	 	$grid_class =' rd_column_1_4 rd_desktop_1_4 rd_tablet_1_2 rd_phablet_1_2 rd_phone_1_2 ';
	}else if($grid_layout=='grid_5'){
 	 	$grid_class =' rd_column_1_5 rd_desktop_1_5 rd_tablet_1_3 rd_phablet_1_2 rd_phone_1_2	';
	}else if($grid_layout=='grid_6'){
 	 	$grid_class =' rd_column_1_6 rd_desktop_1_3 rd_tablet_1_3 rd_phablet_1_2 rd_phone_1_2	';
	}else if($grid_layout=='grid_7'){
 	 	$grid_class =' rd_column_1_7 rd_desktop_1_3 rd_tablet_1_3 rd_phablet_1_2 rd_phone_1_2	';
	} else if($grid_layout=='grid_8'){
 	 	$grid_class =' rd_column_1_8 rd_desktop_1_4 rd_tablet_1_4 rd_phablet_1_2 rd_phone_1_2	';
	}else{
 	 	$grid_class =' rd_column_1_1 ';
	}
 
 	 	

	if($layout  == 'list' ){
		$post_list_class= $list_class.' rd-post-group-flex';	
	}elseif($layout  == 'grid' ){
		$post_list_class= $grid_class.' rd-post-group-flex';	
	}else{
		$post_list_class='';	
	}
 
	$classes = array(
		'rez-portfolio',
 		'rez-portfolio-flex',
		'rd-post-all-warp',
		'rd-color-border',
		'rd_module_pagenavi',
		'rd-between-'.esc_attr($between),
 		'rd-portfolio-list-warp',
		'rd-'.$layout.'-'.$post_warp_class,
		'rd-'.$layout.'-warp',
 	);
		 
 	echo '<aside class="'.esc_attr(join( ' ', $classes )).'"  data-key="'.esc_attr($key).'">'; 
  
  	
		
		ssel_portfolio_title_tabs($option);	
		
 	 
		echo '<div class="rd-post-list-warp rd-post-gap-warp "  >';
		echo '<div class="rd-post-list  "  >';
 
			if($layout=='list'){
				 ssel_post_list_1($option);
				 
			}
			if($layout=='grid'){
				ssel_post_grid_1($option);
			}

			if($layout=='featured'){
 				if($featured_layout=='featured_1') ssel_post_featured_1($option);
				if($featured_layout=='featured_2') ssel_post_featured_2($option);
				if($featured_layout=='featured_3') ssel_post_featured_3($option); 
				if($featured_layout=='featured_4') ssel_post_featured_4($option);
				if($featured_layout=='featured_5') ssel_post_featured_5($option);
				if($featured_layout=='featured_6') ssel_post_featured_6($option);
				if($featured_layout=='featured_7') ssel_post_featured_7($option);
				if($featured_layout=='featured_8') ssel_post_featured_8($option);
				if($featured_layout=='featured_9') ssel_post_featured_9($option);
				if($featured_layout=='featured_10') ssel_post_featured_10($option);
				if($featured_layout=='featured_11') ssel_post_featured_11($option);
				if($featured_layout=='featured_12') ssel_post_featured_12($option);
				if($featured_layout=='featured_13') ssel_post_featured_13($option);
				if($featured_layout=='featured_14') ssel_post_featured_14($option);
				if($featured_layout=='featured_15') ssel_post_featured_15($option);
				if($featured_layout=='featured_16') ssel_post_featured_16($option);
				if($featured_layout=='featured_17') ssel_post_featured_17($option);
				if($featured_layout=='featured_18') ssel_post_featured_18($option);
				if($featured_layout=='featured_19') ssel_post_featured_19($option);
				if($featured_layout=='featured_20') ssel_post_featured_20($option);
				if($featured_layout=='featured_21') ssel_post_featured_21($option);
				if($featured_layout=='featured_22') ssel_post_featured_22($option);
				if($featured_layout=='featured_23') ssel_post_featured_23($option);
				if($featured_layout=='featured_24') ssel_post_featured_24($option);
				if($featured_layout=='featured_25') ssel_post_featured_25($option);
				if($featured_layout=='featured_26') ssel_post_featured_26($option);
				if($featured_layout=='featured_27') ssel_post_featured_27($option);
				if($featured_layout=='featured_28') ssel_post_featured_28($option);
				if($featured_layout=='featured_29') ssel_post_featured_29($option);
				if($featured_layout=='featured_30') ssel_post_featured_30($option);
				if($featured_layout=='featured_31') ssel_post_featured_31($option);
				if($featured_layout=='featured_32') ssel_post_featured_32($option);
				
			}
			 
  			
		echo '</div>';
		echo '</div>';

			if($more_posts == 'load_more'){
				ssel_load_more($option,'ssel_post_'.$post_warp_class);						
			}elseif($more_posts =="pagenavi"){
 				ssel_pagenavi(array('query'=> $query));  
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
  	$css.= ssel_more_posts_css($option,$item );
 
    
 
 
 	$css.=ssel_element_padding( $key,$option); 
 	 
   	$return['output']=  ob_get_clean();
  	$return['css']= $css;
	
	return !empty($out)? $return['output'] :$return;	
	
}
}
 
?>