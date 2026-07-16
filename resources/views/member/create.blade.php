@extends('layouts.admin')

@section('title', 'Tambah Member - PinkPark')
@section('header', 'Tambah Member')

@section('content')
<div class="card shadow-sm border-0 rounded-4">
    <div class="card-header bg-white border-0 pt-4 pb-3 px-4">
        <h5 class="fw-bold mb-0 text-dark">Form Tambah Member</h5>
    </div>
    
    <div class="card-body px-4 pb-4">
        <form action="{{ route('member.store') }}" method="POST">
            @csrf
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="kode_member" class="form-label fw-medium">Kode Member <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('kode_member') is-invalid @enderror" id="kode_member" name="kode_member" value="{{ old('kode_member') }}" placeholder="Contoh: MBR-001" required>
                    @error('kode_member')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="nama" class="form-label fw-medium">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Contoh: Budi Santoso" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nomor_telepon" class="form-label fw-medium">Nomor Telepon <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('nomor_telepon') is-invalid @enderror" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon') }}" placeholder="Contoh: 081234567890" required>
                    @error('nomor_telepon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jenis_kendaraan" class="form-label fw-medium">Jenis Kendaraan <span class="text-danger">*</span></label>
                    <select class="form-select @error('jenis_kendaraan') is-invalid @enderror" id="jenis_kendaraan" name="jenis_kendaraan" required>
                        <option value="">-- Pilih Jenis Kendaraan --</option>
                        <option value="Motor" {{ old('jenis_kendaraan') == 'Motor' ? 'selected' : '' }}>Motor</option>
                        <option value="Mobil" {{ old('jenis_kendaraan') == 'Mobil' ? 'selected' : '' }}>Mobil</option>
                    </select>
                    @error('jenis_kendaraan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nomor_polisi" class="form-label fw-medium">Nomor Polisi <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('nomor_polisi') is-invalid @enderror" id="nomor_polisi" name="nomor_polisi" value="{{ old('nomor_polisi') }}" placeholder="Contoh: B 1234 CD" required>
                    @error('nomor_polisi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <label for="alamat" class="form-label fw-medium">Alamat</label>
                <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap (opsional)">{{ old('alamat') }}</textarea>
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-pink text-white px-4 rounded-pill" style="background-color: #d81b60;">
                    <i class="fa-solid fa-save me-2"></i> Simpan
                </button>
                <a href="{{ route('member.index') }}" class="btn btn-light border px-4 rounded-pill">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
