<?php

use App\Http\Controllers\Auth\PersonalAccessTokenController;
use App\Http\Controllers\Api\V1\ProductService\ProductController;
use App\Models\ProductService\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

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




    Route::prefix('products')->group(function () {

        Route::get('/', [ProductController::class, 'index']);
        Route::get('/ff', function () {
            return new \App\Http\Resources\V1\ProductService\ProductCategoryCollection(\App\Models\ProductService\ProductCategory::all());
        });
        Route::get('/{product_id}', [ProductController::class, 'show']);

        Route::post('/', [ProductController::class, 'store'])
            ->middleware('auth:sanctum');
        Route::patch('/{product_id}', [ProductController::class, 'update'])
            ->middleware('auth:sanctum');
        Route::delete('/{product_id}', [ProductController::class, 'destroy'])
            ->middleware('auth:sanctum');
    });

});
