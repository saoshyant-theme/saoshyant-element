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
			'main-right'		=> __('فقط عنوان اصلی سمت راست','ssel'),
			'main-center'		=> __('فقط عنوان اصلی وسط','ssel'),
			'main-tabs'			=> __('عنوان اصلی همراه تب ها','ssel'),
			'tabs-center'		=> __('All Tabs Center','ssel'),			
			'hide'				=> __('Hide','ssel'),			
		]
	]
); 
 
$this->add_control(
	'title_box_all',
	[
		'label'			=>__('Title For All Tab','ssel'),
		'type'			=> \Elementor\Controls_Manager::TEXT,
		'default'		=>  'همه' ,
		
		
	]
);  
  
$this->end_controls_section();
 
	?>