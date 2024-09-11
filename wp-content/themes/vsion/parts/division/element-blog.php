  <!--===// Start: Our articules
    =================================-->
	<?php
	$blog_title			= get_theme_mod('blog_title', 'The document that outlines what the Investors will get for what they put in ');
	$blog_subtitle		= get_theme_mod('blog_subtitle', 'Our Blog');
	$blog_display_num	= get_theme_mod('blog_display_num', '4');
	?>
  <section id="article-section" class="article-section st-py-default">
  	<div class="container">
  		<div class="row">
		  <?php if (!empty($blog_title)  || !empty($blog_subtitle)) { ?>
  				<div class="col-lg-7 col-12 mx-lg-auto mb-5 text-center">
  					<div class="heading-default wow fadeInUp style1">
  						<?php if (!empty($blog_subtitle)) : ?>
  							<h2>
  								<?php echo esc_html($blog_subtitle); ?>
  							</h2>
  						<?php endif; ?>

  						<?php if (!empty($blog_title)) : ?>
  							<h4>
  								
  									<?php echo esc_html($blog_title); ?>
  								
  							</h4>
  						<?php endif; ?>
  					</div>
  				</div>


  			<?php } ?>
  		</div>
  		<div class="row">
		  <?php
				$vsion_blog_args = array('post_type' => 'post', 'posts_per_page' => $blog_display_num, 'post__not_in' => get_option("sticky_posts"));

				$vsion_wp_query = new WP_Query($vsion_blog_args);
				if ($vsion_wp_query) {
					while ($vsion_wp_query->have_posts()) : $vsion_wp_query->the_post();


				?>
  			<div class="col-lg-3 col-md-6 mb-4 wow fadeInUp">
  				<div class="col">
  					<article class="article-items">
  						<figure class="article-image">
  							<div class="featured-image">
							  <?php if (has_post_thumbnail()) {
										the_post_thumbnail('medium');
									} ?>
  							</div>
  						</figure>
  						<div class="article-content">
  							<div class="article-meta">
  								<span class="author-name">
  									<a href="javascript:void(0);" class="author meta-info hide-on-mobile">
  										<i class="fa fa-user author-icon"></i>
  										<span class="author-name"><?php esc_html(the_author()); ?></span>
  									</a>
  								</span>
  								
								<?php
									$categories = get_the_category(); // Get the categories associated with the post
									if ($categories) { // Check if there are categories available
								?>
  										<span class="article-comment">
  											<a href="#"><i class="fa fa-folder-open"></i> <?php the_category(',', ''); ?></a>
											  </span>
  								<?php }	?>
								
  								<?php if (has_post_thumbnail()) { ?>
									<span class="article-favourite-link">
									  <?php echo esc_html(get_the_date('j')); ?>
										<time datetime="2020-06-22" class="meta-info"><?php echo esc_html(get_the_date('M')); ?></time>
									</span>
								<?php }	?>
  							</div>
  							<div class="article-post-content">
  								<h6 class="post-title">
  									<a href="#" rel="bookmark"><?php
									the_title(sprintf('<h2 class="post-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');
									
									?></a>
  								</h6>
  								<p>
								 <?php the_excerpt();?>
  								</p>
  							</div>
  							<div class="article-post-meta article-post-tags">
  								<a href="<?php echo esc_url(get_permalink()) ?>" class="d-flex more-link">
  									<span class=""> <?php echo esc_html__('Read More', 'vsion'); ?></span>
  									<span class="ms-auto">
  										<i class="fa fa-angle-double-right"></i>
  									</span>
  								</a>
  							</div>
  						</div>
  					</article>
  				</div>
  			</div>
  			<?php
					endwhile;
				}
				wp_reset_postdata();
				?>
  		</div>
  	</div>
  </section>

  
  <!-- end -->
  <!-- End: Our Blog
    =================================-->