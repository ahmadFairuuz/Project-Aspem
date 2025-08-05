@extends('layout.main')

@section('title', 'Index Data Barang Rampasan')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="h3 mb-3 text-gray-800">Kelola Akun</h1>
        <form action="/import" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" required>
            <button class="btn btn-group" type="submit">Import</button>
        </form>

        <h1 class="h3 mb-3 text-gray-800">Export Users</h1>
        <a href="/export">Download Excel</a>

        <div class="card mb-4">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Satuan Kerja</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($akun as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->role }}</td>
                                    <td>{{ $item->satuan_kerja }}</td>
                                    <td>
                                        <a href="{{ route('akun.edit', $item->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                    </td>
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
