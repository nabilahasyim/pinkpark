@extends('layouts.admin')

@section('title', 'Detail Kategori - PinkPark')
@section('header', 'Detail Kategori')

@section('content')
<div class="card shadow-sm border-0 rounded-4">
    <div class="card-header bg-white border-0 pt-4 pb-3 px-4 d-flex justify-content-between align-items-center">
        <h5 class="fw-bold mb-0 text-dark">Informasi Kategori</h5>
        <a href="{{ route('kategori.index') }}" class="btn btn-light border rounded-pill px-3">
            <i class="fa-solid fa-arrow-left me-2"></i> Kembali
        </a>
    </div>
    
    <div class="card-body px-4 pb-4">
        <table class="table table-borderless table-striped align-middle rounded overflow-hidden">
            <tbody>
                <tr>
                    <th width="30%" class="ps-4">Kode Kategori</th>
                    <td width="70%">: <span class="badge bg-light text-dark border ms-2">{{ $kategori->kode_kategori }}</span></td>
                </tr>
                <tr>
                    <th class="ps-4">Nama Kategori</th>
                    <td>: <span class="ms-2 fw-medium">{{ $kategori->nama_kategori }}</span></td>
                </tr>
                <tr>
                    <th class="ps-4">Deskripsi</th>
                    <td>: <span class="ms-2 text-muted">{{ $kategori->deskripsi ?: 'Tidak ada deskripsi.' }}</span></td>
                </tr>
                <tr>
                    <th class="ps-4">Dibuat Pada</th>
                    <td>: <span class="ms-2">{{ $kategori->created_at->format('d M Y, H:i') }}</span></td>
                </tr>
                <tr>
                    <th class="ps-4">Diperbarui Pada</th>
                    <td>: <span class="ms-2">{{ $kategori->updated_at->format('d M Y, H:i') }}</span></td>
                </tr>
            </tbody>
        </table>

        <div class="mt-4 ms-2 d-flex gap-2">
            <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-warning text-dark px-4 rounded-pill">
                <i class="fa-solid fa-pen-to-square me-2"></i> Edit
            </a>
            <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" class="form-delete">
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
