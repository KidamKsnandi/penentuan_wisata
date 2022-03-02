@extends('layouts.partials.link')
<style type="text/css">
    .galeri img {
        width: 20%;
        height: auto;
        border-radius: 5px;
        cursor: pointer;
        transition: .3s;
    }

</style>
@section('content')
    <div class="container-fluid mt-3 mb-3 pt-3">
        <div class="container">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">Galeri Wisata {{ $wisata->nama_wisata }} </h4>
                <h4><a class="badge badge-danger text-uppercase float-right font-weight-semi-bold p-2 mr-2 mt-2"
                        href="javascript:history.back()"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a></h4>
            </div>
            <div class="container-fluid">
                <div class="row no-glutters">
                    @foreach ($galeri as $data)
                        @if (!$data)
                            <h3 style="text-align: center; color: red;">Wisata belum di kasih gambar di galeri ngab :'</h3>
                        @else
                            <div class="col-sm-6 col-md-4"><br>
                                <div class="galeri">
                                    <a href="{{ $data->galeri() }}" data-fancybox="group">
                                        <img src=" {{ $data->galeri() }}" style="width:350px; height:220px;" alt="Galeri">
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
