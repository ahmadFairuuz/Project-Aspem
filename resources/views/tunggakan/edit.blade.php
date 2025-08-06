@extends('layout.main')

@section('content')
<div class="container">
    <h4>Edit Data Tunggakan</h4>
    <form action="{{ route('tunggakan.update', $tunggakan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>No. Putusan</label>
            <input type="text" name="no_putusan" class="form-control" value="{{ $tunggakan->no_putusan }}" required>
        </div>
        <div class="mb-3">
            <label>Nama Terpidana</label>
            <input type="text" name="nama_terpidana" class="form-control" value="{{ $tunggakan->nama_terpidana }}" required>
        </div>
        <div class="mb-3">
            <label>No. Register Perkara</label>
            <input type="text" name="no_register" class="form-control" value="{{ $tunggakan->no_register }}" required>
        </div>
        <div class="mb-3">
            <label>Nama Barang</label>
            <textarea name="nama_barang" class="form-control" required>{{ $tunggakan->nama_barang }}</textarea>
        </div>
        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="{{ $tunggakan->jumlah }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('tunggakan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
