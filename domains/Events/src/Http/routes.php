<?php

Route::group(['prefix' => 'admin', 'name' => '.admin.'],
    function () {
        Route::post('/create', 'EventsController@createEvents')->middleware('auth:api');
        Route::post('/edit', 'EventsController@editEvents')->middleware('auth:api');
        Route::get('/list', 'EventsController@getListForAdmin')->middleware('auth:api');
        Route::post('/delete', 'EventsController@destroyEvent')->middleware('auth:api');
    });



