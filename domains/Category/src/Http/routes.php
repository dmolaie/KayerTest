<?php

Route::group(['prefix' => 'admin', 'name' => '.admin.', 'middleware' => 'auth:api'],
    function () {
        Route::get('/get_category_by_type', 'CategoryController@getCategoryByType');
        Route::post('/create', 'CategoryController@createCategory')->middleware(['can:createCategory,Domains\Category\Entities\Category']);
    });
Route::get('/get-active-category-by-type', 'CategoryController@getActiveCategoryByType');
Route::get('/category-list-by-type', 'CategoryController@CategoryListByType');
