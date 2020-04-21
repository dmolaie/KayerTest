<?php

Route::group(['prefix' => 'admin', 'name' => '.menu.'],
    function () {
        Route::group(['middleware' => ['auth:api', 'can:list,Domains\Menu\Entities\Menus']], function () {
            Route::post('/save-priority', 'MenusController@savePriority');
            Route::get('/list', 'MenusController@adminList');
            Route::post('/create', 'MenusController@createMenu');
            Route::post('/edit', 'MenusController@editMenu');
            Route::post('/delete', 'MenusController@destroyMenu');
            Route::get('/types', 'MenusController@getMenuTypes');
        });

        Route::get('/dynamic-list', 'MenusController@getAdminMenuList')->middleware('auth:api');

    });

Route::get('/active-list', 'MenusController@activeList');
