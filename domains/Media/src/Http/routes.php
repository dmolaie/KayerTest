<?php

Route::group(['prefix' => 'image/admin', 'name' => '.image.admin.'],
    function () {
        Route::post('/create', 'ImageController@create')->middleware('auth:api');
        Route::post('/edit', 'ImageController@edit')->middleware('auth:api');
        Route::delete('/delete/{id}', 'ImageController@delete')->middleware('auth:api')
            ->where('id', '[0-9]+');
        Route::get('/list', 'ImageController@getListForAdmin');
        Route::post('/change-status', 'ImageController@changeStatus')->middleware('auth:api');
        Route::get('/detail/{id}', 'ImageController@getDetail')->middleware('auth:api')
            ->where('id', '[0-9]+');
    });