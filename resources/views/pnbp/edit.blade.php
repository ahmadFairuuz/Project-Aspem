@extends('layout.main')

@section('content')
<div class="container">
    <h4>Edit Data PNBP</h4>
    <form action="{{ route('pnbp.update', $pnbp->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Satuan Kerja</label>
            <input type="text" name="satuan_kerja" class="form-control" 
                   value="{{ $pnbp->satuan_kerja }}" required>
        </div>

        <div class="mb-3">
            <label>Lelang</label>
            <input type="number" step="0.01" name="lelang" class="form-control" 
                   value="{{ $pnbp->lelang }}">
        </div>

        <div class="mb-3">
            <label>Uang</label>
            <input type="number" step="0.01" name="uang" class="form-control" 
                   value="{{ $pnbp->uang }}">
        </div>

        <div class="mb-3">
            <label>Uang Pengganti</label>
            <input type="number" step="0.01" name="uang_pengganti" class="form-control" 
                   value="{{ $pnbp->uang_pengganti }}">
        </div>

        <div class="mb-3">
            <label>Penjualan Langsung</label>
            <input type="number" step="0.01" name="penjualan_langsung" class="form-control" 
                   value="{{ $pnbp->penjualan_langsung }}">
        </div>

        <div class="mb-3">
            <label>Total</label>
            <input type="number" step="0.01" name="total" class="form-control" 
                   value="{{ $pnbp->total }}">
        </div>

        <div class="mb-3">
            <label>Realisasi PNBP</label>
            <input type="number" step="0.01" name="realisasi_pnbp" class="form-control" 
                   value="{{ $pnbp->realisasi_pnbp }}">
        </div>

        <div class="mb-3">
            <label>Target PNBP</label>
            <input type="number" step="0.01" name="target_pnbp" class="form-control" 
                   value="{{ $pnbp->target_pnbp }}">
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control">{{ $pnbp->keterangan }}</textarea>
        </div>

        <div class="mb-3">
            <label>Periode Bulan</label>
            <input type="text" name="periode_bulan" class="form-control" 
                   value="{{ $pnbp->periode_bulan }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('pnbp.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
