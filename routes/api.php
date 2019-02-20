<?php

use Illuminate\Http\Request;

//topics
Route::get('topics', 'Api\TopicController@index');

//posts
Route::get('posts', 'Api\PostController@index');

//videos
Route::get('videos', 'Api\VideoController@index');

//slider images
Route::get('slider-images', 'Api\SliderImageController@index');