<?php 
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Blog Post Style
																		
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 	
$this->start_controls_section(
	'post_style',
	[
		'label'			=> __('Staff Style','ssel'),
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
	'title_color_link',
	[
		'label'			=>__('رنگ عنوان نوشته ها','ssel'),
		'type'			=> \Elementor\Controls_Manager::COLOR,
 	]
); 	

$this->add_control(
	'title_color_hover',
	[
		'label'			=>__('رنگ شناور عنوان نوشته ها','ssel'),
		'type'			=> \Elementor\Controls_Manager::COLOR,
 	]
); 	


$this->add_control(
	'excerpt_color',
	[
		'label'			=>__('Description Color','ssel'),
		'type'			=> \Elementor\Controls_Manager::COLOR,
 	]
); 	


$this->add_control(
	'staff_position_color',
	[
		'label'			=>__('Position Color','ssel'),
		'type'			=> \Elementor\Controls_Manager::COLOR,
	'condition'	=> ['staff_position' => 'yes'],
		
 	]
); 	

 $this->add_control(
	'icon_style',
	[
		'label'			=>__('Icon Style','ssel'),
		'type' 			=> \Elementor\Controls_Manager::SELECT,
 		"options" 		=>	[
			"style-1" => esc_html__('Style 1: only icon','ssel'),
			"style-2" => esc_html__('Style 2: Boxed Icon','ssel'),
			"style-3" => esc_html__('Style 3: Boxed Original Color','ssel'),

 		]
		
	]
);	

 

$this->add_control(
	'icon_color',
	[
		'label'			=>__('Social Icon Color','ssel'),
		'type'			=> \Elementor\Controls_Manager::COLOR,
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
 	
 
	
 $this->end_controls_section();
	
 			
	
		
	?>