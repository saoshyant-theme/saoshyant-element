<?php
 
 if( ! class_exists( 'ssel_element_testimonial_carousel' ) ) {
class ssel_element_testimonial_carousel extends \Elementor\Widget_Base {

 
	public function get_name() {
		return 'ssel_testimonial_carousel';
	}

 	public function get_title() {
		return  __('نظرات مشتریان چرخشی','ssel');
	}

 
	public function get_icon() {
		return 'eicon-testimonial-carousel';
	}
	public function get_categories() {
		return [ 'ssel' ];
	}


protected function _register_controls() {
	//	start Content tab
		 
		 //Box Shadow
		 //Box Shadow
 	 
 		 $this->register_controls_general();
 		$this->register_controls_layout();
		$this->register_controls_slider();
  		 
		$this->register_controls_post_style();
		 $this->register_controls_slider_style();
  		 $this->register_controls_typography(); 
 
		//hover animation
 		 //end style tab
	}
    


 
	 
 
	protected function render() {
 		$option = $this->get_settings_for_display();
 		$args=array();
		$args['key']= $this->get_id();
		
		
 		$args['option'] = array(
		
			//Title Box//
   		 
 			
  			//General
   			'number'						=> ssel_settings($option,'number'),
   			'cats'							=>  ssel_settings($option,'cats'),
 			'author_image' 					=> ssel_settings($option,'author_image'),
			'author_quote_limit'			=> ssel_settings($option,'author_quote_limit'),
			'author_information'			=> ssel_settings($option,'author_information'),
 			'author_rating' 				=> ssel_settings($option,'author_rating'),		 

			'arrows' 				=> ssel_settings($option,'arrows'),
			'arrow_layout'		=> array(
 				'location'						=>	ssel_settings($option,'arrow_location'),
 				'layout'						=>	ssel_settings($option,'arrow_layout'),
 				'size'						=>	ssel_settings($option,'arrow_size'),
 			),
 			'auto' 				=> ssel_settings($option,'auto'),
 			'loop' 				=> ssel_settings($option,'loop'),
 			'speed' 				=> ssel_settings($option,'speed'),
 			'pause' 				=> ssel_settings($option,'pause'),
 
 
			//Layout//
			'layout' 				=> ssel_settings($option,'layout'),
			'column' 				=> ssel_settings($option,'column'),
 			
			 
			'between' 					=> ssel_settings($option,'between'),
			'box_layout' 				=> ssel_settings($option,'box_layout'),
			'elementor_padding'			=> ssel_settings($option,'elementor_padding'),
   	   
   			//POST Style//
   	  
   			//Title Box Style//
  			'background_color' 				=> ssel_settings($option,'background_color'),
			'author_name_color'				=> 	ssel_settings($option,'author_name_color'),
 			'author_quote_color'			=>  ssel_settings($option,'author_quote_color'),
 			'author_information_color'		=>  ssel_settings($option,'author_information_color'),
 			'author_rating_color'			=> array(
 				'rating' 						=> ssel_settings($option,'author_rating_rating_color'),
				'none'							=> ssel_settings($option,'author_rating_none_color'),
			 ),
			 	'pager'		=>  ssel_settings($option,'pager'),
 			'pager_style'		=> array(
 				'pager'						=>	ssel_settings($option,'pager_color'),
 				'pager_actvie'						=>	ssel_settings($option,'pager_active_color')
 			),
   			'border_color' 					=> ssel_settings($option,'border_color'),
  			'image_radius' 				=> ssel_settings($option,'author_image_radius'), 
  			'radius' 						=> ssel_settings($option,'radius'),
			//Image And Caption Style//
 			'author_name_typo'			=> ssel_elmentor_typo_css($option,'author_name'),
   			'author_quote_typo'				=> ssel_elmentor_typo_css($option,'author_quote'),
   			'author_information_typo'					=> ssel_elmentor_typo_css($option,'author_information'),
   		); 
  
  		echo '<aside class="  rd-elementor-item sao-element-testimonial_carousel">';       
  		echo ssel_testimonial_carousel_config($args, true,true);
		echo '</aside>'; 
	 
	}
	
}
 }
?>
