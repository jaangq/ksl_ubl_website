$(document).ready(function() {
  $('nav').hide().slideDown(800);
  $('.cover').hide().fadeIn(1200);
});
$(document).on('scroll', function() {
    if($(this).scrollTop()>=$('.about-page-link').position().top){
      // $('.learn-com, .be-our-family, .b-n-l').show(600);
    }
})
