<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TransaksiParkirController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD
    Route::resource('kategori', KategoriController::class);
    Route::resource('produk', ProdukController::class);
    Route::resource('member', MemberController::class);
    Route::resource('transaksi-parkir', TransaksiParkirController::class);

    // Master Data
    Route::prefix('master-data')->name('master-data.')->group(function () {

        Route::view('/jenis-kendaraan', 'master-data.jenis-kendaraan', [
            'title' => 'Jenis Kendaraan'
        ])->name('jenis-kendaraan');

        Route::view('/kendaraan', 'master-data.kendaraan', [
            'title' => 'Kendaraan'
        ])->name('kendaraan');

        Route::view('/anggota', 'master-data.anggota', [
            'title' => 'Anggota'
        ])->name('anggota');

        Route::view('/area-parkir', 'master-data.area-parkir', [
            'title' => 'Area Parkir'
        ])->name('area-parkir');

        Route::view('/slot-parkir', 'master-data.slot-parkir', [
            'title' => 'Slot Parkir'
        ])->name('slot-parkir');
    });

    // Pembayaran
    Route::view('/pembayaran', 'pembayaran.index', [
        'title' => 'Pembayaran'
    ])->name('pembayaran');

    // Laporan
    Route::view('/laporan', 'laporan.index', [
        'title' => 'Laporan'
    ])->name('laporan');

    // Profil
    Route::view('/profil', 'profil.index', [
        'title' => 'Profil'
    ])->name('profil');

});

require __DIR__.'/auth.php';