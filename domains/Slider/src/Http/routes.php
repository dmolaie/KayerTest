<?php

Route::group(['prefix' => 'admin', 'name' => '.admin.'],
    function () {
        Route::post('/create', 'SliderController@create')->middleware('auth:api');
        Route::post('/edit', 'SliderController@edit')->middleware('auth:api');
        Route::get('/list', 'SliderController@getListForAdmin')->middleware('auth:api');
        Route::delete('/delete/{id}', 'SliderController@delete')->middleware('auth:api')->where('id', '[0-9]+');
        Route::post('/change-status',
            'SliderController@changeStatus')->middleware('auth:api');
        Route::get('/detail/{id}', 'SliderController@getDetail')->middleware('auth:api')
            ->where('id', '[0-9]+');
    });



