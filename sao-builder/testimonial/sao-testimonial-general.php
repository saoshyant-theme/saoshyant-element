<?php
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Testimonial General
																		
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
 		"options"		=>  ssel_array_options('testimonial_category')						
 	); 
	
	$option[]= array( 
			"name"			=> esc_html__('Show Author Image','ssel'),
			"id"			=> "author_image",
	 		"default"		=> true,
 			"type"			=> "checkbox",
			
	);		
	$option[]= array( 
		"name"			=> esc_html__('Limit Quote length','ssel'),
 		"id"			=> "author_quote_limit",
 
		"desc"			=>  esc_html__('example: "200"','ssel'),
   		"type"			=> "number",
   	); 
	
	$option[]= array( 
		"name"			=> esc_html__('Author Quote Layout','ssel'),
 		"id"			=> "author_quote_layout", 
   		"type"			=> "select",
		"options"			=>	array( 	
 				""					=> __('Default','ssel'),			
  				"bottom"			=> __('in Bottom','ssel'),		 
  				"top"			=> __('in Top','ssel'),		 
   			),		 
		
  	); 
	$option[]= array( 
			"name"			=> esc_html__('Show Author Information','ssel'),
			"id"			=> "author_information",
	 		"default"		=> 1,
 			"type"			=> "checkbox",
			
	);
	$option[]= array( 
			"name"			=> esc_html__('Show Author Rating','ssel'),
			"id"			=> "author_rating",
 		
			"type"			=> "checkbox",
			
	);
 ?>