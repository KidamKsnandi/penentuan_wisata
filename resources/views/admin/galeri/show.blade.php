@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Galeri</div>
                <div class="card-body">
                    <div class="form-group">
                            <label for="">Nama Wisata</label>
                            <div class="input-group input-group-outline">
                            <input type="text" value="{{ $wisata->nama_wisata }}" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Gambar</label>
                            <br>
                            <img src="{{ $galeri->galeri() }}" style="width:350px; height:350px; padding:10px;" />
                        </div>
                    <div class="form-group mt-4">
                        <a href="javascript:history.back()" class="btn btn-block btn-info form-control text-white"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
