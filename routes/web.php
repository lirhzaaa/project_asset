<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\StatusAssetController;
use App\Http\Controllers\PeminjamanAssetController;
use App\Http\Controllers\MasterLokasiController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\RedirectIfNotAuthenticated;

// Rute buat halaman login nih
Route::get('/', function () {
    return view('login');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');

// Rute buat proses login (memanggil loginAuth, bukan authenticate) nih
Route::post('/login', [LoginController::class, 'loginAuth'])->name('login.auth');

// Rute buat dashboard setelah login nih
Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard')->middleware(RedirectIfNotAuthenticated::class);

// Rute buat Master Asset
Route::get('/master-asset', [AssetController::class, 'index'])->name('master_asset')->middleware(RedirectIfNotAuthenticated::class);
Route::get('/asset/create', [AssetController::class, 'create'])->name('asset.create')->middleware(RedirectIfNotAuthenticated::class);
Route::post('/asset', [AssetController::class, 'store'])->name('asset.store')->middleware(RedirectIfNotAuthenticated::class);
Route::get('/asset/{id}', [AssetController::class, 'show'])->name('asset.show')->middleware(RedirectIfNotAuthenticated::class);
Route::get('/asset/{id}/edit', [AssetController::class, 'edit'])->name('asset.edit')->middleware(RedirectIfNotAuthenticated::class);
Route::put('/asset/{id}', [AssetController::class, 'update'])->name('asset.update')->middleware(RedirectIfNotAuthenticated::class);
Route::delete('/asset/{id}', [AssetController::class, 'destroy'])->name('asset.destroy')->middleware(RedirectIfNotAuthenticated::class);

// Rute buat Status Asset nih
Route::get('/status-asset', [StatusAssetController::class, 'index'])->name('status_asset')->middleware(RedirectIfNotAuthenticated::class);

// Rute buat Peminjaman Asset nih
Route::get('/peminjaman-asset', [PeminjamanAssetController::class, 'index'])->name('peminjaman_asset')->middleware(RedirectIfNotAuthenticated::class);

// Rute buat Master Lokasi nih
Route::get('/master-lokasi', [MasterLokasiController::class, 'index'])->name('master_lokasi')->middleware(RedirectIfNotAuthenticated::class);

// Rute buat logout nih
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->middleware('auth')->name('logout');
