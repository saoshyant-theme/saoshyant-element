<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Testimonials Metabox

*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_testimonials_custom_meta_box' ) ) {

add_action( 'add_meta_boxes', 'ssel_testimonials_custom_meta_box' );
function ssel_testimonials_custom_meta_box($post){
     add_meta_box('ssel_testimonials_metabox', esc_html__('Genral Options','ssel'), 'ssel_testimonials_meta_callback', 'testimonial', 'normal' , 'high');
} 
 }
 if( ! function_exists( 'ssel_testimonials_meta_callback' ) ) {

function ssel_testimonials_meta_callback($post) {
		global $post;

    wp_nonce_field( basename(__FILE__), 'ssel_testimonials_meta_nonce' );
 
 	$testimonials_author_name = get_post_meta($post->ID, 'testimonials_author_name', true);
	$testimonials_author_information = get_post_meta($post->ID, 'testimonials_author_information', true);
    $testimonials_author_rating = get_post_meta($post->ID, 'testimonials_author_rating', true); 
    $testimonials_author_quote = get_post_meta($post->ID, 'testimonials_author_quote', true); 
	
	$rating_array=array(
	'0-star' => __('0 Star','ssel'),
	'1-star' => __('1 Star','ssel'),
	'2-star' => __('2 Star','ssel'),
	'3-star' => __('3 Star','ssel'),
	'4-star' => __('4 Star','ssel'),
	'5-star' => __('5 Star','ssel')
	 );
      ?>
    <table class="form-table">
    
      	 <tr class="meta_testimonials_author_name">
                <th ><label for="testimonials_author_name"><?php echo esc_html__('Author Name','ssel');?></label></th>
                <td>
					<input type="text" name="testimonials_author_name"  id="testimonials_author_name" value="<?php if(!empty($testimonials_author_name))echo  esc_attr($testimonials_author_name); ?>" />
                 </td>
            </tr>
            
  	 <tr class="meta_testimonials_author_information">
                <th ><label for="testimonials_author_information"><?php echo esc_html__('Author Information','ssel');?></label></th>
                <td>
					<input type="text" name="testimonials_author_information"  id="testimonials_author_information" value="<?php if(!empty($testimonials_author_information))echo  esc_attr($testimonials_author_information); ?>" />
                 </td>
            </tr>     
             
    
        <tr class="testimonials_author_rating">
                <th ><label for="testimonials_author_rating"><?php echo esc_html__('Quthor Rating','ssel');?></label></th>
                <td>
					<select name="testimonials_author_rating" id="testimonials_author_rating">
							<option value="" <?php  if ( $testimonials_author_rating  == '' ){ echo 'selected=""';} ?>><?php __('no Rating','ssel');?></option> 

                         	<?php if(!empty($rating_array) && is_array($rating_array) ){  ?>
                        	<?php foreach ($rating_array as $key => $rating_name){  ?>
                    			<option value="<?php echo esc_attr($key) ?>" <?php  if ( $testimonials_author_rating  == $key ){ echo 'selected=""';} ?>><?php echo esc_html($rating_name);?></option> 
							<?php }
							}?>                      
                    </select>
                    
                </td>
            </tr> 
      <tr>
      
 <tr class="testimonials_author_quote">
                <th ><label for="testimonials_author_quote"><?php echo esc_html__('Author Quate','ssel');?></label></th>
                <td>
					<textarea type="text" name="testimonials_author_quote"   id="testimonials_author_quote"><?php if(!empty($testimonials_author_quote))echo  esc_attr($testimonials_author_quote); ?></textarea>
                 </td>
            </tr>        
      
      </tr>
    </table>
  <?php
 }
 }
 
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Save Testimonials Metabox

*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_testimonials_meta_save' ) ) {

function ssel_testimonials_meta_save($post_id) {
    if (!isset($_POST['ssel_testimonials_meta_nonce']) || !wp_verify_nonce($_POST['ssel_testimonials_meta_nonce'], basename(__FILE__))) return;

    if (!current_user_can('edit_post', $post_id)) return;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
	
   if(!empty($_POST['testimonials_author_name'])) {
      update_post_meta($post_id, 'testimonials_author_name', sanitize_text_field($_POST['testimonials_author_name']));
    } else {
      delete_post_meta($post_id, 'testimonials_author_name');
     } 
	
	if(!empty($_POST['testimonials_author_information'])) {
      update_post_meta($post_id, 'testimonials_author_information', sanitize_text_field($_POST['testimonials_author_information']));
    } else {
      delete_post_meta($post_id, 'testimonials_author_information');
     } 	 
	 
	 
	if(!empty($_POST['testimonials_author_rating'])) {
      update_post_meta($post_id, 'testimonials_author_rating', sanitize_text_field($_POST['testimonials_author_rating']));
    } else {
      delete_post_meta($post_id, 'testimonials_author_rating');
     } 	 
	 
   if(isset($_POST['testimonials_author_quote'])) {
      update_post_meta($post_id, 'testimonials_author_quote', sanitize_text_field($_POST['testimonials_author_quote']));
    } else {
      delete_post_meta($post_id, 'testimonials_author_quote');
     } 	
}
add_action('save_post', 'ssel_testimonials_meta_save');
 }
?>