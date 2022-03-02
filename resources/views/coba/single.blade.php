<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BizNews - Free News Website Template</title>
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
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center bg-dark px-lg-5">
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-n2">
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small" href="#">{{ date('l, d M Y') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body small" href="#">Login</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 text-right d-none d-md-block">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-auto mr-n2">
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-twitter"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-facebook-f"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-instagram"></small></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="row align-items-center bg-white py-3 px-lg-5">
            <div class="col-lg-4">
                <a href="index.html" class="navbar-brand p-0 d-none d-lg-block">
                    <h1 class="m-0 display-4 text-uppercase text-info">Pariwisata&nbsp;<span
                            class="text-secondary font-weight-normal">Bandung</span></h1>
                </a>
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
                    <a href="index.html" class="nav-item nav-link active">Beranda</a>
                    <a href="category.html" class="nav-item nav-link">Objek Wisata</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Kategori</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="#" class="dropdown-item">Menu item 1</a>
                            <a href="#" class="dropdown-item">Menu item 2</a>
                            <a href="#" class="dropdown-item">Menu item 3</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Artikel</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- News With Sidebar Start -->
    <div class="container-fluid mt-5 mb-3 pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- News Detail Start -->
                    <div class="position-relative mb-3">
                        <img class="img-fluid w-100" src="{{ asset('front/img/news-700x435-1.jpg') }}"
                            style="object-fit: cover;">
                        <div class="bg-white border border-top-0 p-4">
                            <div class="mb-3">
                                <small class="text-body" href="">Author : <a class="text-body border-right"
                                        href=""> Kidam
                                        Kusnandi&nbsp;</a> Jan 01, 2045</small>
                            </div>
                            <h1 class="mb-3 text-secondary text-uppercase font-weight-bold">Lorem ipsum dolor sit amet
                                elit vitae porta diam...</h1>
                            <p>Sadipscing labore amet rebum est et justo gubergren. Et eirmod ipsum sit diam ut
                                magna lorem. Nonumy vero labore lorem sanctus rebum et lorem magna kasd, stet
                                amet magna accusam consetetur eirmod. Kasd accusam sit ipsum sadipscing et at at
                                sanctus et. Ipsum sit gubergren dolores et, consetetur justo invidunt at et
                                aliquyam ut et vero clita. Diam sea sea no sed dolores diam nonumy, gubergren
                                sit stet no diam kasd vero.</p>
                            <p>Voluptua est takimata stet invidunt sed rebum nonumy stet, clita aliquyam dolores
                                vero stet consetetur elitr takimata rebum sanctus. Sit sed accusam stet sit
                                nonumy kasd diam dolores, sanctus lorem kasd duo dolor dolor vero sit et. Labore
                                ipsum duo sanctus amet eos et. Consetetur no sed et aliquyam ipsum justo et,
                                clita lorem sit vero amet amet est dolor elitr, stet et no diam sit. Dolor erat
                                justo dolore sit invidunt.</p>
                            <h3 class="text-uppercase font-weight-bold mb-3">Lorem ipsum dolor sit amet elit</h3>
                            <img class="img-fluid w-50 float-left mr-4 mb-2"
                                src="{{ asset('front/img/news-800x500-1.jpg') }}">
                            <p>Diam dolor est labore duo invidunt ipsum clita et, sed et lorem voluptua tempor
                                invidunt at est sanctus sanctus. Clita dolores sit kasd diam takimata justo diam
                                lorem sed. Magna amet sed rebum eos. Clita no magna no dolor erat diam tempor
                                rebum consetetur, sanctus labore sed nonumy diam lorem amet eirmod. No at tempor
                                sea diam kasd, takimata ea nonumy elitr sadipscing gubergren erat. Gubergren at
                                lorem invidunt sadipscing rebum sit amet ut ut, voluptua diam dolores at
                                sadipscing stet. Clita dolor amet dolor ipsum vero ea ea eos. Invidunt sed diam
                                dolores takimata dolor dolore dolore sit. Sit ipsum erat amet lorem et, magna
                                sea at sed et eos. Accusam eirmod kasd lorem clita sanctus ut consetetur et. Et
                                duo tempor sea kasd clita ipsum et.</p>
                            <h5 class="text-uppercase font-weight-bold mb-3">Lorem ipsum dolor sit amet elit</h5>
                            <img class="img-fluid w-50 float-right mr-4 mb-2"
                                src="{{ asset('front/img/news-800x500-2.jpg') }}">
                            <p>Diam dolor est labore duo invidunt ipsum clita et, sed et lorem voluptua tempor
                                invidunt at est sanctus sanctus. Clita dolores sit kasd diam takimata justo diam
                                lorem sed. Magna amet sed rebum eos. Clita no magna no dolor erat diam tempor
                                rebum consetetur, sanctus labore sed nonumy diam lorem amet eirmod. No at tempor
                                sea diam kasd, takimata ea nonumy elitr sadipscing gubergren erat. Gubergren at
                                lorem invidunt sadipscing rebum sit amet ut ut, voluptua diam dolores at
                                sadipscing stet. Clita dolor amet dolor ipsum vero ea ea eos. Invidunt sed diam
                                dolores takimata dolor dolore dolore sit. Sit ipsum erat amet lorem et, magna
                                sea at sed et eos. Accusam eirmod kasd lorem clita sanctus ut consetetur et. Et
                                duo tempor sea kasd clita ipsum et. Takimata kasd diam justo est eos erat
                                aliquyam et ut.</p>
                        </div>
                    </div>
                    <!-- News Detail End -->
                </div>

                <div class="col-lg-4">

                    <!-- Popular News Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Tranding News</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="{{ asset('front/img/news-110x110-1.jpg') }}" alt="">
                                <div
                                    class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="">Lorem
                                        ipsum dolor sit amet elit...</a>
                                    <div class="mt-3">
                                        <small>Author : <a class="text-body" href=""> Kidam Kusnandi</a></small>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="{{ asset('front/img/news-110x110-2.jpg') }}" alt="">
                                <div
                                    class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="">Lorem
                                        ipsum dolor sit amet elit...</a>
                                    <div class="mt-3">
                                        <small>Author : <a class="text-body" href=""> Kidam Kusnandi</a></small>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="{{ asset('front/img/news-110x110-3.jpg') }}" alt="">
                                <div
                                    class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="">Lorem
                                        ipsum dolor sit amet elit...</a>
                                    <div class="mt-3">
                                        <small>Author : <a class="text-body" href=""> Kidam Kusnandi</a></small>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="{{ asset('front/img/news-110x110-4.jpg') }}" alt="">
                                <div
                                    class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="">Lorem
                                        ipsum dolor sit amet elit...</a>
                                    <div class="mt-3">
                                        <small>Author : <a class="text-body" href=""> Kidam Kusnandi</a></small>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="{{ asset('front/img/news-110x110-5.jpg') }}" alt="">
                                <div
                                    class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="">Lorem
                                        ipsum dolor sit amet elit...</a>
                                    <div class="mt-3">
                                        <small>Author : <a class="text-body" href=""> Kidam Kusnandi</a></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Popular News End -->

                    <!-- Tags Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Tags</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <div class="d-flex flex-wrap m-n1">
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Politics</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Corporate</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Health</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Education</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Science</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Foods</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Travel</a>
                            </div>
                        </div>
                    </div>
                    <!-- Tags End -->
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
        <div class="row py-4">
            <div class="col-lg-4 col-md-6 mb-5">
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
            <div class="col-lg-4 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold text-center">Kategori</h5>
                <div class="m-n1">
                    <a href="" class="btn btn-sm btn-secondary m-1">Politics</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Business</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Corporate</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Business</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Health</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Education</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Science</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Business</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Foods</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Entertainment</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Travel</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Lifestyle</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Politics</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Business</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Corporate</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Business</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Health</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Education</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Science</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Business</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Foods</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Hubungi Saya</h5>
                <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i>Citamiang Kidul, Bandung,
                    Indonesia</p>
                <p class="font-weight-medium"><i class="fa fa-phone-alt mr-2"></i>+62 838 074 64449</p>
                <p class="font-weight-medium"><i class="fa fa-envelope mr-2"></i>kidamkusnandi606@gmail.com</p>
                <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">Follow Us</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i
                            class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
        <p class="m-0 text-center">&copy; <a href="#">Penentuan Wisata</a>. Tugas PKL Di Buat Oleh <a href="https://www.instagram.com/kidamkusnandi06/">Kidam Kusnandi</a>
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
</body>

</html>
