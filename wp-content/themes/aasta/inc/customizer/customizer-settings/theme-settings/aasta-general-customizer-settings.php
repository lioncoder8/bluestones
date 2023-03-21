<?php
/**
 * General Settings.
 *
 * @package aasta
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
* General Settings.
*/

if ( ! class_exists( 'Aasta_Customize_General_Option' ) ) :

	class Aasta_Customize_General_Option extends Aasta_Customize_Base_Option {
		
		public function elements() {

			return array(
			
			
			    'aasta_general_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
				   		'priority'        => 1,
						'label'   => esc_html__( 'General Settings', 'aasta' ),
						'section' => 'aasta_theme_general',
					),
				),
			
					'aasta_animation_disabled'            => array(
						'setting' => array(
							'default'           => true,
							'sanitize_callback' => array( 'Aasta_Customizer_Sanitize', 'sanitize_checkbox' ),
						),
						'control' => array(
							'type'     => 'toggle',
							'priority' => 2,
							'label'    => esc_html__( 'Site Animation Enable/Disable', 'aasta' ),
							'section'  => 'aasta_theme_general',
						),
					),

			);

		}

	}

	new Aasta_Customize_General_Option();

endif;
