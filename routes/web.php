<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Master\UserController as MasterUserController;
use App\Http\Controllers\Admin\ObatController as AdminObatController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\PembelianController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Kasir\ObatController as KasirObatController;
use App\Http\Controllers\Kasir\PenjualanController;
use App\Http\Controllers\Kasir\StrukController;

/*
|--------------------------------------------------------------------------
| Route Utama
|--------------------------------------------------------------------------
*/
Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'authenticate']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Master Routes
|--------------------------------------------------------------------------
*/
Route::prefix('master')
    ->name('master.')
    ->group(function () {
        Route::resource('users', MasterUserController::class);
    });

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('obat', AdminObatController::class);
        // Halaman create obat kasir (terpisah)

        Route::resource('supplier', SupplierController::class);
        Route::resource('pembelian', PembelianController::class);
        Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
    });

/*
|--------------------------------------------------------------------------
| Kasir Routes
|--------------------------------------------------------------------------
*/
Route::prefix('kasir')
    ->name('kasir.')
    ->group(function () {
        // CRUD Obat kasir
        Route::resource('obat', KasirObatController::class);

        // CRUD Penjualan kasir
        Route::resource('penjualan', PenjualanController::class);

        // Cetak struk
        Route::get('struk/{id}', [StrukController::class, 'cetak'])->name('struk.cetak');

        // Halaman static
        Route::view('/dashboard', 'kasir.dashboard')->name('dashboard');
        Route::view('/transaksi', 'kasir.transaksi')->name('transaksi');
        Route::view('/laporan', 'kasir.laporan')->name('laporan');
    });

/*
|--------------------------------------------------------------------------
| Owner Routes
|--------------------------------------------------------------------------
*/
Route::prefix('owner')
    ->name('owner.')
    ->group(function () {
        Route::view('/dashboard', 'owner.dashboard')->name('dashboard');
        Route::view('/laporan', 'owner.laporan')->name('laporan');
        Route::view('/user', 'owner.user')->name('user');
    });
