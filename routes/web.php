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
    
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('news/create', 'Admin\NewsController@add');
    Route::post('news/create', 'Admin\NewsController@create');
    
    // Larabel_15
    Route::get('news', 'Admin\NewsController@index'); //15 追記
    // Laravel_16
    Route::get('news/edit', 'Admin\NewsController@edit'); //16 追記
    Route::post('news/edit', 'Admin\NewsController@update'); // 16 追記
    Route::get('news/delete', 'Admin\NewsController@delete'); // 16削除用
});


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('profile/create', 'Admin\ProfileController@add');
    Route::post('profile/create', 'Admin\ProfileController@create');
    
    Route::get('profile/edit', 'Admin\ProfileController@edit');
    Route::post('profile/edit' , 'Admin\ProfileController@update');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'NewsController@index');