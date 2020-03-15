<?php

Route::prefix('user')->name('admin.')->group(function() {
    Route::get('/', 'HomeController@show')->name('login')->middleware('web');
    Route::post('/login', 'LoginController@login')->middleware('web');
    Route::post('/logout', 'LoginController@logout')->name('logout')->middleware('web');
});