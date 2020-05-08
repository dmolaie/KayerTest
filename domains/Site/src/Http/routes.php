<?php

Route::redirect('/', app()->getLocale());

Route::domain('{subdomain}.' . config('app.url'))->group(function () {
    Route::group(['prefix' => '{language}', 'where' => ['language' => config('app.languages')]], function () {
        Route::prefix('page')->name('page.domain.')->group(function () {
            Route::get('/iran_news', 'PagesController@newsListIranDomain')->name('news-list-iran');
            Route::get('/world-news', 'PagesController@newsListWorldDomain')->name('news-list-world');
            Route::get('/events', 'PagesController@eventsListDomain')->name('events-list');

        });
    });
});

Route::group(['prefix' => '{language}', 'where' => ['language' => config('app.languages')], 'name' => 'site.'],
    function () {
        Route::get('/', 'HomeController@index')->name('index');
        Route::prefix('page')->name('page.')->group(function () {
            Route::get('/donation-card', 'PagesController@donationAndCard')->name('donation-card');
            Route::get('/volunteers', 'PagesController@legaterVolunteers')->name('volunteers');
            Route::get('/volunteers-final-step',
                'PagesController@legaterVolunteersFinalStep')->name('volunteers.finalstep');
            Route::get('/client-profile', 'PagesController@clientProfile')->name('client.profile');
            Route::get('/edit-client-profile', 'PagesController@editClientProfile')->name('edit.client.profile');

            Route::get('/ngo-history', 'PagesController@history')->name('ngo-history');
            Route::get('/structure-and-organization',
                'PagesController@structureAndOrganization')->name('structure-and-organization');
            Route::get('/interactions', 'PagesController@interactions')->name('interactions');
            Route::get('/ngo-foundations', 'PagesController@foundations')->name('foundations');
            Route::get('/mission-and-vision', 'PagesController@missionAndVision')->name('mission-and-vision');
            Route::get('/iran_news', 'PagesController@newsListIran')->name('news-list-iran');
            Route::get('/world-news', 'PagesController@newsListWorld')->name('news-list-world');
            Route::get('/events', 'PagesController@eventsList')->name('events-list');


            Route::prefix('gallery')->name('gallery.')->group(function () {
                Route::get('/', 'PagesController@galleryList')->name('art-ehda');
                Route::get('/audio/{slug}', 'PagesController@galleryAudio')->name('audio');
                Route::get('/video/{slug}', 'PagesController@galleryVideo')->name('video');
                Route::get('/image/{slug}', 'PagesController@galleryImage')->name('image');
                Route::get('/text/{slug}', 'PagesController@galleryText')->name('text');
            });
        });

        Route::prefix('archive')->name('archive.')->group(function () {
            Route::get('/news', 'PagesController@newsList')->name('news-list');
            Route::get('/news/show/{slug}', 'PagesController@showDetailNews')->name('showDetailNews');
            Route::get('/events/show/{slug}', 'PagesController@showDetailEvents')->name('showDetailEvents');
            Route::get('/gallery/show/{slug}', 'PagesController@showDetailMedia')->name('showDetailMedia');
        });

    });


Route::get('/news/{uuid}', 'PagesController@newsShortLink')->name('news-short-link');
Route::get('/event/{uuid}', 'PagesController@eventShortLink')->name('new-short-link');
Route::get('/article/{uuid}', 'PagesController@articleShortLink')->name('article-short-link');
Route::get('/text/{uuid}', 'PagesController@textShortLink')->name('text-short-link');
Route::get('/video/{uuid}', 'PagesController@videoShortLink')->name('video-short-link');
Route::get('/audio/{uuid}', 'PagesController@audioShortLink')->name('audio-short-link');
Route::get('/image/{uuid}', 'PagesController@imageShortLink')->name('image-short-link');

Route::get('/cart-first/process/social/{uuid}', 'PagesController@socialUrlFirstCart')->name('social-url-first');
Route::get('/cart-secound/process/social/{uuid}', 'PagesController@socialUrlSecondCart')->name('social-url-secound');


