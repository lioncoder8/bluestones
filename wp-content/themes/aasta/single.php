<?php
/**
 * The template displaying single posts
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package aasta
 */

get_header();
get_template_part('template-parts/site','breadcrumb');
$aasta_single_blog_pages_layout = get_theme_mod('aasta_single_blog_pages_layout', 'aasta_right_sidebar');   
$aasta_single_blog_container_size = get_theme_mod('aasta_single_blog_container_size', 'container');
if($aasta_single_blog_container_size == 'container-full'){$container = '9';}else{$container = '8';}
?>
<section class="theme-block theme-blog theme-blog-large theme-bg-grey">

	<div class="<?php echo esc_attr($aasta_single_blog_container_size); ?>">
	
		<div class="row">
		<?php if($aasta_single_blog_pages_layout == 'aasta_left_sidebar' ||  !$aasta_single_blog_pages_layout == 'aasta_no_sidebar'): ?>
		<!--/Blog-->
		<?php get_sidebar(); ?>
		<?php endif; ?>
		
		<?php if($aasta_single_blog_pages_layout == 'aasta_no_sidebar'): ?>
		
		    <div class="col-lg-12 col-md-12 col-sm-12">	
			
        <?php else: ?>  

            <div class="col-lg-<?php echo ( !is_active_sidebar( 'sidebar-main' ) ? '12' :''.esc_attr($container).'' ); ?> col-md-<?php echo ( !is_active_sidebar( 'sidebar-main' ) ? '12' :''.esc_attr($container).'' ); ?> col-sm-12">

        <?php endif; ?>			

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content-single', get_post_type() );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		
		</div>	
		<?php if($aasta_single_blog_pages_layout == 'aasta_right_sidebar' || !$aasta_single_blog_pages_layout == 'aasta_no_sidebar'): ?>
		<!--/Blog-->
			<?php get_sidebar(); ?>
        <?php endif; ?>
		</div>	
		
	</div>
	
</section>

<?php
get_footer();