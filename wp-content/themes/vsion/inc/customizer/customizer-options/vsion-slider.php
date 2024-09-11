<?php
function vsion_slider_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Slider Section Panel
	=========================================*/
	$wp_customize->add_panel(
		'vsion_homepage_sections', array(
			'priority' => 32,
			'title' => esc_html__( 'Homepage', 'vsion' ),
		)
	);
	
	$wp_customize->add_section(
		'slider_setting', array(
			'title' => esc_html__( 'Slider Section', 'vsion' ),
			'panel' => 'vsion_homepage_sections',
			'priority' => 1,
		)
	);
	
	// slider Contents
	$wp_customize->add_setting(
		'slider_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'vsion_sanitize_text',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'slider_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Contents','vsion'),
			'section' => 'slider_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add slides
	 */
	
		$wp_customize->add_setting( 'slider', 
			array(
			 'sanitize_callback' => 'vsion_repeater_sanitize',
			 'priority' => 5,
			  'default' => themes_get_slider_default()
			)
		);
		
		$wp_customize->add_control( 
			new Vsion_Repeater( $wp_customize, 
				'slider', 
					array(
						'label'   => esc_html__('Slide','vsion'),
						'section' => 'slider_setting',
						'add_field_label'                   => esc_html__( 'Add New Slider', 'vsion' ),
						'item_name'                         => esc_html__( 'Slide', 'vsion' ),						
						'customizer_repeater_title_control' => true,
						'customizer_repeater_text_control' => true,
						'customizer_repeater_text2_control'=> true,
						'customizer_repeater_link_control' => true,
						'customizer_repeater_image_control' => true,
					) 
				) 
			);
			
		//Pro feature
		class Vsion_slider__section_upgrade extends WP_Customize_Control {
			public function render_content() {
				
			?>
				<a class="customizer_slider_upgrade_section up-to-pro" href="https://aarnathemes.com/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','vsion'); ?></a>
			<?php
				
			}
		}
		
		$wp_customize->add_setting( 'Vsion_slider_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 5,
		));
		$wp_customize->add_control(
			new Vsion_slider__section_upgrade(
			$wp_customize,
			'Vsion_slider_upgrade_to_pro',
				array(
					'section'				=> 'slider_setting',
					'settings'				=> 'Vsion_slider_upgrade_to_pro',
				)
			)
		);
}

add_action( 'customize_register', 'vsion_slider_setting' );