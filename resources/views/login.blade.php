<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('sadmin2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('sadmin2/css/sb-admin-2.min.css') }} " rel="stylesheet">
    <style>
        .login-card {
            max-width: 500px;
            margin: auto;
            margin-top: 60px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .login-logo {
            width: 500px;
            margin-bottom: 20px;
        }

        body {
            background: linear-gradient(to right, #4e73df, #224abe);
        }
    </style>
    <script>
    // Ini akan memanipulasi riwayat browser sehingga tidak bisa kembali
    if (window.history && window.history.pushState) {
        window.history.pushState('forward', '', window.location.href);
        window.onpopstate = function() {
            window.location.href = "{{ route('login.form') }}";
        };
    }
</script>
</head>

<body>
    <div class="container">
        <div class="card login-card o-hidden border-0">
            <div class="card-body p-5">
                <div class="text-center">
                    <img src="{{ asset('image/LOGO KEJAKSAAN.png') }}" alt="Logo" class="img-fluid login-logo">
                    <h1 class="h5 text-dark mb-4">Kejaksaan Tinggi Lampung</h1>
                </div>

                <hr>

                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label class="text-dark">Username</label>
                        <input type="text" name="name" class="form-control" placeholder="Masukkan Username"
                            required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="text-dark">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan Password"
                            required>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Log In</button>

                    @if (session('error'))
                        <div class="alert alert-danger mt-3 text-center">
                            {{ session('error') }}
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</body>

</html>
