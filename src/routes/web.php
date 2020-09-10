<?php

use Illuminate\Http\Request;

Route::get('/login/gitlab', 'GitlabController@redirectToProvider')->name('login.gitlab');
Route::get('/login/gitlab/callback', 'GitlabController@handleProviderCallback')->name('login.gitlab.callback');
