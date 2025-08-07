@extends('layout.main')
@section('title', 'Tambah Label')
@section('content')

    <div class="container-fluid px-4">
        <h1 class="h3 mb-0 text-gray-800">Label Barang Bukti</h1>
        <ol class="breadcrumb my-3">
            <li class="breadcrumb-item"><a href="{{ route('label.index') }}">Label</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Form Tambah Data Label
            </div>
            <div class="card-body">
                <form action="{{ route('label.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="register_perkara">Register Perkara:</label>
                        <input type="text" class="form-control @error('register_perkara') is-invalid @enderror"
                            name="register_perkara" value="{{ old('register_perkara') }}">
                        @error('register_perkara')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="satuan_kerja">Satuan Kerja</label>
                        @if ($user->hasGlobalAccess())
                            <select name="satuan_kerja" class="form-control @error('satuan_kerja') is-invalid @enderror">
                                <option value="">-- Pilih Satuan Kerja --</option>
                                @foreach ($satkerUsers as $item)
                                    <option value="{{ $item->satuan_kerja }}"
                                        {{ old('satuan_kerja') == $item->satuan_kerja ? 'selected' : '' }}>
                                        {{ $item->satuan_kerja }}
                                    </option>
                                @endforeach
                            </select>
                        @else
                            <input type="text" class="form-control" value="{{ $user->satuan_kerja }}" readonly>
                            <input type="hidden" name="satuan_kerja" value="{{ $user->satuan_kerja }}">
                        @endif
                        @error('satuan_kerja')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="barang_bukti">Barang Bukti:</label>
                        <input type="text" class="form-control @error('barang_bukti') is-invalid @enderror"
                            name="barang_bukti" value="{{ old('barang_bukti') }}">
                        @error('barang_bukti')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="tanggal_barbuk">Tanggal Barbuk:</label>
                        <input type="date" class="form-control @error('tanggal_barbuk') is-invalid @enderror"
                            name="tanggal_barbuk" value="{{ old('tanggal_barbuk') }}">
                        @error('tanggal_barbuk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="keterangan">Keterangan:</label>
                        <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan">{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                </form>
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
