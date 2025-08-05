@extends('layout.main')
@section('title', 'Perkara')
@section('content')

    {{-- SECTION: Header halaman --}}
    <div class="container-fluid px-4">
        <h1 class="h3 mb-3 text-gray-800">Data Perkara</h1>
        <form action="{{ route('perkara.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" required>
            <button class="btn btn-info" type="submit">Import</button>
        </form>

        <h1 class="h3 mb-3 text-gray-800">Export Users</h1>
        <a href="{{ route('perkara.export') }}" class="btn btn-success">Download Excel</a>

        {{-- SECTION: Card tabel data --}}
        <div class="card mb-4">
            <div class="card-header">
                <a href="{{ route('perkara.create') }}" class="btn btn-sm btn-primary">Tambah Perkara</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Register Perkara</th>
                                <th>Satuan Kerja</th>
                                <th>Nama Barang</th>
                                <th>Nama Terpidana</th>
                                <th>Barang Bukti</th>
                                <th>Keterangan Barang Bukti</th>
                                <th>Jenis Perkara</th>
                                <th>Status Perkara</th>
                                <th>No Putusan Inkraft</th>
                                <th width="180px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perkara as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->register_perkara }}</td>
                                    <td>{{ $item->satuan_kerja }}</td>
                                    <td>{{ $item->nama_barang }}</td>
                                    <td>{{ $item->nama_terpidana }}</td>
                                    <td>{{ $item->barang_bukti }}</td>
                                    <td>{{ $item->keterangan_barang_bukti }}</td>
                                    <td>{{ $item->jenis_perkara }}</td>
                                    <td>{{ $item->status_perkara }}</td>
                                    <td>{{ $item->no_putusan_inkraft }}</td>
                                    <td>
                                        <a href="{{ route('perkara.edit', $item->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>

                                        <!-- Tombol Modal Hapus -->
                                        <form action="{{ route('perkara.destroy', $item->id) }}" method="POST"
                                            style="display: inline;"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
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
            $('#dataTable').DataTable(); // inisialisasi datatable
        });
    </script>
@endpush
