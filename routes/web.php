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

//validate personal details
Route::post('personal-details', 'UserDirectory\UserDirectoryController@validate_personal_details');

//validate location details
Route::post('location-details', 'UserDirectory\UserDirectoryController@validate_location_details');

//subscribe to newsletter
Route::post('/subscribe-to-newsletter', 'NewsLetterController@store')->name('subscribe');

//registration details
Route::get('registration-details', 'Api\RegistrationDetail@index');

Route::group(['middleware' => 'auth'], function (){

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    /*
     *=================== ADMIN ROUTES ====================================================
     */
    Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

        //posts resource routes
        Route::resource('posts', 'PostController');

        //topics resource route
        Route::resource('topics', 'TopicController');

        //slider images resource route
        Route::resource('sliders', 'SliderImageController');

        //videos resource route
        Route::resource('videos', 'VideoController');

        //=========================== Configuration ========================================
        Route::group(['namespace' => 'Config', 'prefix' => 'config'], function () {

            //professional bodies routes
            Route::resource('bodies', 'BodyController');

            //memberships routes
            Route::resource('memberships', 'MembershipController');

            //membership type routes
            Route::resource('membership-types', 'MembershipTypeController');
        });


    });



});

