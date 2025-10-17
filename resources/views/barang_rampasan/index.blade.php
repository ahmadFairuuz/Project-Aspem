@extends('layout.main')
@section('title', 'Data Barang Rampasan')


@section('content')
    <div class="container-fluid px-4">
        <h1 class="h3 mb-3 text-gray-800">Aktivitas Barang Rampasan</h1>
        <div class="card mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Register Perkara</th>
                                <th>Satuan Kerja</th>
                                <th>Barang Bukti</th>
                                <th>Tanggal Pengambilan</th>
                                <th>Keterangan Pengambilan</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Keterangan Pengembalian</th>
                                <th>Status</th>
                                <th>Tanggal Cetak</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangRampasan as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->register_perkara }}</td>
                                    <td>{{ $item->satuan_kerja }}</td>
                                    <td>{{ $item->barang_bukti }}</td>
                                    <td>{{ $item->tgl_pengambilan ? \Carbon\Carbon::parse($item->tgl_pengambilan)->format('d-m-Y H:i') : '' }}
                                    </td>
                                    <td>{{ $item->keterangan_pengambilan }}</td>
                                    <td>{{ $item->tgl_pengembalian ? \Carbon\Carbon::parse($item->tgl_pengembalian)->format('d-m-Y H:i') : '' }}
                                    </td>
                                    <td>{{ $item->keterangan_pengembalian }}</td>
                                    <td>
                                        <span
                                            class="badge 
        {{ $item->status == 'PENGEMBALIAN' ? 'bg-success' : ($item->status == 'PENGAMBILAN' ? 'bg-secondary' : '') }} text-white px-3 py-2 fw-bold">
                                            {{ $item->status }}
                                        </span>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($item->tgl_cetak)->format('d-m-Y') }}</td>
                                    <td>
                                        @if ($item->status === 'PENGEMBALIAN')
                                            <!-- Tombol Pinjam -->
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#modalPengambilan{{ $item->id }}">
                                                Pinjam
                                            </button>
                                        @else
                                            <!-- Tombol Kembalikan -->
                                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#modalPengembalian{{ $item->id }}">
                                                Kembalikan
                                            </button>
                                        @endif


                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @foreach ($barangRampasan as $item)
                        <!-- Modal Pengambilan -->
                        <div class="modal fade" id="modalPengambilan{{ $item->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('barang-rampasan.pengambilan', $item->id) }}" method="POST">
                                        @csrf
                                        <div class="modal-header bg-warning text-white">
                                            <h5 class="modal-title">Form Pengambilan Barang</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Nama Barang</label>
                                                <input type="text" name="barang_bukti" class="form-control"
                                                    value="{{ $item->barang_bukti }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Tanggal Pengambilan</label>
                                                <input type="datetime-local" name="tgl_pengambilan" class="form-control"
                                                    required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Keterangan</label>
                                                <textarea name="keterangan_pengambilan" class="form-control" rows="3"
                                                    placeholder="Masukkan keterangan (opsional)"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-warning">Simpan</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Pengembalian -->
                        <div class="modal fade" id="modalPengembalian{{ $item->id }}" tabindex="-1"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('barang-rampasan.pengembalian', $item->id) }}" method="POST">
                                        @csrf
                                        <div class="modal-header bg-success text-white">
                                            <h5 class="modal-title">Form Pengembalian Barang</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Nama Barang</label>
                                                <input type="text" name="barang_bukti" class="form-control"
                                                    value="{{ $item->barang_bukti }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Tanggal Pengembalian</label>
                                                <input type="datetime-local" name="tgl_pengembalian" class="form-control"
                                                    required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Keterangan</label>
                                                <textarea name="keterangan_pengembalian" class="form-control" rows="3"
                                                    placeholder="Masukkan keterangan (opsional)"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Simpan</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            @endforeach

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
