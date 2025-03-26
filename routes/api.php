<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaptopController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\MiceController;
use App\Http\Controllers\KeyboardController;
use App\Http\Controllers\PrinterController;
use App\Http\Controllers\StockageController;
use App\Http\Controllers\TabletteController;



Route::post('/laptops',[ LaptopController::class, 'store']);
Route::post('/monitor', [MonitorController::class, 'store']);
Route::post('/mouse', [MiceController::class, 'store']);
Route::post('/keyboard', [KeyboardController::class, 'store']);
Route::post('/printer', [PrinterController::class, 'store']);
Route::post('/stockage', [StockageController::class, 'store']);
Route::post('/tablette', [TabletteController::class, 'store']);

