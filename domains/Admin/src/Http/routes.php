<?php

Route::domain('{subdomain}.'.config('app.url'))->group(function () {
    Route::group(['prefix' => '{language}', 'where' => ['language' => config('app.languages')]], function () {
        Route::get('/', 'HomeController@show')->name('login')->middleware('web');
        Route::post('/login', 'LoginController@login')->middleware(['ehda','guest']);
        Route::post('/logout', 'LoginController@logout')->name('logout')->middleware('ehda');
    });
});

Route::prefix('user')->name('admin.')->group(function() {
    Route::get('/', 'HomeController@show')->name('login')->middleware('web');
    Route::post('/login', 'LoginController@login')->middleware(['ehda','guest']); 
    Route::post('/logout', 'LoginController@logout')->name('logout')->middleware('ehda');
});
