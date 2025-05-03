<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiTokenController;
use App\Http\Controllers\CarController;

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/api/tokens/create', [ApiTokenController::class, 'createToken']);
    Route::get('/api/user', function (Request $request) {
        return $request->user();
    });
    Route::apiResource('/cars', CarController::class);
});
