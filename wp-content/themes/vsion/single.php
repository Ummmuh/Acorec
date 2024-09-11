<?php

/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Vsion Pro
 */

get_header();
$vsion_blog_single_layout 			= get_theme_mod('blog_single_layout', 'vsion_rsb');
$pg_blog_ttl 		= get_theme_mod('pg_blog_ttl', 'Mind Blowing Blog');
$pg_blog_subttl 	= get_theme_mod('pg_blog_subttl', 'Our Blog');
$enable_author_box 	= get_theme_mod('enable_author_box', '1');
$col_class = ($vsion_blog_single_layout == 'vsion_fullwidth') ? 'col-lg-10' : 'col-lg-8';
vsion_breadcrumbs_style();
?>

<!--===// Start: Our Blog
    =================================-->
<section id="post-section" class="post-section st-py-default">

	<div class="container">
		<?php if ($vsion_blog_single_layout == 'vsion_lsb') : get_sidebar();
		endif; ?>
		<div class="row gy-md-0 gy-5 wow fadeInUp">
			<div class="col-md-4 col-lg-3 pl-md-4 order-1">
				<div class="sidebar">

					<?php if (is_active_sidebar('vsion-sidebar-primary')) : ?>

						<?php dynamic_sidebar('vsion-sidebar-primary'); ?>

					<?php endif; ?>
				</div>
			</div>

			<div class="col-md-8 col-lg-9">
				<div class="row gx-5 gy-5 pe-lg-3">
					<div class="col-12 mb-4 wow fadeInUp">
						<?php
						if (have_posts()) :
							while (have_posts()) : the_post();
						?>
								<article class="article-items">
									<figure class="article-image">
										<?php if (has_post_thumbnail()) { ?>
											<div class="featured-image">
												<?php the_post_thumbnail('large'); ?>
											</div>
										<?php } ?>
									</figure>
									<div class="article-content">
										<div class="article-meta">
											<span class="author-name">
												<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))) ?>" title="<?php echo esc_url(get_avatar_url(get_the_author_meta('name'))) ?>" class="author meta-info hide-on-mobile">
													<i class="fa fa-user author-icon"></i>
													<span class="author-name"><?php esc_html(the_author()); ?></span>
												</a>
											</span>
											<span class="article-comment">
												<a href="#"><i class="fa fa-folder-open"></i> <?php the_category(',', ''); ?></a>
											</span>
											<span class="article-favourite-link">
												<?php echo esc_html(get_the_date('j')); ?>
												<time datetime="2020-06-22" class="meta-info"><?php echo esc_html(get_the_date('M')); ?></time>
											</span>
										</div>
										<div class="article-post-content">
											<h5 class="post-title">
												<?php the_title(); ?>
											</h5>
											<p>
												<?php

												the_content();
												?>
											</p>
										</div>
									</div>
								</article>
						<?php
							endwhile;
						endif;
						?>
						<?php
						if ($enable_author_box == 1) {
							get_template_part('parts/default/post-author', 'meta');
						}
						?>
					</div>
				</div>

				<div class="w-100">
					<?php comments_template('', true); // show comments  
					?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End: Our Blog
    =================================-->

<?php get_footer(); ?>