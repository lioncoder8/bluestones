<?php
/**
 * Page Header Settings.
 *
 * @package aasta
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
* Page Header Settings.
*/

if ( ! class_exists( 'Aasta_Customize_Page_Header_Option' ) ) :

	class Aasta_Customize_Page_Header_Option extends Aasta_Customize_Base_Option {

		public function elements() {

			return array(
			
			
			    'aasta_page_header_heading' => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
						'priority'        => 1,
						'label'   => esc_html__( 'Page Header', 'aasta' ),
						'section' => 'header_image',
					),
				),
			
				'aasta_page_header_disabled' => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'Aasta_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 5,
						'label'    => esc_html__( 'Page Header Enable/Disable', 'aasta' ),
						'section'  => 'header_image',
					),
				),
				
				
				'aasta_page_header_background_color' => array(
					'setting' => array(
						'default'           => 'rgba(0, 0, 0, .30)',
						'sanitize_callback' => array( 'Aasta_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'            => 'color',
						'priority'        => 7,
						'label'           => esc_html__( 'Background color', 'aasta' ),
						'section'         => 'header_image',
						'choices'         => array(
							'alpha' => true,
						),
					),
				),
			  

			);

		}

	}

	new Aasta_Customize_Page_Header_Option();

endif;
