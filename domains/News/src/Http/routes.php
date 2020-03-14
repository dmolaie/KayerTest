<?php

Route::group(['prefix' => 'admin', 'name' => '.admin.'],
    function () {
        Route::post('/create', 'NewsController@createNews')->middleware('auth:api');
        Route::post('/edit', 'NewsController@editNews')->middleware('auth:api');
        Route::get('/list', 'NewsController@getListForAdmin');
        Route::delete('/delete/{id}', 'NewsController@deleteNews')->middleware('auth:api')
            ->where('id', '[0-9]+');
    });



