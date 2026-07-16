@extends('layouts.admin')

@section('title', 'Dashboard - PinkPark')
@section('header', 'Dashboard PinkPark')

@section('content')
<div class="container-fluid p-0">

    <div class="alert alert-success bg-white shadow-sm border-0 border-start border-5 mb-4 d-flex align-items-center" role="alert" style="border-left-color: #d81b60 !important; border-radius: 8px;">
        <div class="me-3 fs-3">👋</div>
        <div>
            <h5 class="alert-heading text-dark fw-bold mb-1">Selamat Datang</h5>
            <p class="mb-0 text-muted">Halo, <strong>{{ Auth::user()->name ?? 'User' }}</strong>. Selamat datang di <strong>PinkPark Management System</strong>.</p>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0 h-100" style="border-radius: 12px; transition: transform 0.2s;">
                <div class="card-body d-flex flex-column justify-content-center align-items-center p-4">
                    <div class="rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; background-color: rgba(216, 27, 96, 0.1);">
                        <i class="fa-solid fa-list fs-3 text-pink"></i>
                    </div>
                    <h6 class="text-muted fw-bold mb-1 text-uppercase" style="letter-spacing: 0.5px; font-size: 0.8rem;">Kategori</h6>
                    <h2 class="fw-bold mb-0 text-dark">12</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0 h-100" style="border-radius: 12px; transition: transform 0.2s;">
                <div class="card-body d-flex flex-column justify-content-center align-items-center p-4">
                    <div class="rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; background-color: rgba(216, 27, 96, 0.1);">
                        <i class="fa-solid fa-box fs-3 text-pink"></i>
                    </div>
                    <h6 class="text-muted fw-bold mb-1 text-uppercase" style="letter-spacing: 0.5px; font-size: 0.8rem;">Produk</h6>
                    <h2 class="fw-bold mb-0 text-dark">45</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0 h-100" style="border-radius: 12px; transition: transform 0.2s;">
                <div class="card-body d-flex flex-column justify-content-center align-items-center p-4">
                    <div class="rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; background-color: rgba(216, 27, 96, 0.1);">
                        <i class="fa-solid fa-users fs-3 text-pink"></i>
                    </div>
                    <h6 class="text-muted fw-bold mb-1 text-uppercase" style="letter-spacing: 0.5px; font-size: 0.8rem;">Member</h6>
                    <h2 class="fw-bold mb-0 text-dark">150</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0 h-100" style="border-radius: 12px; transition: transform 0.2s;">
                <div class="card-body d-flex flex-column justify-content-center align-items-center p-4">
                    <div class="rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; background-color: rgba(216, 27, 96, 0.1);">
                        <i class="fa-solid fa-receipt fs-3 text-pink"></i>
                    </div>
                    <h6 class="text-muted fw-bold mb-1 text-uppercase" style="letter-spacing: 0.5px; font-size: 0.8rem;">Transaksi Parkir</h6>
                    <h2 class="fw-bold mb-0 text-dark">320</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0" style="border-radius: 12px;">
        <div class="card-header bg-white border-0 pt-4 pb-3 px-4 d-flex justify-content-between align-items-center">
            <h5 class="fw-bold mb-0 text-dark">Aktivitas Terbaru</h5>
            <button class="btn btn-sm btn-outline-secondary rounded-pill px-3">Lihat Semua</button>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" style="font-size: 0.95rem;">
                    <thead class="table-light text-muted">
                        <tr>
                            <th class="ps-4 fw-medium border-0">ID Transaksi</th>
                            <th class="fw-medium border-0">Aktivitas</th>
                            <th class="fw-medium border-0">Tanggal</th>
                            <th class="pe-4 fw-medium border-0 text-end">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="ps-4 text-pink fw-semibold">#TRX-001</td>
                            <td><i class="fa-solid fa-arrow-right-to-bracket text-success me-2"></i> Mobil B 1234 CD Masuk</td>
                            <td class="text-muted">{{ now()->format('d M Y, H:i') }}</td>
                            <td class="pe-4 text-end"><span class="badge bg-success-subtle text-success rounded-pill px-3">Selesai</span></td>
                        </tr>
                        <tr>
                            <td class="ps-4 text-pink fw-semibold">#TRX-002</td>
                            <td><i class="fa-solid fa-arrow-right-from-bracket text-danger me-2"></i> Motor D 5678 EF Keluar</td>
                            <td class="text-muted">{{ now()->subMinutes(15)->format('d M Y, H:i') }}</td>
                            <td class="pe-4 text-end"><span class="badge bg-success-subtle text-success rounded-pill px-3">Selesai</span></td>
                        </tr>
                        <tr>
                            <td class="ps-4 text-pink fw-semibold">#MEM-010</td>
                            <td><i class="fa-solid fa-user-plus text-primary me-2"></i> Member Baru: Budi Santoso</td>
                            <td class="text-muted">{{ now()->subHours(2)->format('d M Y, H:i') }}</td>
                            <td class="pe-4 text-end"><span class="badge bg-primary-subtle text-primary rounded-pill px-3">Baru</span></td>
                        </tr>
                        <tr>
                            <td class="ps-4 text-pink fw-semibold">#PROD-05</td>
                            <td><i class="fa-solid fa-boxes-stacked text-info me-2"></i> Update Stok Produk: Kopi Hitam</td>
                            <td class="text-muted">{{ now()->subDays(1)->format('d M Y, H:i') }}</td>
                            <td class="pe-4 text-end"><span class="badge bg-info-subtle text-info rounded-pill px-3">Update</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    /* Card Hover Effect */
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
    }
</style>
@endsection
