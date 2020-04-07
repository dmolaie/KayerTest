<?php
Route::group(['prefix' => 'admin'], function () {
    Route::post('/assign-permission-user', 'RoleController@assignPermissionUser')->middleware('auth:api')->name('assign-permission-user');
});

