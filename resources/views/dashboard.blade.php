@extends('layouts.app')

@section('content')
<div class="row g-4 mb-4">
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card h-100 border-0 shadow-sm" style="border-left: 5px solid var(--primary-color) !important;">
            <div class="card-body p-4 d-flex align-items-center">
                <div class="bg-primary-subtle p-3 rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                    <i class="fas fa-car-side fs-3" style="color: var(--primary-color);"></i>
                </div>
                <div>
                    <p class="text-muted mb-1 fw-semibold">Kendaraan Masuk</p>
                    <h3 class="fw-bold mb-0">125</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card h-100 border-0 shadow-sm" style="border-left: 5px solid #198754 !important;">
            <div class="card-body p-4 d-flex align-items-center">
                <div class="bg-success-subtle p-3 rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                    <i class="fas fa-arrow-right-from-bracket fs-3 text-success"></i>
                </div>
                <div>
                    <p class="text-muted mb-1 fw-semibold">Kendaraan Keluar</p>
                    <h3 class="fw-bold mb-0">98</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card h-100 border-0 shadow-sm" style="border-left: 5px solid #0dcaf0 !important;">
            <div class="card-body p-4 d-flex align-items-center">
                <div class="bg-info-subtle p-3 rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                    <i class="fas fa-parking fs-3 text-info"></i>
                </div>
                <div>
                    <p class="text-muted mb-1 fw-semibold">Slot Tersedia</p>
                    <h3 class="fw-bold mb-0">45</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card h-100 border-0 shadow-sm" style="border-left: 5px solid #ffc107 !important;">
            <div class="card-body p-4 d-flex align-items-center">
                <div class="bg-warning-subtle p-3 rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                    <i class="fas fa-users fs-3 text-warning"></i>
                </div>
                <div>
                    <p class="text-muted mb-1 fw-semibold">Total Anggota</p>
                    <h3 class="fw-bold mb-0">87</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center bg-white py-3">
                <h5 class="mb-0 fw-bold"><i class="fas fa-clock me-2"></i>Aktivitas Terbaru</h5>
                <button class="btn btn-sm btn-primary">Lihat Semua</button>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">No. Polisi</th>
                                <th>Jenis</th>
                                <th>Waktu Masuk</th>
                                <th>Status</th>
                                <th class="pe-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="ps-4 fw-semibold">B 1234 CD</td>
                                <td>Mobil</td>
                                <td>10:30 WIB</td>
                                <td><span class="badge bg-success">Di Dalam</span></td>
                                <td class="pe-4"><button class="btn btn-sm btn-outline-primary"><i class="fas fa-search"></i></button></td>
                            </tr>
                            <tr>
                                <td class="ps-4 fw-semibold">D 5678 EF</td>
                                <td>Motor</td>
                                <td>09:15 WIB</td>
                                <td><span class="badge bg-secondary">Selesai</span></td>
                                <td class="pe-4"><button class="btn btn-sm btn-outline-primary"><i class="fas fa-search"></i></button></td>
                            </tr>
                            <tr>
                                <td class="ps-4 fw-semibold">F 9012 GH</td>
                                <td>Mobil</td>
                                <td>08:45 WIB</td>
                                <td><span class="badge bg-success">Di Dalam</span></td>
                                <td class="pe-4"><button class="btn btn-sm btn-outline-primary"><i class="fas fa-search"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
