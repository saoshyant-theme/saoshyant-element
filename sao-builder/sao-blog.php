<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Blog
																		
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'xxxxxxxxxxxxxx' ) ) {
add_filter('sao_element_item', 'sao_element_item_blog');
function sao_element_item_blog( $element ) {
 	
 	$element[]=  array(
 		'name'			=> 	esc_html__('Blog','ssel'),
 		'id'			=> 'blog',
		'group'			=> esc_html__('Grafin','ssel'),
   	); 
	
	return $element;
} 
 }
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Blog Options
																		
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_blog_options' ) ) {

add_filter('sao_element_options_blog', 'ssel_blog_options');
function ssel_blog_options( $option) {
 
   
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
   		 		
				  
	);
	 	
 	 
  	 
 
    return $option;
} 
 }
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Blog Preview
																		
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_builder_perview_blog' ) ) {

add_filter('sao_builder_perview_blog', 'ssel_builder_perview_blog');
function ssel_builder_perview_blog( $args ) {
	 
	
  		$key = $args['key'];
 		$option = $args['option'];
		$output='';
		$css='';
 		 
		$css.= '.sao-element-'.$key.' {text-align: center;}'; 
  	$return['css']= $css;
	$return['output']= $output;
	return $return;
}
}
  /*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Blog Config
																		
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_blog_config' ) ) {

add_filter('sao_builder_blog', 'ssel_blog_config');
function ssel_blog_config( $args, $out = false ,$out_css=false ) {
 
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
	
	$option['post_type']='post';
 	$more_posts = !empty($option['more_posts']) ?$option['more_posts'] : '';
	$layout = ssel_data($option,'layout','list');
	$list_layout = ssel_data($option,'list_layout','list_1');
	$grid_layout = ssel_data($option,'grid_layout','grid_1');
	$featured_layout = ssel_data($option,'featured_layout','featured_1');
	$between = ssel_data($option,'between',ssel_option('blog_between'));
   	$query = ssel_query($option,1);


	if($layout  == 'list' || $layout  == 'grid'){
		$post_list_class='rd-post-group-flex';	
	}else{
		$post_list_class='';	
	}
 
 
 	if($layout  == 'list'){
		$post_warp_class= $list_layout;	
	}elseif($layout  == 'grid'){
		$post_warp_class= $grid_layout;	
	}else{
		$post_warp_class= $featured_layout;	
	}
 
 	 
 	$classes = array(
 		'rd-ajax-tab',
		'rd-post-all-warp',
		'rd_module_pagenavi',
   		'rd-color-border',
		'rd-between-'.esc_attr($between),
 		'rd-blog-list-warp',
		'rd-'.$layout.'-'.$post_warp_class,
		'rd-'.$layout.'-warp',
 	);
		 
 	echo '<aside class="'.esc_attr(join( ' ', $classes )).'"  data-key="'.esc_attr($key).'">'; 
 		
 		
 	
		
		ssel_blog_title_tabs($option,'ssel_post_'.$post_warp_class);	
		
 	 
		echo '<div class="rd-post-list-warp rd-post-gap-warp"   >';
		echo '<div class="rd-post-list "  >';
 			
			if($layout=='list'){
				if($list_layout=='list_1') ssel_post_list_1($option);
				if($list_layout=='list_2') ssel_post_list_2($option);
				if($list_layout=='list_3') ssel_post_list_3($option); 
				if($list_layout=='list_4') ssel_post_list_4($option);
			}
			if($layout=='grid'){

 			if($grid_layout=='grid_1') ssel_post_grid_1($option);
				if($grid_layout=='grid_2') ssel_post_grid_2($option);
				if($grid_layout=='grid_3') ssel_post_grid_3($option);
				if($grid_layout=='grid_4') ssel_post_grid_4($option);
				if($grid_layout=='grid_5') ssel_post_grid_5($option);
				if($grid_layout=='grid_6') ssel_post_grid_6($option);
				if($grid_layout=='grid_7') ssel_post_grid_7($option);
				if($grid_layout=='grid_8') ssel_post_grid_8($option);
				if($grid_layout=='grid_9') ssel_post_grid_9($option);
				if($grid_layout=='grid_10') ssel_post_grid_10($option);
				if($grid_layout=='grid_11') ssel_post_grid_11($option);
				if($grid_layout=='grid_12') ssel_post_grid_12($option);
				if($grid_layout=='grid_13') ssel_post_grid_13($option);
				if($grid_layout=='grid_14') ssel_post_grid_14($option);
				if($grid_layout=='grid_15') ssel_post_grid_15($option);
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
  	$css.= ssel_readmore_css($option,$item );
  	$css.= ssel_more_posts_css($option,$item );
  	 
	  
 
 	$css.=ssel_element_padding( $key,$option); 
 	
	 	
   	$return['output']=  ob_get_clean();
  	$return['css']= $css;
	
	return !empty($out)? $return['output'] :$return;	
	
}
}
}
 
?>