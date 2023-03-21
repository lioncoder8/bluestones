<?php
/**
 * The template for displaying search results pages
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package aasta
 */

get_header();
get_template_part('template-parts/site','breadcrumb');
?>

<section class="theme-block theme-blog theme-blog-large theme-bg-grey">

	<div class="container">
	
		<div class="row">
		
			<div class="col-lg-<?php echo ( !is_active_sidebar( 'sidebar-main' ) ? '12' :'8' ); ?> col-md-<?php echo ( !is_active_sidebar( 'sidebar-main' ) ? '12' :'8' ); ?> col-sm-12">
				<?php
				if ( have_posts() ) :
				
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );

					endwhile;

				    // Pgination.
					the_posts_pagination( array(
						'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
						'next_text'          => '<i class="fa fa-angle-double-right"></i>'
					) );

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
				
			</div>
			
			<?php get_sidebar(); ?>
			
		</div>
		
	</div>
	
</section>

<?php
get_footer();