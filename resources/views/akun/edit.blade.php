@extends('layout.main')
@section('title', 'Edit Label')
@section('content')

    <div class="container-fluid px-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Akun</h1>
        <ol class="breadcrumb my-3">
            <li class="breadcrumb-item"><a href="{{ route('akun.index') }}">Akun</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-edit me-1"></i>
                Form Edit Akun
            </div>
            <div class="card-body">
                <form action="{{ route('akun.update', $id->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label>Username</label>
                        <input type="text" value="{{ $id->name }}" class="form-control bg-light text-muted"
                            readonly>
                    </div>

                    <div class="form-group mb-3">
                        <label>Role</label>
                        <input type="text" value="{{ $id->role }}" class="form-control bg-light text-muted" readonly>
                    </div>

                    <div class="form-group mb-3">
                        <label>Satuan Kerja</label>
                        <input type="text" value="{{ $id->satuan_kerja }}" class="form-control bg-light text-muted"
                            readonly>
                    </div>

                    <div class="form-group">
                        <label>Password Baru</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah password.</small>
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

@push('scripts')
    <script src="sadmin2/vendor/jquery/jquery.min.js"></script>
    <script src="sadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="sadmin2/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="sadmin2/js/sb-admin-2.min.js"></script>
    <script src="sadmin2/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="sadmin2/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="sadmin2/js/demo/datatables-demo.js"></script>
@endpush
