<?php 
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Register Widget ADS Html
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  if( ! class_exists( 'register_ssel_widget_ads_html' ) ) {
add_action( 'widgets_init', 'register_ssel_widget_ads_html' );
 function register_ssel_widget_ads_html() {
    register_widget( 'ssel_widget_ads_html' );
}
class ssel_widget_ads_html extends WP_Widget {
	function __construct() {
		parent::__construct(
			'ssel_widget_ads_html',
			 'Beyond - '.esc_html__( 'Ads / Html', 'ssel'),
			array( 'description' => esc_html__('Ads Html Code','ssel'))
		);
	}
	public  function option(){
		$option=array();
 
     	$option[]=array(
				'name' =>__('Code' , 'ssel' ),
 				'id' => 'text',
 				'type' => 'textarea'
		);
	 
		
		 
			
		return $option;
    }
	 /********** Update the widget info from the admin panel *******/
 	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
  		return	ssel_widget_options_save( $new_instance, $old_instance,$this->option() );
 	}
 
	/********** Display the widget update form *******/
 	public function form( $instance ) { 
		$defaults = array( );
		$instance = wp_parse_args( (array) $instance, $defaults );
 
		ssel_widget_options($instance,$this->id_base,$this->number,$this->option());
  
 	}
    /**********  The widget For Display *******/
 	function widget( $args, $instance ) {
 		extract( $args );
		$widget_text = !empty( $instance['text'] ) ? $instance['text'] : '';
  
		$text = apply_filters( 'widget_text', $widget_text, $instance, $this ); 
		
 		?>
      	<div class="rd-widget-ads rd-text-html rd-module-item ">
        	 <div class="widget_text"><?php  echo wp_kses_post($text); ?></div>
        </div>
		<?php
	}
	
 
}
  }