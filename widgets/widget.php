<?php
// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
// Disables the block editor from managing widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Widget Class
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
include_once SSEL_PATH . '/widgets/widget-blog.php';  
include_once SSEL_PATH . '/widgets/widget-portfolio.php';  
if ( function_exists ( "is_woocommerce" )){
include_once SSEL_PATH . '/widgets/widget-product.php';  
}
include_once SSEL_PATH . '/widgets/widget-staff.php';  
include_once SSEL_PATH . '/widgets/widget-ads.php';  
include_once SSEL_PATH . '/widgets/widget-custom-html.php';  
include_once SSEL_PATH . '/widgets/widget-social.php';  
include_once SSEL_PATH . '/widgets/widget-blog-tags.php';  
include_once SSEL_PATH . '/widgets/widget-portfolio-tags.php';  
include_once SSEL_PATH . '/widgets/widget-page-builder.php';  

/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Widget Options
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function ssel_widget_options($instance,$bass=false,$number=false,$ssel_options) { 
	global $post;
  
	foreach ($ssel_options as  $option) {
		ssel_widget_options_item($instance,$bass,$number,$option);
	}; 
	
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Widget Options Save
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function ssel_widget_options_save($new_instance, $old_instance,$ssel_options) { 
		$instance = $old_instance;
	if(!empty($ssel_options)){
	foreach ($ssel_options as  $option) {
		$type = !empty($option['type'])? $option['type']:'';

		if(!empty( $option['id'])){
			if($option['id']=='title'){
					$instance['title'] = sanitize_text_field( $new_instance[$option['id']] );

			}elseif($type =='select' || $type =='number' || $type =='text'){
				$instance[$option['id']]= strip_tags($new_instance[$option['id']]);
			}else{
				$instance[$option['id']]=!empty( $new_instance[$option['id']]);
			}
		}
   	}
	}
	
	return $instance;

}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Widget Options Item
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function ssel_widget_options_item($value,$bass=false,$number=false,$array=false) { 
	
 	$label = !empty($array['name'])?$array['name']:'';
	$id = !empty($array['id'])? $array['id']:'';
	$type = !empty($array['type'])? $array['type']:'';
	$options = !empty($array['options'])?$array['options']:'';
 	$name='widget-'.$bass.'['.$number.']['.$id.']';
	$data='widget-'.$bass.'-'.$number.'-'.$id.'';
  
  	$value_id = isset( $value[esc_html($id)]  ) ? $value[esc_html($id)] : null;
  	if ( 1 == $value_id ){
	$checked= 'checked="checked"'; 
	} else{
		$checked='';
	}
 
 
   
	echo '<p>';
	if(!empty($label)){	
		echo '<label for="'.esc_attr($data).'">'. esc_html($label).'</label>  ';
	}

	switch( $type ) {
	// Title
	case 'text':
		echo '<input type="text" name="'.esc_attr($name).'" id="'.esc_attr($data).'" class="widefat"  value="'.esc_attr($value_id).'">';
  	break;

		
	case 'textarea':
		echo '<textarea name="'.esc_attr($name).'" id="'.esc_attr($data).'" >'.esc_textarea($value_id).'</textarea>';
 	break;
		
	case 'number':
		echo '<input type="text"  name="'.esc_attr($name).'" id="'.esc_attr($data).'"   value="'.esc_attr($value_id).'"  ';
	break;
	case 'checkbox':
 		echo '<input type="checkbox"  name="'.esc_attr($name).'" id="'.esc_attr($data).'" '.wp_kses_post($checked).'   value="1">';
  	break;
	
 
	// Categories
	case 'select': 
 
		echo '<select name="'.esc_attr($name).'" id="'.esc_attr($data).'" >';
 			foreach ($options as  $keys => $text) { 	
 				echo'<option id="rd_'.esc_attr($id).'_'.esc_attr($keys).'" class="select_'.esc_attr($type).'" value="'.esc_attr($keys).'"'.selected( $value_id, $keys).'>'.esc_html($text).'</option>'; 
			}
		echo '</select>';
	break;	 
 
  
 	}
 	echo '</p>';
}
  
?>