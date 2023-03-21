<?php
/**
 * Customizer section options.
 *
 * @package aasta
 *
 */

require AASTA_PARENT_INC_DIR . '/customizer/webfont.php';
require AASTA_PARENT_INC_DIR . '/customizer/controls/code/aasta-customize-typography-control.php';
require AASTA_PARENT_INC_DIR . '/customizer/controls/code/aasta-customize-category-control.php';
require AASTA_PARENT_INC_DIR . '/customizer/controls/code/aasta-customize-plugin-control.php';
require AASTA_PARENT_INC_DIR . '/customizer/customizer-repeater/functions.php';

function aasta_customizer_theme_settings( $wp_customize ){
	
	$active_callback    	= isset( $array['active_callback'] ) ? $array['active_callback'] : null;
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	
	
	$wp_customize->get_section( 'header_image' )->panel = 'aasta_theme_settings';
	$wp_customize->get_section( 'header_image' )->title    = __( 'Page Header', 'aasta' );
    $wp_customize->get_section( 'header_image' )->priority = 40;
	
		// Sticky Bar Logo
		$wp_customize->add_setting( 'aasta_sticky_bar_logo', array(
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aasta_sticky_bar_logo',
			array(
				'label'    => esc_html__( 'Set Sticky Bar Logo', 'aasta' ),
				'description'    => esc_html__( 'You can Upload the Standrad size of logo (210px*39px)', 'aasta' ),
				'section'  => 'aasta_theme_menu_bar',
				'settings' => 'aasta_sticky_bar_logo',
				'priority'        => 15,
			) 
		));			
		$wp_customize->add_setting( 'aasta_typography_base_font_family', array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => 'Open Sans',
		) );
		$wp_customize->add_control( new Aasta_Customizer_Typography_Control( $wp_customize,'aasta_typography_base_font_family', array(
			'label' 			=> esc_html__( 'Font Family', 'aasta' ),
			'section' 			=> 'aasta_base_typography',
			'settings' 			=> 'aasta_typography_base_font_family',
			'priority' 			=> 10,
			'type' 				=> 'select',
			'active_callback' 	=> $active_callback,
		) ) );	
		
	    $wp_customize->add_setting( 'aasta_typography_base_font_size',
		array(
            'default' => '1rem',
			'sanitize_callback' => 'aasta_sanitize_text',
		));	
		$wp_customize->add_control( 'aasta_typography_base_font_size',
		array(
			'label'   => esc_html__( 'Font Size', 'aasta' ),
			'description'           => esc_html__( 'You can enter font-size in px or rem ', 'aasta' ),
			'section' => 'aasta_base_typography',
			'priority'        => 15,
			'type' => 'text',
		));	

        $wp_customize->add_setting( 'aasta_typography_h1_font_family', array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => 'Roboto',
		) );
		$wp_customize->add_control( new Aasta_Customizer_Typography_Control( $wp_customize,'aasta_typography_h1_font_family', array(
			'label' 			=> esc_html__( 'Font Family', 'aasta' ),
			'section' 			=> 'aasta_headings1_typography',
			'settings' 			=> 'aasta_typography_h1_font_family',
			'priority' 			=> 10,
			'type' 				=> 'select',
			'active_callback' 	=> $active_callback,
		) ) );

        $wp_customize->add_setting( 'aasta_typography_h2_font_family', array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => 'Roboto',
		) );
		$wp_customize->add_control( new Aasta_Customizer_Typography_Control( $wp_customize,'aasta_typography_h2_font_family', array(
			'label' 			=> esc_html__( 'Font Family', 'aasta' ),
			'section' 			=> 'aasta_headings2_typography',
			'settings' 			=> 'aasta_typography_h2_font_family',
			'priority' 			=> 10,
			'type' 				=> 'select',
			'active_callback' 	=> $active_callback,
		) ) );	

        $wp_customize->add_setting( 'aasta_typography_h3_font_family', array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => 'Roboto',
		) );
		$wp_customize->add_control( new Aasta_Customizer_Typography_Control( $wp_customize,'aasta_typography_h3_font_family', array(
			'label' 			=> esc_html__( 'Font Family', 'aasta' ),
			'section' 			=> 'aasta_headings3_typography',
			'settings' 			=> 'aasta_typography_h3_font_family',
			'priority' 			=> 10,
			'type' 				=> 'select',
			'active_callback' 	=> $active_callback,
		) ) );	
		
		$wp_customize->add_setting( 'aasta_typography_h4_font_family', array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => 'Roboto',
		) );
		$wp_customize->add_control( new Aasta_Customizer_Typography_Control( $wp_customize,'aasta_typography_h4_font_family', array(
			'label' 			=> esc_html__( 'Font Family', 'aasta' ),
			'section' 			=> 'aasta_headings4_typography',
			'settings' 			=> 'aasta_typography_h4_font_family',
			'priority' 			=> 10,
			'type' 				=> 'select',
			'active_callback' 	=> $active_callback,
		) ) );		

        $wp_customize->add_setting( 'aasta_typography_h5_font_family', array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => 'Roboto',
		) );
		$wp_customize->add_control( new Aasta_Customizer_Typography_Control( $wp_customize,'aasta_typography_h5_font_family', array(
			'label' 			=> esc_html__( 'Font Family', 'aasta' ),
			'section' 			=> 'aasta_headings5_typography',
			'settings' 			=> 'aasta_typography_h5_font_family',
			'priority' 			=> 10,
			'type' 				=> 'select',
			'active_callback' 	=> $active_callback,
		) ) );	

        $wp_customize->add_setting( 'aasta_typography_h6_font_family', array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => 'Roboto',
		) );
		$wp_customize->add_control( new Aasta_Customizer_Typography_Control( $wp_customize,'aasta_typography_h6_font_family', array(
			'label' 			=> esc_html__( 'Font Family', 'aasta' ),
			'section' 			=> 'aasta_headings6_typography',
			'settings' 			=> 'aasta_typography_h6_font_family',
			'priority' 			=> 10,
			'type' 				=> 'select',
			'active_callback' 	=> $active_callback,
		) ) );
		
		$wp_customize->add_setting(
			'aasta_footer_copright_text',
			array(
				'sanitize_callback' =>  'aasta_sanitize_text',
				'default' => __('Copyright &copy; 2022 | Powered by <a href="//wordpress.org/">WordPress</a> <span class="sep"> | </span> Aasta theme by <a target="_blank" href="//themearile.com/">ThemeArile</a>', 'aasta'),
				'transport'         => $selective_refresh,
			)	
		);
		$wp_customize->add_control('aasta_footer_copright_text', array(
				'label' => esc_html__('Footer Copyright','aasta'),
				'section' => 'aasta_footer_copyright',
				'priority'        => 10,
				'type'    =>  'textarea'
		));
		


}
add_action( 'customize_register', 'aasta_customizer_theme_settings' );

/*
 *  Customizer Notifications
 */ 

require get_template_directory() . '/inc/customizer/customizer-notice/aasta-customizer-notify.php';
$aasta_config_customizer = array(
    'recommended_plugins' => array( 
        'arile-super' => array(
            'recommended' => true,
            'description' => sprintf( 
                /* translators: %s: plugin name */
                esc_html__( 'If you want to show all the features and business sections of the FrontPage. please install and activate %s plugin', 'aasta' ), '<strong>Arile Super</strong>' 
            ),
        ),
    ),
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'aasta' ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'aasta' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'aasta' ),
	'activate_button_label'     => esc_html__( 'Activate', 'aasta' ),
	'aasta_deactivate_button_label'   => esc_html__( 'Deactivate', 'aasta' ),
);
Aasta_Customizer_Notify::init( apply_filters( 'aasta_customizer_notify_array', $aasta_config_customizer ) );