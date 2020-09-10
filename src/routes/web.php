<?php

use Illuminate\Http\Request;

Route::group(['namespace' => 'Henri\Socialite\Http\Controllers'], function () {
    Route::get('/login/gitlab', 'GitlabController@redirectToProvider')->name('login.gitlab');
    Route::get('/login/gitlab/callback', 'GitlabController@handleProviderCallback')->name('login.gitlab.callback');
});


// Route::group([
//     'namespace' => 'Henri\Socialite\Controllers'
// ], function() {
//     Route::get('/login/gitlab', 'GitlabController@redirectToProvider')->name('login.gitlab');
//     Route::get('/login/gitlab/callback', 'GitlabController@handleProviderCallback')->name('login.gitlab.callback');
// });
