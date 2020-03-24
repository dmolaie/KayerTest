<?php

Route::prefix('user')->name('admin.')->group(function() {
    Route::get('/', 'HomeController@show')->name('login')->middleware('ehda');
    Route::post('/login', 'LoginController@login')->middleware('ehda');
    Route::post('/logout', 'LoginController@logout')->name('logout')->middleware('ehda');

});