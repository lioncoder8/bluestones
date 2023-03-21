<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aasta
 */

get_header();
get_template_part('template-parts/site','breadcrumb');
$page_sidebar_layout = get_post_meta( get_the_ID(), '_sidebar_layout', true );
?>
<section class="theme-block theme-blog theme-bg-grey">
	<div class="container">
		<div class="row">
		
		<?php 
			
			if($page_sidebar_layout == 'left-sidebar'):
				if ( class_exists( 'WooCommerce' ) ) {
					if( is_account_page() || is_cart() || is_checkout() ) {
						get_sidebar('woocommerce'); 
					}
					else{ 
						get_sidebar(); 
                    }	
				}
			    else{ 
					get_sidebar(); 
				}	
			 endif;
		    
			if($page_sidebar_layout == 'no-sidebar'):
			
		     	if ( class_exists( 'WooCommerce' ) ) {
					if( is_account_page() || is_cart() || is_checkout() ) {
						echo '<div class="col-lg-12 col-md-12 col-sm-12">'; 
					}
					else{ 
						echo '<div class="col-lg-12 col-md-12 col-sm-12">';
					}
				}
				else{ 
					echo '<div class="col-lg-12 col-md-12 col-sm-12">';
				}
				
			else:

                if ( class_exists( 'WooCommerce' ) ) {
					if( is_account_page() || is_cart() || is_checkout() ) {
						echo '<div class="col-lg-'.( !is_active_sidebar( "woocommerce" ) ?"12" :"8" ).' col-md-'.( !is_active_sidebar( "woocommerce" ) ?"12" :"8" ).' col-sm-12">'; 
					}
					else{ 
						echo '<div class="col-lg-'.( !is_active_sidebar( "sidebar-main" ) ?"12" :"8" ).' col-md-'.( !is_active_sidebar( "sidebar-main" ) ?"12" :"8" ).' col-sm-12">';
					}
				}
				else{ 
					echo '<div class="col-lg-'.( !is_active_sidebar( "sidebar-main" ) ?"12" :"8" ).' col-md-'.( !is_active_sidebar( "sidebar-main" ) ?"12" :"8" ).' col-sm-12">';
				}
			
			endif;
					
				if ( class_exists( 'WooCommerce' ) ) {
					if( is_account_page() || is_cart() || is_checkout() ) {
						while ( have_posts() ) : the_post();
						// Include the page
						get_template_part( 'template-parts/content', 'page' );
						comments_template( '', true ); // show comments
						endwhile;	
				    } 
					else
					{
						while ( have_posts() ) : the_post();
							// Include the page
							get_template_part( 'template-parts/content', 'page' );
							comments_template( '', true ); // show comments
						endwhile;
					}
				}
				else 
				{
					while ( have_posts() ) : the_post();
						// Include the page
						get_template_part( 'template-parts/content', 'page' );
						comments_template( '', true ); // show comments 
				    endwhile;
				}
				?>
			</div>	
			
			<?php if($page_sidebar_layout == 'right-sidebar' || empty($page_sidebar_layout)):	
					if ( class_exists( 'WooCommerce' ) ) {
							if( is_account_page() || is_cart() || is_checkout() ) {
									get_sidebar('woocommerce'); 
							}
							else{ 
							get_sidebar();
							}
					}
					else{ 
					get_sidebar(); 
					}
			endif; ?>
					
		</div>
	</div>
</section>
<!--/Blog & Sidebar-->

<?php
get_footer();