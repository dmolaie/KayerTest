<?php

Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/login','HomeController@show');
});


/**
 * API Routes LISTS
 */
Route::prefix('api.admin')->name('a.admin.login')->group(function () {
});