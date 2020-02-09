<?php

Route::redirect('/',app()->getLocale());

Route::group(['prefix' => '{language}','name' => 'site.' ],function (){
    Route::get('/', 'HomeController@index')->name('index');
    Route::prefix('page')->name('page.')->group(function(){
        Route::get('/ngo-history','PagesController@history')->name('ngo-history');
        Route::get('/structure-and-organization','PagesController@structureAndOrganization')->name('structure-and-organization');
    });
});