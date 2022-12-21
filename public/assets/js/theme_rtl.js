/* ================================= */
    /*===== Owl Caserol =====*/
/* ================================= */
$("#home-slider").owlCarousel({
    rtl: true,
    loop: true,
    items: 1,
    dots: true,
    nav: false,      
    autoplayTimeout: 10000,
    smartSpeed: 2000,
    autoHeight: false,
    touchDrag: true,
    mouseDrag: true,
    margin: 0,
    autoplay: true,
    lazyLoad:true,
    slideSpeed: 600,
    navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
    responsive: {
      0: {
          items: 1,
          nav: false,
          dots: true,
      },
      400: {
          items: 1,
          nav: false,
          dots: true,
      },
      600: {
          items: 1,
          nav: false,
          dots: true,
      },
      768: {
          items: 1,
          nav: false,
          dots: true,
      },
      1000: {
          items: 1,
          nav: false,
          dots: true,
      }
    }
});


$("#blog-slider").owlCarousel({
    rtl: true,
    loop: true,
    items: 4,
    dots: true,
    nav: false,      
    autoplayTimeout: 10000,
    smartSpeed: 2000,
    autoHeight: false,
    touchDrag: true,
    mouseDrag: true,
    margin: 30,
    autoplay: true,
    lazyLoad:true,
    slideSpeed: 600,
    navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
    responsive: {
      0: {
          items: 1,
          nav: false,
          dots: true,
      },
      400: {
          items: 1,
          nav: false,
          dots: true,
      },
      600: {
          items: 2,
          nav: false,
          dots: true,
      },
      768: {
          items: 2,
          nav: false,
          dots: true,
      },
      1000: {
          items: 4,
          nav: false,
          dots: true,
      }
    }
});