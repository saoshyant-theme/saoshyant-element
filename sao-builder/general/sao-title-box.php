<?php
  /*****************************************************************************************************************************************************
******************************************************************************************************************************************************

														Title Box 
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
  	//Layout
	$option[]= array( 
		"name"			=> esc_html__('Title Box Display','ssel'),
 		"id"			=> "title_box_type",
		"group"			=>	esc_html__('Title Box','ssel'),
		"default"		=>  'left',
		"type"			=> "select",
		"options"		=>  array( 
			''				=> __('Default','ssel'),			
			'main-right'		=> __('Only Main Title Right','ssel'),
			'main-center'	=> __('Only Main Title Center','ssel'),
  			'main-tabs'		=> __('Main Title and Tabs Right','ssel'),
 			'tabs-center'	=> __('All Tabs Center','ssel'),			
 			'hide'			=> __('Hide','ssel'),			
 		),					
 	);
	
		
  	$option[]= array( 
		"name"			=>	esc_html__('Title For All Tab','ssel'),
 		"id"			=> "title_box_all",
		"fold"			=>	array( 	
 			'main-tabs'			=> "title_box_type", 
  		), 	
  		"group"			=>  esc_html__('Title Box','ssel'),
		"default"		=>   __('All','ssel'),
  		"type"			=> "text",
	);
	
		
 
$option[]= array( 
		"name"			=> esc_html__('Title Box Style','ssel'),
 		"id"			=> "title_box_style",	
   		"group"			=>  esc_html__('Title Box','ssel'),
		"type"			=> "select",
		"options"		=> array(
			''=> esc_html__('Default','ssel'),
 			'style-1'			=> esc_html__('Style 1:none','ssel'),
 			'style-2'			=> esc_html__('style 2:mini Border Bottom','ssel'),
			'style-3'			=> esc_html__('Style 3:Border Bottom','ssel'),
			'style-4'			=> esc_html__('Style 4:Border Top Button','ssel'),
			'style-5'			=> esc_html__('style 5:Border Middle','ssel'),
			'style-6'			=> esc_html__('style 6:Border Cover','ssel'),
 			'style-7'			=> esc_html__('Style 7:Background','ssel'),
			 
		),
	); 		
	
  	$option[]= array( 
		"name"			=> esc_html__('Main Title Color','ssel'),
 		"id"			=> "title_box_main_color",	
   		"group"			=>  esc_html__('Title Box','ssel'),
		"type"			=> "multi_options",		
 		"options"			=>	array( 	
		 
 			array( 
				"name"			=> __('Background Color','ssel'),			
  				"id"			=> "background",
				 "fold"			=>	array( 	
						"style-7"					=> "title_box_style",
 				), 
				"type"			=> "color_rgba",
 			),
 			array( 
 				"name"			=> 	__('Text Color','ssel'),
 				"id"			=> "text",
				"type"			=> "color_rgba",
				 	
  			 
  			) 	
		),						
 		 
   	); 		 
	
  	$option[]= array( 
		"name"			=> esc_html__('Tab Item Color','ssel'),
 		"id"			=> "title_box_tab_color",	
   		"group"			=>  esc_html__('Title Box','ssel'),
		"type"			=> "multi_options",
 		"options"			=>	array( 	
		 
 			array( 
				"name"			=> __('Background Color','ssel'),			
  				"id"			=> "background",
				 "fold"			=>	array( 	
						"style-7"					=> "title_box_style",
 				), 			
				"type"			=> "color_rgba",
 			),
 			array( 
 				"name"			=> 	__('Text Color','ssel'),
 				"id"			=> "text",
				"type"			=> "color_rgba",
				 	
  			 
  			) 	
		),							
   	); 		
	 
	$option[]= array( 
		"name"			=> esc_html__('Tab Active Color','ssel'),
 		"id"			=> "title_box_active_color",
   		"group"			=>  esc_html__('Title Box','ssel'),
		"type"			=> "multi_options",
 		"options"			=>	array( 	
		 
 			array( 
				"name"			=> __('Background Color','ssel'),			
  				"id"			=> "background",
				"fold"			=>	array( 	
						"style-7"					=> "title_box_style",
 				), 				
				"type"			=> "color_rgba",
 			),
 			array( 
 				"name"			=> 	__('Text Color','ssel'),
 				"id"			=> "text",
				"type"			=> "color_rgba",
				 	
  			 
  			) 	
		),							
   	); 	
	
	$option[]= array( 
		"name"			=> esc_html__('Title Box Border Color','ssel'),
 		"id"			=> "title_box_border_color",
   		"group"			=>  esc_html__('Title Box','ssel'),
		 "fold"			=>	array( 	
						"style-2"					=> "title_box_style",
						"style-3"					=> "title_box_style",
						"style-4"					=> "title_box_style", 
						"style-5"					=> "title_box_style", 
				), 			
  		"type"			=> "color_rgba",	 		
    ); 		

	$option[]= array( 	"name"			=> esc_html__('Title box Radius','ssel'),
						"id"			=> "title_box_radius",
   						"group"			=>  esc_html__('Title Box','ssel'),
						"fold"			=>	array( 	
							"style-6"					=> "title_box_style",
							"style-7"					=> "title_box_style",
 						), 
						"type"		=> "select",
						"options"	=>  ssel_array_options('radius'),
 				); 	 	
 
	?>