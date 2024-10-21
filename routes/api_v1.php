<?php

use App\Http\Controllers\Api\V1\MediaStorageApiController;
use App\Http\Controllers\Api\V1\ProductService\PlatformApiController;
use App\Http\Controllers\Api\V1\ProductService\PlatformTypeApiController;
use App\Http\Controllers\Api\V1\ProductService\ProductApiController;
use App\Http\Controllers\Api\V1\ProductService\ProductCategoryApiController;
use App\Http\Controllers\Api\V1\UserService\UserApiController;
use App\Http\Controllers\Auth\PersonalAccessTokenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {


    /**
     *  USER Restful operations
     */
    Route::prefix('users')->group(function () {

        Route::get('/', [UserApiController::class, 'index']);
        Route::get('/{id}', [UserApiController::class, 'index']);
        Route::post('/', [UserApiController::class, 'store']);
        Route::put('/{id}', [UserApiController::class, 'update']);
        Route::patch('/{id}', [UserApiController::class, 'update']);
        Route::delete('/{id}', [UserApiController::class, 'destroy']);
    });

    /**
     * TEST ROUTE
     */
    Route::get('/test', function (Request $request) {
        return Auth::user();
    })->middleware('auth:sanctum');


    /**
     *  AUTH routes
     */
    Route::prefix('auth')->group(function () {

        Route::post('/authorization', [PersonalAccessTokenController::class, 'store']);

        Route::post('/personal-access-tokens', [PersonalAccessTokenController::class, 'store']);
        Route::delete('/personal-access-tokens', [PersonalAccessTokenController::class, 'destroy'])
            ->middleware('auth:sanctum');
    });

    /**
     *  Platform type routes
     */
    Route::prefix('platform-types')->group(function () {
        Route::get('/{field}', [PlatformTypeApiController::class, 'index']);
        Route::get('/', [PlatformTypeApiController::class, 'index']);
    });


    /**
     *  Media-Storage restful operations
     */
    Route::prefix('media-storage')->group(function () {

        Route::get('/', [MediaStorageApiController::class, 'index']);
        Route::post('/', [MediaStorageApiController::class, 'store'])
            ->middleware('auth:sanctum');
        Route::put('/', [MediaStorageApiController::class, 'update']);
        Route::patch('/', [MediaStorageApiController::class, 'update']);
        Route::delete('/', [MediaStorageApiController::class, 'destroy']);
    });

    /**
     *  Platforms restful operations
     */
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


    /**
     *  Categories restful operations
     */
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


    /**
     *  Products restful operations
     */
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



});
