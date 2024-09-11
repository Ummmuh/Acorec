<?php
$footer_copyright     = get_theme_mod('footer_copyright', 'Copyright &copy; [current_year] | Powered by [theme_author]');
$above_footer_title = get_theme_mod('above_footer_title','We Design the best WorsPress Themes with Features');
$above_footer_subtitle =get_theme_mod('above_footer_subtitle','like responsive design');
$tlh_subtitle_link =get_theme_mod('tlh_subtitle_link','#');
$above_footer_contact=get_theme_mod('above_footer_contact','+91 12345 67890');
$theme_copyright_allowed_tags = array(
  '[current_year]' => date_i18n('Y', current_time('timestamp')),
  '[site_title]'   => get_bloginfo('name'),
  '[theme_author]' => sprintf(__('<a href="#">Vsion</a>', 'vsion')),
);
?>
<!-- footer section -->
<footer id="footer-section" class="footer-section main-footer footer-bg-image">
  <div class="footer-aboves">
    <div class="container">
      <div class="row align-items-center wow">
        <div class="col-lg-6 col-md-12 col-12">
          <div class="footer-above-widget text-lg-left text-md-center text-center">
            <aside class="widget widget-contact">
              <div class="contact-area">
                

                <div class="contact-info">
                  <span class="title"> <?php echo esc_html($above_footer_title); ?>
                  </span>
                  <span class="text">
                    <a href="<?php echo esc_url($tlh_subtitle_link); ?>">
                      <span class="text-primary"><?php echo esc_html($above_footer_subtitle); ?></span>
                    </a>
                  </span>
                </div>
              </div>
            </aside>
          </div>
        </div>
        <div class="col-lg-6 col-md-9 col-12 mt-lg-0 mx-md-auto mt-5">
          <div class="owl-theme d-flex justify-content-end">
            <aside class="widget widget-contact">
              <div class="contact-areas">
                <div class="contacts-icons">
                  <div class="contact-corn">
                    <i class="fa fa-whatsapp"></i>
                  </div>
                </div>
                <div class="contact-info">
                  <span class="title"><?php echo esc_html__('if have Any Query?','vsion'); ?></span>
                  <span class="text">
                  <a href="tel:+<?php echo esc_url($above_footer_contact); ?>"><?php echo esc_html__('Toll free:','vsion'); ?><?php echo esc_html($above_footer_contact); ?> </a>
                    
                  </span>
                 
                </div>
              </div>
            </aside>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-main-contant">
    <div class="container">
      <div class="row">

        <?php if (is_active_sidebar('vsion-footer-layout-first')) : ?>
          
            <?php dynamic_sidebar('vsion-footer-layout-first'); ?>
          
        <?php endif; ?>

      </div>
    </div>
  </div>

  <div class="footer-copyrights">
    <div class="container">
      <div class="row align-items-center wow fadeInUp pt-4">
        <div class="col-lg-12 col-12 text-lg-center text-md-right text-center">
          <h4 class="copyright-text">
            <?php
            echo apply_filters('theme_footer_copyright', wp_kses_post(themes_str_replace_assoc($theme_copyright_allowed_tags, $footer_copyright)));
            ?>
          </h4>
        </div>
      </div>
    </div>
  </div>
</footer>

<!-- ScrollUp -->
<?php
$hs_scroller   = get_theme_mod('hs_scroller', '1');
if ($hs_scroller == '1') :
?>
  <!-- scroll-top -->
  <button type="button" class="scrollingUp scroll-btn" aria-label="scrollingUp"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>
<?php endif; ?>

<?php
wp_footer(); ?>
</body>

</html>