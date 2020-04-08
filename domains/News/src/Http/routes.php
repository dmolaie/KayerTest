<?php

Route::group(['prefix' => 'admin', 'name' => '.admin.'],
    function () {
        Route::post('/create', 'NewsController@create')->middleware('can:create,Domains\News\Entities\News');
        Route::post('/edit', 'NewsController@edit')->middleware('can:edit,Domains\News\Entities\News');
        Route::post('/change-status', 'NewsController@changeStatus')->middleware('can:changeStatus,Domains\News\Entities\News');
        Route::get('/detail/{id}', 'NewsController@getDetail')->middleware('can:getDetail,Domains\News\Entities\News')
            ->where('id', '[0-9]+');
        Route::get('/list', 'NewsController@getListForAdmin')->middleware('can:getListForAdmin,Domains\News\Entities\News');
        Route::delete('/delete/{id}', 'NewsController@delete')->middleware('can:delete,Domains\News\Entities\News')
            ->where('id', '[0-9]+');
    });



