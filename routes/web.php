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
// Auth::routes();
Route::get('ksl/admin/login', 'Admin\LoginController@showLoginForm')->name('login');
Route::post('ksl/admin/login', 'Admin\LoginController@login');
Route::post('ksl/admin/logout', 'Admin\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('ksl/admin/register', 'Admin\RegisterController@showRegistrationForm')->name('register');
Route::post('ksl/admin/register', 'Admin\RegisterController@register');

// Password Reset Routes...
Route::get('ksl/admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('ksl/admin/password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('ksl/admin/password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('ksl/admin/password/reset', 'Admin\ResetPasswordController@reset');

// Admin Dashboard
Route::get('ksl/admin/dashboard', function(){
  return view('admin/dashboard');
});
// Admin Usershome
Route::resource('ksl/admin/users', 'Admin\UsersController')->only([
  'index', 'store', 'destroy', 'update'
]);
