<?php

use Illuminate\Support\Facades\Route;
use IRaven\Hexagonal\Infra\Http\Controllers\PingController;
use IRaven\Hexagonal\Infra\Http\Middleware\CanPing;

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

Route::prefix('i-raven/hexagonal/api/')
    ->middleware(CanPing::class)
    ->group(function () {
        Route::prefix('v1/')
            ->group(function () {
                Route::get('ping', [PingController::class, 'ping'])->name('ping');
            });
    });
