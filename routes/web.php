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

Auth::routes();

Route::group(['middleware' => 'auth'], function (){

    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    //posts resource routes
    Route::resource('posts', 'Admin\PostController');

    //topics resource route
    Route::resource('topics', 'Admin\TopicController');

    //slider images resource route
    Route::resource('sliders', 'Admin\SliderImageController');

    //videos resource route
    Route::resource('videos', 'Admin\VideoController');
});

