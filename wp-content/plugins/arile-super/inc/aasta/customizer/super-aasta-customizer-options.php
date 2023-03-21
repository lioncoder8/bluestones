<?php
/**
 * Extend customizer section.
 *
 * @package arile-super
 *
 * @see     WP_Customize_Section
 * @access  public
 */
 
function arilesuper_aasta_frontpage_sections_settings( $wp_customize ){
	
	$active_callback    	= isset( $array['active_callback'] ) ? $array['active_callback'] : null;
	
	$activate_theme_data = wp_get_theme(); // getting current theme data
	$activate_theme = $activate_theme_data->name;
			
	/* Register frontpage panel */
	$wp_customize->add_panel( 'aasta_frontpage_settings', array(
		'priority'       => 25,
		'capability'     => 'edit_theme_options',
		'title'      => __('Frontpage Sections', 'arile-super'),
	) );
	
	/* Slider */
	$wp_customize->add_section( 'aasta_main_theme_slider' , array(
		'title'      => __('Main Slider', 'arile-super'),
		'panel'  => 'aasta_frontpage_settings',
		'priority'   => 2,
   	) ); 
	
	    if ( class_exists( 'Aasta_Repeater' ) ) {
			$wp_customize->add_setting( 'aasta_main_slider_content', array( ) );
            $wp_customize->add_control( new Aasta_Repeater( 
			$wp_customize, 'aasta_main_slider_content', array(
				'label'                             => esc_html__( 'Slider Items Content', 'arile-super' ),
				'section'                           => 'aasta_main_theme_slider',
				'add_field_label'                   => esc_html__( 'Add new slide item', 'arile-aasta' ),
				'item_name'                         => esc_html__( 'Slide Item', 'arile-aasta' ),
				'customizer_repeater_subtitle_control' => true,
				'customizer_repeater_image_control' => true,
				'customizer_repeater_title_control' => true,
				'customizer_repeater_text_control'  => true,
				'customizer_repeater_button_text_control' => true,
				'customizer_repeater_link_control'  => true,
				'customizer_repeater_checkbox_control' => true,
				) ) );
		}
			
	/* Service */
	$wp_customize->add_section( 'aasta_theme_service' , array(
		'title'      => __('Service', 'arile-super'),
		'panel'  => 'aasta_frontpage_settings',
		'priority'   => 4,
	) ); 
	
	    if ( class_exists( 'Aasta_Repeater' ) ) {
			$wp_customize->add_setting( 'aasta_service_content', array( ) );
            $wp_customize->add_control( new Aasta_Repeater( 
			$wp_customize, 'aasta_service_content', array(
				'label'                             => esc_html__( 'Service Items Content', 'arile-super' ),
				'section'                           => 'aasta_theme_service',
				'priority'                          => 10,
				'add_field_label'                   => esc_html__( 'Add new service item', 'arile-super' ),
				'item_name'                         => esc_html__( 'Service Item', 'arile-super' ),
				'customizer_repeater_image_control' => true,
				'customizer_repeater_icon_control'  => true,
				'customizer_repeater_title_control' => true,
				'customizer_repeater_text_control'  => true,
				'customizer_repeater_link_control'  => true,
				'customizer_repeater_checkbox_control' => true,
				) ) );
		}

	
	
    /* Project */
	$wp_customize->add_section( 'aasta_theme_project' , array(
		'title'      => __('Project', 'arile-super'),
		'panel'  => 'aasta_frontpage_settings',
		'priority'   => 5,
	) );
	
	    if ( class_exists( 'Aasta_Repeater' ) ) {
			$wp_customize->add_setting( 'aasta_project_content', array( ) );
            $wp_customize->add_control( new Aasta_Repeater( 
			$wp_customize, 'aasta_project_content', array(
				'label'                             => esc_html__( 'Project Items Content', 'arile-super' ),
				'section'                           => 'aasta_theme_project',
				'priority'                          => 50,
				'add_field_label'                   => esc_html__( 'Add new project item', 'arile-super' ),
				'item_name'                         => esc_html__( 'Project Item', 'arile-super' ),
				'customizer_repeater_image_control' => true,
				'customizer_repeater_title_control' => true,
				'customizer_repeater_text_control'  => true,
				) ) );
		}
	
	
   /* Testimonial */
	$wp_customize->add_section( 'aasta_theme_testimonial' , array(
		'title'      => __('Testimonial', 'arile-super'),
		'panel'  => 'aasta_frontpage_settings',
		'priority'   => 7,
	) ); 
	
	
	    if ( class_exists( 'Aasta_Repeater' ) ) {
			$wp_customize->add_setting( 'aasta_testimonial_content', array( ) );
            $wp_customize->add_control( new Aasta_Repeater( 
			$wp_customize, 'aasta_testimonial_content', array(
				'label'                             => esc_html__( 'Testimonial Items Content', 'arile-super' ),
				'section'                           => 'aasta_theme_testimonial',
				'add_field_label'                   => esc_html__( 'Add new testimonial item', 'arile-super' ),
				'item_name'                         => esc_html__( 'Testimonial Item', 'arile-super' ),
				'customizer_repeater_image_control' => true,
				'customizer_repeater_title_control' => true,
				'customizer_repeater_text_control'  => true,
				'customizer_repeater_designation_control' => true,
				) ) );
		}
		
			//Testimonial Background Image
			$wp_customize->add_setting( 'aasta_testomonial_background_image', array(
			  'sanitize_callback' => 'esc_url_raw',
			  'default'           => '',
			) );
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aasta_testomonial_background_image', array(
			  'label'    => esc_html__( 'Background Image', 'arile-super' ),
			  'section'  => 'aasta_theme_testimonial',
			  'settings' => 'aasta_testomonial_background_image',
			  'priority'        => 33,
			) ) );
	
    /* Blog */
	$wp_customize->add_section( 'aasta_theme_blog' , array(
		'title'      => __('Blog', 'arile-super'),
		'panel'  => 'aasta_frontpage_settings',
		'priority'   => 11,
	) ); 
	
	    $wp_customize->add_setting( 'aasta_theme_blog_category',array('capability'     => 'edit_theme_options',) );	
	    $wp_customize->add_control( new Aasta_Customize_Category_Control( $wp_customize, 'aasta_theme_blog_category', array(
			'label'   => __('Choose Blog Category','arile-super'),
			'section' => 'aasta_theme_blog',
			'settings'   => 'aasta_theme_blog_category',
			'sanitize_callback' => 'sanitize_text_field',
		) ) );

}
add_action( 'customize_register', 'arilesuper_aasta_frontpage_sections_settings' );


function arilesuper_aasta_customizer_selective_refresh_settings($wp_customize) {
	
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	
	
	$activate_theme_data = wp_get_theme(); // getting current theme data
	$activate_theme = $activate_theme_data->name;
	
	if('Architect Studio' == $activate_theme){
		$service_area_title = 'WE BUILD BEST ARCHITECT DESIGN';
		$service_area_des = "Our Services";
	}	
	elseif('Consultexo' == $activate_theme){
		$service_area_title = 'Why Choose Us';
		$service_area_des = "We provide the world's best consulting-related services to growth your business.";
	}	
	elseif('InteriorHub' == $activate_theme){
		$service_area_title = 'WE BUILD CREATIVE INTERIOR DESIGN';
		$service_area_des = 'Our Services';
	}elseif('AgencyWP' == $activate_theme){
		$service_area_title = 'We offer many services to growth';
		$service_area_des = 'Our Features';
	}else{	
		$service_area_title = 'Our Features';
		$service_area_des = "World's Best Services We Provide To Grow Your Business"; 	
	}
	
		$wp_customize->add_setting( 'aasta_service_area_title',
		array(
            'default' => __(''.$service_area_title.'','arile-super'),
			'sanitize_callback' => 'aasta_sanitize_text',
			'transport' => $selective_refresh,
		));	
		$wp_customize->add_control( 'aasta_service_area_title',
		array(
			'label'   => esc_html__( 'Section Title', 'arile-super' ),
			'section' => 'aasta_theme_service',
			'priority'        => 4,
			'type' => 'text',
		));
		
		$wp_customize->add_setting( 'aasta_service_area_des',
		array(
            'default' => __(''.$service_area_des.'','arile-super'),
			'sanitize_callback' => 'aasta_sanitize_text',
			'transport' => $selective_refresh,
		));	
		$wp_customize->add_control( 'aasta_service_area_des',
		array(
			'label'   => esc_html__( 'Section Description', 'arile-super' ),
			'section' => 'aasta_theme_service',
			'priority'        => 5,
			'type' => 'textarea',
		));	
		
	
    // Project
	
	if('Architect Studio' == $activate_theme){
		$project_area_title = 'ALL ARCHITECTURE DESIGN SOLUTIONS';
		$project_area_des = 'Our Portfolio';
	}
	elseif('Consultexo' == $activate_theme){
		$project_area_title = 'Our Projects';
		$project_area_des = 'We provided the best business consulting services.';
	}
	elseif('InteriorHub' == $activate_theme){
		$project_area_title = 'ALL INTERIOR DESIGN SOLUTIONS';
		$project_area_des = 'Our Portfolio';
	}elseif('AgencyWP' == $activate_theme){
		$project_area_title = 'Our latest works';
		$project_area_des = 'Our Projects';
	}else{	
		$project_area_title = 'Our Projects';
		$project_area_des = 'Our Latest Works'; 	
	}
	
		$wp_customize->add_setting( 'aasta_project_area_title',
		array(
            'default' => __(''.$project_area_title.'','arile-super'),
			'sanitize_callback' => 'aasta_sanitize_text',
			'transport' => $selective_refresh,
		));	
		$wp_customize->add_control( 'aasta_project_area_title',
		array(
			'label'   => esc_html__( 'Section Title', 'arile-super' ),
			'section' => 'aasta_theme_project',
			'priority'        => 15,
			'type' => 'text',
		));
			
		$wp_customize->add_setting( 'aasta_project_area_des',
		array(
            'default' => __(''.$project_area_des.'','arile-super'),
			'sanitize_callback' => 'aasta_sanitize_text',
			'transport' => $selective_refresh,
		));	
		$wp_customize->add_control( 'aasta_project_area_des',
		array(
			'label'   => esc_html__( 'Section Description', 'arile-super' ),
			'section' => 'aasta_theme_project',
			'priority'        => 20,
			'type' => 'textarea',
		));
		
		$wp_customize->add_setting( 'aasta_project_button_text',
		array(
            'default' => 'View All Projects',
			'sanitize_callback' => 'aasta_sanitize_text',
			'transport' => $selective_refresh,
		));	
		$wp_customize->add_control( 'aasta_project_button_text',
		array(
			'label'   => esc_html__( 'View All Button Text', 'arile-super' ),
			'section' => 'aasta_theme_project',
			'priority'        => 60,
			'type' => 'text',
		));
		

	// Testimonial
	
	if('Architect Studio' == $activate_theme){
		$testimonial_area_title = 'WHAT OUR CLIENTS SAY ABOUT US';
		$testimonial_area_des = 'Our Testimonials';
	}
	elseif('Consultexo' == $activate_theme){
		$testimonial_area_title = 'Testimonials';
		$testimonial_area_des = 'What Say Our Happy Clients';
	}
	elseif('InteriorHub' == $activate_theme){
		$testimonial_area_title = 'WHAT OUR CLIENTS SAY ABOUT US';
		$testimonial_area_des = 'Testimonials';
	}elseif('AgencyWP' == $activate_theme){
		$testimonial_area_title = 'Happy clients say';
		$testimonial_area_des = 'Testimonials';
	}else{	
		$testimonial_area_title = 'Our Customer';
		$testimonial_area_des = 'What Say Our Happy Clients'; 	
	}
	
		$wp_customize->add_setting( 'aasta_testimonial_area_title',
		array(
            'default' => __(''.$testimonial_area_title.'','arile-super'),
			'sanitize_callback' => 'aasta_sanitize_text',
			'transport' => $selective_refresh,
		));	
		$wp_customize->add_control( 'aasta_testimonial_area_title',
		array(
			'label'   => esc_html__( 'Section Title', 'arile-super' ),
			'section' => 'aasta_theme_testimonial',
			'priority'        => 4,
			'type' => 'text',
		));	
			
		$wp_customize->add_setting( 'aasta_testimonial_area_des',
		array(
            'default' => __(''.$testimonial_area_des.'','arile-super'),
			'sanitize_callback' => 'aasta_sanitize_text',
			'transport' => $selective_refresh,
		));	
		$wp_customize->add_control( 'aasta_testimonial_area_des',
		array(
			'label'   => esc_html__( 'Section Description', 'arile-super' ),
			'section' => 'aasta_theme_testimonial',
			'priority'        => 5,
			'type' => 'textarea',
		));
		
		
	// Blog
	
	if('InteriorHub' == $activate_theme || 'Architect Studio' == $activate_theme){
		$blog_area_title = 'OUR LATEST NEWS';
		$blog_area_des = 'Recent Updates';
	}elseif('AgencyWP' == $activate_theme){
		$blog_area_title = 'Our latest news';
		$blog_area_des = 'Recent Updates';
	}else{	
		$blog_area_title = 'Recent Updates';
		$blog_area_des = 'Our latest news'; 	
	}
	
		$wp_customize->add_setting( 'aasta_blog_area_title',
		array(
            'default' => __(''.$blog_area_title.'','arile-super'),
			'sanitize_callback' => 'aasta_sanitize_text',
			'transport' => $selective_refresh,
		));	
		$wp_customize->add_control( 'aasta_blog_area_title',
		array(
			'label'   => esc_html__( 'Section Title', 'arile-super' ),
			'section' => 'aasta_theme_blog',
			'priority'        => 4,
			'type' => 'text',
		));

		$wp_customize->add_setting( 'aasta_blog_area_des',
		array(
            'default' => __(''.$blog_area_des.'','arile-super'),
			'sanitize_callback' => 'aasta_sanitize_text',
			'transport' => $selective_refresh,
		));	
		$wp_customize->add_control( 'aasta_blog_area_des',
		array(
			'label'   => esc_html__( 'Section Description', 'arile-super' ),
			'section' => 'aasta_theme_blog',
			'priority'        => 5,
			'type' => 'textarea',
    	));
}
add_action( 'customize_register', 'arilesuper_aasta_customizer_selective_refresh_settings' );