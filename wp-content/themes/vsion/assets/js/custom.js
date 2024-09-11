(function($) {

    // Preloader
    $(window).load(function() {
      $('.preloader').fadeOut('1000', function () {
        $(this).remove();
      });
    });

    // ScrollUp
    $(window).on('scroll', function () {
      if ($(this).scrollTop() > 200) {
        $('.scrollingUp').addClass('is-active');
      } else {
        $('.scrollingUp').removeClass('is-active');
      }
    });
    $('.scrollingUp').on('click', function () {
      $("html, body").animate({
        scrollTop: 0
      }, 600);
      return false;
    });

    // Sticky Header
    if ($(".is-sticky-on").length > 0) {
    
      $(window).on('scroll', function() {
        if ($(window).scrollTop() >= 250) {
            $('.is-sticky-on').addClass('is-sticky-menu');
        }
        else {
            $('.is-sticky-on').removeClass('is-sticky-menu');
        }
      });
    }

    // Breadcrumb Sticky Menu
    if ($(".breadcrumb-sticky-on").length > 0) {
      $(window).on('scroll', function() {
        if ($(window).scrollTop() >= 420) {
            $('.breadcrumb-sticky-on').addClass('breadcrumb-sticky-menu');
        }
        else {
            $('.breadcrumb-sticky-on').removeClass('breadcrumb-sticky-menu');
        }
      });
    }

    // Home Slider
    if ($(".home-slider").length > 0) {
      var $owlHome = $('.home-slider');
      $owlHome.owlCarousel({
          rtl: $("html").attr("dir") == 'rtl' ? true : false,
          items: 1,
          autoplay: true,
          autoplayTimeout: 10000,
          margin: 0,
          loop: true,
          dots: false,
          nav: true,
          navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
          singleItem: true,
          transitionStyle: "fade",
          touchDrag: true,
          mouseDrag: false,
          responsive: {
              0: {
                  nav: false
              },
              768: {
                  nav: true
              },
              992: {
                  nav: true
              }
          }
      });
      $owlHome.owlCarousel();
      $owlHome.on('translate.owl.carousel', function (event) {
          var data_anim = $("[data-animation]");
          data_anim.each(function() {
              var anim_name = $(this).data('animation');
              $(this).removeClass('animated ' + anim_name).css('opacity', '0');
          });
      });
      $("[data-delay]").each(function() {
          var anim_del = $(this).data('delay');
          $(this).css('animation-delay', anim_del);
      });
      $("[data-duration]").each(function() {
          var anim_dur = $(this).data('duration');
          $(this).css('animation-duration', anim_dur);
      });
      $owlHome.on('translated.owl.carousel', function() {
          var data_anim = $owlHome.find('.owl-item.active').find("[data-animation]");
          data_anim.each(function() {
              var anim_name = $(this).data('animation');
              $(this).addClass('animated ' + anim_name).css('opacity', '1');
          });
      });
      function owlHomeThumb() {
          $('.owl-item').removeClass('prev next');
          var currentSlide = $('.home-slider .owl-item.active');
          currentSlide.next('.owl-item').addClass('next');
          currentSlide.prev('.owl-item').addClass('prev');
          var nextSlideImg = $('.owl-item.next').find('.item img').attr('data-img-url');
          var prevSlideImg = $('.owl-item.prev').find('.item img').attr('data-img-url');
          $('.owl-nav .owl-prev').css({
              backgroundImage: 'url(' + prevSlideImg + ')'
          });
          $('.owl-nav .owl-next').css({
              backgroundImage: 'url(' + nextSlideImg + ')'
          });
      }
      owlHomeThumb();
      $owlHome.on('translated.owl.carousel', function() {
          owlHomeThumb();
      });
    }

    // Testimonial Slider
    if ($(".testimonials-slider").length > 0) {
      var owlTestimonial = $(".testimonials-slider");
      owlTestimonial.owlCarousel({
          rtl: $("html").attr("dir") == 'rtl' ? true : false,
          loop: true,
          dots: false,
          nav: false,
          margin: 30,
          mouseDrag: true,
          touchDrag: true,
          autoplay: true,
          autoplayTimeout: 12000,
          responsive: {
              0: {
                  stagePadding: 10,
                  center: true,
                  items: 1
              },
              768: {
                  stagePadding: 10,
                  center: false,
                  items: 2
              },
              992: {
                  stagePadding: 15,
                  center: true,
                  items: 3
              }
          }
      });
    }

    // Footer Above Carousel
    if ($(".footer-above-carousel").length > 0) {
      var owlFooterAbove = $(".footer-above-carousel");
      owlFooterAbove.owlCarousel({
          rtl: $("html").attr("dir") == 'rtl' ? true : false,
          loop: true,
          dots: false,
          nav: false,
          stagePadding: 0,
          mouseDrag: true,
          touchDrag: true,
          autoplay: true,
          responsiveClass:true,
          responsive: {
              0: {
                  margin: 15,
                  items: 1
              },
              501: {
                  margin: 12,
                  items: 2
              },
              992: {
                  margin: 15,
                  items: 2
              }
          }
      });
    }

    // Service Section Load Button Filter
    $(".service-home .st-load-item").slice(0, 3).show();
    $(".service-home .st-load-btn").on('click', function (e) {
        e.preventDefault();
        $(".service-home .st-load-btn").addClass("loadspinner");
        $(".service-home .st-load-btn").animate({
                display: "block"
            }, 2500,
            function () {
                // Animation complete.                
                // $(".load-2:hidden").slice(0, 2).slideDown()
                // .each(function() {
                //   $('#grid').shuffle('appended', $(this));
                // });
                $(".service-home .st-load-item:hidden").slice(0, 3).slideDown();
                if ($(".service-home .st-load-item:hidden").length === 0) {
                    $(".service-home .st-load-btn").text("No more");
                }
                $(".service-home .st-load-btn").removeClass("loadspinner");
            }
        );
    });
    $(".service-page .st-load-item").slice(0, 6).show();
    $(".service-page .st-load-btn").on('click', function (e) {
        e.preventDefault();
        $(".service-page .st-load-btn").addClass("loadspinner");
        $(".service-page .st-load-btn").animate({
                display: "block"
            }, 2500,
            function () {
                // Animation complete.                
                // $(".load-2:hidden").slice(0, 2).slideDown()
                // .each(function() {
                //   $('#grid').shuffle('appended', $(this));
                // });
                $(".service-page .st-load-item:hidden").slice(0, 3).slideDown();
                if ($(".service-page .st-load-item:hidden").length === 0) {
                    $(".service-page .st-load-btn").text("No more");
                }
                $(".service-page .st-load-btn").removeClass("loadspinner");
            }
        );
    });

    //Projects Section Load Button Filter
    $("#projects-section .st-load-item").slice(0, 6).show();
    $("#projects-section .st-load-btn").on('click', function (e) {
        e.preventDefault();
        $("#projects-section .st-load-btn").addClass("loadspinner");
        $("#projects-section .st-load-btn").animate({
                display: "block"
            }, 2500,
            function () {
                $("#projects-section .st-load-item:hidden").slice(0, 3).slideDown();
                if ($("#projects-section .st-load-item:hidden").length === 0) {
                    $("#projects-section .st-load-btn").text("No more");
                }
                $("#projects-section .st-load-btn").removeClass("loadspinner");
            }
        );
    });

	if ($('.mgf-popup').length > 0) {
        $('.mgf-popup').magnificPopup({
            delegate: 'a',
            type: 'image',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
            },
            callbacks: {
                elementParse: function(item) {
                    if (item.el.length > 0 && item.el[0].className === 'video') {
                        item.type = 'iframe';
                        item.iframe = {
                            patterns: {
                                youtube: {
                                    index: 'youtube.com/',
                                    id: 'v=',
                                    src: '//www.youtube.com/embed/%id%?autoplay=1'
                                },
                                vimeo: {
                                    index: 'vimeo.com/',
                                    id: '/',
                                    src: '//player.vimeo.com/video/%id%?autoplay=1'
                                },
                                gmaps: {
                                    index: '//maps.google.',
                                    src: '%id%&output=embed'
                                }
                            }
                        };
                    } else {
                        item.type = 'image';
                        item.tLoading = 'Loading image #%curr%...';
                        item.mainClass = 'mfp-img-mobile';
                        item.image = {
                            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
                        };
                    }
                }
            }
        });
    }
	
	if ($('.btn-play').length > 0) {
		// Single Magnific Popup Video
		$('.btn-play').magnificPopup({
			type: 'iframe'
		});
	}

    // Counter Up
    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });

    // Skill Counter
    $('.skillbar').each(function(){
      $(this).find('.skillbar-bar').animate({
        width:$(this).attr('data-percent')
      },6000);
    });
    $('.count-bar').each(function () {
      var $this = $(this);
      $({ Counter: 0 }).animate({ Counter: $this.text() }, {
        duration: 6000,
        easing: 'swing',
        step: function () {
          $this.text(Math.ceil(this.Counter));
        }
      });
    });

    // Tab Filter
    var postFilter = $('.st-filter-init');
    $.each(postFilter,function (index,value) {
        var el = $(this);
        var parentClass = $(this).parent().attr('class');
        var $selector = $('#'+el.attr('id'));
        $($selector).imagesLoaded(function () {
            var festivarMasonry = $($selector).isotope({
                itemSelector: '.st-filter-item',
                percentPosition: true,
                masonry: {
                    columnWidth: 0,
                    gutter:0
                }
            });
            $(document).on('click', '.'+parentClass+' .st-tab-filter a', function () {
                var filterValue = $(this).attr('data-filter');
                festivarMasonry.isotope({
                    filter: filterValue
                });
            });
        });
    });
    $(document).on('click', '.st-tab-filter a', function () {
      $(this).siblings().removeClass('active');
      $(this).addClass('active');
    });

    // Tab Swipe Indicator
    if ($('.tab-swipe').length > 0) {
        $('.tab-swipe').append('<li class="indicator"></li>');
        if ($('.tab-swipe li a').hasClass('active')) {
            let cLeft = $('.tab-swipe li a.active').position().left + 'px',
                cWidth = $('.tab-swipe li a.active').css('width');
            $('.indicator').css({
                left: cLeft,
                width: cWidth
            })
        }
        $('.tab-swipe li a').on('click', function () {
            $('.tab-swipe li a').removeClass('is-active');
            $(this).addClass('is-active');
            let cLeft = $('.tab-swipe li a.is-active').position().left + 'px',
                cWidth = $('.tab-swipe li a.is-active').css('width');
            $('.indicator').css({
                left: cLeft,
                width: cWidth
            })
        });
    }

}(jQuery));





    class countUp {
      constructor(el) {
        this.el = el;
        this.setVars();
        this.init();
      }

      setVars() {
        this.number = this.el.querySelectorAll("[data-countup-number]");
        this.observerOptions = {
          root: null,
          rootMargin: "0px 0px",
          threshold: 0,
        };
        this.observer = new IntersectionObserver((entries) => {
          entries.forEach((entry) => {
            const end = parseFloat(
              entry.target.dataset.countupNumber.replace(/,/g, "")
            );

            const decimals = this.countDecimals(end);
            if (entry.isIntersecting) {
              this.iterateValue(entry.target, end, decimals);
            }
          });
        }, this.observerOptions);
      }

      init() {
        if (this.number.length > 0) {
          this.number.forEach((el) => {
            this.observer.observe(el);
          });
        }
      }

      iterateValue(el, end, decimals) {
        const start = 0;
        const duration = 2500;
        let startTimestamp = null;

        const step = (timestamp) => {
          if (!startTimestamp) startTimestamp = timestamp;
          const elapsedPercent = (timestamp - startTimestamp) / duration;
          const easedProgress = Math.min(
            this.easeOutQuint(elapsedPercent),
            1
          );
          let interimNumber = Math.abs(easedProgress * (end - start) + start);
          el.innerHTML = this.formatNumber(interimNumber, decimals);
          if (easedProgress < 1) {
            window.requestAnimationFrame(step);
          }
        };

        // requestAnimationFrame returns DOMHighResTimeStamp as a callback (used as timestamp)
        window.requestAnimationFrame(step);
      }

      easeOutQuad(x) {
        return 1 - Math.pow(1 - x, 3);
      }

      easeOutQuint(x) {
        return 1 - Math.pow(1 - x, 5);
      }

      countDecimals(val) {
        if (Math.floor(val) === val) return 0;
        return val.toString().split(".")[1].length || 0;
      }

      formatNumber(val, decimals) {
        return val.toLocaleString("en-US", {
          minimumFractionDigits: decimals,
          maximumFractionDigits: decimals,
        });
      }
    }

    // Simplifed version of Viget dynamic modules to attach instances for this demo
    // https://www.viget.com/articles/how-does-viget-javascript/
    // You CAN use this pattern, but it's single purpose right now
    const dataModules = [
      ...document.querySelectorAll('[data-module="countup"]'),
    ];

    dataModules.forEach((element) => {
      element.dataset.module.split(" ").forEach(function () {
        new countUp(element);
      });
    });
      //# sourceURL=pen.js