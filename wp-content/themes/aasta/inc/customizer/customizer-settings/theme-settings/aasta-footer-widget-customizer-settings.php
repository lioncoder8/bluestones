<?php
/**
 * Footer widgets. 
 *
 * @package     aasta
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Aasta_Customize_Footer_Widget_Option' ) ) :

	/**
	 * Option: Footer widget.
	 */
	class Aasta_Customize_Footer_Widget_Option extends Aasta_Customize_Base_Option {

		public function elements() {

			return array(

				'aasta_footer_widgets_enabled' => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'Aasta_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 10,
						'label'    => esc_html__( 'Footer Widget Area Enable/Disable', 'aasta' ),
						'section'  => 'aasta_footer_widgets',
					),
				),		
								
				'aasta_footer_container_size' => array(
						'setting' => array(
							'default'           => 'container',
							'sanitize_callback' => array( 'Aasta_Customizer_Sanitize', 'sanitize_radio' ),
						),
						'control' => array(
							'type'            => 'radio',
							'priority'        => 25,
							'is_default_type' => true,
							'label'           => esc_html__( 'Container Width', 'aasta' ),
							'section'         => 'aasta_footer_widgets',
							'choices'         => array(
								'container'  => esc_html__( 'Container', 'aasta' ),
								'container-full' => esc_html__( 'Container Full', 'aasta' ),
							),
						),
				),	
				
				

			);

		}

	}

	new Aasta_Customize_Footer_Widget_Option();

endif;
