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

Route::get('/pending', function () {
    return view('pending');
})->middleware(['auth', 'verified'])->name('pending');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/pengguna/{id}', [UserController::class, 'verifikasi'])->name('pengguna.verifikasi');
    Route::get('/pengguna/filter', [UserController::class], 'filter')->name('pengguna.filter');
    Route::resource('pertanians', PertanianController::class)->names('pertanians');
    Route::resource('tanamans', TanamanController::class);
    Route::resource('pengguna', UserController::class);
});

Route::middleware(['auth', 'ensureUserHasLand', 'role:user|admin'])->group(function () {
    Route::get('/home', [UserHomeController::class, 'index'])->name('user.home');
    Route::resource('penanamans', PenanamanController::class);
    Route::resource('pemeliharaans', PemeliharaanController::class)->names('pemeliharaans');
    Route::resource('pemanenans', PemanenanController::class);
    Route::resource('pengeluarans', PengeluaranController::class);
    Route::resource('laporans', LaporanController::class);
});

require __DIR__ . '/auth.php';
