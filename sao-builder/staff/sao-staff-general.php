<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Staff General
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
   	$option[]= array( 
		"name"			=> esc_html__('Number of Posts to show','ssel'),
 		"id"			=> "number",
 		"default"			=> 3,
  		"type"			=> "number",
 		  
	);

	 
	$option[]= array( 
		"name"			=> esc_html__('Category','ssel'),
 		"id"			=> "cats",
  		"type"			=> "select",
 		"desc"			=> __('If you do not select a category, all categories will be placed','ssel'),
 		"options"		=>  ssel_array_options('staff_category')						
 	); 
	
$option[]= array( 
			"name"			=> esc_html__('Show Description','ssel'),
			"id"			=> "excerpt",
			"type"			=> "checkbox",
			
		);
	
	$option[]= array( 
		"name"			=> esc_html__('Limit Description length','ssel'),
 		"id"			=> "excerpt_limit",
 		"fold"			=>	array( 	
  			"1"				=> "excerpt",
   		), 
		"desc"			=>  esc_html__('example: "200"','ssel'),
   		"type"			=> "number",
   	); 
	$option[]= array( 
			"name"			=> esc_html__('Show Staff Member Position','ssel'),
			"id"			=> "staff_position",
	 		"default"		=> 1,
 			"type"			=> "checkbox",
			
		);
	 $option[]= array( 
			"name"			=> esc_html__('Show Staff Social Icon','ssel'),
			"id"			=> "social_icon",
	 		"default"		=> 1,
 			"type"			=> "checkbox",
			
		); 
	 
 
 ?>