@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm h-100 text-center py-4">
            <div class="card-body">
                <img src="https://ui-avatars.com/api/?name=Admin+PinkPark&background=FF4F81&color=fff&size=128" alt="Profile" class="rounded-circle mb-3 border border-3 border-primary shadow-sm" style="width: 120px; height: 120px; object-fit: cover;">
                <h5 class="fw-bold mb-1">Admin PinkPark</h5>
                <p class="text-muted mb-3">Administrator</p>
                <button class="btn btn-outline-primary btn-sm rounded-pill px-4">Ganti Foto</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-8 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold"><i class="fas fa-user-edit me-2"></i>Edit {{ $title }}</h5>
            </div>
            <div class="card-body">
                <div class="alert alert-info border-0 bg-info-subtle text-info-emphasis mb-4">
                    <i class="fas fa-info-circle me-2"></i> Ini adalah halaman placeholder untuk pengaturan <strong>{{ $title }}</strong>. Fitur pembaruan belum tersedia.
                </div>
                
                <form>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text" class="form-control" value="Admin PinkPark">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" class="form-control" value="admin@pinkpark.com">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Password Baru</label>
                        <input type="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah">
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Konfirmasi Password Baru</label>
                        <input type="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah">
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-light me-md-2" type="button">Batal</button>
                        <button class="btn btn-primary" type="button"><i class="fas fa-save me-1"></i> Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
