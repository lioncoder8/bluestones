<?php
/**
 * General Blog.
 *
 * @package     aasta
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Aasta_Customize_Blog_General_Option' ) ) :

	/**
	 * General Blog..
	 */
	class Aasta_Customize_Blog_General_Option extends Aasta_Customize_Base_Option {

		public function elements() {

			return array(
			
			    'aasta_general_arcive_single_blog_heading' => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
				   		'priority'        => 1,
						'label'   => esc_html__( 'Blog/Archive/Single', 'aasta' ),
						'section' => 'aasta_blog_general',
					),
				),

				'aasta_general_blog_arcive_single_content_ordering' => array(
					'setting' => array(
						'default'           => array(
							'title',
							'meta',
							'content',
						),
						'sanitize_callback' => array( 'Aasta_Customizer_Sanitize', 'sanitize_sortable' ),
					),
					'control' => array(
						'type'        => 'sortable',
						'priority'    => 5,
						'description' => esc_html__( 'Drag & Drop post items to re-arrange the order and also hide and show items as per the need by clicking on the eye icon.', 'aasta' ),
						'section'     => 'aasta_blog_general',
						'choices'     => array(
							'title' => esc_attr__( 'Title', 'aasta' ),
							'meta'          => esc_attr__( 'Meta', 'aasta' ),
							'content'           => esc_attr__( 'Content', 'aasta' ),
						),
					),
				), 
				
				'aasta_general_meta_date_disable'            => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'Aasta_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 6,
						'label'    => esc_html__( 'Meta Date Enable/Disable', 'aasta' ),
						'section'  => 'aasta_blog_general',
					),
				),
				
				'aasta_archive_blog_heading' => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
				   		'priority'        => 15,
						'label'   => esc_html__( 'Archive Blog Pages', 'aasta' ),
						'section' => 'aasta_blog_general',
					),
				),  
				
				
					'aasta_archive_blog_pages_layout' => array(
						'setting' => array(
							'default'           => 'aasta_right_sidebar',
							'sanitize_callback' => array( 'Aasta_Customizer_Sanitize', 'sanitize_radio' ),
						),
						'control' => array(
							'type'            => 'radio_image',
							'priority'        => 20,
							'label'           => esc_html__( 'Layout', 'aasta' ),
							'section'         => 'aasta_blog_general',
							'choices'         => array(
								'aasta_right_sidebar'   => AASTA_PARENT_INC_IMG_URI . '/theme-right-sidebar.png',
								'aasta_left_sidebar'   => AASTA_PARENT_INC_IMG_URI . '/theme-left-sidebar.png',
								'aasta_no_sidebar' => AASTA_PARENT_INC_IMG_URI . '/theme-fullwidth.png',
							),
						),
					),	
				
				'aasta_single_blog_heading' => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
				   		'priority'        => 30,
						'label'   => esc_html__( 'Single Blog Pages', 'aasta' ),
						'section' => 'aasta_blog_general',
					),
				),
				
				    'aasta_single_blog_pages_layout' => array(
						'setting' => array(
							'default'           => 'aasta_right_sidebar',
							'sanitize_callback' => array( 'Aasta_Customizer_Sanitize', 'sanitize_radio' ),
						),
						'control' => array(
							'type'            => 'radio_image',
							'priority'        => 35,
							'label'           => esc_html__( 'Layout', 'aasta' ),
							'section'         => 'aasta_blog_general',
							'choices'         => array(
								'aasta_right_sidebar'   => AASTA_PARENT_INC_IMG_URI . '/theme-right-sidebar.png',
								'aasta_left_sidebar'   => AASTA_PARENT_INC_IMG_URI . '/theme-left-sidebar.png',
								'aasta_no_sidebar' => AASTA_PARENT_INC_IMG_URI . '/theme-fullwidth.png',
							),
						),
					),
					
					
				'aasta_custom_logo_size' => array(
					'setting' => array(
						'default'           => array(
							'slider' => 224,
							'suffix' => 'px',
						),
						'sanitize_callback' => array( 'Aasta_Customizer_Sanitize', 'sanitize_slider' ),
					),
					'control' => array(
						'type'        => 'slider',
						'priority'    => 55,
						'label'       => esc_html__( 'Logo Width', 'aasta' ),
						'section'     => 'title_tagline',
						'input_attrs' => array(
							'min'  => 0,
							'max'  => 600,
							'step' => 3,
						),
					),
				),
				

			);

		}

	}

	new Aasta_Customize_Blog_General_Option();

endif;
