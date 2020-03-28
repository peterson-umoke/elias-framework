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

Route::prefix('post')->group(function () {
    Route::get('/', 'PostController@index');
});


Route::prefix('admin')->group(function () {
    Route::name("admin.")->group(function () {
        Route::namespace("Admin")->group(function () {
            Route::resource('posts', 'PostController');
            Route::resource('post/categories', 'CategoriesController')->names([
                "index" => "posts.categories.index",
                "create" => "posts.categories.create",
                "store" => "posts.categories.store",
                "show" => "posts.categories.show",
                "edit" => "posts.categories.edit",
                "update" => "posts.categories.update",
                "destroy" => "posts.categories.destroy",
            ]);
        });
    });
});
