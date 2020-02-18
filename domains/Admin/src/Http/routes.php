<?php


Route::prefix('user')->name('admin.')->group(function() {
    Route::get('/', 'HomeController@show')->name('login');
    Route::post('/login', 'LoginController@login');
});