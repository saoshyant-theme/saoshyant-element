<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Price Table Typography
																		
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 	
 $this->start_controls_section(
			'typography',
			array(
				'label' => __('تایپوگرافی نوشته ها','ssel'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				
 			)
		);
  
//*****************************************---------Title Typography------------------********************************************
$this->add_control(
	'title_typo',
			[
				'label' =>__('Title Typography','ssel'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
 
 
 
$this->add_control(
	'title_font_size',
	[
		'label'			=>__('Font Size','ssel'),
		'type'			=> \Elementor\Controls_Manager::NUMBER ,
   	]
);  
$this->add_control(
	'title_font_weight',
	[
		'label'			=>__('Font Weight','ssel'),
		'type'			=> \Elementor\Controls_Manager::SELECT ,
		'options'		=> ssel_array_options('font_weight'),
    	] 
	);



//*****************************************---------Title Typography------------------********************************************
$this->add_control(
	'price_typo',
			[
				'label' =>__('Price Typography','ssel'),
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
	 
//*****************************************---------Price Info Typography------------------********************************************
$this->add_control(
	'price_info_typo',
			[
				'label' =>__('Price Info Typography','ssel'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
 
 
 
$this->add_control(
	'price_info_font_size',
	[
		'label'			=>__('Font Size','ssel'),
		'type'			=> \Elementor\Controls_Manager::NUMBER ,
   	]
);  
$this->add_control(
	'price_info_font_weight',
	[
		'label'			=>__('Font Weight','ssel'),
		'type'			=> \Elementor\Controls_Manager::SELECT ,
		'options'		=> ssel_array_options('font_weight'),
    	] 
	);
	
	
//*****************************************---------Details Typography------------------********************************************
$this->add_control(
	'details_typo',
			[
				'label' =>__('Details Typography','ssel'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
 
 
 
$this->add_control(
	'details_font_size',
	[
		'label'			=>__('Font Size','ssel'),
		'type'			=> \Elementor\Controls_Manager::NUMBER ,
   	]
);  
$this->add_control(
	'details_font_weight',
	[
		'label'			=>__('Font Weight','ssel'),
		'type'			=> \Elementor\Controls_Manager::SELECT ,
		'options'		=> ssel_array_options('font_weight'),
    	] 
	);	
	

//*****************************************---------button Typography------------------********************************************
$this->add_control(
	'button_typo',
			[
				'label' =>__('Button Typography','ssel'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
 
 
 
$this->add_control(
	'button_font_size',
	[
		'label'			=>__('Font Size','ssel'),
		'type'			=> \Elementor\Controls_Manager::NUMBER ,
   	]
);  
$this->add_control(
	'button_font_weight',
	[
		'label'			=>__('Font Weight','ssel'),
		'type'			=> \Elementor\Controls_Manager::SELECT ,
		'options'		=> ssel_array_options('font_weight'),
    	] 
	);		

 $this->end_controls_section();