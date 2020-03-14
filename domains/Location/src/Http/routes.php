<?php

use Illuminate\Support\Facades\Route;

Route::get('/all-cities','LocationController@getAllCities');
Route::get('/all-provinces','LocationController@getAllProvinces');
Route::get('/get-cities-by-province-id','LocationController@getCitiesByProvinceId');
