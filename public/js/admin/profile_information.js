// append and remove elements dynamically
$(document).on('click', '.profile_information_container nav li', function() {
  let val = $(this).attr('val');
  $('.profile_information_container nav li').removeClass('nthnyali');
  $(this).addClass('nthnyali');
  $('.profile_information_container .container').html('').append($('#'+val+'-res').html());
  $('#btn-save').attr('val', val);
  $('#btn-reset').attr('val', val);
});
$(document).ready(function() {
  let val = '';
  $('.profile_information_container nav li').eq(0).addClass('nthnyali');
  $('.profile_information_container .container').append($('.res-profile-info div').eq(0).html());
  val = $('.profile_information_container nav li[class="nthnyali"]').attr('val');
  $('#btn-save').attr('val', val);
  $('#btn-reset').attr('val', val);
});
$(document).on('click', '#btn-save', function() {
  let el = $('#container-form input, #container-form textarea');
  let len = el.length;
  let jsData = {};
  for (var i = 0; i < len; i++) {
    jsData[el.eq(i).attr('id').substr(3)] = el.eq(i).val();
  }
  updateInfoData(jsData);
});


// function Update Data
function updateInfoData(jsData) {
  jsData = JSON.stringify(jsData);
  $.ajax({
   type: 'PUT',
   url: '/ksl/admin/profile-information/updating',
   data: {jsData:jsData},
   // dataType : "html",
    success: function(data) {
      resultInfoData(data);
    },
    error: function(data){

    },
  });
}

function resultInfoData(text) {
   let valPrefix = $('#btn-save').attr('val');
   reloadInfoPage(valPrefix);
   $('.flash-message').html(text);
}

function reloadInfoPage(valPrefix) {
    let url = '/ksl/admin/profile-information';
    $.ajax({
     type: 'GET',
     url: url,
     success: function(data) {
                  $('.profile_information_container').html($(data).find('.profile_information_container').html());
                  $('nav li[val="'+valPrefix+'"]').click();
                  $('a[href="#app"]').click();
              },
      error: function(data) {
      }
    });
}
