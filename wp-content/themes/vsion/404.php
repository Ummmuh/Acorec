<?php

/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Vsion
 */

get_header();
$pg_404_ttl			= get_theme_mod('pg_404_ttl', '4 0 4');
$pg_404_subtitle	= get_theme_mod('pg_404_subtitle', 'Page Not Found');
$pg_404_btn_lbl		= get_theme_mod('pg_404_btn_lbl', 'Back To Home');
$pg_404_btn_url		= get_theme_mod('pg_404_btn_url',' home_url( )');
vsion_breadcrumbs_style();
?>
<!-- 404 section -->
<section id="service-section" class="service-section pb-5 mb-5">
	<div class="container">
		<div class="row">
			<div class="col-12 mx-lg-auto mb-5 text-center">
				<div class="heading-default1 style1 wow fadeInUp">
					<p class="opps mb-0"><?php echo esc_html__('!Opps','vsion'); ?></p>
					<?php if (!empty($pg_404_ttl)) : ?>
						<h1>
							<?php echo wp_kses_post($pg_404_ttl); ?>
						</h1>
					<?php endif; ?>
				</div>
				<?php if (!empty($pg_404_subtitle)) : ?>

					<p class="fw-semibold h3 mb-5">
						<?php echo wp_kses_post($pg_404_subtitle); ?>
					</p>
				<?php endif; ?>
				<div class="text-center">
					
					<?php if (!empty($pg_404_btn_lbl)) : ?>
						<a class="btn btn-theme1" href="<?php echo esc_url($pg_404_btn_url); ?>"><?php echo esc_html($pg_404_btn_lbl); ?></a>
						
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- 404 section -->
<?php get_footer(); ?>