<?php
/**
 * Frontpage Service.
 *
 * @package arile-super
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Aasta_Customize_Homepage_Service_Option' ) ) :

	class Aasta_Customize_Homepage_Service_Option extends Aasta_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(

			    'aasta_main_service_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
						'priority'        => 1,
						'label'   => esc_html__( 'Service Options', 'arile-super' ),
						'section' => 'aasta_theme_service',
					),
				),
			    	
				'aasta_service_area_disabled'            => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'Aasta_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 2,
						'label'    => esc_html__( 'Service Enable/Disable', 'arile-super' ),
						'section'  => 'aasta_theme_service',
					),
				),
				
				'aasta_service_upgrade'            => array(
					'setting' => array( ),
					'control' => array(
						'type'     => 'upgrade',
						'priority' => 20,
						'label'    => esc_html__( 'Service', 'arile-super' ),
						'section'  => 'aasta_theme_service',
					),
				),
			

			);

		}

	}

	new Aasta_Customize_Homepage_Service_Option();

endif;
