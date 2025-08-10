@extends('layout.main')
@section('title', 'Rekap Rampasan')
@section('content')

    <div class="container-fluid px-4">
    <h2 class="mb-4">Rekapitulasi Barang Rampasan</h2>

   <div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <h5 class="mb-0">Tabel Rekap Barang Rampasan</h5>
        </div>
        <div>
            <a href="{{ route('rekap-barang-rampasan.create') }}" class="btn btn-primary">
                <i class="fas fa-plus mr-1"></i>Tambah Data
            </a>
            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#importModal">
                <i class="fas fa-file-import mr-1"></i>Import
            </button>
            <a href="{{ route('rekap-barang-rampasan.export', request()->query()) }}" class="btn btn-success">
                <i class="fas fa-file-export mr-1"></i>Export
            </a>
        </div>
    </div>

    <div class="card-body">
        {{-- Filter Form --}}
        <form method="GET" action="{{ route('rekap-barang-rampasan.index') }}" class="d-flex flex-wrap gap-2 mb-3">
            <select name="bidang" class="form-select">
                <option value="">-- Pilih Bidang --</option>
                <option value="Pidsus" {{ request('bidang') == 'Pidsus' ? 'selected' : '' }}>Pidsus</option>
                <option value="Pidum" {{ request('bidang') == 'Pidum' ? 'selected' : '' }}>Pidum</option>
            </select>

            <select name="status" class="form-select-sm">
                <option value="">-- Pilih Status --</option>
                <option value="Belum memiliki nilai taksir" {{ request('status') == 'Belum memiliki nilai taksir' ? 'selected' : '' }}>Belum memiliki nilai taksir</option>
                <option value="Memiliki nilai taksir" {{ request('status') == 'Memiliki nilai taksir' ? 'selected' : '' }}>Memiliki nilai taksir</option>
                <option value="Terjual" {{ request('status') == 'Terjual' ? 'selected' : '' }}>Terjual</option>
            </select>

            <select name="rentang" class="form-select-sm">
                <option value="">-- Rentang Waktu --</option>
                <option value="7" {{ request('rentang') == '7' ? 'selected' : '' }}>Per Minggu</option>
                <option value="30" {{ request('rentang') == '30' ? 'selected' : '' }}>Per Bulan</option>
                <option value="90" {{ request('rentang') == '90' ? 'selected' : '' }}>Per 3 Bulan</option>
                <option value="180" {{ request('rentang') == '180' ? 'selected' : '' }}>Per 6 Bulan</option>
            </select>

            <button type="submit" class="btn btn-secondary">Filter</button>
        </form>
    </div>
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
                    <th>Timestamp</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rekap as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->satuan_kerja }}</td>
                    <td>{{ $item->jenis_barang_rampasan }}</td>
                    <td>{{ $item->deskripsi_barang }}</td>
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


<!-- Modal Import -->
<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     <form action="{{ route('rekap-barang-rampasan.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="importModalLabel">Import Rekap Barang Rampasan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="file" name="file" class="form-control" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Import</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('sadmin2/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('sadmin2/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
@endpush
