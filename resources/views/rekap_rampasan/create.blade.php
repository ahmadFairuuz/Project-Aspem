@extends('layout.main')
@section('title', 'Tambah Rekap Barang Rampasan')
@section('content')

    <div class="container-fluid px-4">
        <h1 class="h3 mb-0 text-gray-800">Rekap Barang Rampasan</h1>
        <ol class="breadcrumb my-3">
            <li class="breadcrumb-item"><a href="{{ route('rekap-barang-rampasan.index') }}">Rekap Barang Rampasan</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Form Edit Data Rekap Barang Rampasan
            </div>
            <div class="card-body">
                <form action="{{ route('rekap-barang-rampasan.store') }}" method="POST">
                    @csrf

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


                    <div class="mb-3">
                        <label class="form-label">Jenis Barang Rampasan</label>
                        <select name="jenis_barang_rampasan" class="form-control" required>
                            @foreach (['Tanah dan Bangunan', 'Hewan dan Tanaman', 'Peralatan dan Mesin', 'Aset Tetap Lainnya', 'Aset Lain-lain'] as $jenis)
                                <option value="{{ $jenis }}"
                                    {{ old('jenis_barang_rampasan') == $jenis ? 'selected' : '' }}>
                                    {{ $jenis }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi Barang Rampasan</label>
                        <input type="text" name="deskripsi_barang" class="form-control"
                            value="{{ old('deskripsi_barang') }}">
                        <small class="form-text text-muted">Tuliskan deskripsi singkat barang rampasan Contoh: (unit mobil
                            BMW 325i Nomor Polisi: K-404-FI Nomor Rangka: EY70033, Nomor Mesin: 7003J320 (tidak dilengkapi
                            BPKB dan STNK))</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jumlah Total</label>
                        <input type="text" name="jumlah_total" class="form-control" value="{{ old('jumlah_total') }}">
                        <small class="form-text text-muted">Contoh: 15 Unit / 15000 M2 (gunakan angka dengan keterangan
                            satuan)</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <input name="keterangan" class="form-control">{{ old('keterangan') }}</input>
                        <small class="form-text text-muted">Tambahkan informasi harga jika sudah terjual / memiliki nilai
                            taksir, selain itu keterangan belum terjual Contoh: (Sedang dalam pengajuan penilaian KPKNL
                            Bandar Lampung)"
                        </small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kendala</label>
                        <textarea name="kendala" class="form-control">{{ old('kendala') }}</textarea>
                        <small class="form-text text-muted">Tuliskan kendala yang dihadapi jika BELUM TERJUAL</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Solusi</label>
                        <textarea name="solusi" class="form-control">{{ old('solusi') }}</textarea>
                        <small class="form-text text-muted">Tuliskan solusi atas kendala sebelumnya </small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control" required>
                            @foreach (['Belum memiliki nilai taksir', 'Memiliki nilai taksir', 'Terjual'] as $status)
                                <option value="{{ $status }}" {{ old('status') == $status ? 'selected' : '' }}>
                                    {{ $status }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Bidang</label>
                        <select name="bidang" class="form-control" required>
                            @foreach (['Pidsus', 'Pidum'] as $bidang)
                                <option value="{{ $bidang }}" {{ old('bidang') == $bidang ? 'selected' : '' }}>
                                    {{ $bidang }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Input</label>
                        <input type="date" name="tanggal_input" class="form-control" value="{{ old('tanggal_input') }}"
                            required>
                    </div>

                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('rekap-barang-rampasan.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('sadmin2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('sadmin2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('sadmin2/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('sadmin2/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('sadmin2/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('sadmin2/js/demo/datatables-demo.js') }}"></script>
@endpush
