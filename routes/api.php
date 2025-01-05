<?php

use App\Http\Controllers\FrontEnd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/categories', [FrontEnd\CategoryController::class, 'index']);
Route::get('/home-categories', [FrontEnd\HomeController::class, 'index']);
