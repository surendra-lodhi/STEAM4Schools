jQuery.noConflict();
jQuery(document).ready(function ($) {
  //Support for second level dropdowns
  $(".dropdown-sub", this).click(function (e) {
    $(".dropdown-menu", this).toggleClass("show");
  });
  $(document).on("click", ".dropdown", function (e) {
    e.stopPropagation();
  });

  //Mobile Menu
  $(".navbar-toggler, .mobile-menu-close").click(function () {
    if ($(".navbar-collapse, .mobile-menu-close").hasClass("opened")) {
      $(".navbar-collapse, .mobile-menu-close").removeClass("opened");
    } else {
      $(".navbar-collapse, .mobile-menu-close").addClass("opened");
    }
  });

  // Add Bootstrap 'img-responsive; class to all images on pages and posts
  $("#main .entry-content img").each(function () {
    $(this).addClass("img-fluid");
  });

  // Remove any search field values
  $("input.search-field").val("");

  // Remove rel="next" rel="prev" from post navigation links
  $(".nav-links .nav-previous a, .nav-links .nav-next a").removeAttr("rel");
  $("#search").click(function (e) {
    e.preventDefault();
    if ($(".search").hasClass("search-open")) {
      $(".search").removeClass("search-open");
    } else {
      $(".search").addClass("search-open");
    }
  });

  $("#testimonials-slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
  });
});
