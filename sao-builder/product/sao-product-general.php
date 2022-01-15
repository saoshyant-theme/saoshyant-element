<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Prodcut General
																		
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
 		"options"		=>  ssel_array_options('product_cat'),						
 	);
		
	$option[]= array( 
		"name"			=> esc_html__('Orderby','ssel'),
 		"id"			=> "orderby",
  		"type"			=> "select",
		"options"		=>  ssel_array_options('product_orderby'),						
 	); 
	 
	 
 	$option[]= array( 
		"name"			=> esc_html__('Tabs','ssel'),
 		"id"			=> "tabs",
  		"desc"			=>  esc_html__('Add tabs','ssel'),
		"type"			=> "tabs",
 		"options"		=>  array(
			 array(
  				"name"		=>  esc_html__('Title','ssel'),
  				"id"		=> "title",
 				"type"		=> "text",
 			),
			array(
 				"name"			=> esc_html__('Category','ssel'),
 				"id"			=> "cats",
  				"type"			=> "select",
				"options"		=>  ssel_array_options('product_cat'),	
			),
			array(
  				"name"		=>  esc_html__('Orderby','ssel'),
  				"id"		=> "orderby",
 				"type"		=> "select",
				"options"	=>  ssel_array_options('product_orderby'),						
 			),  	
 		),
	);	  	 
	
	$option[]= array( 
		"name"			=> esc_html__('Limit Title length','ssel'),
 		"id"			=> "title_limit",
		"desc"			=>  esc_html__('example: "100"','ssel'),
 	
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
		"name"			=> esc_html__('Show Countdown Sale Timer','ssel'),
 		"id"			=> "countdown",
		"default"		=>  1,
   		"type"			=> "checkbox",
   	); 
	
	$option[]= array( 
		"name"			=> esc_html__('Show Category Meta','ssel'),
 		"id"			=> "meta_category",
		"type"			=> "checkbox",
  		"default"		=> 0,
		
   	);
 
	$option[]= array( 
		"name"			=> esc_html__('Show Rating','ssel'),
 		"id"			=> "rating",
		"default"		=>  1,
   		"type"			=> "checkbox",
   	); 
	
		$option[]= array( 
		"name"			=> esc_html__('Show Add to Cart','ssel'),
 		"id"			=> "addcart",
		"default"		=>  1,
   		"type"			=> "checkbox",
 	);	
	
	 ?>