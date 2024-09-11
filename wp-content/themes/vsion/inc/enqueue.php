<?php
 /**
 * Enqueue scripts and styles.
 */
function vsion_scripts() {

	// Styles	
	wp_enqueue_style('vsion-vsion-bootstrap',get_template_directory_uri().'/assets/css/bootstrap.css');
	wp_enqueue_style('vsion-animate',get_template_directory_uri().'/assets/css/animate.css');
	wp_enqueue_style('vsion-font-awesome',get_template_directory_uri().'/assets/css/fonts/font-awesome/css/font-awesome.css');
	wp_enqueue_style('vsion-other-page-min',get_template_directory_uri().'/assets/css/other-page.css');
	wp_enqueue_style('vsion-classic-menu',get_template_directory_uri().'/assets/css/classic-menu.css');
	
	wp_enqueue_style('vsion-main',get_template_directory_uri().'/assets/css/main.css');	
	wp_enqueue_style('vsion-editor-style-min',get_template_directory_uri().'/assets/css/editor-style.css');	
	wp_enqueue_style('vsion-swiper-bundle-min',get_template_directory_uri().'/assets/css/swiper-bundle.css');	
	
	wp_enqueue_style('vsion-responsive',get_template_directory_uri().'/assets/css/responsive.css');	
	wp_enqueue_style( 'vsion-style', get_stylesheet_uri() );
	wp_enqueue_style('vsion-stylecss',get_template_directory_uri().'/assets/css/style.css');	
	wp_enqueue_style('vsion-widget-style-min',get_template_directory_uri().'/assets/css/widgets.css');	
	
	// Scripts
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script('vsion-bootstrap.bundle.min', get_template_directory_uri() . '/assets/js/bootstrap.bundle.js', array('jquery'), false, true);
	wp_enqueue_script('vsion-imagesloaded-min', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.js', array('jquery'), false, true);
	wp_enqueue_script('vsion-theme.min', get_template_directory_uri() . '/assets/js/theme.min.js', array('jquery'), false, true);
	wp_enqueue_script('vsion-isotope.pkgd.min', get_template_directory_uri() . '/assets/js/isotope.pkgd.js', array('jquery'), false, true);
	wp_enqueue_script('vsion-swiper-bundle-min', get_template_directory_uri() . '/assets/js/swiper-bundle.js', array('jquery'), false, true);
	
	wp_enqueue_script('vsion-jquery-counterup-min', get_template_directory_uri() . '/assets/js/jquery-counterup.js', array('jquery'), false, true);
	wp_enqueue_script('vsion-custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), false, true);
	wp_enqueue_script('vsion-wow-min', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), false, true);
	wp_enqueue_script('vsion-popper-min', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), false, true);
	
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'vsion_scripts' );

//Admin Enqueue for Admin
function vsion_admin_scripts(){
	wp_enqueue_style('vsion-admin-style', get_template_directory_uri() . '/inc/customizer/assets/css/admin.css');
}
add_action( 'admin_enqueue_scripts', 'vsion_admin_scripts' );
?>