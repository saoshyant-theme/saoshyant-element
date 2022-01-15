<?php
  if( ! class_exists( 'ssel_element_content_form_7' ) ) {
class ssel_element_content_form_7 extends \Elementor\Widget_Base {

 
	public function get_name() {
		return 'ssel_content_form_7';
	}

 
	public function get_title() {
		return __( 'فروم تماس ۷', 'ssel' );
	}

 
	public function get_icon() {
		return 'eicon-post-list';
	}
	public function get_categories() {
		return [ 'ssel' ];
	}


protected function _register_controls() {
 		  
		$this->register_controls_general();
 	  	$this->register_controls_layout();
 	 $this->register_controls_style();
//		$this->register_controls_columns();
 $this->register_controls_typography(); 
  
	}
    




 
	 
	protected function register_controls_general(){
			$this->start_controls_section(
				'general',
				[
					'label'			=> __( 'عمومی', 'ssel' ),
				]
			); 	
 
			$this->add_control(
				'contactform_id',
				[
					'label'			=>__('Contact Form','ssel'),
					'type'			=> \Elementor\Controls_Manager::SELECT ,
					"options"		=> ssel_array_options('contactform'),			
				]
			); 		 
			$this->end_controls_section();


	} 		 

	protected function register_controls_layout(){
			$this->start_controls_section(
				'layout_contact',
				[
					'label'			=> __( 'لایه بندی', 'ssel' ),
				]
			); 	
 
			$this->add_control(
				'height',
				[
					'label'			=>__('Field Height','ssel'),
					'type'			=> \Elementor\Controls_Manager::NUMBER ,
 				]
			); 	
			
			$this->add_control(
				'textarea_height',
				[
					'label'			=>__('Textarea Height','ssel'),
					'type'			=> \Elementor\Controls_Manager::NUMBER ,
 				]
			); 	
 
			$this->add_control(
				'between',
				[
					'label'			=>__('Between Field','ssel'),
					'type'			=> \Elementor\Controls_Manager::SELECT ,
					"options"		=> [
							"" 	=>__('Default','ssel'),
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
	 
					'default' =>  '20px',
					'selectors' => [
						'{{WRAPPER}} .rd-elementor-item' => '  padding: {{VALUE}} ;',
					],
				]
			); 		
					 
			$this->end_controls_section();

	} 		 
  
 	
	protected function register_controls_style(){
 			
			
		$this->start_controls_section(
			'style',
			[
				'label'			=> 'استایل',
				'tab'			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		); 	
			
			
		$this->add_control(
			'text_color',
			[
				'label'			=>__('Text Color','ssel'),
				'type'			=> \Elementor\Controls_Manager::COLOR,
			]
		); 		
			
		$this->add_control(
			'field_background_color',
			[
				'label'			=>__('Field Background Color','ssel'),
				'type'			=> \Elementor\Controls_Manager::COLOR,
			]
		); 			
	 
		$this->add_control(
			'field_text_color',
			[
				'label'			=>__('Field Text Color','ssel'),
				'type'			=> \Elementor\Controls_Manager::COLOR,
			]
		); 			
	  
		$this->add_control(
			'field_border_color',
			[
				'label'			=>__('Field Border Color','ssel'),
				'type'			=> \Elementor\Controls_Manager::COLOR,
			]
		); 
 							
		$this->add_control(
			'button_background_color',
			[
				'label'			=>__('رنگ زمینه دکمه','ssel'),
				'type'			=> \Elementor\Controls_Manager::COLOR,
			]
		); 
 		$this->add_control(
			'button_text_color',
			[
				'label'			=>__('رنگ متن دکمه','ssel'),
				'type'			=> \Elementor\Controls_Manager::COLOR,
			]
		);  
		
		
 		$this->add_control(
			'border_radius',
			[
				'label'			=>__('Border Radius','ssel'),
				'type'			=> \Elementor\Controls_Manager::SELECT,
				"options"	=>  ssel_array_options('radius'),
			]
		);  		
		
		
 		$this->add_control(
			'textarea_radius',
			[
				'label'			=>__('Textarea Border Radius' , 'ssel'),
				'type'			=> \Elementor\Controls_Manager::SELECT,
				"options"		=>  ssel_array_options('radius_mini'),
			]
		);  	
		$this->end_controls_section();
  	

	} 		 
	 
	protected function register_controls_typography(){

		 $this->start_controls_section(
					'typography',
					array(
						'label' => __('تایپوگرافی نوشته ها','ssel'),
						'tab' => \Elementor\Controls_Manager::TAB_STYLE,
						
					)
				);
		   
		$this->add_control(
			'text_font_size',
			[
				'label'			=>__('Font Size','ssel'),
				'type'			=> \Elementor\Controls_Manager::NUMBER ,
			]
		); 
		
		$this->add_control(
			'text_font_weight',
			[
				'label'			=>__('Font Weight','ssel'),
				'type'			=> \Elementor\Controls_Manager::SELECT ,
				'options'		=> ssel_array_options('font_weight'),
				]
		); 		
		
			$this->end_controls_section();
		
 	}	  
	protected function render() {
 		$option = $this->get_settings_for_display();
 		$args=array();
		$args['key']= $this->get_id();
		
		 
		
 		$args['option'] = array(
		
 		 
			
  			//General
   			'contactform_id'					=> ssel_settings($option,'contactform_id'),
 			//Layout//
   			'height'							=>ssel_settings($option,'height'),
   			'textarea_height'					=> ssel_settings($option,'textarea_height'),
 			'between' 							=> ssel_settings($option,'between'),
			'padding' 							=> ssel_settings($option,'padding'),
  				
			 
   	   
   	  
   			//Title Box Style//
  			'text_color' 						=> ssel_settings($option,'text_color'),
 			'field_background_color'			=>  ssel_settings($option,'field_background_color'),
 			'field_text_color'					=>  ssel_settings($option,'field_text_color'),
  			'field_border_color'				=> ssel_settings($option,'field_border_color'),
  			'button_color'			=> array(
  				'background'					=> ssel_settings($option,'button_background_color'),
  				'text'							=> ssel_settings($option,'button_text_color'),
 			),
			'border_radius' 				=> ssel_settings($option,'border_radius'),
 			'textarea_radius'				=> ssel_settings($option,'textarea_radius'),
 
			
   			'text_typo'					=> ssel_elmentor_typo_css($option,'text'),
 
   		); 
  
  		echo '<aside class="  rd-elementor-item sao-element-contactform">';       
  		echo ssel_contactform_config($args, true,true);
		echo '</aside>'; 
	 
	}
	
}
  }
 
?>
