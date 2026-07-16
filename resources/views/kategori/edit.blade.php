@extends('layouts.admin')

@section('title', 'Edit Kategori - PinkPark')
@section('header', 'Edit Kategori')

@section('content')
<div class="card shadow-sm border-0 rounded-4">
    <div class="card-header bg-white border-0 pt-4 pb-3 px-4">
        <h5 class="fw-bold mb-0 text-dark">Form Edit Kategori</h5>
    </div>
    
    <div class="card-body px-4 pb-4">
        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="kode_kategori" class="form-label fw-medium">Kode Kategori <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('kode_kategori') is-invalid @enderror" id="kode_kategori" name="kode_kategori" value="{{ old('kode_kategori', $kategori->kode_kategori) }}" required>
                @error('kode_kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nama_kategori" class="form-label fw-medium">Nama Kategori <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required>
                @error('nama_kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="form-label fw-medium">Deskripsi</label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-warning text-dark px-4 rounded-pill">
                    <i class="fa-solid fa-save me-2"></i> Perbarui
                </button>
                <a href="{{ route('kategori.index') }}" class="btn btn-light border px-4 rounded-pill">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
