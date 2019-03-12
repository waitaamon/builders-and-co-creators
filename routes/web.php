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


Route::get('/', 'HomeController@index')->name('home');

//login routes
Route::get('login', 'Auth\LoginController@index')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login');

//logout
Route::post('logout', 'Auth\LogoutController@index')->name('logout');

//register routes
Route::get('register', 'UserDirectory\UserDirectoryController@index')->name('register');

//subscribe to newsletter
Route::post('/subscribe-to-newsletter', 'NewsLetterController@store')->name('subscribe');

Route::group(['middleware' => 'auth'], function (){

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    //posts resource routes
    Route::resource('posts', 'Admin\PostController');

    //topics resource route
    Route::resource('topics', 'Admin\TopicController');

    //slider images resource route
    Route::resource('sliders', 'Admin\SliderImageController');

    //videos resource route
    Route::resource('videos', 'Admin\VideoController');
});

