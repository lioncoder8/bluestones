<?php
$aasta_testimonial_options = get_theme_mod('aasta_testimonial_content');
$aasta_testimonial_disabled = get_theme_mod('aasta_testimonial_disabled', true); 
$aasta_testimonial_area_title = get_theme_mod('aasta_testimonial_area_title', __('Our Customer','arile-aasta'));
$aasta_testimonial_area_des = get_theme_mod('aasta_testimonial_area_des', __('What Say Our Happy Clients','arile-aasta'));
$aasta_testimonial_overlay_disable = get_theme_mod('aasta_testimonial_overlay_disable', true); 
if($aasta_testimonial_disabled == true): 
?>
<section class="theme-block theme-testimonial vrsn-two" id="theme-testimonial">	

	<?php if($aasta_testimonial_overlay_disable == true) {?>
    <div class="theme-testimonial-overlay"></div>
	<?php } ?>
	
	<div class="container">	
	     <?php if($aasta_testimonial_area_title != null || $aasta_testimonial_area_des != null): ?>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="theme-section-module text-center">
					<?php if($aasta_testimonial_area_title != null): ?>
						<h2 class="section-area-title wow animate fadeInUp" data-wow-delay=".3s"><?php echo wp_kses_post($aasta_testimonial_area_title); ?></h2>
					<?php endif; ?>
						<div class="theme-separator-line-horrizontal-full wow animate fadeInUp" data-wow-delay=".3s"></div>
					<?php if($aasta_testimonial_area_des != null): ?>
						<p class="section-area-desc wow animate fadeInUp" data-wow-delay=".3s"><?php echo wp_kses_post($aasta_testimonial_area_des); ?></p>
					<?php endif; ?>
					</div>
				</div>
			</div>
	    <?php endif; ?>
			<div class="row theme-testimonial-content">
			<?php
			$aasta_testimonial_options = json_decode($aasta_testimonial_options);
			if( $aasta_testimonial_options!='' )
			{
			$allowed_html = array('br' => array(), 'em' => array(), 'strong' => array(), 'b' => array(),'i' => array());
					foreach($aasta_testimonial_options as $testimonial_iteam){ 
							$title = ! empty( $testimonial_iteam->title ) ? $testimonial_iteam->title : '';
							$test_desc = ! empty( $testimonial_iteam->text ) ? $testimonial_iteam->text : '';
							$designation = ! empty( $testimonial_iteam->designation ) ? $testimonial_iteam->designation : '';
					?>
					    <div class="col-lg-4 col-md-6 col-sm-12">
						   
						   	<article class="theme-testimonial-block vrsn-two wow animate fadeInUp" data-wow-delay=".3s">
								<div class="testimonial-content vrsn-two">
									<?php if($test_desc != null): ?>
										<p><?php echo wp_kses( html_entity_decode( $test_desc ), $allowed_html ); ?></p>
									<?php endif; ?>			
								</div>	
								<div class="media">
									<?php if($testimonial_iteam->image_url != null): ?>
										<figure class="thumbnail">
											<img src="<?php echo esc_url( $testimonial_iteam->image_url ); ?>" class="img-fluid rounded-circle" alt="<?php echo esc_html($title); ?>" >
										</figure>
									<?php endif; ?>							
										<div class="media-body align-self-center">								
											<?php if($title != null): ?>	
												<cite class="name">
													<?php echo esc_html($title); ?>
												</cite>
											<?php endif; ?>		
											<?php if($designation != null): ?>	
												<span class="position"><?php echo esc_html($designation); ?></span>
											<?php endif; ?>
										</div>
		                        </div>
							</article>
							
					    </div>
					<?php } } else { ?>
					
					<div class="col-lg-4 col-md-6 col-sm-12">
						<article class="theme-testimonial-block vrsn-two wow animate fadeInUp" data-wow-delay=".3s">
								<div class="testimonial-content vrsn-two">
									<p><?php esc_html_e('"You guys are legendary! You guys are great and having amazing support & service. I couldn’t ask for any better. Thank you!"','arile-super'); ?></p>
								</div>
								<div class="media">
									<figure class="thumbnail">
										<img src="<?php echo arile_super_plugin_url; ?>/inc/aasta/images/theme-user1.jpg" class="img-fluid rounded-circle" alt="Rosa Linn">
									</figure>						
									<div class="media-body align-self-center">								
										<cite class="name"><?php esc_html_e('Rosa Linn','arile-super'); ?></cite>
								        <span class="position"><?php esc_html_e('Founder','arile-super'); ?></span>
									</div>
		                        </div>
						</article>	
					</div>
				    <div class="col-lg-4 col-md-6 col-sm-12">
						<article class="theme-testimonial-block vrsn-two wow animate fadeInUp" data-wow-delay=".3s">
								<div class="testimonial-content vrsn-two">
									<p><?php esc_html_e('"You guys are legendary! You guys are great and having amazing support & service. I couldn’t ask for any better. Thank you!"','arile-super'); ?></p>
								</div>
								<div class="media">
									<figure class="thumbnail">
										<img src="<?php echo arile_super_plugin_url; ?>/inc/aasta/images/theme-user2.jpg" class="img-fluid rounded-circle" alt="Herman Girard">
									</figure>						
									<div class="media-body align-self-center">								
										<cite class="name"><?php esc_html_e('Herman Girard','arile-super'); ?></cite>
								        <span class="position"><?php esc_html_e('Financer','arile-super'); ?></span>
									</div>
		                        </div>
						</article>	
					</div>
					<div class="col-lg-4 col-md-6 col-sm-12">
						<article class="theme-testimonial-block vrsn-two wow animate fadeInUp" data-wow-delay=".3s">
								<div class="testimonial-content vrsn-two">
									<p><?php esc_html_e('"You guys are legendary! You guys are great and having amazing support & service. I couldn’t ask for any better. Thank you!"','arile-super'); ?></p>
								</div>
								<div class="media">
									<figure class="thumbnail">
										<img src="<?php echo arile_super_plugin_url; ?>/inc/aasta/images/theme-user3.jpg" class="img-fluid rounded-circle" alt="Alexia Dior">
									</figure>						
									<div class="media-body align-self-center">								
										<cite class="name"><?php esc_html_e('Alexia Dior','arile-super'); ?></cite>
								        <span class="position"><?php esc_html_e('Designer','arile-super'); ?></span>
									</div>
		                        </div>
						</article>	
					</div>
					
		        <?php } ?>
		    </div>
	</div>		
</section>
<?php endif; ?>