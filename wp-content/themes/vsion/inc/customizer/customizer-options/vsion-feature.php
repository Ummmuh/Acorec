<?php
function vsion_feature_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Feature  Section
	=========================================*/
	$wp_customize->add_section(
		'feature_setting', array(
			'title' => esc_html__( 'Feature Section', 'vsion' ),
			'priority' => 9,
			'panel' => 'vsion_homepage_sections',
		)
	);
	
	// Feature Section // 
	$wp_customize->add_setting(
		'feature_headings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'vsion_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'feature_headings',
		array(
			'type' => 'hidden',
			'label' => __('Features','vsion'),
			'section' => 'feature_setting',
		)
	);
	
	// Feature Title // 
	$wp_customize->add_setting(
    	'feature_title',
    	array(
	        'default'			=> 'Mind Blowing Feature',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'vsion_sanitize_html',
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'feature_title',
		array(
		    'label'   => __('Title','vsion'),
		    'section' => 'feature_setting',
			'type'           => 'text',
		)  
	);
	
	// Feature Subtitle // 
	$wp_customize->add_setting(
    	'feature_subtitle',
    	array(
	        'default'			=> __('Our Feature','vsion'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'vsion_sanitize_html',
			'priority' => 5,
		)
	);	
	
	$wp_customize->add_control( 
		'feature_subtitle',
		array(
		    'label'   => __('Subtitle','vsion'),
		    'section' => 'feature_setting',
			'type'           => 'text',
		)  
	);
	// Feature content Section // 
	
	$wp_customize->add_setting(
		'feature_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'vsion_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'feature_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','vsion'),
			'section' => 'feature_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add feature
	 */
	
		$wp_customize->add_setting( 'feature_contents', 
			array(
			 'sanitize_callback' => 'vsion_repeater_sanitize',
			 'transport'         => $selective_refresh,
			 'priority' => 8,
			 'default' => themes_get_feature_default()
			)
		);
		
		$wp_customize->add_control( 
			new Vsion_Repeater( $wp_customize, 
				'feature_contents', 
					array(
						'label'   => esc_html__('Feature','vsion'),
						'section' => 'feature_setting',
						'add_field_label'                   => esc_html__( 'Add New Feature', 'vsion' ),
						'item_name'                         => esc_html__( 'Feature', 'vsion' ),
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);
			
			
		//Pro feature
		class Vsion_feature__section_upgrade extends WP_Customize_Control {
			public function render_content() {
				
			?>
				<a class="customizer_feature_upgrade_section up-to-pro" href="https://aarnathemes.com/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','vsion'); ?></a>
			<?php
				
			}
		}
		
		$wp_customize->add_setting( 'Vsion_feature_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 5,
		));
		$wp_customize->add_control(
			new Vsion_feature__section_upgrade(
			$wp_customize,
			'Vsion_feature_upgrade_to_pro',
				array(
					'section'				=> 'feature_setting',
					'settings'				=> 'Vsion_feature_upgrade_to_pro',
				)
			)
		);
}

add_action( 'customize_register', 'vsion_feature_setting' );

// feature selective refresh
function vsion_home_feature_section_partials( $wp_customize ){	
	// feature title
	$wp_customize->selective_refresh->add_partial( 'feature_title', array(
		'selector'            => '.home-feature .section-title p span',
		'settings'            => 'feature_title',
		'render_callback'  => 'vsion_feature_title_render_callback',
	
	) );
	
	// feature_subtitle
	$wp_customize->selective_refresh->add_partial( 'feature_subtitle', array(
		'selector'            => '.home-feature .section-title .section-heading',
		'settings'            => 'feature_subtitle',
		'render_callback'  => 'vsion_feature_subtitle_render_callback',
	
	) );
	
	// feature content
	$wp_customize->selective_refresh->add_partial( 'feature_contents', array(
		'selector'            => '.home-feature .feature-item_inner .feature-item .feature-content h2'
	
	) );
	
	}

add_action( 'customize_register', 'vsion_home_feature_section_partials' );

// feature title
function vsion_feature_title_render_callback() {
	return get_theme_mod( 'feature_title' );
}

// feature_subtitle
function vsion_feature_subtitle_render_callback() {
	return get_theme_mod( 'feature_subtitle' );
}