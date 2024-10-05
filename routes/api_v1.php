<?php

use App\Http\Controllers\Api\V1\ProductService\PlatformController;
use App\Http\Controllers\Api\V1\ProductService\ProductCategoryController;
use App\Http\Controllers\Api\V1\ProductService\ProductController;
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

    Route::prefix('platforms')->group(function () {

        Route::get('/', [PlatformController::class, 'index']);
        Route::get('/{id}', [PlatformController::class, 'show']);
        Route::post('/', [PlatformController::class, 'store'])
            ->middleware('auth:sanctum');
        Route::put('/{id}', [PlatformController::class, 'update'])
            ->middleware('auth:sanctum');
        Route::patch('/{id}', [PlatformController::class, 'update'])
            ->middleware('auth:sanctum');
        Route::delete('/{id}', [PlatformController::class, 'destroy'])
            ->middleware('auth:sanctum');
    });


    Route::prefix('products')->group(function () {

        Route::get('/', [ProductController::class, 'index']);
        Route::get('/{id}', [ProductController::class, 'show']);
        Route::post('/', [ProductController::class, 'store'])
            ->middleware('auth:sanctum');
        Route::patch('/{product_id}', [ProductController::class, 'update'])
            ->middleware('auth:sanctum');
        Route::delete('/{product_id}', [ProductController::class, 'destroy'])
            ->middleware('auth:sanctum');
    });

    Route::prefix('categories')->group(function () {

        Route::get('/', [ProductCategoryController::class, 'index']);
        Route::get('/{id}', [ProductCategoryController::class, 'show']);
        Route::post('/', [ProductCategoryController::class, 'store'])
            ->middleware('auth:sanctum');
        Route::put('/{id}', [ProductCategoryController::class, 'update'])
            ->middleware('auth:sanctum');
        Route::patch('/{id}', [ProductCategoryController::class, 'update'])
            ->middleware('auth:sanctum');
        Route::delete('/{id}', [ProductCategoryController::class, 'destroy'])
            ->middleware('auth:sanctum');
    });

});
