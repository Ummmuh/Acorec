<?php
function vsion_funfact_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Funfact  Section
	=========================================*/
	$wp_customize->add_section(
		'funfact_setting', array(
			'title' => esc_html__( 'Funfact Section', 'vsion' ),
			'priority' => 9,
			'panel' => 'vsion_homepage_sections',
		)
	);
	
	// Funfact content Section // 
	
	$wp_customize->add_setting(
		'funfact_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'vsion_sanitize_text',
			'priority' => 7,
		)
	);
	
	$wp_customize->add_setting( 
    	'funfact_bg_img' , 
    	array(
			'default' 			=> esc_url(get_template_directory_uri() . '/assets/images/Features-bg.png'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'vsion_sanitize_url',	
			'priority' => 14,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'funfact_bg_img' ,
		array(
			'label'          => __( 'Background Image', 'vsion' ),
			'section'        => 'funfact_setting',
		) 
	));

	$wp_customize->add_control(
	'funfact_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','vsion'),
			'section' => 'funfact_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add funfact
	 */
	
		$wp_customize->add_setting( 'funfact_contents', 
			array(
			 'sanitize_callback' => 'vsion_repeater_sanitize',
			 'transport'         => $selective_refresh,
			 'priority' => 8,
			 'default' => themes_get_funfact_default()
			)
		);
		
		$wp_customize->add_control( 
			new Vsion_Repeater( $wp_customize, 
				'funfact_contents', 
					array(
						'label'   => esc_html__('Funfact','vsion'),
						'section' => 'funfact_setting',
						'add_field_label'                   => esc_html__( 'Add New Funfact', 'vsion' ),
						'item_name'                         => esc_html__( 'Funfact', 'vsion' ),
						
						'customizer_repeater_image_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_subtitle_control' => true,
					) 
				) 
			);
			
			
		//Pro feature
		class Vsion_funfact__section_upgrade extends WP_Customize_Control {
			public function render_content() {
				
			?>
				<a class="customizer_funfact_upgrade_section up-to-pro" href="https://aarnathemes.com/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','vsion'); ?></a>
			<?php
				
			}
		}
		
		$wp_customize->add_setting( 'Vsion_funfact_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 5,
		));
		$wp_customize->add_control(
			new Vsion_funfact__section_upgrade(
			$wp_customize,
			'Vsion_funfact_upgrade_to_pro',
				array(
					'section'				=> 'funfact_setting',
					'settings'				=> 'Vsion_funfact_upgrade_to_pro',
				)
			)
		);
}

add_action( 'customize_register', 'vsion_funfact_setting' );

// funfact selective refresh
function vsion_home_funfact_section_partials( $wp_customize ){		
	// funfact content
	$wp_customize->selective_refresh->add_partial( 'funfact_contents', array(
		'selector'            => '.home-funfact .funfact-item span'
	
	) );
	
	}

add_action( 'customize_register', 'vsion_home_funfact_section_partials' );