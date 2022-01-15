<?php
		$this->start_controls_section(
			'columns_section',
			[
				'label' => __('Column Style','ssel'),
		'tab'			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		
	 	$this->add_control(
			'1st_primary_color',
			[
				'label'			=> __('1st Column Primary Color','ssel'),
				'type'			=> \Elementor\Controls_Manager::COLOR,
			]			
		); 
			   
	   
	 	$this->add_control(
			'2st_primary_color',
			[
				'label'			=> __('2st Column Primary Color','ssel'),
				'type'			=> \Elementor\Controls_Manager::COLOR,
			]			
		); 
			   

	 	$this->add_control(
			'3st_primary_color',
			[
				'label'			=> __('3st Column Primary Color','ssel'),
				'type'			=> \Elementor\Controls_Manager::COLOR,
			]			
		); 
		
	  

	 	$this->add_control(
			'4st_primary_color',
			[
				'label'			=> __('4st Column Primary Color','ssel'),
				'type'			=> \Elementor\Controls_Manager::COLOR,
			]			
		); 
			  

	 	$this->add_control(
			'5st_primary_color',
			[
				'label'			=> __('5st Column Primary Color','ssel'),
				'type'			=> \Elementor\Controls_Manager::COLOR,
			]			
		); 
	 	$this->add_control(
			'6st_primary_color',
			[
				'label'			=> __('6st Column Primary Color','ssel'),
				'type'			=> \Elementor\Controls_Manager::COLOR,
			]			
		); 	
		$this->end_controls_section();
		
?>		