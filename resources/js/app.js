require('./loader');

$(document).ready(function () {
  $(window).on("scroll", function () {
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

$(".left_h").mouseenter(function () {
  $('.side-left-hover').css("scale", 1.2);
});
$(".left_h").mouseleave(function () {
  $('.side-left-hover').css("scale", 1.0);
});

$(".right_h").mouseenter(function () {
  $('.side-right-hover').css("scale", 1.2);
});
$(".right_h").mouseleave(function () {
  $('.side-right-hover').css("scale", 1.0);
});