@extends('layouts.app')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center bg-white py-3">
        <h5 class="mb-0 fw-bold"><i class="fas fa-list me-2"></i>Data {{ $title }}</h5>
        <button class="btn btn-primary"><i class="fas fa-plus me-1"></i> Tambah Data</button>
    </div>
    <div class="card-body">
        <div class="alert alert-info border-0 bg-info-subtle text-info-emphasis">
            <i class="fas fa-info-circle me-2"></i> Ini adalah halaman placeholder untuk Master Data - <strong>{{ $title }}</strong>. Fitur CRUD belum tersedia.
        </div>
        
        <div class="table-responsive mt-4">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th width="5%" class="text-center">No</th>
                        <th>Kode</th>
                        <th>Nama Jenis</th>
                        <th>Tarif Dasar (Rp)</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1</td>
                        <td>JK-001</td>
                        <td>Mobil</td>
                        <td>5.000</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-warning text-white"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">2</td>
                        <td>JK-002</td>
                        <td>Motor</td>
                        <td>2.000</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-warning text-white"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
