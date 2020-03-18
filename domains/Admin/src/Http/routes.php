<?php

Route::prefix('user')->name('admin.')->group(function() {
    Route::get('/', 'HomeController@show')->name('login')->middleware('web');
    Route::post('/login', 'LoginController@login');
    Route::post('/logout', 'LoginController@logout')->name('logout');
});