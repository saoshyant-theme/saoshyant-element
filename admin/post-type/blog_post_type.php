<?php


/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															post Display thumbnail column

*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_post_add_thumbnail_column' ) ) {

add_filter('manage_post_posts_columns', 'ssel_post_add_thumbnail_column', 5);
function ssel_post_add_thumbnail_column($columns){
   $columns['new_post_thumb'] = __('Featured Image','ssel');
  return $columns;
} 
 }
 if( ! function_exists( 'ssel_post_display_thumbnail_column' ) ) {

add_action('manage_post_posts_custom_column', 'ssel_post_display_thumbnail_column', 5, 2);
function ssel_post_display_thumbnail_column($column_name, $post_id){
  switch($column_name){
    case 'new_post_thumb':
      $post_thumbnail_id =  get_post_thumbnail_id($post_id);
		$thumbnail = !empty($post_thumbnail_id)? wp_get_attachment_image_src($post_thumbnail_id, 'thumbnail'):'';

       if (!empty($thumbnail[0])) {
         echo '<img width="100" src="' . esc_url($thumbnail[0]) . '" />';
      }
      break;
  }
}
 }
 
 
?>