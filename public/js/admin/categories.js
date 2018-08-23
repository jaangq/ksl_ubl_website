// Start Min Max Button

$(document).on('click', '.minmax-max-btn', function() {
  minmax_max_btn(this);
});
$(document).on('click', '.minmax-min-btn', function() {
  minmax_min_btn(this);
});
function minmax_max_btn(dis) {
  let val = $(dis).attr('val');
  for (var i = 1; i <= 3; i++) {
    if (!$('#cat-'+i).children().length) {
      $('div[val="ini-container-'+val+'"] div[label="'+val+'"]').appendTo('#cat-'+i);
      $('div[label="'+val+'"] .'+val+'-add').addClass('d-none');
      $('div[label="'+val+'"] .'+val+'-hid').hide().removeClass('d-none').show(800);
      return false;
    }
  }
}

function minmax_min_btn(dis) {
  let val = $(dis).attr('val');
  let catid = $(dis).parents('.catid').attr('val');
  $(dis).parents('div[label="'+val+'"]').appendTo('div[val="ini-container-'+val+'"]');
  for (var i = 2; i < 5-catid; i++) {
    $('#cat-'+i+' div[label="'+val+'"]').appendTo('#cat-'+(i-1));
  }
  $('div[label="'+val+'"] .'+val+'-hid').addClass('d-none');
  $('div[label="'+val+'"] .'+val+'-add').hide().removeClass('d-none').show(800);
}

$(document).ajaxSuccess(function(event, xhr, settings) {

  /*
  categories
  sub-categories
  sub-sub-categories
  */
  let url = settings.url;
  let regex = /admin\/([^\/]+)/;
  let matches = url.match(regex);
  let result = '';
  result = matches ?  matches[1] : '';
  let val = '';
  if (result) {
    result = ucwords(result.replace(/-/g, ' '));
    result = getThreeLetter(result, '-', 'lowercase');
  }
  if ($('div[label="'+result+'"]').parent().hasClass('catid')) {
    // 1 page (max)
    $('div[label="'+result+'"] .'+result+'-add').addClass('d-none');
    $('div[label="'+result+'"] .'+result+'-hid').hide().removeClass('d-none').show(800);
  } else {
    // 3 page cat (min)
    $('div[label="'+result+'"] .'+result+'-hid').addClass('d-none');
    $('div[label="'+result+'"] .'+result+'-add').hide().removeClass('d-none').show(800);
  }
});
// End Min Max Button

// ajax for sub-categories and sub-sub-Categories

// Ready Function, tampilkan Index jika hanya 2 parameter, tampilkan yang diselect jika 3 parameter

$(document).ready(function() {
  tampilSubCat();
});
function tampilSubCat() {
    let sub_categories = $('.sub-categories-container');
    let url = '/ksl/admin/sub-categories';
    subsYo(sub_categories, url);
}
$(document).on('click', '.btn-check-view-sub-cat', function() {
  let sub_categories = $('.sub-categories-container');
  let url = '/ksl/admin/sub-categories/';
  let val = $(this).val();
  tampilSubSubCat();
  subsYo(sub_categories, url, val);
  $('a[href="#sub-categories-container"]').click();
});

$(document).ready(function() {
  tampilSubSubCat();
});
function tampilSubSubCat() {
    let sub_sub_categories = $('.sub-sub-categories-container');
    let url = '/ksl/admin/sub-sub-categories';
    subsYo(sub_sub_categories, url);
}
$(document).on('click', '.btn-check-view-sub-sub-cat', function() {
  let sub_sub_categories = $('.sub-sub-categories-container');
  let url = '/ksl/admin/sub-sub-categories/';
  let val = $(this).val();
  subsYo(sub_sub_categories, url, val);
  $('a[href="#sub-sub-categories-container"]').click();
});

function subsYo(page, url, val = '') {
  backupUrl = url;
  url = url+val;
  $.ajax({
   type: 'GET',
   url: url,
   dataType : "html",
   success: function(data) {
              page.html(data);
              if (backupUrl == '/ksl/admin/sub-categories/') {
                $('#sub-category-category-id').val(val);
              } else if (backupUrl == '/ksl/admin/sub-sub-categories/') {
                $('#sub-sub-category-sub-category-id').val(val);
              }
            },
    error: function(data){
            },
  });
}

// search data
$(document).on('keyup', '.search-box[val="sub-cat"]', function() {
  let page = 'sub-categories';
  searchDataCat(this, page);
});
$(document).on('keyup', '.search-box[val="sub-sub-cat"]', function() {
  let page = 'sub-sub-categories';
  searchDataCat(this, page);
});
function searchDataCat(el, page) {
  let url = '/ksl/admin/'+page+'/search';
  let tableList = '#'+page+'-list';
  let val = $(el).val();
  let idval = $(el).attr('idval');
  $.ajax({
   type: 'GET',
   url: url,
   data: {val:val, idval:idval},
   // dataType : "html",
   success: function(data) {
       $(tableList).html($(data).find(tableList).html());
       $('.'+page+'-container ul.pagination').html('').html($(data).find('ul.pagination').html());
    },
    error: function(data){
    },
  });
}

// insert data
$(document).on('click', '.add-data-btn[val="sub-cat"]', function(e) {
  let  jsData = {};
  let url = '';
  jsData['name'] = $('#sub-category-name').val();
  jsData['desc'] = $('#sub-category-desc').val();
  jsData['name_en'] = $('#sub-category-name_en').val();
  jsData['desc_en'] = $('#sub-category-desc_en').val();
  jsData['id_categories'] = $('#sub-category-category-id').val();
  url = '/ksl/admin/sub-categories';
  insertDataCat(jsData, url);
});
$(document).on('click', '.add-data-btn[val="sub-sub-cat"]', function(e) {
  let  jsData = {};
  let url = '';
  jsData['name'] = $('#sub-sub-category-name').val();
  jsData['desc'] = $('#sub-sub-category-desc').val();
  jsData['name_en'] = $('#sub-sub-category-name_en').val();
  jsData['desc_en'] = $('#sub-sub-category-desc_en').val();
  jsData['id_sub_categories'] = $('#sub-sub-category-sub-category-id').val();
  url = '/ksl/admin/sub-sub-categories';
  insertDataCat(jsData, url);
});
function insertDataCat(jsData, url) {
    let page = '';
    page = checkPage(url);
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
                ajaxResultCat(page, data);
              },
      error: function(data){
              }
    });

}

// Delete Data
$(document).on('click', '.del-data-btn[val="sub-sub-cat"]', function(e) {
    let val = $(this).val();
    let url = '';
    name = $(this).parents('tr').find('.td-name').html();
    if(!confirm('Remove Sub Categories '+name+' ?')) {
      return false;
    }
    url = '/ksl/admin/sub-sub-categories/';
    deleteDataCat(val, url);
});

$(document).on('click', '.del-data-btn[val="sub-cat"]', function(e) {
    let val = $(this).val();
    let url = '';
    name = $(this).parents('tr').find('.td-name').html();
    if(!confirm('Remove Sub Categories '+name+', It\'s will remove all this Sub Sub Categories ?')) {
      return false;
    }
    tampilSubSubCat();
    url = '/ksl/admin/sub-categories/';
    deleteDataCat(val, url);
});

function deleteDataCat(val, url) {
  let page = '';
  page = checkPage(url);
  $.ajax({
    type: 'DELETE',
    url: url+val,
    success: function(data) {
      ajaxResultCat(page, data);
    },
    error: function(data){
      ajaxResultCat(page, data);
    },
  });
}

// Edit data
$(document).on('click', '.upd-data-btn[val="sub-cat"]', function() {
    val = $(this).val();
    name = $(this).parents('tr').find('.td-name').text();
    desc = $(this).parents('tr').find('.td-desc').text();
    name_en = $(this).parents('tr').find('.td-name_en').text();
    desc_en = $(this).parents('tr').find('.td-desc_en').text();
    $('button[data-target="#formModalSubCat"]').click(); //
    $('.btn-gg').addClass('update-data-btn').removeClass('add-data-btn').text('Edit Now');
    $('#formModalLabelSubCat').text('Edit Sub Category '+ name_en); //
    $('#sub-category-name').val(name);  //
    $('#sub-category-desc').val(desc); //
    $('#sub-category-name_en').val(name_en); //
    $('#sub-category-desc_en').val(desc_en); //
    $('#sub-category-id').val(val); //
});

$(document).on('click', '.upd-data-btn[val="sub-sub-cat"]', function() {
    val = $(this).val();
    name = $(this).parents('tr').find('.td-name').text();
    desc = $(this).parents('tr').find('.td-desc').text();
    name_en = $(this).parents('tr').find('.td-name_en').text();
    desc_en = $(this).parents('tr').find('.td-desc_en').text();
    $('button[data-target="#formModalSubSubCat"]').click(); //
    $('.btn-gg').addClass('update-data-btn').removeClass('add-data-btn').text('Edit Now');
    $('#formModalLabelSubSubCat').text('Edit Sub Sub Category '+ name_en); //
    $('#sub-sub-category-name').val(name);  //
    $('#sub-sub-category-desc').val(desc); //
    $('#sub-sub-category-name_en').val(name_en); //
    $('#sub-sub-category-desc_en').val(desc_en); //
    $('#sub-sub-category-id').val(val); //
});

// Update Data
$(document).on('click', '.update-data-btn[val="sub-cat"]', function(e) {
  let  jsData = {};
  let url = '';
  let id = '';
  id = $('#sub-category-id').val();
  jsData['name'] = $('#sub-category-name').val();
  jsData['desc'] = $('#sub-category-desc').val();
  jsData['name_en'] = $('#sub-category-name_en').val();
  jsData['desc_en'] = $('#sub-category-desc_en').val();
  url = '/ksl/admin/sub-categories/';
  updateDataCat(jsData, url, id);
});
$(document).on('click', '.update-data-btn[val="sub-sub-cat"]', function(e) {
  let  jsData = {};
  let url = '';
  let id = '';
  id = $('#sub-sub-category-id').val();
  jsData['name'] = $('#sub-sub-category-name').val();
  jsData['desc'] = $('#sub-sub-category-desc').val();
  jsData['name_en'] = $('#sub-sub-category-name_en').val();
  jsData['desc_en'] = $('#sub-sub-category-desc_en').val();
  url = '/ksl/admin/sub-sub-categories/';
  updateDataCat(jsData, url, id);
});

function updateDataCat(jsData, url, id) {
      let page = checkPage(url);
      jsData = JSON.stringify(jsData);
      $.ajax({
       type: 'PUT',
       url: url+id,
       data: {jsData:jsData},
       // dataType : "html",
       success: function(data) {
            ajaxResultCat(page, data);
        },
        error: function(data){
            ajaxResultCat(page, data);
          },
      });
}


// Reset on Insert Data
$(document).on('click', '.add-btn-modal[data-target="#formModalSubCat"]', function(e) {
  // ajaxResultCat('sub categories', '', false);/
  $('.formModal input[type="text"], .formModal textarea').val('');
});
$(document).on('click', '.add-btn-modal[data-target="#formModalSubSubCat"]', function(e) {
  // ajaxResultCat('sub sub categories', '', false);
  $('.formModal input[type="text"], .formModal textarea').val('');
});



function ajaxResultCat(page = '', data = '', reload = true) {
     let formLabelText = checkIdFormLabel(page);
     let searchVal = getThreeLetter(formLabelText, '-', 'lowercase');
     let parentId = $('.search-box[val="'+searchVal+'"]').eq(0).attr('idval');
     $('button.close[data-dismiss="modal"]').click();
     $('.btn-gg').addClass('add-data-btn').removeClass('update-data-btn').text('Add Now');
     $('#formModalLabel'+formLabelText).text('Add New '+ ucwords(page));
     $('.flash-message').html(data);
     if (reload) {
       triggerReloadCat(searchVal, parentId);
     }
}

function triggerReloadCat(el, parentId) {
  // 'sub-cat atau sub-sub-cat', 6 atau 7
  $('.btn-check-view-'+el+'[value="'+parentId+'"]').eq(0).click();
}

function checkPage(url) {
  let page = '';
  let regex = /ksl\/admin\/([^\/]+)/;
  let match = regex.exec(url);
  if (match !== undefined) {
   page = match[1].replace(/-/g, ' ');
  }
  return page;
}


function getThreeLetter(str, dash = '', caseWords = '') {
  let matches = str.match(/[A-Z][a-z]{2}/g);
  let res = matches.join(dash);
  if (caseWords == 'lowercase') {
    res = res.toLowerCase();
  } else if (caseWords == 'uppercase') {
    res = res.toUpperCase();
  }
  return res;
}

function checkIdFormLabel(page = '') {
    let formLabelText = getThreeLetter(ucwords(page));
    return formLabelText;
}
