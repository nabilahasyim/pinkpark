@extends('layouts.admin')

@section('title', 'Member - PinkPark')
@section('header', 'Daftar Member')

@section('content')
<div class="card shadow-sm border-0 rounded-4">
    <div class="card-header bg-white border-0 pt-4 pb-3 px-4 d-flex justify-content-between align-items-center">
        <h5 class="fw-bold mb-0 text-dark">Data Member</h5>
        <a href="{{ route('member.create') }}" class="btn btn-pink text-white fw-medium px-3 py-2 rounded-pill shadow-sm" style="background-color: #d81b60;">
            <i class="fa-solid fa-plus me-2"></i> Tambah Member
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
                        <th class="fw-medium">Kode Member</th>
                        <th class="fw-medium">Nama</th>
                        <th class="fw-medium">Nomor Telepon</th>
                        <th class="fw-medium">Jenis Kendaraan</th>
                        <th class="fw-medium">Nomor Polisi</th>
                        <th class="text-center fw-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($members as $member)
                        <tr>
                            <td class="ps-3">{{ $loop->iteration + $members->firstItem() - 1 }}</td>
                            <td><span class="badge bg-light text-dark border">{{ $member->kode_member }}</span></td>
                            <td class="fw-medium">{{ $member->nama }}</td>
                            <td>{{ $member->nomor_telepon }}</td>
                            <td>{{ $member->jenis_kendaraan }}</td>
                            <td><span class="badge bg-secondary">{{ $member->nomor_polisi }}</span></td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('member.show', $member->id) }}" class="btn btn-sm btn-info text-white rounded-pill px-3">
                                        <i class="fa-solid fa-eye"></i> Lihat
                                    </a>
                                    <a href="{{ route('member.edit', $member->id) }}" class="btn btn-sm btn-warning text-dark rounded-pill px-3">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </a>
                                    <form action="{{ route('member.destroy', $member->id) }}" method="POST" class="d-inline form-delete">
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
                            <td colspan="7" class="text-center py-4 text-muted">Data member belum tersedia.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="mt-3">
            {{ $members->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
