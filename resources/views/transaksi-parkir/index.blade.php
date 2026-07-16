@extends('layouts.admin')

@section('title', 'Transaksi Parkir - PinkPark')
@section('header', 'Daftar Transaksi Parkir')

@section('content')
<div class="card shadow-sm border-0 rounded-4">
    <div class="card-header bg-white border-0 pt-4 pb-3 px-4 d-flex justify-content-between align-items-center">
        <h5 class="fw-bold mb-0 text-dark">Data Transaksi</h5>
        <a href="{{ route('transaksi.create') }}" class="btn btn-pink text-white fw-medium px-3 py-2 rounded-pill shadow-sm" style="background-color: #d81b60;">
            <i class="fa-solid fa-plus me-2"></i> Tambah Transaksi
        </a>
    </div>
    
    <div class="card-body px-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle border">
                <thead class="table-light text-muted">
                    <tr>
                        <th class="ps-3 fw-medium">No</th>
                        <th class="fw-medium">Kode</th>
                        <th class="fw-medium">Nama Member</th>
                        <th class="fw-medium">Nopol</th>
                        <th class="fw-medium">Kendaraan</th>
                        <th class="fw-medium">Waktu Masuk</th>
                        <th class="fw-medium">Waktu Keluar</th>
                        <th class="fw-medium">Tarif</th>
                        <th class="fw-medium">Status</th>
                        <th class="text-center fw-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transaksis as $transaksi)
                        <tr>
                            <td class="ps-3">{{ $loop->iteration + $transaksis->firstItem() - 1 }}</td>
                            <td><span class="badge bg-light text-dark border">{{ $transaksi->kode_transaksi }}</span></td>
                            <td class="fw-medium text-pink">{{ $transaksi->member->nama ?? '-' }}</td>
                            <td>{{ $transaksi->nomor_polisi }}</td>
                            <td>{{ $transaksi->jenis_kendaraan }}</td>
                            <td>{{ $transaksi->waktu_masuk->format('d/m/Y H:i') }}</td>
                            <td>{{ $transaksi->waktu_keluar ? $transaksi->waktu_keluar->format('d/m/Y H:i') : '-' }}</td>
                            <td>Rp {{ number_format($transaksi->tarif, 0, ',', '.') }}</td>
                            <td>
                                @if($transaksi->status == 'Masuk')
                                    <span class="badge bg-warning text-dark rounded-pill px-3">Masuk</span>
                                @else
                                    <span class="badge bg-success-subtle text-success rounded-pill px-3">Keluar</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="{{ route('transaksi.show', $transaksi->id) }}" class="btn btn-sm btn-info text-white rounded-circle" title="Lihat">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="btn btn-sm btn-warning text-dark rounded-circle" title="Edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger rounded-circle" title="Hapus">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center py-4 text-muted">Data transaksi parkir belum tersedia.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="mt-3">
            {{ $transaksis->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
