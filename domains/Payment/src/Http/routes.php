<?php

Route::group(['name' => 'payment.'],
    function () {
    Route::post('/donation','PaymentController@donation')->name('donation');
    });



