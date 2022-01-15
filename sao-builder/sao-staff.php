<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																		Staff Member
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'sao_element_item_staff' ) ) {

add_filter('sao_element_item', 'sao_element_item_staff');
function sao_element_item_staff( $element ) {
 	
 	$element[]= array(
 		'name'			=> 	esc_html__('Staff Member','ssel'),
 		'id'			=> 'staff',
		'group'			=> esc_html__('Grafin','ssel'),
		'img'			=>  SSEL_DIR.'/admin/assets/images/element-staff.jpg',
  	); 
	return $element;
}  
 }
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																		Staff Member Options
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_staff_options' ) ) {

add_filter('sao_element_options_staff', 'ssel_staff_options');
function ssel_staff_options( $element ) {
	$option = array();
	 	
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
 		"group"			=>  esc_html__('Staff Style','ssel'),		  
	);		
 	$option[]= array( 
 		"group"			=>  esc_html__('Typography','ssel'),		  
	);	
 
	$option[]= array( 
 		"group"			=>  esc_html__('Attribute','ssel'),		  
	);							
	
	 
     	
   	include SSEL_PATH . '/sao-builder/staff/sao-staff-general.php'; 

	 
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
 		),						
				  
	);
	 	
 	include SSEL_PATH . '/sao-builder/staff/sao-staff-layout.php';
	include SSEL_PATH . '/sao-builder/general/sao-title-box.php'; 	 	
  	include SSEL_PATH . '/sao-builder/staff/sao-staff-style.php'; 
 	include SSEL_PATH . '/sao-builder/staff/sao-staff-typography.php'; 
 
  
   	include SSEL_PATH . '/sao-builder/general/sao-element.php';
	   
 
    return $option;
} 
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																		Staff Member Preview
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_builder_perview_staff' ) ) {
add_filter('sao_builder_perview_staff', 'ssel_builder_perview_staff');
function ssel_builder_perview_staff( $args ) {
	 
	
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

																		Staff Member Config
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_staff_config' ) ) {

add_filter('sao_builder_staff', 'ssel_staff_config');
function ssel_staff_config( $args ,$out = false ,$out_css=false) {
 
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
	
	$option['post_type']='staff';
	//Text Css
 
	$layout = ssel_data($option,'layout','list');
	$list_layout = ssel_data($option,'list_layout','list_1');
	$grid_layout = ssel_data($option,'grid_layout','grid_1');
	$featured_layout = ssel_data($option,'featured_layout','featured_1');
	$between = ssel_data($option,'between',ssel_option('blog_between'));


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
 		'rd-post-all-warp',
 		'rd-between-'.esc_attr($between),
 		'rd-staff-list-warp',
				'rd-color-border',

		'rd-'.$layout.'-'.$post_warp_class,
		'rd-'.$layout.'-warp',
 	);
		 
 	echo '<aside class="'.esc_attr(join( ' ', $classes )).'"  data-key="'.esc_attr($key).'">'; 
 		
 		
		ssel_blog_title_tabs($option);	
		
 	 
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
				
			}
		echo '</div>';
		echo '</div>';
			 
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
	$css.=ssel_social_icon_css( $option,$item);
	$css.=ssel_staff_position_css( $option,$item);
	$css.=ssel_excerpt_css( $option,$item);
 
    
 
 
 	$css.=ssel_element_padding( $key,$option); 
 	
 	
   	$return['output']=  ob_get_clean();
  	$return['css']= $css;
	
	return !empty($out)? $return['output'] :$return;	

	}
	}
 }
 
?>