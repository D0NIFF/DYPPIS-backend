<?php

use App\Http\Controllers\Api\V1\MediaStorageController;
use App\Http\Controllers\Api\V1\ProductService\PlatformTypeApiController;
use App\Http\Controllers\Api\V1\ProductService\PlatformApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 *  Routes the V1 version
 */
Route::prefix('v1')->group(function () {

    Route::get('/test', function (Request $request) {
        return 'Test route';
    });


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

    //Route::get('/platforms/{id}', [PlatformApiController::class, 'show']);

});
