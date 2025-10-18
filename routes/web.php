<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderFeedbackController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HistoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return redirect('/menu');
});

Route::view('/login', 'auth.login');
Route::view('/register', 'auth.register');
Route::view('/menu', 'menu.index');
Route::get('/profile', [ProfileController::class, 'index']);
Route::get('/profile/edit', [ProfileController::class, 'edit']);
Route::post('/profile/update', [ProfileController::class, 'update']);
Route::get('/history', [HistoryController::class, 'index']);

// Order Completed / Feedback routes
Route::get('/order/completed', [OrderFeedbackController::class, 'show'])->name('order.completed');
Route::post('/order/feedback', [OrderFeedbackController::class, 'submit'])->name('order-feedback.submit');

// Detail Menu Makanan
Route::view('/menu/pecal-ayam', 'menu.detail.pecal-ayam');
Route::view('/menu/mie-goreng', 'menu.detail.mie-goreng');
Route::view('/menu/mie-rebus', 'menu.detail.mie-rebus');
Route::view('/menu/soto', 'menu.detail.soto');
Route::view('/menu/sup-daging-sapi', 'menu.detail.sup-daging-sapi');
Route::view('/menu/risol-sayur', 'menu.detail.risol-sayur');
Route::view('/menu/donat-kentang', 'menu.detail.donat-kentang');
Route::view('/menu/pecal-lele', 'menu.detail.pecal-lele');
Route::view('/menu/nasi-goreng', 'menu.detail.nasi-goreng');
Route::view('/menu/sate-ayam', 'menu.detail.sate-ayam');
Route::view('/menu/gado-gado', 'menu.detail.gado-gado');
Route::view('/menu/nasi-uduk', 'menu.detail.nasi-uduk');

// Detail Menu Minuman
Route::view('/menu/minuman-boba', 'menu.detail.minuman-boba');
Route::view('/menu/minuman-matcha', 'menu.detail.minuman-matcha');
Route::view('/menu/minuman-jus', 'menu.detail.minuman-jus');
Route::view('/menu/air-mineral', 'menu.detail.air-mineral');
Route::view('/menu/kopi', 'menu.detail.kopi');
Route::view('/menu/sop-buah', 'menu.detail.sop-buah');
Route::view('/menu/es-teh-hijau', 'menu.detail.es-teh-hijau');
Route::view('/menu/susu-kedelai', 'menu.detail.susu-kedelai');
Route::view('/menu/es-teh', 'menu.detail.es-teh');
Route::view('/menu/es-durian-asli', 'menu.detail.es-durian-asli');
Route::view('/menu/es-cendol', 'menu.detail.es-cendol');

// Cart routes
Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart/add', [CartController::class, 'addToCart']);
Route::post('/cart/update-quantity', [CartController::class, 'updateQuantity']);
Route::post('/cart/remove-item', [CartController::class, 'removeItem']);
Route::get('/cart/count', [CartController::class, 'getCartCount']);

// Checkout routes
Route::get('/checkout', [CartController::class, 'checkout']);
Route::post('/checkout/process', [CartController::class, 'processCheckout']);
