<?php

Route::group(['prefix' => 'admin', 'name' => '.admin.'],
    function () {
        Route::post('/create', 'EventsController@createEvents')->middleware('auth:api');
    });



