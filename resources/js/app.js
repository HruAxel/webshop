require('./loader');

$(document).ready(function() {
    $(window).on("scroll", function() {
      let navbar = $(".navbar");
      if ($(window).scrollTop() >= 40) {
        if (navbar.hasClass("py-2")) {
          navbar.removeClass("py-2");
          navbar.addClass("compressed");
        }
      } else {
        if (navbar.hasClass("compressed")) {
          navbar.addClass("py-2");
          navbar.removeClass("compressed");
        }
      }
    });
  });