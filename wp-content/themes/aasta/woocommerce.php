<?php
get_header();
get_template_part('template-parts/site','breadcrumb');
global $woocommerce;
$shop_page_id = get_option( 'woocommerce_shop_page_id' );
$page_sidebar_layout = get_post_meta( $shop_page_id, '_sidebar_layout', true );
?>
<section class="theme-block">

	<div class="container">
	
		<div class="row">
		
		    <?php 
		    if($page_sidebar_layout == 'left-sidebar'):
		       get_sidebar('woocommerce');
            endif;
			
			if($page_sidebar_layout == 'no-sidebar'):
               echo '<div class="col-lg-12 col-md-12 col-sm-12>';
			endif;
		   
			echo '<div class="col-lg-'.( !is_active_sidebar( "woocommerce" ) ?"12" :"8" ).' col-md-'.( !is_active_sidebar( "woocommerce" ) ?"12" :"8" ).' col-sm-12 wow animate fadeInUp" data-wow-delay=".3s">';
				woocommerce_content();
			echo '</div>';
			
			if($page_sidebar_layout == 'right-sidebar' || empty($page_sidebar_layout)):
			   get_sidebar('woocommerce'); 
			endif;
			?>
			
		</div>
		
	</div>
	
</section>
<?php get_footer(); ?>