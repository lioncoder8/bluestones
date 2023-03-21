<?php
/**
 * Frontpage Testimonial.
 *
 * @package arile-super
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Aasta_Customize_Homepage_Testimonial_Option' ) ) :

	class Aasta_Customize_Homepage_Testimonial_Option extends Aasta_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(

			    'aasta_main_testimonial_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
				   		'priority'        => 1,
						'label'   => esc_html__( 'Testimonial Options', 'arile-super' ),
						'section' => 'aasta_theme_testimonial',
					),
				),
			    	
				'aasta_testimonial_disabled'            => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'Aasta_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 2,
						'label'    => esc_html__( 'Testimonial Enable/Disable', 'arile-super' ),
						'section'  => 'aasta_theme_testimonial',
					),
				),
				
				'aasta_testimonial_overlay_disable'            => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'Aasta_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 51,
						'label'    => esc_html__( 'Overlay Enable/Disable', 'arile-super' ),
						'section'  => 'aasta_theme_testimonial',
					),
				),
				
				'aasta_testimonial_upgrade'            => array(
					'setting' => array( ),
					'control' => array(
						'type'     => 'upgrade',
						'priority' => 20,
						'label'    => esc_html__( 'Testimonial', 'arile-super' ),
						'section'  => 'aasta_theme_testimonial',
					),
				),

			);

		}

	}

	new Aasta_Customize_Homepage_Testimonial_Option();

endif;