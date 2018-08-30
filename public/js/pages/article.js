$(document).on('scroll', function() {
    let end_scroll = $('.end-scroll').position().top;
    let start_scroll = $('.start-scroll').position().top;
    if($(this).scrollTop() > start_scroll && $(this).scrollTop() < end_scroll){
      $('.sosmed-icon').removeClass('sosmed-icon-start sosmed-icon-end').addClass('sosmed-icon-mid');
    } else if($(this).scrollTop() < start_scroll) {
      $('.sosmed-icon').removeClass('sosmed-icon-mid sosmed-icon-end').addClass('sosmed-icon-start');
    } else if($(this).scrollTop() > end_scroll){
      $('.sosmed-icon').removeClass('sosmed-icon-start sosmed-icon-mid').addClass('sosmed-icon-end');
    }
})
