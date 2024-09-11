<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vsion pro
 */

get_header();
$vsion_default_pg_layout 		= get_theme_mod('vsion_default_pg_layout', 'vsion_rsb'); 

$col_class = ($vsion_default_pg_layout == 'vsion_fullwidth')?'col-lg-10 mx-auto':'col-lg-8';

vsion_breadcrumbs_style();

?>
<section class="blog-section blog-page">
	<div class="container">
		<div class="row">
			<?php if($vsion_default_pg_layout == 'vsion_lsb'): 
						if ( class_exists( 'WooCommerce' ) ) {
						if( !is_account_page() || !is_cart() || !is_checkout() ) {
							dynamic_sidebar('vsion-woocommerce-sidebar');
						}
						else{ 
							dynamic_sidebar('vsion-woocommerce-sidebar');
						}
					}
					else{ 
						get_sidebar();
					}	
				endif; ?>
			
			<div class="<?php echo esc_attr($col_class); ?>">
			
				<?php 		
					if( have_posts()) :  the_post();
					
					the_content(); 
					endif;
					
					if( $post->comment_status == 'open' ) { 
						 comments_template( '', true ); // show comments 
					}
				?>
				<?php		
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'vsion' ),
					'after'  => '</div>',
				) );
				
				the_posts_pagination( array(
				'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
				'next_text'          => '<i class="fa fa-angle-double-right"></i>',
				) ); ?>
			</div>
			<?php if($vsion_default_pg_layout == 'vsion_rsb'):
				if ( class_exists( 'WooCommerce' ) ) {
					if( !is_account_page() || !is_cart() || !is_checkout() ) {
						dynamic_sidebar('vsion-woocommerce-sidebar');
					}
					else{ 
						dynamic_sidebar('vsion-woocommerce-sidebar');
					}
				}
				else{ 
					get_sidebar();
				}
				endif;
			?>
		</div>
		
	</div>
</section>
<?php get_footer(); ?>