<?php

Route::group(['middleware' => ['web']], function () {

    Route::get('/full-info', 'UserController@getFullUserInfo')->middleware('auth');
    Route::post('/update-info', 'UserController@updateUserInfo')->middleware('auth');
    Route::post('/validate_data_user_client', 'UserController@ValidateDataUserClient');
    Route::post('/validate_data_user_legate', 'UserController@ValidateDataUserLegate');
});


Route::get('/user-search', 'UserController@getListForAdmin')->middleware('auth:api')->name('user-search');
Route::post('/register', 'UserController@register')->name('register-ehda');
Route::post('/register-legate', 'UserController@legateRegister')->name('register-legate');


