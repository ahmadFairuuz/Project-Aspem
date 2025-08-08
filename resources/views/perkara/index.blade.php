@extends('layout.main')
@section('title', 'Perkara')
@section('content')

    {{-- SECTION: Header halaman --}}
    <div class="container-fluid px-4">
        <h1 class="h3 mb-3 text-gray-800">Data Perkara</h1>


        {{-- SECTION: Card tabel data --}}
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <a href="{{ route('perkara.create') }}" class="btn  btn-primary">Tambah Perkara</a>
                    @if (Auth::user()->role != 'user')
                        <a href="{{ route('perkara.validasi') }}" class="btn btn-primary">Validasi</a>
                    @endif
                </div>
                <div>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#importModal">
                        <i class="fas fa-file-import mr-1"></i>Import

                    </button>
                    <a href="{{ route('perkara.export') }}" class="btn btn-success"><i
                            class="fas fa-file-export mr-1"></i>Eksport</a>
                </div>
            </div>


            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Register Perkara</th>
                                <th>Tanggal Input</th>
                                <th>Satuan Kerja</th>
                                <th>Jaksa</th>
                                <th>Pasal Dakwaan</th>
                                <th>Pasal Terbukti</th>
                                <th>Status</th>
                                <th>Nama Terpidana</th>
                                <th>Barang Bukti</th>
                                <th>Keterangan Barang Bukti</th>
                                <th>Jenis Perkara</th>
                                <th>Status Perkara</th>
                                <th>No Putusan Inkraft</th>
                                @if (!in_array(Auth::user()->role, ['kajati', 'validator']))
                                    <th width="180px">Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perkara as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->register_perkara }}</td>
                                    <td>{{ $item->tanggal_input }}</td>
                                    <td>{{ $item->satuan_kerja }}</td>
                                    <td>{{ $item->jaksa }}</td>
                                    <td>{{ $item->pasal_dakwaan }}</td>
                                    <td>{{ $item->pasal_terbukti }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->nama_terpidana }}</td>
                                    <td>{{ $item->barang_bukti }}</td>
                                    <td>{{ $item->keterangan_barang_bukti }}</td>
                                    <td>{{ $item->jenis_perkara }}</td>
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
                                    <td>{{ $item->no_putusan_inkraft }}</td>
                                    @if (!in_array(Auth::user()->role, ['kajati', 'validator']))
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
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Import -->
    <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('perkara.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="importModalLabel">Import Data Perkara</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="file" class="form-label">Pilih File Excel</label>
                            <input class="form-control" type="file" name="file" id="file" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- ERROR MESSAGE --}}
    @if (session()->has('failures'))
        <div class="alert alert-danger">
            <h5>Beberapa baris gagal diimport:</h5>
            <ul>
                @foreach (session()->get('failures') as $failure)
                    <li>Baris {{ $failure->row() }}:
                        @foreach ($failure->errors() as $error)
                            {{ $error }}
                        @endforeach
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
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
