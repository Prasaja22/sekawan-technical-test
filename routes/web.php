<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PemakaianHarianController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PenggunaanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\ServisController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', function () {
    return view('dashboard.home.home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/kendaraan',  [KendaraanController::class, 'index']);
    Route::post('/kendaraan', [KendaraanController::class, 'store']);
    Route::put('/kendaraan/{id}', [KendaraanController::class, 'update']);
    Route::delete('/kendaraan/{id}', [KendaraanController::class, 'destroy']);

    Route::get('/pemakaian', [PemakaianHarianController::class, 'index']);
    Route::post('/pemakaian', [PemakaianHarianController::class, 'store']);
    Route::put('/pemakaian/{id}', [PemakaianHarianController::class, 'update']);
    Route::delete('/pemakaian/{id}', [PemakaianHarianController::class, 'destroy']);

    Route::get('/servis', [ServisController::class, 'index']);
    Route::post('/servis',[ServisController::class, 'store']);
    Route::put('/servis/{id}', [ServisController::class, 'update']);
    Route::delete('/servis/{id}', [ServisController::class, 'destroy']);

    Route::get('/riwayat', [RiwayatController::class, 'index']);
    Route::post('/riwayat', [RiwayatController::class, 'store']);
    Route::put('/riwayat/{id}', [RiwayatController::class, 'update']);
    Route::delete('/riwayat/{id}', [RiwayatController::class, 'destroy']);

    Route::get('/entry', [BookingController::class, 'index']);
    Route::post('/entry', [BookingController::class, 'store']);
    Route::put('/entry/{id}', [BookingController::class, 'update']);
    Route::delete('/entry/{id}', [BookingController::class, 'destroy']);

    Route::get('/pemesanan', [PemesananController::class, 'index']);
    Route::put('/pemesanan/{id}', [PemesananController::class, 'update']);


    Route::get('/penggunaan', [PenggunaanController::class, 'index']);
    Route::post('/penggunaan-bbm', [PenggunaanController::class, 'bbmStore']);
    Route::post('/penggunaan-servis', [PenggunaanController::class, 'servisStore']);
    Route::post('/penggunaan-riwayat', [PenggunaanController::class, 'riwayatStore']);

    // Di web.php jika ingin API dapat diakses melalui route biasa
    Route::get('/booking-stats', [HomeController::class, 'getBookingSparklineData']);


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
