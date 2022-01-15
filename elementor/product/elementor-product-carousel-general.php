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
		"default"		=> '6' ,
  	]
); 		
	
$this->add_control(
	'multi_cats',
	[
		'label'			=> __('Category','ssel'),
		'type'			=> \Elementor\Controls_Manager::SELECT2,
		'multiple'		=> true,
		'options'		=> ssel_array_options('product_cat'),	
 	]
);

$this->add_control(
	'orderby',
	[
		'label'			=> __('Orderby','ssel'),
		'type'			=> \Elementor\Controls_Manager::SELECT,
		'options'		=> ssel_array_options('product_orderby'),	
 	]
);
 	 
$this->add_control(
	'ignore_sticky_posts',
	[
		'label'			=> __('Ignore Sticky Posts','ssel'),
		'type'			=> \Elementor\Controls_Manager::SWITCHER ,
		"default"		=> 'yes' ,
	]
); 
		
$this->add_control(
	'title_limit',
	[
		'label'			=> __('Limit Title length','ssel'),
		'type'			=> \Elementor\Controls_Manager::NUMBER ,
		'description'	=> __('example: "100"','ssel') ,
	]
); 
	 	
		
$this->add_control(
	'excerpt',
	[
		'label'			=> __('Show Excerpt Posts','ssel'),
		'type'			=> \Elementor\Controls_Manager::SWITCHER ,
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
	'countdown',
	[
		'label'			=> __('Show Countdown Sale Timer','ssel'),
		'type'			=> \Elementor\Controls_Manager::SWITCHER ,
	]
); 			
		
$this->add_control(
	'meta_category',
	[
		'label'			=> __('Show Category Meta','ssel'),
		'type'			=> \Elementor\Controls_Manager::SWITCHER ,
 	]
); 	
		

$this->add_control(
	'rating',
	[
		'label'			=> __( 'Show Rating' , 'ssel'),
		'type'			=> \Elementor\Controls_Manager::SWITCHER ,
		"default"		=> 'yes' ,
  	]
); 			
		 
$this->add_control(
	'addcart',
	[
		'label'			=> __('Show Add to Cart','ssel'),
		'type'			=> \Elementor\Controls_Manager::SWITCHER ,
		"default"		=> 'yes' ,
  	]
); 			
	
 
		
 $this->end_controls_section();

	 ?>