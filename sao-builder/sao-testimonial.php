<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																		Testimonial
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'sao_element_item_testimonial' ) ) {

add_filter('sao_element_item', 'sao_element_item_testimonial');
function sao_element_item_testimonial( $element ) {
 	
 	$element[]=  array(
 		'name'			=> 	esc_html__('Testimonials','ssel'),
 		'id'			=> 'testimonial',
		'group'			=> esc_html__('Grafin','ssel'),
		'img'			=>  SSEL_DIR.'/admin/assets/images/element-testimonial.jpg',
  	); 
	
	return $element;
}  
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																		Testimonial Options
																		 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_testimonial_options' ) ) {

add_filter('sao_element_options_testimonial', 'ssel_testimonial_options');
function ssel_testimonial_options( $option ) {
 
	
	$option[]= array(	"group"			=>  esc_html__('General','ssel'),		  
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

																		Testimonial Preview
																		 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_builder_perview_testimonial' ) ) {

add_filter('sao_builder_perview_testimonial', 'ssel_builder_perview_testimonial');
function ssel_builder_perview_testimonial( $args ) {
	 
	
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

																		Testimonial Config
																		 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_testimonial_config' ) ) {

add_filter('sao_builder_testimonial', 'ssel_testimonial_config');
function ssel_testimonial_config( $args,$out = false ,$out_css=false ) {
 
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
	$list_layout = ssel_data($option,'list_layout','list_1');
	$grid_layout = ssel_data($option,'grid_layout','grid_1');
 	$between = ssel_data($option,'between',ssel_option('blog_between'));
   
	 
	 
 	$classes = array(
 		'rd-post-all-warp',
		'rd-color-border', 
  		'rd-between-'.esc_attr($between),
 		'rd-testimonial-list-warp',
 		'rd-'.$layout.'-warp',
 	);
 	echo '<aside class="'.esc_attr(join( ' ', $classes ) ).'"   >'; 
 	 
 	 
 	 
		echo '<div class="rd-post-list-warp rd-post-gap-warp  "  >';
			echo '<div class="rd-post-list    rd-post-group-flex "  >';
 
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
				}  			 
  			
		 	echo '</div>';
		 echo '</div>';

			 	
			
	echo '</aside>';	
	
 	$item = 'body .sao-element-'.$key.' ';
 
	$css.= ssel_box_css($option,$item);
 	$css.= ssel_image_css($option,$item );	
   	$css.= ssel_testimonial_author_name_css($option,$item);
  	$css.= ssel_testimonial_author_information_css($option,$item);
  	$css.= ssel_testimonial_author_rating_css($option,$item);
  	$css.= ssel_testimonial_author_quote_css($option,$item);
  	 
  
 	$css.=ssel_element_padding( $key,$option); 
 	
 
   	$return['output']=  ob_get_clean();
  	$return['css']= $css;
	
	return !empty($out)? $return['output'] :$return;	

}
}
 }
 
?>