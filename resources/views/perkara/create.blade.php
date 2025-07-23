@extends('layout.main') {{-- Pastikan ini adalah layout utama yang kamu pakai --}}
@section('title', 'Perkara')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tambah Perkara</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('perkara.index') }}">Perkara</a></li>
        <li class="breadcrumb-item active">Tambah Perkara</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <i class="fas fa-plus-circle me-1"></i>
            Form Tambah Perkara
        </div>
        <div class="card-body">
            <form action="{{ route('perkara.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nomor_perkara" class="form-label">Register Perkara</label>
                    <input type="text" class="form-control" id="nomor_perkara" name="nomor_perkara" required>
                </div>

                <div class="mb-3">
                    <label for="jenis_perkara" class="form-label">Barang Bukti</label>
                    <input type="text" class="form-control" id="jenis_perkara" name="jenis_perkara" required>
                </div>

                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal Barang Bukti</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                </div>

                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                </div>

                 <div class="mb-3">
                    <label for="keterangan" class="form-label">Satker</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-success"><i class="fas fa-save me-1"></i> Simpan</button>
                <a href="{{ route('perkara.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left me-1"></i> Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
