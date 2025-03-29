<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaptopController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\MiceController;
use App\Http\Controllers\KeyboardController;
use App\Http\Controllers\PrinterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StockageController;
use App\Http\Controllers\TabletteController;
use App\Models\Keyboard;

Route::post('/laptops',[ LaptopController::class, 'store']);
Route::post('/monitor', [MonitorController::class, 'store']);
Route::post('/mouse', [MiceController::class, 'store']);
Route::post('/keyboard', [KeyboardController::class, 'store']);
Route::post('/printer', [PrinterController::class, 'store']);
Route::post('/stockage', [StockageController::class, 'store']);
Route::post('/tablette', [TabletteController::class, 'store']);



Route::get('/products/ORDINATEUR', [LaptopController::class, 'product']);
Route::get('/products/TABLETTE_GRAPHIQUE', [TabletteController::class, 'product']);
Route::get('/products/ECRAN', [MonitorController::class, 'product']);
Route::get('/products/CLAVIER', [KeyboardController::class, 'product']);
Route::get('/products/SOURIS', [MiceController::class, 'product']);
Route::get('/products/stockage', [StockageController::class, 'product']);
Route::get('/products/IMPRIMANTE', [PrinterController::class, 'product']);

//TODAY
Route::get('/api/search', [SearchController::class, 'search']);

Route::get('/ORDINATEUR/{id}', [LaptopController::class, 'show']);
Route::get('/ECRAN/{id}', [MonitorController::class, 'show']);
Route::get('/Stockage}/{id}', [StockageController::class, 'show']);
Route::get('/CLAVIER/{id}', [KeyboardController::class, 'show']);
Route::get('/MOUSE/{id}', [MiceController::class, 'show']);
Route::get('/TABLETTE GRAPHIQUE/{id}', [TabletteController::class, 'show']);
Route::get('/IMPRIMANTE/{id}', [PrinterController::class, 'show']);

// routes/api.php
Route::get('/Details/{type}/{id}', [ProductController::class, 'showDetails']);
