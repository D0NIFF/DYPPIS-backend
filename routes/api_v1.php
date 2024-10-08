<?php

use App\Http\Controllers\Api\V1\ProductService\PlatformApiController;
use App\Http\Controllers\Api\V1\ProductService\PlatformTypeApiController;
use App\Http\Controllers\Api\V1\ProductService\ProductCategoryApiController;
use App\Http\Controllers\Api\V1\ProductService\ProductApiController;
use App\Http\Controllers\Auth\PersonalAccessTokenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    Route::prefix('users')->group(function () {

        /**
         * TEST ROUTE
         */
        Route::get('/', function (Request $request) {
            $users = \App\Models\User::all();
            //$users = \Illuminate\Support\Facades\DB::table('users')->get();
            return response()->json($users);
        })->middleware('auth:sanctum');
    });


    /**
     *  AUTH ROUTES
     */
    Route::prefix('auth')->group(function () {

        Route::post('/login', [PersonalAccessTokenController::class, 'store']);
        Route::post('/personal-access-tokens', [PersonalAccessTokenController::class, 'store']);
    });

    Route::prefix('platform-types')->group(function () {
        Route::get('/{field}', [PlatformTypeApiController::class, 'index']);
    });

    Route::prefix('platforms')->group(function () {

        Route::get('/', [PlatformApiController::class, 'index']);
        Route::get('/{id}', [PlatformApiController::class, 'show']);
        Route::post('/', [PlatformApiController::class, 'store'])
            ->middleware('auth:sanctum');
        Route::put('/{id}', [PlatformApiController::class, 'update'])
            ->middleware('auth:sanctum');
        Route::patch('/{id}', [PlatformApiController::class, 'update'])
            ->middleware('auth:sanctum');
        Route::delete('/{id}', [PlatformApiController::class, 'destroy'])
            ->middleware('auth:sanctum');
    });


    Route::prefix('products')->group(function () {

        Route::get('/', [ProductApiController::class, 'index']);
        Route::get('/{id}', [ProductApiController::class, 'show']);
        Route::post('/', [ProductApiController::class, 'store'])
            ->middleware('auth:sanctum');
        Route::patch('/{product_id}', [ProductApiController::class, 'update'])
            ->middleware('auth:sanctum');
        Route::delete('/{product_id}', [ProductApiController::class, 'destroy'])
            ->middleware('auth:sanctum');
    });

    Route::prefix('categories')->group(function () {

        Route::get('/', [ProductCategoryApiController::class, 'index']);
        Route::get('/{id}', [ProductCategoryApiController::class, 'show']);
        Route::post('/', [ProductCategoryApiController::class, 'store'])
            ->middleware('auth:sanctum');
        Route::put('/{id}', [ProductCategoryApiController::class, 'update'])
            ->middleware('auth:sanctum');
        Route::patch('/{id}', [ProductCategoryApiController::class, 'update'])
            ->middleware('auth:sanctum');
        Route::delete('/{id}', [ProductCategoryApiController::class, 'destroy'])
            ->middleware('auth:sanctum');
    });

});
