<?php
  if( ! class_exists( 'ssel_element_portfolio_carousel' ) ) {

class ssel_element_portfolio_carousel extends \Elementor\Widget_Base {

 
	public function get_name() {
		return 'ssel_portfolio_carousel';
	}

 
	public function get_title() {
		return __( 'نمونه کار های چرخشی', 'ssel' );
	}

 
	public function get_icon() {
		return 'eicon-posts-carousel';
	}
	public function get_categories() {
		return [ 'ssel' ];
	}


protected function _register_controls() {
	//	start Content tab
		 
		 //Box Shadow
		 //Box Shadow
		$this->register_controls_title_box();
	 
 		 $this->register_controls_general();
		 
		$this->register_controls_slider();
		$this->register_controls_layout();
		 
 		$this->register_controls_title_box_style();
		$this->register_controls_post_style();
		 $this->register_controls_slider_style();
		
 		 $this->register_controls_caption_style();
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
   			'title'						=> ssel_settings($option,'title'),
   			'title_box_type'			=> ssel_settings($option,'title_box_type'),
   			'title_box_all'				=> ssel_settings($option,'title_box_all'),
      			//'tabs'						=> ssel_title_box_array($option),
			
  			//General
   			'number'					=> ssel_settings($option,'number'),
   			'multi_cats'				=> ssel_multi_cats_array(ssel_settings($option,'multi_cats')),
    			'ignore_sticky_posts'		=> ssel_settings($option,'ignore_sticky_posts'),
			'post_title'				=> ssel_settings($option,'post_title'),
			'title_limit'				=> ssel_settings($option,'title_limit'),
			'excerpt' 					=> ssel_settings($option,'excerpt'),
			'excerpt_limit'				=> ssel_settings($option,'excerpt_limit'),
 			'meta'=> array(
				'meta_author'				=> 	ssel_settings($option,'meta_author'),
				'meta_category'				=>	ssel_settings($option,'meta_category'),
 				'meta_date'					=>	ssel_settings($option,'meta_date'),
				'meta_view'					=>	ssel_settings($option,'meta_view'),
 			),
			'viewmore' 					=> ssel_settings($option,'viewmore'),
			'more_posts' 				=> ssel_settings($option,'more_posts'),


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
			'ratio' 					=> ssel_settings($option,'ratio'),
 			'image_width'				=> ssel_settings($option,'image_width'),
 			'image_size'				=> ssel_settings($option,'image_size'),
			'alignment' 				=> ssel_settings($option,'alignment'),
   			'box_layout' 				=> ssel_settings($option,'box_layout'),
   			'caption_layout' 				=> ssel_settings($option,'caption_layout'),
   			'elementor_padding'			=> ssel_settings($option,'elementor_padding'),
   	  
   			//Title Box Style//
   			'title_box_style' 			=> ssel_settings($option,'title_box_style'),
			'title_box_main_color'		=> array(
				'background'				=> 	ssel_settings($option,'title_box_main_background'),
				'text'						=>	ssel_settings($option,'title_box_main_text')
			),
			'title_box_tab_color'		=> array(
				'background'				=> 	ssel_settings($option,'title_box_tab_background'),
				'text'						=>	ssel_settings($option,'title_box_tab_text')
			),
 			'title_box_active_color'	=> array(
				'background'				=> 	ssel_settings($option,'title_box_active_background'),
				'text'						=>	ssel_settings($option,'title_box_active_text')
			),
  			'title_box_radius' 			=> ssel_settings($option,'title_box_radius'),
  			'title_box_border_color' 		=> ssel_settings($option,'title_box_border_color'),
			
   			//POST Style//
   	  
   			//Title Box Style//
  			'background_color' 			=> ssel_settings($option,'background_color'),
			'title_color'				=> array(
				'link'						=> 	ssel_settings($option,'title_color_link'),
				'text'						=>	ssel_settings($option,'title_color_hover')
			),
			'excerpt_color'				=>  ssel_settings($option,'excerpt_color'),
 			'meta_color'				=>  ssel_settings($option,'meta_color'),
  			'border_color' 				=> ssel_settings($option,'border_color'),
  			'radius' 					=> ssel_settings($option,'radius'),
			
   			//Image And Caption Style//
  			'image_effect' 				=> ssel_settings($option,'image_effect'),
 			'caption_effect'			=> ssel_settings($option,'caption_effect'),
 			'caption_background_color'	=> ssel_settings($option,'caption_background_color'),
  			'caption_color'				=> ssel_settings($option,'caption_color'),
			
			
			'arrow_color'		=> array(
 				'background'						=>	ssel_settings($option,'arrow_background_color'),
 				'text'						=>	ssel_settings($option,'arrow_text_color')
 			),
			'pager'		=>  ssel_settings($option,'pager'),
 			'pager_style'		=> array(
 				'pager'						=>	ssel_settings($option,'pager_color'),
 				'pager_actvie'						=>	ssel_settings($option,'pager_active_color')
 			),	
			
   			'title_box_main_typo'		=> ssel_elmentor_typo_css($option,'title_box_main'),
   			'title_box_tab_typo'		=> ssel_elmentor_typo_css($option,'title_box_tab'),
   			'post_title_typo'			=> ssel_elmentor_typo_css($option,'post_title'),
   			'excerpt_typo'				=> ssel_elmentor_typo_css($option,'excerpt'),
   			'meta_typo'					=> ssel_elmentor_typo_css($option,'meta'),
   		); 
  
  		echo '<aside class="  rd-elementor-item sao-element-portfolio_carousel">';       
  		echo ssel_portfolio_carousel_config($args,true,true);
		echo '</aside>';
		 
	 
	}
	
}
  }
?>
