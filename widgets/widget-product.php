<?php 
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Register Widget Product
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  if( ! class_exists( 'ssel_widget_product' ) ) {

add_action( 'widgets_init', 'ssel_register_widget_product' );
 function ssel_register_widget_product() {
    register_widget( 'ssel_widget_product' );
}
 
 class ssel_widget_product extends WP_Widget {
 	function __construct() {
		parent::__construct(
			'ssel_product',
			 'Beyond - '. esc_html__('Product', 'ssel') 
		);
	}
public  function option(){
	  	$option[]= array( 
		"name"			=> esc_html__('Title Box','ssel'),
 		"id"			=> "title",
  		"type"			=> "text",
 		   
	);
	$option[]= array( 
		"name"			=> esc_html__('Number of Posts to show','ssel'),
 		"id"			=> "number",
   		"type"			=> "number",
 		  
	);

	 
	$option[]= array( 
		"name"			=> esc_html__('Category','ssel'),
 		"id"			=> "cats",
  		"type"			=> "select",
 		"options"		=>  ssel_array_options('product_cat'),						
 	);
		
	$option[]= array( 
		"name"			=> esc_html__('Orderby','ssel'),
 		"id"			=> "orderby",
  		"type"			=> "select",
		"options"		=>  ssel_array_options('product_orderby'),						
 	); 
	 
	 
	$option[]= array( 
		"name"			=> esc_html__('Limit Title length','ssel'),
 		"id"			=> "title_limit",
		"desc"			=>  esc_html__('example: "100"','ssel'),
 	
   		"type"			=> "number",
   	); 
	
	
	$option[]= array( 
			"name"			=> esc_html__('Show Excerpt Posts','ssel'),
			"id"			=> "excerpt",
			"type"			=> "checkbox",
 		);
	
	$option[]= array( 
		"name"			=> esc_html__('Limit Excerpt length','ssel'),
 		"id"			=> "excerpt_limit",
 	 
		"desc"			=>  esc_html__('example: "200"','ssel'),
   		"type"			=> "number",
   	); 
 	$option[]= array( 
		"name"			=> esc_html__('Show Countdown Sale Timer','ssel'),
 		"id"			=> "countdown",
		"type"			=> "checkbox",
   	); 
	
	$option[]= array( 
		"name"			=> esc_html__('Show Category Meta','ssel'),
 		"id"			=> "meta_category",
		"type"			=> "checkbox",
 		
   	);
 
	$option[]= array( 
		"name"			=> esc_html__('Show Rating','ssel'),
 		"id"			=> "rating",
    	"type"			=> "checkbox",
   	); 
	
	$option[]= array( 
		"name"			=> esc_html__('Show Add to Cart','ssel'),
 		"id"			=> "addcart",
		"type"			=> "checkbox",
 	);	
	
	$option[]= array( 
			"name"			=> esc_html__('Layout','ssel'),
			"id"			=> "layout",
			"type"			=> "select",
			"options"		=>  array( 
				"list"		=> __('List','ssel'),
				"grid"		=> __('Grid','ssel'),
 			),						
					  
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
  			"10px" 	=> "10px",
			"15px" 	=> "15px",
			"20px" 	=> "20px",
 			"30px" 	=> "30px",
			"40px" 	=> "40px",
			"60px" 	=> "60px",
 		 ),
  	);
	
 
	$option[]= array( 
		"name"			=> esc_html__('Image Ratio','ssel'),
 		"id"			=> "ratio",
  		"type"			=> "select",
   		"options"		=>  ssel_array_options('ratio6'),						
 		
  	); 	 

	$option[]= array( 
		"name"			=> esc_html__('Image Width','ssel'),
 		"id"			=> "image_width",
		"type"			=> "select",
   		"options"		=>  array(
			"" 		=>	esc_html__('Default','ssel'),
			"5" 	=>	esc_html__('5%','ssel'),
			"10" 	=>	esc_html__('10%','ssel'),
			"15" 	=>	esc_html__('15%','ssel'),
			"20" 	=>	esc_html__('20%','ssel'),
			"25" 	=>	esc_html__('25%','ssel'),
			"30" 	=>	esc_html__('30%','ssel'),
			"35" 	=>	esc_html__('35%','ssel'),
			"40" 	=>	esc_html__('40%','ssel'),
			"45" 	=>	esc_html__('45%','ssel'),
			"50" 	=>	esc_html__('50%','ssel'),
			"55" 	=>	esc_html__('55%','ssel'),
			"60" 	=>	esc_html__('60%','ssel'),
			"65" 	=>	esc_html__('65%','ssel'),
			"70" 	=>	esc_html__('70%','ssel'),
 		)					
   	); 	 	
	
	$option[]= array( 
		"name"			=> esc_html__('Image Size','ssel'),
 		"id"			=> "image_size",
		"group"			=>  esc_html__('Layout','ssel'),
		"type"			=> "select",
  		"default"		=>  'full',
		"options" 		=>	ssel_all_image_sizes(),
 		 
  	); 	  
 
 	$option[]= array( 
		"name"			=> esc_html__('Second Image','ssel'),
 		"id"			=> "second_image",
 		"type"			=> "checkbox",
   	); 	 
	
	$option[]= array( 
		'name'			=> esc_html__('Details Alignment','ssel'),
 		'id'			=> 'alignment',
 		'type'			=> 'select',
		'options'		=>  array( 
			'' 			=> 	__('Default','ssel'),
			'left'			=>  is_rtl()? esc_html__('Right','ssel'): esc_html__('Left','ssel'),
			'center'		=>  esc_html__('Center','ssel'),
 			'right'			=>  is_rtl()? esc_html__('Left','ssel'):esc_html__('Right','ssel'),						
			 
		),					
		 
	); 
	$option[]= array( 
		"name"			=> esc_html__('Box Layout','ssel'),
 		"id"			=> "box_layout",
		"type"			=> "select",
 		"options" 		=>	array(
			"" 				=>  esc_html__('Default','ssel'),
			"none"			=> esc_html__('None','ssel'),
 			"boxed-item" 		=> esc_html__('Boxed Item','ssel'),
			"boxed-item-2" 		=> esc_html__('Boxed Item 2','ssel'), 
			"boxed-details" 		=> esc_html__('Boxed Details','ssel'), 
			"boxed-details-2" 		=> esc_html__('Boxed Details 2','ssel'), 
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
		$defaults = array( 'number' => '5', 'image_size' => 'full' );
		$instance = wp_parse_args( (array) $instance, $defaults );
 
		ssel_widget_options($instance,$this->id_base,$this->number,$this->option());
  
 	}	
    /**********  The widget For Display *******/
 	public function widget( $args, $instance ) {
		extract( $args );
 		$title = apply_filters( 'widget_title', $instance[ 'title' ] );
 		$grafin_data =$instance;
 		$count = 0;
		 $args=array();
	
 		$args['key'] = 'widget_product';
 
		$args['option'] =array(
 			'number' => !empty( $instance['number'] ) ? $instance['number'] : '',
 			'cats' => !empty( $instance['cats'] ) ? $instance['cats'] : '',
			'post_title' => 1,
			'title'=> $title ,
  			'excerpt' => !empty( $instance['excerpt'] ) ? $instance['excerpt'] : '',
  			'excerpt_limit' => !empty( $instance['excerpt_limit'] ) ? $instance['excerpt_limit'] : '',
			'title_limit' => !empty( $instance['title_limit'] ) ? $instance['title_limit'] : '',
			'countdown' => !empty( $instance['countdown'] ) ? $instance['countdown'] : '', 
			'meta_category' => !empty( $instance['meta_category'] ) ? $instance['meta_category'] : '', 
 			'image_width' => !empty( $instance['image_width'] ) ? $instance['image_width'] : '', 
			'rating' => !empty( $instance['rating'] ) ? $instance['rating'] : '', 
			'addcart' => !empty( $instance['addcart'] ) ? $instance['addcart'] : '', 
 			'between'=> !empty( $instance['between'] ) ? $instance['between'] : '40px',	
			'layout' => !empty( $instance['layout'] ) ? $instance['layout'] : 'list',
 			'image_size' => !empty( $instance['image_size'] ) ? $instance['image_size'] : 'full',
			'list_layout' 		=>  'list_1',
			'grid_layout'	 	=>  'grid_1',
			'featured_layout' 	=>  'featured_1',		
			'ratio' => !empty( $instance['ratio'] ) ? $instance['ratio'] : '',
			'second_image' => !empty( $instance['second_image'] ) ? $instance['second_image'] : '', 
			'alignment' => !empty( $instance['alignment'] ) ? $instance['alignment'] : '', 
			'box_layout' => !empty( $instance['box_layout'] ) ? $instance['box_layout'] : '', 
			
		) ; 
 
		global $smof_data; 
		?>
		<div id="<?php echo esc_attr($widget_id) ?>" class="rd-element-blog_1 rd-widget-post rd-element-item">
		 <?php 	echo ssel_product_config($args, true);?>
		</div>
	<?php 
	
	}

    /********** Update the widget info from the admin panel *******/
 
}
  }
 ?>