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
	'author_name_typo',
			[
				'label' => __('Auhtor Name Typography','ssel'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
 
  
$this->add_control(
	'author_name_font_size',
	[
		'label'			=>__('Font Size','ssel'),
		'type'			=> \Elementor\Controls_Manager::NUMBER ,
   	]
); 

$this->add_control(
	'author_name_font_weight',
	[
		'label'			=>__('Font Weight','ssel'),
		'type'			=> \Elementor\Controls_Manager::SELECT ,
		'options'		=> ssel_array_options('font_weight'),
    	]
); 		
		
		
$this->add_control(
	'author_quote_typo',
			[
				'label' => __('Author Quote Typography','ssel'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
 
  
$this->add_control(
	'author_quote_font_size',
	[
		'label'			=>__('Font Size','ssel'),
		'type'			=> \Elementor\Controls_Manager::NUMBER ,
   	]
); 

$this->add_control(
	'author_quote_font_weight',
	[
		'label'			=>__('Font Weight','ssel'),
		'type'			=> \Elementor\Controls_Manager::SELECT ,
		'options'		=> ssel_array_options('font_weight'),
    	]
); 		
			
		
		
$this->add_control(
	'author_information_typo',
			[
				'label' => __('Author Information Typography','ssel'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
 
  
$this->add_control(
	'author_information_size',
	[
		'label'			=>__('Font Size','ssel'),
		'type'			=> \Elementor\Controls_Manager::NUMBER ,
   	]
); 

$this->add_control(
	'author_information_weight',
	[
		'label'			=>__('Font Weight','ssel'),
		'type'			=> \Elementor\Controls_Manager::SELECT ,
		'options'		=> ssel_array_options('font_weight'),
    	]
); 		
			 	 

 $this->end_controls_section();