@extends('layout.main')

@section('content')
<div class="container">
    <h4>Input Data Tunggakan</h4>
    <form action="{{ route('tunggakan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>No. Putusan</label>
            <input type="text" name="no_putusan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama Terpidana</label>
            <input type="text" name="nama_terpidana" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>No. Register Perkara</label>
            <input type="text" name="no_register" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama Barang</label>
            <textarea name="nama_barang" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('tunggakan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
