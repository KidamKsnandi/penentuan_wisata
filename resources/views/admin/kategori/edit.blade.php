@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <h3 class="col-sm-10">Data Kategori</h3>
                            <a href="/admin/kategori" class="fa fa-arrow-left btn btn-secondary">&nbsp;Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="">Nama Kategori</label>
                                <div class="input-group input-group-outline">
                                    <input type="text" name="nama_kategori" autocomplete="off"
                                        value="{{ $kategori->nama_kategori }}"
                                        class="form-control @error('nama_kategori') is-invalid @enderror">
                                    @error('nama_kategori')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                @csrf
                                <label for="">Latar Belakang</label>
                                <img src="{{ $kategori->background() }}" height="75" style="padding:10px;" />
                                <input type="file" name="background"
                                    class="form-control @error('background') is-invalid @enderror">
                                @error('background')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-info text-white display-block">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
