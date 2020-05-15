<?php

Route::group(['prefix' => 'admin', 'name' => '.admin.'],
    function () {
        Route::post('/create', 'EventController@create')->middleware('auth:api');
        Route::get('/list', 'EventController@getListForAdmin')->middleware('auth:api');
        Route::post('/delete', 'EventController@delete')->middleware('auth:api');
});



