<?php
 
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
														 			Portfolio Custom Metabox
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_portfolio_custom_meta_box' ) ) {

add_action( 'add_meta_boxes', 'ssel_portfolio_custom_meta_box' );
function ssel_portfolio_custom_meta_box($post){
     add_meta_box('ssel_portfolio_metabox', esc_html__('Genral Options','ssel'), 'ssel_portfolio_meta_callback', 'portfolio', 'normal' , 'high');
 
	
  } 
 }
/*
 * @author    Daan Vos de Wael
 * @copyright Copyright (c) 2013, Daan Vos de Wael, http://www.daanvosdewael.com
 * @license   http://en.wikipedia.org/wiki/MIT_License The MIT License
*/
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
														 			Portfolio Metabox
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_portfolio_meta_callback' ) ) {

function ssel_portfolio_meta_callback($post) {
		global $post;

    wp_nonce_field( basename(__FILE__), 'ssel_portfolio_meta_nonce' );
		$sidebars  = ssel_array_options('sidebars');

	$ssel_ratio  = ssel_array_options('ratio6');
	$portfolio_external = get_post_meta($post->ID, 'portfolio_external', true);
    $portfolio_right = get_post_meta($post->ID, 'sidebar_portfolio_right', true);
    $portfolio_left = get_post_meta($post->ID, 'sidebar_portfolio_left', true);
    $ratio = get_post_meta($post->ID, 'portfolio_ratio', true);
   	$full_width_value = get_post_meta($post->ID, 'full_width', true);
     if($full_width_value == "yes"){ $full_width_checked = 'checked="checked"';}else{$full_width_checked='';} 
    $hide_post_tags = get_post_meta($post->ID, 'hide_post_tags', true); 
    $hide_post_meta = get_post_meta($post->ID, 'hide_post_meta', true);
    $hide_post_share = get_post_meta($post->ID, 'hide_post_share', true);
    $hide_banner_below = get_post_meta($post->ID, 'hide_banner_below', true);
	
	
    $ids = get_post_meta($post->ID, 'ssel_gallery_id', true);
	
	if(!empty($ids['json'])){
			$ids = json_decode($ids['json']);	
	}else{
  	  $ids = get_post_meta($post->ID, 'ssel_gallery_id', true);
	}
    $json = !empty($ids['json'])? $ids['json']:'';
      ?>
    <table class="form-table">
    
       <tr class="meta_ssel_portfolio_ratio">
                <th ><label for="portfolio_external"><?php echo esc_html__('External link  instead of Permalink','ssel');?></label></th>
                <td>
					<input type="text" name="portfolio_external" id="portfolio_external" value="<?php if(!empty($portfolio_external))echo  esc_attr($portfolio_external); ?>" />

                     
                </td>
            </tr>
    
   
        
 <tr class="meta_ssel_portfolio_sidebar">
                <th ><label for="portfolio_sidebar"><?php echo esc_html__('Custom Sidebar Right','ssel');?></label></th>
                <td>
					<select name="sidebar_portfolio_right" id="portfolio_sidebar">
                          	<?php if(!empty($sidebars) && is_array($sidebars) ){  ?>
                        		<?php foreach ($sidebars as $key => $name){  ?>
                    			<option value="<?php echo ''.esc_attr($key) ?>" <?php  if ( $sidebars  == ''.$key ){ echo 'selected=""';} ?>><?php echo esc_html($name);?></option> 
							<?php }?>                      
							<?php }?>                      
                    </select>
                    
                </td>
            </tr> 
			<tr class="meta_ssel_portfolio_sidebar">
                <th ><label for="portfolio_sidebar"><?php echo esc_html__('Custom Sidebar Left','ssel');?></label></th>
                <td>
					<select name="sidebar_portfolio_left" id="portfolio_sidebar">
                          	<?php if(!empty($sidebars) && is_array($sidebars) ){  ?>
                        		<?php foreach ($sidebars as $key => $name){  ?>
                    			<option value="<?php echo ''.esc_attr($key) ?>" <?php  if ( $portfolio_left  == ''.$key ){ echo 'selected=""';} ?>><?php echo esc_html($name);?></option> 
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
                      	
            <tr class="meta_ssel_hide_post_tags">
                <th ><label for="hide_post_tags"><?php echo esc_html__('Hide Post Tags','ssel');?></label></th>
                <td>
                    <select name="hide_post_tags" id="hide_post_tags">
                       <option value="" <?php selected( $hide_post_tags, '' ); ?>><?php echo esc_html__('Default','ssel');?></option>
                      <option value="hide" <?php selected( $hide_post_tags, 'hide' ); ?>><?php echo esc_html__('Hide','ssel');?></option>
                    </select>
                </td>
            </tr>  
            
            <tr class="meta_ssel_hide_post_meta">
                <th ><label for="hide_post_meta"><?php echo esc_html__('Hide Post Meta','ssel');?></label></th>
                <td>
                    <select name="hide_post_meta" id="hide_post_meta">
                       <option value="" <?php selected( $hide_post_meta, '' ); ?>><?php echo esc_html__('Default','ssel');?></option>
                      <option value="hide" <?php selected( $hide_post_meta, 'hide' ); ?>><?php echo esc_html__('Hide','ssel');?></option>
                    </select>
                </td>
            </tr>    
                  
            <tr class="meta_ssel_hide_post_share">
                <th ><label for="hide_post_share"><?php echo esc_html__('Hide Post Share','ssel');?></label></th>
                <td>
                    <select name="hide_post_share" id="hide_post_share">
                       <option value="" <?php selected( $hide_post_share, '' ); ?>><?php echo esc_html__('Default','ssel');?></option>
                      <option value="hide" <?php selected( $hide_post_share, 'hide' ); ?>><?php echo esc_html__('Hide','ssel');?></option>
                    </select>
                </td>
            </tr>        
            

            <tr class="meta_ssel_hide_banner_below">
                <th ><label for="hide_banner_below"><?php echo esc_html__('Hide Below Ads Widget','ssel');?></label></th>
                <td>
                    <select name="hide_banner_below" id="hide_banner_below">
                       <option value="" <?php selected($hide_banner_below, '' ); ?>><?php echo esc_html__('Default','ssel');?></option>
                      <option value="hide" <?php selected( $hide_banner_below, 'hide' ); ?>><?php echo esc_html__('Hide','ssel');?></option>
                    </select>
                </td>
            </tr>             
    
    
        <tr class="meta_ssel_portfolio_ratio">
                <th ><label for="portfolio_ratio"><?php echo esc_html__('Custom Image Ratio','ssel');?></label></th>
                <td>
					<select name="portfolio_ratio" id="portfolio_ratio">
                         	<?php if(!empty($ssel_ratio) && is_array($ssel_ratio) ){  ?>
                        	<?php foreach ($ssel_ratio as $key => $ratio_img){  ?>
                    			<option value="<?php echo esc_attr($key) ?>" <?php  if ( $ratio  == $key ){ echo 'selected=""';} ?>><?php echo esc_html($ratio_img);?></option> 
							<?php }
							}?>                      
                    </select>
                    
                </td>
            </tr> 
      <tr>
      
      <th ><label for="gallery_image"><?php echo esc_html__('Gallery Image','ssel');?></label></th><td>
      
        <a class="ssel-gallery-add button" href="#"  data-uploader-title="<?php echo esc_html__('Add image(s) to gallery','ssel');?>" data-change="<?php echo esc_html__('Change image','ssel');?>" data-remove="<?php echo esc_html__('Remove image','ssel');?>"  data-uploader-button-text="<?php echo esc_html__('Add image(s)','ssel');?>"><?php echo esc_html__('Add image(s)','ssel');?></a>

        <ul id="ssel-gallery-metabox-list">
        <?php if ($ids) : foreach ($ids as $key => $value) : $image = wp_get_attachment_image_src($value); ?>

          <li data-id="<?php echo esc_attr($value); ?>" data-key="<?php echo esc_attr($key); ?>">
             <img class="image-preview" src="<?php echo esc_url($image[0]); ?>">
            <a class="change-image button button-small" href="#" data-uploader-title="<?php echo esc_html__('Change image','ssel');?>" data-uploader-button-text="<?php echo esc_html__('Change image','ssel');?>"><?php echo esc_html__('Change image','ssel');?></a><br>
            <small><a class="remove-image" href="#"><?php echo esc_html__('Remove image','ssel');?></a></small>
          </li>

        <?php endforeach; endif; ?>
        </ul>
 		<textarea name="ssel_gallery_id[json]" id="ssel_gallery_id_json" ><?php echo wp_kses_post($json);?></textarea>
      </td></tr>
    </table>
  <?php

}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
														 			Save Portfolio Metabox
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_portfolio_meta_save' ) ) {

function ssel_portfolio_meta_save($post_id) {
    if (!isset($_POST['ssel_portfolio_meta_nonce']) || !wp_verify_nonce($_POST['ssel_portfolio_meta_nonce'], basename(__FILE__))) return;

    if (!current_user_can('edit_post', $post_id)) return;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
   if(!empty($_POST['portfolio_external'])) {
      update_post_meta($post_id, 'portfolio_external', sanitize_text_field($_POST['portfolio_external']));
    } else {
      delete_post_meta($post_id, 'portfolio_external');
	  
	  
    }
    if(!empty($_POST['ssel_gallery_id'])) {
      update_post_meta($post_id, 'ssel_gallery_id',sanitize_text_field( $_POST['ssel_gallery_id']));
    } else {
      delete_post_meta($post_id, 'ssel_gallery_id');
	  
	   
    }
	if ( !empty($_POST['portfolio_ratio']) ) {
		update_post_meta($post_id, 'portfolio_ratio', sanitize_text_field($_POST['portfolio_ratio']));
	}else{
		delete_post_meta($post_id, 'portfolio_ratio');
	}	
	
	
	 
	if ( !empty($_POST['sidebar_portfolio_right']) ) {
		update_post_meta($post_id, 'sidebar_portfolio_right',sanitize_text_field( $_POST['sidebar_portfolio_right']));
	}else{
		delete_post_meta($post_id, 'sidebar_portfolio_right');
	}			 
	
	if ( !empty($_POST['sidebar_portfolio_left']) ) {
		update_post_meta($post_id, 'sidebar_portfolio_left', sanitize_text_field($_POST['sidebar_portfolio_left']));
	}else{
		delete_post_meta($post_id, 'sidebar_portfolio_left');
	}			 	
	   		 	
	   
	if ( !empty($_POST['full_width']) ) {
		update_post_meta($post_id, 'full_width', sanitize_text_field($_POST['full_width']));
	}else{
		delete_post_meta($post_id, 'full_width');
	}
	
	if ( !empty($_POST['hide_post_tags']) ) {
		update_post_meta($post_id, 'hide_post_tags', sanitize_text_field($_POST['hide_post_tags']));
	}else{
		delete_post_meta($post_id, 'hide_post_tags');
	}		
	
	if ( !empty($_POST['hide_post_meta']) ) {
		update_post_meta($post_id, 'hide_post_meta', sanitize_text_field($_POST['hide_post_meta']));
	}else{
		delete_post_meta($post_id, 'hide_post_meta');
	}		
	
	if ( !empty($_POST['hide_post_share']) ) {
		update_post_meta($post_id, 'hide_post_share', sanitize_text_field($_POST['hide_post_share']));
	}else{
		delete_post_meta($post_id, 'hide_post_share');
	}			
	if ( !empty($_POST['hide_banner_below']) ) {
		update_post_meta($post_id, 'hide_banner_below', sanitize_text_field($_POST['hide_banner_below']));
	}else{
		delete_post_meta($post_id, 'hide_banner_below');
	}		
	
	 
	
}
add_action('save_post', 'ssel_portfolio_meta_save');
 }
