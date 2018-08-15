<?php
namespace App\CustomRoutes;
use Illuminate\Support\Facades\Route;


class Router {
  public static function AdminAuth() {
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
  }
}


?>
