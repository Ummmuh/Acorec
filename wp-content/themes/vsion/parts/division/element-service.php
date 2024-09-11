<?php
$service_title 			= get_theme_mod('service_title', 'The document that outlines what the Investors will get for what they put in ');
$service_subtitle		= get_theme_mod('service_subtitle', 'Our Service');
$service_contents		= get_theme_mod('service_contents', themes_get_service_default());
?>
<!-- our service -->

<section id="service-section" class="service-section service-home st-py-default">
	<div class="container">
		<div class="row">
		<?php if (!empty($service_title)  || !empty($service_subtitle)) { ?>
			<div class="col-lg-7 col-12 mx-lg-auto mb-5 text-center">
				<div class="heading-default style1 wow fadeInUp">
				<?php if (!empty($service_subtitle)) : ?>
					<h2><?php echo esc_html($service_subtitle); ?></h2>
					<?php endif; ?>
					<?php if (!empty($service_title)) : ?>
					<h4>
					<?php echo esc_html($service_title); ?>
					</h4>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php } ?>
		

		

		<div class="row">
			<?php
			if (!empty($service_contents)) {
				$service_contents = json_decode($service_contents);
				$count = 1;
				foreach ($service_contents as $service_item) {
					$icon = !empty($service_item->icon_value) ? apply_filters('vsion_translate_single_string', $service_item->icon_value, 'Service section') : '';
					$subtitle = !empty($service_item->subtitle) ? apply_filters('vsion_translate_single_string', $service_item->subtitle, 'Service section') : '';
					$title = !empty($service_item->title) ? apply_filters('vsion_translate_single_string', $service_item->title, 'Service section') : '';
					$link = !empty($service_item->link) ? apply_filters('vsion_translate_single_string', $service_item->link, 'Service section') : '';
			?>
			<div class="col-lg-3 col-md-6 col-sm-12">
				<div class="vs_flipbox mb-30">
					<div class="vs_flipbox_font">
						<div class="vs_flipbox_inner">
							<div class="vs_flipbox_icon">
								<div class="icon">
									<i class="fa <?php echo esc_attr($icon); ?>"></i>
								</div>
							</div>
							<div class="flipbox_title">
								<h3><?php echo esc_html($title); ?></h3>
							</div>
						</div>
					</div>
					<div class="vs_flipbox_back">
						<div class="vs_flipbox_inner">
							<div class="flipbox_title">
								<h3 class="text-white"><?php echo esc_html($title); ?></h3>
							</div>
							<div class="flipbox_desc">
								<p><?php echo esc_html($subtitle); ?></p>
								<a href="<?php echo esc_url($link); ?>" class="service-i"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
					
			<?php }
			} ?>
		</div>
	</div>
</section>
<!-- our service end -->