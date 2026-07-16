@extends('layouts.admin')

@section('title', 'Transaksi Parkir - PinkPark')
@section('header', 'Daftar Transaksi Parkir')

@section('content')
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-header bg-white border-0 pt-4 pb-3 px-4 d-flex justify-content-between align-items-center">
            <h5 class="fw-bold mb-0 text-dark">Data Transaksi</h5>

            <a href="{{ route('transaksi-parkir.create') }}" class="btn text-white fw-medium px-3 py-2 rounded-pill shadow-sm"
                style="background-color:#d81b60;">
                <i class="fa-solid fa-plus me-2"></i>
                Tambah Transaksi
            </a>
        </div>

        <div class="card-body px-4">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <i class="fa-solid fa-circle-check me-2"></i>
                    {{ session('success') }}

                    <button class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="table-responsive">

                <table class="table table-hover align-middle border">

                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Member</th>
                            <th>No Polisi</th>
                            <th>Jenis Kendaraan</th>
                            <th>Masuk</th>
                            <th>Keluar</th>
                            <th>Tarif</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($transaksis as $transaksi)
                            <tr>

                                <td>
                                    {{ $loop->iteration + $transaksis->firstItem() - 1 }}
                                </td>

                                <td>
                                    <span class="badge bg-secondary">
                                        {{ $transaksi->kode_transaksi }}
                                    </span>
                                </td>

                                <td>
                                    {{ $transaksi->member->nama ?? '-' }}
                                </td>

                                <td>
                                    {{ $transaksi->nomor_polisi }}
                                </td>

                                <td>
                                    {{ $transaksi->jenis_kendaraan }}
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($transaksi->waktu_masuk)->format('d/m/Y H:i') }}
                                </td>

                                <td>
                                    @if ($transaksi->waktu_keluar)
                                        {{ \Carbon\Carbon::parse($transaksi->waktu_keluar)->format('d/m/Y H:i') }}
                                    @else
                                        -
                                    @endif
                                </td>

                                <td>
                                    Rp {{ number_format($transaksi->tarif, 0, ',', '.') }}
                                </td>

                                <td>

                                    @if ($transaksi->status == 'Masuk')
                                        <span class="badge bg-warning text-dark">
                                            Masuk
                                        </span>
                                    @else
                                        <span class="badge bg-success">
                                            Keluar
                                        </span>
                                    @endif

                                </td>

                                <td>

                                    <div class="d-flex justify-content-center gap-2">

                                        <a href="{{ route('transaksi-parkir.show', $transaksi->id) }}"
                                            class="btn btn-info btn-sm text-white" title="Lihat">

                                            <i class="fa-solid fa-eye"></i>

                                        </a>

                                        <a href="{{ route('transaksi-parkir.edit', $transaksi->id) }}"
                                            class="btn btn-warning btn-sm" title="Edit">

                                            <i class="fa-solid fa-pen"></i>

                                        </a>

                                        <form action="{{ route('transaksi-parkir.destroy', $transaksi->id) }}"
                                            method="POST" class="d-inline form-delete">

                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger btn-sm" type="submit">

                                                <i class="fa-solid fa-trash"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="10" class="text-center py-4">

                                    Belum ada data transaksi parkir.

                                </td>

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
