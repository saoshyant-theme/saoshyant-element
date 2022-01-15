<?php
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Testimonial Layout
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$option[]= array( 
		"name"			=> esc_html__('Space Between Item','ssel'),
 		"id"			=> "between",
 		"group"			=>  esc_html__('Layout','ssel'),
		"type"			=> "select",
  		"default"		=>  '',
		"options" 		=>	array(
			"" 	=>__('Default','ssel'),
			"0px" 	=> "0px",
			"2px" 	=> "2px",
  			"10px" 	=> "10px",
			"15px" 	=> "15px",
			"20px" 	=> "20px",
 			"30px" 	=> "30px",
			"40px" 	=> "40px",
			"60px" 	=> "60px",
 		 ),
  	);
	
   
	$option[]= array( 
		"name"			=> esc_html__('Box Layout','ssel'),
 		"id"			=> "box_layout",
		"group"			=>  esc_html__('Layout','ssel'),
 		"fold"			=>	array( 	
  			"grid"				=> "layout",
  			"list"				=> "layout",
   		), 		
		"type"			=> "select",
 		"options" 		=>	array(
			"" 				=>  esc_html__('Default','ssel'),
			"none"			=> esc_html__('None','ssel'),
 			"boxed-item" 		=> esc_html__('Boxed Item','ssel'),
    		 ),
  	); 		
 
 
	 	
	?>