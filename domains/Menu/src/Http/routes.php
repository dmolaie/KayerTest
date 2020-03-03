<?php

Route::group(['prefix' => 'admin', 'name' => '.menu.'],
    function () {
        Route::post('/create', 'MenusController@createMenu')->middleware('auth:api');
    });



