<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Post Module 2
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_module_2' ) ) {

function ssel_module_2($option,$excerpt=true){
	$post_type = ssel_data($option,'post_type');
 	if($post_type=='post'){
		
		ssel_blog_module_2($option,$excerpt  );		
		
	}elseif($post_type=='portfolio'){
		ssel_portfolio_module_2($option);
 	
	}elseif($post_type=='product'){
		
		ssel_product_module_2($option,$excerpt);
	
	}elseif($post_type=='testimonial'){
		
		ssel_testimonial_module_2($option,$excerpt);
	
	}  

	 elseif($post_type=='staff'){
		
		ssel_staff_module_2($option,$excerpt);
	
	} 
}
 }
  
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																Box Layout Module 2
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_box_layout_module_2' ) ) {
function ssel_box_layout_module_2($option = false,$layout=false,$type='blog'){ 
 	 
 	$box_layout = ssel_data($option,'box_layout',ssel_option($type.'_box_layout'));
 	$class='';
	if($layout=='all-warp'){
		
  		if($box_layout =='boxed-all' ){
  			$class.='  rd-box-layout-boxed rd-box-padding-'.$box_padding ;
 		
		} elseif($box_layout =='boxed-all-2' ){
			$class.=' rd-box-layout-boxed ';
		
		}
		$class.= ' rd-box-layout-'.$box_layout;
	
	
		if($box_layout =='boxed-item' ){
  			$class.='  rd-between-title-box ';
 		
		}	
	
	}
	 		
 	elseif($layout=='post'){
		$class.= ' rd-post-layout-'.$box_layout;
	
  	}elseif($layout=='container'){
		 
		if($box_layout =='boxed-item'  ){
  			$class.='  rd-box-layout-boxed  rd-box-layout-boxed-hover rd-auto-width-warp   rd-all-padding ' ;
		
		}elseif($box_layout =='boxed-item-2'  ){
  			$class.='  rd-box-layout-boxed rd-box-layout-boxed-hover  ';
		
		}elseif($box_layout =='none'  ){
  			$class.=' rd-box-layout-none  rd-auto-width-warp ';
		
		}				
				
 	} elseif($layout=='details'){
		if($box_layout =='boxed-item-2'  ){
			$class.='   rd-details-boxed rd-auto-width-warp rd-all-padding ' ;
		
		}
		if($box_layout =='boxed-details' || $box_layout =='boxed-details-2'  ){
			$class.='   rd-details-boxed  rd-box-layout-boxed rd-box-layout-boxed-hover  rd-all-padding ' ;
		
		}
		if( $box_layout =='boxed-item'  || $box_layout =='none' ){
			$class.='  rd-text-boxed rd-margin-top ' ;
		  
		}
		
			
	} elseif($layout=='pagenavi'){
		if($box_layout =='boxed-item' || $box_layout =='boxed-item-2' || $box_layout =='boxed-details' || $box_layout =='boxed-details-2'  ){
			$class.='  rd-box-layout-boxed rd-auto-width-warp   rd-all-padding  rd-color-border' ;
		
		}
		  
 				
 	}
 	return $class;
}
 }
?>