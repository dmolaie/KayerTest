<?php

Route::group(['middleware' => ['web']], function () {

    Route::post('/register', 'UserController@register')->name('register-ehda');
    Route::post('/register_legate', 'UserController@legateRegister');
    Route::get('/full_info', 'UserController@getFullUserInfo')->middleware('auth');
    Route::post('/validate_data_user_client', 'UserController@ValidateDataUserClient');
    Route::post('/validate_data_user_legate', 'UserController@ValidateDataUserLegate');
});


