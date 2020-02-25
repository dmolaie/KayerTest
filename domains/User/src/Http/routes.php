<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web']], function () {

    Route::post('/register', 'UserController@register')->name('register-ehda');
    Route::post('/register_legate', 'UserController@legateRegister');
    Route::get('/full_info', 'UserController@getFullUserInfo')->middleware('auth');
    Route::post('/update-info', 'UserController@updateUserInfo')->middleware('auth');
});
