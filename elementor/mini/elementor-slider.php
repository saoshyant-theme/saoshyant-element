<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Slider
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
$this->start_controls_section(
	'slider',
	[
		'label' => __( 'Slider', 'ssel' ),
	]
);

		
$this->add_control(
	'arrows',
	[
		'label'			=>__('Arrows','ssel'),
		
		'type'			=> \Elementor\Controls_Manager::SWITCHER ,
		"default"		=> 'yes' ,
	]
); 			 
		
$this->add_control(
	'arrow_location',
	[
		'label'			=> 'موقعیت فلش',
		'condition'		=> ['arrows' => 'yes'],
		'type'			=> \Elementor\Controls_Manager::SELECT,
		"options"		=>  [
				"" 				=>esc_html__('Default','ssel'),
				"slider-1" 				=>esc_html__('Location 1','ssel'),
				"slider-2" 				=>esc_html__('Location 2','ssel'),
				"slider-3" 				=>esc_html__('Location 3','ssel'), 	 
			 
		]
	]
); 
 
 
$this->add_control(
	'arrow_layout',
	[
		'label'			=> 'طرح بندی فلش',
		'condition'		=> ['arrows' => 'yes'],
		'type'			=> \Elementor\Controls_Manager::SELECT,
		"options"		=>  [
				""				=> __('Default','ssel'),	
				"hover"			=> __('On Hover','ssel'),		 
				"fixed"			=> __('Fixed','ssel'),	 
			 
		]
	]
); 

$this->add_control(
	'arrow_size',
	[
		'label'			=> 'اندازه فلش',
		'condition'		=> ['arrows' => 'yes'],
		'type'			=> \Elementor\Controls_Manager::SELECT,
		"options"		=>  [
			""				=> __('Default','ssel'),	
			"small"			=> __('Small','ssel'),		 
			"medium"		=> __('Medium','ssel'),		 
			"large"			=> __('Large','ssel'), 
			 
		]
	]
); 
   
$this->add_control(
	'auto',
	[
		'label'			=>__('Auto Play','ssel'),
 		'type'			=> \Elementor\Controls_Manager::SWITCHER ,
		"default"		=> 'yes' ,
	]
); 

$this->add_control(
	'loop',
	[
		'label'			=>__('Loop','ssel'),
		'type'			=> \Elementor\Controls_Manager::SWITCHER ,
		"default"		=> 'yes' ,
	]
); 


$this->add_control(
	'speed',
	[
		'label'			=>__('Animation Speed ,Default "2000"','ssel'),
		'type'			=> \Elementor\Controls_Manager::TEXT ,
		"default"		=> '2000' ,
	]
); 
 
$this->add_control(
	'pause',
	[
		'label'			=> __('Animation Pause Time','ssel'),
		'type'			=> \Elementor\Controls_Manager::TEXT ,
		"default"		=> '10000' ,
	]
); 
 
 $this->end_controls_section();
 
	?>