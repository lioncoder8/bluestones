<?php
/**
 * Gowp Customizer Class 
 *
 * @package aasta
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Aasta_Customizer' ) ) :

	// aasta Customizer class
	
	class Aasta_Customizer {
		
		// Constructor customizer
		public function __construct() {

			add_action( 'customize_register', array( $this, 'aasta_customizer_panel_control' ) );
			add_action( 'customize_register', array( $this, 'aasta_customizer_register' ) );
			add_action( 'customize_register', array( $this, 'aasta_customizer_selective_refresh' ) );
			add_action( 'customize_preview_init', array( $this, 'aasta_customizer_preview_js' ) );
			add_action( 'after_setup_theme', array( $this, 'aasta_customizer_settings' ) );

		}

		// Register custom controls
		public function aasta_customizer_panel_control( $wp_customize ) {

			// Controls path.
			$control_dir = AASTA_PARENT_INC_DIR . '/customizer/controls';
			$setting_dir = AASTA_PARENT_INC_DIR . '/customizer/settings';

			// Load customizer options extending classes.
			require AASTA_PARENT_CUSTOMIZER_DIR . '/custom-customizer/aasta-customizer-panel.php';
			require AASTA_PARENT_CUSTOMIZER_DIR . '/custom-customizer/aasta-customizer-section.php';

			// Register extended classes.
			$wp_customize->register_panel_type( 'Aasta_Customize_Panel' );
			$wp_customize->register_section_type( 'Aasta_Customize_Section' );

			require_once $control_dir . '/code/aasta-customize-base-control.php';
			require_once $control_dir . '/code/aasta-customize-color-control.php';
			require_once $control_dir . '/code/aasta-customize-heading-control.php';
			require_once $control_dir . '/code/aasta-customize-radio-image-control.php';
			require_once $control_dir . '/code/aasta-customize-radio-buttonset-control.php';
			require_once $control_dir . '/code/aasta-customize-slider-control.php';
			require_once $control_dir . '/code/aasta-customize-sortable-control.php';
			require_once $control_dir . '/code/aasta-customize-toggle-control.php';
            require_once $control_dir . '/code/aasta-customize-upgrade-control.php';
			
			// Register JS-rendered control types.
			$wp_customize->register_control_type( 'Aasta_Customize_Color_Control' );
			$wp_customize->register_control_type( 'Aasta_Customize_Heading_Control' );
			$wp_customize->register_control_type( 'Aasta_Customize_Radio_Image_Control' );
			$wp_customize->register_control_type( 'Aasta_Customize_Radio_Buttonset_Control' );
			$wp_customize->register_control_type( 'Aasta_Customize_Slider_Control' );
			$wp_customize->register_control_type( 'Aasta_Customize_Sortable_Control' );
			$wp_customize->register_control_type( 'Aasta_Customize_Toggle_Control' );
            $wp_customize->register_control_type( 'Aasta_Customize_Upgrade_Control' );
		}

		// Customizer selective refresh.
		public function aasta_customizer_selective_refresh() {

			require_once AASTA_PARENT_INC_DIR . '/customizer/aasta-customizer-sanitize.php';
			require_once AASTA_PARENT_INC_DIR . '/customizer/aasta-customizer-partials.php';

		}

		// Add postMessage support for site title and description for the Theme Customizer.

		public function aasta_customizer_register( $wp_customize ) {

			// Customizer selective
			require AASTA_PARENT_CUSTOMIZER_DIR . '/aasta-customizer-selective.php';

			// Register panels and sections.
			require AASTA_PARENT_CUSTOMIZER_DIR . '/aasta-panels-and-sections.php';

		}

        // Theme Customizer preview reload changes asynchronously.
		public function aasta_customizer_preview_js() {

			wp_enqueue_script( 'aasta-customizer', AASTA_PARENT_INC_URI . '/customizer/assets/js/customizer.js', array( 'customize-preview' ), AASTA_THEME_VERSION, true );

		}

		// Include customizer customizer settings.
	
		public function aasta_customizer_settings() {
			
			// Base class.
			require AASTA_PARENT_CUSTOMIZER_DIR . '/customizer-settings/aasta-customize-base-customizer-settings.php';
			// General.
			require AASTA_PARENT_CUSTOMIZER_DIR . '/customizer-settings/theme-settings/aasta-general-customizer-settings.php';
			// Menu.
			require AASTA_PARENT_CUSTOMIZER_DIR . '/customizer-settings/theme-settings/aasta-menu-bar-customizer-settings.php';
			// Page Header.
			require AASTA_PARENT_CUSTOMIZER_DIR . '/customizer-settings/theme-settings/aasta-page-header-customizer-settings.php';
			// Blog.
			require AASTA_PARENT_CUSTOMIZER_DIR . '/customizer-settings/theme-settings/aasta-blog-general-customizer-settings.php';
			// Footer.
			require AASTA_PARENT_CUSTOMIZER_DIR . '/customizer-settings/theme-settings/aasta-footer-copyright-customizer-settings.php';
			require AASTA_PARENT_CUSTOMIZER_DIR . '/customizer-settings/theme-settings/aasta-footer-widget-customizer-settings.php';
			// Typography.
			require AASTA_PARENT_CUSTOMIZER_DIR . '/customizer-settings/theme-settings/aasta-typography-customizer-settings.php';
			

		}
	

	}
endif;

new Aasta_Customizer();