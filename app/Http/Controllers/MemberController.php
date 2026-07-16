<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::latest()->paginate(10);
        return view('member.index', compact('members'), ['title' => 'Member']);
    }

    public function create()
    {
        return view('member.create', ['title' => 'Tambah Member']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_member' => 'required|string|max:50|unique:members,kode_member',
            'nama' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'alamat' => 'nullable|string',
            'jenis_kendaraan' => 'required|string|max:100',
            'nomor_polisi' => 'required|string|max:20',
        ], [
            'kode_member.required' => 'Kode member wajib diisi.',
            'kode_member.unique' => 'Kode member sudah digunakan.',
            'nama.required' => 'Nama wajib diisi.',
            'nomor_telepon.required' => 'Nomor telepon wajib diisi.',
            'jenis_kendaraan.required' => 'Jenis kendaraan wajib diisi.',
            'nomor_polisi.required' => 'Nomor polisi wajib diisi.',
        ]);

        Member::create($request->all());

        return redirect()->route('member.index')->with('success', 'Data member berhasil ditambahkan.');
    }

    public function show(Member $member)
    {
        return view('member.show', compact('member'), ['title' => 'Detail Member']);
    }

    public function edit(Member $member)
    {
        return view('member.edit', compact('member'), ['title' => 'Edit Member']);
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            'kode_member' => 'required|string|max:50|unique:members,kode_member,' . $member->id,
            'nama' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'alamat' => 'nullable|string',
            'jenis_kendaraan' => 'required|string|max:100',
            'nomor_polisi' => 'required|string|max:20',
        ], [
            'kode_member.required' => 'Kode member wajib diisi.',
            'kode_member.unique' => 'Kode member sudah digunakan.',
            'nama.required' => 'Nama wajib diisi.',
            'nomor_telepon.required' => 'Nomor telepon wajib diisi.',
            'jenis_kendaraan.required' => 'Jenis kendaraan wajib diisi.',
            'nomor_polisi.required' => 'Nomor polisi wajib diisi.',
        ]);

        $member->update($request->all());

        return redirect()->route('member.index')->with('success', 'Data member berhasil diperbarui.');
    }

    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('member.index')->with('success', 'Data member berhasil dihapus.');
    }
}
