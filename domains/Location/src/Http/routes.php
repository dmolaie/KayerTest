<?php

use Illuminate\Support\Facades\Route;

Route::get('/all_cities','CityController@getAllCity');
Route::get('/get_cities_by_province_id','CityController@getCitiesByProvinceId');
