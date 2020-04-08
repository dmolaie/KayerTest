<?php

Route::group(['prefix' => 'admin', 'name' => '.admin.'],
    function () {
        Route::post('/create', 'ArticleController@create')->middleware('auth:api');
        Route::post('/edit', 'ArticleController@edit')->middleware('auth:api');
        Route::delete('/delete/{id}', 'ArticleController@delete')->middleware('auth:api')
            ->where('id', '[0-9]+');
        Route::get('/list', 'ArticleController@getListForAdmin');
        Route::post('/change-status', 'ArticleController@changeStatus')->middleware('auth:api');
        Route::get('/detail/{id}', 'ArticleController@getDetail')->middleware('auth:api')
            ->where('id', '[0-9]+');
    });