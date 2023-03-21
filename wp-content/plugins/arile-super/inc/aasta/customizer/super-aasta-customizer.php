<?php
/**
 * Arile Super Customizer Class
 *
 * @package arile-super
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'ArileSuper_Aasta_Customizer' ) ) :

	// Aasta Customizer class
	
	class ArileSuper_Aasta_Customizer {

		public function arilesuper_aasta_customizer_settings() {
           	require arile_super_plugin_dir . 'inc/aasta/customizer/sections/super-aasta-slider-customizer-settings.php';
			require arile_super_plugin_dir . 'inc/aasta/customizer/sections/super-aasta-service-customizer-settings.php';
			require arile_super_plugin_dir . 'inc/aasta/customizer/sections/super-aasta-project-customizer-settings.php';
			require arile_super_plugin_dir .
			'inc/aasta/customizer/sections/super-aasta-testimonial-customizer-settings.php';
			require arile_super_plugin_dir . '/inc/aasta/customizer/sections/super-aasta-blog-customizer-settings.php';
		}
		
	}
endif;

$customizer_settings = new ArileSuper_Aasta_Customizer();

$customizer_settings->arilesuper_aasta_customizer_settings();