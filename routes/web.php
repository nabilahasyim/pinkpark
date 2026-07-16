<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard', ['title' => 'Dashboard']);
})->name('dashboard');

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

Route::get('/profil', function () {
    return view('profil.index', ['title' => 'Profil']);
})->name('profil');

Route::get('/logout', function () {
    // Placeholder logout
    return redirect()->route('dashboard')->with('success', 'Berhasil keluar');
})->name('logout');
