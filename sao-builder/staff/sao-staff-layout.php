<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Staff Layout
																		
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
		"name"			=> esc_html__('Image Ratio','ssel'),
 		"id"			=> "ratio",
		"group"			=>  esc_html__('Layout','ssel'),
  		"default"		=>  'rd-ratio100',
		"type"			=> "select",
   		"options"		=>  ssel_array_options('ratio6'),						
 		
  	); 	 

	$option[]= array( 
		"name"			=> esc_html__('Image Width','ssel'),
 		"id"			=> "image_width",
 		"fold"			=>	array( 	
  			"list"				=> "layout",
   		), 		
		"group"			=>  esc_html__('Layout','ssel'),
  		"default"		=>  '',
		"type"			=> "select",
   		"options"		=>  array(
			"" 		=>	esc_html__('Default','ssel'),
			"5" 	=>	esc_html__('5%','ssel'),
			"10" 	=>	esc_html__('10%','ssel'),
			"15" 	=>	esc_html__('15%','ssel'),
			"20" 	=>	esc_html__('20%','ssel'),
			"25" 	=>	esc_html__('25%','ssel'),
			"30" 	=>	esc_html__('30%','ssel'),
			"35" 	=>	esc_html__('35%','ssel'),
			"40" 	=>	esc_html__('40%','ssel'),
			"45" 	=>	esc_html__('45%','ssel'),
			"50" 	=>	esc_html__('50%','ssel'),
			"55" 	=>	esc_html__('55%','ssel'),
			"60" 	=>	esc_html__('60%','ssel'),
			"65" 	=>	esc_html__('65%','ssel'),
			"70" 	=>	esc_html__('70%','ssel'),
 		)					
   	); 	 	
	
	$option[]= array( 
		"name"			=> esc_html__('Image Size','ssel'),
 		"id"			=> "image_size",
		"group"			=>  esc_html__('Layout','ssel'),
		"type"			=> "select",
  		"default"		=>  'full',
		"options" 		=>	ssel_all_image_sizes(),
 		 
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
 
	$option[]= array( 
		"name"			=> esc_html__('Caption Layout','ssel'),
 		"id"			=> "caption_layout", 
		"group"			=>  esc_html__('Layout','ssel'),
 		"fold"			=>	array( 	
  			"featured"				=> "layout",
    	), 		
 		"type"			=> "select",
		"options"			=>	array( 	
 				""			=> __('Default','ssel'),			
  				"middle"			=> __('Caption in Middle','ssel'),			
 				"bottom"			=> __('Caption in Bottom','ssel'),
   				"gradient-bottom"	=> __('Gradient Caption in Bottom','ssel'),	
  				"hover-middle"		=> __('Caption in Hover','ssel'),			
  				"hover-bottom"		=> __('Caption in Hover Bottom','ssel'),					
   				"hide"				=> __('Hide Caption','ssel'),			
   			),		 
		
  	); 	
	
	 	
	?>