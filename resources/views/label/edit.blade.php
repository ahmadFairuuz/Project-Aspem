@extends('layout.main')
@section('title', 'Data Label')
@section('content')

    <div class="container-fluid px-4">
        <h1 class="h3 mb-0 text-gray-800">Label Barang Bukti</h1>
        <ol class="breadcrumb my-3">
            <li class="breadcrumb-item"><a href="{{ route('label.index') }}">Aspem</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-edit me-1"></i>
                Form Edit Data Aspem
            </div>
            <div class="card-body">
                <form action="{{ route('label.update', $id->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="register_perkara">Register Perkara:</label>
                        <input type="text" class="form-control @error('register_perkara') is-invalid @enderror"
                            name="register_perkara" value="{{ old('register_perkara', $id->register_perkara) }}">
                        @error('register_perkara')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="barang_bukti">Barang Bukti:</label>
                        <input type="text" class="form-control @error('barang_bukti') is-invalid @enderror"
                            name="barang_bukti" value="{{ old('barang_bukti', $id->barang_bukti) }}">
                        @error('barang_bukti')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="tanggal_barbuk">Tanggal Barbuk:</label>
                        <input type="date" class="form-control @error('tanggal_barbuk') is-invalid @enderror"
                            name="tanggal_barbuk" value="{{ old('tanggal_barbuk', $id->tanggal_barbuk) }}">
                        @error('tanggal_barbuk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="keterangan">Keterangan:</label>
                        <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan">{{ old('keterangan', $id->keterangan) }}</textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success mt-3">Update</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
@endsection

<script src="sadmin2/vendor/jquery/jquery.min.js"></script>
<script src="sadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="sadmin2/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="sadmin2/js/sb-admin-2.min.js"></script>
<script src="sadmin2/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="sadmin2/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="sadmin2/js/demo/datatables-demo.js"></script>
