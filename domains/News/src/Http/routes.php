<?php


Route::post('/create','NewsController@createNews')->middleware('auth:api');
Route::post('/edit','NewsController@editNews')->middleware('auth:api');
