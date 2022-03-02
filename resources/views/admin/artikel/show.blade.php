@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Artikel</div>
                <div class="card-body">
                    <div class="form-group">
                            <label for="">Judul Artikel</label>
                            <div class="input-group input-group-outline">
                            <input type="text" value="{{ $artikel->judul }}" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Cover</label>
                            <br>
                            <img src="{{ $artikel->cover() }}" style="width:350px; height:350px; padding:10px;" />
                        </div>
                    <div class="form-group">
                            <label for="">Konten</label>
                            <div class="input-group input-group-outline">
                            <textarea class="form-control" cols="30" rows="10" readonly>{{ $artikel->konten }}</textarea>
                            </div>
                        </div>
                    <div class="form-group">
                            <label for="">Penulis</label>
                            <div class="input-group input-group-outline">
                            <input type="text" value="{{ $artikel->user->name }}" class="form-control" readonly>
                            </div>
                        </div>
                    <div class="form-group mt-4">
                        <a href="javascript:history.back()" class="btn btn-block btn-info form-control text-white">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
