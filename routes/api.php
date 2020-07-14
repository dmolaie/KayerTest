<?php
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'group', 'name' => '.group.'],
    function () {
        Route::post('/create', 'GroupController@create')->name('create');
    });

Route::group(['prefix' => 'product', 'name' => '.product.'],
    function () {
        Route::post('/create', 'ProductController@create')->name('create');
    });

Route::group(['prefix' => 'cart', 'name' => '.cart.'],
    function () {
        Route::post('/list', 'CartController@listCart')->name('list');
    });

Route::group(['prefix' => 'invoice', 'name' => '.invoice.'],
    function () {
        Route::post('/create', 'InvoiceController@create')->name('create');
    });