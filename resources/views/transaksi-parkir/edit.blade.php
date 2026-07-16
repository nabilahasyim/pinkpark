@extends('layouts.admin')

@section('title', 'Edit Transaksi - PinkPark')
@section('header', 'Edit Transaksi Parkir')

@section('content')
<div class="card shadow-sm border-0 rounded-4">
    <div class="card-header bg-white border-0 pt-4 pb-3 px-4">
        <h5 class="fw-bold mb-0 text-dark">Form Edit Transaksi</h5>
    </div>
    
    <div class="card-body px-4 pb-4">
        <form action="{{ route('transaksi.update', $transaksi_parkir->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="kode_transaksi" class="form-label fw-medium">Kode Transaksi <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('kode_transaksi') is-invalid @enderror" id="kode_transaksi" name="kode_transaksi" value="{{ old('kode_transaksi', $transaksi_parkir->kode_transaksi) }}" required readonly>
                    @error('kode_transaksi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="member_id" class="form-label fw-medium">Pilih Member <span class="text-danger">*</span></label>
                    <select class="form-select @error('member_id') is-invalid @enderror" id="member_id" name="member_id" required>
                        <option value="">-- Pilih Member --</option>
                        @foreach($members as $member)
                            <option value="{{ $member->id }}" data-nopol="{{ $member->nomor_polisi }}" data-jenis="{{ $member->jenis_kendaraan }}" {{ old('member_id', $transaksi_parkir->member_id) == $member->id ? 'selected' : '' }}>
                                {{ $member->kode_member }} - {{ $member->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('member_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nomor_polisi" class="form-label fw-medium">Nomor Polisi <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('nomor_polisi') is-invalid @enderror" id="nomor_polisi" name="nomor_polisi" value="{{ old('nomor_polisi', $transaksi_parkir->nomor_polisi) }}" required readonly>
                    @error('nomor_polisi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jenis_kendaraan" class="form-label fw-medium">Jenis Kendaraan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('jenis_kendaraan') is-invalid @enderror" id="jenis_kendaraan" name="jenis_kendaraan" value="{{ old('jenis_kendaraan', $transaksi_parkir->jenis_kendaraan) }}" required readonly>
                    @error('jenis_kendaraan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="waktu_masuk" class="form-label fw-medium">Waktu Masuk <span class="text-danger">*</span></label>
                    <input type="datetime-local" class="form-control @error('waktu_masuk') is-invalid @enderror" id="waktu_masuk" name="waktu_masuk" value="{{ old('waktu_masuk', $transaksi_parkir->waktu_masuk->format('Y-m-d\TH:i')) }}" required>
                    @error('waktu_masuk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="waktu_keluar" class="form-label fw-medium">Waktu Keluar</label>
                    <input type="datetime-local" class="form-control @error('waktu_keluar') is-invalid @enderror" id="waktu_keluar" name="waktu_keluar" value="{{ old('waktu_keluar', $transaksi_parkir->waktu_keluar ? $transaksi_parkir->waktu_keluar->format('Y-m-d\TH:i') : '') }}">
                    @error('waktu_keluar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="tarif" class="form-label fw-medium">Tarif Total (Rp) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('tarif') is-invalid @enderror" id="tarif" name="tarif" value="{{ old('tarif', intval($transaksi_parkir->tarif)) }}" required min="0">
                    @error('tarif')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="status" class="form-label fw-medium">Status <span class="text-danger">*</span></label>
                    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                        <option value="Masuk" {{ old('status', $transaksi_parkir->status) == 'Masuk' ? 'selected' : '' }}>Masuk</option>
                        <option value="Keluar" {{ old('status', $transaksi_parkir->status) == 'Keluar' ? 'selected' : '' }}>Keluar</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-flex gap-2 mt-2">
                <button type="submit" class="btn btn-warning text-dark px-4 rounded-pill">
                    <i class="fa-solid fa-save me-2"></i> Perbarui
                </button>
                <a href="{{ route('transaksi.index') }}" class="btn btn-light border px-4 rounded-pill">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const memberSelect = document.getElementById('member_id');
        const nopolInput = document.getElementById('nomor_polisi');
        const jenisInput = document.getElementById('jenis_kendaraan');

        memberSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            if(selectedOption.value) {
                nopolInput.value = selectedOption.getAttribute('data-nopol');
                jenisInput.value = selectedOption.getAttribute('data-jenis');
            } else {
                nopolInput.value = '';
                jenisInput.value = '';
            }
        });
        
        // Let's not auto-trigger on edit unless it's changed by user, because we already loaded the DB values
    });
</script>
@endsection
