<?php

Route::group(['middleware' => ['web']], function () {

    Route::post('/register', 'UserController@register')->name('register-ehda');
    Route::post('/register-legate', 'UserController@legateRegister');
    Route::get('/full-info', 'UserController@getFullUserInfo')->middleware('auth');
    Route::post('/update-info', 'UserController@updateUserInfo')->middleware('auth');
});
Route::get('/user-search', 'UserController@getListForAdmin')->middleware('auth:api');

