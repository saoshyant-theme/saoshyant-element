<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Slider
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
$this->start_controls_section(
	'slider_style',
	[
		'label' => __( 'استایل اسلایدر', 'ssel' ),
		'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	]
);
 
 
 

$this->add_control(
	'arrow_background_color',
	[
		'label' 		=>__('رنگ پس زمینه فلش ها','ssel'),
		'type'			=> \Elementor\Controls_Manager::COLOR,
		'condition'		=> ['arrows' => 'yes'],
		
 	]
); 	



$this->add_control(
	'arrow_text_color',
	[
		'label' 		=>__('رنگ فلش ها','ssel'),
		'type'			=> \Elementor\Controls_Manager::COLOR,
		'condition'		=> ['arrows' => 'yes'],
		
 	]
); 	

	   
 $this->end_controls_section();
 
	?>