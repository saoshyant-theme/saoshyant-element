<?php
 
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
														 			Page Metabox
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_page_metabox' ) ) {

add_action( 'add_meta_boxes', 'ssel_page_metabox' );
function ssel_page_metabox($post){
      add_meta_box('ssel_page_general_metabox',esc_html__('General Options','ssel'), 'ssel_page_general_metabox', 'page', 'normal' , 'high');
}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
														 			Page General Metabox
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_page_general_metabox' ) ) {

function ssel_page_general_metabox($post){
	global $post;
	   $custom = get_post_custom($post->ID);
	$sidebars  = ssel_array_options('sidebars');
	$page_right = get_post_meta($post->ID, 'sidebar_page_right', true);
    $page_left = get_post_meta($post->ID, 'sidebar_page_left', true);
 	$full_width_value = get_post_meta($post->ID, 'full_width', true);
    if($full_width_value == "yes"){ $full_width_checked = 'checked="checked"';}else{$full_width_checked='';} 
	$hide_banner_below = get_post_meta($post->ID, 'hide_banner_below', true);
    $hide_comments = get_post_meta($post->ID, 'hide_comments', true);
     $body_background_color = get_post_meta($post->ID, 'body_background_color', true);
    $body_background_type = get_post_meta($post->ID, 'body_background_type', true);
    $body_background_image = get_post_meta($post->ID, 'body_background_image', true);
    $body_background_image_medium = get_post_meta($post->ID, 'body_background_image_medium', true);
    $body_background_pattern = get_post_meta($post->ID, 'body_background_pattern', true);
 

	?>
	 
	<table class="form-table meta_box">     
		<tbody>
                  <tr class="meta_ssel_page_sidebar">
                <th ><label for="page_sidebar"><?php echo esc_html__('Custom Sidebar Right','ssel');?></label></th>
                <td>
					<select name="sidebar_page_right" id="page_sidebar">
                          	<?php if(!empty($sidebars) && is_array($sidebars) ){  ?>
                        		<?php foreach ($sidebars as $key => $name){  ?>
                    			<option value="<?php echo ''.esc_attr($key) ?>" <?php  if ( $sidebars  == ''.$key ){ echo 'selected=""';} ?>><?php echo esc_html($name);?></option> 
							<?php }?>                      
							<?php }?>                      
                    </select>
                    
                </td>
            </tr> 
      <tr class="meta_ssel_page_sidebar">
                <th ><label for="page_sidebar"><?php echo esc_html__('Custom Sidebar Left','ssel');?></label></th>
                <td>
					<select name="sidebar_page_left" id="page_sidebar">
                          	<?php if(!empty($sidebars) && is_array($sidebars) ){  ?>
                        		<?php foreach ($sidebars as $key => $name){  ?>
                    			<option value="<?php echo ''.esc_attr($key) ?>" <?php  if ( $page_left  == ''.$key ){ echo 'selected=""';} ?>><?php echo esc_html($name);?></option> 
							<?php }?>                      
							<?php }?>                      
                    </select>
                    
                </td>
            </tr> 
            
            
            <tr class="meta_ssel_full_width">
                <th ><label for="full_width"><?php echo esc_html__('Full Width Post','ssel');?></label></th>
                <td>
    				<input type="checkbox" name="full_width"  id="full_width" value="yes" <?php echo wp_kses_post($full_width_checked); ?> />
                </td>
            </tr>            
      
            <tr class="meta_ssel_hide_banner_below">
                <th ><label for="hide_banner_below"><?php echo esc_html__('Hide Below Ads Widget','ssel');?></label></th>
                <td>
                    <select name="hide_banner_below" id="hide_banner_below">
                       <option value="default" <?php selected($hide_banner_below, 'default' ); ?>><?php echo esc_html__('Default','ssel');?></option>
                      <option value="hide" <?php selected( $hide_banner_below, 'hide' ); ?>><?php echo esc_html__('Hide','ssel');?></option>
                    </select>
                </td>
            </tr>            

            <tr class="meta_ssel_hide_comments">
                <th ><label for="hide_comments"><?php echo esc_html__('Hide Comments','ssel');?></label></th>
                <td>
                    <select name="hide_comments" id="hide_comments">
                       <option value="default" <?php selected($hide_comments, 'default' ); ?>><?php echo esc_html__('Default','ssel');?></option>
                      <option value="hide" <?php selected( $hide_comments, 'hide' ); ?>><?php echo esc_html__('Hide','ssel');?></option>
                    </select>
                </td>
            </tr>                
                        
            <tr class="meta_ssel_body_background_color meta_ssel_color">
                <th ><label for="body_background_color"><?php echo esc_html__('Background Color','ssel');?></label></th>
                <td>
               		 <input  class="cs-wp-color-picker rd-color"  data-rgba="false" type="text" name="body_background_color" id="body_background_color" value="<?php echo esc_attr($body_background_color);?>">
                 </td>
            </tr> 
                        
         	<tr class="meta_ssel_body_background_type">
                <th ><label for="body_background_type"><?php echo esc_html__('Background Type','ssel');?></label></th>
                <td>
                    <select name="body_background_type" id="body_background_type">
                       <option value="" id="body_background_type_default" <?php selected($body_background_type, '' ); ?>><?php echo esc_html__('Default','ssel');?></option>
                      <option value="none" id="body_background_type_none"  <?php selected( $body_background_type, 'none' ); ?>><?php echo esc_html__('None','ssel');?></option>
                      <option value="pattern" id="body_background_type_pattern"  <?php selected( $body_background_type, 'pattern' ); ?>><?php echo esc_html__('Pattern','ssel');?></option>
                      <option value="custom" id="body_background_type_custom"  <?php selected( $body_background_type, 'custom' ); ?>><?php echo esc_html__('Custom Image','ssel');?></option>
                    </select>
                </td>
            </tr>            
            <tr class="meta_ssel_body_background_pattern">
                <th ><label for="body_background_pattern"><?php echo esc_html__('Background Pattern','ssel');?></label></th>
                <td>
 					<?php for ($i = 1; $i <= 23; $i++) {  ?>
                        <li>
                            <input  name="body_background_pattern" id="body_background_pattern-default"  value="<?php echo esc_attr($i) ?>" type="radio" <?php checked( $body_background_pattern, $i );?>>
                          </li>                    
 					<?php }?>                      
                     
                </td>
            </tr> 
            
            <tr class="meta_ssel_body_background_image">
                <th ><label for="body_background_image"><?php echo esc_html__('Custom Background Image','ssel');?></label></th>
                <td> 
	  	 		<a class="rd_add_image button button-small"  data-uploader-title="<?php echo esc_attr__('Choose Image','ssel');?>" data-uploader-button-text="<?php echo esc_attr__('Use This Image','ssel');?>"> <?php echo esc_html__('Upload','ssel')?></a>
 				<input type="hidden" name="body_background_image" value="<?php echo esc_url($body_background_image);?>">
 		
				<?php if(!empty($body_background_image)){     ?>
 	   			<a class="rd_remove_image button button-small" ><?php echo  esc_html__('Remove','ssel');?></a>
 		 		<img   src="<?php echo esc_url($body_background_image) ?>"/> 
                <?php }?>
                </td>
            </tr>               
                    
 
                        
     	</tbody>
     </table>
    <?php
}  
 }
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
														 			Save Page Metabox
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_save_page_metabox' ) ) {

add_action('save_post', 'ssel_save_page_metabox');
function ssel_save_page_metabox( $post_id){ 
    global $post;
	  if (!current_user_can('edit_post', $post_id)) return;
	
	
	if (  isset($_POST['sidebar_page_right']) ) {
		update_post_meta($post_id, 'sidebar_page_right', sanitize_text_field($_POST['sidebar_page_right']));
	}else{
		delete_post_meta($post_id, 'sidebar_page_right');
	}			 
	
	if (  isset($_POST['sidebar_page_left']) ) {
		update_post_meta($post_id, 'sidebar_page_left', sanitize_text_field($_POST['sidebar_page_left']));
	}else{
		delete_post_meta($post_id, 'sidebar_page_left');
	}			 	
	   			 	
	   
  
	 
 
	 		    
}
 }

