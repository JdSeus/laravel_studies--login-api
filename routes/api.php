<?php

use App\Http\Controllers\AutenticadorControlador;
use App\Http\Controllers\ProdutosControlador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->group(function() {
    Route::post('registro', [AutenticadorControlador::class, 'registro']);
    Route::post('login', [AutenticadorControlador::class, 'login']);

    Route::middleware('auth:api')->group(function() {
        Route::post('logout', [AutenticadorControlador::class, 'logout']);
    });
});

Route::get('produtos', [ProdutosControlador::class, 'index'])
    ->middleware('auth:api');