<?php
/**
 * @package    arile-super
 */

require arile_super_plugin_dir . 'inc/aasta/customizer/super-aasta-customizer.php';
require arile_super_plugin_dir . 'inc/aasta/customizer/super-aasta-customizer-options.php';
require arile_super_plugin_dir . 'inc/aasta/customizer/super-aasta-customizer-default.php';
if ( ! function_exists( 'arilesuper_aasta_frontpage_sections' ) ) :
	function arilesuper_aasta_frontpage_sections() {
    $activate_theme_data = wp_get_theme(); // getting current theme data
	$activate_theme = $activate_theme_data->name;
		if('StockPress' == $activate_theme){
			require arile_super_plugin_dir . 'inc/aasta/front-page/super-stockpress-slider.php';	
			require arile_super_plugin_dir . 'inc/aasta/front-page/super-stockpress-service.php';
			require arile_super_plugin_dir . 'inc/aasta/front-page/super-stockpress-project.php';
			require arile_super_plugin_dir . 'inc/aasta/front-page/super-stockpress-testimonial.php';	
			require arile_super_plugin_dir . 'inc/aasta/front-page/super-aasta-blog.php';
		}
		elseif('Architect Studio' == $activate_theme){
			require arile_super_plugin_dir . 'inc/aasta/front-page/super-architect-studio-slider.php';	
			require arile_super_plugin_dir . 'inc/aasta/front-page/super-architect-studio-service.php';
			require arile_super_plugin_dir . 'inc/aasta/front-page/super-architect-studio-project.php';
			require arile_super_plugin_dir . 'inc/aasta/front-page/super-architect-studio-testimonial.php';	
			require arile_super_plugin_dir . 'inc/aasta/front-page/super-aasta-blog.php';
		}
		elseif('Appointech' == $activate_theme){
			require arile_super_plugin_dir . 'inc/aasta/front-page/super-appointech-slider.php';	
			require arile_super_plugin_dir . 'inc/aasta/front-page/super-appointech-service.php';
			require arile_super_plugin_dir . 'inc/aasta/front-page/super-appointech-project.php';
			require arile_super_plugin_dir . 'inc/aasta/front-page/super-appointech-testimonial.php';	
			require arile_super_plugin_dir . 'inc/aasta/front-page/super-aasta-blog.php';
		}
		elseif('Consultexo' == $activate_theme){
			require arile_super_plugin_dir . 'inc/aasta/front-page/super-consultexo-slider.php';	
			require arile_super_plugin_dir . 'inc/aasta/front-page/super-consultexo-service.php';
			require arile_super_plugin_dir . 'inc/aasta/front-page/super-consultexo-project.php';
			require arile_super_plugin_dir . 'inc/aasta/front-page/super-consultexo-testimonial.php';	
			require arile_super_plugin_dir . 'inc/aasta/front-page/super-aasta-blog.php';
		}
		elseif('InteriorHub' == $activate_theme){
			require arile_super_plugin_dir . 'inc/aasta/front-page/super-interiorhub-slider.php';	
			require arile_super_plugin_dir . 'inc/aasta/front-page/super-interiorhub-service.php';
			require arile_super_plugin_dir . 'inc/aasta/front-page/super-interiorhub-project.php';
			require arile_super_plugin_dir . 'inc/aasta/front-page/super-interiorhub-testimonial.php';	
			require arile_super_plugin_dir . 'inc/aasta/front-page/super-aasta-blog.php';
		}
		elseif('AgencyWP' == $activate_theme){
			require arile_super_plugin_dir . 'inc/aasta/front-page/super-agencywp-slider.php';	
			require arile_super_plugin_dir . 'inc/aasta/front-page/super-agencywp-service.php';
			require arile_super_plugin_dir . 'inc/aasta/front-page/super-agencywp-project.php';
			require arile_super_plugin_dir . 'inc/aasta/front-page/super-agencywp-testimonial.php';	
			require arile_super_plugin_dir . 'inc/aasta/front-page/super-aasta-blog.php';
		}
		else{
			require arile_super_plugin_dir . 'inc/aasta/front-page/super-aasta-slider.php';	
			require arile_super_plugin_dir . 'inc/aasta/front-page/super-aasta-service.php';
			require arile_super_plugin_dir . 'inc/aasta/front-page/super-aasta-project.php';
			require arile_super_plugin_dir . 'inc/aasta/front-page/super-aasta-testimonial.php';	
			require arile_super_plugin_dir . 'inc/aasta/front-page/super-aasta-blog.php';
		}	
	
    }
	add_action( 'arilesuper_aasta_frontpage', 'arilesuper_aasta_frontpage_sections' );
endif;