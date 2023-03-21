<?php 
$aasta_service_content  = get_theme_mod( 'aasta_service_content'); 
$aasta_service_area_disabled = get_theme_mod('aasta_service_area_disabled', true); 
$aasta_service_area_title = get_theme_mod('aasta_service_area_title', __('Our Features','arile-super'));
$aasta_service_area_des = get_theme_mod('aasta_service_area_des', __("World's Best Services We Provide To Grow Your Business",'arile-super'));
if($aasta_service_area_disabled == true): ?>
<section class="theme-block theme-services" id="theme-services">
	<div class="container">
	<?php  
	if( ($aasta_service_area_title) || ($aasta_service_area_des)!='' ): ?>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="theme-section-module text-center">
						<?php if($aasta_service_area_title != null): ?>
							<h2 class="section-area-title wow animate fadeInUp" data-wow-delay=".3s"><?php echo wp_kses_post($aasta_service_area_title); ?></h2>
						<?php endif; ?>
							<div class="theme-separator-line-horrizontal-full wow animate fadeInUp" data-wow-delay=".3s"></div>
						<?php if($aasta_service_area_des != null): ?>
							<p class="section-area-desc wow animate fadeInUp" data-wow-delay=".3s"><?php echo wp_kses_post($aasta_service_area_des); ?></p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	<div class="row theme-services-content">
		<?php
		if ( ! empty( $aasta_service_content ) ) {
		$allowed_html = array('br' => array(), 'em' => array(), 'strong' => array(), 'b' => array(),'i' => array());
		$aasta_service_content = json_decode( $aasta_service_content );
		foreach ( $aasta_service_content as $features_item ) {
			$icon = ! empty( $features_item->icon_value ) ? $features_item->icon_value : '';
			$title = ! empty( $features_item->title ) ? $features_item->title : '';
			$text = ! empty( $features_item->text ) ? $features_item->text : '';
			$link = ! empty( $features_item->link ) ? $features_item->link : '';
			$image = ! empty( $features_item->image_url ) ? $features_item->image_url : '';
			$open_new_tab = $features_item->open_new_tab;
			?>
			<div class="col-lg-4 col-md-6 col-sm-12">				
					<article class="service-content wow animate fadeInUp" data-wow-delay=".3s">
					<?php if($features_item->choice == 'customizer_repeater_image'){ ?>
							<?php if ( ! empty( $image ) ) : ?>
							<figure class="service-content-thumbnail text-center">
								<?php if ( ! empty( $link ) ) : ?>
									<a href="<?php echo esc_url( $link ); ?>" <?php if($open_new_tab== 'yes' || $open_new_tab== 'on') { echo "target='_blank'"; } ?>>
									   <img class="img-fluid" src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php endif; ?> />
									</a>
								<?php endif; ?>	
								<?php if ( empty( $link ) ) : ?>	
										<img class="img-fluid" src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php endif; ?> />
                                <?php endif; ?>	
                            </figure>								
							<?php endif; ?>
						<?php } else if($features_item->choice =='customizer_repeater_icon'){ ?>
							<?php if ( ! empty( $icon ) ) :?>
							<figure class="service-content-thumbnail text-center">
									<?php if ( ! empty( $link ) ) : ?>
											<a href="<?php echo esc_url( $link ); ?>" <?php if($open_new_tab== 'yes' || $open_new_tab== 'on') { echo "target='_blank'"; } ?>><i class="fa <?php echo esc_html( $icon ); ?>"></i></a>
									<?php endif; ?>
									<?php if ( empty( $link ) ) : ?>
											<i class="fa <?php echo esc_html( $icon ); ?>"></i>	
									<?php endif; ?>
							</figure>
							<?php endif; ?>
						<?php } ?>
						
							<?php if ( ! empty( $title ) ) : 
								if(empty($link)){ ?>
									<h5 class="service-title text-center"><?php echo esc_html( $title ); ?></h5><?php
								}else{
									?>
									<h5 class="service-title text-center"><a href="<?php echo esc_url( $link ); ?>" <?php if($open_new_tab =='yes'){?>target="_blank" <?php }?> ><?php echo esc_html( $title ); ?></a></h5><?php
								}
							?>
							<?php endif; ?>
							<?php if ( ! empty( $text ) ) : ?>
								<p class="text-center"><?php echo wp_kses_post( html_entity_decode( $text ) ); ?></p>
							<?php endif; ?>	
							
					</article>
			</div>
			<?php
			} }
			else
			{ ?>
				<div class="col-lg-4 col-md-6 col-sm-12">				
					<article class="service-content wow animate fadeInUp" data-wow-delay=".3s">
						<figure class="service-content-thumbnail text-center">
							<a href="#"><img class="img-fluid" src="<?php echo arile_super_plugin_url; ?>/inc/aasta/images/theme-service1.jpg" alt="SEO Friendly" title="SEO Friendly"></a>
						</figure>
						<h5 class="service-title text-center"><a href="#"><?php esc_html_e('SEO Friendly','arile-super'); ?></a></h5>
						<p class="text-center"><?php esc_html_e('Lorem Ipsum is simply text of the printing and typesetting industry. Lorem Ipsum has been standard dummy.','arile-super'); ?></p>
					</article>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12">				
					<article class="service-content wow animate fadeInUp" data-wow-delay=".3s">
						<figure class="service-content-thumbnail text-center">
							<a href="#"><img class="img-fluid" src="<?php echo arile_super_plugin_url; ?>/inc/aasta/images/theme-service2.jpg" alt="Translation & RTL Ready" title="Translation & RTL Ready"></a>
						</figure>
						<h5 class="service-title text-center"><a href="#"><?php esc_html_e('Translation & RTL Ready','arile-super'); ?></a></h5>
						<p class="text-center"><?php esc_html_e('Lorem Ipsum is simply text of the printing and typesetting industry. Lorem Ipsum has been standard dummy.','arile-super'); ?></p>		
					</article>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12">				
					<article class="service-content wow animate fadeInUp" data-wow-delay=".3s">
						<figure class="service-content-thumbnail text-center">
							<a href="#"><img class="img-fluid" src="<?php echo arile_super_plugin_url; ?>/inc/aasta/images/theme-service3.jpg" alt="Creative Design" title="Creative Design"></a>
						</figure>
						<h5 class="service-title text-center"><a href="#"><?php esc_html_e('Creative Design','arile-super'); ?></a></h5>
						<p class="text-center"><?php esc_html_e('Lorem Ipsum is simply text of the printing and typesetting industry. Lorem Ipsum has been standard dummy.','arile-super'); ?></p>
					</article>
				</div>
				
			<?Php	
		    } 
			?>
		</div>
	</div>
</section>
<?php endif;