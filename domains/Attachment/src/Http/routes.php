<?php

Route::post('/destroy_image', 'AttachmentController@destroyImages')->name('destroy_image')->middleware('auth:api');
Route::post('/attach_image', 'AttachmentController@AttachImage')->name('attach_image')->middleware('auth:api');
