<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Element
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
	$option[]= array( 
		"name"			=> esc_html__('Margin','ssel'),
 		"id"			=> "padding",
  		"desc"			=>  esc_html__('space around the entire','ssel'),
 		"group"			=>  esc_html__('Layout','ssel'),
 		"default"		=>  array( 
				"top"		=> 20,
				"left"		=> 20,
				"bottom"	=> 20,
				"right"		=> 20,
  						) ,  
 		"type"			=> "multi_options",
		
 		"options"		=>  ssel_multi_array_options('margin'),						
		  
	);	

 	

	$option[]= array( 
		"name"			=> esc_html__('CSS Animation','ssel'),
 		"id"			=> "cssanime",
		"desc"			=>  esc_html__('Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.','ssel'),
 		"group"			=>  esc_html__('Layout','ssel'),
		"type"			=> "select",
 		"options"		=>  sao_array_options('cssanime'),						
 	);	
	
  	$option[]= array( 
		"name"			=> esc_html__('Element ID','ssel'),
 		"id"			=> "element_id",
 		"group"			=>  esc_html__('Attribute','ssel'),
		"desc"			=>  esc_html__('Enter Column ID ,','ssel').'<a href="https://www.w3schools.com/tags/att_global_id.asp">'.esc_html__('Learn more','ssel').'</a>',
		"type"			=> "text",
		 
	);
	
	$option[]= array( 
		"name"			=> esc_html__('Element Custom Class','ssel'),
 		"id"			=> "custom_class",
 		"group"			=>  esc_html__('Attribute','ssel'),
		"desc"			=>  esc_html__('Enter Class ,','ssel'),
		"type"		=> "text",
 	); 	
	
$option[]= array( 
		"name"			=> esc_html__('مخفی در حالت موبایل','ssel'),
 		"id"			=> "hide_mobile",
  		"desc"			=>  esc_html__('اگر میخواهید این المنت در موبایل ها مخفی باشد این تیک را بزنید','ssel'),
 		"group"			=>  esc_html__('حالت موبایل','ssel'),
 		"type"			=> "checkbox",
		  
	);			 
	
	?>