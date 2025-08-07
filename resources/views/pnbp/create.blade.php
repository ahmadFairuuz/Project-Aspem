@extends('layout.main')
@section('title', 'PNBP')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tambah PNBP</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('pnbp.index') }}">PNBP</a></li>
            <li class="breadcrumb-item active">Tambah PNBP</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <i class="fas fa-plus-circle me-1"></i>
                Form Tambah PNBP
            </div>
            <div class="card-body">
                <form action="{{ route('pnbp.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Satuan Kerja</label>

                        @if ($user->hasGlobalAccess())
                            <select name="satuan_kerja" class="form-control" required>
                                <option value="">-- Pilih Satuan Kerja --</option>
                                @foreach ($satkerUsers as $item)
                                    <option value="{{ $item->satuan_kerja }}">{{ $item->satuan_kerja }}</option>
                                @endforeach
                            </select>
                        @else
                            <input type="text" class="form-control" value="{{ $user->satuan_kerja }}" readonly>
                            <input type="hidden" name="satuan_kerja" value="{{ $user->satuan_kerja }}">
                        @endif
                    </div>



                    <div class="mb-3">
                        <label class="form-label">Lelang</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp.</span>
                            <input type="number" name="lelang" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Uang</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp.</span>
                            <input type="number" name="uang" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Uang Pengganti</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp.</span>
                            <input type="number" name="uang_pengganti" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Penjualan Langsung</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp.</span>
                            <input type="number" name="penjualan_langsung" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Total</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp.</span>
                            <input type="number" name="total" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Realisasi PNBP</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp.</span>
                            <input type="number" name="realisasi_pnbp" id="realisasi_pnbp" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Target PNBP</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp.</span>
                            <input type="number" name="target_pnbp" id="target_pnbp" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea name="keterangan" class="form-control"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Periode Bulan</label>
                        <input type="month" name="periode_bulan" class="form-control">
                    </div>


                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('pnbp.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
