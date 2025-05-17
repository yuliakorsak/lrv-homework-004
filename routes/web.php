<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiTokenController;
use App\Http\Controllers\CarController;
use Laravel\Sanctum\PersonalAccessToken;

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/api/tokens/create', [ApiTokenController::class, 'createToken']);
    Route::get('/api/user', function (Request $request) {
        $token = PersonalAccessToken::findToken($request->bearerToken());
        return $token->tokenable;
    });
    Route::apiResource('/cars', CarController::class);
});
