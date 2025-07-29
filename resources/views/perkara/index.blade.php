@extends('layout.main')
@section('title', 'Perkara')
@section('content')

    {{-- SECTION: Header halaman --}}
    <div class="container-fluid px-4">
        <h1 class="h3 mb-3 text-gray-800">Data Perkara</h1>

        {{-- SECTION: Card tabel data --}}
        <div class="card mb-4">
            <div class="card-header">
               <a href="{{ route('perkara.create') }}" class="btn btn-sm btn-primary">Tambah Perkara</a>
            </div>
            <div class="card-body">
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
                                    <a href="{{ route('perkara.index', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                    <!-- Tombol Modal Hapus -->
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalHapus{{ $item->id }}">
                                        Hapus
                                    </button>

                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="modalHapus{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="modalLabel{{ $item->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalLabel{{ $item->id }}">Hapus Perkara</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus <strong>{{ $item->register_perkara }}</strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('perkara.index', $item->id) }}" method="POST"
                                                        style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- END Modal --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
