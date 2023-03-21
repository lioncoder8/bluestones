<?php
/**
 * MenuBar.
 *
 * @package aasta
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Aasta_Customize_Menu_Bar_Option' ) ) :

	/**
	 * Menu option.
	 */
	class Aasta_Customize_Menu_Bar_Option extends Aasta_Customize_Base_Option {

		public function elements() {

			return array(
			
			    'aasta_main_menu_heading' => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
				   		'priority'        => 1,
						'label'   => esc_html__( 'Menu Settings', 'aasta' ),
						'section' => 'aasta_theme_menu_bar',
					),
				),


					'aasta_menu_style' => array(
						'setting' => array(
							'default'           => 'sticky',
							'sanitize_callback' => array( 'Aasta_Customizer_Sanitize', 'sanitize_radio' ),
						),
						'control' => array(
							'type'            => 'radio',
							'priority'        => 5,
							'is_default_type' => true,
							'label'           => esc_html__( 'Menu Style', 'aasta' ),
							'section'         => 'aasta_theme_menu_bar',
							'choices'         => array(
								'sticky'  => esc_html__( 'Sticky', 'aasta' ),
								'static' => esc_html__( 'Static', 'aasta' ),
							),
						),
					),	
					
					
					'aasta_menu_container_size' => array(
						'setting' => array(
							'default'           => 'container',
							'sanitize_callback' => array( 'Aasta_Customizer_Sanitize', 'sanitize_radio' ),
						),
						'control' => array(
							'type'            => 'radio',
							'priority'        => 7,
							'is_default_type' => true,
							'label'           => esc_html__( 'Container Width', 'aasta' ),
							'section'         => 'aasta_theme_menu_bar',
							'choices'         => array(
								'container'  => esc_html__( 'Container', 'aasta' ),
								'container-full' => esc_html__( 'Container Full', 'aasta' ),
							),
						),
			     	),	

			);

		}

	}

	new Aasta_Customize_Menu_Bar_Option();

endif;