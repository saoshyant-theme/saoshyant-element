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
	'multi_cats',
	[
		'label'			=> __('Category','ssel'),
		'type'			=> \Elementor\Controls_Manager::SELECT2,
		'multiple'		=> true,
		'options'		=> ssel_array_options('cats'),	
 	]
);

$this->add_control(
	'orderby',
	[
		'label'			=> __('Orderby','ssel'),
		'type'			=> \Elementor\Controls_Manager::SELECT,
		'options'		=> ssel_array_options('orderby'),	
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
	'meta_author',
	[
		'label'			=> __( 'Author Meta' , 'ssel'),
		'type'			=> \Elementor\Controls_Manager::SWITCHER ,
	]
); 			
		
$this->add_control(
	'meta_category',
	[
		'label'			=> __( 'Category Meta' , 'ssel'),
		'type'			=> \Elementor\Controls_Manager::SWITCHER ,
		"default"		=> 'yes' ,
	]
); 	
		

$this->add_control(
	'meta_date',
	[
		'label'			=> __( 'Date Meta' , 'ssel'),
		'type'			=> \Elementor\Controls_Manager::SWITCHER ,
		"default"		=> 'yes' ,
  	]
); 			
		
$this->add_control(
	'meta_view',
	[
		'label'			=> __( 'View Meta' , 'ssel'),
		'type'			=> \Elementor\Controls_Manager::SWITCHER ,
	]
); 	
			
$this->add_control(
	'meta_comments',
	[
		'label'			=> __( 'Comments Meta' , 'ssel'),
		'type'			=> \Elementor\Controls_Manager::SWITCHER ,
	]
); 		

$this->add_control(
	'readmore',
	[
		'label'			=> __('Show Read More','ssel'),
		'type'			=> \Elementor\Controls_Manager::SWITCHER ,
	]
); 		 


$this->add_control(
	'more_posts',
	[
 		'label'			=> __('More Posts','ssel'),
		'type' 			=> \Elementor\Controls_Manager::SELECT ,
		"options"		=>   [
			""				=> 	__('None','ssel'),
			"load_more"		=> 	__('Load More','ssel'),
 					 
		]	
	]
);     
		
 $this->end_controls_section();

	 ?>