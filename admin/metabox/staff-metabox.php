<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Staff Custom MetaBox

*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'xxxxxxxxxxxxxx' ) ) {

add_action( 'add_meta_boxes', 'ssel_staff_custom_meta_box' );
function ssel_staff_custom_meta_box($post){
     add_meta_box('ssel_staff_metabox', esc_html__('Staff Member','ssel'), 'ssel_staff_meta_callback', 'staff', 'normal' , 'high');
 
	
}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Staff  MetaBox

*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_staff_meta_callback' ) ) {

function ssel_staff_meta_callback($post) {
	global $post;
	wp_nonce_field( basename(__FILE__), 'ssel_staff_meta_nonce' );
	$staff_external = get_post_meta($post->ID, 'staff_external', true);
	$staff_position = get_post_meta($post->ID, 'staff_position', true);
	$staff_description = get_post_meta($post->ID, 'staff_description', true); 
	$staff_real_name = get_post_meta($post->ID, 'staff_real_name', true); 
	$staff_url = get_post_meta($post->ID, 'staff_url', true); 
	$staff_email = get_post_meta($post->ID, 'staff_email', true); 
	$staff_phone = get_post_meta($post->ID, 'staff_phone', true); 
	$staff_skills = get_post_meta($post->ID, 'staff_skills', true); 
	$staff_socail=array();
	$staff_user_social=ssel_array_options('user_social');
	foreach($staff_user_social as $social_key => $social_name){
		$staff_social['staff_'.$social_key] = get_post_meta($post->ID, 'staff_'.$social_key, true); 
	}
       ?>
    <table class="form-table">
    
		<tr class="meta_staff_external">
                <th ><label for="staff_external"><?php echo esc_html__('Staff Member custom link for external page ( use http:// ) )','ssel');?></label></th>
                <td>
					<input type="text" name="staff_external"   id="staff_external" value="<?php if(!empty($staff_external))echo  esc_attr($staff_external); ?>" />
                 </td>
		</tr>
            
		<tr class="meta_staff_position">
                <th ><label for="staff_position"><?php echo esc_html__('Staff Member Position','ssel');?></label></th>
                <td>
					<input type="text" name="staff_position"  id="staff_position" value="<?php if(!empty($staff_position))echo  esc_attr($staff_position); ?>" />
                 </td>
		</tr>
      
      
		<tr class="meta_staff_description">
			<th><label for="staff_description"><?php echo esc_html__('Staff Member Description','ssel');?></label></th>
			<td>
				<textarea type="text" name="staff_description"   id="staff_description"><?php if(!empty($staff_description))echo  esc_attr($staff_description); ?></textarea>
			</td>
		</tr>        
      
		<tr class="meta_staff_real_name">
			<th><label for="staff_real_name"><?php echo esc_html__('Staff Member Real Name','ssel');?></label></th>
			<td>
				<input type="text" name="staff_real_name"  id="staff_real_name"  value="<?php if(!empty($staff_real_name))echo  esc_attr($staff_real_name); ?>">
			</td>
		</tr> 
      
 		<tr class="meta_staff_url">
			<th><label for="staff_url"><?php echo esc_html__('Staff Member website url ( use http:// )','ssel');?></label></th>
			<td>
				<input type="text" name="staff_url" id="staff_real_name" value="<?php if(!empty($staff_url))echo  esc_attr($staff_url); ?>">
			</td>
		</tr>
        
        
        <tr class="meta_staff_email">
			<th><label for="staff_email"><?php echo esc_html__('Staff Member Email Adress','ssel');?></label></th>
			<td>
				<input type="text" name="staff_email"   id="staff_email" value="<?php if(!empty($staff_email))echo  esc_attr($staff_email); ?>">
			</td>
		</tr> 
      
 		<tr class="meta_staff_phone">
			<th><label for="staff_email"><?php echo esc_html__('Staff Member Phone Number','ssel');?></label></th>
			<td>
				<input type="text" name="staff_phone"  id="staff_phone" value="<?php if(!empty($staff_phone))echo  esc_attr($staff_phone); ?>">
			</td>
		</tr>       
        
        
 		<tr class="meta_staff_skills">
			<th><label for="staff_skills"><?php echo esc_html__('Staff Member Skills','ssel');?></label></th>
			<td>
				<input type="text" name="staff_skills" id="staff_skills"  value="<?php if(!empty($staff_skills))echo  esc_attr($staff_skills); ?>">
			</td>
		</tr>        
      	<?php
	 	foreach($staff_user_social as $social_key => $social_name){?>
        
         <tr class="meta_staff_<?php echo esc_attr($social_key);?>">
                <th ><label for="staff_<?php echo esc_attr($social_key);?>"><?php echo esc_html__('Staff Member','ssel');?> <?php echo esc_html($social_name);?> <?php echo esc_html__('link','ssel');?></label></th>
                <td>
					<input type="text" name="staff_<?php echo esc_attr($social_key);?>"  id="staff_<?php echo esc_attr($social_key);?>" value="<?php if(!empty($staff_social['staff_'.$social_key]))echo  esc_attr($staff_social['staff_'.$social_key]); ?>" />
                 </td>
            </tr>    
        <?php }?>
  
      </tr>
    </table>
    
    
    
  <?php
 }
 }
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Save Staff Metabox

*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_staff_meta_save' ) ) {

function ssel_staff_meta_save($post_id) {
    if (!isset($_POST['ssel_staff_meta_nonce']) || !wp_verify_nonce($_POST['ssel_staff_meta_nonce'], basename(__FILE__))) return;

    if (!current_user_can('edit_post', $post_id)) return;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
	 
	
	if(!empty($_POST['staff_external'])) {
      update_post_meta($post_id, 'staff_external',  sanitize_text_field($_POST['staff_external']));
    } else {
      delete_post_meta($post_id, 'staff_external');
	} 
	
	if(!empty($_POST['staff_position'])) {
      update_post_meta($post_id, 'staff_position',  sanitize_text_field($_POST['staff_position']));
    } else {
      delete_post_meta($post_id, 'staff_position');
	} 
	
	if(!empty($_POST['staff_description'])) {
      update_post_meta($post_id, 'staff_description',  sanitize_text_field($_POST['staff_description']));
    } else {
      delete_post_meta($post_id, 'staff_description');
	} 
		
		
	if(!empty($_POST['staff_real_name'])) {
      update_post_meta($post_id, 'staff_real_name',  sanitize_text_field($_POST['staff_real_name']));
    } else {
      delete_post_meta($post_id, 'staff_real_name');
	} 
	
	if(!empty($_POST['staff_url'])) {
      update_post_meta($post_id, 'staff_url',  sanitize_text_field($_POST['staff_url']));
    } else {
      delete_post_meta($post_id, 'staff_url');
	} 		
	
	if(!empty($_POST['staff_email'])) {
      update_post_meta($post_id, 'staff_email',  sanitize_text_field($_POST['staff_email']));
    } else {
      delete_post_meta($post_id, 'staff_email');
	} 		
	

	if(!empty($_POST['staff_phone'])) {
      update_post_meta($post_id, 'staff_phone',  sanitize_text_field($_POST['staff_phone']));
    } else {
      delete_post_meta($post_id, 'staff_phone');
	} 		
	
	if(!empty($_POST['staff_skills'])) {
      update_post_meta($post_id, 'staff_skills',  sanitize_text_field($_POST['staff_skills']));
    } else {
      delete_post_meta($post_id, 'staff_skills');
	} 		
	  
	$staff_user_social=ssel_array_options('user_social');
	foreach($staff_user_social as $social_key => $social_name){
		
	if(!empty($_POST['staff_'.$social_key])) {
      update_post_meta($post_id, 'staff_'.$social_key,  sanitize_text_field($_POST['staff_'.$social_key]));
    } else {
      delete_post_meta($post_id, 'staff_'.$social_key);
	} 			
		
	}
	  
}
 
add_action('save_post', 'ssel_staff_meta_save');
 }
