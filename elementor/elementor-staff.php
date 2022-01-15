<?php
  if( ! class_exists( 'ssel_element_staff' ) ) {
class ssel_element_staff extends \Elementor\Widget_Base {

 
	public function get_name() {
		return 'ssel_staff';
	}

 	public function get_title() {
		return  __('Staff Member','ssel');
	}

 
	public function get_icon() {
		return 'eicon-user-circle-o';
	}
	public function get_categories() {
		return [ 'ssel' ];
	}


	protected function _register_controls() {
	 
		$this->register_controls_general();
 		$this->register_controls_layout();
  		$this->register_controls_post_style();
		$this->register_controls_caption_style();
		$this->register_controls_typography(); 
  
	}
    


 
	 
	 
	 
	protected function render() {
 		$option = $this->get_settings_for_display();
 		$args=array();
		$args['key']= $this->get_id();
		
		
 		$args['option'] = array(
		
			//Title Box//
   		 
 			
  			//General
   			'number'					=> ssel_settings($option,'number'),
   			'cats'						=>  ssel_settings($option,'cats'),
 			'excerpt' 					=> ssel_settings($option,'excerpt'),
			'excerpt_limit'				=> ssel_settings($option,'excerpt_limit'),
			'staff_position' 					=> ssel_settings($option,'staff_position'),
 			'social_icon' 				=> ssel_settings($option,'social_icon'),		 

			//Layout//
			'layout' 				=> ssel_settings($option,'layout'),
			'list_layout' 				=> ssel_settings($option,'list_layout'),
			'grid_layout' 				=> ssel_settings($option,'grid_layout'),
			'featured_layout' 				=> ssel_settings($option,'featured_layout'),
 			
			 
			'between' 					=> ssel_settings($option,'between'),
			'ratio' 					=> ssel_settings($option,'ratio'),
 			'image_width'				=> ssel_settings($option,'image_width'),
 			'image_size'				=> ssel_settings($option,'image_size'),
			'alignment' 				=> ssel_settings($option,'alignment'),
   			'box_layout' 				=> ssel_settings($option,'box_layout'),
   			'caption_layout' 				=> ssel_settings($option,'caption_layout'),
   			'elementor_padding'			=> ssel_settings($option,'elementor_padding'),
   	   
   			//POST Style//
   	  
   			//Title Box Style//
  			'background_color' 			=> ssel_settings($option,'background_color'),
			'title_color'				=> array(
				'link'						=> 	ssel_settings($option,'title_color_link'),
				'text'						=>	ssel_settings($option,'title_color_hover')
			),
			'excerpt_color'				=>  ssel_settings($option,'excerpt_color'),
 			'staff_position_color'		=>  ssel_settings($option,'staff_position_color'),
 			'icon_style'				=>  ssel_settings($option,'icon_style'),
 			'icon_color'				=>  ssel_settings($option,'icon_color'),
  			'border_color' 				=> ssel_settings($option,'border_color'),
  			'radius' 					=> ssel_settings($option,'radius'),
			
   			//Image And Caption Style//
  			'image_effect' 				=> ssel_settings($option,'image_effect'),
  			'image_radius' 				=> ssel_settings($option,'image_radius'),
 			'caption_effect'			=> ssel_settings($option,'caption_effect'),
 			'caption_background_color'	=> ssel_settings($option,'caption_background_color'),
  			'caption_color'				=> ssel_settings($option,'caption_color'),
			
			
   			 
   			'post_title_typo'			=> ssel_elmentor_typo_css($option,'post_title'),
   			'excerpt_typo'				=> ssel_elmentor_typo_css($option,'excerpt'),
   			'meta_typo'					=> ssel_elmentor_typo_css($option,'meta'),
   		); 
  
  		echo '<aside class="  rd-elementor-item sao-element-blog">';       
  		echo ssel_staff_config($args, true,true);
		echo '</aside>'; 
	 
	}
	
}
  }
?>
