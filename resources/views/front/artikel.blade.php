@extends('layouts.main')

@section('content')

    <!-- News With Sidebar Start -->
    <div class="container-fluid pt-5 mb-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold">Artikel</h4>
                                <a class="text-secondary font-weight-medium text-decoration-none" href="/artikel/all">Lihat
                                    Semua</a>
                            </div>
                        </div>
                        @php $no=1; @endphp
                        @foreach ($artikel as $data)
                            @php $no++; @endphp
                            @if ($no < 6)
                                <div class="col-lg-6">
                                    <div class="position-relative mb-3">
                                        <img class="img-fluid w-100" src="{{ $data->cover() }}"
                                            style="object-fit: cover; width:350px; height:220px;">
                                        <div class="bg-white border border-top-0 p-4">
                                            <div class="mb-2">
                                                <small class="text-body border-right">Author :
                                                    {{ $data->user->name }} &nbsp;</small>
                                                <small>{{ $data->created_at->format('d, M Y') }}</small>
                                            </div>
                                            <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold"
                                                href="/{{ $data->slug }}/selengkapnya">{{ substr($data->judul, 0, 58) }}...</a>
                                            <p class="m-0">{!! substr($data->konten, 0, 100) !!}....</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-4">

                    <!-- Popular News Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Artikel Trending</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            {{ $arkel->links() }}
                            @foreach ($arkel as $data) <?php error_reporting(error_reporting() & ~E_NOTICE); ?>
                                <?php $slide = json_decode($data->status, true);?>
                                @if ($slide[0] == 'Trending' || isset($slide[1]) == 'Trending')
                                        <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                            <img class="img-fluid" src="{{ $data->cover() }}"
                                                style="width: 110px; height: 110px;" alt="">
                                            <div
                                                class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold"
                                                    href="/{{ $data->slug }}/selengkapnya">{{ substr($data->judul, 0,40) }}...</a>
                                                <div class="mt-3">
                                                    <small class="text-body">Author : {{ $data->user->name }}</small>
                                                </div>
                                            </div>
                                        </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <!-- Popular News End -->
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->

@endsection
