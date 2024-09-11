<?php
function vsion_pages_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	
	
	/*=========================================
	Vsion Page Templates
	=========================================*/
	$wp_customize->add_panel(
		'vsion_page_templates', array(
			'priority' => 33,
			'title' => esc_html__( 'Page Templates', 'vsion' ),
		)
	);
	
	/*=========================================
	Blog Page
	=========================================*/
	
	$wp_customize->add_section(
		'blog_pg_Settings', array(
			'title' => esc_html__( 'Blog Page', 'vsion' ),
			'priority' => 7,
			'panel' => 'vsion_page_templates',
		)
	);
	
	// Head
	$wp_customize->add_setting(
		'pg_blog_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'vsion_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'pg_blog_head',
		array(
			'type' => 'hidden',
			'label' => __('Header','vsion'),
			'section' => 'blog_pg_Settings',
		)
	);

	// Title // 
	$wp_customize->add_setting(
    	'pg_blog_ttl',
    	array(
	        'default'			=> __('The document that outlines what the Investors will get for what they put in','vsion'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'vsion_sanitize_html',
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_blog_ttl',
		array(
		    'label'   => __('Title','vsion'),
		    'section' => 'blog_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	// Subtitle // 
	$wp_customize->add_setting(
    	'pg_blog_subttl',
    	array(
	        'default'			=> __('Outstanding Blog','vsion'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'vsion_sanitize_html',
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_blog_subttl',
		array(
		    'label'   => __('Subtitle','vsion'),
		    'section' => 'blog_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	/*=========================================
	Blog Single Page
	=========================================*/
	$wp_customize->add_section(
		'pg_blog_single_setting', array(
			'title' => esc_html__( 'Blog Single Page', 'vsion' ),
			'priority' => 8,
			'panel' => 'vsion_page_templates',
		)
	);
	
	// Blog Header Section // 
	$wp_customize->add_setting(
		'pg_blog_single_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'vsion_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'pg_blog_single_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','vsion'),
			'section' => 'pg_blog_single_setting',
		)
	);
	
	// Author Meta  Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'enable_author_box' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'vsion_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'enable_author_box', 
		array(
			'label'	      => esc_html__( 'Hide / Show Author Box', 'vsion' ),
			'section'     => 'pg_blog_single_setting',
			'type'        => 'checkbox'
		) 
	);
	
	
	/*=========================================
	404 Page
	=========================================*/
	$wp_customize->add_section(
		'404_pg_setting', array(
			'title' => esc_html__( '404 Page', 'vsion' ),
			'priority' => 9,
			'panel' => 'vsion_page_templates',
		)
	);
	
	//  Head // 
	$wp_customize->add_setting(
		'404_pg_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'vsion_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'404_pg_head',
		array(
			'type' => 'hidden',
			'label' => __('404 Page','vsion'),
			'section' => '404_pg_setting',
		)
	);
	
	// Title // 
	$wp_customize->add_setting(
    	'pg_404_ttl',
    	array(
	        'default'			=> __('404','vsion'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'vsion_sanitize_html',
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_404_ttl',
		array(
		    'label'   => __('Title','vsion'),
		    'section' => '404_pg_setting',
			'type'           => 'text',
		)  
	);
	
	// Subtitle // 
	$wp_customize->add_setting(
    	'pg_404_subtitle',
    	array(
	        'default'			=> __('Page Not Found','vsion'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'vsion_sanitize_html',
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_404_subtitle',
		array(
		    'label'   => __('Subtitle','vsion'),
		    'section' => '404_pg_setting',
			'type'           => 'textarea',
		)  
	);
	
	
	// Button Label 1 // 
	$wp_customize->add_setting(
    	'pg_404_btn_lbl',
    	array(
	        'default'			=> __('Back to home','vsion'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'vsion_sanitize_html',
			'priority' => 7,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_404_btn_lbl',
		array(
		    'label'   => __('Button Label','vsion'),
		    'section' => '404_pg_setting',
			'type'           => 'text',
		)  
	);
	
	// Button URL 1 // 
	$wp_customize->add_setting(
    	'pg_404_btn_url',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'vsion_sanitize_url',
			'priority' => 8,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_404_btn_url',
		array(
		    'label'   => __('Button URL','vsion'),
		    'section' => '404_pg_setting',
			'type'           => 'text',
		)  
	);
}
add_action( 'customize_register', 'vsion_pages_setting' );

// selective refresh
function vsion_pages_partials( $wp_customize ){
	
	// pg_404_ttl
	$wp_customize->selective_refresh->add_partial( 'pg_404_ttl', array(
		'selector'            => '.section-404 .card-404 h2',
		'settings'            => 'pg_404_ttl',
		'render_callback'  => 'vsion_pg_404_ttl_render_callback',
	) );
	
	// pg_404_subtitle
	$wp_customize->selective_refresh->add_partial( 'pg_404_subtitle', array(
		'selector'            => '.section-404 .card-404 h3',
		'settings'            => 'pg_404_subtitle',
		'render_callback'  => 'vsion_pg_404_subtitle_render_callback',
	) );
	
	// pg_404_desc
	$wp_customize->selective_refresh->add_partial( 'pg_404_desc', array(
		'selector'            => '.section-404 .card-404 p',
		'settings'            => 'pg_404_desc',
		'render_callback'  => 'vsion_pg_404_desc_render_callback',
	) );
	
	
	
	// pg_blog_ttl
	$wp_customize->selective_refresh->add_partial( 'pg_blog_ttl', array(
		'selector'            => '.blog-page .section-title h2',
		'settings'            => 'pg_blog_ttl',
		'render_callback'  => 'vsion_pg_blog_ttl_render_callback',
	) );
	
	// pg_blog_subttl
	$wp_customize->selective_refresh->add_partial( 'pg_blog_subttl', array(
		'selector'            => '.blog-page .section-title span.sub-title',
		'settings'            => 'pg_blog_subttl',
		'render_callback'  => 'vsion_pg_blog_subttl_render_callback',
	) );
	}
add_action( 'customize_register', 'vsion_pages_partials' );

// pg_404_ttl
function vsion_pg_404_ttl_render_callback() {
	return get_theme_mod( 'pg_404_ttl' );
}

// pg_404_subtitle
function vsion_pg_404_subtitle_render_callback() {
	return get_theme_mod( 'pg_404_subtitle' );
}

// pg_404_desc
function vsion_pg_404_desc_render_callback() {
	return get_theme_mod( 'pg_404_desc' );
}

// pg_blog_ttl
function vsion_pg_blog_ttl_render_callback() {
	return get_theme_mod( 'pg_blog_ttl' );
}

// pg_blog_subttl
function vsion_pg_blog_subttl_render_callback() {
	return get_theme_mod( 'pg_blog_subttl' );
}