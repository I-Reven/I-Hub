<?php

use Illuminate\Support\Facades\Route;
use IRaven\IHub\Infra\Http\Controllers\PingController;
use IRaven\IHub\Infra\Http\Middleware\IsPartner;

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

Route::prefix('i-raven/i-hub/api/')
    ->middleware(IsPartner::class)
    ->group(function () {
        Route::prefix('v1/')
            ->group(function () {
                Route::get('ping', [PingController::class, 'ping'])->name('ping');
            });
    });
