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
	'title_box_main_typo',
			[
				'label' => __('تایپوگرافی برای عنوان جعبه','ssel'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
 
 
 
$this->add_control(
	'title_box_main_font_size',
	[
		'label'			=>__('Font Size','ssel'),
		'type'			=> \Elementor\Controls_Manager::NUMBER ,
   	]
);  
$this->add_control(
	'title_box_main_font_weight',
	[
		'label'			=>__('Font Weight','ssel'),
		'type'			=> \Elementor\Controls_Manager::SELECT ,
		'options'		=> ssel_array_options('font_weight'),
    	]
); 


$this->add_control(
	'title_box_tab_typo',
			[
				'label' => __('تایپوگرافی برای تب ها','ssel'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
 
  
$this->add_control(
	'title_box_tab_font_size',
	[
		'label'			=>__('Font Size','ssel'),
		'type'			=> \Elementor\Controls_Manager::NUMBER ,
   	]
); 

$this->add_control(
	'title_box_tab_font_weight',
	[
		'label'			=>__('Font Weight','ssel'),
		'type'			=> \Elementor\Controls_Manager::SELECT ,
		'options'		=> ssel_array_options('font_weight'),
    	]
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
	'price_typo',
			[
				'label' => __('تایپوگرافی برای قیمت ها','ssel'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
 
  
$this->add_control(
	'price_font_size',
	[
		'label'			=>__('Font Size','ssel'),
		'type'			=> \Elementor\Controls_Manager::NUMBER ,
   	]
); 

$this->add_control(
	'price_font_weight',
	[
		'label'			=>__('Font Weight','ssel'),
		'type'			=> \Elementor\Controls_Manager::SELECT ,
		'options'		=> ssel_array_options('font_weight'),
    	]
); 		
		
		
		
$this->add_control(
	'excerpt_typo',
			[
				'label' => esc_html__('Excerpt Typography','ssel'),
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
	'meta_typo',
			[
				'label' => __('Meta Typography','ssel'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
 
  
$this->add_control(
	'meta_font_size',
	[
		'label'			=>__('Font Size','ssel'),
		'type'			=> \Elementor\Controls_Manager::NUMBER ,
   	]
); 

$this->add_control(
	'meta_font_weight',
	[
		'label'			=>__('Font Weight','ssel'),
		'type'			=> \Elementor\Controls_Manager::SELECT ,
		'options'		=> ssel_array_options('font_weight'),
    	]
); 		
			 	 

 $this->end_controls_section();