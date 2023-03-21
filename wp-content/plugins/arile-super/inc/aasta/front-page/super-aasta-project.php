<?php 
$aasta_project_content  = get_theme_mod( 'aasta_project_content');
$aasta_project_disabled = get_theme_mod('aasta_project_disabled', true); 
$aasta_project_front_container_size = get_theme_mod('aasta_project_front_container_size', 'container');
$aasta_project_area_title = get_theme_mod('aasta_project_area_title', __('Our Projects','arile-super'));
$aasta_project_area_des = get_theme_mod('aasta_project_area_des', __('Our Latest Works','arile-super'));
$aasta_project_button_text = get_theme_mod('aasta_project_button_text', __('View All Projects','arile-super'));
$aasta_project_button_link = get_theme_mod('aasta_project_button_link', '#');
if($aasta_project_disabled == true): ?>
	<section class="theme-block theme-project theme-bg-grey pb-5" id="theme-project">
	    <?php if($aasta_project_area_title != null || $aasta_project_area_des != null): ?>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="theme-section-module text-center">
					<?php if($aasta_project_area_title != null): ?>
						<h2 class="section-area-title wow animate fadeInUp" data-wow-delay=".3s"><?php echo wp_kses_post($aasta_project_area_title); ?></h2>
					<?php endif; ?>
					<div class="theme-separator-line-horrizontal-full wow animate fadeInUp" data-wow-delay=".3s"></div>
					<?php if($aasta_project_area_des != null): ?>
						<p class="section-area-desc wow animate fadeInUp" data-wow-delay=".3s"><?php echo wp_kses_post($aasta_project_area_des); ?></p>
					<?php endif; ?>
					</div>
				</div>
			</div>
		</div>	
		<?php endif; ?>
		<div class="<?php echo esc_attr( $aasta_project_front_container_size ); ?>">
			<div class="row theme-project-row">		
				<?php 
				if ( ! empty( $aasta_project_content ) ) {
				$allowed_html = array('br' => array(), 'em' => array(), 'strong' => array(), 'b' => array(),'i' => array());
					$aasta_project_content = json_decode($aasta_project_content);
						foreach ( $aasta_project_content as $project_item ) {
						$image_url = ! empty( $project_item->image_url ) ? $project_item->image_url : '';
						$title = ! empty( $project_item->title ) ? $project_item->title : '';
						$text = ! empty( $project_item->text ) ? $project_item->text : '';
						?>
							<div class="col-lg-4 col-md-6 col-sm-12">	
								<article class="theme-project-content wow animate zoomIn" data-wow-delay=".3s">
								<?php if ( ! empty( $image_url ) || ! empty( $title ) || ! empty( $text ) ) :?>
									<figure class="portfolio-thumbnail">
										<img src="<?php echo esc_url( $image_url ); ?>" class="img-fluid" alt="<?php echo esc_html( $title ); ?>">
										<div class="content-overlay"></div>
										<div class="click-view">
										<?php if ( ! empty( $title ) ) :?>
											<h5 class="theme-project-title"><?php echo esc_html( $title ); ?></h5>
										<?php endif; ?>
										<?php if ( ! empty( $text ) ) :?>					
											<p><?php echo wp_kses( html_entity_decode( $text ), $allowed_html ); ?></p>
										<?php endif; ?>
										</div>
									</figure>
								<?php endif; ?>
								</article>
							</div>
				<?php } } else { ?>
				       
							<div class="col-lg-4 col-md-6 col-sm-12">	
								<article class="theme-project-content wow animate zoomIn" data-wow-delay=".3s">
									<figure class="portfolio-thumbnail">
										<img src="<?php echo arile_super_plugin_url; ?>/inc/aasta/images/theme-project1.jpg" class="img-fluid" alt="BEDROOM LIGHTING DÉCOR">
										<div class="content-overlay"></div>
										<div class="click-view">
										<h5 class="theme-project-title"><?php esc_html_e('StartUp Business','arile-super'); ?></h5>
										</div>
									</figure>
								</article>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-12">	
								<article class="theme-project-content wow animate zoomIn" data-wow-delay=".3s">
									<figure class="portfolio-thumbnail">
										<img src="<?php echo arile_super_plugin_url; ?>/inc/aasta/images/theme-project2.jpg" class="img-fluid" alt="EXTERIOR RENOVATION">
										<div class="content-overlay"></div>
										<div class="click-view">
										<h5 class="theme-project-title"><?php esc_html_e('Market Expansion','arile-super'); ?></h5>
										</div>
									</figure>
								</article>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-12">	
								<article class="theme-project-content wow animate zoomIn" data-wow-delay=".3s">
									<figure class="portfolio-thumbnail">
										<img src="<?php echo arile_super_plugin_url; ?>/inc/aasta/images/theme-project3.jpg" class="img-fluid" alt="ARCHITECTURE DESIGN">
										<div class="content-overlay"></div>
										<div class="click-view">
										<h5 class="theme-project-title"><?php esc_html_e('Data Analytics','arile-super'); ?></h5>
										</div>
									</figure>
								</article>
							</div>	
						<?php } ?>
			</div>
		</div>
		<?php if ( ! empty( $aasta_project_button_text ) ) :?>
			<div class="container-fluid pl-0 pr-0 pt-5 pb-5">
				<div class="row">
					<div class="col-lg-12">
						<div class="mx-auto theme-text-center wow animate fadeInUp" data-wow-delay=".3s">
							<a href="<?php echo esc_url( $aasta_project_button_link ); ?>" target="_blank" class="btn-small btn-default"><?php echo esc_html($aasta_project_button_text); ?></a>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
		
</section>
<?php endif; ?>