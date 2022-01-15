<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Portfolio General
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  	$option[]= array( 
		"name"			=> esc_html__('Title Box','ssel'),
 		"id"			=> "title",
 		"default"		=> esc_html__('Title Box','ssel'),
 		"type"			=> "text",
 		   
	);
	$option[]= array( 
		"name"			=> esc_html__('Number of Posts to show','ssel'),
 		"id"			=> "number",
 		"default"			=> 5,
  		"type"			=> "number",
 		  
	);

	 
	$option[]= array( 
		"name"			=> esc_html__('Category','ssel'),
 		"id"			=> "multi_cats",
  		"type"			=> "multicheck",
 		"desc"			=> __('If you do not select a category, all categories will be placed','ssel'),
 		"options"		=>  ssel_array_options('portfolio_category'),						
 	); 
	
	$option[]= array( 
		"name"			=> esc_html__('Show Post Title','ssel'),
 		"id"			=> "post_title",
		"default"		=> 1,
 		"type"			=> "checkbox",
   	); 
	

	$option[]= array( 
		"name"			=> esc_html__('Limit Title length','ssel'),
 		"id"			=> "title_limit",
		"desc"			=>  esc_html__('example: "100"','ssel'),
 		"fold"			=>	array( 	
  			"1" 						=> "post_title",
   		), 	
   		"type"			=> "number",
   	); 
	
	
	$option[]= array( 
			"name"			=> esc_html__('Show Excerpt Posts','ssel'),
			"id"			=> "excerpt",
			"type"			=> "checkbox",
			"default"		=> 1,
		);
	
	$option[]= array( 
		"name"			=> esc_html__('Limit Excerpt length','ssel'),
 		"id"			=> "excerpt_limit",
 		"fold"			=>	array( 	
  			"1"				=> "excerpt",
   		), 
		"desc"			=>  esc_html__('example: "200"','ssel'),
   		"type"			=> "number",
   	); 
	
	$option[]= array( 
		"name"			=> esc_html__('Portfolio Meta','ssel'),
 		"id"			=> "meta",
  		"default"		=> array("meta_author"=>1,"meta_date"=>'1'),
    		"type"			=> "multi_options",
		"options"		=>  ssel_multi_array_options('meta_portfolio'),						
 	);  
	
	
	$option[]= array( 
		"name"			=> esc_html__('Show View More','ssel'),
		"id"			=> "viewmore",
		"type"			=> "checkbox",
		
   	);  
	
	?>