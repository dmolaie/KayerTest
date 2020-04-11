<?php

Route::group(['prefix' => 'admin', 'name' => '.admin.'],
    function () {
        Route::post('/create', 'EventController@create')->middleware('auth:api');
        Route::post('/edit', 'EventController@edit')->middleware('auth:api');
        Route::get('/list', 'EventController@getListForAdmin')->middleware('auth:api');
        Route::post('/delete', 'EventController@delete')->middleware('auth:api');
        Route::post('/change-status',
            'EventController@changeStatus')->middleware('auth:api');
        Route::get('/detail/{id}', 'EventController@getDetail')->middleware('auth:api')
            ->where('id', '[0-9]+');
});



