<?php

use Illuminate\Support\Facades\Route;

Route::prefix('user')->name('user.')->group(function () {
    Route::get('', 'UserController@index')->name('index');
    Route::post('', 'UserController@store')->name('store');
    Route::get('/create', 'UserController@create')->name('create');

    // 退会処理
    Route::post('/confirm', 'UserController@deleteConfirm')->name('delete.confirm');
    Route::get('/delete', 'UserController@delete')->name('delete.complete');
});
