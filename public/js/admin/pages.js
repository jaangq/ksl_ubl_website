// Function Reset CKEDTIOR Get All Textarea ID
function resetCK() {
  idS = [];
  $('textarea').each(function() {
    idS.push(this.id);
  });
  for (id of idS) {
    CKEDITOR.replace(id, {
      filebrowserBrowseUrl : '/js/elfinder/elfinder.legacy.php', // eg. 'includes/elFinder/elfinder-cke.html'
      // filebrowserBrowseUrl : '/js/elfinder/elfinder.legacy.php', // eg. 'includes/elFinder/elfinder-cke.html'
      // uiColor : '#9AB8F3'
    });
  }
}
$(document).ready(function() {
  resetCK();
});
$(document).on('click', '.lang-div li', function() {
  if ($(this).hasClass('active')) {
    return false;
  }
  let elClass = $(this).attr('val');
  let oldClass = $('#card-body').attr('val');
  $('.lang-div li').removeClass('active');
  $(this).addClass('active');
  $('#card-body').attr('val', elClass);
  $('#el-'+elClass).fadeIn();
  $('#el-'+oldClass).fadeOut();
});
// Set Header
$("button.save").unbind().click(function() {
    //Stuff
// });
// $(document).on('click', 'button.save', function(e) {
  arr = [];
  $('textarea').each(function() {
    arr.push([$(this).attr('val'), $(this).attr('colm'), this.id, CKEDITOR.instances[this.id].getData()]);
  });
  $('.card-body input').each(function() {
    arr.push([$(this).attr('val'), $(this).attr('colm'), this.id, $(this).val()]);
  });
  arr = JSON.stringify(arr);

  $.ajax({
   type: 'PUT',
   url: '/ksl/admin/pages/updateCoy',
   data: {jsData:arr},
   success: function(data) {
       // $.ajax({
       //  type: 'GET',
       //  url: '/ksl/admin/pages/'+$('.second-col').text().toLowerCase(),
       //  success: function(data) {
       //    $('main').hide().html($(data).html()).fadeIn();
       //  }
       // });
     $('.flash-message').html(data).fadeIn();
     $("html, body").animate({ scrollTop: 0 }, 800);
     setTimeout(function() {
       $('.flash-message').fadeOut();
     }, 900);
   }, error : function(data) {
   }
  });
});
//
// // elfinder
// var elfinderInstance =  $('#elfinder').elfinder({ /* Your options */ }).elfinder('instance');
//
// elfinderInstance.upload = function(files) {
//   var hasError;
//   elfinderInstance.log(files); // print to browser consol
//   if (hasError) {
//       elfinderInstance.error('upload error');
//       return $.Deferred().reject();
//   } else {
//       return elfinderInstance.transport.upload(files, elfinderInstance);
//   }
// };
