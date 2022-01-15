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
 		'options'		=> ssel_array_options('staff_category'),	
 	]
);  
	 	
		
$this->add_control(
	'excerpt',
	[
		'label'			=> __('Show Description','ssel'),
		'type'			=> \Elementor\Controls_Manager::SWITCHER ,
		"default"		=> 'yes' ,
	]
); 	 
 
$this->add_control(
	'excerpt_limit',
	[
		'label'			=> __('Limit Excerpt length','ssel'),
		'type'			=> \Elementor\Controls_Manager::NUMBER ,
		'description'	=> __('example: "200"','ssel') ,
		'condition'	=> ['excerpt' => 'yes'],
		
	]
); 
		
		
$this->add_control(
	'staff_position',
	[
		'label'			=> __('Show Staff Member Position','ssel'),
		'type'			=> \Elementor\Controls_Manager::SWITCHER ,
	]
); 			
		
$this->add_control(
	'social_icon',
	[
		'label'			=> __('Show Staff Social Icon','ssel'),
		'type'			=> \Elementor\Controls_Manager::SWITCHER ,
		"default"		=> 'yes' ,
	]
); 	
		 
		
 $this->end_controls_section();

	 ?>