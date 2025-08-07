@extends('layout.main')
@section('title', 'Tambah Perkara')
@section('content')

    <div class="container-fluid px-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Perkara</h1>
        <ol class="breadcrumb my-3">
            <li class="breadcrumb-item"><a href="{{ route('perkara.index') }}">Perkara</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-plus-circle me-1"></i>
                Form Tambah Data Perkara
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('perkara.store') }}" method="POST">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="register_perkara">Register Perkara</label>
                        <input type="text" name="register_perkara"
                            class="form-control @error('register_perkara') is-invalid @enderror"
                            value="{{ old('register_perkara') }}">
                        @error('register_perkara')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="tanggal_input">Tanggal Input</label>
                        <input type="date" name="tanggal_input"
                            class="form-control @error('tanggal_input') is-invalid @enderror"
                            value="{{ old('tanggal_input') }}">
                        @error('tanggal_input')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="satuan_kerja">Satuan Kerja</label>
                        @if ($user->hasGlobalAccess())
                            <select name="satuan_kerja" class="form-control @error('satuan_kerja') is-invalid @enderror">
                                <option value="">-- Pilih Satuan Kerja --</option>
                                @foreach ($satkerUsers as $item)
                                    <option value="{{ $item->satuan_kerja }}"
                                        {{ old('satuan_kerja') == $item->satuan_kerja ? 'selected' : '' }}>
                                        {{ $item->satuan_kerja }}
                                    </option>
                                @endforeach
                            </select>
                        @else
                            <input type="text" class="form-control" value="{{ $user->satuan_kerja }}" readonly>
                            <input type="hidden" name="satuan_kerja" value="{{ $user->satuan_kerja }}">
                        @endif
                        @error('satuan_kerja')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="jaksa">Jaksa</label>
                        <input type="text" name="jaksa" class="form-control @error('jaksa') is-invalid @enderror"
                            value="{{ old('jaksa') }}">
                        @error('jaksa')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="pasal_dakwaan">Pasal Dakwaan</label>
                        <input type="text" name="pasal_dakwaan"
                            class="form-control @error('pasal_dakwaan') is-invalid @enderror"
                            value="{{ old('pasal_dakwaan') }}">
                        @error('pasal_dakwaan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="pasal_terbukti">Pasal Terbukti</label>
                        <input type="text" name="pasal_terbukti"
                            class="form-control @error('pasal_terbukti') is-invalid @enderror"
                            value="{{ old('pasal_terbukti') }}">
                        @error('pasal_terbukti')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="status">Status</label>
                        <input type="text" name="status" class="form-control @error('status') is-invalid @enderror"
                            value="{{ old('status') }}">
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" name="nama_barang"
                            class="form-control @error('nama_barang') is-invalid @enderror"
                            value="{{ old('nama_barang') }}">
                        @error('nama_barang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="nama_terpidana">Nama Terpidana</label>
                        <input type="text" name="nama_terpidana"
                            class="form-control @error('nama_terpidana') is-invalid @enderror"
                            value="{{ old('nama_terpidana') }}">
                        @error('nama_terpidana')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="barang_bukti">Barang Bukti</label>
                        <input type="text" name="barang_bukti"
                            class="form-control @error('barang_bukti') is-invalid @enderror"
                            value="{{ old('barang_bukti') }}">
                        @error('barang_bukti')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="keterangan_barang_bukti">Keterangan Barang Bukti</label>
                        <input type="text" name="keterangan_barang_bukti"
                            class="form-control @error('keterangan_barang_bukti') is-invalid @enderror"
                            value="{{ old('keterangan_barang_bukti') }}">
                        @error('keterangan_barang_bukti')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="jenis_perkara">Jenis Perkara</label>
                        <input type="text" name="jenis_perkara"
                            class="form-control @error('jenis_perkara') is-invalid @enderror"
                            value="{{ old('jenis_perkara') }}">
                        @error('jenis_perkara')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="no_putusan_inkraft">No Putusan Inkraft</label>
                        <input type="text" name="no_putusan_inkraft"
                            class="form-control @error('no_putusan_inkraft') is-invalid @enderror"
                            value="{{ old('no_putusan_inkraft') }}">
                        @error('no_putusan_inkraft')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button href="{{ route('perkara.index') }}"type="submit" class="btn btn-primary mt-3">Simpan</button>
                    <a href="{{ route('perkara.index') }}" class="btn btn-secondary mt-3">Batal</a>
                </form>
            </div>
        </div>
    </div>

@endsection
