<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Prodcut Typography
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$option[]= array( 
		"name"			=> esc_html__('Title Box Main Typography','ssel'),
 		"id"			=> "title_box_main_typo",
  		"group"			=>  esc_html__('Typography','ssel'),
		"type"			=> "multi_options",
		"options"		=>	ssel_multi_array_options('typo')
  	);   
	
 

	$option[]= array( 
		"name"			=> esc_html__('Title Box Typography','ssel'),
 		"id"			=> "title_box_tab_typo",
  		"group"			=>  esc_html__('Typography','ssel'),
		"type"			=> "multi_options",
		"options"		=>	ssel_multi_array_options('typo')
		
  	); 
  
	$option[]= array( 
		"name"			=> esc_html__('Post Title','ssel'),
 		"id"			=> "post_title_typo",
  		"group"			=>  esc_html__('Typography','ssel'),
		"type"			=> "multi_options",
		"options"		=>	ssel_multi_array_options('typo')
  	); 			
	
	$option[]= array( 
		"name"			=> esc_html__('Price Typography','ssel'),
 		"id"			=> "price_typo",
   		"group"			=>  esc_html__('Typography','ssel'),
		"type"			=> "multi_options",
		"options"		=>	ssel_multi_array_options('typo'),
 	);		
	
	$option[]= array( 
		"name"			=> esc_html__('Excerpt Typography','ssel'),
 		"id"			=> "excerpt_typo",
		"fold"			=>	array(  
			"1" 						=> "excerpt",
   		), 		
		"group"			=>  esc_html__('Typography','ssel'),
		"type"			=> "multi_options",
		"options"		=>	ssel_multi_array_options('typo'),
 		
  	); 		

	$option[]= array( 
		"name"			=> esc_html__('Meta Typography','ssel'),
 		"id"			=> "meta_typo",
		"type"			=> "multi_options",
  		"group"			=>  esc_html__('Typography','ssel'),
		"options"		=>	ssel_multi_array_options('typo'),
		
  	); 	