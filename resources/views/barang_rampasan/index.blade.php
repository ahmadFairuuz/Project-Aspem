@extends('layout.main')

@section('title', 'Index Data Barang Rampasan')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="h3 mb-3 text-gray-800">Index Data Barang Rampasan</h1>
        <form action="{{ route('barang-rampasan.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" required>
            <button class="btn btn-info" type="submit">Import</button>
        </form>

        <h1 class="h3 mb-3 text-gray-800">Export Users</h1>
        <a href="{{ route('barang-rampasan.export') }}" class="btn btn-success">Download Excel</a>

        <div class="card mb-4">
            <div class="card-header">
                <a href="{{ route('barang-rampasan.aktivitas') }}" class="btn btn-sm btn-primary">Aktivitas Barang
                    Rampasan</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Opsi</th>
                            <th>Tanggal Cetak</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangRampasan as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <form action="{{ route('label.destroy', $item->id) }}" method="POST"
                                        style="display: inline;"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($item->tgl_cetak)->format('d-m-Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('sadmin2/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('sadmin2/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable(); // inisialisasi datatable
        });
    </script>
@endpush

