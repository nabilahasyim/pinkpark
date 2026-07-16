<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Member;
use App\Models\TransaksiParkir;

class DashboardController extends Controller
{
    public function index()
    {
        $kategoriCount = Kategori::count();
        $produkCount = Produk::count();
        $memberCount = Member::count();
        $transaksiCount = TransaksiParkir::count();
        
        $aktivitasTerbaru = TransaksiParkir::with('member')->latest()->take(5)->get();

        return view('dashboard', [
            'title' => 'Dashboard',
            'kategoriCount' => $kategoriCount,
            'produkCount' => $produkCount,
            'memberCount' => $memberCount,
            'transaksiCount' => $transaksiCount,
            'aktivitasTerbaru' => $aktivitasTerbaru
        ]);
    }
}
