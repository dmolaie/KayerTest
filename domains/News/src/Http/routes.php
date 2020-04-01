<?php

Route::group(['prefix' => 'admin', 'name' => '.admin.'],
    function () {
        Route::post('/create', 'NewsController@createNews')->middleware('can:createNews,Domains\News\Entities\News');
        Route::post('/edit', 'NewsController@editNews')->middleware('can:editNews,Domains\News\Entities\News');
        Route::post('/change-status', 'NewsController@changeNewsStatus')->middleware('can:changeNewsStatus,Domains\News\Entities\News');
        Route::get('/detail/{id}', 'NewsController@getNewsDetail')->middleware('can:getNewsDetail,Domains\News\Entities\News')
            ->where('id', '[0-9]+');
        Route::get('/list', 'NewsController@getListForAdmin')->middleware('can:getListForAdmin,Domains\News\Entities\News');
        Route::delete('/delete/{id}', 'NewsController@deleteNews')->middleware('can:deleteNews,Domains\News\Entities\News')
            ->where('id', '[0-9]+');
    });



