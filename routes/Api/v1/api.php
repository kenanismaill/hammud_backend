<?php

use App\Http\Controllers\Api\v1\Auth\LoginController;
use App\Http\Controllers\Api\v1\Category\CategoryController;
use App\Http\Controllers\Api\v1\Product\ProductController;
use Illuminate\Http\Request;
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

Route::name('auth.')->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::post('login', [LoginController::class, 'login'])->name('login');
    });
    Route::middleware(['auth:api'])->group(function () {
        Route::apiResource('category', CategoryController::class);
        Route::apiResource('product', ProductController::class);
    });
});
