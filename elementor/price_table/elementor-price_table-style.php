<?php
		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Style', 'ssel' ),
		'tab'			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'price_style',
			[
				'label'			=> __('Price Style','ssel'),
				'type'			=> \Elementor\Controls_Manager::SELECT,
 				"type"			=> "select",
								"default"		=> 'style-1' ,

				"options"		=>[
						"style-1"		=> 	__('Style 1','ssel'),
						"style-2"		=> 	__('Style 2','ssel'),
						"style-3"		=> 	__('Style 3','ssel'),
						"style-4"		=> 	__('Style 4','ssel'),
						"style-5"		=> 	__('Style 5','ssel'),
						"style-6"		=> 	__('Style 6','ssel'),
						"style-7"		=> 	__('Style 7','ssel'),
						"style-8"		=> 	__('Style 8','ssel'),
						"style-9"		=> 	__('Style 9','ssel'),
						"style-10"		=> 	__('Style 10','ssel'), 
						
				]
				]			
		); 	
	 
 	 
	 	$this->add_control(
			'main_primary_color',
			[
				'label'			=> __('All Primary Color','ssel'),
				'type'			=> \Elementor\Controls_Manager::COLOR,
			]			
		); 	
	  
	 	$this->add_control(
			'recommend_primary_color',
			[
				'label'			=> __('Recommend Primary Color','ssel'),
				'type'			=> \Elementor\Controls_Manager::COLOR,
			]			
		); 
		
	 	$this->add_control(
			'hover_primary_color',
			[
				'label'			=> __('Hover Primary Color','ssel'),
				'type'			=> \Elementor\Controls_Manager::COLOR,
			]			
		); 
			   
			   
		
	 	$this->add_control(
			'background_color',
			[
				'label'			=> __('Background Color','ssel'),
				'type'			=> \Elementor\Controls_Manager::COLOR,
				'condition'	=> ['price_style' => ['style-1','style-2','style-3','style-4','style-6','style-7','style-8','style-9']]
  				
			]			
		); 
			   	   
	 	$this->add_control(
			'background_color_2',
			[
				'label'			=> __('Background 2','ssel'),
				'type'			=> \Elementor\Controls_Manager::COLOR,
				'condition'	=> ['price_style' => ['style-6','style-7','style-8','style-9','style-10']]
  				
			]			
		); 
	 	$this->add_control(
			'text_color',
			[
				'label'			=> __('Text Color','ssel'),
				'type'			=> \Elementor\Controls_Manager::COLOR,
				'condition'	=> ['price_style' => ['style-1','style-2','style-3','style-4','style-6','style-7','style-8','style-9']]
  				
			]			
		); 	 
		
		$this->add_control(
			'border_color',
			[
				'label'			=> __('Border Color','ssel'),
				'type'			=> \Elementor\Controls_Manager::COLOR,
				'condition'	=> ['price_style' => ['style-1','style-2','style-3','style-4','style-6','style-7','style-8','style-9']]
  				
			]			
		); 	    
		
	
		$this->add_control(
			'radius',
			[
				'label'			=>__('Border Radius','ssel'),
				'type'			=> \Elementor\Controls_Manager::SELECT,
				"options"		=>ssel_array_options('radius'),
 			]			
		); 	    
			 
		$this->add_control(
			'button_radius',
			[
				'label'			=>__('Button Border Radius','ssel'),
				'type'			=> \Elementor\Controls_Manager::SELECT,
				"options"		=>ssel_array_options('radius'),
 			]			
		); 	    
		
		$this->end_controls_section();
		
?>		