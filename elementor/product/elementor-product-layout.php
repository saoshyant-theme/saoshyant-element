<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Blog Layout
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////         
$this->start_controls_section(
	'layout_section',
	[
		'label' => __( 'Layout', 'ssel' ),
	]
);


  
	

$this->add_control(
	'layout',
	[
		'label' => __('Layout','ssel'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'default' => 'grid',
		"options"		=> [
				"list"	=> 'لیستی',
				"grid"	=> 'گریدی', 
 			],
	]	 
);	 	

$this->add_control(
	'list_layout',
	[
		'label' => __('طرح بندی لیستی','ssel'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'default' => 'list_2',
		'condition'	=> ['layout' => 'list'],
		"options"		=> [
				"list_1"	=> '۱ ستونه',
				"list_2"	=> '۲ ستونه',
				"list_3"	=> '۳ ستونه',
				"list_4"	=> '۴ ستونه', 
 			],
	]	 
);	
 
$this->add_control(
	'grid_layout',
	[
		'label' => __('طرح بندی گریدی','ssel'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'default' => 'grid_6',
		'condition'	=> ['layout' => 'grid'],
		"options"		=> [
 			"grid_1"	=>'۱ ستونه',
 			"grid_2"	=> '۲ ستونه',
 			"grid_3"	=> '۳ ستونه',
 			"grid_4"	=> '۴ ستونه',
 			"grid_5"	=> '۵ ستونه',
 			"grid_6"	=> '۶ ستونه',
 			"grid_7"	=> '۷ ستونه',
 			"grid_8"	=> '۸ ستونه', 
 			],
	]	 
);	 
 
  
$this->add_control(
	'between',
	[
		'label'			=> __('Space Between Item','ssel'),
		'type'			=> \Elementor\Controls_Manager::SELECT,
		'options'		=> [
			"" 				=>__('Default','ssel'),
 									"0px" 	=> "0px",
												"2px" 	=> "2px",
												"10px" 	=> "10px",
												"15px" 	=> "15px",
												"20px" 	=> "20px",
												"30px" 	=> "30px",
												"40px" 	=> "40px",
												"60px" 	=> "60px",
 		]
	]
);	
	 

$this->add_control(
	'ratio',
	[
		'label'			=> __('Image Ratio','ssel'),
		'type' 			=> \Elementor\Controls_Manager::SELECT,
		'options'		=> ssel_array_options('ratio6'),
 	]
);	
	 	 
$this->add_control(
	'image_width',
	[
		'label'			=> __('Image Width','ssel'),
		'type'			=> \Elementor\Controls_Manager::SELECT,
		'condition'	=> ['layout' => 'list'],
		
		'options'		=> [
				""			=>	esc_html__('Default','ssel'),
				"5"			=>	esc_html__('5%','ssel'),
				"10" 		=>	esc_html__('10%','ssel'),
				"15" 		=>	esc_html__('15%','ssel'),
				"20" 		=>	esc_html__('20%','ssel'),
				"25" 		=>	esc_html__('25%','ssel'),
				"30" 		=>	esc_html__('30%','ssel'),
				"35" 		=>	esc_html__('35%','ssel'),
				"40" 		=>	esc_html__('40%','ssel'),
				"45" 		=>	esc_html__('45%','ssel'),
				"50" 		=>	esc_html__('50%','ssel'),
				"55" 		=>	esc_html__('55%','ssel'),
				"60" 		=>	esc_html__('60%','ssel'),
				"65"		=>	esc_html__('65%','ssel'),
				"70"		=>	esc_html__('70%','ssel'),
		]	
	]		
					
);	
		 
$this->add_control(
	'image_size',
	[
		'label'			=> __('Image Size','ssel'),
		'type' 			=> \Elementor\Controls_Manager::SELECT,
		"options" 		=>	ssel_all_image_sizes(),
   	]
);	

$this->add_control(
	'second_image',
	[
		'label'			=> __('Second Image','ssel'),
		'type'			=> \Elementor\Controls_Manager::SWITCHER ,
		"default"		=> 'yes' ,
	]
); 
 
		  
		  
$this->add_control(
	'alignment',
	
	[
		'label'			=> __('Details Alignment','ssel'),
		'condition'	=> ['layout' => 'grid'],
 		'type' 			=> \Elementor\Controls_Manager::SELECT,
		"options" 		=>	 [ 
			'' 			=> 	__('Default','ssel'),
			'left'			=>   esc_html__('Left','ssel'),
			'center'		=>  esc_html__('Center','ssel'),
 			'right'			=>  esc_html__('Right','ssel'),						
			 
		]
  	]
);			
	 				  
  	  
$this->add_control(
	'box_layout',
	[
		'label'			=> __('Box Layout','ssel'),
		'type' 			=> \Elementor\Controls_Manager::SELECT,
		"options" 		=>	[
			"" 				=>  esc_html__('Default','ssel'), 
			"none"			=> esc_html__('None','ssel'),
 			"boxed-item" 		=> esc_html__('Boxed Item','ssel'),
			"boxed-item-2" 		=> esc_html__('Boxed Item 2','ssel'), 
			"boxed-details" 		=> esc_html__('Boxed Details','ssel'), 
			"boxed-details-2" 		=> esc_html__('Boxed Details 2','ssel'), 
			
 		]
		
	]
);			
		



$this->add_responsive_control(
			'elementor_padding',
			[
				'label' => __( 'Margin', 'ssel' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => ssel_array_options('elementor_padding'),
 
				'default' =>  '0px',
 				'selectors' => [
					'{{WRAPPER}} .rd-elementor-item' => '  padding: {{VALUE}} ;',
				],
			]
); 
	 
	
							
	 	  
	 
 $this->end_controls_section();
	 	 
	?>