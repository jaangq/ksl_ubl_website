$(window).on('load', function () {
  $('#loader-page').fadeOut().remove();
});


$(document).ready(function() {
  $(window).scroll(function (event) {
    var scroll = $(window).scrollTop();
    if (scroll > 80 && !$('nav.navbar').hasClass('nav-scrolled')) {
      $('nav.navbar').addClass('nav-scrolled');
    } else if (scroll <= 80 && $('nav.navbar').hasClass('nav-scrolled')){
      $('nav.navbar').removeClass('nav-scrolled');
    }
  });
  // a-to-top click
  $('.a-to-top').click(function() {
    $("html, body").animate({ scrollTop: 0 }, "slow");
     return false;
  });
  // a-to-top show when scrollTop = 627
  $(window).scroll(function(e) {
    let scroll = $(window).scrollTop();
    let display = $('.a-to-top').css('display');
    if (scroll >= 627 && display !== 'block') {
      $('.a-to-top').fadeIn();
    } else if (scroll < 627 && display == 'block') {
      $('.a-to-top').fadeOut();
    }
  });
});

// Smooth Scroll
// Select all links with hashes
$(document).on('click', 'a[href*="#"]', function(event) {
  // $('a[href*="#"]')
  //   // Remove links that don't actually link to anything
  //   .not('[href="#"]')
  //   .not('[href="#0"]')
  //   .click(function(event) {
      // On-page links
      if (
        location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
        &&
        location.hostname == this.hostname
      ) {
        // Figure out element to scroll to
        var target = $(this.hash);
        target = target.length ? target : $('[name="' + this.hash.slice(1) + '"]');
        // Does a scroll target exist?
        if (target.length) {
          // Only prevent default if animation is actually gonna happen
          event.preventDefault();
          $('html, body').animate({
            scrollTop: target.offset().top
          }, 1000, function() {
            // Callback after animation
            // Must change focus!
            var $target = $(target);
            $target.focus();
            if ($target.is(":focus")) { // Checking if the target was focused
              return false;
            } else {
              $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
              $target.focus(); // Set focus again
            };
          });
        }
      }
    // });

});

// Language
$(document).on('click', '.lang-li span.nav-link', function(e) {
  if ($(this).find('ul').css('display') === 'none') {
    $(this).css('color', '#7bbae7');
  } else {
    $(this).attr('style', '');
  }
  if (this === e.target) {
    $(this).find('ul').fadeToggle();
  }
});
$(document).on('click', 'li.lang-choice.nav-link', function(e) {
    let val = $(this).attr('val');
    let url = '/lang/'+val;
    $('.lang-li .fa-check').addClass('invisible');
    $(this).find('.fa-check').removeClass('invisible');
    $.ajax({
     type: 'GET',
     url: url,
     success: function(data) {
       $.ajax({
        type: 'GET',
        url: window.location.href,
        success: function(data) {
          $('main').hide().html($(data).find('main')).fadeIn(900);
        },
        error: function(data){
        },
       });
     }
    });
});
