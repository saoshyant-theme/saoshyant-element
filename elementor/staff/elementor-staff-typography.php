<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Blog Typography
																		
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 	
 $this->start_controls_section(
			'typography',
			array(
				'label' => __('تایپوگرافی نوشته ها','ssel'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				
 			)
		);
  
  


$this->add_control(
	'post_title_typo',
			[
				'label' => __('تایپوگرافی برای عنوان نوشته ها','ssel'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
 
  
$this->add_control(
	'post_title_font_size',
	[
		'label'			=>__('Font Size','ssel'),
		'type'			=> \Elementor\Controls_Manager::NUMBER ,
   	]
); 

$this->add_control(
	'post_title_font_weight',
	[
		'label'			=>__('Font Weight','ssel'),
		'type'			=> \Elementor\Controls_Manager::SELECT ,
		'options'		=> ssel_array_options('font_weight'),
    	]
); 		
		
		
$this->add_control(
	'excerpt_typo',
			[
				'label' => __('Description Typography','ssel'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
 
  
$this->add_control(
	'excerpt_font_size',
	[
		'label'			=>__('Font Size','ssel'),
		'type'			=> \Elementor\Controls_Manager::NUMBER ,
   	]
); 

$this->add_control(
	'excerpt_font_weight',
	[
		'label'			=>__('Font Weight','ssel'),
		'type'			=> \Elementor\Controls_Manager::SELECT ,
		'options'		=> ssel_array_options('font_weight'),
    	]
); 		
			
		
		
$this->add_control(
	'staff_position_typo',
			[
				'label' => __('Position Typography','ssel'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
 
  
$this->add_control(
	'staff_position_size',
	[
		'label'			=>__('Font Size','ssel'),
		'type'			=> \Elementor\Controls_Manager::NUMBER ,
   	]
); 

$this->add_control(
	'staff_position_weight',
	[
		'label'			=>__('Font Weight','ssel'),
		'type'			=> \Elementor\Controls_Manager::SELECT ,
		'options'		=> ssel_array_options('font_weight'),
    	]
); 		
			 	 

 $this->end_controls_section();