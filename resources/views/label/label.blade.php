@extends('layout.main')

{{-- SECTION: Judul halaman (opsional) --}}
@section('title', 'Data Label')

{{-- SECTION: Konten utama --}}
@section('content')

    {{-- SECTION: Header halaman --}}
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>

        {{-- SECTION: Card tabel data --}}
        <div class="card mb-4">
            <div class="card-header">
                <a href="{{ route('label.create') }}" class="btn btn-sm btn-primary">Tambah data</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="datatablesSimple">
                    {{-- SECTION: Header tabel --}}
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Register Perkara</th>
                            <th>Barang Bukti</th>
                            <th>Tanggal Barbuk</th>
                            <th>Keterangan</th>
                            <th width="180px">Action</th>
                        </tr>
                    </thead>

                    {{-- SECTION: Isi tabel --}}
                    <tbody>
                        @foreach ($aspem as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->register_perkara }}</td>
                                <td>{{ $item->barang_bukti }}</td>
                                <td>{{ $item->tanggal_barbuk }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>
                                    {{-- Tombol Aksi --}}
                                    <a href="{{ route('label.create', $item->id) }}"
                                        class="btn btn-sm btn-secondary">Show</a>
                                    <a href="{{ route('label.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                    {{-- Tombol Modal Hapus --}}
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modalHapus{{ $item->id }}">
                                        Hapus
                                    </button>

                                    {{-- Modal Hapus --}}
                                    <div class="modal fade" id="modalHapus{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="modalLabel{{ $item->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                {{-- HEADER MODAL --}}
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalLabel{{ $item->id }}">Hapus Data
                                                        Aspem</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                {{-- BODY MODAL --}}
                                                <div class="modal-body">
                                                    Apakah anda yakin ingin menghapus data
                                                    <strong>{{ $item->register_perkara }}</strong>?
                                                </div>
                                                {{-- FOOTER MODAL --}}
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('label.destroy', $item->id) }}" method="POST"
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
        {{-- END Card --}}
    </div>
    {{-- END Container --}}
@endsection

{{-- SECTION: Script tambahan --}}
@push('scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('sadmin2/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('sadmin2/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('sadmin2/js/demo/datatables-demo.js') }}"></script>
@endpush
