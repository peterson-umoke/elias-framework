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
//use Modules\Page\Entities\Page;

//Route::get('/', 'PageController@index');
Route::get("{page:name}", "PageController@index")->name("pages.show");

//Route::get("about", function() {
//    echo "hskdlfjskldf";
//});
//foreach(Page::all() as $page) {
//    Route::get("{page:name}", [
//        'uses' => 'PageController@index',
//        'page' => $page->name
//    ])->name("pages." . $page->route);
//}

//foreach(Page::all() as $page) {
//    Route::get($page->name, [
//        'uses' => 'PageController@index',
//        'page' => $page->name
//    ])->name("pages." . $page->route);
//}

//Route::get("pages/{page:name}", "PageController@index")->name("pages.show");


// backend codebase
Route::prefix("admin")->group(function () {
    Route::name("admin.")->group(function () {
        Route::resource('pages', 'Admin\\PageController');
    });
});
