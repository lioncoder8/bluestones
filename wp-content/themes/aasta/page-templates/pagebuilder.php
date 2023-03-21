<?php
/**
 *
 * Template Name: Builder Page
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
?>

	<section id="page-builder" class="theme-builder">

		<?php
		while ( have_posts() ) :
			the_post();
			the_content();
		endwhile; // End of the loop.
		?>

	</section><!-- #page-builder -->

<?php
get_footer();
