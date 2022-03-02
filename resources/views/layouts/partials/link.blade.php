<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Penentuan Wisata</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('front/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css" rel="stylesheet"> --}}

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}"
        type="text/css">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('front/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">

    {{-- CSS Fancybox --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('fancybox/jquery.fancybox.min.css') }}">
</head>

<body>

    <!-- Topbar Start -->
    <div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center bg-dark px-lg-5">
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-n2">
                        <li class="nav-item border-secondary">
                            <small class="nav-link text-body small">{{ date('l, d M Y') }}</small>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 text-right d-none d-md-block">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-auto mr-n2">
                        <li class="nav-item">
                            <a class="nav-link text-body" href="https://twitter.com/ksnnd06"><small
                                    class="fab fa-twitter"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="https://web.facebook.com/kidnan.creativity/"><small
                                    class="fab fa-facebook-f"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="https://www.instagram.com/kidamkusnandi06/"><small
                                    class="fab fa-instagram"></small></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
            <a href="index.html" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-4 text-uppercase text-primary">Wisata&nbsp;<span
                        class="text-white font-weight-normal">Bandung</span></h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a class="nav-item nav-link {{ Request::is('beranda') ? 'active' : '' }}"
                        href="/beranda">Beranda</a>
                    <a class="nav-item nav-link {{ Request::is('objek-wisata') ? 'active' : '' }}"
                        href="/objek-wisata">Objek Wisata</a>
                    <a class="nav-item nav-link {{ Request::is('artikel') || Request::is('artikel/all') ? 'active' : '' }}"
                        href="/artikel" class="nav-item nav-link">Artikel</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    {{-- Isi --}}
    @yield('content')

    <!-- Footer Start -->
    <div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
        <div class="row py-4">
            <div class="col-lg-5 col-md-6 mb-5">
                <h2 class="mb-4 text-white text-uppercase font-weight-bold text-center">
                    <a href="/">
                        <b>
                            <span class="text-primary">Penentuan</span><span class="text-light"> Wisata</span>
                        </b>
                    </a>
                </h2>
                <div class="mb-3">
                    <p class="small text-body text-uppercase font-weight-medium text-center" href="">
                        Website ini bertujuan untuk memuat informasi tentang objek wisata di bandung untuk memudahkan
                        pengunjung dalam menentukan objek wisata yang ingin di pilih</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Hubungi Saya</h5>
                <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i>Citamiang Kidul, Bandung,
                    Indonesia</p>
                <p class="font-weight-medium"><i class="fa fa-phone-alt mr-2"></i>+62 838 074 64449</p>
                <p class="font-weight-medium"><i class="fa fa-envelope mr-2"></i>kidamkusnandi606@gmail.com</p>
                <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">Follow Us</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="https://twitter.com/ksnnd06"><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2"
                        href="https://web.facebook.com/kidnan.creativity/"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2"
                        href="https://www.instagram.com/kidamkusnandi06/"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Update Selanjutnya</h5>
                <p class="font-weight-medium">Akan Datang :)</p>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
        <p class="m-0 text-center">&copy; <a href="#">Penentuan Wisata</a>. Tugas PKL Di Buat Oleh <a
                href="https://www.instagram.com/kidamkusnandi06/">Kidam Kusnandi</a>
        </p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> --}}
    <script src="{{ asset('front/js/jquery.min.js') }}" type="text/javascript"></script>
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script> --}}
    <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('front/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('front/js/main.js') }}"></script>

    {{-- Javascript Fancybox --}}
    <script src="{{ asset('fancybox/jquery.fancybox.min.js') }}"></script>
    <script type="text/javascript">
        $("[data-fancybox]").fancybox({});
    </script>
    @yield('js')
</body>

</html>
