<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('hello', function() {
    return view('hello');
});




















// Admin Routes

// Admin Auth Routes
App\CustomRoutes\Router::AdminAuth();

// Admin Users
Route::resource('ksl/admin/users', 'Admin\UsersController')->only([
  'index', 'store', 'destroy', 'update', 'search'
])->middleware('auth');

// Admin Tags
Route::resource('ksl/admin/tags', 'Admin\TagsController')->only([
  'index', 'store', 'destroy', 'update', 'search'
])->middleware('auth');

// Admin Categories
Route::resource('ksl/admin/categories', 'Admin\CategoriesController')->only([
  'index', 'store', 'destroy', 'update', 'search'
])->middleware('auth');

// Admin Sub Categories
Route::get('ksl/admin/sub-categories/search', 'Admin\SubCategoriesController@search');
Route::resource('ksl/admin/sub-categories', 'Admin\SubCategoriesController')->only([
  'index', 'show', 'store', 'destroy', 'update'
])->middleware('auth');

// Admin Sub Sub Categories
Route::get('ksl/admin/sub-sub-categories/search', 'Admin\SubSubCategoriesController@search');
Route::resource('ksl/admin/sub-sub-categories', 'Admin\SubSubCategoriesController')->only([
  'index', 'show', 'store', 'destroy', 'update'
])->middleware('auth');

// Admin Profile Information
Route::resource('ksl/admin/profile-information', 'Admin\ProfileInformationController')->only([
  'index', 'update'
])->middleware('auth');


// Default Admin LogIn to Dashboard
Route::get('ksl/admin/{dashboard?}', function(){
  $data['pages'] = App\AdminModel\Pages::getAllPages();
  return view('admin/dashboard', $data);
})->middleware('auth');



// Testing Routes
Route::get('test', function() {
  $data = App\AdminModel\Website_text::where('id_pages', '5')->distinct('prefix')->select('prefix')->get();
  foreach ($data as $value) {
    echo $value->prefix."<br>";
  }
});
