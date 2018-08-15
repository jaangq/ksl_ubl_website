// Left Menu Toggle
$(document).on('click', '.has-sub', function() {
  $(this).find('ul').slideToggle();
});

// Paginate With Ajax
$(document).on('click', 'a.page-link', function(e) {
  e.preventDefault();
  let page = $('meta[name="page"]').attr('content');
  let text = $(this).attr('href');
  let regex = /^http:\/\/.+(\/ksl.+)(page)=([0-9]+)$/;
  let match = regex.exec(text);
  let val = $('.search-box').val();

  $.ajax({
   type: 'GET',
   url: match[0]+'&val='+val,
   success: function(data) {
                $('#'+page+'-list').html($(data).find('#'+page+'-list').html());
                $('ul.pagination').html($(data).find('ul.pagination').html());
            }
  });

});

// CRUD Ajax Users
// Entering submit
$(document).on('keypress', '#formModal input, #formModal select', function(e) {
  if(e.which == 13) {
    $('.btn-gg').click();
  }
});
// Set Header
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Reset on Insert Data
$(document).on('click', '.add-btn-modal', function(e) {
  ajaxResult();
  $('.formModal input, .formModal textarea').val('');
  $('.formModal select').prop('selectedIndex',0);
});

// Insert Data
$(document).on('click', '.add-data-btn', function(e) {
  let page = $('meta[name="page"]').attr('content');
  let  jsData = {};
  let url = '';
  switch (page) {
    case 'users':
          jsData['name'] = $('#user-name').val();
          jsData['username'] = $('#user-username').val();
          jsData['email'] = $('#user-email').val();
          jsData['password'] = $('#user-password').val();
          jsData['role'] = $('#user-roles').val();
          jsData['roleName'] = $('#user-roles option:selected').text();
          url = '/ksl/admin/users';
      break;
    case 'tags':
          jsData['name'] = $('#tag-name').val();
          jsData['desc'] = $('#tag-desc').val();
          jsData['name_en'] = $('#tag-name_en').val();
          jsData['desc_en'] = $('#tag-desc_en').val();
          url = '/ksl/admin/tags';
      break;
  }
  insertData(jsData, url);
});

function insertData(jsData, url) {

    jsData = JSON.stringify(jsData);
    if(!confirm('Add New Data ?')) {
      return false;
    }
    $.ajax({
     type: 'POST',
     url: url,
     data: {jsData:jsData},
     // dataType : "html",
     success: function(data) {
                ajaxResult(data);
              },
      error: function(data){
                ajaxResult(data);
              },
    });

}

// Delete Data
$(document).on('click', '.del-data-btn', function(e) {
  let page = $('meta[name="page"]').attr('content');
  let val = $(this).val();
  let url = '';
  switch (page) {
    case 'users':
                  let role = $(this).parents('tr').find('.td-role').html();
                  let username = $(this).parents('tr').find('.td-username').html();
                  role = role.charAt(0).toUpperCase() + role.slice(1);
                  if(!confirm('Remove '+role+' '+username+' ?')) {
                    return false;
                  }
                  url = '/ksl/admin/users/';
      break;
    case 'tags':
                  let name = $(this).parents('tr').find('.td-name').html();
                  if(!confirm('Remove Tag '+name+' ?')) {
                    return false;
                  }
                  url = '/ksl/admin/tags/';
      break;
  }
  deleteData(val, url);

});
function deleteData(val, url) {
  $.ajax({
    type: 'DELETE',
    url: url+val,
    success: function(data) {
      ajaxResult(data);
    },
    error: function(data){
      ajaxResult(data);
    },
  });
}

// Edit Data
$(document).on('click', '.upd-data-btn', function(e) {
  let page = $('meta[name="page"]').attr('content');
  switch (page) {
    case 'users':
                val = $(this).val();
                name = $(this).parents('tr').find('.td-name').text();
                username = $(this).parents('tr').find('.td-username').text();
                email = $(this).parents('tr').find('.td-email').text();
                idRole = $(this).parents('tr').find('.td-role').attr('val');
                role = $(this).parents('tr').find('.td-role').text();
                role = role.charAt(0).toUpperCase() + role.slice(1);
                $('button[data-toggle="modal"]').click();
                $('.btn-gg').addClass('update-data-btn').removeClass('add-data-btn').text('Edit Now');
                $('#formModalLabel').text('Edit '+role+' '+username);
                $('#user-name').val(name);
                $('#user-username').val(username);
                $('#user-email').val(email);
                $('#user-roles').val(idRole);
                $('#user-id').val(val);
      break;
    case 'tags':
                val = $(this).val();
                name = $(this).parents('tr').find('.td-name').text();
                desc = $(this).parents('tr').find('.td-desc').text();
                name_en = $(this).parents('tr').find('.td-name_en').text();
                desc_en = $(this).parents('tr').find('.td-desc_en').text();
                $('button[data-toggle="modal"]').click();
                $('.btn-gg').addClass('update-data-btn').removeClass('add-data-btn').text('Edit Now');
                $('#formModalLabel').text('Edit Tag '+ name_en);
                $('#tag-name').val(name);
                $('#tag-desc').val(desc);
                $('#tag-name_en').val(name_en);
                $('#tag-desc_en').val(desc_en);
                $('#tag-id').val(val);
      break;

  }

});

// Update Data
$(document).on('click', '.update-data-btn', function(e) {
    let page = $('meta[name="page"]').attr('content');
    let  jsData = {};
    let url = '';
    let id = '';
    switch (page) {
      case 'users':
            id = $('#user-id').val();
            jsData['name'] = $('#user-name').val();
            jsData['username'] = $('#user-username').val();
            jsData['email'] = $('#user-email').val();
            jsData['password'] = $('#user-password').val();
            jsData['role'] = $('#user-roles').val();
            jsData['roleName'] = $('#user-roles option:selected').text();
            jsData['roleName'] = jsData['roleName'].charAt(0).toUpperCase() + jsData['roleName'].slice(1);
            url = '/ksl/admin/users/';
        break;
      case 'tags':
            id = $('#tag-id').val();
            jsData['name'] = $('#tag-name').val();
            jsData['desc'] = $('#tag-desc').val();
            jsData['name_en'] = $('#tag-name_en').val();
            jsData['desc_en'] = $('#tag-desc_en').val();
            url = '/ksl/admin/tags/';
        break;
    }

    updateData(jsData, url, id);

});

function updateData(jsData, url, id) {
      jsData = JSON.stringify(jsData);
      $.ajax({
       type: 'PUT',
       url: url+id,
       data: {jsData:jsData},
       // dataType : "html",
       success: function(data) {
            ajaxResult(data);
        },
        error: function(data){
            ajaxResult(data);
          },
      });
}

// Search Data
  $(document).on('keyup', '.search-box', function() {
    let page = $('meta[name="page"]').attr('content');
    let url = '/ksl/admin/'+page+'/search';
    let tableList = '#'+page+'-list';
    let val = $(this).val();
    $.ajax({
     type: 'GET',
     url: url,
     data: {val:val},
     // dataType : "html",
     success: function(data) {
         $(tableList).html($(data).find(tableList).html());
         $('ul.pagination').html('').html($(data).find('ul.pagination').html());
      },
      error: function(data){
      },
    });
  });

/* FUNCTION */
// ucwords function
function ucwords (str) {
    return (str + '').replace(/^([a-z])|\s+([a-z])/g, function ($1) {
        return $1.toUpperCase();
    });
}
// function after ajax response
function ajaxResult(data = '') {
     let page = $('meta[name="page"]').attr('content');
     page = page.slice(0, -1);
     $('button.close[data-dismiss="modal"]').click();
     $('.btn-gg').addClass('add-data-btn').removeClass('update-data-btn').text('Add Now');
     $('#formModalLabel').text('Add New '+ ucwords(page));
     $('.flash-message').html(data);
     reloadPage();
}
// function reload page
function reloadPage() {
  let page = $('meta[name="page"]').attr('content');
  let url = '/ksl/admin/'+page;
  $.ajax({
   type: 'GET',
   url: url,
   success: function(data) {
              if (data) {
                $('#'+page+'-list').html($(data).find('#'+page+'-list').html());
                $('ul.pagination').html($(data).find('ul.pagination').html());
              }
            },
    error: function(data) {
    }
    });
}

// Anchor
$(document).on('click', 'section li a', function(e) {
   e.preventDefault();
   let anchor = $(this).attr('href');
   let regex = /^http:\/\/.+\/ksl\/admin\/(.+)$/;
   let match = regex.exec(anchor);
   let page = match[1];
   $.ajax({
    type: 'GET',
    url: anchor,
    success: function(data) {
               if (data) {
                 $('main').hide().html($(data).find('main').html()).fadeIn();
               }
             },
     error: function(data) {
     }
     });
});
