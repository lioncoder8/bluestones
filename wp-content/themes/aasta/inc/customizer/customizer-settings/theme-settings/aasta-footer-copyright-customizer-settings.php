<?php
/**
 * Footer Copyright.
 *
 * @package     aasta
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Aasta_Customize_Footer_Copyright_Option' ) ) :

	/**
	 * Footer Copyright.
	 */
	class Aasta_Customize_Footer_Copyright_Option extends Aasta_Customize_Base_Option {

		public function elements() {

			return array(

				'aasta_footer_copright_enabled' => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'Aasta_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 5,
						'label'    => esc_html__( 'Footer Copyright Enable/Disable', 'aasta' ),
						'section'  => 'aasta_footer_copyright',
					),
				),		
				
				
			);

		}

	}

	new Aasta_Customize_Footer_Copyright_Option();

endif;
