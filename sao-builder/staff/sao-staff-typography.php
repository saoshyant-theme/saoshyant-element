<?php
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Staff Typography
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$option[]= array( 
		"name"			=> esc_html__('Post Title Typography','ssel'),
 		"id"			=> "title_typo",
  		"group"			=>  esc_html__('Typography','ssel'),
		"type"			=> "multi_options",
		"options"		=>	ssel_multi_array_options('typo')
  	); 			
	
	$option[]= array( 
		"name"			=> esc_html__('Description Typography','ssel'),
 		"id"			=> "excerpt_typo",
 		"fold"			=>	array( 	
  			"1"				=> "excerpt",
   		), 		
		"group"			=>  esc_html__('Typography','ssel'),
		"type"			=> "multi_options",
		"options"		=>	ssel_multi_array_options('typo'),
 		
  	); 		

	$option[]= array( 
		"name"			=> esc_html__('Position Typography','ssel'),
 		"id"			=> "staff_position_typo",
 		
		"group"			=>  esc_html__('Typography','ssel'),
		"type"			=> "multi_options",
		"options"		=>	ssel_multi_array_options('typo'),
 		
  	);
	
	 