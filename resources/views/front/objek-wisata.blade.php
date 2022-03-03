@extends('layouts.main')

@section('li')
    @foreach ($katego as $data)
        <a class="dropdown-item" href="/objek-wisata/{{ $data->slug }}">{{ $data->nama_kategori }} </a>
    @endforeach
@endsection

@section('content')
    <div class="container-fluid pt-5 mb-3">
        <div class="container">
            <div class="section-title"> <?php error_reporting(error_reporting() & ~E_NOTICE); ?>
                <h4 class="m-0 text-uppercase font-weight-bold">Objek Wisata @if ($kagori) {{ $kagori->nama_kategori }} @endif</h4>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        @foreach ($wisata as $data)
                            <div class="col-lg-3 pt-3 mb-3">
                                <div class="position-relative overflow-hidden" style="height: 300px;"> {{-- 700x435 --}}
                                    <img class="img-fluid h-100" src="{{ $data->cover() }}" style="object-fit: cover;">
                                    <div class="overlay">
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                href="/objek-wisata/{{ $data->kategori->slug }}">{{ $data->kategori->nama_kategori }}</a>
                                            <small
                                                class="text-white">{{ $data->created_at->format('d, M Y') }}</small>
                                        </div>
                                        <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold"
                                            href="/{{ $data->slug }}/detail">{{ $data->nama_wisata }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div style="float: right;">
                        {{ $wisata->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
