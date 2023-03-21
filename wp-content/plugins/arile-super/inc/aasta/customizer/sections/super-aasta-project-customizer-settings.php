<?php
/**
 * Frontpage Project.
 *
 * @package arile-super
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Aasta_Customize_Homepage_Project_Option' ) ) :

	class Aasta_Customize_Homepage_Project_Option extends Aasta_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(

	            'aasta_main_project_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
						'priority'        => 1,
						'label'   => esc_html__( 'Project Options', 'arile-super' ),
						'section' => 'aasta_theme_project',
					),
				),
			    	
				'aasta_project_disabled'            => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'Aasta_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 5,
						'label'    => esc_html__( 'Project Enable/Disable', 'arile-super' ),
						'section'  => 'aasta_theme_project',
					),
				),
				
				'aasta_project_front_container_size'     => array(
						'setting' => array(
							'default'           => 'container',
							'sanitize_callback' => array( 'Aasta_Customizer_Sanitize', 'sanitize_radio' ),
						),
						'control' => array(
							'type'            => 'radio',
							'priority'        => 10,
							'is_default_type' => true,
							'label'           => esc_html__( 'Container Width', 'arile-super' ),
							'section'         => 'aasta_theme_project',
							'choices'         => array(
								'container'  => esc_html__( 'Container', 'arile-super' ),
								'container-fluid' => esc_html__( 'Container Full', 'arile-super' ),
							),
						),
			    ),
				
				'aasta_project_button_link' => array(
					'setting' => array(
						'default'           => '#',
						'sanitize_callback' => 'sanitize_text_field',
					),
					'control' => array(
						'type'            => 'text',
						'priority'        => 61,
						'is_default_type' => true,
						'label'           => esc_html__( 'Button Link', 'arile-super' ),
						'section'         => 'aasta_theme_project',
					),
				),
				
				'aasta_project_upgrade'            => array(
					'setting' => array( ),
					'control' => array(
						'type'     => 'upgrade',
						'priority' => 100,
						'label'    => esc_html__( 'Project', 'arile-super' ),
						'section'  => 'aasta_theme_project',
					),
				),
				
			);

		}

	}

	new Aasta_Customize_Homepage_Project_Option();

endif;
