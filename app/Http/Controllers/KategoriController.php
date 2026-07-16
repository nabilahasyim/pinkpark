<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::latest()->paginate(10);
        return view('kategori.index', compact('kategoris'), ['title' => 'Kategori']);
    }

    public function create()
    {
        return view('kategori.create', ['title' => 'Tambah Kategori']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_kategori' => 'required|string|max:50|unique:kategoris,kode_kategori',
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ], [
            'kode_kategori.required' => 'Kode kategori wajib diisi.',
            'kode_kategori.unique' => 'Kode kategori sudah digunakan.',
            'nama_kategori.required' => 'Nama kategori wajib diisi.',
        ]);

        Kategori::create($request->all());

        return redirect()->route('kategori.index')->with('success', 'Data kategori berhasil ditambahkan.');
    }

    public function show(Kategori $kategori)
    {
        return view('kategori.show', compact('kategori'), ['title' => 'Detail Kategori']);
    }

    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'), ['title' => 'Edit Kategori']);
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'kode_kategori' => 'required|string|max:50|unique:kategoris,kode_kategori,' . $kategori->id,
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ], [
            'kode_kategori.required' => 'Kode kategori wajib diisi.',
            'kode_kategori.unique' => 'Kode kategori sudah digunakan.',
            'nama_kategori.required' => 'Nama kategori wajib diisi.',
        ]);

        $kategori->update($request->all());

        return redirect()->route('kategori.index')->with('success', 'Data kategori berhasil diperbarui.');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Data kategori berhasil dihapus.');
    }
}
