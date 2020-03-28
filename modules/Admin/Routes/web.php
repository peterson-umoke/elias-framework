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

Route::get('/', 'HomeController@index')->name("home");

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// resource links
Route::resource("admins", "AdminController");
Route::resource("permissions", "PermissionsController");
Route::resource("roles", "RolesController");

// chgange of passwords for admins
Route::get("admins/change-password/{admin}", "AdminController@changePasswordForm")->name("admins.password.change");
Route::put("admins/change-password/{admin}", "AdminController@saveChangePassword")->name("admins.password.change.save");

// mass destructions
Route::delete("admins-massDestroy","AdminController@massDestroy")->name("admins.massDestroy");
Route::delete("permissions-massDestroy","PermissionsController@massDestroy")->name("permissions.massDestroy");
Route::delete("roles-massDestroy","RolesController@massDestroy")->name("roles.massDestroy");

Route::prefix("profile")->group(function () {
    Route::get("/", "ProfileController@getProfile")->name("profile");
    Route::put("/", "ProfileController@saveProfile")->name("profile.save");
    Route::get("/change-password", "ProfileController@changePassword")->name("profile.password.change");
    Route::put("/change-password", "ProfileController@savePassword")->name("profile.password.change.save");
});

Route::get("settings/{channel}/{page}", "SettingsController@settings_page")->name("settings");
Route::post("settings/{channel}/save", "SettingsController@save_settings")->name("settings.save");
Route::get("settings/{channel}/delete/{key}", "SettingsController@delete_setting")->name("settings.delete");
