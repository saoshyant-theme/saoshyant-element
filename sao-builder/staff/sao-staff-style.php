<?php 
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Staff Style
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$option[]= array( 
   		"group"			=>  esc_html__('Staff Style','ssel'),
 		"id"			=> "staff_style_heading",
   		"group"			=>  esc_html__('Staff Style','ssel'),
   		"type"			=> "heading",
   		 
	); 
 
	$option[]= array( 
		"name"			=> esc_html__('Background Color','ssel'),
 		"id"			=> "background_color", 
   		"group"			=>  esc_html__('Staff Style','ssel'),
 		"type"			=> "color_rgba", 
		
  	); 	


	
	
	$option[]= array( 
		"name"			=> esc_html__('Staff Member Title Color','ssel'),
 		"id"			=> "title_color", 
   		"group"			=>  esc_html__('Staff Style','ssel'),
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
		"name"			=> esc_html__('Description Color','ssel'),
 		"id"			=> "excerpt_color", 
 		"fold"			=>	array( 	
  			"1"				=> "excerpt",
   		), 		
   		"group"			=>  esc_html__('Staff Style','ssel'),
 		"type"			=> "color_rgba", 
   	); 	
	 
	
	$option[]= array( 
		"name"			=> esc_html__('Position Color','ssel'),
 		"id"			=> "staff_position_color", 
		"fold"			=>	array( 	
  			"1"				=> "staff_position",
   		), 	
   		"group"			=>  esc_html__('Staff Style','ssel'),
 		"type"			=> "color_rgba", 
		
  	); 	
		
		$option[]= array( 
		"name"			=> __('Icon Style','ssel'),
 		"id"			=> "icon_style",
   		"group"			=>  esc_html__('Staff Style','ssel'),
 		"type"			=> "select",
		"options"		=> array(
			"style-1" => esc_html__('Style 1: only icon','ssel'),
			"style-2" => esc_html__('Style 2: Boxed Icon','ssel'),
			"style-3" => esc_html__('Style 3: Boxed Original Color','ssel'),
		),						
	); 
 
 	$option[]= array( 
		"name"			=> __('Social Icon Color','ssel'),
 		"id"			=> "icon_color",
		"fold"			=>  array(
			'style-1'			=>'icon_style',
			'style-2'			=>'icon_style',
 		),		
   		"group"			=>  esc_html__('Staff Style','ssel'),
 		"type"			=> "color_rgba",
 	); 	
	

	
 	$option[]= array( 
		"name"			=> esc_html__('Border Color','ssel'),
 		"id"			=> "border_color",
   		"group"			=>  esc_html__('Staff Style','ssel'),
   		"type"			=> "color_rgba",
	); 
	
 	$option[]= array( 
		"name"			=> esc_html__('Border Radius','ssel'),
 		"id"			=> "radius",
   		"group"			=>  esc_html__('Staff Style','ssel'),
   		"type"			=> "select",
  		"options"		=>   ssel_array_options('radius_mini')
	); 					

$option[]= array( 
		"name"			=> esc_html__('Image And Caption Style','ssel'),
 		"id"			=> "caption_style_heading",
   		"group"			=>  esc_html__('Staff Style','ssel'),
		
 		"type"			=> "heading",
   		 
	); 	
	
	$option[]= array( 
		"name"			=> __('Hover Image Effect','ssel'),
 		"id"			=> "image_effect",
 		"type"			=> "select",
   		"group"			=>  esc_html__('Staff Style','ssel'),
 		"options"		=>  ssel_array_options('hover_image'),						
  	);		
	
	$option[]= array( 
		"name"			=> esc_html__('Image Border Radius','ssel'),
 		"id"			=> "image_radius",
   		"group"			=>  esc_html__('Staff Style','ssel'),
   		"type"			=> "select",
  		"options"		=>   ssel_array_options('radius')
	); 		
	
	
	$option[]= array( 
		"name"			=> __('Caption Background Effect','ssel'),
 		"id"			=> "caption_effect",
 		"type"			=> "select",
   		"group"			=>  esc_html__('Staff Style','ssel'),
  		"options"		=>   ssel_array_options('caption_effect')
  	);
  	
 	$option[]= array( 
		"name"			=> esc_html__('Caption Background Color','ssel'),
 		"id"			=> "caption_background_color", 
   		"group"			=>  esc_html__('Staff Style','ssel'),
 		"type"			=> "color_rgba", 
   	); 	
 	$option[]= array( 
		"name"			=> esc_html__('Caption Color','ssel'),
 		"id"			=> "caption_color", 
   		"group"			=>  esc_html__('Staff Style','ssel'),
 		"type"			=> "color_rgba", 
   	); 		
	
	?>