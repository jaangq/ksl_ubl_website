$(document).ready(function() {
  $(window).scroll(function (event) {
    var scroll = $(window).scrollTop();
    if (scroll > 80 && !$('nav.navbar').hasClass('nav-scrolled')) {
      $('nav.navbar').addClass('nav-scrolled');
    } else if (scroll <= 80 && $('nav.navbar').hasClass('nav-scrolled')){
      $('nav.navbar').removeClass('nav-scrolled');
    }
  });
});
