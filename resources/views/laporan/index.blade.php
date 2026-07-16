@extends('layouts.app')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center bg-white py-3">
        <h5 class="mb-0 fw-bold"><i class="fas fa-chart-bar me-2"></i>Data {{ $title }}</h5>
        <button class="btn btn-primary"><i class="fas fa-print me-1"></i> Cetak Laporan</button>
    </div>
    <div class="card-body">
        <div class="alert alert-info border-0 bg-info-subtle text-info-emphasis">
            <i class="fas fa-info-circle me-2"></i> Ini adalah halaman placeholder untuk fitur <strong>{{ $title }}</strong>. Fitur belum tersedia.
        </div>
        
        <div class="text-center py-5 text-muted">
            <i class="fas fa-tools fs-1 mb-3" style="color: var(--secondary-color);"></i>
            <h4>Sedang Dalam Pengembangan</h4>
            <p>Halaman ini disiapkan untuk menampilkan {{ strtolower($title) }} transaksi.</p>
        </div>
    </div>
</div>
@endsection
