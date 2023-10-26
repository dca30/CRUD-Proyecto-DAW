<?php

use App\Http\Controllers\BalanceController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DashboardController;


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

Route::get('/', function () {
    return view('welcome');
});




Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{product}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/member', [MemberController::class, 'index'])->name('member.index');

    Route::get('/balance', [BalanceController::class, 'index'])->name('balance.index');
    Route::get('/balance/create', [BalanceController::class, 'create'])->name('balance.create');
    Route::post('/balance', [BalanceController::class, 'store'])->name('balance.store');
    Route::get('/balance/{balance}/edit', [BalanceController::class, 'edit'])->name('balance.edit');
    Route::put('/balance/{balance}/update', [BalanceController::class, 'update'])->name('balance.update');

    //Route::get('/dashboard', [DashboardController::class, 'index'])->name('balance.index');
});

require __DIR__.'/auth.php';