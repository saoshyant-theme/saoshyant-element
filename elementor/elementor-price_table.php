<?php
  if( ! class_exists( 'ssel_element_price_table' ) ) {
class ssel_element_price_table extends \Elementor\Widget_Base {

 
	public function get_name() {
		return 'ssel_price_table';
	}

 
	public function get_title() {
		return __( 'جدول قیمت ها ', 'ssel' );
	}

 
	public function get_icon() {
		return 'eicon-price-table';
	}
	public function get_categories() {
		return [ 'ssel' ];
	}


protected function _register_controls() {
 		  
		$this->register_controls_general();
 	 	$this->register_controls_layout();
 	 	$this->register_controls_style();
		$this->register_controls_columns();
 	$this->register_controls_typography(); 
  
	}
    




 
	 
	protected function render() {
 		$option = $this->get_settings_for_display();
 		$args=array();
		$args['key']= $this->get_id();
		
		 
		
 		$args['option'] = array(
		
 		 
			
  			//General
   			'pricetable'					=> ssel_settings($option,'pricetable'),
   			'recommend'						=>ssel_settings($option,'recommend'),
   			'price_layout'					=> ssel_settings($option,'price_layout'),



			//Layout//
			'layout' 				=> ssel_settings($option,'layout'),
			'between' 				=> ssel_settings($option,'between'),
  			
			 
   	   
   	  
   			//Title Box Style//
  			'price_style' 			=> ssel_settings($option,'price_style'),
 			'main_primary_color'		=>  ssel_settings($option,'main_primary_color'),
 			'recommend_primary_color'	=>  ssel_settings($option,'recommend_primary_color'),
  			'hover_primary_color'		=> ssel_settings($option,'hover_primary_color'),
  			'background'		=> array(
  				'background'			=> ssel_settings($option,'background_color'),
  				'background_2'			=> ssel_settings($option,'background_color_2'),
 			),
			'text_color' 				=> ssel_settings($option,'text_color'),
 			'border_color'				=> ssel_settings($option,'border_color'),
 			'radius'					=> ssel_settings($option,'radius'),
  			'button_radius'				=> ssel_settings($option,'button_radius'),
			
			
  			'1st_primary_color'				=> ssel_settings($option,'1st_primary_color'),
  			'2st_primary_color'				=> ssel_settings($option,'2st_primary_color'),
  			'3st_primary_color'				=> ssel_settings($option,'3st_primary_color'),
  			'4st_primary_color'				=> ssel_settings($option,'4st_primary_color'),
  			'5st_primary_color'				=> ssel_settings($option,'5st_primary_color'),
  			'6st_primary_color'				=> ssel_settings($option,'6st_primary_color'),
			
			
			
   			'title_typo'					=> ssel_elmentor_typo_css($option,'title'),
   			'price_typo'					=> ssel_elmentor_typo_css($option,'price'),
   			'price_info_typo'				=> ssel_elmentor_typo_css($option,'price_info'),
   			'details_typo'					=> ssel_elmentor_typo_css($option,'details'),
   			'button_typo'					=> ssel_elmentor_typo_css($option,'button'),
   		); 
  
  		echo '<aside class="  rd-elementor-item sao-element-pricetable">';       
  		echo ssel_price_table_config($args, true,true);
		echo '</aside>'; 
	 
	}
	
}
  }
 
?>
