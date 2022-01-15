<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Register Widget Blog Carousel
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  if( ! class_exists( 'ssel_widget_blog_carousel' ) ) {

add_action( 'widgets_init', 'ssel_register_widget_blog_carousel' );
 function ssel_register_widget_blog_carousel() {
    register_widget( 'ssel_widget_blog_carousel' );
}

class ssel_widget_blog_carousel extends WP_Widget {
 	function __construct() {
		parent::__construct(
			'ssel_blog_carousel',
			 esc_html__('Beyond','ssel').' - '.  esc_html__('Blog _Carousel', 'ssel') 
		);
	}

    /**********  The widget For Display *******/
 	public function widget( $args, $instance ) {
		extract( $args );
 		$title = apply_filters( 'widget_title', $instance[ 'title' ] );
 		$grafin_data =$instance;
 		$count = 0;
		 $args=array();
	
 		$args['key'] = 'widget_blog';
 
		$args['option'] =array(
 			'number' => !empty( $instance['number'] ) ? $instance['number'] : '',
 			'cats' => !empty( $instance['cats'] ) ? $instance['cats'] : '',
			'post_title' => 1,
			'title'=> $title ,
  			'excerpt' => !empty( $instance['excerpt'] ) ? $instance['excerpt'] : '',
  			'excerpt_limit' => !empty( $instance['excerpt_limit'] ) ? $instance['excerpt_limit'] : '',
			'title_limit' => !empty( $instance['title_limit'] ) ? $instance['title_limit'] : '',
   			'meta'  =>  array( 
				'meta_category' => !empty( $instance['meta_category'] ) ? $instance['meta_category'] : '', 
				'meta_author' => !empty( $instance['meta_author'] ) ? $instance['meta_author'] : '', 
				'meta_date' =>  !empty( $instance['meta_date'] ) ? $instance['meta_date'] : '',
				'meta_view' =>  !empty( $instance['meta_view'] ) ? $instance['meta_view'] : '',
				'meta_comments' =>  !empty( $instance['meta_comments'] ) ? $instance['meta_comments'] : '',
			),
			'between'=> !empty( $instance['between'] ) ? $instance['between'] : '40px',	
			'layout' => !empty( $instance['layout'] ) ? $instance['layout'] : 'list',
 			'thumb' => !empty( $instance['thumb'] ) ? $instance['thumb'] : 'full',
			'ratio' => !empty( $instance['ratio'] ) ? $instance['ratio'] : '',
			
		) ; 
 
		global $smof_data; 
		?>
		<div id="<?php echo esc_attr($widget_id) ?>" class="rd-element-blog_1 rd-widget-post rd-element-item rd-auto-width">
		 <?php 	echo ssel_blog_carousel_config($args, true);?>
		</div>
	<?php 
	
	}

    /********** Update the widget info from the admin panel *******/
 	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
 		$instance[ 'number' ] = strip_tags( $new_instance[ 'number' ] );
   		$instance[ 'cats' ] = strip_tags( $new_instance[ 'cats' ] );
  		$instance[ 'orderby' ] = strip_tags( $new_instance[ 'orderby' ] );
 
  		$instance[ 'excerpt' ] = !empty( $new_instance['excerpt'] ) ;
  		$instance[ 'title_limit' ] = strip_tags( $new_instance[ 'title_limit' ] );
  		$instance[ 'excerpt_limit' ] = strip_tags( $new_instance[ 'excerpt_limit' ] );
   		$instance[ 'meta_category'] = !empty( $new_instance['meta_category'] );
   		$instance[ 'meta_author'] = !empty( $new_instance['meta_author'] );
  		$instance[ 'meta_date'] = !empty( $new_instance['meta_date'] );
  		$instance[ 'meta_view'] = !empty( $new_instance['meta_view'] );
  		$instance[ 'meta_comments'] = !empty( $new_instance['meta_comments'] );
		
 		$instance[ 'layout' ] = strip_tags( $new_instance[ 'layout' ] );
 		$instance[ 'between' ] = strip_tags( $new_instance[ 'between' ] );
 		$instance[ 'ratio' ] = strip_tags( $new_instance[ 'ratio' ] );
		$instance['thumb'] =  strip_tags( $new_instance['thumb'] );
		
		return $instance;
	}
    
	/********** Display the widget update form *******/
 	public function form( $instance ) { 
		$defaults = array( 'number' => '4', 'thumb' => 'full','ratio'=>'rd-ratio75' );
		$instance = wp_parse_args( (array) $instance, $defaults );
		$cats = get_categories();
  		$title = !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
 		$number = !empty( $instance[ 'number' ] ) ? $instance[ 'number' ] : '';
 

		$cats = !empty( $instance[ 'cats' ] ) ? $instance[ 'cats' ] : '';
 		$cats_array=ssel_array_options('cats') ;
		
   		$orderby = !empty( $instance[ 'orderby' ] ) ? $instance[ 'orderby' ] : '';
		$orderby_array=ssel_array_options('orderby') ;
		
 		$title_limit = !empty( $instance[ 'title_limit' ] ) ? $instance[ 'title_limit' ] : '';
  		$excerpt = !empty( $instance['excerpt'] ) ? $instance['excerpt'] :'';
   		$excerpt = !empty( $instance[ 'excerpt' ] ) ? $instance[ 'excerpt' ] : '';
 		$excerpt_limit = !empty( $instance['excerpt_limit'] ) ? $instance['excerpt_limit'] :'';
  		$meta_category = !empty( $instance['meta_category'] ) ? $instance['meta_category'] :null;
  		$meta_author = !empty( $instance['meta_author'] ) ? $instance['meta_author'] :null;
 		$meta_date = !empty( $instance['meta_date'] ) ? $instance['meta_date'] :null;
 		$meta_view = !empty( $instance['meta_view'] ) ? $instance['meta_view'] :null;
 		$meta_comments = !empty( $instance['meta_comments'] ) ? $instance['meta_comments'] :null;
		
 		$layout = !empty( $instance[ 'layout' ] ) ? $instance[ 'layout' ] : 'list';
 		$layout_array=ssel_array_options('layout') ;
 		
		$between = !empty( $instance[ 'between' ] ) ? $instance[ 'between' ] : '';
		$between_array=ssel_array_options('between') ;		

		$ratio = !empty( $instance[ 'ratio' ] ) ? $instance[ 'ratio' ] : '';
 		$ratio_array=ssel_array_options('ratio6') ;		

		$thumb = !empty( $instance[ 'thumb' ] ) ? $instance[ 'thumb' ] : '';
  		$size_array=ssel_all_image_sizes() ;
  		
		
		
 
  		 ?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php echo esc_html__('Title' , 'ssel' );?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($title); ?>" class="widefat" type="text" style="width:100%;" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php echo esc_html__('Number of Posts' , 'ssel');?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" value="<?php echo esc_attr($number); ?>" type="text" size="3" />
		</p>
<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'cats' )); ?>"><?php echo esc_html__('Category' , 'ssel' );?></label>
			<select id="<?php echo esc_attr($this->get_field_id( 'cats' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'cats')); ?>"  >
				<?php foreach (  $cats_array as $key => $name ) {?>
			 	<option value="<?php echo esc_attr($key) ?>"<?php echo selected( $cats, $key ) ?>><?php echo esc_html($name); ?></option>
				<?php }?> 
			</select>
		</p> 
        
        
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'orderby' )); ?>"><?php echo esc_html__('Posts Order' , 'ssel' );?></label>
			<select id="<?php echo esc_attr($this->get_field_id( 'orderby' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'orderby')); ?>"  >
				<?php foreach (  $orderby_array as $key => $name ) {?>
			 	<option value="<?php echo esc_attr($key) ?>"<?php echo selected( $orderby, $key ) ?>><?php echo esc_html($name); ?></option>
				<?php }?> 
			</select>
		</p> 
 		<p>
 
 		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title_limit' )); ?>"><?php echo esc_html__('Limit Title length' , 'ssel');?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'title_limit' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title_limit' )); ?>" value="<?php echo esc_attr($title_limit); ?>" type="text" size="3" />
		</p>
                
        <p>
  			<label for="<?php echo esc_attr($this->get_field_id( 'excerpt') ); ?>"><?php echo esc_html__('Show Excerpt Posts' , 'ssel' );?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'excerpt') ); ?>" name="<?php echo esc_attr($this->get_field_name( 'excerpt' )); ?>" <?php checked( $excerpt ); ?> type="checkbox" />
 		</p>    
 
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'excerpt_limit' )); ?>"><?php echo esc_html__('Limit Excerpt length' , 'ssel');?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'excerpt_limit' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'excerpt_limit' )); ?>" value="<?php echo esc_attr($excerpt_limit); ?>" type="text" size="3" />
		</p>        
        
     	<p>
  			<label for="<?php echo esc_attr($this->get_field_id( 'meta_category') ); ?>"><?php echo esc_html__('Category Meta' , 'ssel' );?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'meta_category') ); ?>" name="<?php echo esc_attr($this->get_field_name( 'meta_category' )); ?>" <?php checked( $meta_category ); ?> type="checkbox" />
 		</p>    
     
      
        
        <p>
  			<label for="<?php echo esc_attr($this->get_field_id( 'meta_author') ); ?>"><?php echo esc_html__('Author Meta' , 'ssel' );?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'meta_author') ); ?>" name="<?php echo esc_attr($this->get_field_name( 'meta_author' )); ?>" <?php checked( $meta_author ); ?> type="checkbox" />
 		</p>  
        
        
		<p>
  			<label for="<?php echo esc_attr($this->get_field_id( 'meta_date') ); ?>"><?php echo esc_html__('Date Meta' , 'ssel' );?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'meta_date') ); ?>" name="<?php echo esc_attr($this->get_field_name( 'meta_date' )); ?>" <?php checked( $meta_date ); ?> type="checkbox" />
 		</p>   
		<p>
  			<label for="<?php echo esc_attr($this->get_field_id( 'meta_view') ); ?>"><?php echo esc_html__('Views Meta' , 'ssel' );?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'meta_view') ); ?>" name="<?php echo esc_attr($this->get_field_name( 'meta_view' )); ?>" <?php checked( $meta_view ); ?> type="checkbox" />
 		</p>   
        
		<p>
  			<label for="<?php echo esc_attr($this->get_field_id( 'meta_comments') ); ?>"><?php echo esc_html__('Comments Meta' , 'ssel' );?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'meta_comments') ); ?>" name="<?php echo esc_attr($this->get_field_name( 'meta_comments' )); ?>" <?php checked( $meta_comments ); ?> type="checkbox" />
 		</p>  
 
		<p>       
			<label for="<?php echo esc_attr($this->get_field_id( 'layout' )); ?>"><?php echo esc_html__('Layout' , 'ssel' );?></label>
			<select id="<?php echo esc_attr($this->get_field_id( 'layout' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'layout')); ?>"  >
				<?php foreach (  $layout_array as $key => $name ) {?>
			 	<option value="<?php echo esc_attr($key) ?>"<?php echo selected( $layout, $key ) ?>><?php echo esc_html($name); ?></option>
				<?php }?> 
			</select>
		</p>        
<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'between' )); ?>"><?php echo esc_html__('Between' , 'ssel' );?></label>
			<select id="<?php echo esc_attr($this->get_field_id( 'between' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'between')); ?>"  >
				<?php foreach (  $between_array as $key => $name ) {?>
			 	<option value="<?php echo esc_attr($key) ?>"<?php echo selected( $between, $key ) ?>><?php echo esc_html($name); ?></option>
				<?php }?> 
			</select>
		</p>                  
         
		<p>       
			<label for="<?php echo esc_attr($this->get_field_id( 'ratio' )); ?>"><?php echo esc_html__('Image Ratio' , 'ssel' );?></label>
			<select id="<?php echo esc_attr($this->get_field_id( 'ratio' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'ratio')); ?>"  >
				<?php foreach (  $ratio_array as $key => $name ) {?>
			 	<option value="<?php echo esc_attr($key) ?>"<?php echo selected( $ratio, $key ) ?>><?php echo esc_html($name); ?></option>
				<?php }?> 
			</select>
		</p>        

 		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'thumb' )); ?>"><?php echo esc_html__('Image Size' , 'ssel' );?></label>
			<select id="<?php echo esc_attr($this->get_field_id( 'thumb' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'thumb')); ?>"  >
				<?php foreach (  $size_array as $key => $name ) {?>
			 	<option value="<?php echo esc_attr($key) ?>"<?php echo selected( $thumb, $key ) ?>><?php echo esc_html($name); ?></option>
				<?php }?> 
			</select>
		</p>
                    
                 
                  
  	<?php
 	}
}
  }
 ?>