<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Blog Masonry Layout
																		
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 	
	$option[]= array( 
		"name"			=> esc_html__('Space Between Item','ssel'),
 		"id"			=> "between",
 		"group"			=>  esc_html__('Layout','ssel'),
		"type"			=> "select",
		"fold"			=>	array( 	
  			"grid"				=> "layout",
   		), 		
		
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
		"fold"			=>	array( 	
  			"grid"				=> "layout",
   		), 		
 		"group"			=>  esc_html__('Layout','ssel'),
  		"default"		=>  'rd-ratio-auto',
		"type"			=> "select",
   		"options"		=>  ssel_array_options('ratio6'),						
 		
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
		'name'			=> esc_html__('Details Alignment','ssel'),
 		'id'			=> 'alignment',
 		"fold"			=>	array( 	
  			"grid"				=> "layout",
  			"featured"				=> "layout",
   		), 	
		"group"			=>  esc_html__('Layout','ssel'),
 		'type'			=> 'select',
		'options'		=>  array( 
			'' 			=> 	__('Default','ssel'),
			'left'			=>  is_rtl()? esc_html__('Right','ssel'): esc_html__('Left','ssel'),
			'center'		=>  esc_html__('Center','ssel'),
 			'right'			=>  is_rtl()? esc_html__('Left','ssel'):esc_html__('Right','ssel'),						
			 
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
			"boxed-item-2" 		=> esc_html__('Boxed Item 2','ssel'), 
			"boxed-details" 		=> esc_html__('Boxed Details','ssel'), 
			"boxed-details-2" 		=> esc_html__('Boxed Details 2','ssel'), 
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