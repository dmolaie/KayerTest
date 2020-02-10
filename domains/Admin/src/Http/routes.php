<?php


Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/', 'HomeController@show');
    Route::post('/login', 'LoginController@login');
});