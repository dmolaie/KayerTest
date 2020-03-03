<?php

Route::group(['prefix' => 'admin', 'name' => '.admin.'],
    function () {
        Route::post('/create', 'EventController@createEvent')->middleware('auth:api');
        Route::post('/edit', 'EventController@editEvent')->middleware('auth:api');
        Route::get('/list', 'EventController@getListForAdmin')->middleware('auth:api');
        Route::post('/delete', 'EventController@destroyEvent')->middleware('auth:api');
    });



