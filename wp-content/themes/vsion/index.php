<?php

/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vsion
 */

get_header();
$vsion_blog_pg_layout 			= get_theme_mod('blog_page_layout', 'vsion_rsb');
$pg_blog_ttl 		= get_theme_mod('pg_blog_ttl', 'The document that outlines what the Investors will get for what they put in ');
$pg_blog_subttl 	= get_theme_mod('pg_blog_subttl', 'Outstanding Blog');
$col_class = ($vsion_blog_pg_layout == 'vsion_fullwidth') ? 'col-lg-10 mx-auto' : 'col-lg-8';
vsion_breadcrumbs_style();
?>
<!--===// Start: Our Blog
    =================================-->

<!-- End: Our Blog
    =================================-->
<!-- blog section -->
<section id="post-section" class="post-section st-py-default">
	<div class="container">
		<?php if (!empty($pg_blog_ttl)  || !empty($pg_blog_subttl)) : ?>
			<div class="row">
				<div class="col-lg-7 col-12 mx-lg-auto mb-5 text-center">
					<div class="heading-default style1 wow fadeInUp">
						<?php if (!empty($pg_blog_subttl)) : ?>

							<h2><?php echo esc_html($pg_blog_subttl); ?></h2>

						<?php endif; ?>

						<?php if (!empty($pg_blog_ttl)) : ?>
							<h4>
								<?php echo wp_kses_post($pg_blog_ttl); ?>
							</h4>
						<?php endif; ?>

					</div>
				</div>
			</div>
		<?php endif; ?>

		<div class="row gy-md-0 gy-5 wow fadeInUp">
			<div class="col-md-4 col-lg-3 pl-md-4 order-1">
				<?php if ($vsion_blog_pg_layout == 'vsion_lsb') : get_sidebar();
				endif; ?>
			</div>
			<div class="<?php echo esc_attr($col_class); ?>">
				<div class="row row-cols-1 row-cols-md-2 pe-lg-0">
					<?php if (have_posts()) : ?>
						<?php while (have_posts()) : the_post();
						?>
							<div class="row gy-md-0 gy-5 wow fadeInUp">
								<?php get_template_part('parts/default/post', 'page'); ?>
							</div>
						<?php endwhile; ?>
						<!-- Pagination -->


						<!-- Pagination -->

					<?php else : ?>
						<?php get_template_part('parts/default/post', 'none'); ?>
					<?php endif; ?>
				</div>
				<div class="row">
					<div class="col-12 text-center mt-5">
						<div class="sp-post-pagination">
							<div class="nav">
								<?php
								// Previous/next page navigation.
								the_posts_pagination(array(
									'prev_text'          => ' <i class="fa fa-chevron-left"></i>',
									'next_text'          => '<i class="fa fa-chevron-right"></i>',
								)); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php if ($vsion_blog_pg_layout == 'vsion_rsb') : get_sidebar();
			endif; ?>
		</div>
	</div>
</section>
<!-- end -->
<?php get_footer(); ?>