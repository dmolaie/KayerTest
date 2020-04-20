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
    Route::post('/change-admin-password', 'UserController@changePassword')->middleware('auth:api')->name('change-admin-password');
    Route::post('/register-user-by-admin', 'UserController@registerUserByAdmin')->middleware('auth:api')->name('register-user-by-admin');
    Route::post('/add-role-to-user', 'UserController@addRoleToUser')->middleware('auth:api')->name('add-role-to-user');
    Route::get('/user-info-for-admin', 'UserController@getFullUserInfoForAdmin')->middleware('auth:api')->name('user-info-for-admin');
    Route::get('/user-base-profile-info', 'UserController@getUserBaseProfileInfo')->middleware('auth:api')->name('user-base-profile-info');
    Route::post('/change-user-role-status', 'UserController@changeUserRoleStatus')->middleware('auth:api')->name('change-user-role-status');
    Route::get('/user-roles/{id}', 'UserController@userRoles')->middleware('auth:api')->name('user-roles')->where('id', '[0-9]+');
    Route::post('/user-report', 'UserController@userReport')->middleware('auth:api')->name('user-report');
});

Route::get('/user-basic-register-info', 'UserController@userBasicRegisterInfo')->name('user-basic-register-info');