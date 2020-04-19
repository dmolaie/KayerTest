<?php

Route::redirect('/', app()->getLocale());

Route::domain('{subdomain}.dev.ehdacenter.io')->group(function () {
    Route::group(['prefix' => '{language}', 'where' => ['language' => config('app.languages')]], function () {
        Route::prefix('page')->name('page.domain.')->group(function () {
            Route::get('/iran_news', 'PagesController@newsListIranDomain')->name('news-list-iran');
            Route::get('/world-news', 'PagesController@newsListWorldDomain')->name('news-list-world');
            Route::get('/events', 'PagesController@eventsListDomain')->name('events-list');

        });
    });
});

Route::group(['prefix' => '{language}', 'where' => ['language' => config('app.languages')], 'name' => 'site.'], function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::prefix('page')->name('page.')->group(function () {
        Route::get('/donation-card', 'PagesController@donationAndCard')->name('donation-card');
        Route::get('/volunteers', 'PagesController@legaterVolunteers')->name('volunteers');
        Route::get('/volunteers-final-step', 'PagesController@legaterVolunteersFinalStep')->name('volunteers.finalstep');
        Route::get('/client-profile', 'PagesController@clientProfile')->name('client.profile');
        Route::get('/edit-client-profile', 'PagesController@editClientProfile')->name('edit.client.profile');

        Route::get('/ngo-history', 'PagesController@history')->name('ngo-history');
        Route::get('/structure-and-organization', 'PagesController@structureAndOrganization')->name('structure-and-organization');
        Route::get('/interactions', 'PagesController@interactions')->name('interactions');
        Route::get('/ngo-foundations', 'PagesController@foundations')->name('foundations');
        Route::get('/mission-and-vision', 'PagesController@missionAndVision')->name('mission-and-vision');
        Route::get('/iran_news', 'PagesController@newsListIran')->name('news-list-iran');
        Route::get('/world-news', 'PagesController@newsListWorld')->name('news-list-world');
        Route::get('/events', 'PagesController@eventsList')->name('events-list');


        Route::get('/{slug}', 'PagesController@pages')->name('pages');
    });

    Route::prefix('archive')->name('archive.')->group(function () {
        Route::get('/news', 'PagesController@newsList')->name('news-list');
        Route::get('/news/show/{slug}', 'PagesController@showDetailNews')->name('showDetailNews');
        Route::get('/events/show/{slug}', 'PagesController@showDetailEvents')->name('showDetailEvents');
    });

});



Route::get('/news/{uuid}', 'PagesController@newsShortLink')->name('news-short-link');
Route::get('/event/{uuid}', 'PagesController@eventShortLink')->name('new-short-link');
Route::get('/article/{uuid}', 'PagesController@articleShortLink')->name('article-short-link');



