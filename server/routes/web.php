<?php

use Illuminate\Support\Facades\Route;

Route::prefix('user')->name('user.')->group(function () {
    Route::get('', 'UserController@index')->name('index');
    Route::get('/create', 'UserController@create')->name('create');
    Route::post('', 'UserController@store')->name('store');
});
