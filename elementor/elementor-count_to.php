<?php
  if( ! class_exists( 'ssel_element_count_to' ) ) {
class ssel_element_count_to extends \Elementor\Widget_Base {

 
	public function get_name() {
		return 'ssel_count_to';
	}

 	public function get_title() {
		return  'شمارنده';
	}

 
	public function get_icon() {
		return 'eicon-counter';
	}
	public function get_categories() {
		return [ 'ssel' ];
	}


protected function _register_controls() {
	//	start Content tab
		 
		 //Box Shadow
		 //Box Shadow
 	 
 		 $this->register_controls_count_to();
 		 $this->register_controls_layout();
  
 $this->register_controls_style(); 
 $this->register_controls_typography(); 
  
		//hover animation
 		 //end style tab
	}
    


 
	 
	 
	protected function register_controls_count_to(){
 			
		$this->start_controls_section(
			'count_to',
			[
				'label'			=> __( 'شمارنده', 'ssel' ),
			]
		); 	
			
		$this->add_control(
			'number',
			[
				'label'			=>__( 'عدد شمارنده', 'ssel' ),
				'type'			=> \Elementor\Controls_Manager::NUMBER ,
				"default"		=> "1250",
			]
		); 		
  
  			
		$this->add_control(
			'endnumber',
			[
				'label'			=>__( 'آخر شمارنده', 'ssel' ),
				'type'			=> \Elementor\Controls_Manager::TEXT ,
			]
		); 		
  
 
 		$this->add_control(
			'duration',
			[
				'label'			=> 'مدت زمان شمارنده',
				'type'			=> \Elementor\Controls_Manager::NUMBER ,
				"default"		=> "2000",
			]
		); 		
   
    $this->end_controls_section();

 		 
		
 	} 
 protected function register_controls_layout(){
 			
		$this->start_controls_section(
			'count_to_layout',
			[
				'label'			=> __( 'لایه بندی', 'ssel' ),
			]
		); 	
			 $this->add_control(
			'alignment',
			[
				'label'			=> __('Alignment','ssel'),
				'type'			=> \Elementor\Controls_Manager::SELECT ,
				"default"		=> "center",
				"options"		=> ssel_array_options('alignment')	,		
				 
			]
		); 	
 
$this->add_responsive_control(
			'elementor_padding',
			[
				'label' => __( 'Margin', 'ssel' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => ssel_array_options('elementor_padding2'),
 
				'default' =>  '1px',
 				'selectors' => [
					'{{WRAPPER}} .sao-elementor-item' => '  padding: {{VALUE}} ;',
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
			'number_color',
			[
				'label'			=> 'رنگ شمارنده',
				'type'			=> \Elementor\Controls_Manager::COLOR ,
				 			
			 
 			] 
		); 
		 
		 
    $this->end_controls_section();
	}
	protected function register_controls_typography(){

		 $this->start_controls_section(
					'typography',
					array(
						'label' => __('تایپوگرافی شمارنده','ssel'),
						'tab' => \Elementor\Controls_Manager::TAB_STYLE,
						
					)
				);
		   
		$this->add_control(
			'number_font_size',
			[
				'label'			=>__('Font Size','ssel'),
				'type'			=> \Elementor\Controls_Manager::NUMBER ,
			]
		); 
		
		$this->add_control(
			'number_font_weight',
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
		
		
		if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
			 $edit_mode = 'rd-edit-mode';
		}else{
			 $edit_mode = 'rd-none-edit';
		}	
		
		$number = !empty($option['number']) ? $option['number'] : '0';
		$endnumber = !empty($option['endnumber']) ? $option['endnumber'] : '';
		$duration =!empty($option['duration']) ? $option['duration']: 2000;	
 		$alignment =!empty($option['alignment']) ? $option['alignment']: 'center';	
 	 	 
  
  		echo '<aside class=" sao-elementor-item sao-element-count">'; 
  		echo '<div class=" rd-count-warp   rd-auto-width-item    "   >';

 		echo '<div class="rd-count-number  rd-color-text    rd-font-big "  data-number="'.esc_attr($number).'" end-number="'.esc_attr($endnumber).'" data-duration="'.esc_attr($duration).'">';
  		echo '</div>';		
  		echo '</div>';		
		 
  		echo '</aside>'; 
	   	$item = 'body .sao-element-'.$this->get_id().' ';
	//Number Css
	$css='';
	$number_css='';
  	 $number_css.= ssel_element_text_css($option,'number_color') ;
	 $number_css.= ssel_elementor_font_size($option,'number_font_size') ;
	 $number_css.= ssel_elementor_font_weight($option,'number_font_weight') ;
 	$css.= ssel_element_item_css($number_css ,$item.' .rd-count-number'); 
 	  
 
 
	}
	
}
  }
 
?>
