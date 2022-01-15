<?php 
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Register Widget Portfolio Tags
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  if( ! class_exists( 'ssel_portfolio_tags' ) ) {

add_action( 'widgets_init', 'ssel_register_portfolio_tags' );
 function ssel_register_portfolio_tags() {
    register_widget( 'ssel_portfolio_tags' );
}
class ssel_portfolio_tags extends WP_Widget {
	function __construct() {
		parent::__construct(
			'ssel_portfolio_tags',
			'Beyond - '.esc_html__('Portfolio Tags' , 'ssel') 
		);
	}
		public  function option(){
		$option=array();
 
     	$option[]=array(
				'name' =>__('Title' , 'ssel' ),
 				'id' => 'title',
 				'type' => 'text'
		);
     	$option[]=array(
				'name' =>__('Count' , 'ssel' ),
 				'id' => 'count',
 				'type' => 'number'
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
 		$title = apply_filters('widget_title', $instance['title'] );
  		$count  =  !empty( $instance['count'] ) ? $instance['count'] : '25';
  		echo wp_kses_post($args['before_widget']); ?>


		<?php if( !empty($title)){ ?>
        
 			<?php 
            echo wp_kses_post($before_title);
 			echo esc_html($title); 
 			echo wp_kses_post($after_title);
		}
		?>
	 
 				<div class="rd-tags-box ">
					<?php wp_tag_cloud( $tags = array( 'largest' => 8, 'taxonomy'   => 'portfolio_tag',
        'post_type'  => 'portfolio','number' => $count, 'orderby'=> 'count', 'order' => 'DESC' )); ?>
				</div>
  		<?php
        echo wp_kses_post($args['after_widget']); 
	
	}
    

}
  }
?>