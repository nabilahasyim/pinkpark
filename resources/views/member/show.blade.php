@extends('layouts.admin')

@section('title', 'Detail Member - PinkPark')
@section('header', 'Detail Member')

@section('content')
<div class="card shadow-sm border-0 rounded-4">
    <div class="card-header bg-white border-0 pt-4 pb-3 px-4 d-flex justify-content-between align-items-center">
        <h5 class="fw-bold mb-0 text-dark">Informasi Member</h5>
        <a href="{{ route('member.index') }}" class="btn btn-light border rounded-pill px-3">
            <i class="fa-solid fa-arrow-left me-2"></i> Kembali
        </a>
    </div>
    
    <div class="card-body px-4 pb-4">
        <table class="table table-borderless table-striped align-middle rounded overflow-hidden">
            <tbody>
                <tr>
                    <th width="30%" class="ps-4">Kode Member</th>
                    <td width="70%">: <span class="badge bg-light text-dark border ms-2">{{ $member->kode_member }}</span></td>
                </tr>
                <tr>
                    <th class="ps-4">Nama Lengkap</th>
                    <td>: <span class="ms-2 fw-medium text-pink">{{ $member->nama }}</span></td>
                </tr>
                <tr>
                    <th class="ps-4">Nomor Telepon</th>
                    <td>: <span class="ms-2 fw-medium">{{ $member->nomor_telepon }}</span></td>
                </tr>
                <tr>
                    <th class="ps-4">Alamat</th>
                    <td>: <span class="ms-2">{{ $member->alamat ?: 'Tidak ada alamat terdaftar.' }}</span></td>
                </tr>
                <tr>
                    <th class="ps-4">Jenis Kendaraan</th>
                    <td>: <span class="ms-2 fw-medium">{{ $member->jenis_kendaraan }}</span></td>
                </tr>
                <tr>
                    <th class="ps-4">Nomor Polisi</th>
                    <td>: <span class="badge bg-secondary ms-2">{{ $member->nomor_polisi }}</span></td>
                </tr>
                <tr>
                    <th class="ps-4">Tanggal Daftar</th>
                    <td>: <span class="ms-2">{{ $member->created_at->format('d M Y, H:i') }}</span></td>
                </tr>
            </tbody>
        </table>

        <div class="mt-4 ms-2 d-flex gap-2">
            <a href="{{ route('member.edit', $member->id) }}" class="btn btn-warning text-dark px-4 rounded-pill">
                <i class="fa-solid fa-pen-to-square me-2"></i> Edit
            </a>
            <form action="{{ route('member.destroy', $member->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus member ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger px-4 rounded-pill">
                    <i class="fa-solid fa-trash me-2"></i> Hapus
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
