@extends('layout.main')
@section('title', 'Edit Perkara')
@section('content')

    <div class="container-fluid px-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Daftar Perkara</h1>
        <ol class="breadcrumb my-3">
            <li class="breadcrumb-item"><a href="{{ route('perkara.index') }}">Perkara</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-edit me-1"></i>
                Form Edit Perkara
            </div>
            <div class="card-body">
                <form action="{{ route('perkara.update', $id->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label>Register Perkara:</label>
                        <input type="text" name="register_perkara"
                            class="form-control @error('register_perkara') is-invalid @enderror"
                            value="{{ old('register_perkara', $id->register_perkara) }}">
                        @error('register_perkara')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>Satuan Kerja:</label>
                        <input type="text" name="satuan_kerja"
                            class="form-control @error('satuan_kerja') is-invalid @enderror"
                            value="{{ old('satuan_kerja', $id->satuan_kerja) }}">
                        @error('satuan_kerja')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>Nama Barang:</label>
                        <input type="text" name="nama_barang"
                            class="form-control @error('nama_barang') is-invalid @enderror"
                            value="{{ old('nama_barang', $id->nama_barang) }}">
                        @error('nama_barang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>Nama Terpidana:</label>
                        <input type="text" name="nama_terpidana"
                            class="form-control @error('nama_terpidana') is-invalid @enderror"
                            value="{{ old('nama_terpidana', $id->nama_terpidana) }}">
                        @error('nama_terpidana')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>Barang Bukti:</label>
                        <input type="text" name="barang_bukti"
                            class="form-control @error('barang_bukti') is-invalid @enderror"
                            value="{{ old('barang_bukti', $id->barang_bukti) }}">
                        @error('barang_bukti')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>Keterangan Barang Bukti:</label>
                        <textarea name="keterangan_barang_bukti"
                            class="form-control @error('keterangan_barang_bukti') is-invalid @enderror">{{ old('keterangan_barang_bukti', $id->keterangan_barang_bukti) }}</textarea>
                        @error('keterangan_barang_bukti')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>Jenis Perkara:</label>
                        <input type="text" name="jenis_perkara"
                            class="form-control @error('jenis_perkara') is-invalid @enderror"
                            value="{{ old('jenis_perkara', $id->jenis_perkara) }}">
                        @error('jenis_perkara')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>Status Perkara:</label>
                        <input type="text" name="status_perkara"
                            class="form-control @error('status_perkara') is-invalid @enderror"
                            value="{{ old('status_perkara', $id->status_perkara) }}">
                        @error('status_perkara')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>No Putusan Inkraft:</label>
                        <input type="text" name="no_putusan_inkraft"
                            class="form-control @error('no_putusan_inkraft') is-invalid @enderror"
                            value="{{ old('no_putusan_inkraft', $id->no_putusan_inkraft) }}">
                        @error('no_putusan_inkraft')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success mt-3">Update</button>
                    <a href="{{ route('perkara.index') }}" class="btn btn-danger mt-3">Cancel</a>
            </div>
        </div>
    </div>
@endsection
