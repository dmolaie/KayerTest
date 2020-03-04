<?php

Route::group(['prefix' => 'admin', 'name' => '.menu.'],
    function () {
        Route::post('/save-priority', 'MenusController@savePriority')->middleware('auth:api');
        Route::get('/list', 'MenusController@adminList')->middleware('auth:api');
        Route::post('/create', 'MenusController@createMenu')->middleware('auth:api');
    });

Route::get('/active-list', 'MenusController@activeList');


