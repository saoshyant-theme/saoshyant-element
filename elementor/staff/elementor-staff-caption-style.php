<?php 
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Blog Post Style
																		
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 	
$this->start_controls_section(
			'caption_style',
			array(
				'label' => __('Image And Caption Style','ssel'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				
 			)
		);
 
	
	
	
$this->add_control(
	'image_effect',
		array(
				'label' =>__('Image Effect','ssel'),
				'type' => \Elementor\Controls_Manager::SELECT,
  				"options"		=>   ssel_array_options('hover_image')
 		)
); 


$this->add_control(
	'image_radius',
		array(
				'label' =>__('Image Border Radius','ssel'),
				'type' => \Elementor\Controls_Manager::SELECT,
  				"options"		=>   ssel_array_options('radius')
 		)
);  

$this->add_control(
	'caption_effect',
		array(
				'label' 		=>	__('Caption Background Effect','ssel'),
				'type' 			=> \Elementor\Controls_Manager::SELECT,
  				"options"		=>   ssel_array_options('caption_effect')
 		)
); 


$this->add_control(
	'caption_background_color',
		array(
				'label' 		=>	__('Caption Background Color','ssel'),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
  		)
); 

$this->add_control(
	'caption_color',
		array(
				'label' 		=>	__('Caption Color','ssel'),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
  		)
); 


 $this->end_controls_section(); 
						
	
		
	?>