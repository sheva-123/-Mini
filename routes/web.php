<?php

use App\Http\Controllers\PertanianController;
use App\Http\Controllers\TanamanController;
use App\Http\Controllers\PenanamanController;
use App\Http\Controllers\PemeliharaanController;
use App\Http\Controllers\PemanenanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserHomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('pertanians', PertanianController::class);
    Route::resource('pengguna', UserController::class)->names('pengguna');

    Route::get('/assign-land', [UserController::class, 'tambahlahan'])->name('admin.tambahlahanpetani');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [UserHomeController::class, 'index'])->name('user.home');
    Route::resource('tanamans', TanamanController::class);
    Route::resource('Penanamans', PenanamanController::class);
    Route::resource('pemeliharaans', PemeliharaanController::class);
    Route::resource('pemanenans', PemanenanController::class);
    Route::resource('pengeluarans', PengeluaranController::class);
    Route::resource('laporans', LaporanController::class);
});

require __DIR__ . '/auth.php';
