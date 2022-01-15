<?php
  if( ! class_exists( 'ssel_element_progress_bar' ) ) {
class ssel_element_progress_bar extends \Elementor\Widget_Base {

 
	public function get_name() {
		return 'ssel_progress_bar';
	}

 	public function get_title() {
		return  'نوار پیشرفت';
	}

 
	public function get_icon() {
		return 'eicon-skill-bar';
	}
	public function get_categories() {
		return [ 'ssel' ];
	}


protected function _register_controls() {
	 
 	 
 		 $this->register_controls_general();
 		 $this->register_controls_layout();
 	   
  $this->register_controls_style(); 
  $this->register_controls_typography(); 
  
		//hover animation
 		 //end style tab
	}
    


 
	 
	 
	protected function register_controls_general(){
 			
		$this->start_controls_section(
			'general',
			[
				'label'			=>  'نوار پیشرفت',
			]
		); 	
			
		$this->add_control(
			'title',
			[
				'label'			=>'عنوان نوار پیشرفت',
				'type'			=> \Elementor\Controls_Manager::TEXT ,
				"default"		=> 'عنوان',	
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
			'bar_duration',
			[
				'label'			=> 'مدت زمان اجرا',
				'type'			=> \Elementor\Controls_Manager::NUMBER ,
				"default"		=> "2000",
			]
		); 	
		
		$this->add_control(
			'style_layout',
			[
				'label'			=> 'استایل',
				'type'			=> \Elementor\Controls_Manager::SELECT ,
				"options"		=>  array( 
						"style-1"			=> 'استایل ۱',
						"style-2"			=> 'استایل ۲',
						"style-3"			=> 'استایل ۳',
						"style-4"			=> 'استایل ۴',
			
					), 
			]
		); 	
 
 	
	
    $this->end_controls_section();

 		 
		
 	} 
 protected function register_controls_layout(){
 			
		$this->start_controls_section(
			'progress_bar_layout',
			[
				'label'			=>  'لایه بندی',
			]
		); 	
		
		 
		$this->add_control(
			'progress_bar_height',
			[
				'label'			=> 'ارتفاع',
				'type'			=> \Elementor\Controls_Manager::NUMBER ,
 			]
		); 	
   
		$this->add_responsive_control(
					'elementor_padding',
					[
						'label' => __( 'Margin', 'ssel' ),
						'type' => \Elementor\Controls_Manager::SELECT,
						'options' => ssel_array_options('elementor_padding2'),
		 
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
			'title_color',
			[
				'label'			=>	'رنگ عنوان',
				'type'			=> \Elementor\Controls_Manager::COLOR ,
  			]
		);  			
   		$this->add_control(
			'percent_color',
			[
				'label'			=>	'رنگ درصد',
				'type'			=> \Elementor\Controls_Manager::COLOR ,
  			]
		); 
		$this->add_control(
			'progress_bar_style',
			[
				'label' => __('نوار پیشرفت','ssel'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
 
		
		$this->add_control(
			'progress_bar_stripes',
			[
				'label'			=>	'راه راه ای برای نوار پیشفرت',
				'type'			=> \Elementor\Controls_Manager::SWITCHER ,
 			]
		); 
		 
		$this->add_control(
			'progress_bar_animete',
			[
				'label'			=>	'انیمیشن راه راه ای برای نوار پیشرفت',
				'type'			=> \Elementor\Controls_Manager::SWITCHER ,
				'condition'	=> ['progress_bar_stripes' => 'yes'],
 			]
		); 
		 	  
 	$this->add_control(
			'progress_bar_first_color',
			[
				'label'			=>	'نوار اول نوار پیشرفت',
				'type'			=> \Elementor\Controls_Manager::COLOR ,
  			]
		); 
		 	 
		
		
 		$this->add_control(
			'progress_bar_radius',
			[
				'label'			=>	'گردی کادر دور نوار پیشرفت',
				'type'			=> \Elementor\Controls_Manager::NUMBER ,
  			]
		); 
		 		
		$this->add_control(
			'progress_bar_container_style',
			[
				'label' => 'ظرف نوار پیشرفت',
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
 
		
 		$this->add_control(
			'progress_bar_container',
			[
				'label'			=>	'رنگ ظرف نوار پیشرفت',
				'type'			=> \Elementor\Controls_Manager::COLOR ,
  			]
		);  			
  $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'progress_bar_container_border',
				'label' => 'حاشیه',
				'selector' => '{{WRAPPER}} .pro-bar-container ',
			]
		);
   		$this->add_control(
			'progress_bar_container_radius',
			[
				'label'			=>	'گردی ظرف نوار پیشرفت',
				'type'			=> \Elementor\Controls_Manager::NUMBER ,
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
			'title_typo',
					[
						'label' => 'تایپوگرافی برای عنوان',
						'type' => \Elementor\Controls_Manager::HEADING,
						'separator' => 'before',
					]
				);
		 
		  
		$this->add_control(
			'title_font_size',
			[
				'label'			=>__('Font Size','ssel'),
				'type'			=> \Elementor\Controls_Manager::NUMBER ,
			]
		); 
		
		$this->add_control(
			'title_font_weight',
			[
				'label'			=>__('Font Weight','ssel'),
				'type'			=> \Elementor\Controls_Manager::SELECT ,
				'options'		=> ssel_array_options('font_weight'),
				]
		); 		
	$this->add_control(
			'percent_typo',
					[
						'label' => 'تایپوگرافی برای درصد',
						'type' => \Elementor\Controls_Manager::HEADING,
						'separator' => 'before',
					]
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
 		$style = !empty($option['style_layout']) ? $option['style_layout'] : 'style-1';
	 	$animete = !empty($option['progress_bar_animete']) ? ' candy-rtl ' : '';
 	$duration = !empty($option['progress_bar_duration']) ? $option['progress_bar_duration'] : '2000';
		
		$title = !empty( $option['title']) ? $option['title'] : '';
		$percentage = !empty( $option['percentage']) ? $option['percentage'] : '';
		echo '<aside class="  rd-elementor-item sao-element-progress_bar">';       
 		echo '<div class="rd-progress-bar-item   rd-auto-width-item  rd-progress-bar-'.esc_attr($style).'"  >'; 
			
 
			if($style=='style-1'){
				 echo '<div class="rd-progress-bar-title-box">'; 
					echo '<div class="rd-progress-bar-title rd-font-medium rd-color-text">'.esc_html($title).'</div>'; 
					echo '<div class="rd-progress-bar-percent rd-font-medium rd-color-text"></div>'; 
				echo '</div>';
			}
			echo '<div class="pro-bar-container ">';
			echo '<div class="pro-bar 	rd-color-primary-bacgkround bar-'.esc_attr($percentage).' color-peter-river" data-pro-bar-percent="'.esc_attr($percentage).'"  data-pro-bar-duration="'.esc_attr($duration).'"   data-pro-bar-delay="0">';
				
				if(!empty($option['progress_bar_stripes'])){
				echo '<div class="pro-bar-candy  '.esc_attr( $animete ).'"></div>';
				}
				
			echo '</div>';
			
			if($style=='style-2' || $style=='style-3' || $style=='style-4'){
				echo '<div class="rd-progress-bar-title-box">'; 
					echo'<div class="rd-progress-bar-title rd-font-medium rd-color-text">'.esc_html($title).'</div>'; 
					echo '<div class="rd-progress-bar-percent rd-font-text rd-color-medium"></div>'; 
				echo '</div>';
			}
		echo '</div>';
 		echo '</aside>'; 
 	 
	   	$item = '.sao-element-'.$this->get_id().' ';
	
	
	
  		
		$progress_all='';
  $css='';
	$title_css='';
 
 	$title_css.= ssel_element_text_css($option,'title_color') ;
 	$title_css.= ssel_elementor_font_size($option,'title_font_size') ;	
 	$title_css.= ssel_elementor_font_weight($option,'title_font_weight') ;	
	 
 
	$css.= ssel_element_item_css($title_css ,$item.' .rd-progress-bar-title'); 
	 
 	
	 
	$percent_css='';
  	$percent_css.= ssel_element_text_css($option,'percent_color') ;
  	$percent_css.= ssel_elementor_font_size($option,'percent_font_size') ;	
 	$percent_css.= ssel_elementor_font_weight($option,'percent_font_weight') ;	
 
 	$css.= ssel_element_item_css($percent_css ,$item.' .rd-progress-bar-percent'); 
 
		
		
		
 		
		$progress_bar =ssel_element_text_css($option,'progress_bar_color'); 
		$progress_bar.=ssel_element_radius_only_css($option,'progress_bar_radius'); 
   	 	$css.= ssel_element_item_css($progress_bar ,$item.' .pro-bar'); 
		
		
		$progress_bar=''; 
  	 	if(!empty($option['progress_bar_height'])){
 			$progress_bar.= intval(isset($option['progress_bar_height'])) ?  ' height:'.$option['progress_bar_height'].'px; ': ' height:30px;';
  		}		
 	 
 
		$progress_bar.=ssel_element_background_color_css($option,'progress_bar_first_color'); 
		$progress_bar.=ssel_element_radius_only_css($option,'progress_bar_radius'); 
   	 	$css.= ssel_element_item_css($progress_bar ,$item.' .pro-bar'); 
		
		
		
			
		$item_container='';
			if($style=='style-2' || $style=='style-3' || $style=='style-4'){
	 			$item_container.= intval(isset($option['progress_bar_height'])) ?  'line-height:'.$option['progress_bar_height'].'px !important; ': ' line-height:30px !important;';
 		}
		
		$item_container.=ssel_element_background_color_css($option,'progress_bar_container'); 
		$item_container.=ssel_element_radius_only_css($option,'progress_bar_container_radius'); 
		$css.=ssel_element_item_css($item_container,$item.' .pro-bar-container');
		
 		 
	}
	
}
  }
 
?>
