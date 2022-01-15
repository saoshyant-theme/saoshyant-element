<?php
  if( ! class_exists( 'ssel_element_pie_chart' ) ) {
class ssel_element_pie_chart extends \Elementor\Widget_Base {

 
	public function get_name() {
		return 'ssel_pie_chart';
	}

 	public function get_title() {
		return  'نمودار دایره ای';
	}

 
	public function get_icon() {
		return 'eicon-countdown';
	}
	public function get_categories() {
		return [ 'ssel' ];
	}


protected function _register_controls() {
	//	start Content tab
		 
		 //Box Shadow
		 //Box Shadow
 	 
 		 $this->register_controls_pie_chart();
 		 $this->register_controls_layout();
  
 $this->register_controls_style(); 
 $this->register_controls_typography(); 
  
		//hover animation
 		 //end style tab
	}
    


 
	 
	 
	protected function register_controls_pie_chart(){
 			
		$this->start_controls_section(
			'pie_chart',
			[
				'label'			=> __( 'نمودار دایره ای', 'ssel' ),
			]
		); 	
			
		$this->add_control(
			'percentage',
			[
				'label'			=>'درصد',
				'type'			=> \Elementor\Controls_Manager::NUMBER ,
				"default"		=> '80',	
			]
		); 		
		
		$this->add_control(
			'endpercentage',
			[
				'label'			=> 'انتهای درصد',
				'type'			=> \Elementor\Controls_Manager::TEXT ,
				"default"		=> "%",
			]
		); 		
  

		$this->add_control(
			'bar_duration',
			[
				'label'			=>'مدت زمان',
				'type'			=> \Elementor\Controls_Manager::NUMBER ,
				"default"		=> "2000",
			]
		); 	
  
    
    $this->end_controls_section();

 		 
		
 	} 
 protected function register_controls_layout(){
 			
		$this->start_controls_section(
			'pie_chart_layout',
			[
				'label'			=> __( 'لایه بندی', 'ssel' ),
			]
		); 	
		 		$this->add_control(
			'chart_size',
			[
				'label'			=> 'اندازه نمودار',
				'type'			=> \Elementor\Controls_Manager::SELECT ,
				"options"		=>   [
							""				=> 'پیشرفض',
							"50"			=>  '50px' ,
							"75"			=> '75px' ,
							"100"			=>  '100px' ,
							"125"			=> '125px' ,
							"150"			=>  '150px' ,
							"175"			=>  '175px' ,
							"200"			=> '200px' ,
							"225"			=>  '225px' ,
							"250"			=>  '250px' ,
							"275"			=>  '275px' ,
							"300"			=>  '300px' ,
				   
						], 						
				  
 			] 
		); 
		
		
			 $this->add_control(
			'alignment',
			[
				'label'			=> 'تراز',
				'type'			=> \Elementor\Controls_Manager::SELECT ,
				"default"		=> "center",
				"options"		=> ssel_array_options('alignment')				
			]
		); 	
 
$this->add_responsive_control(
			'elementor_padding2',
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
			'percent_color',
			[
				'label'			=>'رنگ درصد',
				'type'			=> \Elementor\Controls_Manager::COLOR ,
 			] 
		); 
 
 		$this->add_control(
			'bar_size',
			[
				'label'			=> 'اندازه نوار',
				'type'			=> \Elementor\Controls_Manager::NUMBER ,
			 
 			] 
		); 
		$this->add_control(
			'bar_color',
			[
				'label'			=> 'رنگ نوار',
				'type'			=> \Elementor\Controls_Manager::COLOR ,
			 
 			] 
		); 
		  
		  
		$this->add_control(
			'track_color',
			[
				'label'			=> 'رنگ مسیر',
				'type'			=> \Elementor\Controls_Manager::COLOR ,
			 
 			] 
		); 
 

		$this->add_control(
			'chart_background',
			[
				'label'			=> 'رنگ پس زمینه نمودار',
				'type'			=> \Elementor\Controls_Manager::COLOR ,
			 
 			] 
		);  
		
	$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'chart_border',
				'label' =>   'کادر',
				'selector' => '{{WRAPPER}} .rd-chart .rd-chart-background',
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
			'percent_font_size',
			[
				'label'			=>__('Font Size','ssel'),
				'type'			=> \Elementor\Controls_Manager::NUMBER ,
			]
		); 
		
		$this->add_control(
			'percent_font_weight',
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
 
 
 		if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
			 $edit_mode = 'rd-edit-mode';
		}else{
			 $edit_mode = 'rd-none-edit';
		}
 
 
 		$args=array();
		$args['key']= $this->get_id();
		
		$alignment =!empty($option['alignment']) ? $option['alignment']: 'center';	

		
		
		$chart_size = !empty($option['chart_size']) ? $option['chart_size'] : '150';
		
		$bar_color  =!empty($option['bar_color']) ? $option['bar_color']:'#ff3300 ';
		$bar_size =!empty($option['bar_size']) ? $option['bar_size'] :5;	
		$track_color =!empty($option['track_color']) ?  $option['track_color'] : 'rgba(128,128,128,0.1)';	
	
		$percentage =!empty($option['percentage']) ? $option['percentage']: 0;	
		$endpercentage =!empty($option['endpercentage']) ? $option['endpercentage']: '';	
		$bar_duration =!empty($option['bar_duration']) ? $option['bar_duration']: 2000;	
		 
  		echo '<aside class="sao-element-'.$this->get_id().' rd-elementor-item sao-element-pie_chart">';       
			 if(!empty($percentage)) { 
			
			echo '<div class="rd-chart-warp rd-alignment-'.$alignment.'   rd-auto-width-item " >';
	 
		 
			
			echo '<div class="rd-chart '.$edit_mode.' rd-font-large  " data-percent="'.esc_attr($percentage).'"  data-duration="'.esc_attr($bar_duration).'"  end-percentage="'.esc_attr($endpercentage).'" data-size="'.esc_attr($chart_size).'">';
				echo '<div class="rd-chart-background rd-circle "    data-bar-first="'.esc_attr($bar_color).'"   data-bar-size="'.esc_attr($bar_size).'" data-track="'.esc_attr($track_color).'" ></div>';
			
					echo '<div class="rd-chart-percent rd-color-link"></div>';
			echo '</div>';
			
		 
			echo '</div>';
		}  
		echo '</aside>'; 
	   	$item = 'body .sao-element-'.$this->get_id().' ';

	  $css='';
	  
	$chart_css = ssel_element_background_color_css($option,'chart_background');
  	$css.= ssel_element_item_css($chart_css,$item.' .rd-chart .rd-chart-background'); 
 
	  
	$percent_css = ssel_element_text_css($option,'percent_color') ;
	 $percent_css.= ssel_elementor_font_size($option,'percent_font_size') ;
	 $percent_css.= ssel_elementor_font_weight($option,'percent_font_weight') ;
 	$css.= ssel_element_item_css($percent_css ,$item.' .rd-chart-percent'); 

 	 
	}
	
}
  }
?>
