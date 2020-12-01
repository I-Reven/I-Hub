<?php

use Illuminate\Support\Facades\Route;
use IRaven\IAdmin\Infra\Http\Controllers\AuthController;
use IRaven\IAdmin\Infra\Http\Controllers\PingController;
use IRaven\IAdmin\Infra\Http\Middleware\CanPing;

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

Route::prefix('i-raven/i-admin/api/')
    ->middleware(CanPing::class)
    ->group(function () {
        Route::prefix('v1/')
            ->group(function () {
                Route::get('ping', [PingController::class, 'ping'])->name('ping');

                Route::prefix('auth/')->group(function () {
                    Route::post('login', [AuthController::class, 'login'])->name('login');
                    Route::post('signup', [AuthController::class, 'signup'])->name('signup');

                    Route::middleware(['auth:api'])->group(function () {
                        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
                        Route::get('user', [AuthController::class, 'user'])->name('user');
                    });
                });
            });
    });
