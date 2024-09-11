<?php
if ( ! function_exists( 'vsion_setup' ) ) :
function vsion_setup() {

/**
 * Define Constants
 */
define( 'VSION_THEME_VERSION', '1.4' );

// Root path/URI.
define( 'VSION_PARENT_DIR', get_template_directory() );
define( 'VSION_PARENT_URI', get_template_directory_uri() );

// Root path/URI.
define( 'VSION_PARENT_INC_DIR', VSION_PARENT_DIR . '/inc');
define( 'VSION_PARENT_INC_URI', VSION_PARENT_URI . '/inc');

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );
	
	add_theme_support( 'custom-header' );
	
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	
	//Add selective refresh for sidebar widget
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	/*
	 * Make theme available for translation.
	 */
	load_theme_textdomain( 'vsion' );
		
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary_menu' => esc_html__( 'Primary Menu', 'vsion' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	
	
	add_theme_support('custom-logo');
	
	/*
	 * WooCommerce Plugin Support
	 */
	add_theme_support( 'woocommerce' );
	
	// Gutenberg wide images.
		add_theme_support( 'align-wide' );
	
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'assets/css/editor-style.css', vsion_google_font() ) );
	
	//Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'vsion_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'vsion_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function vsion_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'vsion_content_width', 1170 );
}
add_action( 'after_setup_theme', 'vsion_content_width', 0 );

// widget
require_once get_template_directory() . '/inc/enqueue.php';

/**
 * All Styles & Scripts.
 */
require_once get_template_directory() . '/inc/widget.php';

/**
 * Nav Walker fo Bootstrap Dropdown Menu.
 */

require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Implement the Custom Header feature.
 */
require_once get_template_directory() . '/inc/custom-header.php';


/**
 * Called Breadcrumb
 */
require_once get_template_directory() . '/inc/breadcrumb.php';

/**
 * Sidebar.
 */
require_once get_template_directory() . '/inc/sidebar.php';

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/extra-function.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require_once get_template_directory() . '/inc/repeted-value.php';

/**
 * Customizer additions.
 */
 require_once get_template_directory() . '/inc/customizer-files.php';
 require_once get_template_directory() . '/inc/style_function.php';





/**
 * Customizer additions.
 */
 require get_template_directory() . '/inc/customizer/customizer-repeater/functions.php';
 
/*wp block-styles*/
add_theme_support( 'wp-block-styles' );


/* register block-styles*/
function vsion_register_block_styles() {
    // Register a vsion style for the paragraph block
    register_block_style(
        'core/paragraph', // Block name
        array(
            'name'         => 'vsion-style', // Unique style name
            'label'        => esc_html__('Vsion Style', 'vsion' ), // Style label
            'inline_style' => '.wp-block-paragraph.vsion-style { color: red; }', // CSS for the style
        )
    );

    // Register vsion custom style for the paragraph block
    register_block_style(
        'core/paragraph', // Block name
        array(
            'name'         => 'vsion-custom-style', // Unique style name
            'label'        => esc_html__('Vsion Custom Style', 'vsion' ), // Style label
            'inline_style' => '.wp-block-paragraph.vsion-custom-style { font-size: 20px; }', // CSS for the style
        )
    );

    // You can register styles for other blocks in a similar manner
}
add_action( 'init', 'vsion_register_block_styles' );


// Add support for responsive embeds
add_theme_support( 'responsive-embeds' );

/**
 * Custom Comment List
 */
if( ! function_exists( 'vsion_comments' ) ):
function vsion_comments($comment, $args, $depth) {
    ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<article  class="comment-body">
		   <footer class="comment-meta">
				<div class="comment-author vcard"> 
					<?php echo get_avatar($comment,$size='100',$default='https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y' , 'avatar avatar-32 photo'); ?>
					
					<b class="fn"><a href='#' rel='external nofollow ugc' class='url'><?php echo get_comment_author() ?></a></b> 
				</div>
				<div class="comment-metadata"> <a href="#">
					<time datetime="<?php printf(/* translators: 1: date and time(s). */ esc_html__('%1$s at %2$s' , 'vsion'), get_comment_date(),  get_comment_time()) ?>"><?php printf(/* translators: 1: date and time(s). */ esc_html__('%1$s at %2$s' , 'vsion'), get_comment_date(),  get_comment_time()) ?></time></a>
				<a><?php echo preg_replace( '/comment-reply-link/', 'comment-reply-link ' . 'comment-reply-link reply', get_comment_reply_link(array_merge( $args, array(           'depth' => $depth, 'max_depth' => $args['max_depth']))), 1 );  ?></a>
				</div>
			</footer>
				
			<div class="comment-content">
				<p>
					<?php comment_text() ?>
				</p>
			</div>
			
		</article>
		</li>
<?php
        }
endif;


add_filter('the_content', 'vsion_add_link_underline');
add_filter('the_excerpt', 'vsion_add_link_underline');

function vsion_add_link_underline($content) {
    return str_replace('<a', '<a style="text-decoration: underline;"', $content);
}