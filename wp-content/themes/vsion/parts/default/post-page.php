<?php

/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Vsion
 */
$categories = get_the_category();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?> class="article-items">
	<?php if (has_post_thumbnail()) { ?>
		<figure class="article-image">
			<div class="featured-image">
				<a href="<?php echo esc_url(get_permalink()) ?>" class="post-hover">
					<?php the_post_thumbnail('large'); ?>
				</a>
			</div>
		</figure>
	<?php } ?>

	<div class="article-content">
		<div class="article-meta">
			<span class="author-name">
				<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))) ?>" class="author meta-info hide-on-mobile" title="<?php echo esc_url(get_avatar_url(get_the_author_meta('name'))) ?>">
					<i class="fa fa-user author-icon"></i>
					<span class="author-name"><?php esc_html(the_author()); ?></span>
				</a>
			</span>
			<?php if ($categories) { ?>
				<span class="article-comment">
					<i class="fa fa-folder-open"></i>
					<a href="#"><?php the_category(',', ''); ?></a>
				</span>
			<?php } ?>

			<?php if (has_post_thumbnail()) { ?>
				<span class="article-favourite-link">
				  <?php echo esc_html(get_the_date('j')); ?>
					<time datetime="2020-06-22" class="meta-info"><?php echo esc_html(get_the_date('M')); ?></time>
				</span>
			<?php }	?>
			
			<?php if (has_tag()) { ?>
				<span class="tags"><a href="#"><i class="fa fa fa-tags"></i> <?php the_tags(',', ''); ?></a></span>
			<?php } ?>
		</div>
		<div class="article-post-content">
			<?php
			the_title(sprintf('<h6 class="post-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h6>');

			the_excerpt("<p></p>");
			?>
		</div>
		<div class="article-post-meta article-post-tags">
			<a href="<?php echo esc_url(get_permalink()) ?>" target="_blank" class="d-flex more-link">
				<span> <?php echo esc_html__('Read More','vsion'); ?> </span>
				<span class="ms-auto">
					<i class="fa fa-angle-double-right"></i>
				</span>
			</a>
		</div>


	</div>
</article>