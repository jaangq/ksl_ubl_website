// Left Menu Toggle
$(document).on('click', '.has-sub', function() {
  $(this).find('ul').slideToggle();
});

// Paginate With Ajax
$(document).on('click', 'a.page-link', function(e) {
  e.stopImmediatePropagation();
  e.preventDefault();
  let text = $(this).attr('href');
  let regex = /^http:\/\/.+(\/ksl.+)(page)=([0-9]+)$/;
  let match = regex.exec(text);
  $.ajax({
   type: "GET",
   url: "/ksl/admin/users",
   data: {page:match[3]},
   success: function(data) {
              if (data) {
                $('#users-list').html($(data).find('#users-list').html());
                $('ul.pagination').html($(data).find('ul.pagination').html());
              }
            }
    });
});

// CRUD Ajax Users
// Set Header
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
// Reset on Insert Data
$(document).on('click', '.add-btn-modal', function(e) {
  e.stopImmediatePropagation();
  ajaxResult();
  $('.formModal').find('#user-name').val('');
  $('.formModal').find('#user-username').val('');
  $('.formModal').find('#user-email').val('');
  $('.formModal').find('#user-roles').prop('selectedIndex',0);
  // $('.formModal').find('#user-roles').val('');
});

// Insert Data
$(document).on('click', '.add-data-btn', function(e) {
  e.stopImmediatePropagation();
  let name = $('#user-name').val();
  let username = $('#user-username').val();
  let email = $('#user-email').val();
  let password = $('#user-password').val();
  let role = $('#user-roles').val();
  let roleName = $('#user-roles option:selected').text();
  if(!confirm('Add New User ?')) {
    return false;
  }
  $.ajax({
   type: "POST",
   url: "/ksl/admin/users",
   data: {name:name, username: username, email: email, password: password, role: role, roleName: roleName},
   // dataType : "html",
   success: function(data) {
        ajaxResult(data);
    },
    error: function(data){
        ajaxResult(data);
    },

    });
});

// Delete Data
$(document).on('click', '.del-data-btn', function(e) {
  e.stopImmediatePropagation();
  let val = $(this).val();
  let role = $(this).parents('tr').find('.td-role').html();
  let username = $(this).parents('tr').find('.td-username').html();
  role = role.charAt(0).toUpperCase() + role.slice(1);
  if(!confirm('Remove '+role+' '+username+' ?')) {
    return false;
  }
  $.ajax({
    type: "DELETE",
    url: "/ksl/admin/users/"+val,
    success: function(data) {
      ajaxResult(data);
    },
    error: function(data){
      ajaxResult(data);
    },
  });
});

// Edit Data
$(document).on('click', '.upd-data-btn', function(e) {
  e.stopImmediatePropagation();
  let val = $(this).val();
  let name = $(this).parents('tr').find('.td-name').text();
  let username = $(this).parents('tr').find('.td-username').text();
  let email = $(this).parents('tr').find('.td-email').text();
  let idRole = $(this).parents('tr').find('.td-role').attr('val');
  let role = $(this).parents('tr').find('.td-role').text();
  role = role.charAt(0).toUpperCase() + role.slice(1);
  $('button[data-toggle="modal"]').click();
  $('.btn-gg').addClass('update-data-btn').removeClass('add-data-btn').text('Edit Now');

  $('.formModal').find('#user-name').val(name);
  $('.formModal').find('#user-username').val(username);
  $('.formModal').find('#user-email').val(email);
  $('.formModal').find('#user-roles').val(idRole);
  $('.formModal').find('#user-id').val(val);
});

// Update Data
$(document).on('click', '.update-data-btn', function(e) {
    e.stopImmediatePropagation();
    let id = $('.formModal').find('#user-id').val();
    let name = $('.formModal').find('#user-name').val();
    let username = $('.formModal').find('#user-username').val();
    let email = $('.formModal').find('#user-email').val();
    let password = $('.formModal').find('#user-password').val();
    let roleId = $('.formModal').find('#user-roles').val();
    let roleName = $('.formModal').find('#user-roles option:selected').text();
    roleName = roleName.charAt(0).toUpperCase() + roleName.slice(1);

    $.ajax({
     type: "PUT",
     url: "/ksl/admin/users/"+id,
     data: {name:name, username: username, email: email, password: password, role: roleId, roleName: roleName},
     // dataType : "html",
     success: function(data) {
          ajaxResult(data);
      },
      error: function(data){
          ajaxResult(data);
      },
    });
});

/* FUNCTION */
// function after ajax response
function ajaxResult(data = '') {
     $('button.close[data-dismiss="modal"]').click();
     $('.btn-gg').addClass('add-data-btn').removeClass('update-data-btn').text('Add Now');
     $('.flash-message').html(data);
     reloadPage();
}
// function reload page
function reloadPage() {
  let url = window.location.href;
  $.ajax({
   type: "GET",
   url: url,
   success: function(data) {
              if (data) {
                $('#users-list').html($(data).find('#users-list').html());
                $('ul.pagination').html($(data).find('ul.pagination').html());
              }
            }
    });
}
