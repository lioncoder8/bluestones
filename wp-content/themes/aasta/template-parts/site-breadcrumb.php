<?php 
$aasta_page_header_disabled = get_theme_mod('aasta_page_header_disabled', true);
$aasta_page_header_background_color = get_theme_mod('aasta_page_header_background_color');
?>
<?php if($aasta_page_header_disabled == true): ?>
<!-- Theme Page Header Area -->		
	<section class="theme-page-header-area">
	<?php if($aasta_page_header_background_color != null): ?>
		<div class="overlay" style="background-color: <?php echo esc_attr($aasta_page_header_background_color); ?>;"></div>
    <?php else: ?>
        <div class="overlay"></div>
	<?php endif; ?>	
		<div id="content" class="container">
			<div class="row wow animate fadeInUp" data-wow-delay="0.3s">
				<div class="col-lg-6 col-md-6 col-sm-12">
			        <?php 
                    if(is_home() || is_front_page()) {
                        echo '<div class="page-header-title"><h1 class="text-white">'; echo single_post_title(); echo '</h1></div>';
                    } else{
                        aasta_theme_page_header_title();
                    } ?>
			
			    </div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<?php 	
                          aasta_page_header_breadcrumbs();	
			        ?>
			    </div>
			</div>
		</div>	
	</section>	
<!-- Theme Page Header Area -->		
<?php endif; ?>