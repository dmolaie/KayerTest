<?php

Route::group(['middleware' => 'web'], function () {

    Route::get('/full-info', 'UserController@getFullUserInfo')->middleware('auth');
    Route::post('/update-info', 'UserController@updateUserInfo')->middleware('auth');
    Route::post('/validate_data_user_client', 'UserController@ValidateDataUserClient');
    Route::post('/validate_data_user_legate', 'UserController@ValidateDataUserLegate');
    Route::post('/register', 'UserController@register')->name('register-ehda');
    Route::post('/register-legate', 'UserController@legateRegister')->name('register-legate');
});


Route::group(['prefix' => 'admin'], function () {
    Route::get('/user-search', 'UserController@getListForAdmin')->middleware('auth:api')->name('user-search');
    Route::post('/edit-user-by-admin', 'UserController@updateUserInfoByAdmin')->middleware('auth:api')->name('edit-user-by-admin');
    Route::post('/change-password-by-admin', 'UserController@changeUserPasswordByAdmin')->middleware('auth:api')->name('change-password-by-admin');
    Route::post('/register-user-by-admin', 'UserController@registerUserByAdmin')->middleware('auth:api')->name('register-user-by-admin');
    Route::post('/add-role-to-user', 'UserController@addRoleToUser')->middleware('auth:api')->name('add-role-to-user');
});

