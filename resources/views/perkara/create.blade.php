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
                        <label class="form-label">Register Perkara</label>
                        <input type="text" name="register_perkara" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Input</label>
                        <input type="date" name="tanggal_input" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Satuan Kerja</label>
                        <input type="text" name="satuan_kerja" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Terpidana</label>
                        <input type="text" name="nama_terpidana" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Barang Bukti</label>
                        <input type="text" name="barang_bukti" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keterangan Barang Bukti</label>
                        <input type="text" name="keterangan_barang_bukti" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status Perkara</label>
                        <input type="text" name="status_perkara" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jenis Perkara</label>
                        <input type="text" name="jenis_perkara" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No Putusan Inkraft</label>
                        <input type="text" name="no_putusan_inkraft" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('perkara.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection

