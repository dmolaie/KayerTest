<?php

Route::post('/create', 'ContactController@createContact');
Route::group(['prefix' => 'admin', 'name' => '.admin.'],
    function () {
        Route::get('/list', 'ContactController@contactListByType')->middleware('auth:api');
        Route::get('/detail/{id}', 'ContactController@getDetail')->middleware('auth:api');
    });
