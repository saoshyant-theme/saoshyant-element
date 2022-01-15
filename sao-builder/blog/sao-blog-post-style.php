<?php 
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Blog Post Style
																		
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 	
	
	$option[]= array( 
		"name"			=> esc_html__('Post Style','ssel'),
 		"id"			=> "post_style_heading",
		
   		"group"			=>  esc_html__('Post Style','ssel'),
		
  		"type"			=> "heading",
   		 
	); 
	
	$option[]= array( 
		"name"			=> esc_html__('Background Color','ssel'),
 		"id"			=> "background_color", 
   		"group"			=>  esc_html__('Post Style','ssel'),
 		"type"			=> "color_rgba", 
		
  	); 	
	$option[]= array( 
		"name"			=> esc_html__('Title Color','ssel'),
 		"id"			=> "title_color", 
   		"group"			=>  esc_html__('Post Style','ssel'),
 		"type"			=> "multi_options",
		"options"		=>	array( 	
				array( 
					"name"			=> __('Link Color','ssel'),			
					"id"			=> "link",
					"type"			=> "color_rgba",
				 ),
				array( 
					"name"			=> __('Hover Color','ssel'),			
					"id"			=> "hover",
					"type"			=> "color_rgba",
				 ),
		 	 				
			 ),
		
  	); 	
	 	
	$option[]= array( 
		"name"			=> esc_html__('Excerpt Color','ssel'),
 		"id"			=> "excerpt_color", 
 		"fold"			=>	array( 	
  			"1"				=> "excerpt",
   		), 		
   		"group"			=>  esc_html__('Post Style','ssel'),
 		"type"			=> "color_rgba", 
   	); 	 
		

	 
	$option[]= array( 
		"name"			=> esc_html__('Meta Color','ssel'),
 		"id"			=> "meta_color",
   		"group"			=>  esc_html__('Post Style','ssel'),
   		"type"			=> "color_rgba",
 	 	
   	); 	
	
	$option[]= array( 
		"name"			=> esc_html__('Border Color','ssel'),
 		"id"			=> "border_color",
   		"group"			=>  esc_html__('Post Style','ssel'),
   		"type"			=> "color_rgba",
	); 
	
	$option[]= array( 
		"name"			=> esc_html__('Border Radius','ssel'),
 		"id"			=> "radius",
   		"group"			=>  esc_html__('Post Style','ssel'),
   		"type"			=> "select",
  		"options"		=>   ssel_array_options('radius_mini')
	); 
	
 	
	$option[]= array( 
		"name"			=> esc_html__('Image And Caption Style','ssel'),
 		"id"			=> "caption_style_heading",
   		"group"			=>  esc_html__('Post Style','ssel'),
		
 		"type"			=> "heading",
   		 
	); 	
	
	$option[]= array( 
		"name"			=> __('Hover Image Effect','ssel'),
 		"id"			=> "image_effect",
 		"type"			=> "select",
   		"group"			=>  esc_html__('Post Style','ssel'),
 		"options"		=>  ssel_array_options('hover_image'),						
  	);		
	
	$option[]= array( 
		"name"			=> __('Caption Background Effect','ssel'),
 		"id"			=> "caption_effect",
 		"type"			=> "select",
   		"group"			=>  esc_html__('Post Style','ssel'),
  		"options"		=>   ssel_array_options('caption_effect')
  	);
  	
 	$option[]= array( 
		"name"			=> esc_html__('Caption Background Color','ssel'),
 		"id"			=> "caption_background_color", 
   		"group"			=>  esc_html__('Post Style','ssel'),
 		"type"			=> "color_rgba", 
   	); 	
 	$option[]= array( 
		"name"			=> esc_html__('Caption Color','ssel'),
 		"id"			=> "caption_color", 
   		"group"			=>  esc_html__('Post Style','ssel'),
 		"type"			=> "color_rgba", 
   	); 		
						
	
		
	?>