<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DashboardController::class, 'index'])->name('home');
Route::get('/about', [DashboardController::class, 'about'])->name('aboutUs');

Route::middleware(['auth'])->group(function() {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('updateProfile');
    Route::put('/profile/changePassword', [UserController::class, 'changePassword'])->name('changePassword');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'storePayment'])->name('storeCheckout');
});

Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::put('/admin/orders/update', [OrderController::class, 'update'])->name('admin.orders.update');
    Route::get('/admin/users', [UserAdminController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/getOrder', [OrderController::class, 'getOrder'])->name('admin.getOrder');
    Route::get('/admin', [DashboardAdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/getProvince', [CheckoutController::class, 'getProvince'])->name('getProvince');
    Route::get('/getCity/{id}', [CheckoutController::class, 'getCity'])->name('getCity');
    Route::get('/shipping-cost', [CheckoutController::class, 'getShippingCost'])->name('getShippingCost');
    Route::get('/checkout/payment', [CheckoutController::class, 'payment'])->name('payment');
    Route::get('riwayat-pesanan', [PesananController::class, 'index'])->name('pesanan');
    Route::get('riwayat-pesanan/detail', [PesananController::class, 'detail'])->name('detail-pesanan');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'authenticate']);
    Route::get('/register', [UserController::class, 'renderRegister'])->name('register');
    Route::post('/register', [UserController::class, 'register']);
});
