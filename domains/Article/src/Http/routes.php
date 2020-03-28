<?php

Route::group(['prefix' => 'admin', 'name' => '.admin.'],
    function () {
        Route::post('/create', 'ArticleController@createArticle')->middleware('auth:api');
        Route::post('/edit', 'ArticleController@editArticle')->middleware('auth:api');
        Route::delete('/delete/{id}', 'ArticleController@deleteArticle')->middleware('auth:api')
            ->where('id', '[0-9]+');
        Route::get('/list', 'ArticleController@getListForAdmin');
        Route::post('/change-status', 'ArticleController@changeArticleStatus')->middleware('auth:api');
        Route::get('/detail/{id}', 'ArticleController@getArticleDetail')->middleware('auth:api')
            ->where('id', '[0-9]+');
    });