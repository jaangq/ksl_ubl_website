// Paginate With Ajax
$(document).on('click', 'a.page-link', function(e) {
  e.preventDefault();
  let page = '';
  let text = $(this).attr('href');
  let regex = /^http:\/\/.+\/ksl\/admin\/([^\/\?]+)[\/\?][0-9a-z]*\??page=([0-9]+)/;
  let match = regex.exec(text);
  if (match) {
    page = match[1];
  }
  let val = '';
  let idval = '';
  val = $('.'+page+'-table .search-box').val();
  idval = $('.'+page+'-table .search-box').attr('idval');
  $.ajax({
   type: 'GET',
   url: match[0]+'&val='+val+'&idval='+idval,
   success: function(data) {
                $('#'+page+'-list').html($(data).find('#'+page+'-list').html());
                $('.'+page+'-table ul.pagination').html($(data).find('ul.pagination').html());
            }
  });

});

// CRUD Ajax Users
// Entering submit
$(document).on('keypress', '.formModal input, .formModal select', function(e) {
  if(e.which == 13) {
    $(this).parents('.formModal').find('.btn-gg').click();
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
  if(preventSub(this)) { return false; }
  // prevent sub for prevent multiple submit from categories page (:( Bad)
  ajaxResult();
  $('.formModal input, .formModal textarea').val('');
  $('.formModal select').prop('selectedIndex',0);
});

// Insert Data
$(document).on('click', '.add-data-btn', function(e) {
  if(preventSub(this)) { return false; }
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
    case 'categories':
          jsData['name'] = $('#category-name').val();
          jsData['desc'] = $('#category-desc').val();
          jsData['name_en'] = $('#category-name_en').val();
          jsData['desc_en'] = $('#category-desc_en').val();
          url = '/ksl/admin/categories';
      break;
  }
  if (url) {
    insertData(jsData, url);
  }
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


// Edit Data
$(document).on('click', '.upd-data-btn', function(e) {
  if(preventSub(this)) { return false; }
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
      case 'categories':
                  val = $(this).val();
                  name = $(this).parents('tr').find('.td-name').text();
                  desc = $(this).parents('tr').find('.td-desc').text();
                  name_en = $(this).parents('tr').find('.td-name_en').text();
                  desc_en = $(this).parents('tr').find('.td-desc_en').text();
                  $('button[data-target="#formModal"]').click();
                  $('.btn-gg').addClass('update-data-btn').removeClass('add-data-btn').text('Edit Now');
                  $('#formModalLabel').text('Edit Category '+ name_en);
                  $('#category-name').val(name);
                  $('#category-desc').val(desc);
                  $('#category-name_en').val(name_en);
                  $('#category-desc_en').val(desc_en);
                  $('#category-id').val(val);
        break;

  }

});

// Update Data
$(document).on('click', '.update-data-btn', function(e) {
    if(preventSub(this)) { return false; }
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
      case 'categories':
            id = $('#category-id').val();
            jsData['name'] = $('#category-name').val();
            jsData['desc'] = $('#category-desc').val();
            jsData['name_en'] = $('#category-name_en').val();
            jsData['desc_en'] = $('#category-desc_en').val();
            url = '/ksl/admin/categories/';
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

// Delete Data
$(document).on('click', '.del-data-btn', function(e) {
  if(preventSub(this)) { return false; }
  let page = $('meta[name="page"]').attr('content');
  let val = $(this).val();
  let url = '';
  switch (page) {
    case 'users':
                  role = $(this).parents('tr').find('.td-role').html();
                  username = $(this).parents('tr').find('.td-username').html();
                  role = role.charAt(0).toUpperCase() + role.slice(1);
                  if(!confirm('Remove '+role+' '+username+' ?')) {
                    return false;
                  }
                  url = '/ksl/admin/users/';
      break;
    case 'tags':
                  name = $(this).parents('tr').find('.td-name').html();
                  if(!confirm('Remove Tag '+name+' ?')) {
                    return false;
                  }
                  url = '/ksl/admin/tags/';
      break;
    case 'categories':
                  name = $(this).parents('tr').find('.td-name').html();
                  if(!confirm('Remove Tag '+name+', It\'s will remove all this Sub Categories and Sub Sub Categories ? ?')) {
                    return false;
                  }
                  tampilSubCat();
                  tampilSubSubCat();
                  url = '/ksl/admin/categories/';
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
// Search Data
  $(document).on('keyup', '.search-box', function() {
    if(preventSub(this)) { return false; }
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
     $('.flash-message').html(data).fadeIn();
     setTimeout(function() {
       $('.flash-message').fadeOut();
     }, 1500);
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

// clicked menu left page
$(document).ready(function() {
    $('section li a.pages-nav').click();
});

// Anchor
$(document).on('click', 'section li a', function(e) {
   if($(this).parents('li').eq(0).hasClass('has-sub')) {
     $(this).parents('li').find('ul').slideToggle();
     return false;
   }
   e.preventDefault();
   if($(this).find('.fa-chevron-right').css('display') !== 'none') {
     $('.fa-chevron-right').hide();
     $('.fa-chevron-down').removeClass('d-none');
   } else {
     $('.fa-chevron-right').show();
     $('.fa-chevron-down').addClass('d-none');
   }
   let anchor = $(this).attr('href');
   let regex = /^http:\/\/.+\/ksl\/admin\/(.+)$/;
   let match = regex.exec(anchor);
   let page = '';
   if (match !== null) {
     page = match[1];
   }
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

// Hide and Show Long Text
$(document).on('click', '.lessmore-btn', function() {
    // let text = $(this).parent().find('.lessmore-ts').text() + $(this).parent().find('.lessmore-t').text();
    if($(this).hasClass('lessmore-more')) {
      $(this).addClass('d-none');
      $(this).parents('td').find('.lessmore-t').hide().removeClass('d-none').slideDown();
      $(this).parents('td').find('.lessmore-less').removeClass('d-none');
    } else if($(this).hasClass('lessmore-less')) {
      $(this).addClass('d-none');
      $(this).parent().find('.lessmore-t').slideUp();
      $(this).parent().find('.lessmore-more').removeClass('d-none');
    }

});

// function prevent sub-cat and sub-sub-cat
// prevent sub for prevent multiple submit from categories page (:( Bad)
function preventSub(dis) {
  let valAttr = $(dis).attr('val');
  if(valAttr == 'sub-cat' || valAttr == 'sub-sub-cat') {
    return true;
  } else {
    return false;
  }
}





















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

$(document).on('click', '.page-news', function() {
  alert('Maaf Fitur Belum Tersedia');
});
