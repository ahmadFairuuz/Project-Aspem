@extends('layout.main')

@section('title', 'Index Data Barang Rampasan')

@section('content')
<div class="container-fluid px-4">
    <h1 class="h3 mb-3 text-gray-800">Index Data Barang Rampasan</h1>

    <div class="card mb-4">
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Register Perkara</th>
                        <th>Barang Bukti</th>
                        <th>Tanggal Barbuk</th>
                        <th>Keterangan</th>
                        <th>Satker</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangRampasan as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->register_perkara }}</td>
                        <td>{{ $item->barang_bukti }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_barbuk)->format('d-m-Y') }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>{{ $item->satker }}</td>
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
    <script src="{{ asset('sadmin2/js/demo/datatables-demo.js') }}"></script>
    <script src="{{ asset('sadmin2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('sadmin2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('sadmin2/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('sadmin2/vendor/chart.js/Chart.min.js') }} "></script>
    <script src="{{ asset('sadmin2/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('sadmin2/js/demo/chart-pie-demo.js') }}"></script>
@endpush
