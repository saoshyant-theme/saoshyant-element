<?php
 
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
														 			Blog Metabox
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_blog_metabox' ) ) {

add_action( 'add_meta_boxes', 'ssel_blog_metabox' );
function ssel_blog_metabox($post){
    add_meta_box('ssel_blog_general_metabox',esc_html__('General Options','ssel'), 'ssel_blog_general_metabox', 'post', 'normal' , 'high');
     add_meta_box('ssel_blog_video_metabox',esc_html__('Video','ssel'), 'ssel_blog_video_metabox', 'post', 'normal' , 'high');
 
}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
														 			Blog General Metabox
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_blog_general_metabox' ) ) {

function ssel_blog_general_metabox($post){
	global $post;
	$custom = get_post_custom($post->ID);
	$sidebars  = ssel_array_options('sidebars');
	$ssel_ratio  = ssel_array_options('ratio4');
  	 
	$featured_image_meta = get_post_meta($post->ID, 'featured_image_meta', true);
    $single_template = get_post_meta($post->ID, 'single_template', true);
    $single_right = get_post_meta($post->ID, 'sidebar_single_right', true);
    $single_left = get_post_meta($post->ID, 'sidebar_single_left', true);
    $ratio = get_post_meta($post->ID, 'single_ratio', true);
   	$full_width_value = get_post_meta($post->ID, 'full_width', true);
     if($full_width_value == "yes"){ $full_width_checked = 'checked="checked"';}else{$full_width_checked='';} 
    $hide_post_tags = get_post_meta($post->ID, 'hide_post_tags', true); 
    $hide_post_meta = get_post_meta($post->ID, 'hide_post_meta', true);
    $hide_post_share = get_post_meta($post->ID, 'hide_post_share', true);
     $hide_author_box = get_post_meta($post->ID, 'hide_author_box', true);
    $hide_related_post = get_post_meta($post->ID, 'hide_related_post', true);
    $hide_banner_below = get_post_meta($post->ID, 'hide_banner_below', true);
    $hide_comments = get_post_meta($post->ID, 'hide_comments', true);
    $primary_color = get_post_meta($post->ID, 'primary_color', true);
    $body_background_color = get_post_meta($post->ID, 'body_background_color', true);
    $body_background_type = get_post_meta($post->ID, 'body_background_type', true);
    $body_background_image = get_post_meta($post->ID, 'body_background_image', true);
    $body_background_image_medium = get_post_meta($post->ID, 'body_background_image_medium', true);
    $body_background_pattern = get_post_meta($post->ID, 'body_background_pattern', true);
	
    	?>
	 
	<table class="form-table meta_box">     
		<tbody>
        	
            <tr class="meta_ssel_featured_image_meta">
                <th><label for="featured_image_meta"><?php echo esc_html__('Featured Image Meta','ssel');?></label></th>
                <td>
                    <select name="featured_image_meta" id="featured_image_meta">
                      <option value="" <?php selected( $featured_image_meta, '' ); ?>><?php echo esc_html__('None','ssel');?></option>
                      <option value="video" <?php selected( $featured_image_meta, 'video' ); ?>><?php echo esc_html__('Video','ssel');?></option>
                     </select>
                </td>
            </tr>
            <tr rd-parant="" class="meta_ssel_single_template">
				<th><label for="single_template"><?php echo esc_html__('Single template','ssel');?></label></th>
				<td>
                        <li class="single_template-default">
                            <input name="single_template" id="single_template-default"  value="default" type="radio" <?php checked( $single_template, 'default' );?>>
                          </li>
                         <li class="single_template-1">
                            <input  name="single_template" id="single_template-1" value="1" type="radio" <?php checked( $single_template, '1' );?>>
                          </li>
                         <li class="single_template-2">
                            <input  name="single_template" id="single_template-2" value="2" type="radio" <?php checked( $single_template, '2' );?>>
                         </li>
                        <li class="single_template-3"><input  name="single_template" id="single_template-3" value="3" type="radio" <?php checked( $single_template, '3' );?>>
                         </li>
                        <li class="single_template-4" ><input  name="single_template" id="single_template-4" value="4" type="radio" <?php checked( $single_template, '4' );?>>
                   		</li>
                        <li class="single_template-5" ><input  name="single_template" id="single_template-5" value="5" type="radio" <?php checked( $single_template, '5' );?>>
                   		</li>
                        <li class="single_template-6" ><input  name="single_template" id="single_template-6" value="6" type="radio" <?php checked( $single_template, '6' );?>>
                   		</li>
                                                                                         
                </td>
       
        	
            <tr class="meta_ssel_single_sidebar">
                <th ><label for="single_sidebar"><?php echo esc_html__('Custom Sidebar Right','ssel');?></label></th>
                <td>
					<select name="sidebar_single_right" id="single_sidebar">
                          	<?php if(!empty($sidebars) && is_array($sidebars) ){  ?>
                        		<?php foreach ($sidebars as $key => $name){  ?>
                    			<option value="<?php echo ''.esc_attr($key) ?>" <?php  if ( $sidebars  == ''.$key ){ echo 'selected=""';} ?>><?php echo esc_html($name);?></option> 
							<?php }?>                      
							<?php }?>                      
                    </select>
                    
                </td>
            </tr> 
			<tr class="meta_ssel_single_sidebar">
                <th ><label for="single_sidebar"><?php echo esc_html__('Custom Sidebar Left','ssel');?></label></th>
                <td>
					<select name="sidebar_single_left" id="single_sidebar">
                          	<?php if(!empty($sidebars) && is_array($sidebars) ){  ?>
                        		<?php foreach ($sidebars as $key => $name){  ?>
                    			<option value="<?php echo ''.esc_attr($key) ?>" <?php  if ( $single_left  == ''.$key ){ echo 'selected=""';} ?>><?php echo esc_html($name);?></option> 
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
                      <option value="hide" <?php selected( $hide_post_tags, 'hide' ); ?>>Hide</option>
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
                   
                   
            <tr class="meta_ssel_hide_author_box">
                <th ><label for="hide_author_box"><?php echo esc_html__('Hide Author Bio','ssel');?></label></th>
                <td>
                    <select name="hide_author_box" id="hide_author_box">
                       <option value="" <?php selected($hide_author_box, '' ); ?>><?php echo esc_html__('Default','ssel');?></option>
                      <option value="hide" <?php selected( $hide_author_box, 'hide' ); ?>><?php echo esc_html__('Hide','ssel');?></option>
                    </select>
                </td>
            </tr>        
                   
                   
                    
            <tr class="hide_related_post">
                <th ><label for="hide_related_post"><?php echo esc_html__('Hide Related Post','ssel');?></label></th>
                <td>
                    <select name="hide_related_post" id="hide_related_post">
                       <option value="" <?php selected($hide_related_post, '' ); ?>><?php echo esc_html__('Default','ssel');?></option>
                      <option value="hide" <?php selected( $hide_related_post, 'hide' ); ?>><?php echo esc_html__('Hide','ssel');?></option>
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

            <tr class="meta_ssel_hide_comments">
                <th ><label for="hide_comments"><?php echo esc_html__('Hide Comments','ssel');?></label></th>
                <td>
                    <select name="" id="hide_comments">
                       <option value="" <?php selected($hide_comments, '' ); ?>><?php echo esc_html__('Default','ssel');?></option>
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
 					<?php for ($i = 1; $i <= 23; $i++) {
						
						$bg='bg'.$i;  ?>
                        <li>
                            <input  name="body_background_pattern" id="body_background_pattern-default"  value="<?php echo esc_attr($bg) ?>" type="radio" <?php checked( $body_background_pattern, $bg );?>>
                          </li>                    
 					<?php }?>                      
                     
                </td>
            </tr> 
            
            <tr class="meta_ssel_body_background_image">
                <th ><label for="body_background_image"><?php echo esc_html__('Custom Background Image','ssel');?></label></th>
                <td> 
 	  	 		<a class="rd_add_image button button-small"  data-uploader-title="<?php echo esc_attr__('Choose Image','ssel');?>" data-remove="<?php echo esc_attr__('Remove','ssel');?>"  data-uploader-button-text="<?php echo esc_attr__('Use This Image','ssel');?>"> <?php echo esc_html__('Upload','ssel')?></a>
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
 
														 			Blog Video Metabox
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_blog_video_metabox' ) ) {

function ssel_blog_video_metabox($post){
	global $post;
	$custom = get_post_custom($post->ID);
    
  	$video = get_post_meta($post->ID, 'video', true);
    if($video == "yes"){ $video_checked = 'checked="checked"';}else{$video_checked='';} 
    $video_type = get_post_meta($post->ID, 'video_type', true);  
     $video_url = get_post_meta($post->ID, 'video_url', true);  
	
	 
	?>
	 
	<table class="form-table meta_box">     
		<tbody> 
        
            <tr class="meta_ssel_video">
                <th ><label for="video"><?php echo esc_html__('Featured Video','ssel');?></label></th>
                <td>
                    <input type="checkbox" name="video" id="video" value="yes" <?php echo wp_kses_post($video_checked); ?> />
					<label for="video"><span class="description"><?php echo esc_html__('checkbox Show Featured Video','ssel');?></span></label>                    
                </td>
            </tr>            

            <tr class="meta_ssel_video_type">
                <th ><label for="video_type"><?php echo esc_html__('Featured Video Type','ssel');?></label></th>
                <td>
                    <select name="video_type" id="video_type">
                       <option value="mp4" <?php selected($video_type, 'mp4' ); ?>><?php echo esc_html__('Mp4','ssel');?></option>
                      <option value="youtube" <?php selected( $video_type, 'youtube' ); ?>><?php echo esc_html__('Youtube','ssel');?></option>
                      <option value="aparat" <?php selected( $video_type, 'aparat' ); ?>><?php echo esc_html__('Aparat','ssel');?></option>
                    </select>
                </td>
            </tr>   


            <tr class="meta_ssel_video_url">
                <th ><label for="video_url"><?php echo esc_html__('Featured Video Url','ssel');?></label></th>
                <td>
                    <input  type="text" name="video_url" id="video_url" value="<?php if(!empty($video_url))echo esc_attr($video_url); ?>"  /><br>
 				</td>
            </tr>    
            
     	</tbody>
     </table>
    <?php
}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
														 			Save Blog  Metabox
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_save_blog_metabox' ) ) {

add_action('save_post', 'ssel_save_blog_metabox');
function ssel_save_blog_metabox( $post_id){ 
    global $post;
	    if (!current_user_can('edit_post', $post_id)) return;

	if ( isset($_POST['featured_image_meta']) ) {
		update_post_meta($post_id, 'featured_image_meta', sanitize_text_field($_POST['featured_image_meta']));
	}else{
		delete_post_meta($post_id, 'featured_image_meta');
	}
  
	
	if (  isset($_POST['single_template']) ) {
		update_post_meta($post_id, 'single_template', sanitize_text_field($_POST['single_template']));
	}else{
		delete_post_meta($post_id, 'single_template');
	}
	
	if (  isset($_POST['single_template']) ) {
		update_post_meta($post_id, 'single_template',sanitize_text_field( $_POST['single_template']));
	}else{
		delete_post_meta($post_id, 'single_template');
	}
 
	if (   isset($_POST['sidebar_single_right']) ) {
		update_post_meta($post_id, 'sidebar_single_right', sanitize_text_field($_POST['sidebar_single_right']));
	}else{
		delete_post_meta($post_id, 'sidebar_single_right');
	}			 
	
	if (   isset($_POST['sidebar_single_left']) ) {
		update_post_meta($post_id, 'sidebar_single_left',sanitize_text_field( $_POST['sidebar_single_left']));
	}else{
		delete_post_meta($post_id, 'sidebar_single_left');
	}		
	
	 	
	   
	if ( isset($_POST['full_width']) ) {
		update_post_meta($post_id, 'full_width',sanitize_text_field( $_POST['full_width']));
	}else{
		delete_post_meta($post_id, 'full_width');
	}
	
	if ( isset($_POST['hide_post_tags']) ) {
		update_post_meta($post_id, 'hide_post_tags',sanitize_text_field( $_POST['hide_post_tags']));
	}else{
		delete_post_meta($post_id, 'hide_post_tags');
	}		
	
	if (  isset($_POST['hide_post_meta']) ) {
		update_post_meta($post_id, 'hide_post_meta',sanitize_text_field( $_POST['hide_post_meta']));
	}else{
		delete_post_meta($post_id, 'hide_post_meta');
	}		
	
	if (  isset($_POST['hide_post_share']) ) {
		update_post_meta($post_id, 'hide_post_share',sanitize_text_field( $_POST['hide_post_share']));
	}else{
		delete_post_meta($post_id, 'hide_post_share');
	}				 
	
	if ( isset($_POST['hide_author_box']) ) {
		update_post_meta($post_id, 'hide_author_box', sanitize_text_field($_POST['hide_author_box']));
	}else{
		delete_post_meta($post_id, 'hide_author_box');
	}								 

	if ( isset($_POST['hide_related_post']) ) {
		update_post_meta($post_id, 'hide_related_post',sanitize_text_field( $_POST['hide_related_post']));
	}else{
		delete_post_meta($post_id, 'hide_related_post');
	}	
	 

	if ( isset($_POST['hide_banner_below']) ) {
		update_post_meta($post_id, 'hide_banner_below', sanitize_text_field($_POST['hide_banner_below']));
	}else{
		delete_post_meta($post_id, 'hide_banner_below');
	}	
	
	if ( isset($_POST['hide_comments']) ) {
		update_post_meta($post_id, 'hide_comments',sanitize_text_field( $_POST['hide_comments']));
	}else{
		delete_post_meta($post_id, 'hide_comments');
	}	 	  
	   
	  
	 
	if ( isset($_POST['video']) ) {
		update_post_meta($post_id, 'video', sanitize_text_field($_POST['video']));
	}else{
		delete_post_meta($post_id, 'video');
	}
	
	if ( isset($_POST['video_type']) ) {
		update_post_meta($post_id, 'video_type',sanitize_text_field( $_POST['video_type']));
	}else{
		delete_post_meta($post_id, 'video_type');
	}	 			 		 

	if (  isset($_POST['video_url']) ) {
		update_post_meta($post_id, 'video_url', sanitize_text_field($_POST['video_url']));
	}else{
		delete_post_meta($post_id, 'video_url');
	}	 			 		 

 
	
	if ( isset($_POST['body_background_color']) ) {
		update_post_meta($post_id, 'body_background_color',sanitize_text_field( $_POST['body_background_color']));
	}else{
		delete_post_meta($post_id, 'body_background_color');
	}		

	if (isset($_POST['body_background_type']) ) {
		update_post_meta($post_id, 'body_background_type',sanitize_text_field( $_POST['body_background_type']));
	}else{
		delete_post_meta($post_id, 'body_background_type');
	}
	
	 		 	   


	if (  isset($_POST['body_background_image']) ) {
		update_post_meta($post_id, 'body_background_image', sanitize_text_field($_POST['body_background_image']));
	}else{
		delete_post_meta($post_id, 'body_background_image');
	}
 
	
	if (  isset($_POST['body_background_pattern']) ) {
		update_post_meta($post_id, 'body_background_pattern', sanitize_text_field($_POST['body_background_pattern']));
	}else{
		delete_post_meta($post_id, 'body_background_pattern');
	}			    
 
		
}
 }

