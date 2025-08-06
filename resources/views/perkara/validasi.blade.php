@extends('layout.main')
@section('title', 'Perkara')
@section('content')

    {{-- SECTION: Header halaman --}}
    <div class="container-fluid px-4">
        <h1 class="h3 mb-3 text-gray-800">Approval Perkara</h1>

        <ol class="breadcrumb my-3">
            <li class="breadcrumb-item"><a href="{{ route('perkara.index') }}">Perkara</a></li>
            <li class="breadcrumb-item active">Validasi Perkara</li>
        </ol>

        {{-- SECTION: Card tabel data --}}
        <div class="card mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Register Perkara</th>
                                <th>Nama Terpidana</th>
                                <th>Barang Bukti</th>
                                <th>Status Perkara</th>
                                <th>Approval</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perkara as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->register_perkara }}</td>
                                    <td>{{ $item->nama_terpidana }}</td>
                                    <td>{{ $item->barang_bukti }}</td>
                                    <td>
                                        @if ($item->status_perkara === 'DISETUJUI')
                                            <span
                                                class="badge bg-success text-light fw-bold p-2">{{ $item->status_perkara }}</span>
                                        @elseif ($item->status_perkara === 'DITOLAK')
                                            <span
                                                class="badge bg-danger text-light fw-bold p-2">{{ $item->status_perkara }}</span>
                                        @elseif ($item->status_perkara === 'PENDING')
                                            <span
                                                class="badge bg-warning text-light fw-bold p-2">{{ $item->status_perkara }}</span>
                                        @else
                                            <span class="badge bg-secondary fw-bold p-2">{{ $item->status_perkara }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->status_perkara === 'PENDING')
                                            <form action="{{ route('perkara.updateStatus', $item->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status_perkara" value="DISETUJUI">
                                                <button type="submit" class="btn btn-sm btn-success"><i
                                                        class="fas fa-check"></i></button>
                                            </form>

                                            <form action="{{ route('perkara.updateStatus', $item->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status_perkara" value="DITOLAK">
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="fas fa-times"></i></button>
                                            </form>
                                        @endif
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
