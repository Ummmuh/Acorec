<!--===// Start: Slider =================================-->
<?php 
$slider = get_theme_mod('slider', themes_get_slider_default()); 
if (!empty($slider)) {
    $slider = json_decode($slider);
?>
<!-- slider section -->
<section id="slider-section" class="slider-section">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators d-none d-lg-block text-center">
            <?php
                $count = 0;
                foreach ($slider as $slide_item) {
                    $image = !empty($slide_item->image_url) ? apply_filters('vsion_translate_single_string', $slide_item->image_url, 'slider section') : '';
            ?>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo esc_attr($count); ?>" class="<?php echo $count == 0 ? 'active' : ''; ?>" aria-current="true" aria-label="Slide <?php echo esc_attr($count); ?>">
                <img src="<?php echo esc_url($image); ?>" alt="slider <?php echo esc_attr($count + 1); ?>" class="w-100 h-100">
            </button>
            <?php 
                $count++;
                }
            ?>
        </div>
        <div class="carousel-inner">
            <?php
                $count = 0;
                foreach ($slider as $slide_item) {
                    $title = !empty($slide_item->title) ? apply_filters('vsion_translate_single_string', $slide_item->title, 'slider section') : '';
                    $text = !empty($slide_item->text) ? apply_filters('vsion_translate_single_string', $slide_item->text, 'slider section') : '';
                    $button = !empty($slide_item->text2) ? apply_filters('vsion_translate_single_string', $slide_item->text2, 'slider section') : '';
                    $link = !empty($slide_item->link) ? apply_filters('vsion_translate_single_string', $slide_item->link, 'slider section') : '';
                    $image = !empty($slide_item->image_url) ? apply_filters('vsion_translate_single_string', $slide_item->image_url, 'slider section') : '';
                    $active_class = ($count == 0) ? 'active' : '';
            ?>
            <div class="carousel-item <?php echo esc_attr($active_class); ?>">
                <div class="view">
                    <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr__('Slider Image', 'vsion'); ?>">
                    <div class="mask rgba-black-light"></div>
                </div>
                <div class="carousel-caption">
                    <div class="main-content text-start">
                        <span class="top-heading"><?php echo esc_html($text); ?> </span>
                        <h1 class="banner-text" data-animation="fadeInUp" data-delay="200ms">
                            <?php echo esc_html($title); ?>
                        </h1>
                        <?php if (!empty($link) && !empty($button)): ?>
                        <a data-animation="fadeInUp" target="_blank" href="<?php echo esc_url($link); ?>" data-delay="800ms" class="btn btn-theme1">
                            <?php echo esc_html($button); ?>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php 
                $count++;
                }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden"><?php echo esc_html__('Previous','vsion'); ?></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden"><?php echo esc_html__('Next','vsion'); ?></span>
        </button>
    </div>
</section>
<!-- slider section -->
<?php } ?>
<!--===// End: Slider -->