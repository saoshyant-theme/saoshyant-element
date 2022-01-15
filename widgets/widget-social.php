<?php 
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Register Widget Socail
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  if( ! class_exists( 'ssel_widget_staff' ) ) {

add_action( 'widgets_init', 'ssel_register_widget_social' );
 function ssel_register_widget_social() {
    register_widget( 'ssel_widget_social' );
}
class ssel_widget_social extends WP_Widget {
	function __construct() {
		parent::__construct(
			'ssel_widget_social', // Base ID
			 'Beyond - '.esc_html__('Social Icon', 'ssel') );
	}	
		public  function option(){
		$option=array();
  		$option=array();
     	$option[]=array(
				'name' =>__('Title' , 'ssel' ),
 				'id' => 'title',
 				'type' => 'text'
		);
		 
		$option[]= array( 
			
		
			"name"			=> esc_html__('Space Between Item','ssel'),
			"id"			=> "between",
			"group"			=>  esc_html__('Layout','ssel'),
			"type"			=> "select",
			"default"		=>  '',
			"options" 		=>	array(
						"" 	=>__('Default','ssel'),
						"0px" 	=> "0px",
						"2px" 	=> "2px",
						"5px" 	=> "5px",
						"10px" 	=> "10px",
						"15px" 	=> "15px",
						"20px" 	=> "20px",
						"30px" 	=> "30px",
						"40px" 	=> "40px",
			 ),
		); 	 	
		
		$option[]= array( 
			"name"			=> __('Icon Style','ssel'),
			"id"			=> "icon_style",
			"group"			=>  esc_html__('Social Icon','ssel'),
			"type"			=> "select",
			"options"		=> array(
				"style-1" => esc_html__('Style 1: only icon','ssel'),
				"style-2" => esc_html__('Style 2: Boxed Icon','ssel'),
				"style-3" => esc_html__('Style 3: Boxed Original Color','ssel'),
			),						
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
		global $smof_data;
		
		extract( $args );
		$title = apply_filters('widget_title', $instance['title'] );
 		$between =  !empty( $instance['between'] ) ? $instance['between'] : '10px';
 		$style =  !empty( $instance['icon_style'] ) ? $instance['icon_style'] : 'style-3';
    		?>
		<div id="<?php echo esc_attr($widget_id) ?>" class="rd-element-social rd-widget-social rd-widget-post rd-element-item">
			
            <?php ssel_title_box($title);?>
    		
		<div class="rd-social-icons rd-color-main rd-between-<?php echo esc_attr($between);?> rd-alignment-center rd-social-<?php echo esc_attr($style);?>"> 
		<div class="rd-post-gap-warp"> 

		 	 <ul class="rd-post-group-flex rd_column_1_5 rd_desktop_1_5"> 
			 
			<?php   ssel_social($smof_data);?>
								
								
		  </ul> 


	 	</div> 	
	 </div> 	
	 </div> 	
<?php
	}

   
	 
}
  }
?>