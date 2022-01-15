<?php 
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Blog Post Style
																		
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 	
$this->start_controls_section(
	'post_style',
	[
		'label'			=> 'استایل محصولات',
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
	'box_border_color',
	[
		'label'			=>__('Box Border Color','ssel'),
		'type'			=> \Elementor\Controls_Manager::COLOR,
 	]
);

 



$this->add_control(
	'title_color_link',
	[
		'label'			=>__('رنگ عنوان نوشته ها','ssel'),
		'type'			=> \Elementor\Controls_Manager::COLOR,
		'separator' => 'before',

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
	'price_main_color',
	[
		'label'			=> 'قیمت - رنگ اصلی',
		'type'			=> \Elementor\Controls_Manager::COLOR,
			'separator' => 'before',
	
 	]
); 	

 $this->add_control(
	'price_sale_color',
	[
		'label'			=>'قیمت - رنگ حراج',
		'type'			=> \Elementor\Controls_Manager::COLOR,
 	]
); 	
$this->add_control(
	'price_regular_color',
	[
		'label'			=>'قیمت - رنگ معمولی',
		'type'			=> \Elementor\Controls_Manager::COLOR,
			'separator' => 'after',
	
 	]
); 	 
$this->add_control(
	'excerpt_color',
	[
		'label'			=>__('Excerpt Color','ssel'),
		'type'			=> \Elementor\Controls_Manager::COLOR,
 	]
); 	


$this->add_control(
	'meta_color',
	[
		'label'			=>__('Meta Color','ssel'),
		'type'			=> \Elementor\Controls_Manager::COLOR,
 	]
); 	
	  
	
	
$this->add_control(
	'rating_rating_color',
	[
		'label'			=>__('Rating Color','ssel').'-'.__('Rating','ssel'),
		'type'			=> \Elementor\Controls_Manager::COLOR,
				'separator' => 'before',
	
 	]
); 	 

$this->add_control(
	'rating_none_color',
	[
		'label'			=>__('Rating Color','ssel').'-'.__('None Rating','ssel'),
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
 	
 
	
 $this->end_controls_section();
	
 			
	
		
	?>