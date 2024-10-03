<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::prefix('v1')->group(function () {

    Route::get('/', function (Request $request) {
        return response()->json(\App\Models\User::all());
    });
});
