<?php
/**
 * Frontpage Blog.
 *
 * @package arile-super
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Aasta_Customize_Homepage_Blog_Option' ) ) :

	class Aasta_Customize_Homepage_Blog_Option extends Aasta_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(

		        'aasta_main_blog_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
						'priority'        => 1,
						'label'   => esc_html__( 'Blog Options', 'arile-super' ),
						'section' => 'aasta_theme_blog',
					),
				),
			    	
				'aasta_blog_disabled'            => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'Aasta_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 2,
						'label'    => esc_html__( 'Blog Enable/Disable', 'arile-super' ),
						'section'  => 'aasta_theme_blog',
					),
				),
				
				'aasta_blog_front_container_size'     => array(
						'setting' => array(
							'default'           => 'container',
							'sanitize_callback' => array( 'Aasta_Customizer_Sanitize', 'sanitize_radio' ),
						),
						'control' => array(
							'type'            => 'radio',
							'priority'        => 20,
							'is_default_type' => true,
							'label'           => esc_html__( 'Container Width', 'arile-super' ),
							'section'         => 'aasta_theme_blog',
							'choices'         => array(
								'container'  => esc_html__( 'Container', 'arile-super' ),
								'container-full' => esc_html__( 'Container Full', 'arile-super' ),
							),
						),
			    ),	
				
				'aasta_home_blog_meta_disabled'            => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'Aasta_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 10,
						'label'    => esc_html__( 'Meta Date Enable/Disable', 'arile-super' ),
						'section'  => 'aasta_theme_blog',
					),
				),
				
				'aasta_top_info_upgrade'            => array(
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

	new Aasta_Customize_Homepage_Blog_Option();

endif;
