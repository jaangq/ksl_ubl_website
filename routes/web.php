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
    return view('welcome');
});
Route::get('hello', function() {
    return view('hello');
});

Route::get('/home', 'HomeController@index')->name('home');



















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

// Default Admin LogIn to Dashboard
Route::get('ksl/admin/{dashboard?}', function(){
  return view('admin/dashboard');
})->middleware('auth');

// Testing Routes
Route::post('test', function() {
});
