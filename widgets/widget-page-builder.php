<?php 
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Register Widget Page Builder
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  if( ! class_exists( 'ssel_widget_page_builder' ) ) {

add_action( 'widgets_init', 'ssel_register_widget_page_builder' );
 function ssel_register_widget_page_builder() {
    register_widget( 'ssel_widget_page_builder' );
}

class ssel_widget_page_builder extends WP_Widget {
 	function __construct() {
		parent::__construct(
			'ssel_page_builder',
			esc_html__('Beyond','ssel').' - '. esc_html__('Page builder', 'ssel') 
		);
	}
public  function option(){
	  $option=array();
	$option[]= array( 
		"name"			=> esc_html__('Select a Page Builder','ssel'),
 		"id"			=> "page_builder",
		"type"			=> "select",
 		"options" 		=>	 ssel_array_options('page_builder'),
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
 	public function widget( $args, $instance ) {
		extract( $args );
  	 
 
		$ssel_menu_page_builder = ! empty( $instance[ 'page_builder' ] ) ? $instance[ 'page_builder' ] : '';
		if(!empty($ssel_menu_page_builder)){
			$post_name = get_page_by_path($ssel_menu_page_builder);
			   if(function_exists( "sao_builder_meta") && !empty($post_name)){
 					$out = sao_section_config($post_name->ID,'output');
					$css = sao_section_config($post_name->ID,'css');
					$script = sao_section_config($post_name->ID,'script');
					if(!empty($out)){
						echo '<div class="rd-widget-page-builder rd-data-builder" data-builder="'.esc_attr($widget_id).'">'.wp_kses_post($out).'</div>';
									sao_enqueue_footer();
			
					}
					 
					
			   }else{
				   $out='';
				   $css='';
				   $script='';
			   }
 
			 	
		  
	 }
 
	 
	
	}

    /********** Update the widget info from the admin panel *******/
 
}
  }
 ?>