<?php

use Illuminate\Http\Request;

//topics
Route::get('topics', 'Api\TopicController@index');

//posts
Route::get('posts', 'Api\PostController@index');
Route::get('post/{id}', 'Api\PostController@show');

//videos
Route::get('videos', 'Api\VideoController@index');

//slider images
Route::get('slider-images', 'Api\SliderImageController@index');