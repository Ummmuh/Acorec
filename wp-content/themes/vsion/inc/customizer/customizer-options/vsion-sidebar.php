<?php
function vsion_sidebar_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	

	/*=========================================
	Vsion Sidebar
	=========================================*/
	$wp_customize->add_section(
        'vsion_blog_settings',
        array(
        	'priority'      => 3,
            'title' 		=> __('Sidebar','vsion'),
			'panel' => 'vsion_general',
		)
    );
	
	if ( class_exists( 'Vsion_Customize_Control_Radio_Image' ) ) {
		// Default pages
		$wp_customize->add_setting(
			'vsion_default_pg_layout', array(
				'sanitize_callback' => 'vsion_sanitize_select',
				'default' => 'vsion_rsb',
			)
		);

		$wp_customize->add_control(
			new Vsion_Customize_Control_Radio_Image(
				$wp_customize, 'vsion_default_pg_layout', array(
					'label'     => esc_html__( 'Default Page Layout', 'vsion' ),
					'section'   => 'vsion_blog_settings',
					'priority'  => 1,
					'choices'   => array(
						'vsion_lsb' => array(
							'url' => apply_filters( 'vsion_lsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/lsb.svg' )),
						),
						'vsion_fullwidth' => array(
							'url' => apply_filters( 'vsion_fullwidth', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/full-width.svg' )),
						),
						'vsion_rsb' => array(
							'url' => apply_filters( 'vsion_rsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/rsb.svg' )),
						),
					),
				)
			)
		);
		// Archive pages
		$wp_customize->add_setting(
			'archive_pg_layout', array(
				'sanitize_callback' => 'vsion_sanitize_select',
				'default' => 'vsion_rsb',
			)
		);

		$wp_customize->add_control(
			new Vsion_Customize_Control_Radio_Image(
				$wp_customize, 'archive_pg_layout', array(
					'label'     => esc_html__( 'Archive Page Layout', 'vsion' ),
					'section'   => 'vsion_blog_settings',
					'priority'  => 2,
					'choices'   => array(
						'vsion_lsb' => array(
							'url' => apply_filters( 'vsion_lsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/lsb.svg' )),
						),
						'vsion_fullwidth' => array(
							'url' => apply_filters( 'vsion_fullwidth', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/full-width.svg' )),
						),
						'vsion_rsb' => array(
							'url' => apply_filters( 'vsion_rsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/rsb.svg' )),
						),
					),
				)
			)
		);
		
		// Single page
		$wp_customize->add_setting(
			'blog_single_layout', array(
				'sanitize_callback' => 'vsion_sanitize_select',
				'default' => 'vsion_rsb',
			)
		);

		$wp_customize->add_control(
			new Vsion_Customize_Control_Radio_Image(
				$wp_customize, 'blog_single_layout', array(
					'label'     => esc_html__( 'Single Page Layout', 'vsion' ),
					'section'   => 'vsion_blog_settings',
					'priority'  => 3,
					'choices'   => array(
						'vsion_lsb' => array(
							'url' => apply_filters( 'vsion_lsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/lsb.svg' )),
						),
						'vsion_fullwidth' => array(
							'url' => apply_filters( 'vsion_fullwidth', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/full-width.svg' )),
						),
						'vsion_rsb' => array(
							'url' => apply_filters( 'vsion_rsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/rsb.svg' )),
						),
					),
				)
			)
		);
		
		// Blog page
		$wp_customize->add_setting(
			'blog_page_layout', array(
				'sanitize_callback' => 'vsion_sanitize_select',
				'default' => 'vsion_rsb',
			)
		);

		$wp_customize->add_control(
			new Vsion_Customize_Control_Radio_Image(
				$wp_customize, 'blog_page_layout', array(
					'label'     => esc_html__( 'Blog Page Layout', 'vsion' ),
					'section'   => 'vsion_blog_settings',
					'priority'  => 4,
					'choices'   => array(
						'vsion_lsb' => array(
							'url' => apply_filters( 'vsion_lsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/lsb.svg' )),
						),
						'vsion_fullwidth' => array(
							'url' => apply_filters( 'vsion_fullwidth', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/full-width.svg' )),
						),
						'vsion_rsb' => array(
							'url' => apply_filters( 'vsion_rsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/rsb.svg' )),
						),
					),
				)
			)
		);
		
		// Search page
		$wp_customize->add_setting(
			'search_pg_layout', array(
				'sanitize_callback' => 'vsion_sanitize_select',
				'default' => 'vsion_rsb',
			)
		);

		$wp_customize->add_control(
			new Vsion_Customize_Control_Radio_Image(
				$wp_customize, 'search_pg_layout', array(
					'label'     => esc_html__( 'Search Page Layout', 'vsion' ),
					'section'   => 'vsion_blog_settings',
					'priority'  => 5,
					'choices'   => array(
						'vsion_lsb' => array(
							'url' => apply_filters( 'vsion_lsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/lsb.svg' )),
						),
						'vsion_fullwidth' => array(
							'url' => apply_filters( 'vsion_fullwidth', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/full-width.svg' )),
						),
						'vsion_rsb' => array(
							'url' => apply_filters( 'vsion_rsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/rsb.svg' )),
						),
					),
				)
			)
		);
	}
}
add_action( 'customize_register', 'vsion_sidebar_settings' );