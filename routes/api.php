<?php

use App\Http\Controllers\Api as Controllers;

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
Route::middleware('client')->namespace('Api')->group(function () {

    Route::resource('properties', 'PropertyController', [
        'only' => ['index', 'show', 'store']
    ]);
});
