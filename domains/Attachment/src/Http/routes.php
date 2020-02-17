<?php

Route::post('/destroy_image', 'AttachmentController@destroyImages')->name('destroy_image')->middleware('auth:api');
