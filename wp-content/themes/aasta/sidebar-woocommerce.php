<?php
/**
 * The sidebar containing the woocommerce widget area
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aasta
 */

?>

<div class="col-lg-4 col-md-4 col-sm-12">
	<div class="sidebar">
		<?php if ( is_active_sidebar( 'woocommerce' )  ) : ?>
		<!--Sidebar-->
		<?php dynamic_sidebar( 'woocommerce' ); ?>
		<!--/Sidebar-->
		<?php endif; ?>
	</div>
</div>	