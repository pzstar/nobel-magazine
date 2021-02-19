jQuery(document).ready(function($) {
  /** Preloader */
  $(".gm-preloader").addClass("remove");

  /** Goto Top */
  $("#gotop").gotop();

  /** Search Toggle */
  $(".gm-search .search-open").on("click", function(e) {
    e.preventDefault();
    $(this)
      .parents(".gm-search")
      .addClass("active");
  });

  $(".gm-search .search-close").on("click", function(e) {
    e.preventDefault();
    $(this)
      .parents(".gm-search")
      .removeClass("active");
  });

  /** Newsticker */
  $(".gm-news-ticker .ticker-lists").owlCarousel({
    items: 1,
    autoplay: true,
    nav: false,
    dots: false,
    animateIn: "fadeIn",
    animateOut: "fadeOut"
  });

  /** Parallax Post background */
  $(".post-inner-page-banner").parallax();
});

/** Go to Top */
(function($) {
  $.fn.gotop = function(e) {
    $.each(this, function(index, el) {
      var gotop = $(el);

      gotop.on("click", function(e) {
        e.preventDefault();
        $("html, body").animate({ scrollTop: 0 }, "300");
      });

      $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
          gotop.addClass("show");
        } else {
          gotop.removeClass("show");
        }
      });
    });
  };
})(jQuery);
