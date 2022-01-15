<?php 
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Prodcut Style
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
	$option[]= array( 
		"name"			=> esc_html__('Background Color','ssel'),
 		"id"			=> "background_color", 
   		"group"			=>  esc_html__('Product Style','ssel'),
 		"type"			=> "color_rgba", 
		
  	); 	
	$option[]= array( 
		"name"			=> esc_html__('Title Color','ssel'),
 		"id"			=> "title_color", 
   		"group"			=>  esc_html__('Product Style','ssel'),
 		"type"			=> "multi_options",
		"options"		=>	array( 	
				array( 
					"name"			=> __('Link Color','ssel'),			
					"id"			=> "link",
					"type"			=> "color",
				 ),
				array( 
					"name"			=> __('Hover Color','ssel'),			
					"id"			=> "hover",
					"type"			=> "color",
				 ),
		 	 				
			 ),
		
  	); 	
	 	
$option[]= array( 
		"name"			=> esc_html__('Price Color','ssel'),
 		"id"			=> "price_color",	 
   		"group"			=>  esc_html__('Product Style','ssel'),
		"type"			=> "multi_options",
 		"options"			=>	array( 	
		
			array( 
 				"name"			=> 	__('Main Color','ssel'),
 				"id"			=> "main",
  				"type"			=> "color",
 			),
 			array( 
				"name"			=> __('Sale Color','ssel'),			
  				"id"			=> "sale",
 				"type"			=> "color",
 			),
 			array( 
				"name"			=> __('Regular Color','ssel'),			
  				"id"			=> "regular",
 				"type"			=> "color",
 			), 
  		 							
		), 					
   	); 	
		
	$option[]= array( 
		"name"			=> esc_html__('Excerpt Color','ssel'),
 		"id"			=> "excerpt_color", 
 		"fold"			=>	array( 	
  			"1"				=> "excerpt",
   		), 		
   		"group"			=>  esc_html__('Product Style','ssel'),
 		"type"			=> "color", 
   	); 	 
		

	 
	$option[]= array( 
		"name"			=> esc_html__('Meta Color','ssel'),
 		"id"			=> "meta_color",
   		"group"			=>  esc_html__('Product Style','ssel'),
   		"type"			=> "color",
 	 	
   	); 	
	
	
	$option[]= array( 	"name"			=> esc_html__('Rating Color','ssel'),
						"id"			=> "rating_color",	 
   						"group"			=>  esc_html__('Product Style','ssel'),
 						"type"			=> "multi_options",
						"options"		=>	array( 	
 							array( 
								"name"			=> 	__('Rating','ssel'),
								"id"			=> "rating",
								"type"			=> "color_rgba",
							),
							array( 
								"name"			=> __('None Rating','ssel'),			
								"id"			=> "none",
								"type"			=> "color_rgba",
							),
							 
  		 							
						), 					
   				); 	 
						
	 
	$option[]= array( 
		"name"			=> esc_html__('Border Color','ssel'),
 		"id"			=> "border_color",
   		"group"			=>  esc_html__('Product Style','ssel'),
   		"type"			=> "color_rgba",
	); 
	
	
	
	$option[]= array( 
		"name"			=> esc_html__('Border Radius','ssel'),
 		"id"			=> "radius",
   		"group"			=>  esc_html__('Product Style','ssel'),
   		"type"			=> "select",
  		"options"		=>   ssel_array_options('radius_mini')
	); 					
	
		
	?>