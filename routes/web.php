<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TarifDayaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\PelangganController;
use App\Http\Controllers\Admin\PembayaranController;
use App\Http\Controllers\Pelanggan\PelangganPembayaranController;
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
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
// Proses simpan pelanggan baru
Route::post('/register', [AuthController::class, 'processRegister'])->name('register.process');

// Dashboard
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'superadmin'])->group(function () {
    Route::resource('tarif-daya', TarifDayaController::class);
});

Route::middleware(['auth', 'superadmin'])->group(function () {
    Route::resource('admin', AdminController::class)->only([
        'index', 'create', 'store', 'edit', 'update', 'destroy'
    ]);
});

Route::middleware(['auth', 'admin'])->prefix('admin/pelanggan')->name('admin.pelanggan.')->group(function () {
    Route::get('/', [PelangganController::class, 'index'])->name('index');
    Route::get('/create', [PelangganController::class, 'create'])->name('create');
    Route::post('/store', [PelangganController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [PelangganController::class, 'edit'])->name('edit');
    Route::put('/{id}', [PelangganController::class, 'update'])->name('update');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::get('pembayaran/{id}', [PembayaranController::class, 'show'])->name('pembayaran.show');
});

Route::middleware(['auth', 'is.pelanggan'])->group(function () {
    Route::get('/pelanggan/riwayat', [PelangganPembayaranController::class, 'index'])->name('admin.pelanggan.pembayaran.index');
});

use App\Http\Controllers\Pelanggan\PelangganTagihanController;

Route::middleware(['auth', 'is.pelanggan'])->prefix('pelanggan')->group(function () {
    Route::get('/tagihan', [PelangganTagihanController::class, 'index'])->name('pelanggan.tagihan');
    Route::get('/tagihan/{id}/bayar', [PelangganTagihanController::class, 'showBayar'])->name('pelanggan.tagihan.showBayar');
    Route::post('/tagihan/{id}/bayar', [PelangganTagihanController::class, 'bayar'])->name('pelanggan.tagihan.bayar');
});
