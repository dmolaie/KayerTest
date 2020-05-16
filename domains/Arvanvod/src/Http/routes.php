<?php

Route::group(['prefix' => 'admin', 'name' => '.admin.'],
    function () {
        Route::post('/create', 'ArvanvodController@create');
        Route::post('/list', 'ArvanvodController@getList');
        Route::post('/delete', 'ArvanvodController@delete');
});



