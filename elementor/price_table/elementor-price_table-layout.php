<?php
	  
		$this->start_controls_section(
			'layout_section',
			[
				'label' => __( 'Layout', 'ssel' ),
			]
		);
		
		
		  
		$this->add_control(
			'layout',
			[
				'label'			=>  __('Column','ssel'),
				'type'			=> \Elementor\Controls_Manager::SELECT,
  				"default"		=> '4',
  				'options'		=> [
					"1"	=> '1', 
					"2"	=> '2', 
					"3"	=> '3', 
					"4"	=> '4', 
					"5"	=> '5', 
					"6"	=> '6', 
				]		
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