<?php
  /*****************************************************************************************************************************************************
******************************************************************************************************************************************************

														Title Box 
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$this->start_controls_section(
	'title_box_tab_style',
	[
		'label' => __( 'Title Box Style', 'ssel' ),
		'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				
 	]
);
		 
 
	 
 

$this->add_control(
	'title_box_main_text',
	[
		'label' 		=>__('رنگ متن عنوان اصلی','ssel'),
		'type'			=> \Elementor\Controls_Manager::COLOR,
 	]
); 	

 

$this->add_control(
	'title_box_tab_text',
	[
		'label'			=>__('رنگ مشاهده لیست کامل','ssel'),
		'type'			=> \Elementor\Controls_Manager::COLOR,
 	]
); 	 
 
	
	
$this->add_control(
	'title_box_border_color',
	[
		'label'			=>__('Title Box Border Color','ssel'),
		'type'			=> \Elementor\Controls_Manager::COLOR,
  ]
); 	

	  
	   
	   
 $this->end_controls_section();
 
	?>