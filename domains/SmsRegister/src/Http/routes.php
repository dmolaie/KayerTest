<?php

Route::post('/check-user-national-code', 'SmsRegisterController@checkUserNationalCode')->name('check-user-national-code');
Route::post('/register-user-with-sms', 'SmsRegisterController@registerUserWithSms')->name('register-user-with-sms');
