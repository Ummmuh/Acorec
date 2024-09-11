<?php
$hs_breadcrumb					= get_theme_mod('hs_breadcrumb', '1');
if ($hs_breadcrumb == '1') {
?>
	<!--// Start: Breadcrumb-->
	<section id="breadcrumb-section" class="breadcrumb-area1 position-relative">
		<div class="img-breadcrumb">
			<img src="<?php echo get_theme_file_uri('/assets/images/breadcrumb.jpg') ?>" alt="breadcrumbg" class="w-100 breadcrumbg-h">
		</div>
		<div class="container py-5 position-relative">
			<div class="row mx-0 pt-4">
				<div class="col-6">
					<h1 class="text-white fs-3"><?php
												if (is_home() || is_front_page()) :

													single_post_title();

												elseif (is_day()) :

													printf(__('Daily Archives: %s', 'vsion'), get_the_date());

												elseif (is_month()) :

													printf(__('Monthly Archives: %s', 'vsion'), (get_the_date('F Y')));

												elseif (is_year()) :

													printf(__('Yearly Archives: %s', 'vsion'), (get_the_date('Y')));

												elseif (is_page()) :
													printf(__('%s', 'vsion'), (get_the_title()));

												elseif (is_category()) :

													printf(__('Category: %s', 'vsion'), (single_cat_title('', false)));

												elseif (is_tag()) :

													printf(__('Tag: %s', 'vsion'), (single_tag_title('', false)));

												elseif (is_search()) :

													printf(__('Search For: %s', 'vsion'), (esc_html(get_search_query())));

												elseif (is_single()) :

													printf(__('%s', 'vsion'), (esc_html(get_the_title())));

												elseif (is_404()) :

													printf(__('Error 404', 'vsion'));

												elseif (is_author()) :

													printf(__('Author: %s', 'vsion'), (get_the_author('', false)));

												else :
													echo esc_html__('Default Title', 'vsion');

												endif;

												?></h1>
				</div>
				<div class="col-6 text-end">
					
						<ol class="breadcrumb-list justify-content-end">


							<?php if (function_exists('vsion_breadcrumbs')) vsion_breadcrumbs(); ?>


						</ol>
					
				</div>
			</div>
		</div>
	</section>
	<!-- End: Breadcrumb-->
<?php } ?>