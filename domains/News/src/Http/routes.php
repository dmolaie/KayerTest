<?php

Route::group(['prefix' => 'admin', 'name' => '.admin.'],
    function () {
        Route::post('/create', 'NewsController@createNews')->middleware('auth:api');
        Route::post('/edit', 'NewsController@editNews')->middleware('auth:api');
        Route::get('/list', 'NewsController@getListForAdmin');
    });



