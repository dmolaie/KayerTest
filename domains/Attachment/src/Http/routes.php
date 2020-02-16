<?php


Route::prefix('attachment')->name('attachment.')->group(function() {
    Route::post('/upload_image', 'AttachmentController@uploadImages')->name('upload_images')->middleware('auth:api');
});