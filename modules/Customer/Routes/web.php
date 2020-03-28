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

Route::get('/', 'CustomerController@index');
//Auth::routes();

Route::prefix("admin")->group(function () {
    Route::namespace("Admin")->group(function () {
        Route::name("admin.")->group(function () {
            Route::resource("customers", "CustomerController");
            Route::get("admins/customer/change-password/{customer}", "CustomerController@changePasswordForm")->name("customers.password.change");
            Route::put("admins/customer/change-password/{customer}", "CustomerController@saveChangePassword")->name("customers.password.change.save");
        });
    });
});
