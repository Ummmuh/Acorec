<?php
function vsion_genearl_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'vsion_general', array(
			'priority' => 31,
			'title' => esc_html__( 'General', 'vsion' ),
		)
	);
	
	/*=========================================
	Preloader
	=========================================*/
	$wp_customize->add_section(
		'preloader', array(
			'title' => esc_html__( 'Preloader', 'vsion' ),
			'priority' => 1,
			'panel' => 'vsion_general',
		)
	);
	
	$wp_customize->add_setting( 
		'hs_preloader' , 
			array(
			'default' => '',
			'sanitize_callback' => 'vsion_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control(
	'hs_preloader', 
		array(
			'label'	      => esc_html__( 'Hide / Show Preloader', 'vsion' ),
			'section'     => 'preloader',
			'type'        => 'checkbox'
		) 
	);
	
	/*=========================================
	Scroller
	=========================================*/
	$wp_customize->add_section(
		'top_scroller', array(
			'title' => esc_html__( 'Top Scroller', 'vsion' ),
			'priority' => 4,
			'panel' => 'vsion_general',
		)
	);
	
	$wp_customize->add_setting( 
		'hs_scroller' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'vsion_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control(
	'hs_scroller', 
		array(
			'label'	      => esc_html__( 'Hide / Show Scroller', 'vsion' ),
			'section'     => 'top_scroller',
			'type'        => 'checkbox'
		) 
	);
	

	/*=========================================
	Breadcrumb  Section
	=========================================*/
	$wp_customize->add_section(
		'breadcrumb_setting', array(
			'title' => esc_html__( 'Page Breadcrumb', 'vsion' ),
			'priority' => 12,
			'panel' => 'vsion_general',
		)
	);
	
	// Settings
	$wp_customize->add_setting(
		'breadcrumb_settings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'vsion_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'breadcrumb_settings',
		array(
			'type' => 'hidden',
			'label' => __('Settings','vsion'),
			'section' => 'breadcrumb_setting',
		)
	);
	
	// Breadcrumb Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'hs_breadcrumb' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'vsion_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hs_breadcrumb', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'vsion' ),
			'section'     => 'breadcrumb_setting',
			'settings'    => 'hs_breadcrumb',
			'type'        => 'checkbox'
		) 
	);
	
	
	// Background Image // 
    $wp_customize->add_setting( 
    	'breadcrumb_bg_img' , 
    	array(
			'default' 			=> get_template_directory_uri() .'/assets/images/background-1.jpg',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'vsion_sanitize_url',	
			'priority' => 10,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'breadcrumb_bg_img' ,
		array(
			'label'          => esc_html__( 'Background Image', 'vsion'),
			'section'        => 'breadcrumb_setting',
		) 
	));
}

add_action( 'customize_register', 'vsion_genearl_setting' );
