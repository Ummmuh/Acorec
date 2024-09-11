<?php  
$feature_title 			= get_theme_mod('feature_title','Mind Blowing Feature');
$feature_subtitle		= get_theme_mod('feature_subtitle','Our Feature');
$feature_contents		= get_theme_mod('feature_contents',themes_get_feature_default()); ?>	
	<!-- our features -->
    <section class="feature-section home-feature">
        <div class="container">
            <?php if(!empty($feature_title)  || !empty($feature_subtitle)){ ?>
				<div class="section-title">
					<?php if(!empty($feature_subtitle)): ?>
						<div class="section-heading">
							<?php echo esc_html($feature_subtitle); ?>
						</div>
					<?php endif; ?>
					
					<?php if(!empty($feature_title)): ?>
						<p class="animation">
							<span>
								<?php echo esc_html($feature_title); ?>
							</span>
						</p>
					<?php endif; ?>	
				</div>
			<?php } ?>
			
            <div class="feature-item_inner">
                <div class="row row-cols-lg-6 row-cols-sm-3 ">
					<?php
						if ( ! empty( $feature_contents ) ) {
						$feature_contents = json_decode( $feature_contents );
						foreach ( $feature_contents as $feature_item ) {
						$title = ! empty( $feature_item->title ) ? apply_filters( 'vsion_translate_single_string', $feature_item->title, 'Feature section' ) : '';
						$link = ! empty( $feature_item->link ) ? apply_filters( 'vsion_translate_single_string', $feature_item->link, 'Feature section' ) : '';	
						$icon = ! empty( $feature_item->icon_value ) ? apply_filters( 'vsion_translate_single_string', $feature_item->icon_value, 'Feature section' ) : '';
					?>
						<div class="col">
							<div class="feature-item">
								<div class="feature-icon"><i class="fa <?php echo esc_attr($icon); ?>"></i></div>
								<div class="feature-content">
									<h2><?php echo esc_html($title); ?></h2>
									<a href="<?php echo esc_url($link); ?>"><i class="fa fa-chevron-down"></i></a>
								</div>
							</div>
						</div>					
					<?php } } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- end -->