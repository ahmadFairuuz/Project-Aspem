@extends('layout.main')
@section('title', 'Rekap Rampasan')
@section('content')

    <div class="container-fluid px-4">
    <h2 class="mb-4">Rekapitulasi Barang Rampasan</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3 d-flex justify-content-between">
        <a href="{{ route('rekap-barang-rampasan.create') }}" class="btn btn-primary">Tambah Data</a>

        <form method="GET" action="{{ route('rekap-barang-rampasan.index') }}" class="d-flex gap-2">
            <select name="bidang" class="form-select">
                <option value="">-- Pilih Bidang --</option>
                <option value="Pidsus" {{ request('bidang') == 'Pidsus' ? 'selected' : '' }}>Pidsus</option>
                <option value="Pidum" {{ request('bidang') == 'Pidum' ? 'selected' : '' }}>Pidum</option>
            </select>

            <select name="status" class="form-select">
                <option value="">-- Pilih Status --</option>
                <option value="Belum memiliki nilai taksir" {{ request('status') == 'Belum memiliki nilai taksir' ? 'selected' : '' }}>Belum memiliki nilai taksir</option>
                <option value="Memiliki nilai taksir" {{ request('status') == 'Memiliki nilai taksir' ? 'selected' : '' }}>Memiliki nilai taksir</option>
                <option value="Terjual" {{ request('status') == 'Terjual' ? 'selected' : '' }}>Terjual</option>
            </select>

            <select name="rentang" class="form-select">
                <option value="">-- Rentang Waktu --</option>
                <option value="7" {{ request('rentang') == '7' ? 'selected' : '' }}>Per Minggu</option>
                <option value="30" {{ request('rentang') == '30' ? 'selected' : '' }}>Per Bulan</option>
                <option value="90" {{ request('rentang') == '90' ? 'selected' : '' }}>Per 3 Bulan</option>
                <option value="180" {{ request('rentang') == '180' ? 'selected' : '' }}>Per 6 Bulan</option>
            </select>

            <button type="submit" class="btn btn-secondary">Filter</button>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Satuan Kerja</th>
                    <th>Jenis Barang Rampasan</th>
                    <th>Deskripsi Barang Rampasan</th>
                    <th>Barang Persediaan</th>
                    <th>Jumlah Total</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Bidang</th>
                    <th>Tanggal Input</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rekap as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->satuan_kerja }}</td>
                    <td>{{ $item->jenis_barang_rampasan }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>{{ $item->barang_persediaan }}</td>
                    <td>{{ $item->jumlah_total }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->bidang }}</td>
                    <td>{{ $item->tanggal_input}}</td>
                    <td>
                        <a href="{{ route('rekap-barang-rampasan.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('rekap-barang-rampasan.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="11" class="text-center">Data tidak tersedia.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('sadmin2/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('sadmin2/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
@endpush
