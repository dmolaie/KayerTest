<?php

Route::group(['prefix' => 'admin', 'name' => '.admin.', 'middleware' => 'auth:api'],
    function () {
        Route::get('/get_category_by_type', 'CategoryController@getCategoryByType');
        Route::post('/create', 'CategoryController@createCategory');
    });