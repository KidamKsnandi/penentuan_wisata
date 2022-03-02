<!DOCTYPE html>
<html>
    <head>
        <title>Halaman Tidak Ditemukan</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}"
        type="text/css">

        <!-- Libraries Stylesheet -->
        <link href="{{ asset('front/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">


        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: blue;
                background: black;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }

            h1 {
                font-size: 100px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div>
                <h1>404</h1>
            </div>
            <div class="content">
                <div class="title">Oops.. Halaman tidak ditemukan.</div>
            </div>
            <div>
                <a href="javascript:history.back()" class="btn btn-info"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
        </div>
        <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    </body>
</html>
