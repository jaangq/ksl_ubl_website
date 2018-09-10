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
$(document).on('keyup', '#posts-cat', function() {
  if (!$(this).val()) { $(this).attr('val', ''); }
  $('#posts-sub-cat, #posts-sub-sub-cat').attr('disabled', 'disabled');
  $('#posts-sub-cat, #posts-sub-sub-cat').val('');
  $('#posts-sub-cat, #posts-sub-sub-cat').attr('val', '');
  $('#posts-sub-cat-result p, #posts-sub-sub-cat-result p').hide();
  getCatsOrTags(this, '/ksl/admin/categories/search', '#posts-cat-result');
});
$(document).on('keyup', '#posts-sub-cat', function() {
  let idval = $('#posts-cat').attr('val');
  if (!$(this).val()) { $(this).attr('val', ''); }
  $('#posts-sub-sub-cat').attr('disabled', 'disabled');
  $('#posts-sub-sub-cat').val('');
  $('#posts-sub-sub-cat').attr('val', '');
  $('#posts-sub-sub-cat-result p').hide();
  getCatsOrTags(this, '/ksl/admin/sub-categories/search', '#posts-sub-cat-result', idval);

});
$(document).on('keyup', '#posts-sub-sub-cat', function() {
  let idval = $('#posts-sub-cat').attr('val');
  if (!$(this).val()) { $(this).attr('val', ''); }
  getCatsOrTags(this, '/ksl/admin/sub-sub-categories/search', '#posts-sub-sub-cat-result', idval);
});

$(document).on('keyup', '#posts-tags', function() {
  let idval = $('#posts-tags').attr('val');
  let optional = $('.posts-tags-result');
  let optionaldata = [];
  for(i = 0; i < optional.length; i++) {
     optionaldata[i] = optional.eq(i).text();
  }
  optionaldata = JSON.stringify(optionaldata);
  getCatsOrTags(this, '/ksl/admin/tags/search', '#posts-tags-result', idval, optionaldata);
});

function getCatsOrTags(el, url, divclass, idval='', optionaldata='') {
  let val = $(el).val();
  let dataonly = true;
  $.ajax({
   type: 'GET',
   url: url,
   data: {val:val, dataonly:dataonly, idval:idval, optionaldata:optionaldata},
   // dataType : "html",
   success: function(data) {
              if(data.data === undefined) {
                $(divclass).html('');
                for(var i = 0; i < data.length; i++) {
                  $(divclass).append('<p val="'+data[i]['id']+'">'+data[i]['name']+'</p>').show();
                }
              } else {
                let datanya = data.data;
                $(divclass).html('');
                for(var i = 0; i < datanya.length; i++) {
                  $(divclass).append('<p val="'+datanya[i]['id']+'">'+datanya[i]['name']+'</p>').show();
                }
              }
            },
            error: function(data) {
            }
  });
}

$(document).on('click', '#posts-cat-result p, #posts-sub-cat-result p, #posts-sub-sub-cat-result p', function() {
    $(this).parents().eq(1).find('input').val($(this).text());
    $(this).parents().eq(1).find('input').attr('val', $(this).attr('val'));
    $(this).parent().eq(0).hide();
    $(this).parents().eq(2).next('div').find('input').removeAttr('disabled');
});
$(document).on('click', '#posts-tags-result p', function() {
      $(this).parents().eq(1).find('#posts-tags-result-selected').append('<span class="posts-tags-result" val="'+$(this).attr('val')+'">'+$(this).text()+' <i class="fas fa-times"></i></span>');
      $(this).parent().eq(0).hide();
});
$(document).on('click', '#posts-tags-result-selected span', function() {
      $(this).remove();
});


// image
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#view-img').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
    setTimeout(function(){
      $("#view-img").show("800");
    }, 300);
  }
}

$(document).on("change", "#posts-image", function(){
  $("#view-img").hide("800");
  readURL(this);
});

$(document).on('click', '.posts-publish-btn, .posts-save-to-draft-btn', function() {
    let postStatus = $(this).attr('act');
    let textAlert = $(this).text();
    let jsData = {};
    $('#posts-status').val(postStatus);
    jsData['posts_title'] = $('#posts-title').val();
    jsData['posts_title_en'] = $('#posts-title-en').val();
    jsData['posts_content'] = CKEDITOR.instances['posts-content'].getData();
    jsData['posts_content_en'] = CKEDITOR.instances['posts-content-en'].getData();
    jsData['posts_cat'] = $('#posts-cat').attr('val');
    jsData['posts_sub_cat'] = $('#posts-sub-cat').attr('val');
    jsData['posts_sub_sub_cat'] = $('#posts-sub-sub-cat').attr('val');
    jsData['posts_tags'] = {};
    for(i = 0; i < $('.posts-tags-result').length; i++) {
      jsData['posts_tags'][i] = $('.posts-tags-result').eq(i).attr('val');
    }
    jsData['posts_pages'] = $('#posts-pages').val();
    jsData['posts_status'] = $('#posts-status').val();
    url = '/ksl/admin/posts'
    jsData = JSON.stringify(jsData);
    if(!confirm(textAlert+' ?')) {
      return false;
    }
    $.ajax({
     type: 'POST',
     url: url,
     data: {jsData:jsData},
     // dataType : "html",
     success: function(data) {
               $('button[data-dismiss="modal"]').eq(0).click();
                ajaxResult(data);
              },
      error: function(data){
                $('button[data-dismiss="modal"]').eq(0).click();
                ajaxResult(data);
              },
    });
})

$(document).on('click', '.add-article', function() {
  $('#posts-sub-cat').attr('disabled', 'disabled');
  $('#posts-sub-sub-cat').attr('disabled', 'disabled');
  $('#posts-title').val('');
  $('#posts-title-en').val('');
  $('#posts-content').val('');
  $('#posts-content-en').val('');
  CKEDITOR.instances['posts-content'].setData('');
  CKEDITOR.instances['posts-content-en'].setData('');
  $('#posts-tags-result-selected').html('');
});
$(document).on('click', '.posts-btn-edit', function() {
  let formModal = $('#formModal');
  let posts = $(this).parents('tr');
  $('#posts-tags-result-selected').html('');
  formModal.find('#posts-title').val(posts.find('.td-title').text());
  formModal.find('#posts-title-en').val(posts.find('.td-title-en').text());
  CKEDITOR.instances['posts-content'].setData(posts.find('.td-content').html());
  CKEDITOR.instances['posts-content-en'].setData(posts.find('.td-content-en .lessmore-t').html());
  formModal.find('#posts-cat').val(posts.find('.td-cat').text());
  formModal.find('#posts-cat').attr('val', posts.find('.td-cat').attr('val'));
  formModal.find('#posts-sub-cat').val(posts.find('.td-sub-cat').text());
  formModal.find('#posts-sub-cat').attr('val', posts.find('.td-sub-cat').attr('val'));
  formModal.find('#posts-sub-sub-cat').val(posts.find('.td-sub-sub-cat').text());
  formModal.find('#posts-sub-sub-cat').attr('val', posts.find('.td-sub-sub-cat').attr('val'));
  if (formModal.find('#posts-sub-cat').val()) {
    formModal.find('#posts-sub-cat').removeAttr('disabled');
  }
  if (formModal.find('#posts-sub-sub-cat').val()) {
    formModal.find('#posts-sub-sub-cat').removeAttr('disabled');
  }
  for (var i = 0; i < posts.find('.td-tags').length; i++) {
    tags = posts.find('.td-tags').eq(i);
    for (var j = 0; j < tags.find('span').length; j++) {
      tags_text = tags.find('span').eq(j).text();
      tags_val = tags.find('span').eq(j).attr('val');
      tags_id = tags.find('span').eq(j).attr('idval');
      $('#posts-tags-result-selected').append('<span class="posts-tags-result" val="'+tags_val+'" idval="'+tags_id+'">'+tags_text+' <i class="fas fa-times"></i></span>');
      $('#posts-tags-result-selected-hid').append('<span class="posts-tags-result" val="'+tags_val+'" idval="'+tags_id+'">'+tags_text+' <i class="fas fa-times"></i></span>');
    }
  }
  $('#posts-pages').val($('.td-pages').attr('val'));
  $('.posts-publish-btn').addClass('posts-publish-btn-edit').removeClass('posts-publish-btn');
  $('.posts-save-to-draft-btn').addClass('posts-save-to-draft-btn-edit').removeClass('posts-save-to-draft-btn');
  $('#formModalLabel').text('Edit Article : '+posts.find('.td-title-en').text());
  $('.posts-publish-btn-edit').attr('val', posts.find('.td-id').text());
  $('.posts-save-to-draft-btn-edit').attr('val', posts.find('.td-id').text());
});
$(document).on('click', 'button[data-dismiss="modal"]', function(){
  // if modal closed
  if ($('#formModal').is(':visible')) {
    $('#formModalLabel').text('Add New Post');
    $('.posts-publish-btn-edit').addClass('posts-publish-btn').removeClass('posts-publish-btn-edit');
    $('.posts-save-to-draft-btn-edit').addClass('posts-save-to-draft-btn').removeClass('posts-save-to-draft-btn-edit');
    $('.posts-publish-btn').removeAttr('val');
    $('.posts-save-to-draft-btn').removeAttr('val');
    $('#posts-tags-result-selected-hid').html('');
    $('#posts-tags-result-selected').html('');
  }
});
$(document).on('click', '.posts-publish-btn-edit, .posts-save-to-draft-btn-edit', function() {
    // Update
      let postStatus = $(this).attr('act');
      let textAlert = $(this).text();
      let id =  $(this).attr('val');
      let jsData = {};
      jsData['posts_id'] = id;
      $('#posts-status').val(postStatus);
      jsData['posts_title'] = $('#posts-title').val();
      jsData['posts_title_en'] = $('#posts-title-en').val();
      jsData['posts_content'] = CKEDITOR.instances['posts-content'].getData();
      jsData['posts_content_en'] = CKEDITOR.instances['posts-content-en'].getData();
      jsData['posts_cat'] = $('#posts-cat').attr('val');
      jsData['posts_sub_cat'] = $('#posts-sub-cat').attr('val');
      jsData['posts_sub_sub_cat'] = $('#posts-sub-sub-cat').attr('val');
      jsData['posts_tags'] = {};
      jsData['id_posts_tags'] = {};
      for(i = 0; i < $('.posts-tags-result').length; i++) {
        jsData['posts_tags'][i] = $('#posts-tags-result-selected .posts-tags-result').eq(i).attr('val');
        jsData['id_posts_tags'][i] = $('#posts-tags-result-selected-hid .posts-tags-result').eq(i).attr('idval');
      }
      jsData['posts_pages'] = $('#posts-pages').val();
      jsData['posts_status'] = $('#posts-status').val();
      url = '/ksl/admin/posts/'
      jsData = JSON.stringify(jsData);
      if(!confirm(textAlert+' ?')) {
        return false;
      }
      $.ajax({
       type: 'PUT',
       url: url+id,
       data: {jsData:jsData},
       // dataType : "html",
       success: function(data) {
                  $('button[data-dismiss="modal"]').eq(0).click();
                  ajaxResult(data);
                },
        error: function(data){
                  $('button[data-dismiss="modal"]').eq(0).click();
                  ajaxResult(data);
                },
      });
});

$(document).on('click', '.btn-post-status', function() {
  let val = $(this).attr('val');
  let id = $(this).parents('tr').find('.td-id').text();
  let url = '/ksl/admin/posts/'
  let stat_only = 'stat_only';
  let jsData = {};
  if (val == '1') {
    $(this).removeAttr('class');
    $(this).attr('class', 'btn btn-warning btn-post-status');
    $(this).attr('val', '2');
  } else if(val == '2') {
    $(this).removeAttr('class');
    $(this).attr('class', 'btn btn-success btn-post-status');
    $(this).attr('val', '1');
  }
  jsData['posts_status'] = val;
  jsData = JSON.stringify(jsData);
  $.ajax({
   type: 'PUT',
   url: url+id,
   data: {jsData:jsData, stat_only:stat_only},
   // dataType : "html",
   success: function(data) {
              ajaxResult(data);
            },
    error: function(data){
              ajaxResult(data);
            },
  });
});

$(document).on('click', '.btn-remove-post', function() {
  let id = $(this).parents('tr').find('.td-id').text();
  let title = $(this).parents('tr').find('.td-title-en').text();
  let url = '/ksl/admin/posts/'
  if(!confirm('Are You Sure to delete Post Where Title = '+title+' ?')) {
    return false;
  }
  $.ajax({
   type: 'DELETE',
   url: url+id,
   // dataType : "html",
   success: function(data) {
              ajaxResult(data);
            },
    error: function(data){
              ajaxResult(data);
            },
  });
});
