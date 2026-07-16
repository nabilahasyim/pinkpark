<?php

namespace App\Http\Controllers;

use App\Models\TransaksiParkir;
use App\Models\Member;
use Illuminate\Http\Request;

class TransaksiParkirController extends Controller
{
    public function index()
    {
        $transaksis = TransaksiParkir::with('member')->latest()->paginate(10);
        return view('transaksi-parkir.index', compact('transaksis'), ['title' => 'Transaksi Parkir']);
    }

    public function create()
    {
        $members = Member::all();
        return view('transaksi-parkir.create', compact('members'), ['title' => 'Tambah Transaksi Parkir']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_transaksi' => 'required|string|max:50|unique:transaksi_parkirs,kode_transaksi',
            'member_id' => 'required|exists:members,id',
            'nomor_polisi' => 'required|string|max:20',
            'jenis_kendaraan' => 'required|string|max:100',
            'waktu_masuk' => 'required|date',
            'waktu_keluar' => 'nullable|date|after_or_equal:waktu_masuk',
            'tarif' => 'required|numeric|min:0',
            'status' => 'required|in:Masuk,Keluar',
        ], [
            'kode_transaksi.required' => 'Kode transaksi wajib diisi.',
            'kode_transaksi.unique' => 'Kode transaksi sudah digunakan.',
            'member_id.required' => 'Member wajib dipilih.',
            'member_id.exists' => 'Member tidak valid.',
            'nomor_polisi.required' => 'Nomor polisi wajib diisi.',
            'jenis_kendaraan.required' => 'Jenis kendaraan wajib diisi.',
            'waktu_masuk.required' => 'Waktu masuk wajib diisi.',
            'waktu_keluar.after_or_equal' => 'Waktu keluar harus setelah atau sama dengan waktu masuk.',
            'tarif.required' => 'Tarif wajib diisi.',
            'status.required' => 'Status wajib dipilih.',
        ]);

        TransaksiParkir::create($request->all());

        return redirect()->route('transaksi.index')->with('success', 'Data transaksi parkir berhasil ditambahkan.');
    }

    public function show(TransaksiParkir $transaksi_parkir)
    {
        return view('transaksi-parkir.show', compact('transaksi_parkir'), ['title' => 'Detail Transaksi Parkir']);
    }

    public function edit(TransaksiParkir $transaksi_parkir)
    {
        $members = Member::all();
        return view('transaksi-parkir.edit', compact('transaksi_parkir', 'members'), ['title' => 'Edit Transaksi Parkir']);
    }

    public function update(Request $request, TransaksiParkir $transaksi_parkir)
    {
        $request->validate([
            'kode_transaksi' => 'required|string|max:50|unique:transaksi_parkirs,kode_transaksi,' . $transaksi_parkir->id,
            'member_id' => 'required|exists:members,id',
            'nomor_polisi' => 'required|string|max:20',
            'jenis_kendaraan' => 'required|string|max:100',
            'waktu_masuk' => 'required|date',
            'waktu_keluar' => 'nullable|date|after_or_equal:waktu_masuk',
            'tarif' => 'required|numeric|min:0',
            'status' => 'required|in:Masuk,Keluar',
        ], [
            'kode_transaksi.required' => 'Kode transaksi wajib diisi.',
            'kode_transaksi.unique' => 'Kode transaksi sudah digunakan.',
            'member_id.required' => 'Member wajib dipilih.',
            'member_id.exists' => 'Member tidak valid.',
            'nomor_polisi.required' => 'Nomor polisi wajib diisi.',
            'jenis_kendaraan.required' => 'Jenis kendaraan wajib diisi.',
            'waktu_masuk.required' => 'Waktu masuk wajib diisi.',
            'waktu_keluar.after_or_equal' => 'Waktu keluar harus setelah atau sama dengan waktu masuk.',
            'tarif.required' => 'Tarif wajib diisi.',
            'status.required' => 'Status wajib dipilih.',
        ]);

        $transaksi_parkir->update($request->all());

        return redirect()->route('transaksi.index')->with('success', 'Data transaksi parkir berhasil diperbarui.');
    }

    public function destroy(TransaksiParkir $transaksi_parkir)
    {
        $transaksi_parkir->delete();
        return redirect()->route('transaksi.index')->with('success', 'Data transaksi parkir berhasil dihapus.');
    }
}
