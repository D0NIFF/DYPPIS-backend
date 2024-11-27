<?php

use App\Http\Controllers\Api\V1\MediaStorageController;
use App\Http\Controllers\Api\V1\ProductService\PlatformTypeApiController;
use App\Http\Controllers\Api\V1\ProductService\PlatformApiController;
use App\Http\Controllers\Api\V1\ProductService\ProductCategoryApiController;
use App\Http\Controllers\Api\V1\UserService\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\PersonalAccessTokenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 *  Routes the V1 version
 */
Route::prefix('v1')->group(function () {

    Route::get('/test', function (Request $request) {
        return \App\Utils\UuidHelper::generateUuid();
    });

    /**
     *  Authorization
     */
    Route::prefix('auth')->group(function () {
        Route::post('/signin', [AuthController::class, 'authorization']);
        Route::post('/signup', [AuthController::class, 'registration']);
        Route::post('/signout', [AuthController::class, 'logout'])
            ->middleware('auth:sanctum');
    });

    /**
     *  Users
     */
    Route::get('/users/{id}', [UserController::class, 'show']);

    /**
     *  Media storage
     */
    Route::prefix('media-storage')->group(function () {
        Route::get('/{id}', [MediaStorageController::class, 'show']);
        Route::post('/', [MediaStorageController::class, 'store']);
        Route::delete('/{id}', [MediaStorageController::class, 'destroy']);
    });

    /**
     *  Platforms types
     */
    Route::get('/platform-types', [PlatformTypeApiController::class, 'index']);
    Route::get('/platform-types/{id}', [PlatformTypeApiController::class, 'show']);

    /**
     *  Platforms
     */
    Route::get('/platform-types/{id}/platforms', [PlatformApiController::class, 'index']);
    Route::get('/platforms/{id}', [PlatformApiController::class, 'show']);

    /**
     *  Product categories
     */
    Route::get('/platforms/{id}/categories', [ProductCategoryApiController::class, 'index']);
    Route::get('/categories', [ProductCategoryApiController::class, 'index']);

});
