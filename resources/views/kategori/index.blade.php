@extends('layouts.admin')

@section('title', 'Kategori - PinkPark')
@section('header', 'Daftar Kategori')

@section('content')
<div class="card shadow-sm border-0 rounded-4">
    <div class="card-header bg-white border-0 pt-4 pb-3 px-4 d-flex justify-content-between align-items-center">
        <h5 class="fw-bold mb-0 text-dark">Data Kategori</h5>
        <a href="{{ route('kategori.create') }}" class="btn btn-pink text-white fw-medium px-3 py-2 rounded-pill shadow-sm" style="background-color: #d81b60;">
            <i class="fa-solid fa-plus me-2"></i> Tambah Kategori
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
                        <th class="fw-medium">Kode Kategori</th>
                        <th class="fw-medium">Nama Kategori</th>
                        <th class="fw-medium">Deskripsi</th>
                        <th class="text-center fw-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kategoris as $kategori)
                        <tr>
                            <td class="ps-3">{{ $loop->iteration + $kategoris->firstItem() - 1 }}</td>
                            <td><span class="badge bg-light text-dark border">{{ $kategori->kode_kategori }}</span></td>
                            <td class="fw-medium">{{ $kategori->nama_kategori }}</td>
                            <td class="text-muted text-truncate" style="max-width: 200px;">{{ $kategori->deskripsi ?: '-' }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('kategori.show', $kategori->id) }}" class="btn btn-sm btn-info text-white rounded-pill px-3">
                                        <i class="fa-solid fa-eye"></i> Lihat
                                    </a>
                                    <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-sm btn-warning text-dark rounded-pill px-3">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </a>
                                    <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger rounded-pill px-3">
                                            <i class="fa-solid fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">Data kategori belum tersedia.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="mt-3">
            {{ $kategoris->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
