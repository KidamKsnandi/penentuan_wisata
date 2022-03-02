@extends('layouts.main')

@section('li')
    @foreach ($katego as $data)
        <a class="dropdown-item" href="/beranda/{{ $data->slug }}">{{ $data->nama_kategori }} </a>
    @endforeach
@endsection

@section('content')
    {{-- Beranda --}}
    <!-- Main News Slider Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 px-0">
                <div class="owl-carousel main-carousel position-relative">
                    @foreach ($artikel as $data) <?php error_reporting(error_reporting() & ~E_NOTICE); ?>
                        <?php $slide = json_decode($data->status, true); ?>
                        @if ($slide[0] == 'Rekomendasi' || isset($slide[1]) == 'Rekomendasi')
                            <div class="position-relative overflow-hidden" style="height: 500px;"> {{-- 800x500 --}}
                                <img class="img-fluid h-100" src="{{ $data->cover() }}"
                                    style="width: 1400px; height: 500px" style="object-fit: cover;">
                                <div class="overlay">
                                    <div class="mb-2">
                                        <p class="text-white"> By : <a class="text-white border-right" href="">
                                                {{ $data->user->name }}&nbsp;</a>
                                            {{ $data->created_at->format('d, M Y') }}
                                        </p>
                                    </div>
                                    <a class="h2 m-0 text-white text-uppercase font-weight-bold"
                                        href="/{{ $data->slug }}/selengkapnya">{{ $data->judul }}</a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

        </div>
    </div>
    <!-- Main News Slider End -->

    <!-- Rekomendasi Slider Start -->
    <div class="container-fluid pt-5 mb-3">
        <div class="container">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">Rekomendasi</h4>
            </div>
            <div class="owl-carousel news-carousel carousel-item-4 position-relative">
                @foreach ($wisata as $data) <?php error_reporting(error_reporting() & ~E_NOTICE); ?>
                <?php $status = json_decode($data->status, true); ?>
                @if($status[0] == 'Rekomendasi' || $status[1] == 'Rekomendasi')
                    <div class="position-relative overflow-hidden" style="height: 300px;"> {{-- 700x435 --}}
                        <img class="img-fluid h-100" src="{{ $data->cover() }}" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href="/beranda/{{ $data->kategori->slug }}">{{ $data->kategori->nama_kategori }}</a>
                                <small class="text-white">{{ $data->created_at->format('d, M Y') }}</small>
                            </div>
                            <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold"
                                href="/{{ $data->slug }}/detail">{{ $data->nama_wisata }}</a>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <!-- Rekomendasi News Slider End -->

    <!-- Populer Slider Start -->
    <div class="container-fluid pt-5 mb-3">
        <div class="container">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">Populer</h4>
            </div>
            <div class="owl-carousel news-carousel carousel-item-4 position-relative">
                @foreach ($wisata as $data) <?php error_reporting(error_reporting() & ~E_NOTICE); ?>
                <?php $status = json_decode($data->status, true); ?>
                @if($status[0] == 'Populer' || $status[1] == 'Populer')
                    <div class="position-relative overflow-hidden" style="height: 300px;"> {{-- 700x435 --}}
                        <img class="img-fluid h-100" src="{{ $data->cover() }}" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href="/beranda/{{ $data->kategori->slug }}">{{ $data->kategori->nama_kategori }}</a>
                                <small class="text-white">{{ $data->created_at->format('d, M Y') }}</small>
                            </div>
                            <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold"
                                href="/{{ $data->slug }}/detail">{{ $data->nama_wisata }}</a>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <!-- Populer News Slider End -->
@endsection
