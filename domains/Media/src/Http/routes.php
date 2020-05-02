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

Route::group(['prefix' => 'text/admin', 'name' => '.text.admin.'],
    function () {
        Route::post('/create', 'TextController@create')->middleware('auth:api');
        Route::post('/edit', 'TextController@edit')->middleware('auth:api');
        Route::delete('/delete/{id}', 'TextController@delete')->middleware('auth:api')
            ->where('id', '[0-9]+');
        Route::get('/list', 'TextController@getListForAdmin');
        Route::post('/change-status', 'TextController@changeStatus')->middleware('auth:api');
        Route::get('/detail/{id}', 'TextController@getDetail')->middleware('auth:api')
            ->where('id', '[0-9]+');
    });

Route::group(['prefix' => 'voice/admin', 'name' => '.voice.admin.'],
    function () {
        Route::post('/create', 'VoiceController@create')->middleware('auth:api');
        Route::post('/edit', 'VoiceController@edit')->middleware('auth:api');
        Route::delete('/delete/{id}', 'VoiceController@delete')->middleware('auth:api')
            ->where('id', '[0-9]+');
        Route::get('/list', 'VoiceController@getListForAdmin');
        Route::post('/change-status', 'VoiceController@changeStatus')->middleware('auth:api');
        Route::get('/detail/{id}', 'VoiceController@getDetail')->middleware('auth:api')
            ->where('id', '[0-9]+');
    });