<?php 
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Blog Post Style
																		
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 	
$this->start_controls_section(
	'post_style',
	[
		'label'			=> __('استایل نظرات مشتریان','ssel'),
		'tab'			=> \Elementor\Controls_Manager::TAB_STYLE,
				
 	]
);
	
$this->add_control(
	'background_color',
	[
		'label'			=>__('Background Color','ssel'),
		'type'			=> \Elementor\Controls_Manager::COLOR,
 	]
);


$this->add_control(
	'author_name_color',
	[
		'label'			=>__('Auhtor Name Color','ssel'),
		'type'			=> \Elementor\Controls_Manager::COLOR,
 	]
); 	 


$this->add_control(
	'author_quote_color',
	[
		'label'			=>__('Author Quote Color','ssel'),
		'type'			=> \Elementor\Controls_Manager::COLOR,
 	]
); 	


$this->add_control(
	'author_information_color',
	[
		'label'			=>__('Author Information Color','ssel'),
		'type'			=> \Elementor\Controls_Manager::COLOR,
		'condition'	=> ['author_information' => 'yes'],
		
 	]
); 	

 $this->add_control(
	'author_rating_rating_color',
	[
		'label'			=>__('Author Rating Color','ssel').' - '.__('Rating','ssel'),
		'type'			=> \Elementor\Controls_Manager::COLOR,
			'separator' => 'before',
	
 	]
); 	 

$this->add_control(
	'author_rating_none_color',
	[
		'label'			=>__('Author Rating Color','ssel').' - '.__('None Rating','ssel'),
		'type'			=> \Elementor\Controls_Manager::COLOR,
		'separator' => 'after',

 	]
); 	 
 
  
$this->add_control(
	'border_color',
	[
		'label'			=>__('Border Color','ssel'),
		'type'			=> \Elementor\Controls_Manager::COLOR,
 	]
); 	



	
$this->add_control(
	'radius',
	[
		'label'			=>__('Border Radius','ssel'),
		'type'			=> \Elementor\Controls_Manager::SELECT,
		"options"		=>   ssel_array_options('radius_mini')
 	]
); 	 

 
$this->add_control(
	'author_image_radius',
	[
		'label'			=> __('Image Border Radius','ssel'),
		'type'			=> \Elementor\Controls_Manager::SELECT,
		"options"		=>   ssel_array_options('radius')
 	]
); 	 
  
  $this->end_controls_section();
	
 			
	
		
	?>