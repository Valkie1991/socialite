<?php 

use Illuminate\Http\Request;

Route::group(['namespace' => 'Henri\Socialite\Http\Controllers'], function () {
    Route::get('/test', 'SocialiteController@index');
});