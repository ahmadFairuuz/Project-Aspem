@extends('layout.main')
@section('title', 'Label')
@section('content')

    {{-- SECTION: Header halaman --}}
    <div class="container-fluid px-4">
        <h1 class="h3 mb-3 text-gray-800">Label Barang Bukti</h1>

        {{-- SECTION: Card tabel data --}}
        <div class="card mb-4">
            <div class="card-header">
                <a href="{{ route('label.create') }}" class="btn btn-sm btn-primary">Tambah data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable">
                    {{-- SECTION: Header tabel --}}
                    <thead class="table-dark">
                        <tr>
                             
                            <th>No</th>
                            <th>Register Perkara</th>
                            <th>Satuan Kerja</th>
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
                                <td>{{ $item->satuan_kerja }}</td>
                                <td>{{ $item->barang_bukti }}</td>
                                <td>{{ $item->tanggal_barbuk }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>
                                    {{-- Tombol Aksi --}}
                                    <a href="{{ route('label.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                    {{-- Tombol Hapus Tanpa Modal --}}
                                    <form action="{{ route('label.destroy', $item->id) }}" method="POST"
                                        style="display: inline;"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                    <a href="{{ route('label.generate', $item->id) }}" class="btn btn-sm btn-success mt-1">Generate</a>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        {{-- END Card --}}
    </div>
    {{-- END Container --}}
@endsection

@push('scripts')
<script>
    $('#checkAll').click(function () {
        $('.checkItem').prop('checked', this.checked);
    });
</script>   
<script src="{{ asset('sadmin2/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('sadmin2/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable(); // inisialisasi datatable
        });
    </script>
    
@endpush

