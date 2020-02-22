<?php


Route::get('/get_category_by_type','CategoryController@getCategoryByType')->middleware(['auth:api','can:list,Domains\Category\Entities\Category']);
Route::post('/create','CategoryController@createCategory');
