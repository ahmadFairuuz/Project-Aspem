@extends('layout.main')

@section('content')
<div class="container">
    <h4>Edit Data Rekap Barang Rampasan</h4>
    <form action="{{ route('rekap-barang-rampasan.update', $rekap->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Satuan Kerja</label>
            <input type="text" name="satuan_kerja" class="form-control" value="{{ $rekap->satuan_kerja }}" required>
        </div>

        <div class="mb-3">
            <label>Jenis Barang Rampasan</label>
            <select name="jenis_barang_rampasan" class="form-control" required>
                @foreach(['Tanah dan Bangunan','Hewan dan Tanaman','Peralatan dan Mesin','Aset Tetap Lainnya','Aset Lain-lain'] as $jenis)
                    <option value="{{ $jenis }}" {{ $rekap->jenis_barang_rampasan == $jenis ? 'selected' : '' }}>
                        {{ $jenis }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Deskripsi Barang</label>
            <textarea name="deskripsi_barang" class="form-control">{{ $rekap->deskripsi_barang }}</textarea>
        </div>

        <div class="mb-3">
            <label>Barang Persediaan</label>
            <textarea name="barang_persediaan" class="form-control">{{ $rekap->barang_persediaan }}</textarea>
        </div>

        <div class="mb-3">
            <label>Jumlah Total</label>
            <input type="text" name="jumlah_total" class="form-control" value="{{ $rekap->jumlah_total }}">
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control">{{ $rekap->keterangan }}</textarea>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                @foreach(['Belum memiliki nilai taksir','Memiliki nilai taksir','Terjual'] as $status)
                    <option value="{{ $status }}" {{ $rekap->status == $status ? 'selected' : '' }}>
                        {{ $status }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Bidang</label>
            <select name="bidang" class="form-control" required>
                @foreach(['Pidsus','Pidum'] as $bidang)
                    <option value="{{ $bidang }}" {{ $rekap->bidang == $bidang ? 'selected' : '' }}>
                        {{ $bidang }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('rekap-barang-rampasan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
