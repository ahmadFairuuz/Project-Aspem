@extends('layout.main')
@section('title', 'Edit Rekap Barang Rampasan')
@section('content')

<div class="container-fluid px-4">
    <h1 class="h3 mb-0 text-gray-800">Rekap Barang Rampasan</h1>
    <ol class="breadcrumb my-3">
        <li class="breadcrumb-item"><a href="{{ route('rekap-barang-rampasan.index') }}">Rekap Barang Rampasan</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Form Edit Data Rekap Barang Rampasan
        </div>
        <div class="card-body">
            <form action="{{ route('rekap-barang-rampasan.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Satuan Kerja</label>
            <input type="text" name="satuan_kerja" class="form-control" value="{{ old('satuan_kerja') }}" required>
        </div>

        <div class="mb-3">
    <label class="form-label">Jenis Barang Rampasan</label>
    <select name="jenis_barang_rampasan" class="form-select" required>
        @foreach ([
            'Tanah dan Bangunan',
            'Hewan dan Tanaman',
            'Peralatan dan Mesin',
            'Aset Tetap Lainnya',
            'Aset Lain-lain'
        ] as $jenis)
            <option value="{{ $jenis }}" {{ old('jenis_barang_rampasan') == $jenis ? 'selected' : '' }}>
                {{ $jenis }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Deskripsi Barang Rampasan</label>
    <!-- <textarea name="deskripsi_barang" class="form-control">{{ old('deskripsi_barang') }}</textarea> -->
    <input type="text" name="deskripsi_barang" class="form-control" value="{{ old('deskripsi_barang') }}">
</div>

<div class="mb-3">
    <label class="form-label">Barang Persediaan</label>
    <input type="text" name="barang_persediaan" class="form-control" value="{{ old('barang_persediaan') }}">
</div>

<div class="mb-3">
    <label class="form-label">Jumlah Total</label>
    <input type="text" name="jumlah_total" class="form-control" value="{{ old('jumlah_total') }}">
</div>

<div class="mb-3">
    <label class="form-label">Keterangan</label>
    <textarea name="keterangan" class="form-control">{{ old('keterangan') }}</textarea>
</div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                @foreach (['Belum memiliki nilai taksir', 'Memiliki nilai taksir', 'Terjual'] as $status)
                    <option value="{{ $status }}" {{ old('status') == $status ? 'selected' : '' }}>{{ $status }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Bidang</label>
            <select name="bidang" class="form-select" required>
                @foreach (['Pidsus', 'Pidum'] as $bidang)
                    <option value="{{ $bidang }}" {{ old('bidang') == $bidang ? 'selected' : '' }}>{{ $bidang }}</option>
                @endforeach
            </select>
        </div>

        <!-- <div class="mb-3">
            <label class="form-label">Tanggal Input</label>
            <input type="date" name="created_at" class="form-control" value="{{ old('created_at') }}" required>
        </div> -->

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
