<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Blog General
																		
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

$this->start_controls_section(
	'general',
	[
		'label'			=> __( 'General', 'ssel' ),
 	]
); 
		
$this->add_control(
	'number',
	[
		'label'			=>__('Number of Posts to show','ssel'),
		'type'			=> \Elementor\Controls_Manager::NUMBER ,
		"default"		=> '5' ,
  	]
); 		
	
$this->add_control(
	'cats',
	[
		'label'			=> __('Category','ssel'),
		'type'			=> \Elementor\Controls_Manager::SELECT,
 		'options'		=> ssel_array_options('testimonial_category'),	
 	]
);  
	 			 
$this->add_control(
	'author_image',
	[
		'label'			=> __('Show Author Image','ssel'),
		'type'			=> \Elementor\Controls_Manager::SWITCHER ,
		"default"		=> 'yes' ,
	]
); 	 
 
$this->add_control(
	'author_quote_limit',
	[
		'label'			=> __('Limit Quote length','ssel'),
		'type'			=> \Elementor\Controls_Manager::NUMBER ,
		'description'	=> __('example: "200"','ssel') ,
 		
	]
); 
		
$this->add_control(
	'author_quote_layout',
	[
		'label'			=>__('Author Quote Layout','ssel'),
		'type'			=> \Elementor\Controls_Manager::SELECT,
		"options"			=>	[	
 				""					=> __('Default','ssel'),			
  				"bottom"			=> __('in Bottom','ssel'),		 
  				"top"			=> __('in Top','ssel'),		 
   			],
 	]
);  
	 			
		
$this->add_control(
	'author_information',
	[
		'label'			=> __('Show Author Information','ssel'),
		'type'			=> \Elementor\Controls_Manager::SWITCHER ,
	]
); 			
		
$this->add_control(
	'author_rating',
	[
		'label'			=>__('Show Author Rating','ssel'),
		'type'			=> \Elementor\Controls_Manager::SWITCHER ,
		"default"		=> 'yes' ,
	]
); 	
		 
		
 $this->end_controls_section();

	 ?>