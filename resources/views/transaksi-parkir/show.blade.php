@extends('layouts.admin')

@section('title', 'Detail Transaksi - PinkPark')
@section('header', 'Detail Transaksi Parkir')

@section('content')
<div class="card shadow-sm border-0 rounded-4">
    <div class="card-header bg-white border-0 pt-4 pb-3 px-4 d-flex justify-content-between align-items-center">
        <h5 class="fw-bold mb-0 text-dark">Informasi Transaksi</h5>
        <a href="{{ route('transaksi.index') }}" class="btn btn-light border rounded-pill px-3">
            <i class="fa-solid fa-arrow-left me-2"></i> Kembali
        </a>
    </div>
    
    <div class="card-body px-4 pb-4">
        <table class="table table-borderless table-striped align-middle rounded overflow-hidden">
            <tbody>
                <tr>
                    <th width="30%" class="ps-4">Kode Transaksi</th>
                    <td width="70%">: <span class="badge bg-light text-dark border ms-2">{{ $transaksi_parkir->kode_transaksi }}</span></td>
                </tr>
                <tr>
                    <th class="ps-4">Member</th>
                    <td>: <span class="ms-2 fw-medium text-pink">{{ $transaksi_parkir->member->nama ?? '-' }} ({{ $transaksi_parkir->member->kode_member ?? '-' }})</span></td>
                </tr>
                <tr>
                    <th class="ps-4">Nomor Polisi</th>
                    <td>: <span class="ms-2 fw-medium">{{ $transaksi_parkir->nomor_polisi }}</span></td>
                </tr>
                <tr>
                    <th class="ps-4">Jenis Kendaraan</th>
                    <td>: <span class="ms-2 fw-medium">{{ $transaksi_parkir->jenis_kendaraan }}</span></td>
                </tr>
                <tr>
                    <th class="ps-4">Waktu Masuk</th>
                    <td>: <span class="badge bg-secondary ms-2">{{ $transaksi_parkir->waktu_masuk->format('d M Y, H:i') }}</span></td>
                </tr>
                <tr>
                    <th class="ps-4">Waktu Keluar</th>
                    <td>: <span class="badge bg-info text-dark ms-2">{{ $transaksi_parkir->waktu_keluar ? $transaksi_parkir->waktu_keluar->format('d M Y, H:i') : 'Belum Keluar' }}</span></td>
                </tr>
                <tr>
                    <th class="ps-4">Tarif</th>
                    <td>: <span class="ms-2 fw-bold text-success">Rp {{ number_format($transaksi_parkir->tarif, 0, ',', '.') }}</span></td>
                </tr>
                <tr>
                    <th class="ps-4">Status</th>
                    <td>: 
                        <span class="ms-2">
                            @if($transaksi_parkir->status == 'Masuk')
                                <span class="badge bg-warning text-dark">Masuk</span>
                            @else
                                <span class="badge bg-success-subtle text-success border border-success">Keluar</span>
                            @endif
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="mt-4 ms-2 d-flex gap-2">
            <a href="{{ route('transaksi.edit', $transaksi_parkir->id) }}" class="btn btn-warning text-dark px-4 rounded-pill">
                <i class="fa-solid fa-pen-to-square me-2"></i> Edit
            </a>
            <form action="{{ route('transaksi.destroy', $transaksi_parkir->id) }}" method="POST" class="form-delete">
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
