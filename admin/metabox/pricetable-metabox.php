<?php
 
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																 Pricetable Metabox

*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_pricetable_meta_box' ) ) {
 add_action( 'add_meta_boxes', 'ssel_pricetable_meta_box' );
 
function ssel_pricetable_meta_box($post){
    add_meta_box('ssel_pricetable_metabox',esc_html__('Price Table','ssel'), 'ssel_pricetable_metabox', 'pricetable', 'normal' , 'high');
}
}
 if( ! function_exists( 'ssel_pricetable_metabox' ) ) {

function ssel_pricetable_metabox($post){
	global $post;
	$custom = get_post_custom($post->ID);
     $plan =   get_post_meta($post->ID, 'plan', true );
 	 $plan_json=ssel_pricetable_urldecode(json_decode($plan,true));
	  
     $details =  get_post_meta($post->ID, 'details', true );
	 $details_json=ssel_pricetable_urldecode(json_decode($details,true));
      $recommened = get_post_meta($post->ID, 'recommened', true);
	   
 	?>
	 
	<div class="rd-pricetable">     
        <div class="rd-pricetable-warp">
        
        
			<div class="rd-pricetable-head">
	
				<div class="rd-pricetable-heading" ></div>
				<ul class="pt-head-list">
					<li class="pt-head-item" data-id="title"><?php esc_html_e('Title:','ssel');?></li>
					<li class="pt-head-item"  data-id="price"><?php esc_html_e('Price:','ssel');?></li>
					<li class="pt-head-item"  data-id="priceinfo"><?php esc_html_e('Price info:','ssel');?></li>
					<li class="pt-head-item"  data-id="buttonurl"><?php esc_html_e('Button URL:','ssel');?></li>
					<li class="pt-head-item"  data-id="buttontext"><?php esc_html_e('Button Text:','ssel');?></li>
				</ul>
				<ul class="dt-head-list">
					<?php ssel_pricetable_details_head();?>
				</ul>
					  
			</div>
                
                
			<ul class="pt-plan-list">
				<?php if (!empty($plan_json)) :?>
				<?php foreach($plan_json as $key => $value) :?>  
                    
					<li class="pt-plan-item" data-key="<?php echo esc_attr($value['value']);?>"> 
						<div class="pt-plan-item-heading">
 							<input type="radio" id="label_<?php echo esc_attr($value['value']);?>" name="recommened" <?php checked( $recommened, $value['value'] ); ?> value="<?php echo esc_attr($value['value']);?>"> 
							<label for="label_<?php echo esc_attr($value['value']);?>"><?php esc_html_e('Recommend','ssel');?></label>						 

							<div class="pt-plan-item-move"></div>
							<div class="pt-plan-item-remove"></div>
							<div class="pt-plan-item-duplicate"></div>
						</div> 
						<ul class="pt-content-list"> 
                            	<?php ssel_pricetable_plan_content($key,$value);?>
						</ul>
						<ul class="dt-content-list">
							<?php ssel_pricetable_details_content($value['value']);?>
						</ul> 
                             
					</li>
                        
				<?php endforeach;?>
				<?php endif;?> 
			</ul>
             
 
			<div class="pt-add-plan"><span><?php esc_html_e('Add Plan','ssel');?></span></div>
		</div>
        
		<div class="dt-add-details-warp">
			<div class="dt-add-details"><span><?php esc_html_e('Add Details','ssel');?></span></div>
        
			<div class="dt-add-details-option">
  				<label ><?php echo __('Name:','ssel');?></label>
				<input type="text" name="" value="<?php esc_html_e('Details','ssel');?>">
				<div class="dt-add-details-add button button-primary button-medium"> <?php esc_html_e('Add Details','ssel');?></div>
				<div class="dt-add-details-cencel button   button-medium"> <?php esc_html_e('Cencel','ssel');?></div>
 			</div>
              
		</div>
 	</div>
    <?php
}  
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																 Pricetable Plan Content

*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_pricetable_plan_content' ) ) {
function ssel_pricetable_plan_content($key,$value){ ?>

 		<li class="pt-content-item pt-content-item-value" > 
			<input type="hidden" name="plan[<?php echo esc_attr($key);?>][value]"  value="<?php if(!empty($value['value'])) echo esc_html($value['value']);?>"></input>
		</li>
 
 		<li class="pt-content-item"> 
			<input type="text" name="plan[<?php echo esc_attr($key);?>][title]"  placeholder="<?php esc_html_e('Title:','ssel');?>"  value="<?php if(!empty($value['title'])) echo  esc_html($value['title']);?>"></input>
		</li>
		<li class="pt-content-item"> 
			<input type="text" name="plan[<?php echo esc_attr($key);?>][price]"  placeholder="<?php esc_html_e('Price:','ssel');?>"  value="<?php if( !empty($value['price'])) echo esc_html($value['price']);?>"></input>
		</li>
        
		<li class="pt-content-item"> 
			<input type="text" name="plan[<?php echo esc_attr($key);?>][priceinfo]"  placeholder="<?php esc_html_e('Price info:','ssel');?>"  value="<?php if(!empty($value['priceinfo'])) echo esc_html($value['priceinfo']);?>"></input>
		</li>
        
		<li class="pt-content-item"> 
			<input type="text" name="plan[<?php echo esc_attr($key);?>][buttonurl]"  placeholder="<?php esc_html_e('Button URL:','ssel');?>"  value="<?php if(!empty($value['buttonurl'])) echo esc_html($value['buttonurl']);?>"></input>
		</li>   
        
		<li class="pt-content-item"> 
			<input type="text" name="plan[<?php echo esc_attr($key);?>][buttontext]"  placeholder="<?php esc_html_e('Button Text:','ssel');?>"  value="<?php if(!empty($value['buttontext'])) echo esc_html($value['buttontext']);?>"></input>
		</li>           
<?php }
 }
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																 Pricetable Deatils Head

*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_pricetable_details_head' ) ) {
function ssel_pricetable_details_head(){ 

	global $post;
     $details =  get_post_meta($post->ID, 'details', true );
	 $details_json=ssel_pricetable_urldecode(json_decode($details,true));
	 
	if (!empty($details_json)) : 
	foreach($details_json as $key => $value) :
	
		if($value['child'] == 'heading'){
 		 
		 ?>
            <li class="dt-head-item" data-row=""  data-key="<?php echo esc_attr($key); ?>">
                <input type="hidden" name="details[<?php echo esc_attr($key);?>][child]"  value="<?php if(!empty($value['child'])) echo esc_html($value['child']);?>">
                <input type="hidden" name="details[<?php echo esc_attr($key);?>][value]"  value="<?php if(!empty($value['value'])) echo esc_html($value['value']);?>">
                   
                <div class="dt-head-item-heading"> 
                    <div class="dt-head-item-remove"></div>
                    <div class="dt-head-item-duplicate"></div>
                    <div class="dt-head-item-move"></div>
                    <div class="dt-head-item-edit"></div>
                </div>
				<span><?php if(!empty($value['value'])) echo esc_html($value['value']);?></span>
                  
            </li>
		<?php   
		}
	endforeach; 
	endif;  	  
 
}
 }
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																 Pricetable Deatils Content

*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_pricetable_details_content' ) ) {
function ssel_pricetable_details_content($old_key){ 

	global $post;
     $details =  get_post_meta($post->ID, 'details', true );
	 $details_json=ssel_pricetable_urldecode(json_decode($details,true));
	if (!empty($details_json)) : 
	foreach($details_json as $key => $value) :
	
		if($old_key == $value['child']){?>
        
            <li class="dt-content-item" data-row="" data-key="<?php echo esc_attr($key);?>">
                <input type="hidden" name="details[<?php echo esc_attr($key);?>][child]"  value="<?php if(!empty($value['child'])) echo esc_html($value['child']);?>"></input>
                <input type="text" name="details[<?php echo esc_attr($key);?>][value]"  value="<?php if(!empty($value['value'])) echo esc_html($value['value']);?>"></input>

				<div class="dt-content-item-move"></div>
                
                
            </li>
            
		<?php
    	}
	
	endforeach; 
	endif;  	  
 
}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Save Pricetable Metabox

*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_pricetable_save' ) ) {

add_action('save_post', 'ssel_pricetable_save');
 
function ssel_pricetable_save( $post_id){ 
    global $post;
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	
	if (!current_user_can('edit_post', $post_id)) return;

	if ( !empty($_POST['plan']) ) {
		$plan = sanitize_text_field(json_encode(ssel_pricetable_urlencode($_POST['plan'])));

		update_post_meta($post_id, 'plan',  $plan);
	}else{
		delete_post_meta($post_id, 'plan');
	}

	if ( !empty($_POST['details']) ) {
		$details = sanitize_text_field(json_encode(ssel_pricetable_urlencode($_POST['details'])));
 		update_post_meta($post_id, 'details', $details);
	}else{
		delete_post_meta($post_id, 'details');
	}	

	if ( !empty($_POST['recommened']) ) {
		update_post_meta($post_id, 'recommened', sanitize_text_field( $_POST['recommened']));
	}else{
		delete_post_meta($post_id, 'recommened');
	}	
  
}
 }
 
 
  if( ! function_exists( 'ssel_pricetable_urldecode' ) ) {

function ssel_pricetable_urldecode($array_or_string) {
    if( is_string($array_or_string) ){
        $array_or_string = urldecode($array_or_string);
    }elseif( is_array($array_or_string) ){
        foreach ( $array_or_string as $key => &$value ) {
            if ( is_array( $value ) ) {
                $value = ssel_pricetable_urldecode($value);
            } 
            else {
                $value = urldecode( $value );
            }
        }
    }

    return $array_or_string;
}
  }
 if( ! function_exists( 'ssel_pricetable_urlencode' ) ) {

function ssel_pricetable_urlencode($array_or_string) {
    if( is_string($array_or_string) ){
        $array_or_string = urlencode($array_or_string);
    }elseif( is_array($array_or_string) ){
        foreach ( $array_or_string as $key => &$value ) {
            if ( is_array( $value ) ) {
                $value = ssel_pricetable_urlencode($value);
            } 
            else {
                $value = urlencode( $value );
            }
        }
    }

    return $array_or_string;
}
 }
  ?>
