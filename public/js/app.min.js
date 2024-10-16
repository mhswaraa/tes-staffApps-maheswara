(function ($) {
  "use strict";
  // Preloader
  $(window).on("load", function () {
    $(".preloader").addClass("hidden");
    $('[data-popup="tooltip"]').tooltip();
  });
  // Canvas
  $(".desktop_trigger, .trigger-right").on("click", function () {
    $(".desktop_trigger").toggleClass("active");
    $(".aside_canvas").toggleClass("open");
  });
  // Search
  $(".search_trigger>a, .close-search-trigger").on("click", function () {
    $(".search-form-wrapper").toggleClass("open");
  });
  // Mobile Menu
  $(".mobile_trigger, .trigger-left").on("click", function () {
    $(".mobile_trigger").toggleClass("active");
    $(".aside_mobile").toggleClass("open");
  });
  // Menu Trigger Close
  // $(".menu-item").on("click", function () {
  //   $(".aside_mobile").removeClass("open");
  // });
  $(".menu-item-has-children ul li.menu-item").on("click", function () {
    $(".aside_mobile").removeClass("open");
  });
  $(".aside_mobile .menu-item-has-children > a").on("click", function (e) {
    var submenu = $(this).next(".sub-menu");
    e.preventDefault();
    submenu.slideToggle(200);
  });
  var header = $(".can-sticky");
  var footer = $(".ft-sticky");
  var headerHeight = header.innerHeight();
  var FooterHeight = footer.innerHeight();

  function doSticky() {
    if (window.pageYOffset > headerHeight - 90) {
      header.addClass("sticky");
    } else {
      header.removeClass("sticky");
    }
    if (window.pageYOffset > FooterHeight) {
      footer.addClass("d-flex");
    } else {
      footer.removeClass("d-flex");
    }
  }
  doSticky();
  //On scroll events
  $(window).on("scroll", function () {
    doSticky();
  });
  if ($(".back-to-top").length) {
    $(".back-to-top").on("click", function () {
      var target = $(this).attr("data-target");
      // animate
      $("html, body").animate(
        {
          scrollTop: $(target).offset().top,
        },
        1000
      );

      return false;
    });
  }
  // testimoni Slider
  $(".testimoni_slider").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    arrows: true,
    dots: true,
    autoplaySpeed: 2000,
    responsive: [
      {
        breakpoint: 1199,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
          arrows: false,
        },
      },
    ],
  });

  $(".office_slider").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: false,
    arrows: true,
    draggable: true,
    dots: true,
    autoplaySpeed: 2000,
    responsive: [
      {
        breakpoint: 1199,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
        },
      },
    ],
  });

  $(".testimoni_slider_single").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    arrows: false,
    dots: false,
    autoplaySpeed: 2000,
  });
  $(".testimoni_slider_main").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    arrows: true,
    dots: false,
    infinite: true,
    autoplaySpeed: 2000,
    asNavFor: ".testimoni_slider_nav",
    responsive: [
      {
        breakpoint: 991,
        settings: {
          arrows: false,
        },
      },
    ],
  });
  $(".testimoni_slider_nav").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    arrows: false,
    dots: true,
    infinite: true,
    autoplaySpeed: 2000,
    asNavFor: ".testimoni_slider_main",
    focusOnSelect: true,
  });
  // Coach Slider
  $(".coach_slider").slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    arrows: false,
    dots: true,
    dotsClass: "slick-dots style_2",
    autoplaySpeed: 2000,
    responsive: [
      {
        breakpoint: 1499,
        settings: {
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 680,
        settings: {
          slidesToShow: 1,
        },
      },
    ],
  });
  //   // Magnific Popup
  //   $(".popup-youtube").magnificPopup({ type: "iframe" });
  //   $(".gallery-thumb").magnificPopup({
  //     type: "image",
  //     gallery: {
  //       enabled: true,
  //     },
  //   });
  //   // Filter Isotope
  //   function doIsotope() {
  //     var $filterGrid = "";

  //     $(".masonry").imagesLoaded(function () {
  //       $filterGrid = $(".filteritems").isotope({
  //         itemSelector: ".masonry-item",
  //         percentPosition: true,
  //         masonry: {
  //           columnWidth: ".masonry-item",
  //         },
  //       });
  //     });

  //     $(".filter-btns").on("click", ".filter-trigger", function () {
  //       var filterValue = $(this).attr("data-filter");
  //       $filterGrid.isotope({ filter: filterValue });
  //     });

  //     $(".filter-trigger").on("click", function (e) {
  //       $(this).closest(".filter-btns").find(".active").removeClass("active");
  //       $(this).addClass("active");
  //       event.preventDefault();
  //     });
  //     // init isotope on features
  //     $(".feature-masonry").isotope({
  //       itemSelector: ".grid-item",
  //       percentPosition: true,
  //     });
  //     // init isotope on features
  //     $(".blog-masonry").isotope({
  //       itemSelector: ".masonry-item",
  //       percentPosition: true,
  //     });
  //   }
  //   doIsotope();
  //   // Counter
  //   $(".counter>b").each(function () {
  //     var $this = $(this);
  //     $this.one("inview", function (event, isInView) {
  //       if (isInView) {
  //         $this.countTo({ speed: 2000 });
  //       }
  //     });
  //   });
  //   // Progress bar
  //   $(".progress_block").each(function () {
  //     var progressBar = $(this).find(".progress-bar");
  //     var progressTitle = $(this).find(".title>b");
  //     $(progressBar).one("inview", function (event, isInView) {
  //       if (isInView) {
  //         $(progressBar).animate({
  //           width: $(progressBar).attr("aria-valuenow") + "%",
  //         });
  //       }
  //     });
  //     $(progressTitle).one("inview", function (event, isInView) {
  //       if (isInView) {
  //         $(progressTitle).animate({
  //           left: $(progressTitle).attr("data-to") + "%",
  //         });
  //       }
  //     });
  //   });
  //   // Easy pie bar
  //   $(".circle_bar").each(function () {
  //     var circleBar = $(this);
  //     $(circleBar).one("inview", function (event, isInView) {
  //       if (isInView) {
  //         $(circleBar).easyPieChart({
  //           //your configuration goes here
  //           easing: "easeOut",
  //           delay: 3000,
  //           scaleColor: false,
  //           lineWidth: 6,
  //           trackWidth: 6,
  //           animate: 2000,
  //         });
  //       }
  //     });
  //   });
  //   $(".countdown-timer").each(function () {
  //     var $this = $(this);
  //     $this.countdown($this.data("countdown"), function (event) {
  //       $(this).text(event.strftime("%D : %H : %M : %S"));
  //     });
  //   });
})(jQuery);
