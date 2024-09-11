<?php

/**
 * Template part for displaying author Meta
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Vsion
 */
$vsion_author_description = get_the_author_meta('description');
$vsion_author_id          = get_the_author_meta('ID');
$vsion_current_user_id    = is_user_logged_in() ? wp_get_current_user()->ID : false;
?>
<aside id="widget-text1" class="mt-5">
	<div class="py-1 shadow position-relative">
		<img src="<?php echo get_theme_file_uri('/assets/images/icon1.png');?>" alt="icon1" class="blog-heading-icon shadow">
		<h5 class="widget-title mb-0 py-2 ps-5 text-start">&nbsp;&nbsp;&nbsp;<?php esc_html_e('About the Author', 'vsion'); ?></h5>
	</div>
	<div class="row py-5 textwidget widget widget_text text-center border border-2 border-light">
		<div class="col-lg-3 align-self-center">
			<p class="">
				<?php echo get_avatar(get_the_author_meta('ID'), 200, '', '', array('class' => 'mx-auto border border-3 border-prime rounded-circle')); ?>
			</p>
		</div>
		<div class="col-lg-3 align-self-center">
			<h4><strong> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))) ?>" title="<?php echo esc_url(get_avatar_url(get_the_author_meta('name'))) ?>" class="author">
						<span class="primary-color"><?php esc_html(the_author()); ?></span></span>
					</a></strong></h4>
			<h5 class="text-prime"><?php echo esc_html__('CEO &amp; Founder','vsion'); ?></h5>
			<p>
			<?php
				if ('' === $vsion_author_description) {
					if ($vsion_current_user_id && $vsion_author_id === $vsion_current_user_id) {

						// Translators: %1$s: <a> tag. %2$s: </a>.
						printf(wp_kses_post(__('You haven&rsquo;t entered your Biographical Information yet. %1$sEdit your Profile%2$s now.', 'vsion')), '<a href="' . esc_url(get_edit_user_link($vsion_current_user_id)) . '">', '</a>');
					}
				} else {
					echo wp_kses_post($vsion_author_description);
				}
				?>
			</p>
			<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename'))); ?>" class="main-btn"><?php esc_html_e('View All Post', 'vsion'); ?></a>
		</div>
		
	</div>
</aside>
