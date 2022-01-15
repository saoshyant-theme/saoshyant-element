<?php 
/**
 * Plugin Name: Sidebar Creator
 * Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
 * Description: It is Autometic sidebar Creator Plugin.
 * Version: 1.0.1
 * Author: souvikitobuz
 * Author URI: http://URI_Of_The_Plugin_Author
 * License: A "Slug" license name e.g. GPL2
 */
 
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Sidebar Creator
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_my_sidebar_menu' ) ) {

add_action( 'admin_menu', 'ssel_my_sidebar_menu' );

function ssel_my_sidebar_menu() {
	add_theme_page( esc_html__('Sidebar Plugin Optidons','ssel'), esc_html__('Add Sidebar','ssel'), 'manage_options', 'my-sidebar-unique-identifier', 'ssel_my_sidebar_options' );
}
 }
 if( ! function_exists( 'ssel_my_sidebar_options' ) ) {

function ssel_my_sidebar_options() {
    
 	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( esc_html__( 'You do not have sufficient permissions to access this page.' , 'ssel' ) );
	}
	?>
	
	<div class="my-form rd-add-sidebar">
        <div class="wrap">
		<h2><?php echo esc_html__('Sidebar Creator Settings' , 'ssel');?></h2>

		<form method="post" action="options.php" id="InputsWrapper"  role="form">

		<?php wp_nonce_field('update-options'); ?>
 
		<?php  
		$xx=get_option('ssel_boxes');
		$no=!empty($xx)?count($xx):'';
		if(isset($xx[0])) {
			$xx0 = $xx[0];
			
		}else{
			$xx0 =''; 
			
		}
		?>
        
		<div id="append">
            <p class="text-box">
                <label for="box1"><?php echo esc_html__('Sidebar' , 'ssel');?>-<span class="box-number">1</span></label>
                <input type="text" name="ssel_boxes[]" value="<?php echo esc_attr($xx0); ?>" id="box1" />
                <a href="#" class="remove-box"><?php echo esc_html__('Remove' , 'ssel');?></a>
            </p>
    
    
            
            <?php if($no>1){ ?>
                <?php for($i=1;$i<$no;$i++){?>		
                    <p class="text-box"><label for="box' + n + '"><?php echo esc_html__('Sidebar' , 'ssel');?>-<span class="box-number"><?php echo esc_html($i+1); ?></span></label> 
                    <input type="text" name="ssel_boxes[]" value="<?php echo esc_attr($xx[$i]); ?>" id="box' + n + '" /> 
                    <a href="#" class="remove-box"><?php echo esc_html__('Remove' , 'ssel');?></a>
                    </p>
                <?php }?>
            <?php }?>
		</div>
        <button type="button"  class="add-box"><?php echo esc_html__('Add More!' , 'ssel');?></button>
        
         
        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="page_options" value="no_of_sidebar,sidebar_names,ssel_boxes" />
        
        <p class="submit">
        	<button type="submit" class="button-primary clsSubmit" value="" /><?php echo esc_html__('Save Changes','ssel') ?></button>
        </p>
        
        
        </form>
		</div>
	</div>
      <?php
}}
 
//End ssel Edit
 
?>