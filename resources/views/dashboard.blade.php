@extends('layout.main')
@section('title', 'Dashboard')
@section('content')

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-md-4 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-3">
                                    Total daftar perkara</div>
                                <h2 class="font-weight-bold text-dark">{{ $totalPerkara }}</h2>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-md-4 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-3">
                                    Total barang Rampasan</div>

                                <h2 class="font-weight-bold text-dark">{{ $totalBarangRampasan }}</h2>
                            </div>
                            <div class="col-auto">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-md-4 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-3">Total Data Tunggakan
                                </div>
                                <h2 class="font-weight-bold text-dark">{{ $totalTunggakan }}</h2>

                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            {{-- <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Realisasi PNBP per Kabupaten</h6>
                </div>
                <div class="card-body">
                    <canvas id="realisasiPNBPChart"></canvas>
                </div>
            </div> --}}

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                            <span class="mr-2">
                                <i class="fas fa-circle text-primary"></i> total barang rampasan yang diselesaikan
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-success"></i> Total barang rampasan yang belum diselesaikan
                            </span>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        {{-- <div class="row">
            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

                <!-- Project Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                    </div>
                    <div class="card-body">
                        <h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span>
                        </h4>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div> --}}

        <div class="row  ">
            <div class="col-12">
                <div class="card shadow border-left-warning">
                    <div class="card-header bg-warning text-white">
                        <h6 class="m-0 font-weight-bold">Makna Lambang BPA</h6>
                    </div>
                    <div class="card-body text-dark">
                        <div class="row align-items-center">
                            <!-- Kolom Kiri: Gambar -->
                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                <img src="{{ asset('image/logo_bpa.png') }}" alt="Logo BPA" class="img-fluid"
                                    style="max-height: 400px; object-fit: contain;">
                            </div>

                            <!-- Kolom Kanan: Teks Deskripsi -->
                            <div class="col-md-8">
                                <p><strong>Tiga Bintang:</strong> Trapsila Adhyaksa adalah pedoman nilai-nilai luhur
                                    yang menjadi landasan jiwa dalam menjalankan tugas dan fungsi jajaran BPA.</p>
                                <p><strong>Timbangan:</strong> Melambangkan keseimbangan dan keadilan yang berarti
                                    Pemulihan Aset yang adil dan seimbang.</p>
                                <p><strong>Batang Timbangan yang Stabil:</strong> Melambangkan kestabilan dan keamanan.
                                </p>
                                <p><strong>Dua Sisi Timbangan Yang Seimbang:</strong> Melambangkan keseimbangan antara
                                    kepentingan dan kebutuhan.</p>
                                <p><strong>Pedang Kearah Atas:</strong> Melambangkan kekuatan, keberanian, keadilan, dan
                                    perlindungan.</p>
                                <p><strong>Arti Kata:</strong><br>
                                    <em>Arthasampadya (अर्थसम्पद्य)</em> – Aset yang harus dipulihkan atau diperoleh
                                    kembali.
                                </p>
                                <p><strong>Warna:</strong><br>
                                    <strong>Emas:</strong> Kemewahan, kemakmuran, kejayaan.<br>
                                    <strong>Hitam:</strong> Melambangkan aset yang dikelola BPA.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row  mt-5">
            <div class="col-12">
                <div class="card shadow border-left-danger">
                    <div class="card-header bg-danger text-white">
                        <h6 class="m-0 font-weight-bold">Struktur Pemulihan Aset Kejati Lampung</h6>
                    </div>
                    <div class="card-body text-dark ">
                            <img src="{{ asset('image/Struktur.png') }}" alt="Struktur BPA" class="img-fluid w-100 px-5 "
                               >
                    </div>
                </div>
            </div>
        </div>

        <div class="row  mt-5 g-4">

            <!-- 1. Asisten Pemulihan Aset -->
            <div class="col-md-6 mb-4">
                <div class="card shadow h-100">
                    <div class="card-header bg-primary text-white">
                        <h5 class="m-0 font-weight-bold">ASISTEN PEMULIHAN ASET</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Tugas Pokok:</strong><br>
                            Membantu Kepala Badan Pemulihan Aset dalam perumusan kebijakan dan pelaksanaan teknis pemulihan
                            aset.
                        </p>
                        <p>📌 <strong>Fungsi:</strong></p>
                        <ul>
                            <li>Koordinasi internal dan eksternal antar instansi terkait.</li>
                            <li>Pelaksanaan monitoring dan evaluasi kegiatan pemulihan aset.</li>
                            <li>Penyusunan laporan dan dokumentasi kegiatan.</li>
                            <li>Pengawasan pelaksanaan tugas pusat-pusat di bawah Badan Pemulihan Aset.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- 2. Kasubid Penelusuran dan Perampasan Aset -->
            <div class="col-md-6 mb-4">
                <div class="card shadow h-100">
                    <div class="card-header bg-primary text-white">
                        <h6 class="m-0 font-weight-bold">KASUBID PENELURUSAN DAN PERAMPASAN ASET</h6>
                    </div>
                    <div class="card-body">
                        <p><strong>Tugas Pokok:</strong><br>
                            Melaksanakan penelusuran dan perampasan aset hasil tindak pidana sesuai ketentuan hukum.
                        </p>
                        <p>📌 <strong>Fungsi:</strong></p>
                        <ul>
                            <li>Pengumpulan informasi dan bukti aset hasil kejahatan.</li>
                            <li>Koordinasi dengan instansi dalam dan luar negeri untuk penelusuran aset.</li>
                            <li>Pelaksanaan proses hukum untuk perampasan aset.</li>
                            <li>Pencatatan dan dokumentasi hasil penelusuran/perampasan.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- 3. Kasubid Penyelesaian Aset -->
            <div class="col-md-6 mb-4">
                <div class="card shadow h-100">
                    <div class="card-header bg-primary text-white">
                        <h6 class="m-0 font-weight-bold">KASUBID PENYELESAIAN ASET</h6>
                    </div>
                    <div class="card-body">
                        <p><strong>Tugas Pokok:</strong><br>
                            Menyelesaikan status hukum dan administratif aset yang telah dirampas atau disita.
                        </p>
                        <p>📌 <strong>Fungsi:</strong></p>
                        <ul>
                            <li>Penyusunan skema pengembalian aset kepada negara, korban, atau pihak yang berhak.</li>
                            <li>Koordinasi penyelesaian hukum terkait kepemilikan aset.</li>
                            <li>Pendampingan proses lelang, hibah, atau pengalihan aset negara.</li>
                            <li>Dokumentasi dan pelaporan aset yang telah selesai diproses.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- 4. Kasubid Manajemen Aset -->
            <div class="col-md-6 mb-4">
                <div class="card shadow h-100">

                    <div class="card-header bg-primary text-white">
                        <h6 class="m-0 font-weight-bold">KASUBID MANAJEMEN ASET</h6>
                    </div>
                    <div class="card-body">
                        <p><strong>Tugas Pokok:</strong><br>
                            Mengelola aset yang sudah dirampas/disita secara administratif dan fisik.
                        </p>
                        <p>📌 <strong>Fungsi:</strong></p>
                        <ul>
                            <li>Pencatatan dan klasifikasi aset berdasarkan jenis, nilai, dan status hukum.</li>
                            <li>Pemeliharaan fisik dan keamanan aset dalam penguasaan negara.</li>
                            <li>Pembuatan laporan berkala terkait kondisi dan keberadaan aset.</li>
                            <li>Pengelolaan data aset melalui sistem informasi aset Kejaksaan.</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
    @endsection

    @push('scripts')
        <script src="{{ asset('sadmin2/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('sadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('sadmin2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('sadmin2/js/sb-admin-2.min.js') }}"></script>
        <script src="{{ asset('sadmin2/vendor/chart.js/Chart.min.js') }} "></script>
        <script src="{{ asset('sadmin2/js/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('sadmin2/js/demo/chart-pie-demo.js') }}"></script>
        <script>
            const ctx = document.getElementById('realisasiPNBPChart').getContext('2d');
            const realisasiPNBPChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Lampung Tengah', 'Lampung Selatan', 'Lampung Utara', 'Bandar Lampung'],
                    datasets: [{
                        label: 'Realisasi PNBP',
                        data: [367367536, 290000000, 250000000, 450000000],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(153, 102, 255, 0.6)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return 'Rp ' + value.toLocaleString('id-ID');
                                }
                            }
                        }
                    }
                }
            });
        </script>
    @endpush
