<?php
/**
 * Template part for displaying posts
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aasta
 */
 $blog_content_ordering = get_theme_mod( 'aasta_general_blog_arcive_single_content_ordering', array( 'title', 'meta', 'content', )); 
$aasta_general_meta_date_disable = get_theme_mod( 'aasta_general_meta_date_disable', true );
?>
<article class="post wow animate fadeInUp" <?php post_class(); ?> data-wow-delay=".3s">		
		   <?php 
			if(has_post_thumbnail()){
			echo '<figure class="post-thumbnail">';
			the_post_thumbnail( '', array( 'class'=>'img-fluid' ) );
			echo '</figure>'; } ?>
			<div class="post-content">
			    <div class="media mb-3">
                   <?php if($aasta_general_meta_date_disable == true): ?>
						<span class="posted-on">
							<a href="<?php echo esc_url(get_month_link(get_post_time('Y'),get_post_time('m'))); ?>"><time class="days">
							<?php echo esc_html(get_the_date('j')); ?><small class="months"><?php echo get_the_date('M'); ?></small></time></a>
						</span>
				<?php endif; ?>
				<div class="media-body">
			        <?php foreach ( $blog_content_ordering as $blog_content_order ) : ?>
					<?php if ( 'title' === $blog_content_order ) : ?>
					<header class="entry-header">
						<?php 
						the_title( '<h4 class="entry-title">', '</h4>' );
						?>
					</header>
			        <?php elseif ( 'meta' === $blog_content_order ) : ?>
					<div class="entry-meta">
					    <span class="author">
							<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' )) );?>"><span class="grey"><?php echo esc_html__('by ','aasta');?></span><?php echo esc_html(get_the_author());?></a>	
						</span>
						<?php $category_data = get_the_category_list( esc_html__( ', ', 'aasta' ) );
							if(!empty($category_data)) {
							echo '<span class="cat-links">' . $category_data . '</span>';
						} ?>	
					</div>	
					<?php elseif ( 'content' === $blog_content_order ) : ?>
					<div class="entry-content">
						<?php the_content( __('Read More','aasta') );
					    wp_link_pages();?>
					</div>
			        <?php  endif; endforeach; ?>
								<?php $theme_tag_list = get_the_tag_list();
					if(!empty($theme_tag_list)) { ?>
					<div class="entry-meta mt-4 mb-0 pt-3 theme-b-top">
						<span class="tag-links">
						<?php the_tags('',''); ?>
						</span>
					</div>
					<?php } ?>
                </div>
				</div>
		    </div>
			
</article><!-- #post-<?php the_ID(); ?> -->