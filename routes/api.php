<?php

use Illuminate\Http\Request;

//all topics
Route::get('topics', 'Api\TopicController@index');