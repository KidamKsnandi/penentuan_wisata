<?php
// $filetext = 'webcounter.txt';
// $counter = file($filetext);
// $pengunjung = $counter[0];
// $pengunjung++;
// $file = fopen($filetext, 'w');
// fwrite($file, json_encode($pengunjung));
// fclose($file);
use App\Models\Visitor;
$tanggal = date('Y-m-d');
$pengunjung = Visitor::first()->get();
foreach ($pengunjung as $value) {
    $tgl = $value->tanggal;
}
if(date('Y-m-d') == $tgl) {
    $hitung = Visitor::where('tanggal', $tgl)->get();
    foreach ($hitung as $item) {
        $jumlahnya = $item->jumlah + 1;
    $item->jumlah = $jumlahnya;
    $item->tanggal = $tanggal;
    $item->save();
    }
} else {
    $pengunjung = new Visitor;
    $pengunjung->jumlah = 1;
    $pengunjung->tanggal = $tanggal;
    $pengunjung->save();
}

$visitor = Visitor::all();
$jumlah_pengunjung = 0;
foreach ($visitor as $data) {
    $jumlah_pengunjung += $data->jumlah;
}
?>
{{-- @dd($jumlah_pengunjung) --}}
<!DOCTYPE html>
<html class="no-js">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Meghna One page parallax responsive HTML Template ">


    <title>Penentuan Wisata</title>

    <!-- Mobile Specific Meta
  ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <!-- <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png'" /> -->

    <!-- CSS
  ================================================== -->
    <!-- Fontawesome Icon font -->
    <link rel="stylesheet" href="{{ asset('welcome/plugins/themefisher-font/style.css') }}">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="{{ asset('welcome/plugins/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset('welcome/plugins/animate-css/animate.css') }}">
    <!-- Magnific popup css -->
    <link rel="stylesheet" href="{{ asset('welcome/plugins/magnific-popup/dist/magnific-popup.css') }}">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="{{ asset('welcome/plugins/slick-carousel/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('welcome/plugins/slick-carousel/slick/slick-theme.css') }}">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('welcome/css/style.css') }}">


</head>

<body id="body" data-spy="scroll" data-target=".navbar" data-offset="50">
    <!--
 Start Preloader
 ==================================== -->
    <div class="preloader">
        <div class="sk-cube-grid">
            <div class="sk-cube sk-cube1"></div>
            <div class="sk-cube sk-cube2"></div>
            <div class="sk-cube sk-cube3"></div>
            <div class="sk-cube sk-cube4"></div>
            <div class="sk-cube sk-cube5"></div>
            <div class="sk-cube sk-cube6"></div>
            <div class="sk-cube sk-cube7"></div>
            <div class="sk-cube sk-cube8"></div>
            <div class="sk-cube sk-cube9"></div>
        </div>
    </div>
    <!-- End Preloader
        ==================================== -->

    <!--
Welcome Slider
==================================== -->

    <section class="hero-area overlay" style="background-image: url('{{ asset('images/bg1.jpg') }}');">
        <!-- <video autoplay muted loop class="hero-video">
  <source src="images/banner/hero-video.mp4" type="video/mp4">
 </video> -->
        <div class="block">
            <span style="color: white">{{ date('l, d M Y') }} |</span>
            {{-- <span style="color: white">{{ date('Y-m-d') }} |</span> --}}
            <span style="color: white">Pengunjung : {{$jumlah_pengunjung}}</span>
            <h1 style="text-transform: uppercase">Selamat Datang </h1>
            <p>Website ini menyediakan informasi objek wisata seputar objek wisata di Bandung</p>
            <a data-scroll href="/beranda" class="btn btn-transparent">Kunjungi Wisata</a>
        </div>
    </section>

    <section class="bg-one about section">
        <div class="container">
            <div class="row">

                <!-- section title -->
                <div class="title text-center wow fadeIn" data-wow-duration="1500ms">
                    <h2>Kategori </h2>
                    <div class="border"></div>
                </div>
                <!-- /section title -->

                <!-- About item -->
                @foreach ($kategori as $data)
                    <div class="col-md-4 text-center wow fadeInUp" data-wow-duration="500ms">

                        <a href="beranda/{{ $data->slug }}">
                            <div class="block" style="background-image: url('{{ $data->background() }}');">
                                <!-- Express About Yourself -->
                                <div class="content text-center">
                                    <h3 class="ddd" style="color: white;">{{ $data->nama_kategori }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                <!-- End About item -->

            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- End section -->

    <section class="portfolio section" id="portfolio">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12">
                    <!-- section title -->
                    <div class="title text-center">
                        <h2>Galeri <span class="color">Wisata</span></h2>
                        <div class="border"></div>
                    </div>
                    <!-- /section title -->
                </div> <!-- /end col-lg-12 -->
            </div> <!-- end row -->
            <div class="row filtr-container">
                @foreach ($galeri as $data)
                    <div class="col-lg-4 wow fadeInUp" data-wow-duration="500ms" data-category="development">
                        <div class="portfolio-block">
                            <img class="img-responsive" src="{{ $data->galeri() }}" alt=""
                                style="width: 1000px; height: 250px">
                            <div class="caption">
                                <a class="search-icon image-popup" data-effect="mfp-with-zoom"
                                    href="{{ $data->galeri() }}" data-lightbox="image-1">
                                    <i class="tf-ion-android-search"></i>
                                </a>
                                <h4><a
                                        href="{{ $data->wisata->slug }}/detail">{{ $data->wisata->nama_wisata }}</a>
                                </h4>
                                <p>{!! substr($data->wisata->deskripsi_wisata, 0, 60) !!}...</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div> <!-- end container -->
    </section> <!-- End section -->

    {{-- <section class="portfolio section" id="portfolio">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12">
                    <!-- section title -->
                    <div class="title text-center">
                        <h2>Gal<span class="color">eri</span></h2>
                        <div class="border"></div>
                    </div>
                    <!-- /section title -->
                </div> <!-- /end col-lg-12 -->
            </div> <!-- end row -->
            <div class="row filtr-container">
                @foreach ($galeri as $data)
                    <div class="col-md-4 filtr-item" data-category="development">
                        <div class="portfolio-block">
                            <img class="img-responsive" src="{{ $data->galeri() }}" alt=""
                                style="width: 500px; height: 250px">
                            <div class="caption">
                                <a class="search-icon image-popup" data-effect="mfp-with-zoom"
                                    href="{{ $data->galeri() }}" data-lightbox="image-1">
                                    <i class="tf-ion-android-search"></i>
                                </a>
                                <h4><a
                                        href="{{ $data->wisata->slug }}/detail">{{ $data->wisata->nama_wisata }}</a>
                                </h4>
                                <p>{!! substr($data->wisata->deskripsi_wisata, 0, 60) !!}...</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div> <!-- end container -->
    </section> --}}

    <!-- end Contact Area
  ========================================== -->

    <footer id="footer" class="bg-one">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-duration="500ms">
                <div class="col-lg-12">

                    <!-- Footer Social Links -->
                    <div class="social-icon">
                        <ul class="list-inline">
                            <li><a href="https://web.facebook.com/kidnan.creativity/"><i
                                        class="tf-ion-social-facebook"></i></a>
                            </li>
                            <li><a href="https://twitter.com/ksnnd06"><i class="tf-ion-social-twitter"></i></a>
                            </li>
                            <li><a href="https://www.instagram.com/kidamkusnandi06/"><i
                                        class="tf-ion-social-instagram"></i></a></li>
                        </ul>
                    </div>
                    <!--/. End Footer Social Links -->

                    <!-- copyright -->
                    <div class="copyright text-center">
                        <br />
                        <script>
                            document.write(new Date().getFullYear())
                        </script> <a href="#">Penentuan Wisata</a>. Tugas PKL Di Buat Oleh <a
                            href="https://www.instagram.com/kidamkusnandi06/">Kidam Kusnandi</a>
                        </p>
                    </div>
                    <!-- /copyright -->

                </div> <!-- end col lg 12 -->
            </div> <!-- end row -->
        </div> <!-- end container -->
    </footer> <!-- end footer -->










    <!--
  Essential Scripts
  =====================================-->

    <!-- Main jQuery -->
    <script type="text/javascript" src="{{ asset('welcome/plugins/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.1 -->
    <script type="text/javascript" src="{{ asset('welcome/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- Slick Carousel -->
    <script type="text/javascript" src="{{ asset('welcome/plugins/slick-carousel/slick/slick.min.js') }}"></script>
    <!-- Portfolio Filtering -->
    <script type="text/javascript" src="{{ asset('welcome/plugins/filterzr/jquery.filterizr.min.js') }}"></script>
    <!-- Smooth Scroll -->
    <script type="text/javascript" src="{{ asset('welcome/plugins/smooth-scroll/dist/js/smooth-scroll.min.js') }}">
    </script>
    <!-- Magnific popup -->
    <script type="text/javascript" src="{{ asset('welcome/plugins/magnific-popup/dist/jquery.magnific-popup.min.js') }}">
    </script>
    <!-- Sticky Nav -->
    <script type="text/javascript" src="{{ asset('welcome/plugins/Sticky/jquery.sticky.js') }}"></script>
    <!-- Number Counter Script -->
    <script type="text/javascript" src="{{ asset('welcome/plugins/count-to/jquery.countTo.js') }}"></script>
    <!-- wow.min Script -->
    <script type="text/javascript" src="{{ asset('welcome/plugins/wow/dist/wow.min.js') }}"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="{{ asset('welcome/js/script.js') }}"></script>

</body>

</html>
