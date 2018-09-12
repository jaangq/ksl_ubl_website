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
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).on('click', '#comment-reset', function(){
  $('#comment-send').attr('reply', '');
  $('#comment-textarea').val('');  
})

$(document).on('click', '.reply-comments', function() {
  let val = $(this).attr('val');
  $('#comment-send').attr('reply', val);
  $('.toCommentTop').click();
  $('#comment-textarea').focus();
});

$(document).on('click', '#comment-send', function() {
    let url = '/comments/check';
    let commentReplay = '';
    if ($(this).attr('reply')) {
      commentReplay = $(this).attr('reply');
    }
    let jsData = {
      commentCheck: 'checking',
      commentTextArea: $('#comment-textarea').val(),
      commentPage: $('meta[name="page"][content="posts"]').attr('val'),
      commentReply: commentReplay
    };
    jsData = JSON.stringify(jsData);
    $.ajax({
     type: 'POST',
     url: url,
     data: {jsData:jsData},
     success: function(data) {
                if(data == 'logFirst') {
                  alert('Harap Login Terlebih Dahulu untuk menulis komentar');

                  function kelapKelip() {
                    setTimeout(function() {
                      $('.comment-txt-bottom').addClass('font-weight-bold');
                      $('.comment-txt-bottom span a').css('color', '#000');
                      setTimeout(function() {
                        $('.comment-txt-bottom').removeClass('font-weight-bold');
                        $('.comment-txt-bottom span a').attr('style', '');
                      }, 500);
                    }, 500);
                  }
                  var refreshIntervalId = setInterval(kelapKelip, 1000);
                  setTimeout(function() {
                    clearInterval(refreshIntervalId);
                  }, 5000);
                } else {
                  location.href = '#comment-area';
                  location.reload()
                }
            },
      error: function(data) {
      }
    });
});
