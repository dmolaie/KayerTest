<?php

Route::group(['prefix' => 'admin', 'name' => '.admin.'],
    function () {
        Route::post('/create', 'ArticleController@createArticle')->middleware('auth:api');
        Route::post('/edit', 'ArticleController@editArticle')->middleware('auth:api');
        Route::get('/list', 'ArticleController@getListForAdmin');
    });



