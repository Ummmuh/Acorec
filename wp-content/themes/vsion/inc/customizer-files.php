<?php
/**
 * Vsion Theme Customizer.
 *
 * @package Vsion
 */

 if ( ! class_exists( 'Vsion_Customizer' ) ) {

	/**
	 * Customizer Loader
	 *
	 * @since 1.0.0
	 */
	class Vsion_Customizer {

		/**
		 * Instance
		 *
		 * @access private
		 * @var object
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			/**
			 * Customizer
			 */
			add_action( 'customize_preview_init',                  array( $this, 'vsion_customize_preview_js' ) );
			add_action( 'customize_controls_enqueue_scripts',      array( $this, 'vsion_controls_scripts' ) );
			add_action( 'customize_controls_enqueue_scripts', 	   array( $this, 'vsion_customizer_script' ) );
			add_action( 'customize_register',                      array( $this, 'vsion_customizer_register' ) );
			add_action( 'after_setup_theme',                       array( $this, 'vsion_customizer_settings' ) );
			
		}
		
		
		/**
		 * Add postMessage support for site title and description for the Theme Customizer.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		function vsion_customizer_register( $wp_customize ) {
			
			$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
			$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
			$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
			$wp_customize->get_setting('custom_logo')->transport = 'refresh';

			/**
			 * Register controls
			 */
			$wp_customize->register_control_type( 'Vsion_Control_Sortable' );
			$wp_customize->register_control_type( 'Vsion_Customizer_Range_Control' );
			
			/**
			 * Helper files
			 */
			require VSION_PARENT_INC_DIR . '/customizer/customizer-controls.php';
			require VSION_PARENT_INC_DIR . '/customizer/sanitization.php';
		}
		/**
		 * Customizer Controls
		 *
		 * @since 1.0.0
		 * @return void
		 */
		function vsion_controls_scripts() {
				$js_prefix  = '.js';
				$css_prefix = '.css';
				
			// Customizer Core.
			wp_enqueue_script( 'vsion-customizer-controls-toggle-js', VSION_PARENT_INC_URI . '/customizer/assets/js/customizer-toggle-control' . $js_prefix, array(), VSION_THEME_VERSION, true );
			// Customizer Controls.
			wp_enqueue_script( 'vsion-customizer-controls-js', VSION_PARENT_INC_URI . '/customizer/assets/js/customizer-control' . $js_prefix, array( 'vsion-customizer-controls-toggle-js' ), VSION_THEME_VERSION, true );
		}

		/**
		 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
		 */
		function vsion_customize_preview_js() {
			wp_enqueue_script( 'vsion-customizer', VSION_PARENT_INC_URI . '/customizer/assets/js/customizer-preview.js', array( 'customize-preview' ), '20151215', true );
		}
		
		function vsion_customizer_script() {
			 wp_enqueue_script( 'vsion-customizer-section', VSION_PARENT_INC_URI .'/customizer/assets/js/customizer-section.js', array("jquery"),'', true  );	
		}

		// Include customizer customizer settings.
			
		function vsion_customizer_settings() {
				require VSION_PARENT_INC_DIR . '/customizer/customizer-options/vsion-header.php';
				require VSION_PARENT_INC_DIR . '/customizer/customizer-options/vsion-slider.php';
				require VSION_PARENT_INC_DIR . '/customizer/customizer-options/vsion-funfact.php';
				require VSION_PARENT_INC_DIR . '/customizer/customizer-options/vsion-service.php';
				require VSION_PARENT_INC_DIR . '/customizer/customizer-options/vsion-feature.php';
				require VSION_PARENT_INC_DIR . '/customizer/customizer-options/vsion-blog.php';
				require VSION_PARENT_INC_DIR . '/customizer/customizer-options/vsion-footer.php';
				require VSION_PARENT_INC_DIR . '/customizer/customizer-options/vsion-page-templates.php';
				require VSION_PARENT_INC_DIR . '/customizer/customizer-options/vsion-general.php';
				require VSION_PARENT_INC_DIR . '/customizer/customizer-options/vsion-sidebar.php';
				require VSION_PARENT_INC_DIR . '/customizer/vsion-premium.php';
		}

	}
}// End if().

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Vsion_Customizer::get_instance();