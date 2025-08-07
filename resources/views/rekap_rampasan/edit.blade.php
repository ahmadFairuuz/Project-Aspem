@extends('layout.main')

@section('content')

<div class="container">
    <h2 class="mb-4">Edit Rekap Barang Rampasan</h2>
    

   <form action="{{ route('rekap-barang-rampasan.update') }}" method="POST">
    @csrf
    @method('PUT')

        <div class="mb-3">
            <label class="form-label">Satuan Kerja</label>
            <input type="text" name="satuan_kerja" class="form-control" value="{{ old('satuan_kerja', $rekap->satuan_kerja) }}" required>
        </div>

        @foreach ([
            'tanah_dan_bangunan' => 'Tanah dan Bangunan',
            'hewan_dan_tanaman' => 'Hewan dan Tanaman',
            'peralatan_dan_mesin' => 'Peralatan dan Mesin',
            'aset_tetap_lainnya' => 'Aset Tetap Lainnya',
            'aset_lain_lain' => 'Aset Lain-lain',
            'barang_persediaan' => 'Barang Persediaan',
            'jumlah_total' => 'Jumlah Total',
            'keterangan' => 'Keterangan'
        ] as $field => $label)
            <div class="mb-3">
                <label class="form-label">{{ $label }}</label>
                <textarea name="{{ $field }}" class="form-control">{{ old($field, $rekap->$field) }}</textarea>
            </div>
        @endforeach

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                @foreach (['Belum memiliki nilai taksir', 'Memiliki nilai taksir', 'Terjual'] as $status)
                    <option value="{{ $status }}" {{ $rekap->status == $status ? 'selected' : '' }}>{{ $status }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Bidang</label>
            <select name="bidang" class="form-select" required>
                @foreach (['Pidsus', 'Pidum'] as $bidang)
                    <option value="{{ $bidang }}" {{ $rekap->bidang == $bidang ? 'selected' : '' }}>{{ $bidang }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Input</label>
            <input type="date" name="tanggal_input" class="form-control" value="{{ old('tanggal_input', $rekap->tanggal_input ? $rekap->tanggal_input->format('Y-m-d') : '') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('rekap-barang-rampasan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

@push('scripts')
<script src="sadmin2/vendor/jquery/jquery.min.js"></script>
<script src="sadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="sadmin2/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="sadmin2/js/sb-admin-2.min.js"></script>
<script src="sadmin2/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="sadmin2/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="sadmin2/js/demo/datatables-demo.js"></script>
@endpush
