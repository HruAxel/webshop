require('./loader');

$(document).ready(function () {
  $(window).on("scroll", function () {
    let navbar = $("nav");
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



$(document).ready(function(){
  $(".center_logo").fadeIn(1500)
})

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

$(document).ready(function(){
  $(".fade-1").fadeIn(1500)
})

$(document).ready(function(){
  $(".fade-2").fadeIn(1500)
})

$(document).ready(function(){
  $(".fade-3").fadeIn(2000)
})

$(document).ready(function() {
  $('.add-to-cart-form').on('submit', function(event) {
      event.preventDefault(); // Megakadályozza az oldal újratöltését

      let form = $(this);
      let formData = form.serialize(); // Az űrlap adatainak összegyűjtése

      $.ajax({
          url: form.attr('action'), // Az űrlap 'action' attribútuma
          type: form.attr('method'), // Az űrlap 'method' attribútuma
          data: formData, // Az összegyűjtött űrlapadatok elküldése
          success: function(response) {
              // Itt frissítheted a kosár tartalmát vagy megjeleníthetsz egy üzenetet
              
          },
          error: function(xhr) {
              console.log(xhr.responseText); // Hiba esetén megjeleníti az üzenetet
          }
      });
      return false;
  });
});