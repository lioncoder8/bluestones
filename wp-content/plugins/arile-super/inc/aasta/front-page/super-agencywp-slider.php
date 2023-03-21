<?php
$aasta_main_slider_options = get_theme_mod('aasta_main_slider_content');
$aasta_main_slider_disabled = get_theme_mod('aasta_main_slider_disabled', true);
$aasta_main_slider_overlay_disable = get_theme_mod('aasta_main_slider_overlay_disable', true);
if( $aasta_main_slider_disabled == true ): ?>
<section class="theme-main-slider" id="theme-slider">
    <div id="theme-main-slider" class="owl-carousel owl-theme">
		<?php 
			$aasta_main_slider_options = json_decode($aasta_main_slider_options);
			if( $aasta_main_slider_options!='' )
				{
					foreach($aasta_main_slider_options as $slide_iteam){	
						$title = ! empty( $slide_iteam->title ) ? $slide_iteam->title : '';
						$subtitle = ! empty( $slide_iteam->subtitle ) ? $slide_iteam->subtitle : '';
						$img_description = ! empty( $slide_iteam->text ) ? $slide_iteam->text : '';
						$readmorelink = ! empty( $slide_iteam->link ) ? $slide_iteam->link : '';	
						$readmore_button = ! empty( $slide_iteam->button_text ) ? $slide_iteam->button_text : '';
						$open_new_tab = $slide_iteam->open_new_tab;
						
			if($slide_iteam->image_url!=''){ ?>			
			<div class="item" style="background-image:url(<?php echo esc_url($slide_iteam->image_url); ?>);">
			<?php } ?>
			<?php if($title != '' || $img_description!= '' || $readmore_button!=''){ ?>
				<div class="container theme-slider-content">
					<div class="theme-text-center theme-caption-bg align-center">
					<?php if($subtitle != ''){ ?>
						<h5 class="sub-title"><?php echo esc_html($subtitle); ?></h5>
				    <?php } ?>
					<?php if($title != ''){ ?>
						<h1 class="title-large"><?php echo wp_kses_post( html_entity_decode( $title ) ); ?></h1>
				    <?php } ?>
					<?php if($img_description!= ''){ ?>
						<p class="description"><?php echo wp_kses_post( html_entity_decode( $img_description ) ); ?></p>
					<?php } ?>
					<?php if($readmore_button!='' ) { ?>
						<div class="mt-3 pt-3">
							<a href="<?php echo esc_url( $readmorelink );?>" <?php if($open_new_tab== 'yes' || $open_new_tab== '1') { echo "target='_blank'"; } ?> class="btn-slider"><?php echo esc_html($readmore_button) ?></a>
						</div>
                    <?php } ?>						
					</div>
				</div>
			<?php } ?>
			<?php if($aasta_main_slider_overlay_disable == true) { ?>
			<div class="overlay"></div>
			<?php } ?>
			<?php if($slide_iteam->image_url!=''){ ?>			
			</div>
			<?php } ?>			
			<?php							
				}	
		    }
	        else { ?>

			<div class="item" style="background-image:url(<?php echo arile_super_plugin_url; ?>/inc/aasta/images/theme-slide6.jpg);">
				<div class="container theme-slider-content">
					<div class="theme-text-center theme-caption-bg align-center">
					    <h5 class="sub-title"><?php esc_html_e('Best business goals','arile-super'); ?></h5>
						<h1 class="title-large"><?php esc_html_e('Business grow online','arile-super'); ?></h1>
						<p class="description"><?php esc_html_e('AgencyWP is a most popular Multipurpose WordPress themes in the world. The designs are clean, modern, and feature strong default colors that inspire confidence.','arile-super'); ?></p>
						<div class="mt-3 pt-3">
							<a href="#" class="btn-slider"><?php esc_html_e('Check it out','arile-super'); ?></a>
						</div>							
					</div>
				</div>
				<?php if($aasta_main_slider_overlay_disable == true) { ?>
				<div class="overlay"></div>
				<?php } ?>
			</div>
			<div class="item" style="background-image:url(<?php echo arile_super_plugin_url; ?>/inc/aasta/images/theme-slide7.jpg">
				<div class="container theme-slider-content">
					<div class="theme-text-center theme-caption-bg align-center">
					    <h5 class="sub-title"><?php esc_html_e('Criteria for success','arile-super'); ?></h5>
						<h1 class="title-large"><?php esc_html_e('A world of opportunities','arile-super'); ?></h1>
						<p class="description"><?php esc_html_e('AgencyWP is a most popular Multipurpose WordPress themes in the world. The designs are clean, modern, and feature strong default colors that inspire confidence.','arile-super'); ?></p>
						<div class="mt-3 pt-3">
							<a href="#" class="btn-slider"><?php esc_html_e('Check it out','arile-super'); ?></a>
						</div>							
					</div>
				</div>
				<?php if($aasta_main_slider_overlay_disable == true) { ?>
				<div class="overlay"></div>
				<?php } ?>
			</div>
			<?php } ?>	
		</div>		
</section>
<?php endif; ?>