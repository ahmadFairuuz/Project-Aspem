@extends('layout.main')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Data Tunggakan</h1>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-0">Tabel Data Tunggakan</h5>
            </div>
            <div>
                <a href="{{ route('tunggakan.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus mr-1"></i>Tambah Data
                </a>
                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#importModal">
                    <i class="fas fa-file-import mr-1"></i>Import
                </button>
                <a href="{{ route('tunggakan.export') }}" class="btn btn-success">
                    <i class="fas fa-file-export mr-1"></i>Export
                </a>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
            <table id="dataTable" class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>No. Putusan</th>
                        <th>Nama Terpidana</th>
                        <th>No. Register Perkara</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $item)
                    <tr>
                        <td>{{ $data->firstItem() + $key }}</td>
                        <td>{{ $item->no_putusan }}</td>
                        <td>{{ $item->nama_terpidana }}</td>
                        <td>{{ $item->no_register }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>
                            <a href="{{ route('tunggakan.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('tunggakan.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            {{ $data->links() }}
        </div>
    </div>
</div>

<!-- Modal Import -->
<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('tunggakan.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="importModalLabel">Import Data Tunggakan</h5>
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
    @push('scripts')
    <script src="{{ asset('sadmin2/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('sadmin2/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
       $(document).ready(function() {
            if (!$.fn.DataTable.isDataTable('#dataTable')) {
                $('#dataTable').DataTable({
                    "order": [[0, "desc"]]
                });
            }
        });
    </script>
@endpush


