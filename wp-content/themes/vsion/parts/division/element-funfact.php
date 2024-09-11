<?php
$funfact_contents		= get_theme_mod('funfact_contents', themes_get_funfact_default()); 
$funfact_bg_img		= get_theme_mod('funfact_bg_img', get_stylesheet_directory_uri() . '/assets/images/Features-bg.png'); 
?>
<!-- funfact section -->

<section id="work-process" class="work-process" <?php if(!empty($funfact_bg_img)){ ?>  style="background:url('<?php echo esc_url( $funfact_bg_img	); ?>') center center fixed, rgba(0, 0, 0, 0.7);" <?php } ?>>
	<div class="container">
		<div class="row work-wrp" data-module="countup">
			<?php
			if (!empty($funfact_contents)) {
				$funfact_contents = json_decode($funfact_contents);
				foreach ($funfact_contents as $funfact_item) {
					$title = !empty($funfact_item->title) ? apply_filters('vsion_translate_single_string', $funfact_item->title, 'Funfact section') : '';
					$subtitle = !empty($funfact_item->subtitle) ? apply_filters('vsion_translate_single_string', $funfact_item->subtitle, 'Funfact section') : '';
					$image = !empty($funfact_item->image_url) ? apply_filters('vsion_translate_single_string', $funfact_item->image_url, 'Funfact section') : '';					
			?>					
					<div class="col-lg-3 col-md-6 col-sm-6 mb-4 text-center">
						<div class="process-box" onmouseover="this.style.backgroundImage='url(<?php echo esc_url($image); ?>)'" onmouseout="this.style.backgroundImage='none';">
							<div class="process-content">
								<?php if (!empty($title)) { ?>
									<p data-countup-number="<?php echo esc_html($title); ?>">
										<?php echo esc_html($title); ?>k
									</p>
								<?php } ?>
								
								<?php if (!empty($subtitle)) { ?>
									<h3>
										<?php echo esc_html($subtitle); ?>
									</h3>
								<?php } ?>
							</div>
						</div>
					</div>
			<?php }
			} ?>
		</div>
	</div>
</section>
<!-- funfact section -->