<?php

Route::redirect('/', app()->getLocale());

Route::group(['prefix' => '{language}', 'where' => ['language' => config('app.languages')], 'name' => 'site.'], function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::prefix('page')->name('page.')->group(function () {
        Route::get('/donation-card', 'PagesController@donationAndCard')->name('donation-card');
        Route::get('/volunteers', 'PagesController@legaterVolunteers')->name('volunteers');
        Route::get('/volunteers-final-step', 'PagesController@legaterVolunteersFinalStep')->name('volunteers.finalstep');
        Route::get('/client-profile', 'PagesController@clientProfile')->name('client.profile');
        Route::get('/edit-client-profile', 'PagesController@editClientProfile')->name('edit.client.profile');
        Route::get('/{slug}', 'PagesController@pages')->name('pages');

        /*Route::get('/ngo-history', 'PagesController@history')->name('ngo-history');
          Route::get('/structure-and-organization', 'PagesController@structureAndOrganization')->name('structure-and-organization');
          Route::get('/interactions','PagesController@interactions')->name('interactions');
          Route::get('/ngo-foundations','PagesController@foundations')->name('foundations');
          Route::get('/mission-and-vision','PagesController@missionAndVision')->name('mission-and-vision');*/

    });

    Route::prefix('archive')->name('archive.')->group(function () {
        Route::get('/news', 'PagesController@newsList')->name('news-list');
    });

});