@extends('layout.main')
@section('title', 'PNBP')
@section('content')

    {{-- SECTION: Header halaman --}}
    <div class="container-fluid px-4">
        <h1 class="h3 mb-3 text-gray-800">PNBP (Penerimaan Negara Bukan Pajak)</h1>
        @if (in_array(Auth::user()->role, ['user', 'superadmin']))
            <a href="{{ route('pnbp.create') }}" class="btn  btn-success mb-3">Tambah PNBP</a>
        @endif
        <button class="btn btn-success mb-3" data-toggle="modal" data-target="#exportModal"><i
                class="fas fa-file-export mr-1"></i>Export</button>

        {{-- SECTION: Card tabel data --}}
        <div class="card mb-4">
            <div class="m-3 d-flex flex-wrap">
                @foreach ($listBulan as $item)
                    <a href="{{ route('pnbp.index', ['bulan' => $item]) }}"
                        class="btn btn-sm {{ $bulan == $item ? 'btn-primary' : 'btn-outline-primary' }}">
                        {{ \Carbon\Carbon::createFromFormat('Y-m', $item)->translatedFormat('F Y') }}
                    </a>
                @endforeach
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-striped " id="dataTable">
                        {{-- SECTION: Header tabel --}}
                        <thead class="table-dark ">
                            <tr>
                                <th>No</th>
                                <th>Satuan Kerja</th>
                                <th>Lelang</th>
                                <th>Uang</th>
                                <th>Uang Pengganti</th>
                                <th>Penjualan Langsung</th>
                                <th>Total</th>
                                <th>Realisasi PNBP</th>
                                <th>Target PNBP</th>
                                <th>Persentase</th>
                                <th>Keterangan</th>
                                <th>Periode Bulan</th>
                                @if (in_array(Auth::user()->role, ['user', 'superadmin']))
                                <th width="180px">Aksi</th>
                                @endif
                            </tr>
                        </thead>

                        {{-- SECTION: Isi tabel --}}
                        <tbody>
                            @foreach ($pnbp as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->satuan_kerja }}</td>
                                    <td data-order="{{ $item->lelang }}">{{ number_format($item->lelang, 0, ',', '.') }}
                                    </td>
                                    <td data-order="{{ $item->uang }}">{{ number_format($item->uang, 0, ',', '.') }}</td>
                                    <td data-order="{{ $item->uang_pengganti }}">
                                        {{ number_format($item->uang_pengganti, 0, ',', '.') }}</td>
                                    <td data-order="{{ $item->penjualan_langsung }}">
                                        {{ number_format($item->penjualan_langsung, 0, ',', '.') }}</td>
                                    <td data-order="{{ $item->total }}">{{ number_format($item->total, 0, ',', '.') }}
                                    </td>
                                    <td data-order="{{ $item->realisasi_pnbp }}">
                                        {{ number_format($item->realisasi_pnbp, 0, ',', '.') }}</td>
                                    <td data-order="{{ $item->target_pnbp }}">
                                        {{ number_format($item->target_pnbp, 0, ',', '.') }}</td>
                                    <td data-order="{{ $item->persentase }}">
                                        {{ number_format($item->persentase, 2, ',', '.') }}%</td>

                                    <td>{{ $item->keterangan }}</td>
                                    <td>{{ $item->periode_bulan }}</td>
                                    @if (in_array(Auth::user()->role, ['user', 'superadmin']))
                                    <td>
                                        <a href="{{ route('pnbp.edit', $item->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>

                                        <form action="{{ route('pnbp.destroy', $item->id) }}" method="POST"
                                            style="display:inline;"
                                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
        {{-- END Card --}}
    </div>

    <!-- Modal Pilihan Export -->
    <div class="modal fade" id="exportModal" tabindex="-1" role="dialog" aria-labelledby="exportModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exportModalLabel">Pilih Data untuk Diekspor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="GET" action="{{ route('pnbp.export') }}">
                        <div class="form-group">
                            <label for="bulanExport">Pilih Bulan</label>
                            <select class="form-control" id="bulanExport" name="bulan">
                                <option value="all">Seluruh Data</option>
                                @foreach ($listBulan as $item)
                                    <option value="{{ $item }}">
                                        {{ \Carbon\Carbon::createFromFormat('Y-m', $item)->translatedFormat('F Y') }}
                                    </option>
                                @endforeach
                            </select>

                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Eksport</button>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection



@push('scripts')
    <script src="{{ asset('sadmin2/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('sadmin2/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@endpush
