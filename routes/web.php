<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\KeyboardController;
use App\Http\Controllers\LaptopController;
use App\Http\Controllers\MiceController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\PrinterController;
use App\Http\Controllers\StockageController;
use App\Http\Controllers\TabletteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;


Route::get('/', function () {
    return view('profil');})->name('profile');

Route::post('/profile/laptop',[LaptopController::class, 'store'])->name('laptops.store');

Route::post('/profile/imprimanter',[PrinterController::class , 'store'])->name('imprimante.store');

Route::post('/profile/tablette',[TabletteController::class, 'store'])->name('tablette.store');

Route::post('/profile/ecran',[MonitorController::class, 'store'])->name('ecran.store');

Route::post('/profile/stockage',[StockageController::class, 'store'])->name('stockage.store');

Route::post('/profile/souris',[MiceController::class, 'store'])->name('souris.store');

Route::post('/profile/clavier',[KeyboardController::class, 'store'])->name('clavier.store');




Route::get('/form/{type}', function ($type) {
    if (View::exists("components.forms.form" . $type)) {
        return view("components.forms.form" . $type);
    }
    return "<p class='text-center text-danger'>Formulaire introuvable</p>";
});

Route::get('/per/{type}', function ($type) {
    if (View::exists("components.forms.form" . $type)) {
        return view("components.forms.form" . $type);
    }
    return "<p class='text-center text-danger'>Formulaire introuvable</p>";
});

Route::get('/forms/{type}', [FormController::class, 'getForm']);



