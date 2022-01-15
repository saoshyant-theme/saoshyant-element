<?php
  /*****************************************************************************************************************************************************
******************************************************************************************************************************************************

														Title Box 
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$this->start_controls_section(
	'title_box_tab_style',
	[
		'label' => __( 'Title Box Style', 'ssel' ),
		'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				
 	]
);
		 
 
		
 
$this->add_control(
	'title_box_style',
	[
		'label' =>__('Title Box Style','ssel'),
		'type' => \Elementor\Controls_Manager::SELECT,
		"options"		=> [
			''=> 			esc_html__('Default','ssel'),
 			'style-1'			=> esc_html__('Style 1:none','ssel'),
 			'style-2'			=> esc_html__('style 2:mini Border Bottom','ssel'),
			'style-3'			=> esc_html__('Style 3:Border Bottom','ssel'),
			'style-4'			=> esc_html__('Style 4:Border Top Button','ssel'),
			'style-5'			=> esc_html__('style 5:Border Middle','ssel'),
			'style-6'			=> esc_html__('style 6:Border Cover','ssel'),
 			'style-7'			=> esc_html__('Style 7:Background','ssel'),
			 
		],
				
 	]
); 	


$this->add_control(
	'title_box_main_background',
	[
		'label'			=>__('رنگ زمینه عنوان اصلی','ssel'),
		'type'			=> \Elementor\Controls_Manager::COLOR,
		'condition' 	=> ['title_box_style'		=> 'style-7'],
		
 	]
); 	

$this->add_control(
	'title_box_main_text',
	[
		'label' 		=>__('رنگ متن عنوان اصلی','ssel'),
		'type'			=> \Elementor\Controls_Manager::COLOR,
 	]
); 	



$this->add_control(
	'title_box_tab_background',
	[
		'label'			=>__('رنگ پس زمینه تب ها','ssel'),
		'type'			=> \Elementor\Controls_Manager::COLOR,
		'condition' 	=> ['title_box_style'		=> 'style-7'],
 	]
); 	

$this->add_control(
	'title_box_tab_text',
	[
		'label'			=>__('رنگ متن تب ها','ssel'),
		'type'			=> \Elementor\Controls_Manager::COLOR,
 	]
); 	

$this->add_control(
	'title_box_active_background',
	[
		'label'			=>__('رنگ زمینه تب حالت اکتیو','ssel'),
		'type'			=> \Elementor\Controls_Manager::COLOR,
		'condition' 	=> ['title_box_style'		=> 'style-7'],
 	]
); 	

$this->add_control(
	'title_box_active_text',
	[
		'label'			=>__('رنگ متن تب حالت اکتیو','ssel'),
		'type'			=> \Elementor\Controls_Manager::COLOR,
 	]
); 	
	  
	
	
$this->add_control(
	'title_box_border_color',
	[
		'label'			=>__('Title Box Border Color','ssel'),
		'type'			=> \Elementor\Controls_Manager::COLOR,
		'condition' 	=> ['title_box_style' => ['style-2','style-3','style-4','style-5']]
 ]
); 	
	  
	  
$this->add_control(
	'title_box_radius',
	[
		'label' =>		__('Title box Radius','ssel'),
		'type' => 		\Elementor\Controls_Manager::SELECT,
		"options"		=>  ssel_array_options('radius'), 
		'condition' 	=> ['title_box_style' => ['style-6','style-7']]
				
 	]
); 	
	   
 $this->end_controls_section();
 
	?>