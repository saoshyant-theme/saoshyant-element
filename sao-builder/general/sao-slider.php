<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Slider
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 	 
	$option[]= array( 
		"name"			=> __('Pager','ssel'),
 		"id"			=> "pager",
		"default"		=>  1,
 		"group"			=>  __('Slider','ssel'),
  		"type"			=> "checkbox",
 	); 		
	$option[]= array( 
		"name"			=> __('Pager Style','ssel'),
 		"id"			=> "pager_style",
  		"group"			=> esc_html__('Slider','ssel'),
  		"fold"			=>  array("1"=>"pager"),
 		"type"			=> "multi_options",
		"options"			=>	array( 	
		
		array( 
 				"name"			=> 	__('Pager Color','ssel'),
 				"id"			=> "pager",
  				"type"			=> "color_rgba",
  			
 			), 	
  			array( 
				"name"			=> __('Active Color','ssel'),			
  				"id"			=> "pager_actvie",
				"type"			=> "color_rgba",
 			),

					
		 	 
		
		), 			
	 
	); 		 	 
	$option[]= array( 
		"name"			=>esc_html__('Arrows','ssel'),
 		"id"			=> "arrows",
 		"group"			=> esc_html__('Slider','ssel'),
		"default"		=>  1,
 
 		"type"			=> "checkbox",
 	); 		
	 
		
 	
 
	$option[]= array( 
		"name"			=> esc_html__('Arrow Layout','ssel'),
 		"id"			=> "arrow_layout", 
		"fold"			=>	array( 
			"1" => "arrows",
		),
   		"group"			=> esc_html__('Slider','ssel'),
 		"type"			=> "multi_options",
		"options"		=>	array( 	
  				array( 
					"name"			=> __('Arrow Laction','ssel'),
					"id"			=> "location",
					"type"			=> "select",
					"options"			=>	array( 	
						"" 				=>esc_html__('Default','ssel'),
						"slider-1" 				=>esc_html__('Location 1','ssel'),
						"slider-2" 				=>esc_html__('Location 2','ssel'),
						"slider-3" 				=>esc_html__('Location 3','ssel'), 	 
					),
				),	
 				array( 
					"name"			=> __('Layout','ssel'),			
					"id"			=> "layout",
					"type"			=> "select",
					"options"			=>	array( 	
							""				=> __('Default','ssel'),	
							"hover"			=> __('On Hover','ssel'),		 
							"fixed"			=> __('Fixed','ssel'),		 
						),
				),	
  				array( 
					"name"			=> __('Size','ssel'),			
					"id"			=> "size",
					"type"			=> "select",
					"options"			=>	array( 	
							""				=> __('Default','ssel'),	
							"hover"			=> __('Small','ssel'),		 
							"medium"		=> __('Medium','ssel'),		 
							"large"			=> __('Large','ssel'),		 
						),	
				),	
		 	 		
 		),	
		
  	); 	


	$option[]= array( 
		"name"			=> __('Arrow Color','ssel'),
 		"id"			=> "arrow_color",
		"fold"			=>	array( 
			"1" => "arrows",
		),
  		"group"			=> esc_html__('Slider','ssel'),
  		"type"			=> "multi_options",
		"options"			=>	array( 	
  			array( 
 				"name"			=> 	__('Background','ssel'),
 				"id"			=> "background",
  				"type"			=> "color_rgba",
  			
 			), 	
			
			array( 
				"name"			=> __('Arrow','ssel'),			
  				"id"			=> "text",
				"type"			=> "color_rgba",
 			),					
 		
		), 			
	 
	); 	
	 
	
	$option[]= array( 
		"name"			=>esc_html__('Auto Play','ssel'),
 		"id"			=> "auto",
 		"group"			=> esc_html__('Slider','ssel'),
  		"type"			=> "checkbox",
		"default"		=>  1,
	);
	
	$option[]= array( 
		"name"			=>esc_html__('Loop','ssel'),
 		"id"			=> "loop",
 		"group"			=> esc_html__('Slider','ssel'),
  		"type"			=> "checkbox",
		"default"		=>  1,
	);
	
	$option[]= array( 
		"name"			=>esc_html__('Animation Speed ,Default "2000"','ssel'),
 		"id"			=> "speed",
		"default"		=>  '2000',
 		"group"			=> esc_html__('Slider','ssel'),
 		"type"			=> "number",
   	); 	 
	
	$option[]= array( 
		"name"			=>esc_html__('Animation Pause Time','ssel'),
 		"id"			=> "pause",
 		"group"			=> esc_html__('Slider','ssel'),
		"default"		=>  '10000',
 		"type"			=> "number",
   		
  	); 	   	
	?>