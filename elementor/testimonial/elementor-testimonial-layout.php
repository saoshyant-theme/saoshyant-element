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
		'default' => 'list',
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
		'default' => 'list_1',
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
		'default' => 'grid_1',
		'condition'	=> ['layout' => 'grid'],
		"options"		=> [
 			"grid_1"	=>'۱ ستونه',
 			"grid_2"	=> '۲ ستونه',
 			"grid_3"	=> '۳ ستونه',
 			"grid_4"	=> '۴ ستونه',
 			"grid_5"	=> '۵ ستونه',
 			"grid_6"	=> '۶ ستونه', 
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
	'box_layout',
	[
		'label'			=> __('Box Layout','ssel'),
		'type' 			=> \Elementor\Controls_Manager::SELECT,
	'condition'	=> ['layout' => ['grid','list']],
		"options" 		=>	[
			"" 				=>  esc_html__('Default','ssel'),
			"none"			=> esc_html__('None','ssel'),
 			"boxed-item" 		=> esc_html__('Boxed Item','ssel'),

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