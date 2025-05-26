<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CakeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;

// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Cake Routes
Route::get('/cakes', [CakeController::class, 'index'])->name('cakes.index');
Route::get('/cakes/{cake}', [CakeController::class, 'show'])->name('cakes.show');

// Authenticated User Routes
Route::middleware('auth')->group(function () {
    // Cart Routes
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{cake}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{cartItem}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove/{cartItem}', [CartController::class, 'remove'])->name('cart.remove');
    
    // Order Routes
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('place.order');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
});

// Admin Routes
Route::middleware(['auth', AdminMiddleware::class])->group(function () {

      Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/admin/cakes', [CakeController::class, 'adminIndex'])->name('admin.cakes.index');
    Route::get('/admin/cakes/create', [CakeController::class, 'create'])->name('admin.cakes.create');
    Route::post('/admin/cakes', [CakeController::class, 'store'])->name('admin.cakes.store');
    Route::get('/admin/cakes/{cake}/edit', [CakeController::class, 'edit'])->name('admin.cakes.edit');
    Route::put('/admin/cakes/{cake}', [CakeController::class, 'update'])->name('admin.cakes.update');
    Route::delete('/admin/cakes/{cake}', [CakeController::class, 'destroy'])->name('admin.cakes.destroy');
    
    Route::get('/admin/orders', [OrderController::class, 'adminIndex'])->name('admin.orders.index');
    Route::get('/admin/orders/{order}', [OrderController::class, 'adminShow'])->name('admin.orders.show');
Route::post('/admin/orders/{order}/update-status', [OrderController::class, 'updateStatus'])->name('admin.orders.update-status');

});