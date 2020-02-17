<?php


Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/', 'HomeController@show')->name('login');
    Route::post('/login', 'LoginController@login');
});