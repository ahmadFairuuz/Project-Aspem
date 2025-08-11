@extends('layout.main')
@section('title', content: 'Edit Rekap Rampasan')
@section('content')
    <div class="container">
        <h4>Edit Data Rekap Barang Rampasan</h4>
        <form action="{{ route('rekap-barang-rampasan.update', $rekap->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Satuan Kerja</label>
                <input type="text" name="satuan_kerja" class="form-control" value="{{ $rekap->satuan_kerja }}" readonly>
            </div>

            <div class="mb-3">
                <label>Jenis Barang Rampasan</label>
                <select name="jenis_barang_rampasan" class="form-control" required>
                    @foreach (['Tanah dan Bangunan', 'Hewan dan Tanaman', 'Peralatan dan Mesin', 'Aset Tetap Lainnya', 'Aset Lain-lain'] as $jenis)
                        <option value="{{ $jenis }}" {{ $rekap->jenis_barang_rampasan == $jenis ? 'selected' : '' }}>
                            {{ $jenis }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Deskripsi Barang Rampasan</label>
                <input type="text" name="deskripsi_barang" class="form-control"
                    value="{{ $rekap->deskripsi_barang }}"></input>
            </div>

            <div class="mb-3">
                <label>Jumlah Total</label>
                <input type="text" name="jumlah_total" class="form-control" value="{{ $rekap->jumlah_total }}">
            </div>

            <div class="mb-3">
                <label>Keterangan</label>
                <input name="keterangan" class="form-control" value="{{ $rekap->keterangan }}"></input>
            </div>
            <div class="mb-3">
                <label ">Kendala</label>
                    <input name="kendala" class="form-control" value="{{ $rekap->kendala }}"></input>
                </div>
                <div class="mb-3">
                    <label">Solusi</label>
                <input name="solusi" class="form-control" value="{{ $rekap->solusi }}"></input>
            </div>
            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    @foreach (['Belum memiliki nilai taksir', 'Memiliki nilai taksir', 'Terjual'] as $status)
                        <option value="{{ $status }}" {{ $rekap->status == $status ? 'selected' : '' }}>
                            {{ $status }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Bidang</label>
                <select name="bidang" class="form-control" required>
                    @foreach (['Pidsus', 'Pidum'] as $bidang)
                        <option value="{{ $bidang }}" {{ $rekap->bidang == $bidang ? 'selected' : '' }}>
                            {{ $bidang }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Tanggal Input</label>
                <input type="date" name="tanggal_input" class="form-control"
                    value="{{ $rekap->tanggal_input}}">
            </div>


            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('rekap-barang-rampasan.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
