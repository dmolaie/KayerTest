<?php
Route::group(['prefix' => 'admin'], function () {
    Route::post('/assign-permission-user', 'RoleController@assignPermissionUser')->middleware('auth:api')->name('assign-permission-user');
    Route::post('/get-permission-user', 'RoleController@getPermissionUser')->middleware('auth:api')->name('get-permission-user');
    Route::get('/legate-roles/{id}', 'RoleController@legateRoles')->middleware('auth:api')->name('legate-roles')
        ->where('id', '[0-9]+');
});

