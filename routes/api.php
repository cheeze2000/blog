<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/posts', [PostController::class, 'get']);

Route::middleware('auth.admin')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/posts', [DashboardController::class, 'getAll']);
        Route::get('/posts/{id}', [DashboardController::class, 'getOne']);
        Route::post('/posts', [DashboardController::class, 'create']);
        Route::patch('/posts', [DashboardController::class, 'edit']);
        Route::delete('/posts', [DashboardController::class, 'delete']);
    });
});
