<?php
  /*****************************************************************************************************************************************************
******************************************************************************************************************************************************

														Title Box 
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$this->start_controls_section(
	'title_box',
	[
		'label'			=>  __( 'Title Box', 'ssel' ) ,
	]
);
		
		
$this->add_control(
	'title',
	[
		'label'			=> __( 'Title Box', 'ssel' ),
		'type'			=> \Elementor\Controls_Manager::TEXT,
		'placeholder'	=> __( 'Title Box', 'ssel' ),
		'default'		=> __('Title Box','ssel'),
	]
); 		
$this->add_control(
	'title_box_type',
	[
		'label'			=> __('Title Box Display','ssel'),
		'type'			=> \Elementor\Controls_Manager::SELECT,
		"options"		=>  [
			''					=> __('Default','ssel'),			
			'main-tabs'		=> __('نمایش عنوان','ssel'),
  			'hide'			=> __('Hide','ssel'),		
		]
	]
); 
 
	
		
$this->add_control(
	'title_box_list_all',
	[
		'label'			=> esc_html__('نمایش دکمه مشاهده لیست کامل','ssel'),
		'type'			=> \Elementor\Controls_Manager::SWITCHER ,
		"default"		=> 'yes' ,
	]
); 			
   

 
$this->end_controls_section();
 
	?>