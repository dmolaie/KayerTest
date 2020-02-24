<?php

use Illuminate\Support\Facades\Route;

Route::post('/register','UserController@register');
Route::post('/register_legate','UserController@legateRegister');
