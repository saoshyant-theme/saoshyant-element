<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																Post Module 1
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_module_1' ) ) {

function ssel_module_1($option){
	$post_type = ssel_data($option,'post_type');
	
	if($post_type=='post'){
		
		ssel_blog_module_1($option);		
		
	}elseif($post_type=='portfolio'){
		ssel_portfolio_module_1($option);
	
	}elseif($post_type=='product'){
		
		ssel_product_module_1($option);
	
	}elseif($post_type=='testimonial'){
		
		ssel_testimonial_module_1($option);
	
	}elseif($post_type=='staff'){
		
		ssel_staff_module_1($option);
	
	}  

}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																Box Layout Module 1
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_box_layout_module_1' ) ) {
function ssel_box_layout_module_1($option = false,$layout=false,$type='blog'){ 
 	 
 	$box_layout = ssel_data($option,'box_layout',ssel_option($type.'_box_layout'));
 	$class='';
	if($layout=='all-warp'){
		$class.= ' rd-box-layout-'.$box_layout;
	
	
		if($box_layout =='boxed-item' ){
  			$class.='  rd-between-title-box ';
 		
		}	
	 
	 	
 	}elseif($layout=='post'){
		$class.= ' rd-post-layout-'.$box_layout;
		
	 
  	}elseif($layout=='container'){
	 
	 if($box_layout =='boxed-all' ){
  			$class.='  rd-box-layout-none ' ;
 		
		} 
		if($box_layout =='boxed-item'  ){
  			$class.='  rd-box-layout-boxed  rd-auto-width-warp rd-all-padding ' ;
		
		}elseif($box_layout =='boxed-item-2'  ){
  			$class.='  rd-box-layout-boxed    ';
		
		}elseif($box_layout =='none'  ){
  			$class.=' rd-auto-width-warp rd-box-layout-none';
		
		}				
				
 	} elseif($layout=='details'){
		if($box_layout =='boxed-item-2'  ){
			$class.='   rd-details-boxed rd-auto-width-warp rd-all-padding   ' ;
		
		}
		if($box_layout =='boxed-details' || $box_layout =='boxed-details-2'  ){
			$class.='   rd-details-boxed rd-auto-width-warp  rd-all-padding rd-box-layout-boxed ' ;
		
		}
		if( $box_layout =='none' || $box_layout =='boxed-item' ){
 			$class.='  rd-text-boxed rd-padding-right ' ;
 		  
		}
		
	} elseif($layout=='pagenavi'){
		if($box_layout =='boxed-item' || $box_layout =='boxed-item-2' || $box_layout =='boxed-details' || $box_layout =='boxed-details-2'  ){
			$class.='  rd-box-layout-boxed ' ;
		
		}else{
			$class.='  rd-box-layout-none  ' ;
		
		}  
 				
 	}
 	return $class;
}
 }
 
?>