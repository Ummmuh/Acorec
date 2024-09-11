<?php
function vsion_footer( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	// Footer Panel // 
	$wp_customize->add_panel( 
		'footer_section', 
		array(
			'priority'      => 34,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Footer', 'vsion'),
		) 
	);
	
	/*=========================================
	Above Footer Section
	=========================================*/
	$wp_customize->add_section(
        'above_footer',
        array(
        	'priority'      => 2,
            'title' 		=> __('Above Footer','vsion'),
			'panel'  		=> 'footer_section',
		)
    );
	
	// Above Footer Title // 
	$wp_customize->add_setting(
    	'above_footer_title',
    	array(
	        'default'			=> 'We Design the best WorsPress Themes with Features ',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'vsion_sanitize_html',
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'above_footer_title',
		array(
		    'label'   => __('Title','vsion'),
		    'section' => 'above_footer',
			'type'           => 'text',
		)  
	);
	// Above footer subtitle link // 
	$wp_customize->add_setting(
    	'tlh_subtitle_link',
    	array(
	        'default'			=> '#',
			'sanitize_callback' => 'vsion_sanitize_url',
			'capability' => 'edit_theme_options',
			'priority' => 4,
		)
	);	

	$wp_customize->add_control( 
		'tlh_subtitle_link',
		array(
		    'label'   		=> __('Subtitle Link','vsion'),
		    'section' 		=> 'above_footer',
			'type'		 =>	'text'
		)  
	);
		// Above Footer Subtitle // 
	$wp_customize->add_setting(
    	'above_footer_subtitle',
    	array(
	        'default'			=> 'like responsive design',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'vsion_sanitize_html',
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'above_footer_subtitle',
		array(
		    'label'   => __('Subtitle','vsion'),
		    'section' => 'above_footer',
			'type'           => 'text',
		)  
	);
		// Above Footer phoneno // 
	$wp_customize->add_setting(
    	'above_footer_contact',
    	array(
	        'default'			=> '+91 12345 67890',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'vsion_sanitize_html',
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'above_footer_contact',
		array(
		    'label'   => __('Contact No.','vsion'),
		    'section' => 'above_footer',
			'type'           => 'text',
		)  
	);
	
	// Footer Setting Section // 
	$wp_customize->add_section(
        'footer_copy_Section',
        array(
            'title' 		=> __('Below Footer','vsion'),
			'panel'  		=> 'footer_section',
			'priority'      => 4,
		)
    );
	
	// footer third text // 
	$theme_footer_copyright = esc_html__('Copyright &copy; [current_year] [site_title] | Powered by [theme_author]', 'vsion' );
	$wp_customize->add_setting(
    	'footer_copyright',
    	array(
			'default' => $theme_footer_copyright,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'vsion_sanitize_html',
		)
	);	

	$wp_customize->add_control( 
		'footer_copyright',
		array(
		    'label'   		=> __('Copyright Text','vsion'),
		    'section'		=> 'footer_copy_Section',
			'type' 			=> 'textarea',
			'priority'      => 9,
		)  
	);	
	
	// Footer Background // 
	$wp_customize->add_section(
        'footer_background',
        array(
            'title' 		=> __('Footer Background','vsion'),
			'panel'  		=> 'footer_section',
			'priority'      => 4,
		)
    );
	
	//  Color
	$wp_customize->add_setting(
	'footer_bg_color', 
	array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => '#0d0c44'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'footer_bg_color', 
			array(
				'label'      => __( 'Background Color', 'vsion' ),
				'section'    => 'footer_background',
			) 
		) 
	);
	
}
add_action( 'customize_register', 'vsion_footer' );
// Footer selective refresh
function vsion_footer_partials( $wp_customize ){	
	//footer_above_content 
	$wp_customize->selective_refresh->add_partial( 'footer_above_content', array(
		'selector'            => '.footer-above',
	) );
	
	// footer_copyright
	$wp_customize->selective_refresh->add_partial( 'footer_copyright', array(
		'selector'            => '.footer-copyright .copyright-text',
		'settings'            => 'footer_copyright',
		'render_callback'  => 'vsion_footer_copyright_render_callback',
	) );
	
	//footer_get_in_touch_title
	$wp_customize->selective_refresh->add_partial( 'footer_get_in_touch_title', array(
		'selector'            => '.footer-section .footer-top .widget-contact .contact-info.number .contact-us span',
		'settings'            => 'footer_get_in_touch_title',
		'render_callback'  => 'vsion_footer_get_in_touch_title_render_callback',
	) );
	
	//footer_get_in_touch_number
	$wp_customize->selective_refresh->add_partial( 'footer_get_in_touch_number', array(
		'selector'            => '.footer-section .footer-top .widget-contact .contact-info.number .contact-us a',
		'settings'            => 'footer_get_in_touch_number',
		'render_callback'  => 'vsion_footer_get_in_touch_number_render_callback',
	) );
	
	//footer_address_title
	$wp_customize->selective_refresh->add_partial( 'footer_address_title', array(
		'selector'            => '.footer-section .footer-top .widget-contact .contact-info.address .contact-us span',
		'settings'            => 'footer_address_title',
		'render_callback'  => 'vsion_footer_address_title_render_callback',
	) );
	
	//footer_contact_address
	$wp_customize->selective_refresh->add_partial( 'footer_contact_address', array(
		'selector'            => '.footer-section .footer-top .widget-contact .contact-info.address .contact-us a',
		'settings'            => 'footer_contact_address',
		'render_callback'  => 'vsion_footer_contact_address_render_callback',
	) );
	
	//footer_office_hours_title
	$wp_customize->selective_refresh->add_partial( 'footer_office_hours_title', array(
		'selector'            => '.footer-section .footer-top .widget-contact .contact-info.hours .contact-us span',
		'settings'            => 'footer_office_hours_title',
		'render_callback'  => 'vsion_footer_office_hours_title_render_callback',
	) );
	
	//footer_office_hours
	$wp_customize->selective_refresh->add_partial( 'footer_office_hours', array(
		'selector'            => '.footer-section .footer-top .widget-contact .contact-info.hours .contact-us a',
		'settings'            => 'footer_office_hours',
		'render_callback'  => 'vsion_footer_office_hours_render_callback',
	) );
	
	}

add_action( 'customize_register', 'vsion_footer_partials' );


// copyright_content
function vsion_footer_copyright_render_callback() {
	return get_theme_mod( 'footer_copyright' );
}

// footer_get_in_touch_title
function vsion_footer_get_in_touch_title_render_callback() {
	return get_theme_mod( 'footer_get_in_touch_title' );
}

// footer_get_in_touch_number
function vsion_footer_get_in_touch_number_render_callback() {
	return get_theme_mod( 'footer_get_in_touch_number' );
}

// footer_address_title
function vsion_footer_address_title_render_callback() {
	return get_theme_mod( 'footer_address_title' );
}

// footer_contact_address
function vsion_footer_contact_address_render_callback() {
	return get_theme_mod( 'footer_contact_address' );
}

// footer_office_hours_title
function vsion_footer_office_hours_title_render_callback() {
	return get_theme_mod( 'footer_office_hours_title' );
}

// footer_office_hours
function vsion_footer_office_hours_render_callback() {
	return get_theme_mod( 'footer_office_hours' );
}