<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::redirect('/','/fa');
Route::group(['prefix' => '{language}','name' => 'site.' ],function (){
    Route::get('/', 'HomeController@index')->name('index');
    Route::prefix('page')->name('page.')->group(function(){
        Route::get('/ngo-history','PagesController@history')->name('ngo-history');
    });
});


