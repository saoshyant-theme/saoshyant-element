<?php
	 $this->start_controls_section(
			'general',
			[
				'label'			=> __( 'General', 'ssel' ),
			]
		); 
		
		$this->add_control(
			'pricetable',
			[
				'label'			=>  __('Price Table','ssel'),
				'type'			=> \Elementor\Controls_Manager::SELECT,
 				'options'		=> ssel_array_options('pricetable'),	
			]
		);

		$this->add_control(
			'recommend',
			[
				'label'			=> __('Show Recommend','ssel'),
				'type'			=> \Elementor\Controls_Manager::SWITCHER ,
				"default"		=> 'yes' ,
			]
		); 	 
 
	$this->add_control(
			'price_layout',
			[
				'label'			=>  __('Price Layout','ssel'),
				'type'			=> \Elementor\Controls_Manager::SELECT,
  				"default"		=>  'layout-2',
  				'options'		=> [
					"layout-1"		=> 	__('Layout 1','ssel'),
					"layout-2"		=> 	__('Layout 2','ssel'),
					"layout-3"		=> 	__('Layout 3','ssel'),
				]		
			]
		);
  
		$this->end_controls_section();
		
		?>