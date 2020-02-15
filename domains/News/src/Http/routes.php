<?php


Route::post('/create','NewsController@createNews')->middleware('auth:api');
