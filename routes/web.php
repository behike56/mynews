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
    
    /**
     * ニュース記事
     * 作成画面、編集画面、一覧表示画面
     * 削除機能
     **/
    Route::get('news/create', 'Admin\NewsController@add');
    Route::post('news/create', 'Admin\NewsController@create');
    
    Route::get('news/edit', 'Admin\NewsController@edit');
    Route::post('news/edit', 'Admin\NewsController@update');

    Route::get('news', 'Admin\NewsController@index');
    
    Route::get('news/delete', 'Admin\NewsController@delete');

    /**
     * プロフィール情報
     * 作成画面、編集画面
     **/
    Route::get('profile/create', 'Admin\ProfileController@add');
    Route::post('profile/create', 'Admin\ProfileController@create')
    ;
    Route::get('profile/edit', 'Admin\ProfileController@edit');
    Route::post('profile/edit', 'Admin\ProfileController@update');

    Route::get('profile', 'Admin\ProfileController@mypage');

    Route::get('news/delete', 'Admin\ProfileController@delete');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
