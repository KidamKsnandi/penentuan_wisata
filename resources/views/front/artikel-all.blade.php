@extends('layouts.main')

@section('content')

    <!-- News With Sidebar Start -->
    <div class="container-fluid pt-5 mb-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold"> Semua Artikel</h4>
                            </div>
                        </div>
                        @foreach ($artikel as $data)
                            <div class="col-lg-4">
                                <div class="position-relative mb-3">
                                    <img class="img-fluid w-100" src="{{ $data->cover() }}"
                                        style="object-fit: cover; width:350px; height:220px;">
                                    <div class="bg-white border border-top-0 p-4">
                                        <div class="mb-2">
                                            <small class="text-body border-right">Author : {{ $data->user->name }}
                                                &nbsp;</small>
                                            <small> {{ $data->created_at->format('d, M Y') }}</small>
                                        </div>
                                        <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold"
                                            href="/{{ $data->slug }}/selengkapnya">{{ substr($data->judul, 0, 58) }}...</a>
                                        <p class="m-0">{!! substr($data->konten, 0, 100) !!}....</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->

@endsection
