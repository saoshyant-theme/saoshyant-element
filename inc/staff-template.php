<?php 
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
																		
																		Staff Single Template
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
global $smof_data,$post;
$ssel_meta = get_post_meta( $post->ID );
$ssel_box_layout_single= ssel_box_layout_single();
  
  ?>
<div class="rd-single-item ">
	<aside class="rd-element-item rd-element-single">
	<?php if ( have_posts() ) :?>
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="rd-post-list-boxid <?php echo esc_attr($ssel_box_layout_single);?>">
		<article class=" rd-post-a4   rd-single-post rd-post rd-single-ratio-auto" id="post-<?php esc_attr(the_ID()); ?>">
        
			<div <?php post_class(); ?>>
				 
						<div class="rd-staff-single-warp ">
                        
                            <div class="rd-thumb-item">
                            <div class="rd-thumb rd-single-thumb  rd-thumb-style">
                                     
                                <figure class="rd-single-thumb-warp "  >
                                <div class="rd-single-thumb-container"  >
                                    <?php the_post_thumbnail('full'); ?>
                                </div>
                                </figure>
                
                            </div>
                            </div>
                        
                             <div class="rd-staff-single-details rd-padding-right  rd-auto-width-item ">
                                <h1 class="rd-title rd-single-title entry-title rd-font-big"><?php the_title(); ?></h1>
                                
                                
                                
                                <?php
                                ssel_staff_position();
                                ssel_staff_social(array('icon_style'=>'style-2'));?>
 
								<?php								
                                ssel_staff_description();
								?>
								<div class="rd-staff-line rd-margin-top rd-margin rd-text-boxed rd-color-border rd-line"></div>
								<div class="rd-staff-meta rd-margin-top  rd-text-boxed "> 
 								
                                
                                <?php if(!empty( $ssel_meta['staff_real_name'][0]) ){?>
                                    <div class="rd-staff-meta-item ">
                                      <div class="rd-staff-meta-name"><?php echo ssel_t('real_name');?></div><div class="rd-staff-meta-value"><?php echo esc_attr($ssel_meta['staff_real_name'][0]);?></div> 
                                    </div>
                                <?php }?>
                                
                               <?php if(!empty( $ssel_meta['staff_url'][0]) ){?>
                                    <div class="rd-staff-meta-item" >
                                      <div class="rd-staff-meta-name"><?php echo ssel_t('website');?></div>
                                      <div class="rd-staff-meta-value">
                                      	<a href="<?php echo esc_url($ssel_meta['staff_url'][0]);?>"><?php echo esc_attr($ssel_meta['staff_url'][0]);?></a>
										</div> 
                                    </div>
                                <?php }?>
                                
                               <?php if(!empty( $ssel_meta['staff_phone'][0]) ){?>
                                    <div class="rd-staff-meta-item">
                                      <div class="rd-staff-meta-name"><?php echo ssel_t('phone');?></div><div class="rd-staff-meta-value"><?php echo esc_attr($ssel_meta['staff_phone'][0]);?></div> 
                                    </div>
                                <?php }?>
                                
                               <?php if(!empty( $ssel_meta['staff_skills'][0]) ){?>
                                    <div class="rd-staff-meta-item">
                                      <div class="rd-staff-meta-name"><?php echo ssel_t('skills');?></div><div class="rd-staff-meta-value"><?php echo esc_attr($ssel_meta['staff_skills'][0]);?></div> 
                                    </div>
                                <?php }?>
                                </div>
                                  
                               
                        </div>
                        </div>
         
        
                        
                                
                                      
                     
                         
                
                      
                
                <article class="rd-post-content rd-margin-top rd-text-boxed rd-font-medium">
                    <?php the_content();?>
                </article>
                 
					<?php ssel_wp_link_pages();?>
                     <?php edit_post_link(ssel_t('edit')); ?>
                   
                
               
 			</div>
		</article>
		</div>
	<?php endwhile;?>
	<?php endif; ?>
    </aside> 
 
 
</div>
