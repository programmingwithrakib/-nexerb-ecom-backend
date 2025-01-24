<?php

use App\Http\Controllers\FrontEnd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/categories', [FrontEnd\CategoryController::class, 'index']);
Route::get('/home-categories', [FrontEnd\HomeController::class, 'index']);
Route::get('/home-sliders', [FrontEnd\HomeController::class, 'home_sliders']);
Route::get('/search-suggestion', [FrontEnd\SearchController::class, 'search_suggestion']);
Route::get('/search-suggestion/{text}', [FrontEnd\SearchController::class, 'search_suggestion_product']);
Route::get('products', [FrontEnd\ProductController::class, 'get_products'])->name('products');
Route::get('product/{slug}', [FrontEnd\ProductController::class, 'product_details']);
Route::get('product/{slug}/variant', [FrontEnd\ProductController::class, 'get_variant_product']);
