<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| All routes here are prefixed with /api
|
*/

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{id}', [ProductController::class, 'show']);
    Route::post('/', [ProductController::class, 'store']);
    Route::put('/{id}', [ProductController::class, 'update']);
    Route::delete('/{id}', [ProductController::class, 'destroy']);
});

Route::prefix('categories')->group(function () {
    Route::get('/', [ProductController::class, 'categories']);
    Route::post('/', [ProductController::class, 'storeCategory']);
});
