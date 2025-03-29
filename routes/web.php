<?php

use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\KeyboardController;
use App\Http\Controllers\LaptopController;
use App\Http\Controllers\MiceController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PrinterController;
use App\Http\Controllers\StockageController;
use App\Http\Controllers\TabletteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;


Route::get('/', function () {
    return view('profil');})->name('profile');



Route::post('/profile/laptop',[LaptopController::class, 'store'])->name('laptops.store');

Route::post('/profile/imprimante',[PrinterController::class , 'store'])->name('imprimante.store');

Route::post('/profile/tablette',[TabletteController::class, 'store'])->name('tablette.store');

Route::post('/profile/ecran',[MonitorController::class, 'store'])->name('ecran.store');

Route::post('/profile/stockage',[StockageController::class, 'store'])->name('stockage.store');

Route::post('/profile/souris',[MiceController::class, 'store'])->name('souris.store');

Route::post('/profile/clavier',[KeyboardController::class, 'store'])->name('clavier.store');



//
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



Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
///
Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::patch('/cart/{cart}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'processPayment'])->name('checkout.process');
});




///////////////////////////////////
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index')->middleware('auth');
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show')->middleware('auth');


// Password Confirmation Routes
Route::get('/password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
Route::post('/password/confirm', [ConfirmPasswordController::class, 'confirm']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
