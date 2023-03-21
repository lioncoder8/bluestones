<?php
/**
 * Register customizer panels and sections.
 *
 * @package aasta
 */

/* Theme Settings. */
 
$wp_customize->add_panel( new Aasta_Customize_Panel( $wp_customize, 'aasta_theme_settings', array(
	'priority'   => 28,
	'title'      => esc_html__( 'Theme Options', 'aasta' ),
	'capabitity' => 'edit_theme_options',
) ) );

// Section: General.
	
	$wp_customize->add_section( new Aasta_Customize_Section( $wp_customize, 'aasta_theme_general', array(
		'title'    => esc_html__( 'General', 'aasta' ),
		'panel'    => 'aasta_theme_settings',
		'priority' => 9,
	) ) );

// Section Header.
	
	$wp_customize->add_section( new Aasta_Customize_Section( $wp_customize, 'aasta_theme_header', array(
		'title'    => esc_html__( 'Header', 'aasta' ),
		'panel'    => 'aasta_theme_settings',
		'priority' => 10,
	) ) );
	

// Section Menu.
	
	$wp_customize->add_section( new Aasta_Customize_Section( $wp_customize, 'aasta_theme_menu_bar', array(
		'title'    => esc_html__( 'Menu', 'aasta' ),
		'panel'    => 'aasta_theme_settings',
		'priority' => 20,
	) ) );


// Section Blog.

	$wp_customize->add_section( new Aasta_Customize_Section( $wp_customize, 'aasta_theme_blog_settings', array(
		'title'    => esc_html__( 'Blog', 'aasta' ),
		'panel'    => 'aasta_theme_settings',
		'priority' => 30,
	) ) );
	
		$wp_customize->add_section( new Aasta_Customize_Section( $wp_customize, 'aasta_blog_general', array(
			'title'    => esc_html__( 'General', 'aasta' ),
			'panel'    => 'aasta_theme_settings',
			'section'  => 'aasta_theme_blog_settings',
			'priority' => 10,
		) ) );


// Section Footer.

	$wp_customize->add_section( new Aasta_Customize_Section( $wp_customize, 'aasta_theme_footer', array(
		'title'    => esc_html__( 'Footer', 'aasta' ),
		'panel'    => 'aasta_theme_settings',
		'priority' => 50,
	) ) );
	
	    $wp_customize->add_section( new Aasta_Customize_Section( $wp_customize, 'aasta_footer_widgets', array(
			'title'    => esc_html__( 'Footer Widgets', 'aasta' ),
			'panel'    => 'aasta_theme_settings',
			'section'  => 'aasta_theme_footer',
			'priority' => 10,
		) ) );
	
		$wp_customize->add_section( new Aasta_Customize_Section( $wp_customize, 'aasta_footer_copyright', array(
			'title'    => esc_html__( 'Footer Copyright', 'aasta' ),
			'panel'    => 'aasta_theme_settings',
			'section'  => 'aasta_theme_footer',
			'priority' => 20,
		) ) );

/**
 * Panel: Typography.
 */
$wp_customize->add_panel( new Aasta_Customize_Panel( $wp_customize, 'aasta_theme_typography', array(
	'priority'   => 32,
	'title'      => esc_html__( 'Typography', 'aasta' ),
	'capabitity' => 'edit_theme_options',
) ) );

    // Section Enable/Disable Typography.
	$wp_customize->add_section( new Aasta_Customize_Section( $wp_customize, 'aasta_enable_disable_typography', array(
		'title'    => esc_html__( 'Enable Typography', 'aasta' ),
		'panel'    => 'aasta_theme_typography',
		'priority' => 5,
	) ) );

	// Section Base typography Typography.
	$wp_customize->add_section( new Aasta_Customize_Section( $wp_customize, 'aasta_base_typography', array(
		'title'    => esc_html__( 'Base Typography', 'aasta' ),
		'panel'    => 'aasta_theme_typography',
		'priority' => 10,
	) ) );
	
	// Section Headings ( h1 - h6 ) Typography.
	$wp_customize->add_section( new Aasta_Customize_Section( $wp_customize, 'aasta_headings1_typography', array(
		'title'    => esc_html__( 'Headings H1', 'aasta' ),
		'panel'    => 'aasta_theme_typography',
		'priority' => 70,
	) ) );
	
	$wp_customize->add_section( new Aasta_Customize_Section( $wp_customize, 'aasta_headings2_typography', array(
		'title'    => esc_html__( 'Headings H2', 'aasta' ),
		'panel'    => 'aasta_theme_typography',
		'priority' => 80,
	) ) );
	
	$wp_customize->add_section( new Aasta_Customize_Section( $wp_customize, 'aasta_headings3_typography', array(
		'title'    => esc_html__( 'Headings H3', 'aasta' ),
		'panel'    => 'aasta_theme_typography',
		'priority' => 90,
	) ) );
	
	$wp_customize->add_section( new Aasta_Customize_Section( $wp_customize, 'aasta_headings4_typography', array(
		'title'    => esc_html__( 'Headings H4', 'aasta' ),
		'panel'    => 'aasta_theme_typography',
		'priority' => 100,
	) ) );
	
	$wp_customize->add_section( new Aasta_Customize_Section( $wp_customize, 'aasta_headings5_typography', array(
		'title'    => esc_html__( 'Headings H5', 'aasta' ),
		'panel'    => 'aasta_theme_typography',
		'priority' => 110,
	) ) );

    $wp_customize->add_section( new Aasta_Customize_Section( $wp_customize, 'aasta_headings6_typography', array(
		'title'    => esc_html__( 'Headings H6', 'aasta' ),
		'panel'    => 'aasta_theme_typography',
		'priority' => 120,
	) ) );