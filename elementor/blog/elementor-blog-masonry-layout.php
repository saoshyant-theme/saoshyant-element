<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Blog Layout
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////         
$this->start_controls_section(
	'layout_section',
	[
		'label' => __( 'Layout', 'ssel' ),
	]
);


  
	

$this->add_control(
	'layout',
	[
		'label' => __('Layout','ssel'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'default' => 'grid',
		"options"		=> [
 				"grid"	=> 'گریدی', 
				"featured"	=> 'ویژه', 
 			],
	]	 
);	 	
 
$this->add_control(
	'column',
	[
		'label' => __('Column Layout','ssel'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'default' => '3',
		
 		"options"		=> [
 				"2"	=> 2, 
				"3"	=> 3, 
				"4"	=> 4, 
				"5"	=> 5, 
				"5"	=> 5, 
				"6"	=> 6,
				"7"	=> 7, 
				"8"	=> 8, 
 			],
	]	 
);	  
  
$this->add_control(
	'between',
	[
		'label'			=> __('Space Between Item','ssel'),
		'type'			=> \Elementor\Controls_Manager::SELECT,
		'options'		=> [
			"" 				=>__('Default','ssel'),
			"0px" 	=> "0px",
			"2px" 	=> "2px",
  			"10px" 	=> "10px",
			"15px" 	=> "15px",
			"20px" 	=> "20px",
 			"30px" 	=> "30px",
			"40px" 	=> "40px",
			"60px" 	=> "60px",
 		]
	]
);	
	 

$this->add_control(
	'ratio',
	[
		'label'			=> __('Image Ratio','ssel'),
		'type' 			=> \Elementor\Controls_Manager::SELECT,
		'options'		=> ssel_array_options('ratio6'),
		  		"default"		=>  'rd-ratio-auto',

 	]
);	
	 	 
 	 
		 
$this->add_control(
	'image_size',
	[
		'label'			=> __('Image Size','ssel'),
		'type' 			=> \Elementor\Controls_Manager::SELECT,
		"options" 		=>	ssel_all_image_sizes(),
   	]
);			
	 	  
$this->add_control(
	'alignment',
	
	[
		'label'			=> __('Details Alignment','ssel'),
	'condition'	=> ['layout' => ['grid','featured']],
		
		'type' 			=> \Elementor\Controls_Manager::SELECT,
		"options" 		=>	 [ 
			'' 			=> 	__('Default','ssel'),
			'left'			=>   esc_html__('Left','ssel'),
			'center'		=>  esc_html__('Center','ssel'),
 			'right'			=>  esc_html__('Right','ssel'),						
			 
		]
  	]
);			
	 				  
  	  
$this->add_control(
	'box_layout',
	[
		'label'			=> __('Box Layout','ssel'),
		'type' 			=> \Elementor\Controls_Manager::SELECT,
	'condition'	=> ['layout' => ['grid' ]],
		"options" 		=>	[
			"" 				=>  esc_html__('Default','ssel'),
			"none"			=> esc_html__('None','ssel'),
 			"boxed-item" 		=> esc_html__('Boxed Item','ssel'),
			"boxed-item-2" 		=> esc_html__('Boxed Item 2','ssel'), 
			"boxed-details" 		=> esc_html__('Boxed Details','ssel'), 
			"boxed-details-2" 		=> esc_html__('Boxed Details 2','ssel'), 
 		]
		
	]
);	

$this->add_control(
	'caption_layout',
	[
		'label'			=> __('Caption Layout','ssel'),
		'type' 			=> \Elementor\Controls_Manager::SELECT,
		'condition'	=> ['layout' => 'featured'],
		"options" 		=>	[
				"" 				=>  esc_html__('Default','ssel'),
  				"middle"			=> __('Caption in Middle','ssel'),			
 				"bottom"			=> __('Caption in Bottom','ssel'),
   				"gradient-bottom"	=> __('Gradient Caption in Bottom','ssel'),	
  				"hover-middle"		=> __('Caption in Hover','ssel'),			
  				"hover-bottom"		=> __('Caption in Hover Bottom','ssel'),					
   				"hide"				=> __('Hide Caption','ssel'),		
 		]
		
	]
);			 

$this->add_responsive_control(
			'elementor_padding',
			[
				'label' => __( 'Margin', 'ssel' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => ssel_array_options('elementor_padding'),
 
				'default' =>  '0px',
 				'selectors' => [
					'{{WRAPPER}} .rd-elementor-item' => '  padding: {{VALUE}} ;',
				],
			]
); 
	 
	
							
	 	  
	 
 $this->end_controls_section();
	 	 
	?>