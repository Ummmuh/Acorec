<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Vsion
 */

get_header();
$vsion_search_pg_layout 				= get_theme_mod('search_pg_layout', 'vsion_rsb');

$col_class = ($vsion_search_pg_layout == 'vsion_fullwidth')?'col-lg-10 mx-auto':'col-lg-8';

$post_class = $GLOBALS['wp_query']->found_posts<=1?'col-lg-12':'col-lg-6';
vsion_breadcrumbs_style();
?>
<section class="blog-section blog-page">
	<div class="container">
		<div class="row">
			<?php if($vsion_search_pg_layout == 'vsion_lsb'): get_sidebar(); endif; ?>	
			 <div class="<?php echo esc_attr($col_class); ?>">
				
				<?php if( have_posts() ): ?>
					<div class="row">
						<?php while( have_posts() ) : the_post(); ?>
						<div class="<?php echo esc_attr($post_class); ?> col-md-6 col-sm-12">
						<?php get_template_part('parts/default/post','page'); ?>
					</div>		
				<?php	endwhile; 
					the_posts_navigation();
					?>
				</div>	
				<?php else: ?>
				
					<?php get_template_part('parts/default/post','none'); ?>
					
				<?php endif; ?>
			</div>
			<?php if($vsion_search_pg_layout == 'vsion_rsb'): get_sidebar(); endif; ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
