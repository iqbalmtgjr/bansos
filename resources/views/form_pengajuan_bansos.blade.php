<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('/assets/img/favicon.png') }}">
    <title>
        Formulir Pengajuan Bansos - {{ config('app.name', 'Laravel') }}
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('/assets/css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="">
    <!-- Navbar -->
    <nav
        class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
        <div class="container">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="../pages/dashboard.html">
                Bansos.Id
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon mt-2">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </span>
            </button>
            {{-- <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav mx-auto ms-xl-auto me-xl-7">
                    <li class="nav-item">
                        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white"
                            href="../pages/dashboard.html">
                            Bansos.Id
                        </a>
                    </li>
                </ul>
                <li class="nav-item d-flex align-items-center">
                    <a class="btn btn-round btn-sm mb-0 btn-outline-white me-2" target="_blank"
                        href="https://www.creative-tim.com/builder?ref=navbar-soft-ui-dashboard">Online Builder</a>
                </li>
                <ul class="navbar-nav d-lg-block d-none">
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/product/soft-ui-dashboard"
                            class="btn btn-sm btn-round mb-0 me-1 bg-gradient-light">Free download</a>
                    </li>
                </ul>
            </div> --}}
        </div>
    </nav>
    <!-- End Navbar -->
    <main class="main-content  mt-0">
        <section class="min-vh-100 mb-8">
            <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
                style="background-image: url('../assets/img/curved-images/curved14.jpg');">
                <span class="mask bg-gradient-dark opacity-6"></span>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 text-center mx-auto">
                            <h1 class="text-white mb-2 mt-5">Selamat Datang di {{ config('app.name', 'Laravel') }}</h1>
                            <p class="text-lead text-white">Isilah formulir dibawah ini untuk pengajuan bantuan sosial
                                bagi masyarakat yang membutuhkan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                    @if (empty($get_id))
                        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                            <div class="card z-index-0">
                                <div class="card-header text-center pt-4">
                                    <h5>Formulir Bantuan Sosial</h5>
                                </div>
                                <div class="card-body">
                                    <form role="form text-left" action="{{ url('/') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="mb-3">
                                            <input name="nik" type="number" class="form-control"
                                                placeholder="Cek NIK anda" aria-label="Name"
                                                aria-describedby="email-addon">
                                        </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Cek
                                        Sekarang</button>
                                </div>
                                </form>
                            @else
                                <div class="col-12 mx-auto">
                                    <div class="card z-index-0">
                                        <div class="card-header text-center pt-4">
                                            <h5>Formulir Bantuan Sosial</h5>
                                        </div>
                                        <div class="card-body">
                                            <form role="form text-left" action="{{ url('/pengajuan/input') }}"
                                                method="POST">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="penduduk_id" value="{{ $get_id }}">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="">Jenis Bansos</label>
                                                            <select class="form-control" name="jenis_bansos_id">
                                                                <option value="">-- Pilih Jenis Bansos --</option>
                                                                @foreach ($jenis_bansos as $item)
                                                                    <option value="{{ $item->id }}">
                                                                        {{ $item->nama_bansos }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('jenis_bansos_id')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <div id="emailHelp" class="form-text text-danger">
                                                                        {{ $message }}
                                                                    </div>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="">Upload Surat Keterangan Tidak
                                                                Mampu</label>
                                                            <input name="surat_ket_tidak_mampu" type="file"
                                                                class="form-control" aria-label="Name">
                                                            @error('surat_ket_tidak_mampu')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <div id="emailHelp" class="form-text text-danger">
                                                                        {{ $message }}
                                                                    </div>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="">Upload Foto Kartu Keluarga</label>
                                                            <input name="foto_kk" type="file" class="form-control"
                                                                aria-label="Name">
                                                            @error('foto_kk')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <div id="emailHelp" class="form-text text-danger">
                                                                        {{ $message }}
                                                                    </div>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="">Upload Foto KTP</label>
                                                            <input name="foto_ktp" type="file"
                                                                class="form-control" aria-label="Name">
                                                            @error('foto_ktp')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <div id="emailHelp" class="form-text text-danger">
                                                                        {{ $message }}
                                                                    </div>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="">Upload Pas Foto</label>
                                                            <input name="foto_diri" type="file"
                                                                class="form-control" aria-label="Name">
                                                            @error('foto_diri')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <div id="emailHelp" class="form-text text-danger">
                                                                        {{ $message }}
                                                                    </div>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="">Upload Foto Rumah Tampak
                                                                Depan</label>
                                                            <input name="foto_rmh_tampak_dpn	" type="file"
                                                                class="form-control" aria-label="Name">
                                                            @error('foto_rmh_tampak_dpn ')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <div id="emailHelp" class="form-text text-danger">
                                                                        {{ $message }}
                                                                    </div>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="">Upload Foto Rumah Tampak
                                                                Belakang</label>
                                                            <input name="foto_rmh_tampak_belakang" type="file"
                                                                class="form-control" aria-label="Name">
                                                            @error('foto_rmh_tampak_belakang')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <div id="emailHelp" class="form-text text-danger">
                                                                        {{ $message }}
                                                                    </div>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="">Luas Bangunan</label>
                                                            <input name="luas_bangunan" type="number"
                                                                class="form-control" aria-label="Name"
                                                                placeholder="Masukkan luas bangunan.">
                                                            <div id="emailHelp" class="form-text text-warning">
                                                                Catatan: Dalam Meter Persegi
                                                            </div>
                                                            @error('luas_bangunan')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <div id="emailHelp" class="form-text text-danger">
                                                                        {{ $message }}
                                                                    </div>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="">Status Rumah</label>
                                                            <input name="status_rumah" type="file"
                                                                class="form-control" aria-label="Name">
                                                            @error('status_rumah')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <div id="emailHelp" class="form-text text-danger">
                                                                        {{ $message }}
                                                                    </div>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Ajukan
                                                Sekarang</button>
                                        </div>
                                        </form>
                    @endif
                </div>
            </div>
            </div>
            </div>
            </div>
        </section>
    </main>
    <!--   Core JS Files   -->
    <script src="{{ asset('/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('/assets/js/soft-ui-dashboard.min.js?v=1.0.7') }}"></script>
</body>

</html>
