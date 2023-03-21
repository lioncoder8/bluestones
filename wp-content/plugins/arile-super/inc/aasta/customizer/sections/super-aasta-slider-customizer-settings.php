<?php
/**
 * Frontpage Main Slider.
 *
 * @package arile-super
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Aasta_Customize_Homepage_Slider_Option' ) ) :

	class Aasta_Customize_Homepage_Slider_Option extends Aasta_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(
			
				'aasta_main_slider_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
						'priority'        => 1,
						'label'   => esc_html__( 'Slider Options', 'arile-super' ),
						'section' => 'aasta_main_theme_slider',
					),
				),
				
	
				'aasta_main_slider_disabled'            => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'Aasta_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 2,
						'label'    => esc_html__( 'Slider Enable/Disable', 'arile-super' ),
						'section'  => 'aasta_main_theme_slider',
					),
				),	
				
				'aasta_main_slider_overlay_disable'            => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'Aasta_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 51,
						'label'    => esc_html__( 'Overlay Enable/Disable', 'arile-super' ),
						'section'  => 'aasta_main_theme_slider',
					),
				),
				
				'aasta_slider_upgrade'            => array(
					'setting' => array( ),
					'control' => array(
						'type'     => 'upgrade',
						'priority' => 20,
						'label'    => esc_html__( 'Slides', 'arile-super' ),
						'section'  => 'aasta_main_theme_slider',
					),
				),

			);

		}

	}

	new Aasta_Customize_Homepage_Slider_Option();

endif;
