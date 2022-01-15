<?php  
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Register Widget ADS
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  if( ! class_exists( 'register_ssel_widget_ads' ) ) {

add_action( 'widgets_init', 'register_ssel_widget_ads' );
 function register_ssel_widget_ads() {
    register_widget( 'ssel_widget_ads' );
}

class ssel_widget_ads extends WP_Widget {
	function __construct() {
		parent::__construct(
			'ssel_widget_ads',
			 'Beyond - '.esc_html__('Ads Banner' , 'ssel')
		);
	}
	public  function option(){
		$option=array();
 
     	$option[]=array(
				'name' =>__('Ads Image path' , 'ssel' ),
 				'id' => 'ads_img',
 				'type' => 'text'
		);
		$option[]= array( 
			"name"			=> esc_html__('Ads link','ssel'),
			"id"			=> "ads_url",
 			"type"			=> "text",
			  
		);
	
		 
		$option[]= array( 
			"name"			=> esc_html__('Full Size Image','ssel'),
			"id"			=> "resize",
			"type"			=> "checkbox",
 		);
			
		 
		$option[]= array( 
				"name"			=> esc_html__('Open in New Window','ssel'),
				"id"			=> "window",
				"type"			=> "checkbox",
		);		
		
 		$option[]= array( 
			"name"			=> esc_html__('Nofollow','ssel'),
			"id"			=> "nofollow", 	
			"type"			=> "checkbox",
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
  		?>
 		<div  class="rd-element-item rd-widget-ads">
	 
			<div class="rd-ads <?php if ( !empty($instance[ 'resize' ]) ) {echo 'rd-resize';}?>">
                <a href="<?php if(!empty($instance[ 'ads_url' ])){echo esc_url(@$instance[ 'ads_url' ] );}?>"   <?php if ( !empty($instance[ 'window' ]) ) echo 'target="_blank"' ; ?> <?php if ( !empty($instance[ 'nofollow' ]) ) echo 'rel="nofollow"'?> >
               	<?php if(!empty( $instance[ 'ads_img' ])){ ?>
   					<img alt="ads" src="<?php echo esc_url(@$instance[ 'ads_img' ] ); ?>" />
              	<?php }?>
 				</a> 		
 			</div>
            
		</div>
	<?php 
 	}
    
}
  }