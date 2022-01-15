<?php 

 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Testimonial Style
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$option[]= array( 
		"name"			=> esc_html__('Background Color','ssel'),
 		"id"			=> "background_color", 
   		"group"			=>  esc_html__('Testimonial Style','ssel'),
 		"type"			=> "color_rgba", 
		
  	); 	
	$option[]= array( 
		"name"			=> esc_html__('Auhtor Name Color','ssel'),
 		"id"			=> "author_name_color", 
   		"group"			=>  esc_html__('Testimonial Style','ssel'),
 		"type"			=> "color",
		 
  	); 	
 
	//Details
	$option[]= array( 
		"name"			=> esc_html__('Author Quote Color','ssel'),
 		"id"			=> "author_quote_color", 
   		"group"			=>  esc_html__('Testimonial Style','ssel'),
 		"type"			=> "color_rgba", 
   	); 	
	

	$option[]= array( 
		"name"			=> esc_html__('Author Information Color','ssel'),
 		"id"			=> "author_information_color", 
		"fold"			=>	array( 	
  			"1"				=> "author_information",
   		), 	
   		"group"			=>  esc_html__('Testimonial Style','ssel'),
 		"type"			=> "color_rgba", 
		
  	); 	
	
	
	$option[]= array( 
		"name"			=> esc_html__('Author Rating Color','ssel'),
 		"id"			=> "author_rating_color", 
		"fold"			=>	array( 	
  			"1"				=> "author_rating",
   		), 	
		"type"			=> "multi_options",
		
   		"group"			=>  esc_html__('Testimonial Style','ssel'),
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
   		"group"			=>  esc_html__('Testimonial Style','ssel'),
   		"type"			=> "color_rgba",
	); 
	
	
	
	$option[]= array( 
		"name"			=> esc_html__('Border Radius','ssel'),
 		"id"			=> "radius",
   		"group"			=>  esc_html__('Testimonial Style','ssel'),
   		"type"			=> "select",
  		"options"		=>   ssel_array_options('radius_mini')
	); 					
	

	$option[]= array( 
		"name"			=> esc_html__('Image','ssel'),
 		"id"			=> "caption_style_heading",
   		"group"			=>  esc_html__('Testimonial Style','ssel'),
 		"type"			=> "heading",
   		 
	); 	
	
	
	$option[]= array( 
		"name"			=> esc_html__('Image Border Radius','ssel'),
 		"id"			=> "image_radius",
   		"group"			=>  esc_html__('Testimonial Style','ssel'),
   		"type"			=> "select",
  		"options"		=>   ssel_array_options('radius')
	); 		
		
	?>