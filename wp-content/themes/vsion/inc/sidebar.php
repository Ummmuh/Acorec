<?php	
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vsion_
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function vsion_widgets_init() {	
	register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'vsion' ),
		'id' => 'vsion-sidebar-primary',
		'description' => __( 'The Primary Widget Area', 'vsion' ),
		'before_widget' => '<aside id="widget-%1$s" class="widget-content widget widget_latest_posts border border-2 border-light px-2 %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="py-1 mb-3 shadow position-relative"><img src="' . get_theme_file_uri('/assets/images/icon1.png') . '" alt="icon-1" class="blog-heading-icon shadow"><h5 class="widget-title mb-0  p-1 text-center">',

		'after_title' => '</h5></div>',
	) );	
	 
	register_sidebar( array(
		'name' => __( 'Footer 1', 'vsion' ),
		'id' => 'vsion-footer-layout-first',
		'description' => __( 'The Footer Layout Left', 'vsion' ),
		'before_widget' => ' <div id="%1$s" class="%2$s col-lg-3 col-md-6"><div class="footer-item">',
		'after_widget' => '</div></div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
	
	register_sidebar( array(
		'name' => __( 'WooCommerce Widget Area', 'vsion' ),
		'id' => 'vsion-woocommerce-sidebar',
		'description' => __( 'This Widget area for WooCommerce Widget', 'vsion' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
}
add_action( 'widgets_init', 'vsion_widgets_init' );
?>