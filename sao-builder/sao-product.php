<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																		Product
																		
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'sao_element_item_product' ) ) {

add_filter('sao_element_item', 'sao_element_item_product');
function sao_element_item_product( $element ) {
 	
 	$element[]= array(
 		'name'			=> 	esc_html__('Product','ssel'),
 		'id'			=> 'product',
		'group'			=> esc_html__('Grafin','ssel'),
		'img'			=>  SSEL_DIR.'/admin/assets/images/element-product.jpg',
  	); 
			
	return $element;
}  
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																		Product Options
																		
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_product_options' ) ) {

add_filter('sao_element_options_product', 'ssel_product_options');
function ssel_product_options( $option ) {
	 
				
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
 		"group"			=>  esc_html__('Product Style','ssel'),		  
	);		
  	
	$option[]= array( 
 		"group"			=>  esc_html__('Typography','ssel'),		  
	);	
	$option[]= array( 
 		"group"			=>  esc_html__('Attribute','ssel'),		  
	);							
	
	 
     	
   	include SSEL_PATH . '/sao-builder/product/sao-product-general.php'; 

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
 			"grid_8"	=> SSEL_DIR.'/admin/assets/images/grid/grid_8.jpg',
 			"grid_9"	=> SSEL_DIR.'/admin/assets/images/grid/grid_9.jpg',
 			"grid_10"	=> SSEL_DIR.'/admin/assets/images/grid/grid_10.jpg',
 			"grid_11"	=> SSEL_DIR.'/admin/assets/images/grid/grid_11.jpg',
 			"grid_12"	=> SSEL_DIR.'/admin/assets/images/grid/grid_12.jpg',
 			"grid_13"	=> SSEL_DIR.'/admin/assets/images/grid/grid_13.jpg',
 			"grid_14"	=> SSEL_DIR.'/admin/assets/images/grid/grid_14.jpg',
 			"grid_15"	=> SSEL_DIR.'/admin/assets/images/grid/grid_15.jpg',
 		),						
				  
	); 
	 
	 	
 	include SSEL_PATH . '/sao-builder/product/sao-product-layout.php'; 
	include SSEL_PATH . '/sao-builder/general/sao-title-box.php'; 
 	include SSEL_PATH . '/sao-builder/product/sao-product-style.php'; 
 	include SSEL_PATH . '/sao-builder/product/sao-product-typography.php'; 
   	include SSEL_PATH . '/sao-builder/general/sao-element.php';
  	 
 
    return $option;
} 
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																		Product Preview
																		
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_builder_perview_product' ) ) {

add_filter('sao_builder_perview_product', 'ssel_builder_perview_product');
function ssel_builder_perview_product( $args ) {
	 
	
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
			 
		}
		$css.= '.sao-element-'.$key.' {text-align: center;}'; 
  	$return['css']= $css;
	$return['output']= $output;
		return $return;
}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																		Product Config
																		
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_product_config' ) ) {

add_filter('sao_builder_product', 'ssel_product_config');
function ssel_product_config( $args,$out = false ,$out_css=false) {
 
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
	
	$option['post_type']='product';
	//Text Css
 	$more_posts = !empty($option['more_posts']) ?$option['more_posts'] : '';

	$layout = ssel_data($option,'layout','list');
	$list_layout = ssel_data($option,'list_layout','list_1');
	$grid_layout = ssel_data($option,'grid_layout','grid_1');
	$between = ssel_data($option,'between',ssel_option('product_between'));
   
	
 
  	$query = ssel_query($option,1);
	 
 
 	if($layout  == 'list'){
		$post_warp_class= $list_layout;	
	}elseif($layout  == 'grid'){
		$post_warp_class= $grid_layout;	
	} 
 	 
 	$classes = array(
 		'rd-ajax-tab',
		'rd-post-all-warp',
		'rd_module_pagenavi',
		'rd-color-border',
 		'rd-between-'.esc_attr($between),
 		'rd-product-list-warp',
		'rd-'.$layout.'-'.$post_warp_class,
		'rd-'.$layout.'-warp',
 	);
		 
 	echo '<aside class="'.esc_attr(join( ' ', $classes )).'"  data-key="'.esc_attr($key).'">'; 
 		
 		
 		  
		
		ssel_product_title_tabs($option,'ssel_post_'.$post_warp_class);	
		
 	 
		echo '<div class="rd-post-list-warp rd-post-gap-warp "   >';
		echo '<div class="rd-post-list rd-post-group-flex "  >';
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
  	$css.= ssel_image_css($option,$item);
   	$css.= ssel_title_box_css($option,$item);
	$css.= ssel_post_title_css($option,$item);
	$css.= ssel_price_css($option,$item);
 	$css.= ssel_excerpt_css($option,$item);
  	$css.= ssel_countdown_css($option,$item);
 	$css.= ssel_product_category_css($option,$item);
 	$css.= ssel_product_rating_css($option,$item);
 	$css.= ssel_sale_css($option,$item);
   	$css.= ssel_cart_button_css($option,$item);
  	$css.= ssel_more_posts_css($option,$item );
	
	
 	$css.=ssel_element_padding( $key,$option); 
 	
	 	
   	$return['output']=  ob_get_clean();
  	$return['css']= $css;
	
	return !empty($out)? $return['output'] :$return;	

}
}
 }
 
?>