<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/kategori', KategoriController::class);
    Route::resource('/produk', ProdukController::class);
    Route::resource('/member', MemberController::class);
    Route::get('/transaksi-parkir', [TransaksiController::class, 'index'])->name('transaksi.index');

    // Master Data
    Route::prefix('master-data')->name('master-data.')->group(function () {
        Route::get('/jenis-kendaraan', function () {
            return view('master-data.jenis-kendaraan', ['title' => 'Jenis Kendaraan']);
        })->name('jenis-kendaraan');

        Route::get('/kendaraan', function () {
            return view('master-data.kendaraan', ['title' => 'Kendaraan']);
        })->name('kendaraan');

        Route::get('/anggota', function () {
            return view('master-data.anggota', ['title' => 'Anggota']);
        })->name('anggota');

        Route::get('/area-parkir', function () {
            return view('master-data.area-parkir', ['title' => 'Area Parkir']);
        })->name('area-parkir');

        Route::get('/slot-parkir', function () {
            return view('master-data.slot-parkir', ['title' => 'Slot Parkir']);
        })->name('slot-parkir');
    });

    // Transaksi
    Route::prefix('transaksi')->name('transaksi.')->group(function () {
        Route::get('/masuk', function () {
            return view('transaksi.masuk', ['title' => 'Kendaraan Masuk']);
        })->name('masuk');

        Route::get('/keluar', function () {
            return view('transaksi.keluar', ['title' => 'Kendaraan Keluar']);
        })->name('keluar');
    });

    Route::get('/pembayaran', function () {
        return view('pembayaran.index', ['title' => 'Pembayaran']);
    })->name('pembayaran');

    Route::get('/laporan', function () {
        return view('laporan.index', ['title' => 'Laporan']);
    })->name('laporan');

    // We will still keep the old /profil view for layout purposes, but breeze uses /profile.
    // I'll overwrite Breeze's /profile with our /profil to keep consistency.
    Route::get('/profil', function () {
        return view('profil.index', ['title' => 'Profil']);
    })->name('profil');
});

require __DIR__.'/auth.php';
