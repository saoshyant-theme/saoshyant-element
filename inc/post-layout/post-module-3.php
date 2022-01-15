<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Post Module 3
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_module_2' ) ) {

function ssel_module_3($option){
	$post_type = ssel_data($option,'post_type');
	if($post_type=='product'){
		ssel_blog_module_3($option);
	
	}elseif($post_type=='portfolio'){
		ssel_portfolio_module_3($option);
	
	}elseif($post_type=='post'){
		ssel_blog_module_3($option);
	} elseif($post_type=='sao_slide'){
		ssel_slider_module_3($option);
	}
	 elseif($post_type=='staff'){
		ssel_staff_module_3($option);
	}

}
   
 }
?>