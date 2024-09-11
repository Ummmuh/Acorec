<!--===// Start: Preloader =================================-->
<?php
$hide_show_social_icon = get_theme_mod('hide_show_social_icon', '1');
$hide_show_top_header_details = get_theme_mod('hide_show_top_header_details', '1');
$hide_show_search = get_theme_mod('hide_show_search', '1');
$tlh_text = get_theme_mod('tlh_text', ' Think of all the think you have to process alone ');
$tlh_top_button_label = get_theme_mod('tlh_top_button_label', 'Get in Touch');
$tlh_top_button_link = get_theme_mod('tlh_top_button_link', '#');

do_action('vsion_preloader');
?>
<!--===// End: Preloader =================================-->

<!--===// Start: Main Header =================================-->
<header id="main-header" class="main-header">
  <!--===// Start: Header Above =================================-->
  <div id="above-header" class="above-header d-lg-block d-none wow fadeInDown">
    <div class="header-widget d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div class="col-xl-6 col-lg-8 col-12 mb-lg-0 mb-4">
            <?php if ($hide_show_top_header_details == '1') : ?>
              <div class="widget-left text-center text-lg-left">
                <aside id="widget-text" class="widget widget_text">
                  <div class="textwidget d-flex justify-content-center">
                    <span class="shield-icon align-self-center">
                      <i class="fas fa-shield-alt position-relative"></i>
                    </span>
                    <span class="ps-2 align-self-center">
                      <?php echo esc_html($tlh_text); ?>
                      <?php if (!empty($tlh_top_button_label)) : ?>
                        <a href="<?php echo esc_url($tlh_top_button_link); ?>" class="text-primary1"><?php echo esc_html($tlh_top_button_label); ?></a>
                      <?php endif; ?>
                    </span>
                  </div>
                </aside>
              </div>
            <?php endif; ?>
          </div>
          <div class="col-xl-6 col-lg-4 col-12 mb-lg-0 mb-4">
            <?php if ($hide_show_social_icon == '1') : ?>
              <div class="widget-right justify-content-lg-end justify-content-center text-lg-right text-center">
                <?php do_action('themes_social'); ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===// End: Header Above =================================-->

  <!--===// Start: Navigation Wrapper =================================-->
  
    <!--===// Start: Main Desktop Navigation =================================-->
    <div class="main-navigation-area d-none d-lg-block">
      <div class="main-navigation <?php echo esc_attr(vsion_sticky_menu()); ?>">
        <div class="container">
          <div class="row">
            <div class="col-2 my-auto">
              <div class="logo">
                <?php do_action('themes_logo'); ?>
              </div>
            </div>
            <div class="col-10 my-auto">
              <nav class="navbar-area">
                <div class="main-navbar mx-auto">
                  <?php do_action('themes_primary_menu'); ?>
                </div>
                <div class="main-menu-right ml-auto">
                  <div class="menu-right-list widget widget_nav_widget">
                    <ul>
                      <li>
                        <span>
                          <?php if ($hide_show_search == '1') : ?>
                            <a href="#" aria-label="<?php echo esc_attr__('search', 'vsion'); ?>" data-bs-toggle="modal" data-bs-target="#search">
                              <i class="fa fa-search"></i>
                            </a>
                          <?php endif; ?>
                        </span>
                      </li>
                      <?php
                      $tlh_btn_lbl = get_theme_mod('tlh_btn_lbl', 'Buy Now');
                      $tlh_btn_link = get_theme_mod('tlh_btn_link', '#');
                      if (!empty($tlh_btn_lbl)) :
                      ?>
                        <li class="w-auto bg-transparent border-0">
                          <a href="<?php echo esc_url($tlh_btn_link); ?>" class="btn btn-dark btn-dark1 rounded-pill" aria-label="<?php echo esc_attr__('book now button', 'vsion'); ?>"><?php echo esc_html($tlh_btn_lbl); ?></a>
                        </li>
                      <?php endif; ?>
                    </ul>
                  </div>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--===// End: Main Desktop Navigation =================================-->

    <!--===// Start: Main Mobile Navigation
            =================================-->
    <div class="main-mobile-nav is-sticky-on">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="main-mobile-menu">
              <div class="mobile-logo">
                <div class="logo">
                  <?php do_action('themes_logo'); ?>
                </div>
              </div>
              <div class="menu-collapse-wrap ms-auto">
                <div class="hamburger-menu">
                  <button type="button" class="menu-collapsed" aria-label="Menu Collaped">
                    <i class="fa  fa-bars text-white fs-4"></i>
                  </button>
                </div>
              </div>
              <div class="main-mobile-wrapper">
                <div id="mobile-menu-build" class="main-mobile-build">
                  <button type="button" class="header-close-menu close-style" aria-label="Header Close Menu"></button>
                </div>
                <div class="main-mobile-overlay" tabindex="-1"></div>
              </div>
             
              <div class="header-above-wrapper">
                <div id="header-above-bar" class="header-above-bar"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--===// End: Main Mobile Navigation
            =================================-->

  <?php if ($hide_show_search == '1') : ?>
    <!--===// Start: Header Search PopUp =================================-->
    <div class="modal fade" id="search" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 bg-transparent">
          <div class="modal-header mx-auto border-0">
            <button type="button" class="btn btn-theme1 btn-closed rounded-circle" data-bs-dismiss="modal" aria-label="Close">
              <i class="fa fa-times"></i>
            </button>
          </div>
          <div class="modal-body">
            <form method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
              <div class="input-group mb-3">
                <div class="form-floating">
                  <input type="text" class="form-control" id="floatingInputGroup1" name="s" placeholder="<?php echo esc_attr__('Search', 'vsion'); ?>">
                  <label for="floatingInputGroup1"><?php echo esc_html__('Search', 'vsion'); ?></label>
                </div>
                <button type="submit" class="input-group-text btn btn-theme1 rounded-0">
                  <i class="fa fa-search lh-lg fs-5"></i>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--===// End: Header Search PopUp =================================-->
  <?php endif; ?>
</header>
<!-- End: Main Header =================================-->