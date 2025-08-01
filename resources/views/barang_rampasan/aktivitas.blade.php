@extends('layout.main')

@section('title', 'Index Data Barang Rampasan')

@section('content')
<div class="container-fluid px-4">
    <h1 class="h3 mb-3 text-gray-800">Aktivitas Barang Rampasan</h1>
    
        <ol class="breadcrumb my-3">
            <li class="breadcrumb-item"><a href="{{ route('barang-rampasan.index') }}">Daftar Barang Rampasan</a></li>
            <li class="breadcrumb-item active">Aktivitas Barang</li>
        </ol>

    <div class="card mb-4">
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Register Perkara</th>
                        <th>Nama Barang</th>
                        <th>Tanggal Pengambilan</th>
                        <th>Keterangan Pengambilan</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Keterangan Pengembalian</th>
                        <th>Status</th>
                        <th>Tanggal Cetak</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangRampasan as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->register_perkara }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tgl_pengambilan)->format('d-m-Y') }}</td>
                        <td>{{ $item->keterangan_pengambilan }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tgl_pengembalian)->format('d-m-Y') }}</td>
                        <td>{{ $item->keterangan_pengembalian }}</td>
                        <td>
                            <span class="badge {{ $item->status == 'PENGEMBALIAN' ? 'bg-success' : 'bg-warning text-dark' }}  text-white px-3 py-2 fw-bold">
                                {{ $item->status }}
                            </span>
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
        $(document).ready(function () {
            $('#dataTable').DataTable(); // inisialisasi datatable
        });
    </script>
@endpush
