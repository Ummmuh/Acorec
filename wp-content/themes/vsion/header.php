<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php esc_url(bloginfo( 'pingback_url' )); ?>">
		<?php endif; ?>

		<?php wp_head(); ?>
	</head>



<body <?php body_class('above-header-bg'); ?>>
<?php wp_body_open(); ?>

	<div id="page">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'vsion' ); ?></a>
	
	<?php get_template_part('parts/division/element-header'); ?>
	
	<div id="content" class="vsion-content">
	